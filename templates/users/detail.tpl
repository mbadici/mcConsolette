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
<td> {$ind@key} </td> <td><input type=text  name= {$ind@key}[{$j}] value={$ind[email]}> </td> <td> <button type=submit value="{$ind[email]}" name="op">Del </button> </td>
<!--{$j++}-->
{/if}
</tr>

{/section}
<tr> <td> mail </td> <td><input type=text  name= {$ind@key}[{$j}] value=""> </td> </tr>
{else}
<td>{$ind@key} </td> <td><input type=text  name= "{$ind@key}"  value="{$ind[0]}"> </td>

{/if}

</tr>
{/foreach}
<tr> <td>mailForward </td><td> <input  type=text name=mailforward>  </input> </td> </tr>


</table>
<input type=hidden name=userdn value="{$smarty.get.user}">
<input type=hidden name="op" value="change">
<input type=submit name="submit" value="{$LANG["Change"]}">
<form>
<a href= index.php?module=users&view=delete.tpl&user={$smarty.get.user|escape:'url'}>{$LANG["Delete"]}</a>

</body>
</html>