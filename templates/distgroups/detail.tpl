<head>
<link rel="stylesheet" type="text/css" href="css/common.css" />
</head>


{$LANG["details"]}
{$smarty.get.user}


<br>
<form method=post action=index.php?module=distgroups&view=change.tpl&user={$smarty.get.user|escape:'url'}>
<table>
<tr>
<td> mail </td>
<td> <input class="form-control" type text name= mail value={$result["mail"][0]} > </td>
</tr>
{$vacationforward=$result["vacationForward"]}



{foreach $vacationforward as $nm=>$vfwd}
{$j=$nm}
{if is_numeric($nm)}
<tr>
<td> member </td> <td><input class="form-control" type=text  name= vacationforward[{$j}] value="{$vfwd}"> </td> <td> <button type=submit value="{$vfwd}" name="type_mod">Del </button> </td>
</tr>
{/if}
{/foreach}



<div id=newform>

<tr>
<td> member </td>
<td> <input class="form-control" type=text  id=newmember name=vacationforward[{$vfwd}]> </td> 
</tr>
</div>

</table>

<input type=hidden name=userdn value="{$smarty.get.user}">

<input type=submit value=change name="op">
</form>

<a href= index.php?module=distgroups&view=delete.tpl&user={$smarty.get.user|escape:'url'}> {$LANG["Delete"]}</a>

