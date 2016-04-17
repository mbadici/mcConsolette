<html>
<head>
<link rel="stylesheet" type="text/css" href="css/common.css" />
</head>
<body>
WELCOME! {$smarty.post.username}<br>

<a href= index.php?module=users&view=list.tpl>{$LANG["Users"]}</a>
<br>
<a href= index.php?module=groups&view=list.tpl>{$LANG["Groups"]}</a>
<br>
<a href= index.php?module=domains&view=list.tpl>{$LANG["Domains"]}</a>
<br>
<a href= index.php?module=settings&view=list.tpl>{$LANG["Settings"]}</a>
</body>
</html>