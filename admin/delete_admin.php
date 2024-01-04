


<?php 

    require("../config/contact.php");
    // 1. lấy id của admin sau dó delete 
    echo $id = $_GET['id'];

    // 2. ket noi voi database to delete 
    $sql = "DELETE FROM tbl_admin WHERE id=$id";
    // 3. 
    $res = mysqli_query($conn , $sql);

    if ($res == true) {
        $_SESSION['delete'] = '<div class="success">Xóa admin thành công !</div>';
        header("location: ".SITEURL."admin/manage_admin.php");
    }else {
        $_SESSION['delete'] = '<div class="error">Xóa admin thất bại !</div>';
        header("location: ".SITEURL."admin/manage_admin.php");
    }

?>