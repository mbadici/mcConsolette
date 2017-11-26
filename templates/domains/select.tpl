<body>
<form method=post action=index.php?module=domains&view=selected.tpl>
<select name=selecteddomain>

{section   loop=$result name=ind}
<option> {$result[ind][1]}</option>
{/section}

<option > all </option>

</select>
<input type=submit value=select>
</form>
</body>
