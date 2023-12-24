<!--menu Header navbar  -->
<?php require("detail/menu.php") ?>

<!-- Main content -->
<div class="main-content">
    <div class="wrapper">
        <h1>Manage Order</h1>
        <br><br>

        <?php 
            if (isset($_SESSION['update_order'])) {
                echo $_SESSION['update_order'];
                unset($_SESSION['update_order']);
            }
        ?>

        <br><br><br>
        <a href="<?php echo SITEURL; ?>admin/add_categoty.php" class="btn-primary">Add Order</a>
        <br><br><br>
        <table class="tbl-full">
            <tr>
                <th>STT</th>
                <th>Food</th>
                <th>Price</th>
                <th>Quantity </th>
                <th>Total </th>
                <th>Order Date </th>
                <th>Status</th>
                <th>Customer Name </th>
                <th>Contact </th>
                <th>Email </th>
                <th>Address </th>
                <th>Actions </th>
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
                                <td>
                                    <?php 
                                        if($status == 'Ordered') {
                                            echo "<lable class='success' style='width: 50px;'> $status  </lable>";
                                        }elseif($status == 'Delivering') {
                                            echo "<lable class='warning' style='width: 50px;'> $status  </lable>";
                                        }elseif($status == 'Delivered') {
                                            echo "<lable class='warning-2' style='width: 50px;'> $status  </lable>";
                                        }elseif($status == 'Cancelled'){
                                            echo "<lable class='error' style='width: 50px;'> $status  </lable>";
                                        }
                                    ?>
                                </td>
                                <td> <?php echo $customer_name;?> </td>
                                <td> <?php echo $customer_contact;?> </td>
                                <td> <?php echo $customer_email;?> </td>
                                <td> <?php echo $customer_address;?> </td>
                                <td>
                                    <a href="<?php echo SITEURL;?>admin/update_order.php?id=<?php echo $id;?>" class="btn-primary" style="margin-right: 5px; padding: 20px;">Update</a>
                                </td>
                             </tr>
                        <?php 
                    }
                }else {
                    echo "
                        <tr>
                            <td colspan='12' class='error'> Order Not Available ! </td>
                        </tr>
                    ";
                }
            ?>
        </table>
    </div>

</div>


<!-- footer  -->
<?php require("detail/footer.php") ?>