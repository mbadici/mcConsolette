<?php
session_start();
session_regenerate_id();
  
//$tpl=str_replace(".php",".tpl",$_SERVER['PHP_SELF']);
require_once("../code/lib/utilities.php");
//require_once("../code/lib/ldap_basic.php");
//require_once("../code/functions.php");
 $basedn="dc=machinet";
    if($domain !=NULL) $basedn="ou=Users,ou=".$domain.",dc=machinet";
    $attrib=array("mail","uid");

   $result=entrylist($basedn,"mail=*",$attrib);

//   $result= list_users("NULL","users",$domain);
    echo '<select id="users" multiple="multiple" onclick="addItem()">';
    foreach($result as $elm) {
   echo "<option value='".$elm[0]."'>" ;
   echo $elm[1];
   echo "</option>";
   }
   
//   $smarty->assign('alist',$alist);
//$smarty->display($module."/".$view);

?>

