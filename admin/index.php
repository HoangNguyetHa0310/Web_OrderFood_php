

<?php include("detail/menu.php") ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Control Panel</h1><br><br>

        <?php
            if (isset($_SESSION['login'])) {
                echo $_SESSION['login'];
                unset($_SESSION['login']); // xoa bo session bang
            }

           
        ?>
        <br><br>



        <div class="col-4 text-center">
            <?php 
                $sql = "SELECT * FROM tbl_category ";
                $res = mysqli_query($conn,$sql);
                $count = mysqli_num_rows($res);
            ?>
            
            <h1> <?php echo $count;?> </h1>
            Categores
        </div>

        <div class="col-4 text-center">
            <?php 
                $sql2 = "SELECT * FROM tbl_food ";
                $res2 = mysqli_query($conn,$sql2);
                $count2 = mysqli_num_rows($res2);
            ?>
            <h1> <?php echo $count2;?> </h1>
            Foods
        </div>

        <div class="col-4 text-center">
            <?php 
                $sql3 = "SELECT * FROM tbl_food ";
                $res3 = mysqli_query($conn,$sql3);
                $count3 = mysqli_num_rows($res3);
            ?>
            <h1> <?php echo $count3;?> </h1>
            Total Orders
        </div>

        <div class="col-4 text-center">
            <?php 
                $sql4 = "SELECT SUM(total) AS Total FROM tbl_order WHERE status='Delivered'";
                $res4 = mysqli_query($conn , $sql4);
                $count4 = mysqli_num_rows($res4);
                $row  = mysqli_fetch_assoc($res4);

                $total_revenue = $row['Total'];

            ?>

            
            <h1> <?php echo $total_revenue;?> VND</h1>
            Tổng doanh thu đạt được
        </div>

        <div class="clearfix"> </div>

    </div>

</div>



<!-- footer  -->
<?php require("detail/footer.php") ?>