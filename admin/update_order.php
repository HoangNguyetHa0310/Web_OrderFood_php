<?php include("detail/menu.php"); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Cập nhật</h1>
        <br><br>

        <?php 
            if(isset($_GET['id'])) {
                $id = $_GET['id'];
                $sql = "SELECT * FROM tbl_order WHERE id = $id";
                $res = mysqli_query($conn , $sql);
                $count = mysqli_num_rows($res);

                if ($count == 1) {
                    $row = mysqli_fetch_assoc($res);
                    $food = $row['food'];
                    $price = $row['price'];
                    $qty = $row['qty'];
                    $status = $row['status'];
                    $customer_name = $row['customer_name'];
                    $customer_contact = $row['customer_contact'];
                    $customer_email = $row['customer_email'];
                    $customer_address = $row['customer_address'];


                }else{
                    header('location: '.SITEURL.'admin/manage_order.php');
                }

            }else{
                header('location: '.SITEURL.'admin/manage_order.php');
            }
        ?>




        <form action="" method="post" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Tên đồ ăn</td>
                    <td>
                        <b> <?php echo $food;?> </b>
                     </td>
                </tr>

                <tr>
                    <td>Giá</td>
                    <td>
                        <b> <?php echo $price;?> VND </b>
                    </td>
                </tr>

                <tr>
                    <td>Số lượng</td>
                    <td>
                        <input type="number" name="qty" value="<?php echo $qty;?>">
                    </td>
                </tr>

                <tr>
                    <td>Trạng thái</td>
                    <td>
                        <select name="status" >  
                            <option <?php if($status == 'Ordered'){echo 'Selected';}?>  value="Ordered">Đã đặt</option>
                            <!-- // Vận chuyển  -->
                            <option <?php if($status == 'Delivering'){echo 'Selected';}?> value="Delivering">Đăng vận chuyển</option>
                            <option <?php if($status == 'Delivered'){echo 'Selected';}?> value="Delivered">Đã đến</option>
                            <option <?php if($status == 'Cancelled'){echo 'Selected';}?>  value="Cancelled">Hủy đặt</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Tên khách</td>
                    <td>
                        <input type="text" name="customer_name" value="<?php echo $customer_name;?>">
                    </td>
                </tr>

                <tr>
                    <td>Liên hệ khách hàng</td>
                    <td>
                        <input type="text" name="customer_contact" value="<?php echo $customer_contact;?>">
                    </td>
                </tr>

                <tr>
                    <td>Email khách</td>
                    <td>
                        <input type="text" name="customer_email" value="<?php echo $customer_email;?>">
                    </td>
                </tr>

                <tr>
                    <td>Địa chỉ</td>
                    <td>
                        <textarea name="customer_address" id="" cols="25" rows="5"> <?php echo $customer_address;?> </textarea>
                    </td>
                </tr>



                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id;?>">
                        <input type="hidden" name="price" value="<?php echo $price;?>">
                        <input type="submit" name="submit" value="Cập nhật" class="btn-primary" style="padding: 12px; margin-top: 12px;"> 
                    </td>
                </tr>
            </table>    
        </form>

        <?php 
            if(isset($_POST['submit'])) {
                // echo "hahahh";
                $id = $_POST['id'];
                $price = $_POST['price'];
                $qty = $_POST['qty'];
                $total = $price * $qty;
                $status = $_POST['status'];
                $customer_name = $_POST['customer_name'];
                $customer_contact = $_POST['customer_contact'];
                $customer_email = $_POST['customer_email'];
                $customer_address = $_POST['customer_address'];

                $sql2 = "UPDATE tbl_order SET 
                    qty = $qty,
                    total = $total,
                    status = '$status',
                    customer_name = '$customer_name',
                    customer_contact = '$customer_contact',
                    customer_email = '$customer_email',
                    customer_address = '$customer_address'
                    WHERE id = $id
                ";

                $res2 = mysqli_query($conn , $sql2);
                if ($res2 == true) {
                    $_SESSION['update_order'] = '<div class="success">Cập nhật thành công !</div>';
                    header('location:'.SITEURL.'admin/manage_order.php');
                }else{
                    $_SESSION['update_order'] = '<div class="error">Cập nhật thất bại!</div>';
                    header('location:'.SITEURL.'admin/manage_order.php');
                }
            }
        
        ?>

    </div>
</div>



<?php include("detail/footer.php"); ?>