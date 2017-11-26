<html>
<head>
<link rel="stylesheet" type="text/css" href="css/common.css" />
</head>
<body>
<table>
{section   loop=$result name=ind}
<tr> <td> <a href = index.php?module=domains&view=detail.tpl&user={$result[ind][0]|escape: 'url'}>{$result[ind][1]}</a></td><td><a href = index.php?module=domains&view=delete.tpl&user={$result[ind][0]|escape: 'url'}>Delete</a></td> </tr>
{/section}

</table>
<a href = index.php?module=domains&view=new.tpl>{$LANG["New domain"]}</a>

</body>
</html>