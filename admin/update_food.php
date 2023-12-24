<?php
ob_start(); 
include("detail/menu.php") ?>
<?php 
    if(isset($_GET['id'])) {
        // echo 'hehehe';
        $id = $_GET['id'];
        $sql2 = "SELECT * FROM tbl_food WHERE id = $id";
        $res2 = mysqli_query($conn,$sql2);
        $row2 = mysqli_fetch_assoc($res2);
        // get data from database
        $title = $row2['title'];
        $description = $row2['description'];
        $price = $row2['price'];
        $current_image = $row2['image_name'];
        $current_category = $row2['category_id'];        
        $featured = $row2['featured'];
        $active = $row2['active'];
    }else {
        // echo 'jajdlaj';
        header("location: ".SITEURL."admin/manage_food.php");
    }     
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Food</h1>
        <br><br>

        <br><br><br>
        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Title</td>
                    <td>
                        <input type="text" name="title" value="<?php echo $title; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Description</td>
                    <td>
                        <textarea name="description" id="description" cols="25" rows="5"><?php echo $description; ?></textarea>
                    </td>
                </tr>

                <tr>
                    <td>Price</td>
                    <td>
                        <input type="text" name="price" value="<?php echo $price; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Current image</td>
                    <td>
                        <?php 
                        if ($current_image != "") {
                            // <!-- hiển thị ảnh: display ảnh -->
                            ?>
                                <img src="<?php echo SITEURL; ?>images/food/<?php echo $current_image;?>" width="100px" height="100px">
                            <?php 
                        } else {
                            // <!-- hiển thị thông báo -->
                            echo '<div class="error">Image not added</div>';
                        }
                        ?>
                    </td>
                </tr>

                <tr>
                    <td>New Image</td>
                    <td>
                        <input type="file" name="image">
                    </td>

                </tr>

                <tr>
                    <td>Category</td>
                    <td>
                        <select name="category" >
                            <?php 
                                $sql = "SELECT * FROM tbl_category WHERE active = 'Yes'";
                                $res = mysqli_query($conn , $sql);
                                $count = mysqli_num_rows($res);
                                if ($count > 0) {
                                    while ($row = mysqli_fetch_array($res)) {
                                        $category_title = $row['title'];
                                        $category_id = $row['id'];
                                        ?>
                                            echo '<option value="<?php echo $category_id?>"><?php echo $category_title?></option>';
                                        <?php 
                                    }
                                }else {
                                    ?>
                                        echo '<option value="0" class="error">Category not Invailable !</option>';  
                                    <?php
                                }
                        
                            ?>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Featured</td>
                    <td>
                        <input <?php if($featured == "Yes") {echo "checked" ;}?> type="radio" name="featured" value="Yes"> Yes
                        <input <?php if($featured == "No") {echo "checked" ;}?> type="radio" name="featured" value="No"> No
                    </td>
                </tr>

                <tr>
                    <td>Active</td>
                    <td>
                        <input <?php if($active == "Yes") {echo "checked" ;}?> type="radio" name="active" value="Yes"> Yes
                        <input <?php if($active == "No") {echo "checked" ;}?> type="radio" name="active" value="No"> No
                    </td>
                </tr>
                            
                <?php
                    ob_start();
                ?>
                    <tr>
                        <td>
                            <form action="your_update_food_handler.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                                <input type="submit" name="submit" value="Update food" class="btn-primary" style="padding: 12px; margin-top: 12px;">
                            </form>
                        </td>
                    </tr>
                <?php
                    ob_end_flush();
                ?>

            </table>

        </form>


        <?php 
            if (isset($_POST['submit'])) {
                $id = $_POST['id'];
                $title = $_POST['title'];
                $description = $_POST['description'];
                $price = $_POST['price'];
                $current_image = $_POST['current_image'];
                $category = $_POST['category'];

                $featured = $_POST['featured'];
                $active = $_POST['active'];

                if (isset($_FILES['image']['name'])) {
                    $image_name = $_FILES['image']['name'];
                    if ($image_name != "") {
                        // rename 
                        $image_parst = explode(".",$image_name);
                        $ext = end($image_parst);// extension for image
                        $image_name = "food-name-".rand(0000,9999).'.'.$ext; //name img
                        $src_path = $_FILES['image']['tmp_name']; // source path for image
                        $dest_path = "../images/food/".$image_name; // destination path for image
                        // upload image
                        $upload = move_uploaded_file($src_path,$dest_path);
    
                        if ($upload == false) {
                            $_SESSION['upload'] = '<div class="error">Upload Images Failed!</div>';
                            header('location:'.SITEURL.'admin/manage_food.php');
                            die();
                        }
                        
                        if ($current_image != "" && file_exists("../images/food/" . $current_image)) {
                            $remove_path = "../images/food/" . $current_image;
                            $remove = unlink($remove_path);
                        
                            if ($remove == false) {
                                $_SESSION['remove_failed'] = '<div class="error">Remove Current Image Failed!</div>';
                                header('location: '.SITEURL.'admin/manage_food.php');
                                die();
                            }
                        }                                  
                    }else {
                        $image_name = $current_image;
                    }
                }else {
                    $image_name = $current_image;
                }

                // sql 3 
                $sql3 = "UPDATE tbl_food SET 
                    title = '$title',
                    description = '$description',
                    price = '$price',
                    image_name = '$image_name',
                    category_id = '$category',
                    featured = '$featured',
                    active = '$active' 
                    WHERE id='$id' 
                ";
                $res3 = mysqli_query($conn, $sql3);

                if ($res3 == true) {
                    $_SESSION['update'] = '<div class="success"> Update Food Successfully !</div>';
                    header('location: '.SITEURL.'admin/manage_food.php');
                } else {
                    $_SESSION['update'] = '<div class="error"> Update Food Failed !</div>';
                    header('location: '.SITEURL.'admin/manage_food.php');
                }
            }
        ?>


    </div>
</div>



<?php 
include("detail/footer.php") ;
ob_end_flush(); // Flush the output buffer
?>