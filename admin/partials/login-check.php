<?php 
    //Authorization - access control
    //Check whether the user has logged in ot not

    if(!isset($_SESSION['user'])) //If user session is not set
    {
        //User hasnt looged in 
        $_SESSION['no-login-message']="<div class='error text-center'> Please login to access Admin Panel</div>";
        //Redirect to login page with message
        header('location:'.SITEURL.'admin/login.php');
    }

?>