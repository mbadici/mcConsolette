<html>
<head>
<link rel="stylesheet" type="text/css" href="css/common.css" />
</head>
<body>
<form enctype="multipart/form-data" action="index.php?module=settings&view=upload.tpl" method="POST">
    <!-- MAX_FILE_SIZE must precede the file input field -->
    <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
<br>    <!-- Name of input element determines name in $_FILES array -->
    upload ldif: <input name="ldif" type="file" />
</br>    <input type="submit" value="Upload" />
</form>




</body>
</html>