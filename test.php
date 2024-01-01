<?php include("config/contact.php") ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>test</title>

    <?php require('detail_front/links.php') ?>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <style>
        .availability-form {
            margin-top: -50px;
            z-index: 2;
            position: relative;
        }

        @media screen and (max-width: 575px) {
            .availability-form {
                margin-top: 25px;
                padding: 0 35px;
            }
        }
        .pop:hover {
            border-top-color: green !important;
            transform: scale(1.03);
            transition: all 0.3s;
        }
    </style>
</head>

<html>

<body>

    <div>
        <div class="logoAndCategory">
            <nav class="navbar navbar-expand-lg navbar-light bg-white px-lg-3 py-lg-2 shadow-sm sticky-top fw-bold">
                <div class="container-fluid">
                    <a class="navbar-brand me-5 fw-bold fs-3 h-font" href="index.php">
                        <img src="images/logo.png" alt="Restaurant Logo" class="img-responsive">
                    </a>
                    <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon "></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active me-2" aria-current="page" href="<?php echo SITEURL; ?>">Trang Chủ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link me-2" href="<?php echo SITEURL; ?>categories.php">Thực Phẩm</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link me-2" href="<?php echo SITEURL; ?>foods.php">Đồ Ăn </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link me-2" href="<?php echo SITEURL; ?>contact.php">Liên Hệ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link me-2" href="<?php echo SITEURL; ?>about.php">Giới Thiệu</a>
                            </li>
                        </ul>
                        <div class="d-flex">
                            <button type="button" class="btn btn-outline-dark shadow-none me-lg-3 me-2" data-bs-toggle="modal" data-bs-target="#loginModal">
                                Login
                            </button>
                            <button type="button" class="btn btn-outline-dark shadow-none " data-bs-toggle="modal" data-bs-target="#registerModal">
                                Register
                            </button>
                        </div>
                    </div>
                </div>
            </nav>
        </div>

        <div class="loginAndRes">
            <!-- Modal -->
            <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="">
                            <div class="modal-header">
                                <h5 class="modal-title d-flex align-items-center">
                                    <i class="bi bi-person-circle fs-3 me-2"></i>
                                    User Login
                                </h5>
                                <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <div class="modal-body">
                                <div class="mb-3">
                                    <label class="form-label">Tài Khoản</label>
                                    <input type="email" class="form-control shadow-none ">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Mật Khẩu</label>
                                    <input type="email" class="form-control shadow-none ">
                                </div>

                                <div class="d-flex align-items-center justify-content-between mb-2 ">
                                    <button type="submit" class="btn btn-primary shadow-none">
                                        Login
                                    </button>
                                    <a href=" javascript: void(0)" class="text-secondary text-decoration-none">Quên Mật Khẩu?</a>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <form action="">
                            <div class="modal-header">
                                <h5 class="modal-title d-flex align-items-center">
                                    <i class="bi bi-person-add fs-3 me-2"></i>
                                    Đăng Kí Người Dùng
                                </h5>
                                <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <div class="modal-body">
                                <span class="badge rounded-pill bg-light text-dark text-dark mb-3 text-wrap lh-base   ">
                                    Lưu ý: Thông tin chi tiết của bạn phải khớp với CMND (thẻ Aadhaar, thẻ hộ chiếu). Điều đó sẽ được yêu cầu khi đăng nhập.
                                </span>
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-6 ps-0 mb-3">
                                            <label class="form-label ">Họ & Tên</label>
                                            <input type="text" class="form-control shadow-none ">
                                        </div>

                                        <div class="col-md-6 p-0 mb-3">
                                            <label class="form-label">Email</label>
                                            <input type="email" class="form-control shadow-none ">
                                        </div>

                                        <div class="col-md-6 ps-0 mb-3">
                                            <label class="form-label ">Số Điện Thoại </label>
                                            <input type="number" class="form-control shadow-none ">
                                        </div>

                                        <div class="col-md-6 p-0 mb-3">
                                            <label class="form-label">Ảnh</label>
                                            <input type="file" class="form-control shadow-none ">
                                        </div>

                                        <div class="col-md-12 p-0 mb-3">
                                            <label class="form-label">Địa Chỉ</label>
                                            <textarea class="form-control shadow-none" rows="1"></textarea>
                                        </div>

                                        <div class="col-md-6 ps-0 mb-3">
                                            <label class="form-label">Mã Pin</label>
                                            <input type="number" class="form-control shadow-none ">
                                        </div>

                                        <div class="col-md-6 p-0 mb-3">
                                            <label class="form-label">Ngày Sinh</label>
                                            <input type="date" class="form-control shadow-none ">
                                        </div>

                                        <div class="col-md-6 ps-0 mb-3">
                                            <label class="form-label">Mật Khẩu</label>
                                            <input type="password" class="form-control shadow-none ">
                                        </div>

                                        <div class="col-md-6 p-0 mb-3">
                                            <label class="form-label">Xác Nhập Mật Khẩu</label>
                                            <input type="password" class="form-control shadow-none ">
                                        </div>


                                    </div>
                                </div>

                                <div class="text-center my-1">
                                    <button type="submit" class="btn btn-primary shadow-none">
                                        Register
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- main -->
    <style>
        .swiper-wrapper {
            height: 60vh;
            /* 30% của chiều cao màn hình */
            overflow: hidden;
            /* Ẩn phần tử vượt quá chiều cao đã đặt */
        }

        .swiper-wrapper img {
            object-fit: cover;
            /* Đảm bảo ảnh không bị biến dạng */
            width: 100%;
            /* Chiều rộng 100% của phần tử chứa */
            height: 100%;
            /* Chiều cao 100% của phần tử chứa */
        }
    </style>

    <div class="container-fluid px-lg-4 mt-4">
        <div class="swiper swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="images/baner1.jpg" class="img-fluid" />
                </div>

                <div class="swiper-slide">
                    <img src="images/banner2.jpg" class="img-fluid" />
                </div>

                <div class="swiper-slide">
                    <img src="images/banner3.jpg" class="img-fluid" />
                </div>

                <div class="swiper-slide">
                    <img src="images/banner4.jpg" class="img-fluid" />
                </div>

                <div class="swiper-slide">
                    <img src="images/banner5.jpg" class="img-fluid" />
                </div>

                <div class="swiper-slide">
                    <img src="images/banner6.jpg" class="img-fluid" />
                </div>
            </div>
        </div>
    </div>


    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
        // js banner : chuyển ảnh slide cho phần banner : hoàn thành 
        var swiper = new Swiper(".swiper-container", {
            spaceBetween: 30,
            effect: "fade",
            loop: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            }
        });

        // js comment : chuyển cảnh hiệu ứng bình luânj : chưa fix được 1 1 2 3 : để 1 1 1 2 
        // : những con số này là số comment hiển thị trên màn hình  
        var swiper = new Swiper(".swiper-testimonials", {
            effect: "coverflow",
            grabCursor: true,
            centeredSlides: true,
            slidesPerView: "auto",
            slidesPerView: "3",
            loop: true,
            coverflowEffect: {
                rotate: 50,
                stretch: 0,
                depth: 100,
                modifier: 1,
                slideShadows: false,
            },
            pagination: {
                el: ".swiper-pagination",
            },
            breakpoints: {
                320: {
                    slidesPerView: 1,
                },
                640: {
                    slidesPerView: 1,
                },
                768: {
                    slidesPerView: 1,
                },
                1024: {
                    slidesPerView: 2,
                },
            }
        });
    </script>

    <div class="container availability-form">
        <div class="row">
            <div class="col-lg-12 bg-white shadow p-4 rounded">
                <h5 class="mb-4">Check booking </h5>
                <form action="">
                    <div class="row align-items-end">
                        <div class="col-lg-3 mb-3">
                            <label class="form-label" style="font-weight: 500;">Check-in</label>
                            <input type="date" class="form-control shadow-none ">
                        </div>

                        <div class="col-lg-3 mb-3">
                            <label class="form-label" style="font-weight: 500;">Check-out</label>
                            <input type="date" class="form-control shadow-none ">
                        </div>

                        <!-- nguoi lon -->
                        <div class="col-lg-3 mb-3">
                            <label class="form-label" style="font-weight: 500;">Adult</label>
                            <select class="form-select shadow-none">
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>

                        <!-- tre con -->
                        <div class="col-lg-2 mb-3">
                            <label class="form-label" style="font-weight: 500;">Children</label>
                            <select class="form-select shadow-none">
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>

                        <!-- btn submit-->
                        <div class="col-lg-1 mt-2 mb-lg-3 ">
                            <button type="submit" class="btn text-white rounded custom-bg  ">Submit</button>
                        </div>


                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- <section class="categories">
        <div class="container">
            <h2 class="text-center">Món ăn nổi bật </h2>

            <?php
            $sql = "SELECT * FROM tbl_category WHERE active='Yes' AND featured='Yes' LIMIT 3";
            $res = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($res);

            if ($count > 0) {
                while ($row = mysqli_fetch_assoc($res)) {
                    $id = $row['id'];
                    $title = $row['title'];
                    $image_name = $row['image_name'];
            ?>
                            <a href="<?php echo SITEURL; ?>category-foods.php?category_id=<?php echo $id; ?>">
                                <div class="box-3 float-container">
                                    <?php
                                    if ($image_name == "") {
                                        echo '<div class="error">Add Images Failed!</div>';
                                    } else {
                                    ?>
                                                <img src="<?php echo SITEURL; ?>/images/category/<?php echo $image_name; ?>" alt="Pizza" class="img-responsive img-curve" style="width: 450px; height: 500px; box-shadow: 5px 5px 8px #999;">
                                            <?php
                                        }
                                            ?>
    
                                    <h3 class="float-text text-white"><?php echo $title; ?></h3>
                                </div>
                            </a>
                        <?php
                    }
                } else {
                    echo '<div class="error">Category Not Add!</div>';
                }
                        ?>

                
            <div class="clearfix"></div>
        </div>
    </section> -->

    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">Món ăn mới</h2>
    <div class="container">
        <div class="row">
            <?php
            $sql = "SELECT * FROM tbl_food WHERE active='Yes' LIMIT 3";
            $res = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($res);

            if ($count > 0) {
                while ($row = mysqli_fetch_assoc($res)) {
                    $id = $row['id'];
                    $title = $row['title'];
                    $image_name = $row['image_name'];
                    $description = $row['description'];
                    $price = $row['price'];
            ?>
                    <!-- cot 1 -->
                    <div class="col-lg-4 col-md-6 my-3">
                        <div class="card border-0 shadow" style="max-width: 350px; margin: auto; box-shadow: 5px 5px 8px #999;">
                            <div class="card-img-top">
                                <?php
                                if ($image_name == "") {
                                    echo '<div class="error">Add Images Failed!</div>';
                                } else {
                                ?>
                                    <img src="<?php echo SITEURL; ?>/images/food/<?php echo $image_name; ?>" class="img-responsive img-curve" style=" width: 100%; height: 350px;">
                                <?php
                                }
                                ?>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title"><?php echo $title; ?></h5>
                                <h6 class="mb-4"><?php echo $price; ?> VND</h6>
                                <div class="rating mb-4">
                                    <h6 class="mb-1">Đánh giá</h6>
                                    <span>
                                        <i class="bi bi-star-fill text-warning "></i>
                                        <i class="bi bi-star-fill text-warning "></i>
                                        <i class="bi bi-star-fill text-warning "></i>
                                        <i class="bi bi-star-fill text-warning "></i>
                                        <i class="bi bi-star-fill text-warning "></i>
                                    </span>
                                </div>
                                <h6 class="mb-4" style=" width: 100%; height: 50px;"><?php echo $description; ?></h6>

                                <div class="d-flex justify-content-evenly mb-2">
                                    <a href="<?php echo SITEURL; ?>category-foods.php?category_id=<?php echo $id; ?>" class="btn btn-sm text-white custom-bg shadow-none rounded">Xem ngay</a>
                                    <!-- <a href="#" class="btn btn-sm btn-outline-success shadow-none ">More Details</a> -->
                                </div>

                            </div>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo '<div class="error">Category Not Add!</div>';
            }
            ?>
        </div>
    </div>

    <!-- menu food -->
    <!-- <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php
            $sql2 = "SELECT * FROM tbl_food WHERE active='Yes' AND featured='No' LIMIT 6";
            $res2 = mysqli_query($conn, $sql2);
            $count2 = mysqli_num_rows($res2);
            if ($count2 > 0) {
                while ($row = mysqli_fetch_assoc($res2)) {
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
                                        echo '<div class="error">Image not available !</div>';
                                    } else {
                                    ?>
                                                <img src="<?php echo SITEURL; ?>/images/food/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve" style="width: 100px; height: 100px;">
                                            <?php
                                        }
                                            ?>
                                </div>

                                <div class="food-menu-desc">
                                    <h4><?php echo $title; ?></h4>
                                    <p class="food-price"><?php echo $price; ?> VND</p>
                                    <p class="food-detail">
                                        <?php echo $description; ?>
                                    </p>
                                    <br>

                                    <a href="<?php echo SITEURL; ?>order.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
                                </div>
                            </div>
                        <?php
                    }
                } else {
                    echo '<div class="error">Food not available !</div>';
                }
                        ?>

            <div class="clearfix"></div>

            

        </div>

        <p class="text-center">
            <a href="<?php echo SITEURL; ?>foods.php" class="btn btn-sm btn-outline-success rounded-2 fw-bold shadow-none">Xem tất Cả</a>
        </p>
    </section> -->

    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font "> Món ăn bán chạy </h2>
    <div class="container">
        <div class="row">
            <?php
            $sql2 = "SELECT * FROM `tbl_food` WHERE `price` = (SELECT MIN(`price`) FROM `tbl_food`) LIMIT 3";
            $res2 = mysqli_query($conn, $sql2);
            $count2 = mysqli_num_rows($res2);
            // check lỗi qty
            // if ($res2) {
            //     while ($row = mysqli_fetch_assoc($res2)) {
            //         var_dump($row);
            //     }
            // }else {
            //     echo "error : " .mysqli_errno($conn);
            // }


            if ($count2 > 0) {
                $productIndex = 1;
                while ($row = mysqli_fetch_assoc($res2)) {
                    $id = $row['id'];
                    $title = $row['title'];
                    $price = $row['price'];
                    $image_name = $row['image_name'];
                    $randomNumberId = "randomNumber" . $productIndex;
            ?>
                    <div class="col-lg-4 col-md-6 my-3">
                        <div class="card border-0 shadow" style="max-width: 350px; margin: auto; ">
                            <?php
                            if ($image_name == "") {
                                echo '<div class="error">Image not available !</div>';
                            } else {
                            ?>
                                <img src="<?php echo SITEURL; ?>/images/food/<?php echo $image_name; ?>" class="img-responsive img-curve" style=" width: 100%; height: 350px;">
                            <?php
                            }
                            ?>
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $title; ?></h5>
                                <h6 class="mb-2"><?php echo $price; ?> VND</h6>
                                <div class="rating mb-4">
                                    <h6 class="mb-1" style="font-size: 16px; font-family: 'Quicksand', sans-serif;">Số lượng người mua </h6>
                                    <span>
                                        <i class="bi bi-person-circle"></i>
                                        <span id="<?php echo $randomNumberId; ?>"></span>
                                    </span>
                                </div>
                                <script>
                                    // Tạo một số ngẫu nhiên từ 1 đến 100 và đặt vào phần tử có id duy nhất
                                    var randomNumber<?php echo $productIndex; ?> = Math.floor(Math.random() * 100) + 1;
                                    document.getElementById("<?php echo $randomNumberId; ?>").innerText = randomNumber<?php echo $productIndex; ?>;
                                </script>

                                <div class="d-flex justify-content-evenly mb-2">
                                    <a href="<?php echo SITEURL; ?>order.php?food_id=<?php echo $id; ?>" class="btn btn-sm text-white custom-bg shadow-none rounded">Đặt ngay</a>
                                </div>

                            </div>
                        </div>
                    </div>
            <?php
                    $productIndex++; // Tăng số thứ tự sản phẩm
                }
            } else {
                echo '<div class="error">Food not available !</div>';
            }

            ?>
            <!-- cột 1 -->

            <div class="col-lg-12 text-center mt-5">
                <a href="<?php echo SITEURL ?>foods.php" class="btn btn-sm btn-outline-success rounded-0 fw-bold shadow-none">Xem thêm >>></a>
            </div>
        </div>
    </div>

    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">Nguyên liệu</h2>
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
                            <div class="col-lg-4 col-md-3 col-sm-6 pop">
                                <div class="card text-center bg-white rounded shadow pt-4 my-4">
                                    <a href="<?= SITEURL; ?>category-foods.php?category_id=<?= $id; ?>" style="text-decoration: none;">
                                        <?php
                                        if ($image_name == "") {
                                            echo '<div class="error">Add Images Failed!</div>';
                                        } else {
                                        ?>
                                            <img src="<?= SITEURL; ?>images/category/<?= $image_name; ?>" class="img-responsive img-curve" style="width: 100%; height: 450px; margin-top: -27px; border-radius: 3px;">
                                        <?php
                                        }
                                        ?>
                                        <div class="card-body">
                                            <h4 class="card-title text-dark" style="float: left;"><?= $title; ?></h4>
                                            <span style="color: green;">
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
                    echo '<div class="error text-center">Category Not Found!</div>';
                }
            ?>
        </div>
    </div>

    <!-- foods  -->
    <div class="container">
        <div class="row">
            <?php 
                $sql =  "SELECT * FROM tbl_food WHERE active = 'Yes' LIMIT 2"; 
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
                                        <p class="food-detail" style="height: 90px;">
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





    <!-- footer -->

    <div class="container-fluid bg-white mt-5">
        <div class="row">
            <div class="col-lg-4 p-4">
                <h3 class="h-font fw-bold fs-3 mb-2">WoW Food</h3>
                <p>
                    Là một viên ngọc quý trong ngành bán đồ ăn vặt ! <br>
                    Từ quy trình đặt đồ ăn liền mạch trên trang web này cho đến những mòn ăn ngon và bổ dưỡng.
                    Khi trải nghiệm những mòn ăn của quán chúng tôi, Các bạn sẽ cảm thấy tuyệt vời. <br>
                    <b>Hãy đặt món ngay nào !</b>
                </p>
            </div>

            <div class="col-lg-4 p-4">
                <h5 class="mb-3">Links</h5>
                <a href="#" class="d-inline-block mb-2 text-dark text-decoration-none"><a href="index.php" style="text-decoration: none; font-size: 18px; font-weight: 600;">Trang Chủ: </a>Đồ ăn nổi bật và được bán nhiều nhất</a><br>
                <a href="#" class="d-inline-block mb-2 text-dark text-decoration-none"><a href="index.php" style="text-decoration: none; font-size: 18px; font-weight: 600;">Thực Phẩm: </a>Thực phẩm ngon sẽ tạo lên những lại đồ ăn xuất sắc </a><br>
                <a href="#" class="d-inline-block mb-2 text-dark text-decoration-none"><a href="index.php" style="text-decoration: none; font-size: 18px; font-weight: 600;">Đồ Ăn: </a> Những móm ăn sẽ làm ngây ngất lòng người </a><br>
                <a href="#" class="d-inline-block mb-2 text-dark text-decoration-none"><a href="index.php" style="text-decoration: none; font-size: 18px; font-weight: 600;">Liên Hệ: </a>Nơi mọi thắc mắc được giải đáp và Được phản hồi nhanh chóng</a><br>
                <a href="#" class="d-inline-block mb-2 text-dark text-decoration-none"><a href="index.php" style="text-decoration: none; font-size: 18px; font-weight: 600;">Giới Thiệu: </a> Hiểu thêm về chúng tôi </a>
            </div>

            <div class="col-lg-4 p-4">
                <h5 class="mb-3"> Follow Us</h5>
                <a href="#" class="d-inline-block text-dark mb-2 text-decoration-none">
                    <i class="bi bi-facebook me-1"></i>
                    Facebook
                </a><br>

                <a href="#" class="d-inline-block text-dark mb-2 text-decoration-none">
                    <i class="bi bi-youtube me-1"></i>
                    Youtube
                </a><br>

                <a href="#" class="d-inline-block text-dark mb-2 text-decoration-none">
                    <i class="bi bi-instagram me-1"></i>
                    Instagram
                </a><br>

                <a href="#" class="d-inline-block text-dark  text-decoration-none">
                    <i class="bi bi-twitter me-1"></i>
                    Twitter
                </a>
            </div>
        </div>
    </div>

    <h6 class="text-center bg-dark text-white p-3 m-0">@ Designed and Developed by Hoang Nguyet Ha</h6>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>