<?php include("detail_front/menu.php") ?>

    <section class="food-search text-center">
        <div class="container">
            <?php 
                $search = isset($_POST['search']) ? $_POST['search'] : '';
                $search = mysqli_real_escape_string($conn, $_POST['search']);
            ?>
            <h2>Đồ ăn mà bạn tìm <a href="#" class="text-white">"<?php echo $search;?>"</a></h2>
        </div>

    </section>

    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Menu đồ ăn</h2>

            <?php 

                $sql = "SELECT * FROM tbl_food WHERE title LIKE '%$search%' OR description LIKE '%$search%'";
                // echo $sql;
                $res = mysqli_query($conn , $sql);
                $count = mysqli_num_rows($res);

                if ($count > 0) {
                    while ($row = mysqli_fetch_assoc($res)) {
                        $id = $row['id'];
                        $title = $row['title'];
                        $description = $row['description'];
                        $price = $row['price'];
                        $image_name = $row['image_name'];
                        ?>
                            <div class="food-menu-box">
                                <div class="food-menu-img">
                                <?php 
                                    if ($image_name == "") {
                                        echo '<div class="error">Ảnh không có sẵn !</div>';
                                    }else {
                                        ?>
                                            <img src="<?php echo SITEURL;?>images/food/<?php echo $image_name;?>" style="width: 100px; height: 100px;" class="img-responsive img-curve">
                                        <?php 
                                    }
                                ?>
                                </div>

                                <div class="food-menu-desc">
                                    <h4><?php echo $title;?></h4>
                                    <p class="food-price"><?php echo $price;?> VND</p>
                                    <p class="food-detail">
                                        <?php echo $description;?>.
                                    </p>
                                    <br>
                                    <!-- check image -->

                                    <a href="<?php echo SITEURL;?>order.php?food_id=<?php echo $id;?>" class="btn btn-primary">Đặt Ngay</a>
                                </div>
                            </div>
                        <?php    

                    }
                }else {
                    echo '<div class="error">Food Not Add !</div>';
                }
            ?>

            <div class="clearfix"></div>
        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->


<?php include("detail_front/footer.php") ?>