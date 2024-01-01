<?php include("detail_front/menu.php") ?>
    <!-- css -->
    <style>
        .pop:hover {
            border-top-color: green !important;
            transform: scale(1.03);
            transition: all 0.3s;
        }
    </style>

    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">Menu ở đây !</h2>
        <div class="h-line bg-dark"></div>
        <p class="text-center mt-3">       
            Khám phá menu của chúng tôi, nơi hội tụ những món ngon độc đáo, từ món khai vị tới món chính, hứa hẹn mang đến trải nghiệm ẩm thực đầy phấn khích và đa dạng.
        </p>
    </div>

    <div class="container">
        <!-- search here  -->
        <form class="d-flex mt-3" action="<?php echo SITEURL; ?>food-search.php" method="POST">
            <input class="form-control me-2" type="search" placeholder="Tìm kiếm" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Tìm</button>
        </form>
        <!-- content -->
        <div class="row mt-5">
            <?php 
                $sql =  "SELECT * FROM tbl_food WHERE active = 'Yes'"; 
                $res = mysqli_query($conn , $sql);
                $count = mysqli_num_rows($res);
                
                if ($count > 0) {
                    $productIndex = 1;
                    while($row = mysqli_fetch_assoc($res)){
                        $id = $row['id'];
                        $title = $row['title'];
                        $description = $row['description'];
                        $price = $row['price'];
                        $image_name = $row['image_name'];
                        $randomNumberId = 'randomNumber_' . $productIndex;
                        ?>
                            <div class="col-lg-4 col-md-6 mb-5 px-4">
                                <div class="bg-white rounded shadow p-4 border-top border-4 border-dark pop">
                                    <div class="d-block align-items-center mb-2">
                                        <h4><?php echo $title;?></h4>
                                        <p class="food-price"><?php echo $price;?> VND</p>
                                        <p class="food-detail" style="height: 60px;">
                                            <?php echo $description;?>
                                        </p>
                                        <?php 
                                            if ($image_name == "") {
                                                echo '<div class="error">Image not available !</div>';
                                            }else {
                                                ?>
                                                    <img style="width: 100%; height: 300px; border-radius: 3px;" src="<?php echo SITEURL;?>/images/food/<?php echo $image_name;?>" class="img-responsive img-curve">
                                                <?php 
                                            }
                                        ?>

                                        <div style="display: flex; align-items: center;" class="rating mb-2 mt-4">
                                            <h6 class="mb-0 me-3 fw-bold" style=" font-size: 18px; font-family: 'Quicksand', sans-serif;">Số lượng người mua </h6>
                                            <span>
                                                <i class="bi bi-person-circle"></i>
                                                <span id="<?php echo $randomNumberId; ?>"></span>
                                            </span>
                                            <script>
                                                // Tạo một số ngẫu nhiên từ 1 đến 100 và đặt vào phần tử có id duy nhất
                                                var randomNumber<?php echo $productIndex; ?> = Math.floor(Math.random() * 100) + 1;
                                                document.getElementById("<?php echo $randomNumberId; ?>").innerText = randomNumber<?php echo $productIndex; ?>;
                                            </script>
                                        </div>

                                        <div style="display: flex; align-items: center; " class="">
                                            <h6 class="m-0 me-3">Đánh giá</h6>
                                            <span>
                                                <i class="bi bi-star-fill text-warning "></i>
                                                <i class="bi bi-star-fill text-warning "></i>
                                                <i class="bi bi-star-fill text-warning "></i>
                                                <i class="bi bi-star-fill text-warning "></i>
                                                <i class="bi bi-star-fill text-warning "></i>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-evenly mt-4 mb-2">
                                        <a style="padding: 8px 12px; font-size: 18px;" href="<?php echo SITEURL;?>order.php?food_id=<?php echo $id;?>" class="btn btn-sm text-white custom-bg shadow-none rounded">Đặt ngay</a>
                                    </div>

                                </div>
                            </div>
                        <?php 
                        $productIndex++;
                    }
                }else{
                    echo '<div class="error">Foods Not Add !</div>';
                }
            ?>
        </div>
    </div>




    <!-- fOOD MEnu Section Starts Here -->



<?php include("detail_front/footer.php") ?>