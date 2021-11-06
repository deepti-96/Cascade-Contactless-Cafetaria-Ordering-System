<?php include('partials/menu.php');?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
        <br><br>

        <?php
            if(isset($_SESSION['add'])) //Checking if the session id set or not
            {
                echo $_SESSION['add']; //Display the session message if SET
                unset($_SESSION['add']); //Remove session message
            }
        ?>

        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Full Name:</td>
                    <td>
                        <input type="text" name="full_name" placeholder="Enter your name">
                    </td>
                </tr>
                <tr>
                    <td>Username:</td>
                    <td>
                        <input type="text" name="username" placeholder="Enter your username">
                    </td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td>
                        <input type="password" name="password" placeholder="Enter your password">
                    </td>
                </tr>
                <tr>
                    <td colspana="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>

    </div>

</div>
<?php include('partials/footer.php');?>

<?php 
    //Process the value form and save it in the database
    //Check whether the submit button is clicked or not
    if(isset($_POST['submit']))
    {
        //Button clicked
        //echo "Button Clicked";
        //1.Get the data from form
        $full_name=$_POST['full_name'];
        $username=$_POST['username'];
        $password=md5($_POST['password']);//Password encryption with MD5

        //2.SQL Query to save the data into database
        $sql="INSERT INTO tbl_admin SET
            full_name='$full_name',
            username='$username',
            password='$password'
        ";

        //3. Executing Query and Saving Data into Database
        $res = mysqli_query($conn, $sql) or die(mysqli_error());

        //4. Chec whether the data is inserted or not and display appropriate message
        if($res==TRUE)
        {
            //Data inserted
            //echo "Data Inserted";
            //Create a session variable to display message
            $_SESSION['add']="<div class='success'>Admin Added Successfully </div>";
            //Redirect page
            header("location:".SITEURL.'admin/manage-admin.php');
        }
        else{
            //Data not inserted
            //echo "Data not inserted";
            //Create a session variable to display message
            $_SESSION['add']="<div class='error'>Failed to Admin Added</div>";
            //Redirect page to add admin
            header("location:".SITEURL.'admin/manage-admin.php');
        }

    }
?>