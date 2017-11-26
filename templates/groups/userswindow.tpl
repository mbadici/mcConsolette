<html>
<head>
</head>

<body>
<table>
{section   loop=$result name=ind}
<tr> <td> <a href = index.php?module=users&view=list.tpl&user={$result[ind][0]|escape: 'url'}>{$result[ind][1]}</a></td><td><a href = index.php?module=groups&view=delete.tpl&user={$result[ind][0]|escape: 'url'}>Delete</a></td> </tr>
{/section}

</table>

</body>
</html>