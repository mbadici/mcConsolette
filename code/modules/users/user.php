<?php
function user($view,$param)
{




function user_prepare($ldapobject){
foreach($ldapobject["mail"]   as $el => $val) { if($val=="") unset($ldapobject["mail"][$el]);}
foreach($ldapobject as $field_name => $field_value)
        {
        if(($field_name== "userdn")||($field_name== "cn")||($field_name== "submit")||($field_name== "objectClass")||($field_name=="op")||($field_name=="type_mod")) unset($ldapobject[$field_name]);
        if($field_value=="") unset($ldapobject[$field_name]);

        }
//print_r($ldapobject);
return $ldapobject;
}

$seldomain=$_SESSION['domain'];

switch ($view){
    case "list.tpl":
//    $result=list_users("mail=*","users",$seldomain);
    $basedn="dc=machinet";
    if($seldomain !=NULL) $basedn="ou=Users,ou=".$seldomain.",dc=machinet";
    $attrib=array("billpaid","uid");
    $result=entrylist($basedn,"mail=*",$attrib);
    break;
    case "detail.tpl":
//    $result=details($param);
    $result=listobject($param);

    break;
    case "delete.tpl":
    $result=userdel($param);

    break;
    case "changed.tpl":
    $pass_array=getpost();
//    print_r($pass_array);
    $result=changepass($param,$pass_array["password"],$pass_array["password2"]);
    break;
    case "change.tpl":
    $ldapobject=getpost();
    $op=$ldapobject["op"];
    $type_mod=$ldapobject["type_mod"];
    $ldapobject=user_prepare($ldapobject);

    if(isset($type_mod)) {  $op="Del";  $ldapobject=$type_mod;}

    $result=moduser($param,$ldapobject,$op,"users");
    break;
    case "disable.tpl":
    $ldapobject=getpost();
    $op=$ldapobject["op"];

    $ldapobject=user_prepare($ldapobject);
    print_r($ldapobject);
    $result=moduser($param,$ldapobject,$op,"users");
    break;
    case "added.tpl":
    $objectdata=getpost();
    $givenname=ucfirst($objectdata["givenname"]);
    $surname=ucfirst($objectdata["surname"]);
    $ldapobject["sn"]= $surname;
    $ldapobject["cn"]= $givenname." ".$surname;
    $ldapobject["gn"]= $givenname;
    $ldapobject["objectclass"]=array("inetorgperson","accountable","mailaccount");
    $ldapobject["userpassword"]=$objectdata["password"];
    $ldapobject["uid"]=$objectdata["uid"];
    $ldapobject["telephonenumber"]="0";
    $ldapobject["mobile"]="0";
//$mailcustoner["vacationActive"]='FALSE';
    $ldapobject["mail"]= $ldapobject["uid"]."@".$seldomain;
//    $ldapobject[""]= $givenname;
    $fullcn= "cn=".$ldapobject["cn"].",ou=Users,ou=".$seldomain.",dc=machinet";
    $result=addobject($fullcn,$ldapobject);
    break;

}

return $result;



}
