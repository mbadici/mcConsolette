<?php
function getpost(){
        foreach($_POST as $field_name => $field_value)
        {
//        if(($field_name!= "userdn")&($field_name!= "cn")&($field_name!= "submit")&($field_name!= "objectClass"))
        if($field_value!=NULL) $ldapobject[$field_name] = $field_value;
        }
//        $userdn= isset($_POST['userdn']) ? $_POST['userdn'] :"";
	return $ldapobject;
}


?>
