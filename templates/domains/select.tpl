<head>
<link rel="stylesheet" type="text/css" href="css/common.css" />
</head>


<body>
<form method=post action=index.php?module=domains&view=selected.tpl>
<select name=selecteddomain>

{section   loop=$result name=ind}
<option> {$result[ind][1]}</option>
{/section}

<option > all </option>

</select>
<input class="btn btn-outline-success my-2 my-sm-0" type=submit value=select>
</form>
<a href = index.php?module=domains&view=new.tpl>{$LANG["New domain"]}</a>

</body>
