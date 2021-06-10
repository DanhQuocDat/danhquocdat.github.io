<?php 
	include 'inc/header.php';
	// include 'inc/slider.php'
?>
<div class="main">
	
	<div class="content">
		<div class="content_top">
			<div class="heading">
			<h3>
				<?php if($_GET['p2']<999999999){ ?>
					Đồng Hồ <?php echo substr($_GET['p1'], 0 ,1) ?>-<?php echo substr($_GET['p2'], 0 ,1) ?> Triệu</h3>
				<?php }else{ ?>
					Đồng Hồ Trên <?php echo substr($_GET['p1'], 0 ,1) ?> Triệu</h3>
				<?php } ?>
			</div>
			<div class="clear"></div>
		</div>
		<div class="ptrang">
			<?php 
				//Phân Trang Sản Phẩm Đồng Hồ Nam
				$p1=$_GET['p1'];
				$p2=$_GET['p2'];
				$t=$_GET['t'];	
				$product_all = $product->getallproduct_price($p1, $p2, $t);
				$product_count = mysqli_num_rows($product_all);
				$product_num = ceil($product_count/8);
				$current_page = !empty($_GET['page'])?$_GET['page']:1;
				$i=0;
				if($current_page>3){
					echo '<a class="phantrang" href="allprotg.php?p1='.$p1.' &p2='.$p2.' &t='.$t.' &page=1">'.'First</a>';
				}
				if($current_page>1){
					echo '<a class="phantrang" href="allprotg.php?p1='.$p1.' &p2='.$p2.' &t='.$t.' &page='.($current_page-1).' ">'.'<'.'</a>';
				}
				for($i=1; $i<=$product_num; $i++){
					if($i != $current_page){
						if($i>$current_page-3 && $i<$current_page+3){
							echo '<a class="phantrang" href="allprotg.php?p1='.$p1.' &p2='.$p2.' &t='.$t.' &page='.$i.' ">'.$i.'</a>';
						}
					}else{
						echo '<strong class="current">'.$i.'</strong>';
					}
				}
				if($current_page<$product_num-1){
					echo '<a class="phantrang" href="allprotg.php?p1='.$p1.' &p2='.$p2.' &t='.$t.' &page='.($current_page+1).' ">'.'>'.'</a>';
				}
				if($current_page<$product_num-3){
					echo '<a class="phantrang" href="allprotg.php?p1='.$p1.' &p2='.$p2.' &t='.$t.' &page='.$product_num.'">'.'Last</a>';
				}
			?>
		</div>
      	<div class="section group">
      		<?php
      			$product_feathered = $product->getproduct_price($p1, $p2, $t);
      			if($product_feathered){
      				while ($result = $product_feathered->fetch_assoc()) {
      				
      		?>
			<div class="grid_1_of_4 images_1_of_4">
				 <a href="details.php?proid=<?php echo $result['productId'] ?>">
				 	<img src="admin/uploads/<?php echo $result['image'] ?>" alt="" />
				 </a>
				 <a href="details.php?proid=<?php echo $result['productId'] ?>">
				 	<h2><?php echo $result['productName'] ?> </h2>
				 </a>
				 <br>
				 <p><?php echo $fm->textShorten($result['pro_desc'],50) ?></p>
				 <p><span class="price"><?php echo $fm->format_currency($result['price'])." "."đ" ?></span></p>
			     <div class="button"><span><a href="details.php?proid=<?php echo $result['productId'] ?>" class="details">Chi Tiết</a></span></div>
			</div>
			<?php
					}
      			}
			?>
		</div>
	</div>
</div>

<?php 
	include 'inc/footer.php';
?>

