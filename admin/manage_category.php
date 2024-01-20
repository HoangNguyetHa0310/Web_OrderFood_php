<!--menu Header navbar  -->
<?php require("detail/menu.php") ?>

<!-- Main content -->
<div class="main-content">
    <div class="wrapper">
        <h1>Quản lý nguyên liệu</h1>
        <br><br>

        <?php
            if (isset($_SESSION['add'])) {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }

            if (isset($_SESSION['remove'])) {
                echo $_SESSION['remove'];
                unset($_SESSION['remove']);
            }

            if (isset($_SESSION['delete'])) {
                echo $_SESSION['delete'];
                unset($_SESSION['delete']);
            }

            if (isset($_SESSION['no_category_found'])) {
                echo $_SESSION['no_category_found'];
                unset($_SESSION['no_category_found']);
            }

            if (isset($_SESSION['update'])) {
                echo $_SESSION['update'];
                unset($_SESSION['update']);
            }

            if (isset($_SESSION['upload'])) {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }

            if (isset( $_SESSION['fail_remove'])) {
                echo $_SESSION['fail_remove'];
                unset($_SESSION['fail_remove']);
            }


        ?>

        <br><br><br>
        <a href="<?php echo SITEURL; ?>admin/add_categoty.php" class="btn-primary">Thêm nguyên liệu</a>
        <br><br><br>

        <table class="tbl-full">
            <tr>
                <th>STT</th>
                <th>Tên nguyên liệu</th>
                <th>Ảnh</th>
                <th>Nguyên liệu nổi bật</th>
                <th>Trạng thái hoạt động</th>
                <th>Chức năng</th>
            </tr>

            <?php
            $sql = "SELECT * FROM tbl_category";
            $res = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($res);
            $sn = 1;
            if ($count > 0) {
                while ($row = mysqli_fetch_assoc($res)) {
                    $id = $row['id'];
                    $title = $row['title'];
                    $image_name = $row['image_name'];
                    $featured = $row['featured'];
                    $active = $row['active'];
                    ?>
                        <tr>
                            <td><?php echo $sn++; ?></td>
                            <td><?php echo $title; ?></td>
                            <td>
                                <?php 
                                    if ($image_name != '') {
                                        ?>
                                            <img src="<?php echo SITEURL;?>images/category/<?php echo  $image_name;?>" width="100px" height="70px">
                                        <?php
                                    }else {
                                        echo '<div class="error">Add Image Failed !</div>';
                                    }
                                ?>
                            </td>
                            <td><?php echo $featured; ?></td>
                            <td><?php echo $active; ?></td>
                            <td>
                                <a href="<?php echo SITEURL; ?>admin/update_category.php?id=<?php echo $id;?>" class="btn-primary" style="margin-right: 5px;">Cập nhật nguyên liệu</a>
                                <a href="<?php echo SITEURL; ?>admin/delete_category.php?id=<?php echo $id;?>&image_name=<?php echo $image_name;?>" class="btn-secondary">Xóa nguyên liệu</a>
                            </td>
                        </tr>
                    <?php
                }
            } else {
                ?>
                    <tr>
                        <td colspan="6">
                            <div class="error">Nguyên liệu chưa được thêm ! </div>
                        </td>
                    </tr>

                <?php
            }
            ?>
        </table>


    </div>

</div>


<!-- footer  -->
<?php require("detail/footer.php") ?>