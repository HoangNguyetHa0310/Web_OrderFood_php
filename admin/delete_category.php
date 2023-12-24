

<?php 
    // echo 'adsfsads';
    include("../config/contact.php");
    
    // check
    if (isset($_GET['id']) AND isset($_GET['image_name'])) {
        // echo "value"; // Corrected from "valuw" to "value"
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];
        // remove the image available 
        if ($image_name != ""){
            // img avaiable
            $path = "../images/category/".$image_name;
            // remove the img
            $remove = unlink($path);
            
            // if fail to remove the image then an error massgae and stop the process
            if ($remove == false) {
                $_SESSION['delete'] = '<div class="success"> Failed to remove the image </div>';
                header('Location: '.SITEURL.'admin/manage_category.php');
            }
        }

        //delete data from database 
        $sql = "DELETE FROM tbl_category WHERE id = $id ";
        $res = mysqli_query($conn, $sql);
        // if success then redirect to manage category : redirect : là quá trình 
        if ($res == true) {
            $_SESSION['delete'] = '<div class="success">Delete Category Successfully! </div>';
            header('Location: '.SITEURL.'admin/manage_category.php');
        }else {
            $_SESSION['delete'] = '<div class="error"> Delete Category Failed! </div>';
            header('Location: '.SITEURL.'admin/manage_category.php');
        }

    } else {
        // echo "error";
        header("location:".SITEURL."admin/manage_category.php");
    }
?>
