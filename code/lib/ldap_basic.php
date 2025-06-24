<?php

require_once "../code/config.inc.php";

function ldap_init(){
	global $ldapuri;
	global $error_code;

	//global $basedn;
	//global $rootdn;
	//global $rootpasswd;
	$ldapcon=ldap_connect($ldapuri) or die( $error_code="UNCONN");	
	ldap_set_option($ldapcon,LDAP_OPT_PROTOCOL_VERSION,3);
	//if($bnd) { ldap_bind($ldapcon,$userdndn,$passwd);}
	//echo $error_code;
	return $ldapcon;
}

function login($user,$pass){

	if(uid_bind($user,$pass)!=NULL){return 0;} 
	return 1;
}



function checklogin($username,$pass){

	global $error_code;

	//echo $error_code;
	echo "error";
       return (login($username,$pass));

}



function uid_bind($user,$pass){
	global $rootdn;
	global $error_code;

	$basedn="dc=machinet";
	$ldapcon=ldap_init();
	$userdn=$rootdn;
	if(!strcmp($user,"admin")) {
		$userdn="cn=Manager,dc=machinet";
		$isadmin=1;
	}
	
	if($user!="admin"){

		$isadmin=0;
		$res = ldap_search($ldapcon, $basedn,"uid=".$user) or die("no result");
		if(!ldap_count_entries($ldapcon,$res)) return NULL;
			$entry = ldap_first_entry($ldapcon, $res);
			$userdn=ldap_get_dn($ldapcon,$entry);
			$element=explode(",", $userdn);
			end($element);
			$domain=end(explode("=",prev($element)));
			$_SESSION["domain"]=$domain;

	}
if(ldap_bind($ldapcon,$userdn,$pass)==1) { $_SESSION["isadmin"]=$isadmin;  return $ldapcon;}
$error_code="BIND";
 return NULL;

}





function get_cn($attr,$val){
	return($cn);
}

function new_object($obj) {

	ldap_add($obj);
	return 0;

}

function get_object($obj) {
        ldap_get($obj);
return 0;
}



function modify_object($obj) {
	ldap_modify($obj);
return 0;
}



function delete_object($obj) {
	ldap_delete($obj);
return 0;
}

function create_ou($name) {
	return 0;
}

function bind(){
$ldapcon=ldap_init();
return uid_bind($_SESSION["username"],$_SESSION["password"]);
}


?>
