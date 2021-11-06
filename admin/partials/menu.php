<?php 
    include('../config/constants.php');
    include('login-check.php');
?>

<html>
    <head>
        <title>Cascade-Home page</title>

        <link rel="stylesheet" href="../css/admin.css">
    </head>
    
    <body>
        <!--Menu Section Starts here-->
        <div class="menu text-center">
            <div class="wrapper">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="manage-admin.php">Admin</a></li>
                    <li><a href="manage-category.php">Category</a></li>
                    <li><a href="manage-food.php">Food</a></li>
                    <li><a href="manage-order.php">Order</a></li>
                    <li><a href="manage-delay.php">Delay</a></li>  
                    <li><a href="manage-feedback.php">Feedback</a></li>      
                    <li><a href="logout.php" class="text-right">Logout</a></li> 
                </ul>
            </div>
        </div>
        <!--Menu Section Ends here-->
    </body>
</html>