<?php
include_once("ldap_basic.php");

function addobject($fullcn,$ldapobject){
	$ldapcon=bind();
	return ldap_add($ldapcon,$fullcn,$ldapobject);
}

function listobject($fullcn){

	$ldapcon=bind();
	$res = ldap_search($ldapcon, $fullcn,"objectclass=*");
	$data = ldap_get_entries($ldapcon, $res);

//ldap_sort($ldapcon, $res, 'uid');

	$number=ldap_count_entries($ldapcon,$res);
	$entry = ldap_first_entry($ldapcon, $res);
	$attr= ldap_get_attributes($ldapcon, $entry);
	for ($i=0; $i < $attr["count"]; $i++) {
					$attrs=$attrs.",".$attr[$i] ;
					$result[$attr[$i]]=ldap_get_values($ldapcon,$entry,$attr[$i]);
					}
	return $result;
}




?>

