<?php

function get_cn($attr,$val){
return($cn);
}

function new_object($obj) {

ldap_add($obj);
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
