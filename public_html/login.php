<?php
session_start();
if( isset($_POST['username']) && isset($_POST['password']) )
{
require_once("../code/functions.php");

global $error_code;

    if( ! checklogin($_POST['username'], $_POST['password']) )
        {
        
                // auth okay, setup session
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['password'] = $_POST['password'];

                                // redirect to required page
        header( "Location: index.php" );
         } else {
                
                                      // didn't auth go back to loginform
    header( "Location: login.html" );

     }
        } else {
                                                                        // username and password not given so go back to login
header( "Location: login.html" );

}





?>
