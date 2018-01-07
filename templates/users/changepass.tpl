<html>
<head>
<link rel="stylesheet" type="text/css" href="css/common.css" />
</head>
<body>

{$LANG["change_password_for_user"]} <br>{$smarty.get.user}
{$userdn=$smarty.get.user|escape: 'url'}
<Form action=index.php?module=users&view=changed.tpl&user={$userdn} method=post>
<table>
<tr><td>
{$LANG["password"]}</td><td><input class="form-control" type=password name=password> </td></tr>
<tr><td>

{$LANG["confirm"]} </td><td><input class="form-control" type=password name=password2>
<input class="btn btn-outline-success my-2 my-sm-0" type=submit value={$LANG["Change"]} ></td></tr>
</table>
</form>

</body>
</html>