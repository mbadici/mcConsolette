<html xmlns="http://www.w3.org/1999/xhtml">
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/common.css" />
<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
<script src="js/jquery.min.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>
</head>
<body>
<div class="header">
   <i>McConsolette</i>
<p>


<a href = index.php?module=login&view=welcome.tpl><input type="button" class="btn btn-outline-success my-2 my-sm-0" name="HOME" value="HOME" /></a>
<a href = index.php?module=users&view=new.tpl  > <input type="button" class="btn btn-outline-success my-2 my-sm-0" name="New USER" value= "{$LANG["New user"] }" /></a> 
<a href = index.php?module=groups&view=list.tpl  > <input type="button" class="btn btn-outline-success my-2 my-sm-0" name="Groups" value="{$LANG["Groups"]}" /></a> 
<a href = index.php?module=distgroups&view=list.tpl  > <input type="button" class="btn btn-outline-success my-2 my-sm-0" name="Distgroups" value="{$LANG["Distgroups"]}" /></a> 
<a href = index.php?module=domains&view=select.tpl > <input type="button" class="btn btn-outline-success my-2 my-sm-0" name="Select Domain" value="{$LANG["Select domain"]}" /></a>
<a href = logout.php > <input type="button" class="btn btn-outline-success my-2 my-sm-0" name="logout" value="{$LANG["logout"]}" /> </a>
</p>
</div>
<div class="continut">

