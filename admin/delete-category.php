<?php 
    include('../config/constants.php');
    //echo "Delete page";
    //Check whether the id and image_name value is set or not
    if(isset($_GET['id']) AND isset($_GET['image_name']))
    {
        //Get the value and delete
        //echo "Get value and delete";
        $id=$_GET['id'];
        $image_name=$_GET['image_name'];

        //Remove physical image file is available 
        if($image_name!="")
        {
            //Image is available. Hence, remove it
            $path="../images/category/".$image_name;
            $remove=unlink($path);

            //If failed to remove image, add error image and stop process
            if($remove==false)
            {
                //Set the session message
                $_SESSION['remove']="<div class='error'>Failed to remove category image</div>";
                //Redirect to manage category page
                header('location:'.SITEURL.'admin/manage-category.php');
                //Stop the process
                die();
            }
        }

        //Delete data from database
        $sql="DELETE FROM tbl_category WHERE id=$id";
        //Execute query
        $res=mysqli_query($conn, $sql);
        //Check whethr the data is deleted from database
        if($res==true)
        {
            //Set success message and redirect 
            $_SESSION['delete']="<div class='success'>Category deleted successfully</div>";
            //Redirect to manage category
            header('location:'.SITEURL.'admin/manage-category.php');
        }
        else{
            //Set fail message and redirect
            $_SESSION['delete']="<div class='error'>Failed to delete category</div>";
            //Redirect to manage category
            header('location:'.SITEURL.'admin/manage-category.php');
        }

    }
    else{
        //Redirect to manage category page
        header('location:'.SITEURL.'admin/manage-category');
    }
?>