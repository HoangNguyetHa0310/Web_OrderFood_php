<?php include("detail_front/menu.php") ?>

    <!-- banner  -->
    <style>
        .banner  {
            height: 60vh; /* 30% của chiều cao màn hình */
            overflow: hidden; /* Ẩn phần tử vượt quá chiều cao đã đặt */
        }

        .swiper-wrapper img {
            object-fit: cover; /* Đảm bảo ảnh không bị biến dạng */
            width: 100%; /* Chiều rộng 100% của phần tử chứa */
            height: 100%; /* Chiều cao 100% của phần tử chứa */
        }
       
    </style>

    <div class="container-fluid px-lg-4 mt-4">  
        <div class="swiper swiper-container">
            <div class="swiper-wrapper banner">
                <div class="swiper-slide">
                    <img src="images/baner1.jpg"  class="img-fluid" />
                </div>

                <div class="swiper-slide">
                    <img src="images/banner2.jpg"  class="img-fluid" />
                </div>

                <div class="swiper-slide">
                    <img src="images/banner3.jpg"  class="img-fluid" />
                </div>

                <div class="swiper-slide">
                    <img src="images/banner4.jpg"  class="img-fluid" />
                </div>

                <div class="swiper-slide">
                    <img src="images/banner5.jpg"  class="img-fluid" />
                </div>

                <div class="swiper-slide">
                    <img src="images/banner6.jpg"  class="img-fluid" />
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
    <!-- end banner  -->

    <!-- navbar search  -->
    <div class="container availability-form">
        <div class="row">
            <div class="col-lg-12 bg-white shadow p-4 rounded">
                <h5 class="mb-4 fw-bold" >Bạn muốn ăn gì nào ? </h5>

                <form class="d-flex" action="<?php echo SITEURL; ?>food-search.php" method="POST">
                    <input class="form-control me-2" type="search" placeholder="Tìm Kiếm" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Tìm</button>
                </form>
            </div>
        </div>
    </div>


    <?php 
        if (isset($_SESSION['order'])) {
            echo $_SESSION['order'];
            unset($_SESSION['order']);
        }
    ?>
    

    <!-- CAtegories Section Starts Here -->
    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">Món ăn nổi bật</h2>
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
                                        <img src="<?php echo SITEURL;?>/images/food/<?php echo $image_name; ?>" class="img-responsive img-curve" style=" width: 100%; height: 350px;">
                                        <?php 
                                    }
                                    ?>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $title;?></h5>
                                    <h6 class="mb-4"><?php echo $price;?> VND</h6>
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
                                    <h6 class="mb-4" style=" width: 100%; height: 50px;"><?php echo $description;?></h6>

                                    <div class="d-flex justify-content-evenly mb-2">
                                        <a href="<?php echo SITEURL;?>category-foods.php?category_id=<?php echo $id;?>" class="btn btn-sm text-white custom-bg shadow-none rounded">Xem thêm</a>
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

    <!-- fOOD MEnu Section Starts Here -->
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
                    while ($row = mysqli_fetch_assoc($res2)){
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
                                    }else {
                                        ?>
                                            <img src="<?php echo SITEURL;?>/images/food/<?php echo $image_name;?>" class="img-responsive img-curve" style=" width: 100%; height: 350px;">
                                        <?php 
                                    }
                                ?>
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $title;?></h5>
                                    <h6 class="mb-2"><?php echo $price;?> VND</h6>
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
                                        <a href="<?php echo SITEURL;?>order.php?food_id=<?php echo $id;?>" class="btn btn-sm text-white custom-bg shadow-none rounded">Đặt ngay</a>
                                    </div>

                                </div>
                            </div>
                        </div>   
                        <?php 
                        $productIndex++; // Tăng số thứ tự sản phẩm
                    }   
                }else {
                    echo '<div class="error">Food not available !</div>';
                }

            ?>
            <!-- cột 1 -->

            <div class="col-lg-12 text-center mt-5">
                <a href="<?php echo SITEURL?>foods.php" class="btn btn-sm btn-outline-success rounded-0 fw-bold shadow-none">Xem thêm >>></a>
            </div>
        </div>
    </div>

    <!-- Testimonials : Những lời đánh giá từ khách hàng -->
    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font "> Bình Luận </h2>
    <div class="container mt-5">
        <div class="swiper swiper-testimonials">
            <div class="swiper-wrapper mb-5">

                <div class="swiper-slide bg-white p-4">
                    <div class="profile d-flex align-content-center p-3">
                        <i class="bi bi-person-circle d-flex align-items-center"></i>
                        <h6 class="m-2 ms-2">Son Tung MTP</h6>
                    </div>
                    <p>
                    Đồ ăn này không chỉ làm hài lòng vị giác mà còn làm hồn ta nhảy múa. Nó như một cuộc gặp gỡ với sự sáng tạo và tâm huyết của đầu bếp, 
                    mỗi khẩu phần đều là một câu chuyện kể về đam mê và tình yêu với ẩm thực
                    </p>
                    <div class="rating">
                        <i class="bi bi-star-fill text-warning "></i>
                        <i class="bi bi-star-fill text-warning "></i>
                        <i class="bi bi-star-fill text-warning "></i>
                        <i class="bi bi-star-fill text-warning "></i>
                        <i class="bi bi-star-fill text-warning "></i>
                    </div>
                </div>

                <div class="swiper-slide bg-white p-4">
                    <div class="profile d-flex align-content-center p-3">
                        <i class="bi bi-person-circle d-flex align-items-center"></i>
                        <h6 class="m-2 ms-2">Phan Hoang</h6>
                    </div>
                    <p>
                    Sự sáng tạo trong cách kết hợp các nguyên liệu không chỉ tạo nên một bữa ăn, mà còn là một tác phẩm nghệ thuật đẹp mắt, 
                    làm cho việc thưởng thức trở thành một trải nghiệm độc đáo và không thể quên.
                    </p>
                    <div class="rating">
                        <i class="bi bi-star-fill text-warning "></i>
                        <i class="bi bi-star-fill text-warning "></i>
                        <i class="bi bi-star-fill text-warning "></i>
                        <i class="bi bi-star-fill text-warning "></i>
                        <i class="bi bi-star-fill text-warning "></i>
                    </div>
                </div>

                <div class="swiper-slide bg-white p-4">
                    <div class="profile d-flex align-content-center p-3">
                        <i class="bi bi-person-circle d-flex align-items-center"></i>
                        <h6 class="m-2 ms-2">Nguyet Ha</h6>
                    </div>
                    <p>
                    Mỗi miếng ăn như một chuyến phiêu lưu đầy thăng trầm trên đồng cảm xúc, từ hương thơm ngào ngạt đến hương vị tinh tế, 
                    mỗi thành phần tạo nên một bản hòa nhạc ngon miệng
                    </p>
                    <div class="rating">
                        <i class="bi bi-star-fill text-warning "></i>
                        <i class="bi bi-star-fill text-warning "></i>
                        <i class="bi bi-star-fill text-warning "></i>
                        <i class="bi bi-star-fill text-warning "></i>
                        <i class="bi bi-star-fill text-warning "></i>
                    </div>
                </div>


            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>

    <!-- liên hệ  -->
    <h2 class="mt-4 pt-4 mb-5 text-center fw-bold h-font">Chào! Tôi ở đây </h2>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 mb-3 bg-white rounded">
                <iframe class="w-100 rounded" height="320px" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d59587.94638135149!2d105.79576410131199!3d21.02281475910795!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab9bd9861ca1%3A0xe7887f7b72ca17a9!2zSMOgIE7hu5lpLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1702097598420!5m2!1svi!2s" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="bg-white p-4 rounded mb-4">
                    <h5>Gọi cho tôi</h5>
                    <a href="tel: +8412345678" class="d-inline-block mb-2 text-decoration-none text-dark">
                        <i class="bi bi-telephone-fill"></i>
                        +8412345678
                    </a>
                    <br>
                    <a href="tel: +8412345678" class="d-inline-block mb-2 text-decoration-none text-dark">
                        <i class="bi bi-geo-alt-fill"></i>
                        Ký túc xá Mỹ Đình - Mỹ Đình 2 - Nam Từ Liêm - Hà Nội - Việt Nam
                    </a>
                </div>

                <div class="bg-white p-4 rounded mb-4">
                    <h5>Theo dõi tôi</h5>
                    <a href="https://www.facebook.com/profile.php?id=100051796620892" class="d-inline-block mb-3 ">
                        <span class="badge bg-light text-dark fs-6 p-2">
                            <i class="bi bi-facebook me-1"></i>
                            Facebook
                        </span>
                    </a>
                    <a href="#" class="d-inline-block mb-3 ">
                        <span class="badge bg-light text-dark fs-6 p-2">
                            <i class="bi bi-youtube me-1"></i>
                            Youtube
                        </span>
                    </a>
                    <a href="https://www.instagram.com/p.hoang2712/" class="d-inline-block mb-3 ">
                        <span class="badge bg-light text-dark fs-6 p-2">
                            <i class="bi bi-instagram me-1"></i>
                            Instagram
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>

<script>
    // js banner : chuyển ảnh slide cho phần banner : hoàn thành 
    var swiper = new Swiper(".swiper-container", {
        spaceBetween: 30,
        effect: "fade",
        loop: true,
        autoplay: {
            delay: 3500,
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

<?php include("detail_front/footer.php") ?>