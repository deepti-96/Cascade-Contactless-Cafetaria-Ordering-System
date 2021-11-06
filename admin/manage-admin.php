<?php include('partials/menu.php');?>

        <!--Main Content Section Starts here-->
        <div class="main-content">
            <div class="wrapper">
                <h1>Manage Admin</h1>
                <br />

                <?php 
                    if(isset($_SESSION['add']))
                    {
                        echo $_SESSION['add'];//Displaying session message
                        unset($_SESSION['add']);//Removing session message
                    }
                    if(isset($_SESSION['delete']))
                    {
                        echo $_SESSION['delete'];//Displaying session message
                        unset($_SESSION['delete']);//Removing session message
                    }
                    if(isset($_SESSION['update']))
                    {
                        echo $_SESSION['update'];//Displaying session message
                        unset($_SESSION['update']);//Removing session message
                    }
                    if(isset($_SESSION['user-not-found']))
                    {
                        echo $_SESSION['user-not-found'];//Displaying session message
                        unset($_SESSION['user-not-found']);//Removing session message
                    }
                    if(isset($_SESSION['pwd-not-match']))
                    {
                        echo $_SESSION['pwd-not-match'];//Displaying session message
                        unset($_SESSION['pwd-not-match']);//Removing session message
                    }
                    if(isset($_SESSION['change-pwd']))
                    {
                        echo $_SESSION['change-pwd'];//Displaying session message
                        unset($_SESSION['change-pwd']);//Removing session message
                    }

                ?>
                <br><br><br>

                <!--VButton to add admin -->
                <a href="add-admin.php" class="btn-primary">Add Admin</a>
                <br />
                <br />
                <table class="tbl-full">
                    <tr>
                        <th>S.No.</th>
                        <th>Full Name</th>
                        <th>Username</th>
                        <th>Actions</th>
                    </tr>

                    <?php 
                        //Query to get all admins
                        $sql="SELECT * FROM tbl_admin";
                        //Execute Query
                        $res=mysqli_query($conn,$sql);

                        //Check whether the query is executed or not
                        if($res==TRUE)
                        {
                            //Count rows to check whether there is data in database or not
                            $count=mysqli_num_rows($res); //function to get all the rows in database

                            $sn=1; //Create a variable and assign value 
                            //Check the number of rows
                            if($count>0)
                            {
                                //There is data in the database
                                while($rows=mysqli_fetch_assoc($res))
                                {
                                    //Using while loop to get all data from database
                                    //And while loop will run as long as we have in database

                                    //Get individual data
                                    $id=$rows['id'];
                                    $full_name=$rows['full_name'];
                                    $username=$rows['username'];

                                    //Display the values in our table
                                    ?>
                                    <tr>
                                        <td><?php echo $sn++; ?></td>
                                        <td><?php echo $full_name; ?></td>
                                        <td><?php echo $username; ?></td>
                                        <td>
                                            <a href="<?php echo SITEURL; ?>admin/update-password.php?id=<?php echo $id; ?>" class="btn-primary">Change Password</a>
                                            <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id; ?>" class="btn-secondary">Update Admin</a>
                                            <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn-danger">Delete Admin</a>
                                        </td>
                                    </tr>  
                                    <?php
                                }
                            }
                            else{
                                //There is no data in the database
                            }
                        }
                    ?>

                </table>
            </div>
        </div>
        <!--Main Content Section Ends here-->

<?php include('partials/footer.php');?>