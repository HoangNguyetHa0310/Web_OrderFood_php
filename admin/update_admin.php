<?php require("detail/menu.php") ?>


<div class="main-content">
    <div class="wrapper">
        <h1>Cập nhập admin</h1>
        <br><br>

        <?php
        $id = $_GET["id"];

        $sql = "SELECT * FROM tbl_admin WHERE id = $id ";

        $res = mysqli_query($conn, $sql);

        if ($res == true) {
            $count = mysqli_num_rows($res);
            if ($count == 1) {
                $row = mysqli_fetch_assoc($res);
                $fullname = $row["full_name"];
                $username = $row["username"];
            } else {
                header("location:" . SITEURL . "admin/manage_admin.php");
            }
        }

        ?>

        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Họ & Tên: </td>
                    <td>
                        <input type="text" name="full_name" value="<?php echo $fullname; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Tên tài khoản: </td>
                    <td>
                        <input type="text" name="username" value="<?php echo $username; ?>">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input onclick="return confirm('Bạn có chắc chắn muốn cập nhật không?');" type="submit" name="submit" value="Cập nhập admin" class="btn-primary" style="border: none; font-size: 16px; font-weight: 600; padding: 12px; ">
                    </td>
                </tr>

            </table>

        </form>

    </div>
</div>

<?php
    if (isset($_POST["submit"])) {
        // echo "byn click";
         $id = $_POST["id"];
         $full_name = $_POST["full_name"];
         $username = $_POST["username"];

        $sql = "UPDATE tbl_admin SET 
            full_name = '$full_name',
            username = '$username'
            WHERE id = '$id'
        ";

        $res = mysqli_query($conn,$sql);

        echo $res;

        if ($res == true ) {
            $_SESSION["update"] = '<div class="success">Cập nhập thông tin admin thành công !</div>';
            header("location:".SITEURL."admin/manage_admin.php");
        }else {
            $_SESSION["update"] = '<div class="error">Cập nhập thông tin admin thất bại !</div>';
            header("location:".SITEURL."admin/manage_admin.php");
        }

    }
?>


<?php require("detail/footer.php") ?>