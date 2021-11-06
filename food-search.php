<?php include('partials-front/menu.php');?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            <?php
                //Get the search keyword
                $search = mysqli_real_escape_string($conn, $_POST['search']);
            ?>
            
            <h2><a href="#" class="text-white">Food search: "<?php echo $search; ?>"</a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu"> 
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php

                //SQL query to get the food based on search keyword
                $sql="SELECT * FROM tbl_food WhERE title LIKE '%$search%' OR description LIKE '%$search%'";

                $res=mysqli_query($conn,$sql);
                $count=mysqli_num_rows($res);
                if($count>0)
                {
                    while($row=mysqli_fetch_assoc($res))
                    {
                        $id=$row['id'];
                        $title=$row['title'];
                        $price=$row['price'];
                        $description=$row['description'];
                        $image_name=$row['image_name'];
                        ?>
                        <div class="food-menu-box">
                            <div class="food-menu-img">
                                <?php
                                    if($image_name=="")
                                    {
                                        echo "<div class='error'>Image unavailable</div>";
                                    }
                                    else{
                                        ?>
                                        <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" alt="Dosa" class="img-responsive img-curve">
                                        <?php
                                    }
                                ?>
                                
                            </div>
                                <div class="food-menu-desc">
                                    <h4><?php echo $title;?></h4>
                                    <p class="food-price">₹<?php echo $price; ?></p>
                                    <p class="food-detail">
                                        <?php echo $description; ?>
                                    </p>
                                    <br>
                                    <a href="<?php echo SITEURL; ?>order.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Order now</a>
                                </div>
                                <div class="clearfix"> </div>
                            </div>
                        </div>
                        <?php
                    }
                }
                else{
                    echo "<div class='error'>Food not found</div>";
                }
            ?>

            <div class="clearfix"> </div>
        </div>
    </section>
    <!-- fOOD Menu Section Ends Here -->

    <?php include('partials-front/footer.php');?>