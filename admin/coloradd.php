<?php
include "header.php";
include "leftside.php";
// include "class/cartegory_class.php";
// define('__ROOT__', dirname(dirname(__FILE__))); 
// require_once(__ROOT__.'../admin/class/cartegory_class.php');
?>
<?php
$brand = new brand;
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $color_ten = $_POST['color_ten'];
    $file_name = $_FILES['color_anh']['name'];
    $file_temp = $_FILES['color_anh']['tmp_name'];
    $div = explode('.',$file_name);
    $file_ext = strtolower(end($div));
    $color_anh = substr(md5(time()),0,10).'.'.$file_ext;
    $upload_image = "uploads/".$color_anh;
    move_uploaded_file( $file_temp,$upload_image);
	$insert_color = $brand ->insert_color($color_ten,$color_anh);

}
?>
        <div class="admin-content-right">
            <div class="subcartegory-add-content">
                <form action="" method="POST" enctype="multipart/form-data">
                    <label for="">Tên màu sắc<span style="color: red;">*</span></label> <br>
                    <input class="subcartegory-input" type="text" name="color_ten"> <br>
                    <label for="">Ảnh đại diện<span style="color: red;">*</span></label> <br>
                    <input required type="file" name="color_anh"> <br>   
                    <button class="btn btn-primary mt-4" type="submit">Thêm</button>                          
                                
                </form>
            </div>           
        </div>
    </section>
    <?php include 'script.php' ?>
</body>
</html>  