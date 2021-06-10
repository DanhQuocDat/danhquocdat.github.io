<?php 
	include 'inc/header.php';
	// include 'inc/slider.php'
?>
<?php
    if(!isset($_GET['catid']) || $_GET['catid'] == NULL){
        echo "<script> window.location ='404.php' </script>";
    }else{
        $id=$_GET['catid'];
    }

    // if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //     $catName = $_POST['catName'];
    //     $updateCat = $cat->update_category($catName, $id);
    // }
?>
 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<?php 
	    		$namebycat = $cat->get_namebycat($id);
	    		if($namebycat){
	    			while ($result_name = $namebycat->fetch_assoc()) {
	    	?>
    		<div class="heading">
    		<h3><?php echo $result_name['catName'] ?> </h3>
    		</div>
    		<?php
    				}
    			}
    		?>
    		<div class="clear"></div>
    	</div>
	    	<div class="section group">
	    		<?php  
	    			$probycat = $cat->get_productbycat($id);
	    			if($probycat){
	    				while ($result = $probycat->fetch_assoc()) {
	    		?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?proid=<?php echo $result['productId'] ?>"><img src="admin/uploads/<?php echo $result['image'] ?>" alt="" /></a>
					 <a href="details.php?proid=<?php echo $result['productId'] ?>">
				 		<h2><?php echo $result['productName'] ?></h2>
				 	</a>
					<p><?php echo $fm->textShorten($result['pro_desc'],50 )?></p>
					 <p><span class="price"><?php echo $fm->format_currency($result['price'])." "."đ" ?></span></p>
				     <div class="button"><span><a href="details.php?proid=<?php echo $result['productId'] ?>" class="details">Details</a></span></div>
				</div>
				<?php 
						}
	    			}else{
	    				echo "<script> alert('Danh mục chưa có sản phẩm!') </script>";
						echo "<meta http-equiv='refresh' content='0;URL=details.php?proid=live'>";
	    			}
				?>
			</div>

	
	
    </div>
 </div>
<?php 
	include 'inc/footer.php';
?>