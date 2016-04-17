<html>
<head>
<link rel="stylesheet" type="text/css" href="css/common.css" />
</head>

<body>
{$LANG["New group"]}
<Form action=index.php?module=groups&view=added.tpl method=post>
<table>
<tr><td>
{$LANG["Group name"]}</td><td><input type=txt name= givenname>
</td> </tr>
<tr><td>

{$LANG["Member"]}</td><td><input type=txt name= surname>
</td></tr>
</table>
<input type=submit value=add >
</form>

</body>
</html>