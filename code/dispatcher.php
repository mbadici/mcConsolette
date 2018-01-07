<?php
include_once("functions.php");
include_once("lib/getpost.php");
include_once("lib/utilities.php");
function dispatcher($module,$view,$param)
{
if($module!=NULL){
    switch($module){
        case "users":
                include "modules/users/user.php";


                return  user($view,$param);
        case "groups":
                include "modules/groups/group.php";
                return  group($view,$param);

        case "domains":
                include "modules/domains/domains.php";
                return  domain($view,$param);
        case "settings":
                include "modules/settings/settings.php";
                return  settings($view,$param);

                                        }

    }
}
?>