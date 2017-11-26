<html>
<head>
<link rel="stylesheet" type="text/css" href="css/common.css" />
</head>

<body>
<table>
{section   loop=$result name=ind}
<tr> <td> <a href = index.php?module=groups&view=detail.tpl&user={$result[ind][0]|escape: 'url'}>{$result[ind][1]}</a></td><td><a href = index.php?module=groups&view=delete.tpl&user={$result[ind][0]|escape: 'url'}>{$LANG["Delete"]}</a></td> </tr>
{/section}
</table>
<a href = index.php?module=groups&view=new.tpl>{$LANG["New group"]}</a>

</body>
</html>