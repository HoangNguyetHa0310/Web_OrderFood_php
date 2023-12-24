<!--menu Header navbar  -->
<?php require("detail/menu.php") ?>

<!-- Main content -->
<div class="main-content">
    <div class="wrapper">
        <h1>Manage Admin</h1>

        <!-- btn add admin  -->
        <br><br>
        <?php
        if (isset($_SESSION['add'])) {
            echo $_SESSION['add']; // hieenr thi session bang massage
            unset($_SESSION['add']); // xoa bo session bang massage
        }

        if (isset($_SESSION['delete'])) {
            echo $_SESSION['delete']; // hieenr thi session bang massage
            unset($_SESSION['delete']); // xoa bo session bang massage
        }

        if (isset($_SESSION['update'])) {
            echo $_SESSION['update']; // hieenr thi session bang massage
            unset($_SESSION['update']); // xoa bo session bang massage
        }

        if (isset($_SESSION['user_not_found'])) {
            echo $_SESSION['user_not_found']; // hieenr thi session bang massage
            unset($_SESSION['user_not_found']); // xoa bo session bang massage
        }

        // if (isset($_SESSION['pass_not_match'])) {
        //     echo $_SESSION['pass_not_match']; // hieenr thi session bang massage
        //     unset($_SESSION['pass_not_match']); // xoa bo session bang massage
        // }

        if (isset($_SESSION['change_pass'])) {
            echo $_SESSION['change_pass']; // hieenr thi session bang massage
            unset($_SESSION['change_pass']); // xoa bo session bang massage
        }

        

        ?>



        <br><br><br>
        <a href="add_admin.php" class="btn-primary">Add Admin</a>
        <br><br><br>

        <table class="tbl-full">
            <tr>
                <th>STT</th>
                <th>Full Name</th>
                <th>User Name</th>
                <th>Actions </th>
            </tr>

            <?php
            // laay du lieu 
            $sql = "SELECT * FROM tbl_admin";

            $res = mysqli_query($conn, $sql);

            if ($res == true) {
                // check hang trong data co hay la khong 
                $count = mysqli_num_rows($res); // function laays tat ca hang trong data
                $stt = 1; // sô thứ tự khi hiển thị nếu dùng id thì sẽ không tự sắp xếp 
                if ($count > 0) {
                    // khi co data 
                    while ($row = mysqli_fetch_assoc($res)) {
                        // dung vong lap de lay data 
                        $id = $row['id'];
                        $full_name = $row['full_name'];
                        $username = $row['username'];

            ?>
                        <tr>
                            <!-- dùng thuật toán i++ thay cho $id vì nó không thể tự động cập nhật  -->
                            <td><?php echo $stt++ ?></td>
                            <td><?php echo $full_name ?></td>
                            <td><?php echo $username ?></td>
                            <td>
                                <a href="<?php echo SITEURL; ?>admin/update_password.php?id=<?php echo $id; ?>" class="btn-danger">Change Password</a>
                                <a href="<?php echo SITEURL; ?>admin/update_admin.php?id=<?php echo $id; ?>" class="btn-primary" style="margin:0 5px; border-radius: 3px;">Update Admin</a>
                                <a href="<?php echo SITEURL; ?>admin/delete_admin.php?id=<?php echo $id; ?> " class="btn-secondary" style="border-radius: 3px;">Delete Admin </a>
                            </td>
                        </tr>
            <?php
                    }
                } else {
                }
            }
            ?>
        </table>


    </div>

</div>


<!-- footer  -->
<?php require("detail/footer.php") ?>