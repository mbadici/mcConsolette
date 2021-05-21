<html>
<head>
<link rel="stylesheet" type="text/css" href="css/common.css" />
</head>

<body>
{$LANG["New distribution group"]}
{$smarty.get.user}

<Form action=index.php?module=distgroups&view=added.tpl method=post>
<table>
<tr><td>
{$LANG["Group name"]}</td><td><input type=txt name= givenname> @ {$domain}
</td> </tr>

</table>





<input type=submit value=add >
</form>

</body>
</html>