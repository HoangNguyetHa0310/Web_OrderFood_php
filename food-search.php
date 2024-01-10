<?php include("detail_front/menu.php") ?>

    <style>
        .pop:hover {
            border-top-color: green !important;
            transform: scale(1.03);
            transition: all 0.3s;
        }
    </style>


    <div class="my-5 px-4">
        <div class="container">
            <?php 
                $search = isset($_POST['search']) ? $_POST['search'] : '';
                $search = mysqli_real_escape_string($conn, $_POST['search']);
            ?>
            <h2>Đồ ăn mà bạn tìm <a href="#"  style="color: black; font-size: 32px;">"<?php echo $search;?>"</a></h2>
        </div>
    </div>

    <div class="container">
        <!-- content -->
        <div class="row mt-5">
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
                            <div class="col-lg-4 col-md-6 mb-5 px-4">
                                <div class="bg-white rounded shadow p-4 border-top border-4 border-dark pop">
                                    <div class="d-block align-items-center mb-2">
                                        <h4><?php echo $title;?></h4>
                                        <p class="food-price"><?php echo $price;?> VND</p>
                                        <p class="food-detail">
                                            <?php echo $description;?>.
                                        </p>
                                        <br>
                                        <?php 
                                            if ($image_name == "") {
                                                echo '<div class="error">Không có ảnh!</div>';
                                            }else{
                                                ?>
                                                    <img class="img-responsive img-curve" src="<?php echo SITEURL?>images/food/<?php echo $image_name;?>"class="img-responsive img-curve" style="width: 100%; height: 300px; border-radius: 3px;">    
                                                <?php 
                                            }
                                        ?>
                                    </div>

                                    <div class="d-flex justify-content-evenly mt-4 mb-2">
                                    <a href="<?php echo SITEURL;?>order.php?food_id=<?php echo $id;?>" class="btn btn-primary">Đặt đồ ngay !</a>
                                    </div>

                                </div>
                            </div>
                        <?php 
                    }
                } else {
                    echo '<div class="error">Đồ ăn không có !</div>';
                }
            ?>
        </div>
    </div>




    <!-- fOOD MEnu Section Starts Here -->



<?php include("detail_front/footer.php") ?>