<?php 
    include("../config/contact.php");

    session_destroy();
    header("location: ".SITEURL."admin/login.php");

?>
