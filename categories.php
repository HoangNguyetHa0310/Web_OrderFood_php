<?php include("detail_front/menu.php") ?>

    <style>
        .pop:hover {
            border-top-color: green !important;
            transform: scale(1.03);
            transition: all 0.3s;
        }
    </style>

    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">Nguyên Liệu</h2>
        <div class="h-line bg-dark"></div>
        <p class="text-center mt-3">       
            Nguyên liệu là nguồn cảm hứng vô tận, nơi mọi sự sáng tạo bắt đầu và hương vị đích thực được tạo nên.
        </p>
    </div>

    <div class="container">
        <div class="row justify-content-evenly">
            <?php
            $sql = "SELECT * FROM tbl_category WHERE active = 'Yes'";
            $res = mysqli_query($conn, $sql);

            if (mysqli_num_rows($res) > 0) {
                $productIndexEgg = 1;
                while ($row = mysqli_fetch_assoc($res)) {
                    $id = $row['id'];
                    $title = $row['title'];
                    $image_name = $row['image_name'];
                    $randomEgg = "randomEgg" . $productIndexEgg; // Tạo id ngẫu nhiên

                    // Tạo một số ngẫu nhiên từ 1 đến 100
                    $randomNumber = rand(1, 100);
            ?>
                    <div class="col-lg-4 col-md-3 col-sm-6">
                        <div class="card text-center bg-white rounded shadow pt-4 my-4 pop">
                            <a href="<?= SITEURL; ?>category-foods.php?category_id=<?= $id; ?>" style="text-decoration: none;">
                                <?php
                                if ($image_name == "") {
                                    echo '<div class="error">Thêm ảnh thất bại!</div>';
                                } else {
                                ?>
                                    <img src="<?= SITEURL; ?>images/category/<?= $image_name; ?>" class="img-responsive img-curve" style="width: 100%; height: 450px; margin-top: -27px; border-radius: 3px;">
                                <?php
                                }
                                ?>
                                <div class="card-body">
                                    <h4 class="card-title text-dark" style="float: left;"><?= $title; ?></h4>
                                    <span style="color: blue;">
                                        <i class="bi bi-egg-fill" ></i> Còn 
                                        <span id="<?= $randomEgg; ?>"></span>
                                    </span><br>
                                    <span style="color: red;">
                                        <i class="bi bi-egg-fried"></i>
                                        <span id="<?= $randomEgg; ?>"> Sắp hết hàng </span>
                                    </span>
                                </div>
                                <script>
                                    // Đặt số ngẫu nhiên vào phần tử có id duy nhất
                                    document.getElementById("<?= $randomEgg; ?>").innerText = <?= $randomNumber; ?>;
                                </script>
                            </a>
                        </div>
                    </div>
            <?php
                    $productIndexEgg++;
                }
            } else {
                echo '<div class="error text-center">Nguyên liệu không được tìm thấy!</div>';
            }
            ?>
        </div>
    </div>




<?php include("detail_front/footer.php") ?>