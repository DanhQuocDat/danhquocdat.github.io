	<?php 
	include 'inc/header.php';
	// include 'inc/slider.php'
?>

 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<?php
			    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			        $tukhoa = $_POST['tukhoa'];
			        $search_product = $product->search_product($tukhoa);
			    }
			?>
    		<div class="heading">
    		<h3>Từ Khóa: <?php echo $tukhoa ?> </h3>
    		</div>
    		<div class="clear"></div>
		</div>
    	</div>
	    	<div class="section group">
	    		<?php 
	    			if($search_product){
	    				while ($result = $search_product->fetch_assoc()) {
	    		?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?proid=<?php echo $result['productId'] ?>"><img src="admin/uploads/<?php echo $result['image'] ?>" alt="" /></a>
					 <a href="details.php?proid=<?php echo $result['productId'] ?>">
					 	<h2><?php echo $result['productName'] ?></h2>
					 </a>
					 <p><?php echo $fm->textShorten($result['pro_desc'],50 )?></p>
					 <br>
					 <p><span class="price"><?php echo $fm->format_currency($result['price'])." "."đ" ?></span></p>
				     <div class="button"><span><a href="details.php?proid=<?php echo $result['productId'] ?>" class="details">Details</a></span></div>
				</div>
				<?php 
						}
	    			}else{
	    				echo "<script> alert('Danh mục chưa có sản phẩm!') </script>";
						echo "<meta http-equiv='refresh' content='0;URL=index.php?proid=live'>";
	    			}
				?>
			</div>

	
	
    </div>
 </div>
<?php 
	include 'inc/footer.php';
?>