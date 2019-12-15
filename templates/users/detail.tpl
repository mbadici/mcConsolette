<html>
<head>
<link rel="stylesheet" type="text/css" href="css/common.css" />
</head>
<body> 
{$LANG["details"]}
{$smarty.get.user}

<br>
<form method=post action=index.php?module=users&view=change.tpl&user={$smarty.get.user|escape:'url'}>
<table>
{foreach $result  as $ind}
<tr>


{if $ind@key  eq "mail"}
<tr>
{$j=0}
{section name=email loop=$ind}
{if $ind[email] != NULL}
<td> {$ind@key} </td> <td><input class="form-control" type=text  name= {$ind@key}[{$j}] value="{$ind[email]}"> </td> {if $j != 0} <td> <button type=submit value="{$ind[email]}" name="type_mod">Del </button> </td>{/if}

<!--{$j++}-->
{/if}
</tr>

{/section}
<tr> <td> mail </td> <td><input class="form-control" type=text  name= {$ind@key}[{$j}] value=""> </td> </tr>
{else}
<td>{$ind@key} </td> <td><input class="form-control" type=text  name= "{$ind@key}"  value="{$ind[0]}"> </td>
{if $ind@key  eq "mailForward"}

<td> <button type=submit value="{$ind[0]}" name="fwd_mod">Del </button> </td>
{/if}

{/if}

</tr>
{/foreach}
<tr> <td>mailForward </td><td> <input class="form-control" type=text name=mailforward>  </input> </td> <td> comma separated list</td></tr>


</table>
<input type=hidden name=userdn value="{$smarty.get.user}">
<input type=hidden name="op" value="change">
<input class="btn btn-outline-success my-2 my-sm-0" type=submit name="submit" value="{$LANG["Change"]}">
<form>
<a href= index.php?module=users&view=delete.tpl&user={$smarty.get.user|escape:'url'}>{$LANG["Delete"]}</a>

</body>
</html>