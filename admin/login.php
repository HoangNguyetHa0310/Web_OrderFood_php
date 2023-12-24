
<?php include("../config/contact.php")?>

<html>
    <head>
        <title>LogIn </title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>
<body>
    
    <div class="login">
        <h1 >Login</h1> <br><br>

        <?php 
            if (isset($_SESSION['login'])){
                echo $_SESSION['login'];
                unset($_SESSION['login']) ;
            }

            if (isset($_SESSION['no_login_message'])) {
                echo $_SESSION['no_login_message'];
                unset($_SESSION['no_login_message']);
            }

        
        ?>
        <br>


        <!-- login  -->
        <form action="" method="POST">

            <label for="username">User Name</label><br>
            <input id="username" type="text" name="username" placeholder="Enter Name" style="width: 100%; font-size: 16px; padding: 4px;"><br><br>

            <label for="password">Password</label><br>
            <input id="password" type="password" name="password" placeholder="Enter Password" style="width: 100%; font-size: 16px; padding: 4px;" ><br><br>

            <input type="submit" name="submit" value="Login" class="btn-primary" style="margin: 12px 0 12px 45%;  padding: 14px; ">

        </form>

        
        <p class="text-center" style="margin-top: 20px;" >Created By - <a href="#">Hoang Nguyet Ha</a></p>


    </div>

</body>

</html>


<?php 
    if(isset ($_POST['submit'])){
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn,  $_POST['password']);

        $sql = "SELECT * FROM tbl_admin WHERE username = '$username' AND password = '$password'";
        $res = mysqli_query($conn , $sql);

        $count = mysqli_num_rows($res);

        if ($count == 1 ) {
            $_SESSION['login'] = '<div class="success"> Login Success ! </div>';
            $_SESSION['user'] = $username;
            header("location: ".SITEURL."admin/");
        }else {
            $_SESSION['login'] = '<div class="error"> Username or Password incorrect ! </div>';
            header("location: ".SITEURL."admin/login.php");
        }

    }
?>