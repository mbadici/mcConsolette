<?php

$rootdn= isset($_POST['rootdn']) ? $_POST['rootdn'] :"";
$rootpass= isset($_POST['rootpass']) ? $_POST['rootpass'] :"";
$schema= isset($_POST['schema']) ? $_POST['schema'] :"";
switch ($schema) {

    case "inetorg": {
		$source="simple.ldif";
		break;
	        }
   case "ispenv2": {
		$source="ispenv2.ldif";
		break;
		}
}

$command="ldapadd  -D '$rootdn' -w$rootpass -f ".$source;

echo $command;
echo (shell_exec($command));

?>
