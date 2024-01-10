<?php
// Thực hiện kết nối đến cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "order-food";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT tbl_order.id, tbl_order.food, tbl_order.price, tbl_order.qty, tbl_order.total, tbl_order.customer_address, tbl_food.image_name
    FROM tbl_order
    JOIN tbl_food 
    ON tbl_order.food = tbl_food.title";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Debug: In ra câu SQL để kiểm tra
    echo "Câu SQL: " . $sql . "<br>";

    // Debug: In ra số lượng dòng kết quả
    echo "Số lượng dòng kết quả: " . $stmt->rowCount() . "<br>";

    // Debug: In ra kết quả để kiểm tra
    print_r($result);
} catch (PDOException $e) {
    echo "Lỗi kết nối: " . $e->getMessage();
}

// Đóng kết nối
$conn = null;

