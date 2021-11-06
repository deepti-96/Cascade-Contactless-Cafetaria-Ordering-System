<?php
    //Inlcude constants.php for SITEURL
    include('../config/constants.php');
    
    //1. Destroy the session 
    session_destroy();//Unsets $_SESSION['user']

    //2. Redirect to login page
    header('location:'.SITEURL.'admin/login.php');

?>