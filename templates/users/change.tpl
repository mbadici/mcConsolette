<html>
<head>

<meta http-equiv="REFRESH" content="1;url=index.php?module=users&view=detail.tpl&user={$smarty.post.userdn|escape:'url'}" >

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