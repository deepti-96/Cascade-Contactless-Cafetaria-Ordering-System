<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Feedback</h1>
        <br><br>

        <table class="tbl-full">
                    <tr>
                        <th>S.N.</th>
                        <th>Name</th>
                        <th>ID</th>
                        <th>Rating</th>
                        <th>Comments</th>
                    </tr>

                    <?php 
                        //Create a SQL Query to Get all the Food
                        $sql = "SELECT * FROM tbl_feedback ORDER BY id DESC";

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
                                $rate = $row['rate'];
                                $comment = $row['comment'];
                                $name = $row['customer_name'];
                                $id_number = $row['customer_id'];
                                ?>

                                <tr>
                                    <td><?php echo $sn++; ?>. </td>
                                    <td><?php echo $name; ?></td>
                                    <td><?php echo $id_number; ?></td>
                                    <td>
                                            <?php 
                                                //Good, Average, Bad

                                                if($rate=="Good")
                                                {
                                                    echo "<label style='color: #10ac84;'>$rate</label>";
                                                }
                                                else if($rate=="Average")
                                                {
                                                    echo "<label style='color: blue;'>$rate</label>";
                                                }
                                                else if($rate=="Bad")
                                                {
                                                    echo "<label style='color: red;'>$rate</label>";
                                                }
                                            ?>
                                    </td>
                                    <td><?php echo $comment; ?></td>
                                </tr>

                                <?php
                            }
                        }
                        else
                        {
                            //Food not Added in Database
                            echo "<tr> <td colspan='5' class='error'> No feedback found </td> </tr>";
                        }

                    ?>
        </table>
    </div>
</div>

<?php include('partials/footer.php'); ?>