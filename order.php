
<?php 
ob_start();
include("detail_front/menu.php");

?>

<style>
    @media (max-width: 739px) {
        .order {
            display: block !important;
            width: 100%;
        }

        .imgAndPrice {
            width: 100% !important;
        }

        .titleAndPrice {
            width: 100%;
        }
        .qtyInput {
            width: 100%;
        }

        .information {
            width: unset !important;
            margin: 0 !important;
            
        }
    }
</style>


    <?php 
        if (isset($_GET['food_id'])) {
            $food_id = $_GET['food_id'];
            $sql = "SELECT * FROM tbl_food WHERE id = $food_id";
            $res = mysqli_query($conn , $sql);
            $count = mysqli_num_rows($res);
            if ($count == 1) {
                $row = mysqli_fetch_assoc($res);
                $title = $row['title'];
                $price = $row['price'];
                $image_name = $row['image_name'];
            }else{
                header('location: '.SITEURL);
            }
        } else {
            header('location: '.SITEURL.'categories.php');
        }
    ?>


    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search">
        <div class="container">
            
            <h2 class="text-center text-white">Điền vào mẫu này để xác nhận đơn hàng của bạn.</h2>

            <legend style="display: flex; justify-content: center; align-items: center; font-size: 34px;">Đồ ăn bạn đã chọn </legend>
            <form action="" method="POST" class="order" style="display: flex; justify-content: space-between;">
                <fieldset class="imgAndPrice" style="width: 50%;">
                    <div class="food-menu-img">
                        <?php 
                            if ($image_name == "" ) {
                                echo '<div class="error">Image Not Available!</div>';
                            }else {
                                ?>
                                    <img src="<?php echo SITEURL;?>images/food/<?php echo $image_name;?>" class="img-responsive img-curve" style="width: 100%; height: 450px; margin-top: 22px;">
                                <?php 
                            }
                        ?>
                    </div>
    
                    <div class="food-menu-desc d-flex " style="justify-content: space-between; align-items: center;">
                        <div class="titleAndPrice" style="width: 50%;">
                            <h3 class="mt-4"><?php echo $title;?></h3>
                            <input type="hidden" name="food" value="<?php echo $title;?>">
    
                            <p class="food-price"><?php echo $price;?> VND</p>
                            <input type="hidden" name="price" value="<?php echo $price;?> ">
                        </div>

                        <div class="qtyInput" style="width: 50%;">
                            <div style="margin-top: -12px; font-size: 16px;" class="order-label">Số lượng</div>
                            <input style="width: 100%;" type="number" name="qty" class="input-responsive" value="1" required>
                        </div>

                        
                    </div>

                </fieldset>
                
                <fieldset class="information" style="width: 50%; margin-left: 45px;">
                    <legend style=" display: flex; justify-content: center; font-size: 24px;">Thông tin giao hàng</legend>
                    <div class="order-label">Họ & Tên</div>
                    <input id="full_name" style="width: 100%; padding: 4px 8px;" type="text" name="full-name" placeholder="E.g. Phan Van Hoang" class="input-responsive" required>

                    <div class="order-label">Số điện thoại</div>
                    <input id="phone" style="width: 100%; padding: 4px 8px;" type="tel" name="contact" placeholder="E.g. +84 123 xxxxxxxxx" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input id="email" style="width: 100%; padding: 4px 8px;" type="email" name="email" placeholder="E.g. abc123@gmail.com" class="input-responsive" required>

                    <div class="order-label">Địa chỉ</div>
                    <textarea id="address" style="width: 100%; padding: 4px 8px;" name="address" rows="10" placeholder="E.g. My Dinh, Ha Noi, Viet Nam" class="input-responsive" required></textarea>

                    <input type="submit" onclick="return check();" name="submit" value="Xác nhận đặt" class="btn btn-primary">
                    <a href="<?php echo SITEURL.'foods.php'; ?>" class="btn btn-danger ms-2">Hủy đặt</a>

                </fieldset>

            </form>

            <?php 
                if (isset($_POST['submit'])) {
                    $food = $_POST['food'];
                    $price = $_POST['price'];   
                    $qty = $_POST['qty'];
                    $total = $price * $qty;

                    $order_date = date("Y-m-d H:i:sa");

                    $status = "Ordered";

                    $customer_name = $_POST['full-name'];
                    $customer_contact = $_POST['contact'];
                    $customer_email = $_POST['email'];
                    $customer_address = $_POST['address'];

                    $sql2 = "INSERT INTO tbl_order SET 
                        food = '$food',
                        price = '$price',
                        qty = '$qty',
                        total = '$total',
                        order_date = '$order_date',
                        status = '$status',
                        customer_name = '$customer_name',
                        customer_contact = '$customer_contact',
                        customer_email = '$customer_email',
                        customer_address = '$customer_address'
                    ";
                

                    $res2 = mysqli_query($conn , $sql2);
                    if ($res2 == true) {
                        // $_SESSION['order'] = '<div id="order" class="success text-center">Food Ordered Sucessfully !</div>';
                        $_SESSION['order'] = 'Đặt hàng thành công ';;
                        header('location: '.SITEURL);
                    }else {
                        $_SESSION['order'] = 'Đặt hàng thất bại ';
                        header('location: '.SITEURL);
                    }


                }   
            ?>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->


<?php 
include("detail_front/footer.php") ;
ob_end_flush();
?>
<script>
    
    function check() {
        var fullname = document.getElementById('full_name').value;
        var phone = document.getElementById('phone').value;
        var email = document.getElementById('email').value;
        var address = document.getElementById('address').value;

        if (fullname == "" && phone == "" && email == "" && address == "") {
            alert("Vui lòng nhập đủ !");
            return false;
        }

    }


</script>

