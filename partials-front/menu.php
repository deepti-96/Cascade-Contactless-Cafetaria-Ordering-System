<?php include('config/constants.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important for making responsive websites-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cascade Website</title>

    <!-- Link the CSS file-->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!--Navbar Section starts here-->
    <section class="navbar"> 
        <div class="container">
            <div class="logo">
                <img src="images/logo.jpeg" alt="Cafetaria Logo" class="img-responsive"> 
            </div>

            <div class="menu text-right">
                <ul>
                    <li> 
                        <a href="<?php echo SITEURL; ?>">Home</a>
                    </li>

                    <li> 
                        <a href="<?php echo SITEURL; ?>categories.php">Categories</a>
                    </li>

                    <li> 
                        <a href="<?php echo SITEURL; ?>foods.php">Food</a>
                    </li>

                    <li> 
                        <a href="<?php echo SITEURL; ?>contact.php">Contact</a>
                    </li>
                </ul>
            </div>
            <div class= "clearfix"></div>
        </div>
    </section>
    <!--Navbar Section ends here-->