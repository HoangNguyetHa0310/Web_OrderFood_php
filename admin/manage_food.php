
    <!--menu Header navbar  -->
<?php require("detail/menu.php")?>

<!-- Main content -->
<div class="main-content">
    <div class="wrapper">
        <h1>Quản lý menu</h1> 
        <br><br>
        <?php 
            if (isset($_SESSION['add'])) {
                echo $_SESSION ['add'];
                unset ($_SESSION['add']);
            }

            if (isset($_SESSION['delete'])) {
                echo $_SESSION ['delete'];
                unset ($_SESSION['delete']);
            }

            if (isset($_SESSION['update'])) {
                echo $_SESSION ['update'];
                unset ($_SESSION['update']);
            }

            if (isset($_SESSION['upload'])) {
                echo $_SESSION ['upload'];
                unset ($_SESSION['upload']);
            }
            if (isset($_SESSION['Cannot_Access'])) {
                echo $_SESSION ['Cannot_Access'];
                unset ($_SESSION['Cannot_Access']);
            }

        ?>
        
        <br><br><br>
        <a href="<?php echo SITEURL; ?>admin/add_food.php" class="btn-primary">Thêm món</a>
        <br><br><br>

        <table class="tbl-full">
            <tr>
                <th>STT</th>
                <th>Tên</th>
                <th>Giá</th>
                <th>Ảnh</th>
                <th>Tính đặc biệt</th>
                <th>Hoạt động</th>
                <th>Chức năng</th>
            </tr>

            <?php 
                $sql = "SELECT * FROM tbl_food";
                $res = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($res);
                $sn=1;
                if ($count>0) {
                    while ($row = mysqli_fetch_assoc($res)){
                        $id = $row['id'];
                        $title = $row['title'];
                        $price = $row['price'];
                        $image_name = $row['image_name'];
                        $featured = $row['featured'];
                        $active = $row['active'];
                        ?>
                            <tr>
                                <td> <?php echo $sn++; ?> </td>
                                <td> <?php echo $title; ?> </td>
                                <td> <?php echo  $price; ?> </td>
                                <td>
                                    <?php
                                        if ($image_name == "") {
                                            echo '<div class="error"> Cập nhật ảnh thất bại ! </div>';
                                        }else {
                                            ?>
                                                <img src="<?php echo SITEURL;?>images/food/<?php echo $image_name; ?>" style="width: 100px; height: 70px;" >
                                            <?php 
                                        }
                                    ?>
                                 </td>
                                <td> <?php echo $featured; ?> </td>
                                <td> <?php echo $active; ?> </td>
                                <td>
                                    <a href="<?php echo SITEURL; ?>admin/update_food.php?id=<?php echo $id;?>" class="btn-primary" style="margin-right: 5px;">Cập nhật món ăn</a>
                                    <a href="<?php echo SITEURL; ?>admin/delete_food.php?id=<?php echo $id;?>&image_name=<?php echo $image_name;?>" class="btn-secondary">Xóa món ăn </a>
                                </td>
                            </tr>
                        <?php 
                    }
                }else {
                    echo '
                        <tr>
                            <td colspan = "7" class="error"> Món ăn chưa được thêm!</td>
                        </tr>
                    ';
                }
            ?>
        </table>
       
    </div>

</div>


    <!-- footer  -->
<?php require("detail/footer.php") ?>