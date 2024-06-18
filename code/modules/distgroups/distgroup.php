<?php
function distgroup($view,$param)
{
//include_once("functions.php");

function user_prepare($ldapobject){
print_r($ldapobject);
foreach($ldapobject["vacationforward"]   as $el => $val) { if($val=="") unset($ldapobject["vacationforward"][$el]);}
foreach($ldapobject as $field_name => $field_value)
        {
        if(($field_name== "userdn")||($field_name== "submit")||($field_name=="op")||($field_name=="type_mod")) unset($ldapobject[$field_name]);
        if($field_value=="") unset($ldapobject[$field_name]);

        }
return $ldapobject;
}




$seldomain=$_SESSION["domain"];
echo $seldomain;
switch($view){




    case "list.tpl":
    $basedn="dc=machinet";
    if($seldomain !=NULL) $basedn="ou=Groups,ou=".$seldomain.",dc=machinet";
    $attrib=array("mail");
    $result=entrylist($basedn,"objectclass=inetorgperson",$attrib);
    break;
    case "detail.tpl":
    $result=listobject($param);
    break;
    case "delete.tpl":
    $result=userdel($param);
    break;
    case "change.tpl":


    $ldapobject=getpost();



    $op=$ldapobject["op"];
    $fullcn=$ldapobject["userdn"];
    $type_mod=$ldapobject["type_mod"];
//    if(isset($type_mod)) {  $op="Del";  $ldapobject=$type_mod;}
 if(isset($type_mod)) {  $op="Del";  $obj["vacationForward"]=$type_mod; $ldapobject=$obj; }

    $ldapobject=user_prepare($ldapobject);
//    print_r($ldapobject);
//    if($op!="change") { $ldapobject=$op; $op="Del";}
//    print_r($ldapobject);
    $result=moduser($fullcn,$ldapobject,$op,"groups");
    break;

   case "added.tpl":
    $objectdata=getpost();
    $givenname=ucfirst($objectdata["givenname"]);
    $surname=ucfirst($objectdata["givenname"]);
    $ldapobject["sn"]= $surname;
    $ldapobject["cn"]= $givenname." ".$surname;
    $ldapobject["gn"]= $givenname;

    $ldapobject["objectclass"]=array("inetorgperson", "genericAccount" , "vacation");
//    $ldapobject["uid"]=$objectdata["uid"];
    $ldapobject["uid"]=$objectdata["givenname"];
    $ldapobject["vacationActive"]="TRUE";
    $ldapobject["telephonenumber"]="0";
    $ldapobject["mobile"]="0";
//$mailcustoner["vacationActive"]='FALSE';
    $ldapobject["mail"]= $objectdata["givenname"]."@".$seldomain;
//    $ldapobject[""]= $givenname;
    print_r($ldapobject);
    $fullcn= "cn=".$ldapobject["cn"].",ou=Groups,ou=".$seldomain.",dc=machinet";

    $result=addobject($fullcn,$ldapobject);
    break;




}

return $result;
}
