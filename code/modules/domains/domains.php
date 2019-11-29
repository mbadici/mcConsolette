<?php
function domain($view,$param)
{

function user_prepare($ldapobject){
foreach($ldapobject as $field_name => $field_value)
        {
        if(($field_name== "userdn")||($field_name== "cn")||($field_name== "submit")||($field_name== "objectClass")||($field_name=="op")) unset($ldapobject[$field_name]);
        if($field_value=="") unset($ldapobject[$field_name]);

        }
print_r($ldapobject);
return $ldapobject;
}


$seldomain=$_SESSION['domain'];

switch ($view){
    case "list.tpl":
//    $result=list_users("objectclass=dnsdomain","domains","ihts.ro");
     $attrib=array("");

    $result=entrylist("dc=machinet","objectclass=dnsdomain",$attrib);
    break;
    case "select.tpl":
     $attrib=array("");

    $result=entrylist("dc=machinet","objectclass=dnsdomain",$attrib);

//    $result=list_users("objectclass=dnsdomain","domains","ihts.ro");
    break;
    case "selected.tpl":
    $posts=getpost();
    $param=$posts["selecteddomain"];
    if($param=="all") $param="";
    $_SESSION["domain"]=$param;
    echo $param;
    break;

    case "detail.tpl":
    $result=listobject($param);
    break;
    case "delete.tpl":
    $result=userdel($param);
    break;
    case "changed.tpl":
    $pass_array=getpost();
    print_r($pass_array);
    $result=changepass($param,$pass_array["password"],$pass_array["password2"]);
    break;
    case "change.tpl":
    $ldapobject=getpost();
    $op=$ldapobject["op"];
    $ldapobject=user_prepare($ldapobject);
    $result=moduser($param,$ldapobject,$op,"users");
    break;
    case "added.tpl":
    $objectdata=getpost();

    unset($ldapobject);
    $givenname=$objectdata["givenname"];
    $ldapobject["ou"] = $givenname;
    $fullcn="ou=".$givenname.",dc=machinet";
    echo $fullcn;
    $ldapobject["objectclass"][0]="top";
    $ldapobject["objectclass"][1]="organizationalUnit";
    $result=addobject($fullcn,$ldapobject);
// container for users

    $ldapobject["ou"] = $givenname;
    $fullcn= "ou=users,ou=".$givenname.",dc=machinet";
    $ldapobject["objectclass"][0]="top";
    $ldapobject["objectclass"][1]="organizationalUnit";
    $result=addobject($fullcn,$ldapobject);

//container for group
    unset($ldapobject);

    $ldapobject["ou"] = "groups";
    $fullcn= "ou=groups,ou=".$givenname.",dc=machinet";
    $ldapobject["objectclass"][0]="top";
    $ldapobject["objectclass"][1]="organizationalUnit";
    $result=addobject($fullcn,$ldapobject);
    unset($ldapobject);
    $ldapobject["dc"]= $givenname;
    $ldapobject["objectclass"][0]="top";
    $ldapobject["objectclass"][1]="dnsdomain";
    $fullcn= "dc=".$givenname.",ou=domains,dc=machinet";
    print_r($ldapobject);
    $result=addobject($fullcn,$ldapobject);
    break;

}

return $result;



}
