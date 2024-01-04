
<?php 
    include("../config/contact.php"); 
    include("login_check.php");
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Admin </title>
    <link rel="stylesheet" href="../css/admin.css">
    <!-- thư viện bootstrap và jquery -->

</head>

<body>
    <!-- Menu header navbar-->
    <div class="menu">
        <div class="wrapper text-center">
            <ul>
                <li><a href="index.php">Trang Chủ</a></li>
                <li><a href="manage_admin.php">Quản lý Admin</a></li>
                <li><a href="manage_category.php">Quản lý nguyên liệu</a></li>
                <li><a href="manage_food.php">Quản lý menu</a></li>
                <li><a href="manage_order.php">Quản lý đặt đồ</a></li>
                <li><a href="logout.php">Đăng xuất</a></li>
            </ul>
        </div>
    </div>
