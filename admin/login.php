<?php include('../config/constants.php');?>
<html>
    <head>
        <title>Login - Cascade</title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>
    <body>
        <section class="login">
            <div class="login-box">
                <div class="container">
                    <fieldset>
                        <legend class="text-center login-font">LOGIN</legend>
                        <br>

                        <?php 
                            if(isset($_SESSION['login']))
                            {
                                echo $_SESSION['login'];
                                unset($_SESSION['login']);
                            }
                            if(isset($_SESSION['no-login-message']))
                            {
                                echo $_SESSION['no-login-message'];
                                unset($_SESSION['no-login-message']);
                            }
                        ?>
                        <br>

                    <!--Login form starts here -->
                    <form action="" method="POST" class="text-center">
                        Username: 
                        <input type="text" name="username" placeholder="Enter Username">
                        <br><br>

                        Password: 
                        <input type="password" name="password" placeholder="Enter Password">
                        <br><br>

                        <input type="submit" name="submit" value="Login" class="btn-danger">
                        <br><br>
                    </form>
                    <!--Login form ends here -->
                    </fieldset>
                </div>
            </div>
        </section>
    </body>
</html>

<?php 
    //Check whether the submit button is clicked or not
    if(isset($_POST['submit']))
    {
        //Process for login
        //1. Get the data from login form
        $username=mysqli_real_escape_string($conn, $_POST['username']);
        $password=mysqli_real_escape_string($conn, md5($_POST['password']));

        //2.SQL to check whether the user with username with username and password exists or not
        $sql="SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";

        //3. Execute the query
        $res=mysqli_query($conn, $sql);

        //4. Count rows to check whether the user exists or not
        $count=mysqli_num_rows($res);
        if($count==1)
        {
            //User available and login success
            $_SESSION['login']="<div class='success'>Login successful</div>";
            $_SESSION['user']=$username;//To check if the user has logged in and logout will unset it.

            //Redirect to home page or dashboard
            header('location:'.SITEURL.'admin/');
        }
        else{
            //User not available and login failure
            $_SESSION['login']="<div class='error text-center'>Username name or password is invalid</div>";
            //Redirect to home page or dashboard
            header('location:'.SITEURL.'admin/login.php');
        }
    }
?>

<?php include('partials/footer.php');?>
