<?php
function group($view,$param)
{
//include_once("functions.php");

function user_prepare($ldapobject){
foreach($ldapobject["member"]   as $el => $val) { if($val=="") unset($ldapobject["member"][$el]);}
foreach($ldapobject as $field_name => $field_value)
        {
        if(($field_name== "userdn")||($field_name== "submit")||($field_name=="op")) unset($ldapobject[$field_name]);
        if($field_value=="") unset($ldapobject[$field_name]);

        }
return $ldapobject;
}




$seldomain=$_SESSION["domain"];
switch($view){
    case "list.tpl":
    $basedn="dc=machinet";
    if($seldomain !=NULL) $basedn="ou=Groups,ou=".$seldomain.",dc=machinet";

    $attrib=array("");
    $result=entrylist($basedn,"objectclass=groupofnames",$attrib);
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

    $ldapobject=user_prepare($ldapobject);
//    print_r($ldapobject);
    if($op!="change") { $ldapobject=$op; $op="Del";}

    $result=moduser($fullcn,$ldapobject,$op,"groups");
    break;
    case "added.tpl":
    $objectdata=getpost();
    $fullcn=$objectdata["userdn"];
    $ldapobject["cn"]=$objectdata["givenname"];
    $ldapobject["objectclass"][0]="groupofnames";
    $ldapobject["member"][0]=$objectdata["surname"];
    $fullcn= "cn=".$ldapobject["cn"].",ou=groups,ou=".$seldomain.",dc=machinet";
    $result=addobject($fullcn,$ldapobject);
    break;

}

return $result;
}
