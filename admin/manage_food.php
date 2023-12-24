
    <!--menu Header navbar  -->
<?php require("detail/menu.php")?>

<!-- Main content -->
<div class="main-content">
    <div class="wrapper">
        <h1>Manage Food</h1> 
        <br><br>
        <?php 
            if (isset($_SESSION['add'])) {
                echo $_SESSION ['add'];
                unset ($_SESSION['add']);
            }

            if (isset($_SESSION['delete'])) {
                echo $_SESSION ['delete'];
                unset ($_SESSION['delete']);
            }

            if (isset($_SESSION['update'])) {
                echo $_SESSION ['update'];
                unset ($_SESSION['update']);
            }

            if (isset($_SESSION['upload'])) {
                echo $_SESSION ['upload'];
                unset ($_SESSION['upload']);
            }
            if (isset($_SESSION['Cannot_Access'])) {
                echo $_SESSION ['Cannot_Access'];
                unset ($_SESSION['Cannot_Access']);
            }

        ?>
        
        <br><br><br>
        <a href="<?php echo SITEURL; ?>admin/add_food.php" class="btn-primary">Add Food</a>
        <br><br><br>

        <table class="tbl-full">
            <tr>
                <th>STT</th>
                <th>Title</th>
                <th>Price</th>
                <th>Images</th>
                <th>Featured</th>
                <th>Active</th>
                <th>Actions</th>
            </tr>

            <?php 
                $sql = "SELECT * FROM tbl_food";
                $res = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($res);
                $sn=1;
                if ($count>0) {
                    while ($row = mysqli_fetch_assoc($res)){
                        $id = $row['id'];
                        $title = $row['title'];
                        $price = $row['price'];
                        $image_name = $row['image_name'];
                        $featured = $row['featured'];
                        $active = $row['active'];
                        ?>
                            <tr>
                                <td> <?php echo $sn++; ?> </td>
                                <td> <?php echo $title; ?> </td>
                                <td> <?php echo  $price; ?> </td>
                                <td>
                                    <?php
                                        if ($image_name == "") {
                                            echo '<div class="error"> Upload Image Failed ! </div>';
                                        }else {
                                            ?>
                                                <img src="<?php echo SITEURL;?>images/food/<?php echo $image_name; ?>" style="width: 100px; height: 70px;" >
                                            <?php 
                                        }
                                    ?>
                                 </td>
                                <td> <?php echo $featured; ?> </td>
                                <td> <?php echo $active; ?> </td>
                                <td>
                                    <a href="<?php echo SITEURL; ?>admin/update_food.php?id=<?php echo $id;?>" class="btn-primary" style="margin-right: 5px;">Update Food</a>
                                    <a href="<?php echo SITEURL; ?>admin/delete_food.php?id=<?php echo $id;?>&image_name=<?php echo $image_name;?>" class="btn-secondary">Delete Food </a>
                                </td>
                            </tr>
                        <?php 
                    }
                }else {
                    echo '
                        <tr>
                            <td colspan = "7" class="error"> Food not add !</td>
                        </tr>
                    ';
                }
            ?>
        </table>
       
    </div>

</div>


    <!-- footer  -->
<?php require("detail/footer.php") ?>