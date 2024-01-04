<?php include("detail/menu.php") ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Thay đổi mật khẩu</h1>
        <br><br>

        <?php 
            if(isset($_GET['id'])){
                $id = $_GET['id'];
            }

            if (isset($_SESSION['pass_not_match'])) {
                echo $_SESSION['pass_not_match']; // hieenr thi session bang massage
                unset($_SESSION['pass_not_match']); // xoa bo session bang massage
            }
        
        ?>


        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td> Mật khẩu hiện tại</td>
                    <td>
                        <input type="password" name="current_password" placeholder="Mật khẩu hiện tại">
                    </td>
                </tr>

                <tr>
                    <td>Mật khẩu mới </td>
                    <td>

                        <input type="password" name="new_password" placeholder="Mật khẩu mới">
                    </td>
                </tr>

                <tr>
                    <td>Xác nhận mật khẩu</td>
                    <td>
                        <input type="password" name="comfirm_password" placeholder="Xác nhận">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Cập nhật" class="btn-primary" style="border: none; margin-top:12px; padding: 12px; border-radius: 3px; font-size: 16px;"> 
                    </td>
                </tr>
            </table>

        </form>

    </div>
</div>

<?php
    if(isset($_POST['submit'])){
        // 1. lấy data
        $id = $_POST['id'];
        $current_password = $_POST['current_password'];
        $new_password = $_POST['new_password'];
        $comfirm_password = $_POST['comfirm_password'];

        // 2. check pass hiện tại 
        $sql = "SELECT * FROM  tbl_admin WHERE id = '$id' AND password='$current_password'";

        $res = mysqli_query($conn, $sql);

        if ($res == true) {
            $count = mysqli_num_rows($res);
            // cầm count để so sánh với 1 hàng trong sql nếu thay bằng 2 thì sẽ là 2 hàng trong sql 
            if ($count == 1 ) {
                // echo "user found";
                //User exit and pass ddc change
                if ($new_password == $comfirm_password) {
                    // echo "Success";
                    $sql2 = "UPDATE tbl_admin SET 
                        password = '$new_password'
                        WHERE id = $id
                    ";
                    $res2 = mysqli_query($conn, $sql2);
                    // check 
                    if ($res2 == true) {
                        $_SESSION['change_pass'] = '<div class="success"> Thay đổi thành công !</div> ';
                        header("location: ".SITEURL."admin/manage_admin.php");
                    }else {
                        $_SESSION['change_pass'] = '<div class="error"> Thay đổi thất bại !</div> ';
                        header("location: ".SITEURL."admin/manage_admin.php");
                    }
                    

                }else {
                    $_SESSION['pass_not_match'] = '<div class="error"> Mật khẩu không khớp, thử lại!</div> ';
                    header("location: ".SITEURL."admin/update_password.php");
                }
            }else {
                $_SESSION['user_not_found'] = '<div class="error"> Người dùng không được tìm thấy ! </div> ';
                header("location: ".SITEURL."admin/manage_admin.php");
            }
        }

        // 3. check  new pass
        
        
        
        // 4. change password
    }

?>


<?php include("detail/footer.php") ?>