

<?php 
    include('../config/contact.php');


    if (isset($_GET['id']) AND isset($_GET['image_name'])) {
        // echo "sohfjdosf";
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        if ($image_name != ""){
            $path = "../images/food/".$image_name;
            $remove = unlink($path);
            
            if ($remove == false) {
                $_SESSION['upload'] = '<div class="error"> Falied to remove image file ! </div>';
                header("location: ".SITEURL."admin/manage_food.php");
            }
        }
        // delete sql of food database 
        $sql = "DELETE FROM tbl_food WHERE id = $id " ;
        $res = mysqli_query($conn , $sql);
        // check 
        if ($res == true) {
            $_SESSION['delete'] = '<div class="success"> Food Delete Successfully ! </div>';
            header("location: ".SITEURL."admin/manage_food.php");
        }else {
            $_SESSION['delete'] = '<div class="error"> Food Delete Failed ! </div>';
            header("location: ".SITEURL."admin/manage_food.php");
        }

    }else {
        // echo "fskjdflksdf";
        $_SESSION['Cannot_Access'] = '<div class="error"> Cannot Access! </div>'; // không thể truy cập 
        header("location:" . SITEURL."admin/manage_food.php");
    }

?>