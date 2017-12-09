<?php
function getpost(){
        foreach($_POST as $field_name => $field_value)
        {
        if($field_value!=NULL) $ldapobject[$field_name] = $field_value;
        }
	return $ldapobject;
}


?>
