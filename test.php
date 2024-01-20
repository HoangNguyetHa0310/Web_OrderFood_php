<?php include("./config/contact.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php require('detail_front/links.php'); ?>
  <link rel="stylesheet" href="./css/cart.css">
  <title>Cart</title>
</head>

<body>
  <div class="container cart_main">
    <!-- Hiện thông báo  -->
    <div id="noti" class="position-fixed top-0 end-0 p-3" style="z-index:5;">
      <div id="cancelToast" style="background-color: #009900;" class="toast hide text-white " role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
          <i class="bi bi-person-circle rounded me-2"></i>
          <strong class="me-auto">Thông báo</strong>
          <small>1 second ago</small>
          <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body text-white">
          Vui lòng gọi cho admin !
        </div>
      </div>
    </div>

    <div class="row cart_content">
      <div class="col-md-12 bg-light cart_detail">
        <a href="./index.php" class="cart_header text-decoration-none d-flex align-item-center ms-3 mt-5 fs-3 mb-4">
          <i class="bi bi-arrow-left me-3 fs-2"></i>
          <div class="d-flex align-items-center justify-content-center">
            <span class="fs-4">Quay lại</span>
          </div>
        </a>

        <div class="separation"></div>

        <div class="header_description">
          <h3 class="mt-4">Giỏ hàng </h3>
          <!-- <h5 class="fs-5 ms-3">Bạn có 34 order trong giỏ hàng </h5> -->
        </div>

        <?php
        $sql = "SELECT tbl_order.id, tbl_order.food, tbl_order.price, tbl_order.qty, tbl_order.order_date,tbl_order.status, tbl_order.total, tbl_order.customer_address, tbl_food.image_name
          FROM tbl_order
          INNER JOIN tbl_food 
          ON tbl_order.food = tbl_food.title
          WHERE tbl_order.status != 'Cancelled'
          ORDER BY tbl_order.id DESC";

        $res = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($res);

        if ($count > 0) {
          while ($row = mysqli_fetch_assoc($res)) {
            $id = $row['id'];
            $food = $row['food'];
            $price = $row['price'];
            $qty = $row['qty'];
            $order_date = $row['order_date'];
            $status = $row['status'];
            $total = $row['total'];
            $customer_address = $row['customer_address'];
            $image_name = $row['image_name'];
        ?>
            <div class="cart_item ">
              <div class="img_food d-flex" style="height: 83px;">
                <?php
                if ($image_name == "") {
                  echo '<div class="error">Không có ảnh!</div>';
                } else {
                ?>
                  <img class="img-responsive img-curve" src="<?php echo SITEURL ?>images/food/<?php echo $image_name; ?>" class="img-responsive img-curve" style="width: 80px; border-radius: 10px;">
                <?php
                }
                ?>
                <div class="food_description ms-4 d-grid place-items-center" style="width: 200px; max-height: 200px; overflow: hidden;  text-overflow: ellipsis;">
                  <h4><?php echo $food ?></h4>
                  <h6><?php echo $customer_address ?></h6>
                </div>
              </div>

              <div class="qty_detail d-flex flex-column">
                <div class="d-flex">
                  <span class="fw-bold me-2">Số lượng:</span>
                  <span><?php echo $qty; ?></span>
                </div>
                <div class="mt-2">
                  <span class="fw-bold">Ngày:</span>
                  <span><?php echo $order_date; ?></span>
                </div>
              </div>


              <div class="price">
                <h5 style=""><?php echo $price; ?> VND</h5>
                <a href="#" class="btn btn-success" style=" margin-right: 40px; padding: 6px 24px;">
                  <button id="cancel" onclick="showStatus()" style="width: 72px; background-color: transparent; border: none; color: white; font-weight:500; "><?php echo $status ;?></button>
                </a>
              </div>

              <div class="delete">
                <a href="#" class="btn btn-danger" style="margin-right: 40px; padding: 6px 24px;">
                  <button id="cancel" onclick="showNoti()" style="background-color: transparent; border: none; color: white; font-weight:500; ">Hủy đơn</button>
                </a>

              </div>
            </div>

        <?php
          }
        } else {
          echo "<div> Giỏ hàng chưa được thêm ! </div>";
        }
        ?>
      </div>
    </div>
  </div>

</body>

</html>
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<!-- Bootstrap JavaScript và Popper.js (cần thiết cho Toast) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<!-- Các mã JavaScript của bạn -->
<script>
  function showNoti() {
    var toast = new bootstrap.Toast(document.getElementById('cancelToast'));
    toast.show();
  }



</script>
