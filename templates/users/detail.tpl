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
{if $ind@key  eq "roomNumber"}
<tr><td>recovery mail </td><td> <input class="form-control" type=text name=roomNumber value="{$ind[0]}" ></input> </td> </tr>

{else}


{if $ind@key  eq "pager"}

<td>Quota </td> <td><input class="form-control" type=text  name= pager value="{$ind[0]}"> </td>
{else}


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



{if $ind@key  eq "userPassword"}

<td>{$ind@key} </td> <td><input class="form-control" type=password  name= "{$ind@key}"  value="{$ind[0]}"> </td>
{else}

<td>{$ind@key} </td> <td><input class="form-control" type=text  name= "{$ind@key}"  value="{$ind[0]}"> </td>
{/if}
{if $ind@key  eq "mailForward"}

<td> <button type=submit value="{$ind[0]}" name="fwd_mod">Del </button> </td>
{/if}


{/if}
{/if}
{/if}
</tr>
{/foreach}
{if $result["pager"] eq NULL }
<tr> <td>Quota </td><td> <input class="form-control" type=text name=pager>  </input> </td> <td> </td></tr>
{/if}
{if $result["roomNumber"] eq NULL}
<tr><td>recovery mail </td><td> <input class="form-control" type=text name=roomNumber  ></input> </td> </tr>
{/if}



<tr> <td>mailForward </td><td> <input class="form-control" type=text name=mailforward>  </input> </td> <td> comma separated list</td></tr>


</table>
<input type=hidden name=userdn value="{$smarty.get.user}">
<input type=hidden name="op" value="change">
<input class="btn btn-outline-success my-2 my-sm-0" type=submit name="submit" value="{$LANG["Change"]}">
<form>
<a href= index.php?module=users&view=delete.tpl&user={$smarty.get.user|escape:'url'}>{$LANG["Delete"]}</a>

</body>
</html>
