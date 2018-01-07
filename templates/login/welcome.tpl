<html>
<head>
<link rel="stylesheet" type="text/css" href="css/common.css" />
</head>
<body>

<div class="container">

 WELCOME {$username}  ! 


        <!-- Example row of columns -->

          <div class="col-md-4">
<a href= index.php?module=users&view=list.tpl>{$LANG["Users"]}</a>
</div>
<div class="col-md-4">

<a href= index.php?module=groups&view=list.tpl>{$LANG["Groups"]}</a>
</div>
<div class="col-md-4">

<a href= index.php?module=domains&view=list.tpl>{$LANG["Domains"]}</a>
</div>
<div class="col-md-4">

<a href= index.php?module=settings&view=list.tpl>{$LANG["Settings"]}</a>
</div>
</div>
</body>
</html>