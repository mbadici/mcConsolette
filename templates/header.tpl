<html xmlns="http://www.w3.org/1999/xhtml">
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/common.css" />
<script src="include/jquery.min.js" type="text/javascript"></script>
</head>
<body>
<div class="header">
   <i>McConsolette</i>
<p>

<a href = index.php?module=login&view=welcome.tpl><input type="button" name="HOME" value="HOME" /></a>
<a href = index.php?module=users&view=new.tpl  > <input type="button" name="New USER" value= "{$LANG["New user"] }" /></a> 
<a href = index.php?module=groups&view=list.tpl  > <input type="button" name="Groups" value="{$LANG["Groups"]}" /></a> 
<a href = index.php?module=domains&view=select.tpl > <input type="button" name="Select Domain" value="{$LANG["Select domain"]}" /> </a>
<a href = logout.php > <input type="button" name="logout" value="{$LANG["logout"]}" /> </a>
</p>
</div>
<div class="continut">

