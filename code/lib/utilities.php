<?php
include_once("ldap_basic.php");
function addobject($fullcn,$ldapobject)
{
$ldapcon=bind();
return ldap_add($ldapcon,$fullcn,$ldapobject);
}

function listobject($fullcn)
{
$ldapcon=bind();

$res = ldap_search($ldapcon, $fullcn,"objectclass=*") or die("ldap search failed2");
$number=ldap_count_entries($ldapcon,$res);
$entry = ldap_first_entry($ldapcon, $res);
$attr= ldap_get_attributes($ldapcon, $entry);
for ($i=0; $i < $attr["count"]; $i++) {
					$attrs=$attrs.",".$attr[$i] ;
					$result[$attr[$i]]=ldap_get_values($ldapcon,$entry,$attr[$i]);
					}
return $result;
}

function entrylist($basedn,$query)
{
$ldapcon=bind();

$res = ldap_search($ldapcon, $basedn,$query) or die("ldap search failed2");
$number=ldap_count_entries($ldapcon,$res);
$entry = ldap_first_entry($ldapcon, $res);

if($number<1 or $nr=0) 
{$result[1][0]=$result[1][1]="no result";
}
else{

$entry = ldap_first_entry($ldapcon, $res);
$userdn=ldap_get_dn($ldapcon,$entry);
$info=explode(",", $userdn);
$moreinfo=explode("=",$info[0]);
$result[0][0]=$userdn;
$result[0][1]=$moreinfo[1];
for($i=1;$i<$number;$i++)
{
$entry=ldap_next_entry($ldapcon,$entry);
$userdn=ldap_get_dn($ldapcon,$entry);
$info=explode(",", $userdn);
$moreinfo=explode("=",$info[0]);
$result[$i][0]=$userdn;
$result[$i][1]=$moreinfo[1];
}
}
return $result;






}

?>

