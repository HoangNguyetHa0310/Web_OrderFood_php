<?php require("detail/menu.php") ?>


<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin </h1>
        <br><br>
        <?php 
            if(isset($_SESSION['add'])){
                echo $_SESSION["add"];
                unset($_SESSION["add"]);
            }
        ?>

        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Full Name: </td>
                    <td>
                        <input type="text" name="full_name" placeholder="Enter your name">
                    </td>
                </tr>

                <tr>
                    <td>User Name: </td>
                    <td>
                        <input type="text" name="username" placeholder="Your User Name">
                    </td>
                </tr>

                <tr>
                    <td>Password: </td>
                    <td>
                        <input type="password" name="password" placeholder="Password">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add admin" class="btn-primary" style="border: none; font-size: 16px; font-weight: 600; padding: 12px; ">
                    </td>
                </tr>

            </table>

        </form>

    </div>
</div>



<?php require("detail/footer.php") ?>





<?php
if (isset($_POST["submit"])) {

    // 1. lấy dữ liệu tui
    $full_name = $_POST["full_name"];
    $username = $_POST["username"];
    $password = $_POST["password"];

    // 2.sql query lưuu vào database 
    $sql = "INSERT INTO tbl_admin SET 
    full_name = '$full_name',
    username = '$username',
    password = '$password'
    ";


    // 3. khai báo vào database
    $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    // 4. Check
    if ($res == true) {
        // echo "Connect Success !"; // chèn data vào database
        $_SESSION['add'] = '<div class="success">Thêm admin thành công !</div>';
        header("location: ".SITEURL.'admin/manage_admin.php');
        
    } else {
        // echo "Connect Failure !"; // chèn data thất bại vào database
        $_SESSION['add'] = '<div class="error">Thêm admin thất bại, Hãy thử lại !</div>';
        header("location: ".SITEURL.'admin/add_admin.php');
    }


}

?>