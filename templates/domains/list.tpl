<html>
<head>
<link rel="stylesheet" type="text/css" href="css/common.css" />
</head>
<body>
<div class="container">



{section   loop=$result name=ind}
<div class="row"> 
<div class="col-md-2"> <a href = index.php?module=domains&view=detail.tpl&user={$result[ind][0]|escape: 'url'}>{$result[ind][1]}</a></div>
<div><a class="btn btn-secondary"  href = index.php?module=domains&view=delete.tpl&user={$result[ind][0]|escape: 'url'}>Delete</a></div> 
</div>
{/section}

</div>
<a href = index.php?module=domains&view=new.tpl>{$LANG["New domain"]}</a>

</body>
</html>