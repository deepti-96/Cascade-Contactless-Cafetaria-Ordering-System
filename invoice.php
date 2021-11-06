<?php include('partials-front/menu.php'); ?>


<?php 
        if(isset($_SESSION['order']))
        {
            echo $_SESSION['order'];//Displaying session message
            unset($_SESSION['order']);//Removing session message
        }
?>

<?php
        $sql = "SELECT * FROM tbl_order WHERE id=(SELECT MAX(id) FROM tbl_order)";
        $res = mysqli_query($conn, $sql);
        $row=mysqli_fetch_assoc($res);
   
        $food = $row['food'];
        $price = $row['price'];
        $qty = $row['qty'];
        $total = $row['total'];
        $order_date = $row['order_date'];
        $status = $row['status'];
        $customer_name = $row['customer_name'];
        $customer_id = $row['customer_id'];
        $customer_contact = $row['customer_contact'];
        $customer_email = $row['customer_email'];
    
?>

        <section class="invoice">
            <div class="invoice-box">
                <div class="container">
                <h2 class="text-center text-white">INVOICE</h2>
                    <fieldset>
                        
                        <div class="invoice-font">Name    :  <?php echo $customer_name;?></div>
                        <br>
                        <div class="invoice-font">ID      :  <?php echo $customer_id; ?></div>
                        <br>
                        <div class="invoice-font">Contact :  <?php echo $customer_contact; ?></div>
                        <br>
                        <div class="invoice-font">Email   :  <?php echo $customer_email; ?></div>
                        <br><br> <br> 
    
                        <div class="invoice-font">Food    :  <?php echo $food; ?></div>
                        <br>
                        <div class="invoice-font">Qty     :  <?php echo $qty; ?></div>
                        <br>
                        <div class="invoice-font">Total   :  ₹ <?php echo $total; ?></div>
                        <br>
                        <div class="invoice-font">Status  :  
                        <?php 
                                                // Ordered, In kitchen, Pickup ready, Cancelled

                                                if($status=="Ordered")
                                                {
                                                    echo "<label>$status</label>";
                                                }
                                                else if($status=="In kitchen")
                                                {
                                                    echo "<label style='color: orange;'>$status</label>";
                                                }
                                                else if($status=="Pickup ready")
                                                {
                                                    echo "<label style='color: #10ac84;'>$status</label>";
                                                }
                                                else if($status=="Delivered")
                                                {
                                                    echo "<label style='color: #3C91E6;'>$status</label>";
                                                }
                                                else if($status=="Cancelled")
                                                {
                                                    echo "<label style='color: #FF4500'>$status</label>";
                                                }
                            ?>
                            
                        </div>
                        <br><br>
                        <div>
                        <a href="#" class="btn btn-primary invoice-font">Order now</a>
                        </div>
                    </fieldset>
                </div>
            </div>
        </section>

<?php include('partials-front/footer.php'); ?>