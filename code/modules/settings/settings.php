<?php
function settings($view,$param)
{
switch($view){
case "upload.tpl":
  {
    $target_dir = "../code/ldif/";
    $target_file = $target_dir . basename($_FILES["ldif"]["name"]);
print_r($_FILES);
  $tmp_name = $_FILES["ldif"]["tmp_name"];
       if (!$tmp_name) continue;

       $name = $_FILES["ldif"]["name"];
    if ($error == UPLOAD_ERR_OK)
    {
        if ( move_uploaded_file($tmp_name, $target_file) )
            $uploaded_array[] .= "Uploaded file '".$name."'.<br/>\n";
        else
            $errormsg .= "Could not move uploaded file '".$tmp_name."' to '".$name."'<br/>\n";
    }
    else $errormsg .= "Upload error. [".$error."] on file '".$name."'<br/>\n";

  }



}
  return $errormsg;
}

?>
