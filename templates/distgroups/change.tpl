<html>
<head>

<meta http-equiv="REFRESH" content="{$delay};url=index.php?module=distgroups&view=detail.tpl&user={$smarty.post.userdn|escape:'url'}" >

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