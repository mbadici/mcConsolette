


<?php 
session_start();
session_regenerate_id();

define('SMARTY_DIR', '/usr/share/php/smarty3/');

if(!include_once(SMARTY_DIR . 'Smarty.class.php')) echo "smarty not present, please install it and adjust the path in index.php";
include_once("../code/functions.php");
require_once("../code/lang/En_en.php");
require_once("../code/dispatcher.php");
global $error_code;
$view= isset($_GET['view']) ? $_GET['view'] :"welcome.tpl";
$module= isset($_GET['module']) ? $_GET['module'] :"login";
$param= isset($_GET['user']) ? $_GET['user'] :"";

$smarty = new Smarty();
$smarty->assign('pass', bin2hex(openssl_random_pseudo_bytes(4)));

$smarty->assign('username',$_SESSION["username"]);
$smarty->assign('domain',$_SESSION["domain"]);
$smarty->assign('delay',5);
$smarty->setTemplateDir('../templates/');
$smarty->setCompileDir('../templates_c/');
//$smarty->assign('username',$username);
//$smarty->assign('pass',$pass);
$result=dispatcher($module,$view,$param);
$smarty->assign('result',$result);

$smarty->assign('LANG',$LANG);
//echo $error_code;
if(!isset($_SESSION['username'])){
header( "location: login.html");

}

$smarty->display("header.tpl");
$smarty->display($module."/".$view);
$smarty->display("footer.tpl");



?>
