<html>
<head>
<link rel="stylesheet" type="text/css" href="css/common.css" />
</head>
<body>
<br>
<form method=post action=settings/populate.php>

<input type="radio" name="schema" value="inetorg" checked> Simple Schema<br>
  <input type="radio" name="schema" value="ispenv2"> Machinet Mailserver<br>
  <input type="radio" name="schema" value="custom"> Custom <br>
<p>

<input type=text name="rootdn" value="cn=admin,cn=config"> rootdn <br>
<input type=password name="rootpass"> password <br>

<input type=submit value=populate>
</form>
</body>
</html>