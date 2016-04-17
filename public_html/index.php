<?php
define('SMARTY_DIR', '/usr/share/smarty-3.1.29/libs/');

if(!include_once(SMARTY_DIR . 'Smarty.class.php')) echo "smarty not present, please install it and adjust the path in index.php";
require_once("../code/functions.php");
require_once("../code/lang/Ro_ro.php");
$view= isset($_GET['view']) ? $_GET['view'] :"index.tpl";
$module= isset($_GET['module']) ? $_GET['module'] :"";
$username= isset($_POST['username']) ? $_POST['username'] :$logusername;
$pass= isset($_POST['pass']) ? $_POST['pass'] :$logpass;
$smarty = new Smarty();
$smarty->setTemplateDir('../templates/');
$smarty->setCompileDir('../templates_c/');
$smarty->assign('username',$username);
$smarty->assign('pass',$pass);
$smarty->assign('LANG',$LANG);
//$tpl=str_replace(".php",".tpl",$_SERVER['PHP_SELF']);

//if(login($username,$pass))
//{
//define("AUTHENTICATED","authenticated");
//}
//if ($view=="index.tpl")
//{
//$smarty->display($view);
//} 
//else
//{
$smarty->display("header.tpl");

switch(checklogin($username,$pass)){

case 1:


    header("HTTP/1.0 401 Unauthorized");
    header("WWW-authenticate: Basic realm=\"mcConsole\"");
    header("Content-type: text/html");
  break;
case -3:
    echo "the LDAP server is not reacheable";
    $smarty->display("settings/populate.tpl");
    break;


case 0: 
  session_start();
  $smarty->display("header.tpl");
  break;
    switch($view)
    {
	case "index.tpl":
	{
	$module="login";$view="welcome.tpl";
//    session_start();

        break;
	} 
	case "list.tpl":
	{

	$seldomain=$_SESSION['seldomain'];
	if($seldomain == NULL) $seldomain="alldomains";

	echo "domain ".$_SESSION['seldomain']." active";
	$alist= list_users("NULL",$module,$seldomain);
	$smarty->assign('alist',$alist);
    $smarty->assign('domain',$domain);

	break;
	}
	case "new.tpl":
	{
	//echo $_SESSION['seldomain'];
	$seldomain=$_SESSION['seldomain'];

     if($seldomain != alldomains)
{

	$alist= list_users("NULL","domains");
	$smarty->assign('alist',$alist);
	$smarty->assign('domain', $_SESSION['seldomain']);

}
	break;
	}
	case "added.tpl":
	{
	$givenname= isset($_POST['givenname']) ? $_POST['givenname'] :"nobody";
	$surname= isset($_POST['surname']) ? $_POST['surname'] :"nobody";
	$domain= $_SESSION['seldomain'];
	$uid= isset($_POST['uid']) ? $_POST['uid'] :"";
	$mail=$uid."@".$domain;
	$password= isset($_POST['password']) ? $_POST['password'] :"nobody";
        $result=newuseradd($givenname,$surname,$mail,$_SESSION['seldomain'],$password,$module);
	$smarty->assign('result',$result);
	break;
	}
	case "delete.tpl":
	{
	$userdn= isset($_GET['user']) ? $_GET['user'] :"";
	$result=userdel($userdn);
	$smarty->assign('result',$result);
	break;
	}
	case "changed.tpl":
	{
	$userdn= isset($_GET['user']) ? $_GET['user'] :"";
	$password= isset($_POST['password']) ? $_POST['password'] :"";
	$password2= isset($_POST['password2']) ? $_POST['password2'] :"";
	$result=changepass($userdn,$password,$password2);
	$smarty->assign('result',$result);
	break;
	}
	case "detail.tpl":
	{
	$userdn= isset($_GET['user']) ? $_GET['user'] :"";
	$result=details($userdn,$module);
	$smarty->assign('result',$result);
	break;
	}
	case "change.tpl":
	{
//      $givenname = isset($_POST['givenname']) ? $_POST['givenname'] :"";
//      $surname= isset($_POST['surname']) ? $_POST['surname'] :"";
//   $telephonenumber= isset($_POST['telephoneNumber']) ? $_POST['telephoneNumber'] :"";
//   $mobile= isset($_POST['mobile']) ? $_POST['mobile'] :"";
//   $member= isset($_POST['member']) ? $_POST['member'] :"";
//   $ldapobject = array("telephonenumber"=> $telephonenumber,
//			"mobile"=>$mobile);
//			echo $mobile; echo "mobile"; echo $telephonenumber;

        foreach($_POST as $field_name => $field_value)
	{
	if(($field_name!= "userdn")&($field_name!= "cn")&($field_name!= "op")&($field_name!= "objectClass"))
//$ldapobject[$field_name]=!is_null($field_value) ? $field_value:"";
//	if(end("member")!="") next("member")="";
	if($field_value!=NULL) $ldapobject[$field_name] = $field_value;
	}
	$op =$_POST['op'];
	$userdn= isset($_POST['userdn']) ? $_POST['userdn'] :"";

	$result=moduser($userdn,$ldapobject,$op,$module);
	$smarty->assign('result',$result);
	break;
	}
	case "select.tpl":
	{
	$alist= list_users("NULL",$module);
	$smarty->assign('alist',$alist);
	break;
	}
	case "selected.tpl":
	{
	$selecteddomain=isset($_POST['selecteddomain']) ? $_POST['selecteddomain'] : "";
	$domain=$selecteddomain;
//	echo $domain." selected";
	$_SESSION['seldomain']=$domain;
	echo $_SESSION['seldomain']." selected";
	$result=0;
	break;
	}
   
    }

$smarty->display($module."/".$view);
$smarty->display("footer.tpl");

}


?>
