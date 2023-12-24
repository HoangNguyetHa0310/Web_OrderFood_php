


<?php 

    if (!isset($_SESSION['user'])){
        $_SESSION['no_login_message'] = '<div class="error"> Please login ! </div>';
        header("location:".SITEURL."admin/login.php");
    }

?>