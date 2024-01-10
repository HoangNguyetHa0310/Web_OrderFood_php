<?php include("config/contact.php") ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt đồ ăn vặt</title>

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
    </style>
</head>

<html>
<body>

<div>
    <div class="logo_category">
        <nav class="navbar navbar-expand-lg navbar-light bg-white px-lg-3 py-lg-2 shadow-sm sticky-top  ">
            <div class="container-fluid">
                <a class="navbar-brand me-5 fw-bold fs-3 h-font" href="index.php">
                    <img src="images/logo.png" alt="Restaurant Logo" class="img-responsive">    
                </a>
                <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon "></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 fw-bold">
                        <li class="nav-item">
                            <a class="nav-link me-2" aria-current="page" href="<?php echo SITEURL; ?>" >Trang Chủ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link me-2" href="<?php echo SITEURL; ?>categories.php" >Loại Nguyên Liệu </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link me-2" href="<?php echo SITEURL; ?>foods.php">Menu </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link me-2" href="<?php echo SITEURL; ?>contact.php">Liên Hệ & Đánh Giá</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link me-2" href="<?php echo SITEURL; ?>about.php">Giới Thiệu</a>
                        </li>
                    </ul>

                    <div class="d-flex">
                        <button type="button" class="btn btn-outline-dark shadow-none me-lg-3 me-2" data-bs-toggle="modal" data-bs-target="#callAdmin">
                            Gọi cho admin 
                        </button>

                        <a href="<?php echo SITEURL; ?>cart.php" style="text-decoration: none;">
                            <button type="button" class="btn btn-outline-dark shadow-none " data-bs-toggle="modal" data-bs-target="#viewCart">
                                Giỏ hàng
                            </button>
                        </a>

                    </div>

                    <!-- <div class="d-flex">
                        <button type="button" class="btn btn-outline-dark shadow-none me-lg-3 me-2" data-bs-toggle="modal" data-bs-target="#loginModal">
                            Login
                        </button>
                        <button type="button" class="btn btn-outline-dark shadow-none " data-bs-toggle="modal" data-bs-target="#registerModal">
                            Register
                        </button>
                    </div> -->
                    
                </div>
            </div>
        </nav>
    </div>

    <!-- Modal -->
    <!-- <div class="login_res">
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
    </div> -->

    <!-- Contact admin -->
    <div class="login_res"> 
        <div class="modal fade" id="callAdmin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form action="">
                        <div class="modal-header">
                            <h5 class="modal-title d-flex align-items-center">
                                <i class="bi bi-person-add fs-3 me-2"></i>
                                Phản hồi của người dùng 
                            </h5>
                            <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
        
                        <div class="modal-body">
                            <span class="badge rounded-pill bg-light text-dark text-dark mb-3 text-wrap lh-base   ">
                                Lưu ý: Phản hồi này đánh giá tình huống bạn gặp (Sự cố bất ngờ), hãy điền chính xác những thông tin dưới đây ! 
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
                                        <label class="form-label">Tên món ăn </label>
                                        <input type="number" class="form-control shadow-none ">
                                    </div>
        
                                    <div class="col-md-6 p-0 mb-3">
                                        <label class="form-label">Ngày đặt</label>
                                        <input type="date" class="form-control shadow-none ">
                                    </div>
        
                                    <div class="col-md-12 ps-0 mb-3">
                                        <label class="form-label">Lý do </label>
                                        <textarea rows="5" class="form-control shadow-none " style=" width: 100%; box-sizing: border-box; resize: vertical; "></textarea>
                                    </div>

                                </div>
                            </div>
        
                            <div class="text-center my-1">
                                <button type="submit" class="btn btn-primary shadow-none">
                                    Gửi !
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</div>
    
