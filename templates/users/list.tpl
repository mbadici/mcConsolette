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
<div class="container">
{$domain}
{section   loop=$result name=ind}
<div class="row"> 
<div class="col-md-3" > <a href = index.php?module=users&view=detail.tpl&user={$result[ind][0]|escape: 'url'}>{$result[ind][1]}</a></div>
<div ><a class="btn btn-secondary" href = index.php?module=users&view=delete.tpl&user={$result[ind][0]|escape: 'url'}>{$LANG["Delete"]}</a></div>
<div ><a class="btn btn-secondary" href="javascript:DoPost('{$result[ind][0]}')">{$LANG["Disable"]}</a></div>
<div ><a class="btn btn-secondary"  href = index.php?module=users&view=changepass.tpl&user={$result[ind][0]|escape: 'url'}>{$LANG["Change password"]}</a> </div>
</div>
{/section}
</div>
<a href = index.php?module=users&view=new.tpl>{$LANG["New user"]}</a>

</body>
</html>