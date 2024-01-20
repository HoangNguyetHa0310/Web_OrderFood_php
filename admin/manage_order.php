<!--menu Header navbar  -->
<?php require("detail/menu.php") ?>

<style>
    .table-container {
        width: 100%;
        margin-top: 20px;
    }

    .table-container table {
        width: 100%;
        border-collapse: collapse;
    }

    .table-container th,
    .table-container td {
        padding: 10px;
        text-align: left;
    }

    .status-cell {
        width: 200px; /* Kích thước cố định */
        text-align: center; /* Căn giữa nội dung trong ô */
    }

    .status-label {
        display: inline-block;
        max-width: 100%; /* Tối đa chiều rộng là 100% của ô */
        overflow: hidden; /* Ngăn chữ vượt ra khỏi ô */
        text-overflow: ellipsis; /* Hiển thị dấu elipsis (...) nếu nội dung quá dài */
        white-space: nowrap; /* Ngăn chữ xuống dòng */
    }
</style>

<!-- Main content -->
<div class="main-content">
    <div class="wrapper">
        <h1>Quản lý đặt đồ</h1>
        <br><br>

        <?php 
            if (isset($_SESSION['update_order'])) {
                echo $_SESSION['update_order'];
                unset($_SESSION['update_order']);
            }
        ?>

        <br><br><br>
        <a href="<?php echo SITEURL; ?>admin/add_categoty.php" class="btn-primary">Thêm đặt đồ</a>
        <br><br><br>
        <table style="width: 100%;">
            <tr>
                <th>STT</th>
                <th>Tên đồ ăn</th>
                <th>Giá</th>
                <th>Số lượng </th>
                <th>Tổng </th>
                <th>Ngày đặt</th>
                <th style="text-align: center;">Trạng thái</th>
                <th>Tên khách</th>
                <th>Liên hệ</th>
                <th>Địa chỉ </th>
                <th>Chức năng </th>
            </tr>

            <?php 
                $sql = "SELECT * FROM tbl_order ORDER BY id DESC ";
                $res = mysqli_query($conn , $sql);
                $count = mysqli_num_rows($res);
                $sn = 1;

                if ($count > 0 ) {
                    while($row = mysqli_fetch_assoc($res)) {
                        $id = $row['id'];
                        $food = $row['food'];
                        $price = $row['price'];
                        $qty = $row['qty'];
                        $total = $row['total'];
                        $order_date = $row['order_date'];
                        $status = $row['status'];
                        $customer_name = $row['customer_name'];
                        $customer_contact = $row['customer_contact'];
                        $customer_email = $row['customer_email'];
                        $customer_address = $row['customer_address'];
                        ?>
                            <tr>
                                <td> <?php echo $sn++;?> </td>
                                <td> <?php echo $food;?> </td>
                                <td> <?php echo $price;?> </td>
                                <td> <?php echo $qty;?> </td>
                                <td> <?php echo $total;?> </td>
                                <td> <?php echo $order_date;?> </td>
                                <td class="status-cell">
                                    <?php 
                                        if($status == 'Ordered') {
                                            echo "<lable class='status-label success'> $status  </lable>";
                                        } elseif($status == 'Delivering') {
                                            echo "<lable class='status-label warning'> $status  </lable>";
                                        } elseif($status == 'Delivered') {
                                            echo "<lable class='status-label warning-2'> $status  </lable>";
                                        } elseif($status == 'Cancelled') {
                                            echo "<lable class='status-label error'> $status  </lable>";
                                        }
                                    ?>
                                </td>

                                <td> <?php echo $customer_name;?> </td>
                                <td> <?php echo $customer_contact;?> </td>
                                <td> <?php echo $customer_address;?> </td>
                                <td>
                                    <a href="<?php echo SITEURL;?>admin/update_order.php?id=<?php echo $id;?>" class="btn btn-primary" style="padding: 15px;">Sửa</a>
                                </td>
                             </tr>
                        <?php 
                    }
                }else {
                    echo "
                        <tr>
                            <td colspan='12' class='error'> Đặt đồ không tồn tại ! </td>
                        </tr>
                    ";
                }
            ?>
        </table>
    </div>

</div>


<!-- footer  -->
<?php require("detail/footer.php") ?>