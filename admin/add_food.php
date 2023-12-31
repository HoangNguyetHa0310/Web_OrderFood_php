
<?php
ob_start();
?>

<?php include("detail/menu.php");?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Food</h1>   
        <br><br>

        <?php 
            if (isset($_SESSION['upload'])){
                echo $_SESSION['upload'];
                unset ($_SESSION['upload']);
            }

        ?>

        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Title</td>
                    <td>
                        <input type="text" name="title" placeholder="Title Food">
                    </td>
                </tr>

                <tr>
                    <td>Description </td>
                    <td>
                       <textarea name="description" id="description" cols="25" rows="5" placeholder="Description for food "></textarea>
                    </td>
                </tr>

                <tr>
                    <!-- Gia -->
                    <td>Price</td> 
                    <td>
                        <input type="number" name="price" > 
                    </td>
                </tr>

                <tr>
                    <td>Select Image</td>
                    <td>
                        <input type="file" name="image" placeholder="Image food">
                    </td>
                </tr>

                <tr>
                    <td>Category</td>
                    <td>
                        <select name="category">
                            <!-- create php to display category from database  -->
                            <?php 
                                $sql = "SELECT * FROM tbl_category WHERE active = 'Yes'";
                                $res = mysqli_query($conn ,$sql);
                                $count = mysqli_num_rows($res);

                                if ($count > 0 ) {
                                    // echo "ahhahahha";
                                    while ($row = mysqli_fetch_assoc($res)){
                                        $id = $row ["id"];
                                        $title = $row ["title"];
                                        ?>
                                            <option value="<?php echo $id;?>"><?php echo $title;?> </option>
                                        <?php 
                                    }
                                }else {
                                    ?>
                                        <option value="<?php echo $id;?>"><?php echo $title; ?></option>
                                    <?php 
                                }
                            ?>
                        </select>
                    </td>
                </tr>

                <tr>
                    <!-- Tinhs chat dac biet  -->
                    <td>Featured</td> 
                    <td>
                        <input type="radio" name="featured" value="Yes"> Yes
                        <input type="radio" name="featured" value="No"> No
                    </td>
                </tr>

                <tr>
                    <!-- co dang hoat dong khong  -->
                    <td>Actives</td> 
                    <td>
                        <input type="radio" name="active" value="Yes"> Yes
                        <input type="radio" name="active" value="No"> No
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Food" class="btn-primary" style="padding: 12px; margin-top: 12px;"> 
                    </td>
                </tr>

                
            </table>
        </form>

        <?php 
            if (isset($_POST['submit'])) {
                // echo "sjfkl";
                // add food to database 
                $title = $_POST['title'];
                $description = $_POST['description'];
                $price = $_POST['price'];
                // select image 
                if (isset($_FILES['image']['name'])){
                    $image_name = $_FILES['image']['name'];
                    // check img is seected or not and upload img oly if selected
                    if($image_name != "") {
                        // 1.rename img 
                        $extArray = explode('.', $image_name);
                        $ext = end($extArray);
                        // 2.create new img
                        $image_name = "Food-name-".rand(0000,9999).".".$ext;
                        // 3.source path id the current location of the image
                        $src = $_FILES['image']['tmp_name'];
                        $dst = "../images/food/".$image_name;

                        $upload = move_uploaded_file($src, $dst);

                        if ($upload == false) {
                            $_SESSION['upload'] = '<div class="error"> Failed to upload Image </div>';
                            header("location:" .SITEURL."admin/add_food.php");
                            die();
                        }
                    }
                }else {
                    $image_name = "";
                }

                // category 
                $category = $_POST['category'];

                // check featured category
                if (isset($_POST['featured'])) {
                    $featured = $_POST['featured'];
                }else {
                    $featured = "No";
                }

                // check active category
                if (isset($_POST['active'])) {
                    $active = $_POST['active'];
                }else {
                    $active = "No";
                }

                // insert to database
                $sql2 = "INSERT INTO tbl_food SET 
                    title = '$title',
                    description = '$description',
                    price = '$price',
                    image_name = '$image_name',
                    category_id = '$category',
                    featured = '$featured',
                    active = '$active'
                ";

                $res2 = mysqli_query($conn, $sql2);

                if ($res2 == true) {
                    // success
                    $_SESSION['add'] = '<div class="success"> Upload Food Successfully ! </div>';
                    header("location:" . SITEURL . "admin/manage_food.php");
                    // exit();
                } else {
                    // failed
                    $_SESSION['add'] = '<div class="error"> Upload Food Failed ! </div>';
                    header("location:" . SITEURL . "admin/manage_food.php");
                    // exit();
                }


            }
        ?>


    </div>
</div>



<?php include("detail/footer.php") ?>

<?php
ob_end_flush(); // Flush the output buffer and send it to the browser
?>