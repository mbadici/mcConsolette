<html>
<head>
 <link rel="stylesheet" type="text/css" href="css/common.css" />
{literal}
<script language="javascript"> 

   function DoPost(userdn){
     var  allstring = '{userdn: userdn,op: "disable"}';
         $.post('index.php?module=users&view=change.tpl&user='+userdn , {userdn: userdn,op: "disable"});  //Your values here..
            };
</script>
{/literal}
</head>

<body>
{$domain}
<table border=1>
{section   loop=$result name=ind}
<tr> <td> <a href = index.php?module=users&view=detail.tpl&user={$result[ind][0]|escape: 'url'}>{$result[ind][1]}</a></td><td>
<a href = index.php?module=users&view=delete.tpl&user={$result[ind][0]|escape: 'url'}>{$LANG["Delete"]}</a></td><td>
<a href="javascript:DoPost('{$result[ind][0]}')">{$LANG["Disable"]}</a></td><td>
<a href = index.php?module=users&view=changepass.tpl&user={$result[ind][0]|escape: 'url'}>{$LANG["Change password"]}</a></td> </tr>
{/section}

</table>
<a href = index.php?module=users&view=new.tpl>{$LANG["New user"]}</a>

</body>
</html>