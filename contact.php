<?php include('partials-front/menu.php');?>

<section class="contact">
            <div class="contact-box">
                <div class="container">
                <h2 class="text-center text-white">FEEDBACK</h2>

                <form action="" method="POST" class="order">
                    <fieldset>
                    <div class="contact-label text-white">How would you rate us?</div>
                    <input type="radio" name="rate" value="Good"> Good  
                    <input type="radio" name="rate" value="Average"> Average 
                    <input type="radio" name="rate" value="Bad"> Bad  

                    <br><br>
                    <div class="contact-label text-white">Comments or Suggestions </div>
                    <textarea name="comment" rows="10" placeholder="Your comments" class="input-responsive" required></textarea>

                    <br><br>
                    <div class="contact-label text-white">Full Name</div>
                    <input type="text" name="full-name" placeholder="E.g. Deepti Ravi Kumar" class="input-responsive" required>

                    <br><br>
                    <div class="contact-label text-white">ID number</div>
                    <input type="text" name="id-number" placeholder="E.g. 19Zxxx" class="input-responsive" required>
                    
                    <br><br>
                    <input type="submit" name="submit" value="Submit feedback" class="btn btn-primary">
            
                    </fieldset>
                </form>
                </div>

            <?php 
                //Check if the submit button is clicked
                if(isset($_POST['submit']))
                {
                    
                    // Get the data from Form
                    if(isset($_POST['rate']))
                    {
                        $rate = $_POST['rate'];
                    }
                    else
                    {
                        $rate = "Average"; //Setting the Default Value
                    }
                    $comment = $_POST['comment'];
                    $full_name = $_POST['full-name'];
                    $id_number = $_POST['id-number'];

                    // Insert Into Database

                    //Create a SQL Query to Save or Add feedback
                    // For Numerical we do not need to pass value inside quotes '' But for string value it is compulsory to add quotes ''
                    $sql = "INSERT INTO tbl_feedback SET 
                        rate = '$rate',
                        comment = '$comment',
                        customer_name = '$full_name',
                        customer_id = '$id_number'
                    ";

                    //Execute the Query
                    $res = mysqli_query($conn, $sql);

                    //Check whether data inserted or not
                    // Redirect with Message to Manage Food page
                    if($res == true)
                    {
                        //Data inserted Successfullly
                        $_SESSION['add'] = "<div class='success text-center'>Feedback submitted Successfully. Thank you!</div>";
                        header('location:'.SITEURL);
                    }
                    else
                    {
                        //FAiled to Insert Data
                        $_SESSION['add'] = "<div class='error text-center'>Failed to submit feedback. Please try again!</div>";
                        header('location:'.SITEURL);
                    }

                    
                }

            ?>



            </div>
</section>

<div class="container">
        <h2 class="text-center">Contact</h2>
        <div class="text-center">
            <p>Telephone : +91 98765xxxxx</p>
            <p>E-mail : service@cascade.in</p>
            <p>Address : XX Lane, YY Street, ZZ City</p>
            <p>Opening Hours : 10AM to 8PM IST</p>
        </div>
</div>

<?php include('partials-front/footer.php');?>