<?php 
	include 'inc/header.php';
	include 'inc/slider.php'
?>
<div class="main">
	<div class="content">
		<div class="content_top">
			<div class="heading">
			<h3>SMARTWATCH</h3>
			</div>
			<div class="clear"></div>
		</div>
		<div class="ptrang">
			<?php 
				//Phân Trang Sản Phẩm Thông minh
				$product_all = $product->getallproduct_protm(); 
				$product_count = mysqli_num_rows($product_all);
				$product_num = ceil($product_count/16);
				$current_page = !empty($_GET['page3'])?$_GET['page3']:1;
				$i=0;
				if($current_page>3){
					echo '<a class="phantrang" href="allprotm.php?page3=1">'.'First</a>';
				}
				if($current_page>1){
					echo '<a class="phantrang" href="allprotm.php?page3='.($current_page-1).' ">'.'<'.'</a>';
				}
				for($i=1; $i<=$product_num; $i++){
					if($i != $current_page){
						if($i>$current_page-3 && $i<$current_page+3){
							echo '<a class="phantrang" href="allprotm.php?page3='.$i.' ">'.$i.'</a>';
						}
					}else{
						echo '<strong class="current">'.$i.'</strong>';
					}
				}
				if($current_page<$product_num-1){
					echo '<a class="phantrang" href="allprotm.php?page3='.($current_page+1).' ">'.'>'.'</a>';
				}
				if($current_page<$product_num-3){
					echo '<a class="phantrang" href="allprotm.php?page3='.$product_num.'">'.'Last</a>';
				}
			?>
		</div>
      	<div class="section group">
      		<?php
      			$product_allpro = $product->getproducttm_allpro();
      			if($product_allpro){
      				while ($result = $product_allpro->fetch_assoc()) {
      				
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
	<div class="content">
		<div class="content_top">
			<div class="heading">
			<h3>Đồng Hồ Nam</h3>
			</div>
			<div class="clear"></div>
		</div>
		<div class="ptrang">
			<?php 
				//Phân Trang Sản Phẩm Đồng Hồ Nam
				$product_all = $product->getallproductn_feathered();
				$product_count = mysqli_num_rows($product_all);
				$product_num = ceil($product_count/8);
				$current_page = !empty($_GET['page1'])?$_GET['page1']:1;
				$i=0;
				if($current_page>3){
					echo '<a class="phantrang" href="index.php?page1=1">'.'First</a>';
				}
				if($current_page>1){
					echo '<a class="phantrang" href="index.php?page1='.($current_page-1).' ">'.'<'.'</a>';
				}
				for($i=1; $i<=$product_num; $i++){
					if($i != $current_page){
						if($i>$current_page-3 && $i<$current_page+3){
							echo '<a class="phantrang" href="index.php?page1='.$i.' ">'.$i.'</a>';
						}
					}else{
						echo '<strong class="current">'.$i.'</strong>';
					}
				}
				if($current_page<$product_num-1){
					echo '<a class="phantrang" href="index.php?page1='.($current_page+1).' ">'.'>'.'</a>';
				}
				if($current_page<$product_num-3){
					echo '<a class="phantrang" href="index.php?page1='.$product_num.'">'.'Last</a>';
				}
			?>
		</div>
      	<div class="section group">
      		<?php
      			$product_feathered = $product->getproductn_feathered();
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

		<div class="content_top">
			<div class="heading">
			<h3>Đồng Hồ Nữ</h3>
			</div>
			<div class="clear"></div>
		</div>
		<div class="ptrang">
			<?php 
				//Phân Trang Sản Phẩm Đồng Hồ Nữ
				$product_all = $product->getallproduct_nu();
				$product_count = mysqli_num_rows($product_all);
				$product_num = ceil($product_count/8);
				$current_page = !empty($_GET['page2'])?$_GET['page2']:1;
				$i=0;
				if($current_page>3){
					echo '<a class="phantrang" href="index.php?page2=1">'.'First</a>';
				}
				if($current_page>1){
					echo '<a class="phantrang" href="index.php?page2='.($current_page-1).' ">'.'<'.'</a>';
				}
				for($i=1; $i<=$product_num; $i++){
					if($i != $current_page){
						if($i>$current_page-3 && $i<$current_page+3){
							echo '<a class="phantrang" href="index.php?page2='.$i.' ">'.$i.'</a>';
						}
					}else{
						echo '<strong class="current">'.$i.'</strong>';
					}
				}
				if($current_page<$product_num-1){
					echo '<a class="phantrang" href="index.php?page2='.($current_page+1).' ">'.'>'.'</a>';
				}
				if($current_page<$product_num-3){
					echo '<a class="phantrang" href="index.php?page2='.$product_num.'">'.'Last</a>';
				}
			?>
		</div>
      	<div class="section group">
      		<?php
      			$product_nu = $product->getproduct_nu();
      			if($product_nu){
      				while ($result = $product_nu->fetch_assoc()) {
      				
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

		<div class="content_bottom">
			<div class="heading">
				<h3>Sản Phẩm Mới</h3>
			</div>
			<div class="clear"></div>
		</div>
		<div class="ptrang">
			<?php 
				//Phân Trang Sản Phẩm
				$product_all = $product->get_all_product();
				$product_count = mysqli_num_rows($product_all);
				$product_num = ceil($product_count/8);
				$current_page = !empty($_GET['page'])?$_GET['page']:1;
				$i=0;
				if($current_page>3){
					echo '<a class="phantrang" href="index.php?page=1">'.'First</a>';
				}
				if($current_page>1){
					echo '<a class="phantrang" href="index.php?page='.($current_page-1).' ">'.'<'.'</a>';
				}
				for($i=1; $i<=$product_num; $i++){
					if($i != $current_page){
						if($i>$current_page-3 && $i<$current_page+3){
							echo '<a class="phantrang" href="index.php?page='.$i.' ">'.$i.'</a>';
						}
					}else{
						echo '<strong class="current">'.$i.'</strong>';
					}
				}
				if($current_page<$product_num-1){
					echo '<a class="phantrang" href="index.php?page='.($current_page+1).' ">'.'>'.'</a>';
				}
				if($current_page<$product_num-3){
					echo '<a class="phantrang" href="index.php?page='.$product_num.'">'.'Last</a>';
				}
			?>
		</div>
		<div class="section group">
			<?php
      			$product_new = $product->getproduct_new();
      			if($product_new){
      				while ($result_new = $product_new->fetch_assoc()) {
      				
      		?>
			<div class="grid_1_of_4 images_1_of_4">
				 <a href="details.php?proid=<?php echo $result_new['productId'] ?>">
				 	<img src="admin/uploads/<?php echo $result_new['image'] ?>" alt="" />
				 </a>
				 <a href="details.php?proid=<?php echo $result_new['productId'] ?>">
				 	<h2><?php echo $result_new['productName'] ?> </h2>	
				 </a>
				 <br>
				 <p><?php echo $fm->textShorten($result_new['pro_desc'],50) ?> </p>
				 <p><span class="price"><?php echo $fm->format_currency($result_new['price'])." "."đ" ?></span></p>
			     <div class="button"><span><a href="details.php?proid=<?php echo $result_new['productId'] ?>" class="details">Chi Tiết</a></span></div>
			</div>
			<?php
					}
      			}
			?>
		</div>
	</div>
	<div class="support-facebook-btn">
		<a href="https://m.me/104415788425407?ref=WelcomeMessage" class="link-support" target="_blank" title="Chat với nhân viên hỗ trợ">
			<img src="images/fb.PNG">
		</a>
	</div>
</div>

<?php 
	include 'inc/footer.php';
?>

