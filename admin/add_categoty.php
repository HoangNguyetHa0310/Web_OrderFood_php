

<?php include("detail/menu.php") ?>

<div class="div-content">
    <div class="wrapper">
        <h1>Add Category</h1><br><br>

        <?php 
            if(isset($_SESSION['add'])){
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }

            if(isset($_SESSION['upload'])){
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }

        ?>



        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Title</td>
                    <td>
                        <input type="text" name="title" placeholder="Category Name">
                    </td>
                </tr>

                <tr>
                    <td>Select Image</td>
                    <td>
                        <input type="file" name="image" placeholder="Category Name">
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
                        <input type="submit" name="submit" value="Add Category" class="btn-primary" style="padding: 12px; margin-top: 12px;"> 
                    </td>
                </tr>

                
            </table>

        </form>
    </div>   

    <?php 
        if(isset($_POST['submit'])) {
            $title = $_POST['title'];
            // Image : check
            // print_r($_FILES['image']);
            // die();
            if (isset($_FILES['image']['name'])) {
                // name
                $image_name = $_FILES['image']['name'];

                // upload img if img is selected
                if ($image_name != '') {
                    // auto rename
                    $ext = end(explode(".","$image_name"));
                    
                    // 
                    $image_name = "Food_category_".rand(000,999).'.'.$ext;
    
                    // nơi chứa
                    $source_path = $_FILES['image']['tmp_name'];
    
                    // điểm đến của đừng dẫn
                    $destination_path = "../images/category/".$image_name;
                    // update img
    
                    $update = move_uploaded_file($source_path,$destination_path);
                    // 
                    if ($update == false) {
                        $_SESSION['upload'] = '<div class="error">Add Images Failed!</div>';
                        header("location: ".SITEURL."admin/add_categoty.php");
                        die();
                    }
                }

            }else {
                $image_name = ""; 
            }

             // featured : check 
             if (isset($_POST['featured'])) {
                $featured = $_POST['featured'];
            }else {
                $featured = "No";
            }

            // active : check
            if (isset($_POST['active'])){
                $active = $_POST['active'];

            }else {
                $featured = "No";
            }

            // sql :
            $sql = "INSERT INTO tbl_category SET 
                title = '$title',
                image_name = '$image_name',
                featured = '$featured',
                active = '$active'
            ";
            $res = mysqli_query($conn , $sql);

            if ($res == true) {
                // query successful
                $_SESSION['add'] = '<div class="success">Add Category Successfully ! </div>';
                header("location:".SITEURL."admin/manage_category.php");
            }else {
                // query failed
                $_SESSION['add'] = '<div class="error"> Add Category Failed! </div>';
                header("location:".SITEURL."admin/manage_category.php");
            }
        }

    ?>



</div>




<?php include("detail/footer.php") ?>

