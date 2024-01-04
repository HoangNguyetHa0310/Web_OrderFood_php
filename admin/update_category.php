<?php 
include("detail/menu.php");
ob_start();
?>
<div class="main-contant">
    <div class="wrapper">
        <h1>Cập nhật nguyên liệu</h1>
        <br><br> 
        <!-- Phuts 40 -->

        <?php 
            if (isset($_GET["id"])){
                // echo "asdsada";
                $id = $_GET["id"];
                $sql = "SELECT * FROM tbl_category WHERE id = '$id'";
                $res = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($res);

                if ($count == 1 ){
                    // lấy địa chỉ GPS
                    $row = mysqli_fetch_assoc($res);
                    $title = $row["title"];
                    $current_image =$row['image_name'];
                    $featured = $row['featured'];
                    $active = $row['active'];


                }else {
                    $_SESSION['no_category_found'] = '<div class="error">Category no found !</div>';
                    header("location:".SITEURL."admin/manage_category.php");
                }


            }else {
                // echo "asdasdaddasdasd";
                header("location:".SITEURL."admin/manage_category.php");
            }
        ?>


        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr >
                    <td>Tên</td>
                    <td>
                        <input type="text" name="title" value="<?php echo $title;?>">
                    </td>
                </tr>

                    <tr>
                    <td>Ảnh hiện tại</td>
                    <td>
                        <?php 
                        if ($current_image != "") {
                            // <!-- hiển thị ảnh: display ảnh -->
                            ?>
                                <img src="<?php echo SITEURL; ?>images/category/<?php echo $current_image;?>" width="100px" height="100px">
                            <?php 
                        } else {
                            // <!-- hiển thị thông báo -->
                            echo '<div class="error">Ảnh chưa được thêm</div>';
                        }
                        ?>
                    </td>
                </tr>

                <tr>
                    <td>Ảnh mới </td>
                    <td>
                        <input type="file" name="image" onchange="displayImage(this)">
                        <br>
                        <div id="imagePreview"></div>
                    </td>
                </tr>

                <script>
                    function displayImage(input) {
                        var file = input.files[0];
                        if (file) {
                            var reader = new FileReader();
                            reader.onload = function(e) {
                                document.getElementById("imagePreview").innerHTML = '<br>New Image Preview:<br><img src="' + e.target.result + '" width="100px" height="100px">';
                            };
                            reader.readAsDataURL(file);
                        }
                    }
                </script>


                <tr>
                    <!-- Tinhs chat dac biet  -->
                    <td>Tính đặc biệt</td>
                    <td>
                        <input <?php if ($featured == 'Yes'){echo "checked";}?>  type="radio" name="featured" value="Yes"> Yes
                        <input <?php if ($featured == 'No') {echo "checked";}?>  type="radio" name="featured" value="No"> No
                    </td>
                </tr>

                <tr>
                    <!-- co dang hoat dong khong  -->
                    <td>Hoạt động</td>
                    <td>
                        <input <?php if ($active == 'Yes'){echo "checked";}?> type="radio" name="active" value="Yes"> Yes
                        <input <?php if ($active == 'No') {echo "checked";}?> type="radio" name="active" value="No"> No
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="current_image" value="<?php echo $current_image;?>">
                        <input type="hidden" name="id" value="<?php echo $id;?>">
                        <input type="submit" name="submit" value="Cập nhật nguyên liệu" class="btn-primary" style="padding: 12px; margin-top: 12px;">
                    </td>
                </tr>


            </table>
        </form>

        <?php 
            if (isset($_POST["submit"])){
                // echo "sfdsfsf";
                $id = $_POST["id"];
                $title = $_POST['title'];
                $current_image = $_POST['current_image'];
                $featured = $_POST['featured'];
                $active = $_POST['active'];

                // update img new if select 
                if (isset($_FILES['image']['name']) && $_FILES['image']['name'] != "") {
                    $image_name = $_FILES['image']['name'];
                    if ($image_name != ""){
                        // img available    
                        

                        // upload image
                        // auto rename
                        $image_parst = explode(".",$image_name);
                        $ext = end($image_parst);// extension for image
                        $image_name = "Food_category_".rand(000,999).'.'.$ext;
                        // nơi chứa
                        $source_path = $_FILES['image']['tmp_name'];
                        // điểm đến của đừng dẫn
                        $destination_path = "../images/category/".$image_name;
                        // update img
                        $update = move_uploaded_file($source_path,$destination_path);
                        // 
                        if ($update == false) {
                            $_SESSION['upload'] = '<div class="error">Thêm ảnh thất bại!</div>';
                            header("location: ".SITEURL."admin/manage_category.php");
                            die();
                        }
                        // remove img current 
                        if ($current_image != "") {
                            $remove_path = "../images/category/".$current_image;
                            $remove = unlink($remove_path);
                            // check img whether removed or not 
                            if ($remove == false) {
                                $_SESSION['fail_remove'] = '<div class="error">Di chuyển ảnh thất bại!</div>';
                                header("location:".SITEURL."admin/manage_category.php");
                                die();  // stop process
                            }
                        }
                    }
                }else {
                    $image_name = $current_image;

                }

                // update database 
                $sql2 = "UPDATE tbl_category SET 
                    title = '$title',
                    image_name = '$image_name',
                    featured = '$featured',
                    active = '$active'
                    WHERE id = '$id'

                ";

                $res2 = mysqli_query($conn , $sql2);


                // redirect to manage category with message 
                if ($res2 == true) {
                    // category update 
                    $_SESSION['update'] = '<div class="success">Cập nhật nguyên liệu thành công!</div>';
                    header("location: ".SITEURL."admin/manage_category.php");
                }else {
                    $_SESSION['update'] = '<div class="error">Cập nhật nguyên liệu thất bại!</div>';
                    header("location: ".SITEURL."admin/manage_category.php");
                }


            }
        
        ?>

    </div>


</div>

<?php 
include("detail/footer.php");
ob_end_flush();
?>