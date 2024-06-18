<html>
<head>

<meta http-equiv="REFRESH" content="{$delay};url=index.php?module=users&view=list.tpl" >

<link rel="stylesheet" type="text/css" href="css/common.css" />
</head>
<body>
{$smarty.get.user}
{if $result eq '1'}
Operation suceeded
{else} 
Operation failed
{/if}
</body>
</html>
