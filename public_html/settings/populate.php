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
		$source="machinet.ldif";
		break;
		}
}

$command="ldapadd -H ldapi:/// -D '$rootdn' -w$rootpass -f machinet.ldif";

echo $command;
shell_exec($command);

?>
