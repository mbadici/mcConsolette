<?php
require_once "config.inc.php";
//include_once "code/lang/RO_ro.php";



function details($userdn)
{
$ldapcon=ldap_init() or die("Error connecting");
$res = ldap_search($ldapcon, $userdn,"objectclass=*") or die("ldap search failed2");
$number=ldap_count_entries($ldapcon,$res);
$entry = ldap_first_entry($ldapcon, $res);
$res= ldap_get_attributes($ldapcon, $entry);
for ($i=0; $i < $res["count"]; $i++) {
	//			    $attrs=$attrs.",".$res[$i] ;
				    $resu[$res[$i]]=ldap_get_values($ldapcon,$entry,$res[$i]);

				    }
//$resu=ldap_get_values($ldapcon,$entry,$attrs);
return $resu;

}
 
function newuseradd($givenname,$surname,$uid,$domain,$password,$module)
{

echo $module;
echo "\n";
switch($module)
{
case "users":
{
$givenname=ucfirst($givenname);
$surname=ucfirst($surname);
$mailcustomer["sn"]= $surname;
$mailcustomer["cn"]= $givenname." ".$surname;
$mailcustomer["gn"]= $givenname;
$mailcustomer["objectclass"][0]="inetorgperson";
$mailcustomer["objectclass"][1]="mailaccount";
$mailcustomer["objectclass"][2]="accountable";
$mailcustomer["objectclass"][3]="";
$mailcustomer["userpassword"]=$password;
$mailcustomer["uid"]=$uid;
$mailcustomer["telephonenumber"]="0";
$mailcustomer["mobile"]="0";
$mailcustomer["pager"]=$pager;
//$mailcustoner["vacationActive"]='FALSE';
$mailcustomer["mail"]= $uid;
//$mailcustomer[""]= $givenname;$fullcn= "cn=".$mailcustomer["cn"].",ou=Users,dc=machinet";
$fullcn= "cn=".$mailcustomer["cn"].",ou=users,ou=".$domain.",dc=machinet";
break;
}
case "domains":
{

// create an ou first

$mailc["ou"] = $givenname;
$fullcn= "ou=".$givenname.",dc=machinet";
$mailc["objectclass"][0]="top";
$mailc["objectclass"][1]="organizationalUnit";
echo $fullcn;
$ldapcon=uid_bind($_SERVER['PHP_AUTH_USER'],$_SERVER['PHP_AUTH_PW']);
$res=ldap_add($ldapcon,$fullcn,$mailc);

// container for users
$mailc["ou"] = $givenname;
$fullcn= "ou=users,ou=".$givenname.",dc=machinet";
$mailc["objectclass"][0]="top";
$mailc["objectclass"][1]="organizationalUnit";
$res=ldap_add($ldapcon,$fullcn,$mailc);

// container for groups
$mailc["ou"] = "groups";
$fullcn= "ou=groups,ou=".$givenname.",dc=machinet";
$mailc["objectclass"][0]="top";
$mailc["objectclass"][1]="organizationalUnit";
$res=ldap_add($ldapcon,$fullcn,$mailc);



$mailcustomer["dc"]= $givenname;
$mailcustomer["objectclass"][0]="dnsdomain";
$fullcn= "dc=".$mailcustomer["dc"].",ou=domains,dc=machinet";


break;
}
case "groups":
{
$mailcustomer["cn"]= $givenname;
$mailcustomer["objectclass"][0]="groupofnames";
$mailcustomer["member"][0]=$surname;
#echo $mailcustomer["member"][0];
$fullcn= "cn=".$mailcustomer["cn"].",ou=groups,ou=".$domain.",dc=machinet";
break;
}
}
$ldapcon=uid_bind($_SESSION['username'],$_SESSION['password']);

$res=ldap_add($ldapcon,$fullcn,$mailcustomer);
ldap_close($ldapcon);
return $res;
}
function userdel($dn)
{
$ldapcon=uid_bind($_SESSION['username'],$_SESSION['password']);

return ldap_delete($ldapcon,$dn);
}


function moduser($dn,$ldapobject,$op,$module)
{
global $domain;
$ldapcon=uid_bind($_SESSION['username'],$_SESSION['password']);

//echo $op;
if($op=="change")
{
//if($module="groups")
//{
//if(end($ldapobject->member)!="") echo "not";
//}
//print_r($ldapobject);
$res=ldap_modify($ldapcon,$dn,$ldapobject);

}
elseif($op=="disable")
{
//$res=ldap_get_entry($ldapcon,$dn,$ob);

$ldapobject="billPaid";
$ob[$ldapobject]="FALSE";
echo "<br>";

echo $ldapobject;
echo "<br>";

echo $dn;
echo "<br>";
$res=ldap_modify($ldapcon,$dn,$ob);

}

elseif($op=="enable")
{
//$res=ldap_get_entry($ldapcon,$dn,$ob);

$ldapobject="billPaid";
$ob[$ldapobject]="TRUE";
echo "<br>";

echo $ldapobject;
echo "<br>";

echo $dn;
echo "<br>";

$res=ldap_modify($ldapcon,$dn,$ob);

}



elseif($op="Del")
{
//$ldapobj="member";
//if($module=="users") $ldapobj="mail";
//$o[$ldapobj]=$ldapobject;
$o=$ldapobject;
//print_r($o);
//echo $ldapobject;
//echo "<br>";
//print_r($dn);
$res=ldap_mod_del($ldapcon,$dn,$o);

}




ldap_close($ldapcon);
return $res;
}
function selectdomain($selecteddomain)
{
global $domain;
$domain=$selecteddomain;
$session_start();
$_SESSION['domain']=$domain;
echo $domain." selected";
}
?>
