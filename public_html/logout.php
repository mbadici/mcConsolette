<?php
//unset($_SESSION['username']);
session_start();
session_destroy();
header("location:login.html");
?>
