<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/category.php';?>
<?php include '../classes/brand.php';?>
<?php include '../classes/product.php';?>
<?php
    // Thêm Sản Phẩm
    $pd = new product();
    if(!isset($_GET['productid']) || $_GET['productid'] == NULL){
        echo "<script> window.location ='productlist.php' </script>";
    }else{
        $id=$_GET['productid'];
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST'  && isset($_POST['submit'])) {

        $updateProduct = $pd->update_product($_POST, $_FILES, $id);
    }
?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Sửa Sản Phẩm </h2>
        <div class="block">               
            <?php 
                    if(isset($updateProduct)){
                        echo $updateProduct;
                    }
            ?> 
        <?php 
             $get_product_by_id  = $pd->getproductbyId($id);
                 if($get_product_by_id) {   
                    while ($result_pro = $get_product_by_id->fetch_assoc()) {
         ?>
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Tên Sản Phẩm</label>
                    </td>
                    <td>
                        <input type="text" name="productName" value="<?php echo $result_pro['productName'] ?>" class="medium" />
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Danh Mục</label>
                    </td>
                    <td>
                        <select id="select" name="category">
                            <option>----Chọn Danh Mục----</option>
                            <?php 
                                $cat = new category();
                                $catlist = $cat->show_category();
                                if($catlist){
                                    while ($result = $catlist->fetch_assoc()) {
                                
                            ?>
                            <option 
                            <?php 
                                if($result['catId'] == $result_pro['catId']){
                                    echo 'selected';
                                }
                            ?>
                            value="<?php echo $result['catId'] ?>"><?php echo $result['catName'] ?></option>
                            <?php
                                    }
                                }
                            ?>
                        </select>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Thương Hiệu</label>
                    </td>   
                    <td>
                        <select id="select" name="brand">
                            <option>----Thương Hiệu----</option>
                            <?php 
                                $brand = new brand();
                                $bandlist = $brand->show_brand();
                                if($bandlist){
                                    while ($result = $bandlist->fetch_assoc()) {
                                
                            ?>
                            <option 
                            <?php 
                                if($result['brandId'] == $result_pro['brandId']){
                                    echo 'selected';
                                }
                            ?>
                            value="<?php echo $result['brandId'] ?>"><?php echo $result['brandName'] ?></option>
                            <?php 
                                    }
                                }
                            ?>
                        </select>
                    </td>
                </tr>
				
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Giới Thiệu</label>
                    </td>
                    <td>
                        <textarea name="pro_desc" class="tinymce"><?php echo $result_pro['pro_desc'] ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Chi Tiết</label>
                    </td>
                    <td>
                        <textarea name="pro_details" class="tinymce"><?php echo $result_pro['pro_details'] ?></textarea>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Giá</label>
                    </td>
                    <td>
                        <input type="text" name="price" value="<?php echo $result_pro['price'] ?>" class="medium" />
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Hình Sản Phẩm</label>
                    </td>
                    <td>
                        <img src= "uploads/<?php echo $result_pro['image'] ?>" width="90" height="90"> <br>
                        <input type="file" name="image" />
                    </td>
                </tr>

                <tr>
                    <td>
                        <label>Chất Liệu Dây</label>
                    </td>
                    <td>
                        <select id="select" name="style">
                            <option>----Chất Liệu----</option>
                            <?php 
                                if($result_pro['style']==0){
                            ?>
                            <option value="1">Dây Da</option>
                            <option value="2">Dây Nhựa</option>
                            <option value="3">Dây Vải</option>
                            <option selected value="0">Dây Kim Loại</option>
                            <?php 
                                }elseif($result_pro['style']==1){
                            ?>
                            <option selected value="1">Dây Da</option>
                            <option value="0">Dây Kim Loại</option>
                            <option value="2">Dây Nhựa</option>
                            <option value="3">Dây Vải</option>
                            <?php 
                                }elseif($result_pro['style']==2){
                            ?>
                            <option selected value="2">Dây Nhựa</option>
                            <option value="0">Dây Kim Loại</option>
                            <option value="1">Dây Da</option>
                            <option value="3">Dây Vải</option>
                            <?php 
                                }else{
                            ?>
                            <option selected value="3">Dây Vải</option>
                            <option value="0">Dây Kim Loại</option>
                            <option value="1">Dây Da</option>
                            <option value="2">Dây Nhựa</option>
                            <?php 
                                }
                            ?>
                        </select>
                    </td>
                </tr>
				
				<tr>
                    <td>
                        <label>Loại Sản Phẩm</label>
                    </td>
                    <td>
                        <select id="select" name="type">
                            <option>----Chọn Loại----</option>
                            <?php 
                                if($result_pro['type']==0){
                            ?>
                            <option value="1">Nam</option>
                            <option value="2">Nữ</option>
                            <option value="3">Smartwatch</option>
                            <option selected value="0">Cặp Đôi</option>
                            <?php 
                                }elseif($result_pro['type']==1){
                            ?>
                            <option selected value="1">Nam</option>
                            <option value="0">Cặp Đôi</option>
                            <option value="2">Nữ</option>
                            <option value="3">Smartwatch</option>
                            <?php 
                                }elseif($result_pro['type']==2){
                            ?>
                            <option selected value="2">Nữ</option>
                            <option value="0">Cặp Đôi</option>
                            <option value="1">Nam</option>
                            <option value="3">Smartwatch</option>
                            <?php 
                                }else{
                            ?>
                            <option selected value="3">Smartwatch</option>
                            <option value="0">Cặp Đôi</option>
                            <option value="1">Nam</option>
                            <option value="2">Nữ</option>
                            <?php 
                                }
                            ?>
                        </select>
                    </td>
                </tr>

				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Lưu" />
                    </td>
                </tr>
            </table>
            </form>
            <?php 
                    }
                }
            ?>
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>


