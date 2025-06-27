<?php
  
//$tpl=str_replace(".php",".tpl",$_SERVER['PHP_SELF']);
require_once("../code/lib/ldap_basic.php");
  $base="ou=Users,ou=".$_GET["dom"].",dc=machinet";
   $result= get_cn($base,   "mail=*");
    echo '<select id="users" multiple="multiple" onclick="addItem()">';
    foreach($result as $elm) {
   echo "<option value='".$elm[0]."'>" ;
   echo $elm[1];
   echo "</option>";
   }
   
//   $smarty->assign('alist',$alist);
//$smarty->display($module."/".$view);

?>

