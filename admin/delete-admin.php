<?php 
    //Include constants.php file here
    include('../config/constants.php');
    //1. Get the id of the admin to be deleted
    $id = $_GET['id'];

    //2. Create SQL query to delete admin
    $sql ="DELETE FROM tbl_admin WHERE id=$id";
    //Execute the query
    $res=mysqli_query($conn, $sql);
    //Check whether the query executed successfully
    if($res==TRUE)
    {
        //Query executed successfully and Admin deleted
        //echo "Admin Deleted";
        //Create session variable to display message
        $_SESSION['delete']="<div class='success'>Admin Deleted Successfully</div>";
        //Redirect to manage admin page
        header('location:'.SITEURL.'admin/manage-admin.php');
    }
    else{
        //Failed to delete the admin
        //echo "Failed to delete admin";
        $_SESSION['delete']="<div class='error'>Failed to Delete admin. Try again later</div>";
        //Redirect to manage admin page
        header('location:'.SITEURL.'admin/manage-admin.php');

    }
?>