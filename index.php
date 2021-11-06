<?php include('partials-front/menu.php');?>

    <!--Food Search Section starts here-->
    <section class="food-search text-center"> 
        <div class="container">
            
            <form action="<?php echo SITEURL; ?>food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Food" required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!--Food Search Section ends here-->

    
    <?php 
        if(isset($_SESSION['add']))
        {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }
    ?>

    <!--Categories Section starts here-->
    <section class="categories"> 
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>
            <?php
                //Create SQL query to dispolay categories from database
                $sql="SELECT * FROM tbl_category WHERE active='Yes' AND featured='Yes' LIMIT 3";
                $res= mysqli_query($conn, $sql);
                $count=mysqli_num_rows($res);

                if($count>0)
                {
                    //Categories available
                    while($row = mysqli_fetch_assoc($res))
                    {
                        //Get the values including id, title and image
                        $id = $row['id'];
                        $title=$row['title'];
                        $image_name=$row['image_name'];
                        ?>

                        <a href="<?php echo SITEURL; ?>category-foods.php?category_id=<?php echo $id;?>">
                            <div class="box-3 float-container"> 
                                <?php 
                                    if($image_name=="")
                                    {
                                        echo "<div class='error'>Image unavailable</div>";
                                    }
                                    else{
                                        ?>
                                        <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name;?>" alt="Dosa" class="img-responsive img-curve">
                                        <?php
                                    }
                                ?>
                                <h3 class="float-text text-white"><?php echo $title;?></h3>
                            </div>
                        </a>

                        <?php
                    }
                }
                else{
                    //Categories unavailable
                    echo "<div class='error'>Category unavailable</div>";
                }
            ?>
            
            <div class="clearfix"></div>
        </div>
    </section>
    <!--Categories Section Section ends here-->

    <!--Food Menu Section starts here-->
    <section class="food-menu"> 
        <div class="container">
            <h2 class="text-center">Food Menu</h2>
            <?php
            //Getting food from the database which are both active and featured
            $sql2="SELECT * FROM tbl_food WHERE active='Yes' AND featured='Yes' LIMIT 6";
            $res2=mysqli_query($conn,$sql2);
            $count2=mysqli_num_rows($res2);
            if($count2>0)
            {
                //Food available
                while($row=mysqli_fetch_assoc($res2))
                {
                    $id = $row['id'];
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
                                //Image unavailable
                                echo "<div class='error'>Image unavailable</div>";
                            }
                            else{
                                //image available
                                ?>
                                <img src="<?php echo SITEURL;?>images/food/<?php echo $image_name;?>" class="img-responsive img-curve">
                                <?php
                            }
                        ?>
                        </div>

                        <div class="food-menu-desc">
                            <h4><?php echo $title;?></h4>
                            <p class="food-price">₹<?php echo $price;?></p>
                            <p class="food-detail">
                                <?php echo $description;?>
                            </p>
                            <br>
                            <a href="<?php echo SITEURL; ?>order.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Order now</a>
                        </div>
                    </div>
                
                    <?php
                }
            }
            else{
                //Food unavailable
                echo "<div class='error>Food not available</div>";
            }
            ?>

            <div class="clearfix"> </div>
        </div>
        <p class="text-center">
            <a href="<?php echo SITEURL; ?>foods.php">See All Foods</a>
        </p>
    </section>
    <!--Food Menu Section Section ends here-->

    <?php include('partials-front/footer.php');?>