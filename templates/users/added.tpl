<html>
<head>
<meta http-equiv="REFRESH" content="{$delay};url=index.php?module=users&view=list.tpl" >
<link rel="stylesheet" type="text/css" href="css/common.css" />
</head>
<body>
{if $result eq '1'}
Operation suceeded
{else} 
Operation failed
{/if}

<a href = index.php?module=users&view=new.tpl></a>

</body>
</html>