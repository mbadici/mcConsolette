<html>
<head>
 <link rel="stylesheet" type="text/css" href="css/common.css" />
{literal}
<script language="javascript"> 

   function DoPost(userdn,val){
//	var  allstring = '{userdn: userdn,op: val}';

	$.post('index.php?module=users&view=disable.tpl&user='+userdn , {op: val}, location.reload(true));  
//	    $.post('index.php?module=users&view=disable.tpl&user='+userdn , {op: val});



//	location.reload(true);
    };
</script>
{/literal}
</head>

<body>
<div class="container">
{$domain}
{section   loop=$result name=ind}
<div class="row"> 
<div class="col-md-2" > <a href = index.php?module=users&view=detail.tpl&user={$result[ind][0]|escape: 'url'}>{$result[ind][1]}</a></div>
<div class="col-md-2"><a class="btn btn-secondary" href = index.php?module=users&view=delete.tpl&user={$result[ind][0]|escape: 'url'}>{$LANG["Delete"]}</a></div>

{if $result[ind][2] ne 'FALSE'}
{assign var="text" value=$LANG["Disable"]}  {assign var="val" value="disable" }

{else}
   {assign var="text" value=$LANG["Enable"]} {assign var="val" value="enable"}
{/if}
<div class="col-md-2"><a class="btn btn-secondary" href="javascript:DoPost('{$result[ind][0]}','{$val}')">{$text}

  </a></div>
<div class="col-md-2"><a class="btn btn-secondary"  href = index.php?module=users&view=changepass.tpl&user={$result[ind][0]|escape: 'url'}>{$LANG["Change password"]}</a> </div>
</div>
{/section}
</div>
<a href = index.php?module=users&view=new.tpl>{$LANG["New user"]}</a>

</body>
</html>
