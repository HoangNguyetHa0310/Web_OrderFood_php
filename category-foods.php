<?php include("detail_front/menu.php") ?>

    <!-- check category id  --> 
    <?php 
       if (isset($_GET['category_id'])) {
            $category_id = $_GET['category_id'];
            $sql = "SELECT title FROM tbl_category WHERE id=$category_id";
            $res = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($res);
            $row = mysqli_fetch_assoc($res);
            $category_title = $row['title'];

        }else {
            header('location'.SITEURL);
        }
    ?>


    <section class="food-search text-center">
        <div class="container">
            <?php 
                $search = isset($_POST['search']) ? $_POST['search'] : '';
            ?>
            <h2>Đồ ăn bạn tìm <a href="#" class="text-white">"<?php echo $category_title;?>"</a></h2>
        </div>

    </section>


    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Menu đồ ăn</h2>

            <?php 
                $sql2 = "SELECT * FROM tbl_food WHERE category_id = $category_id ";
                $res2 = mysqli_query($conn ,$sql2);
                $count2 = mysqli_num_rows($res2);
                if ($count2 > 0) {
                    while ($row2 = mysqli_fetch_assoc($res2)) {
                        $id = $row2['id'];
                        $title = $row2['title'];
                        $price = $row2['price'];
                        $description = $row2['description'];
                        $image_name = $row2['image_name'];

                        ?>
                             <div class="food-menu-box">
                                <div class="food-menu-img">
                                    <?php 
                                        if ($image_name == "") {
                                            echo '<div class="error">Không có ảnh!</div>';
                                        }else{
                                            ?>
                                                <img src="<?php echo SITEURL?>images/food/<?php echo $image_name;?>"class="img-responsive img-curve" style="100px" height="100px">    
                                            <?php 
                                        }
                                    ?>
                                </div>

                                <div class="food-menu-desc">
                                    <h4><?php echo $title;?></h4>
                                    <p class="food-price"><?php echo $price;?> VND</p>
                                    <p class="food-detail">
                                        <?php echo $description;?>
                                    </p>
                                    <br>

                                    <a href="<?php echo SITEURL;?>order.php?food_id=<?php echo $id;?>" class="btn btn-primary">Đặt đồ ngay !</a>
                                </div>
                            </div>
                        <?php 
                    }
                }else {
                    echo '<div class="error">Đồ ăn không có !</div>';
                }
            ?>

            <div class="clearfix"></div>
        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->


<?php include("detail_front/footer.php") ?>