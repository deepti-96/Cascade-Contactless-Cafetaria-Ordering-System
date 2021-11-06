<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Delay</h1>
        <br><br>

        <table class="tbl-full">
                    <tr>
                        <th>S.N.</th>
                        <th>Name</th>
                        <th>ID</th>
                        <th>Order Time</th>
                        <th>Arrival Time</th>
                        <th>Delay</th>
                        <th>Decision</th>
                    </tr>

                    <?php 
                        //Create a SQL Query to Get all the Food
                        $sql="SELECT O.customer_name, O.customer_id, O.order_date, A.id, A.registration_date
                        FROM tbl_order O JOIN facerecord A
                        ON (O.customer_name = A.username)
                        ORDER BY id DESC";


                        //Execute the qUery
                        $res = mysqli_query($conn, $sql);

                        //Count Rows to check whether we have foods or not
                        $count = mysqli_num_rows($res);

                        //Create Serial Number VAriable and Set Default VAlue as 1
                        $sn=1;

                        if($count>0)
                        {
                            //We have food in Database
                            //Get the Foods from Database and Display
                            while($row=mysqli_fetch_assoc($res))
                            {
                                //get the values from individual columns
                                $id = $row['id'];
                                $name = $row['customer_name'];
                                $id_number = $row['customer_id'];
                                $order = $row['order_date'];
                                $arrive = $row['registration_date'];
                            
                                
                                ?>

                                <tr>
                                    <td><?php echo $sn++; ?>. </td>
                                    <td><?php echo $name; ?></td>
                                    <td><?php echo $id_number; ?></td>
                                    <td><?php echo $order; ?></td>
                                    <td><?php echo $arrive; ?></td>
                                    <td>
                                    <?php 
                                        $start = strtotime($order);
                                        $end = strtotime($arrive);
                                        $minutes = floor(($end - $start)/(60));
                                        echo $minutes;
                                    ?> min
                                    </td>
                                    
                                    <td>
                                            <?php 
                                                //Good, Average, Bad

                                                if($minutes<=30)
                                                {
                                                    echo "<label style='color: #10ac84;'>No Penalty</label>";
                                                }
                                                else
                                                {
                                                    echo "<label style='color: red;'>Penalty</label>";
                                                }
                                            ?>
                                    </td>
                                </tr>

                                <?php
                            }
                        }
                        else
                        {
                            //Food not Added in Database
                            echo "<tr> <td colspan='5' class='error'> No delay data found </td> </tr>";
                        }

                    ?>
        </table>
            
    </div>
</div>

<?php include('partials/footer.php'); ?>