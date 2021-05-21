<html>
<head>
<link rel="stylesheet" type="text/css" href="css/common.css" />
</head>

<body>
<div class="container">

{section   loop=$result name=ind}
<div class="row">
<div class="col-md-2"> <a href = index.php?module=distgroups&view=detail.tpl&user={$result[ind][0]|escape: 'url'}>{$result[ind][3]}</a></div>
<div><a class="btn btn-secondary"  href = index.php?module=distgroups&view=delete.tpl&user={$result[ind][0]|escape: 'url'}>{$LANG["Delete"]}</a></div> 
</div>
{/section}
</div>
<a href = index.php?module=distgroups&view=new.tpl>{$LANG["New distribution group"]}</a>

</body>
</html>