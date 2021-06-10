
<?php 
	include 'inc/header.php';
	// include 'inc/slider.php'
?>
<?php
	$id = Session::get('customer_id');
	if(isset($_GET['click']) && isset($_GET['typeC'])){
		$typeC = $_GET['typeC'];
		$checkinf = $cs->checkinf($id, $typeC);
	}
?>
 <div class="main">
    <div class="content">
    	<div class="section group">
    		<div class="content_topp">
				<div class="heading">
					<h3>Phương Thức Thanh Toán</h3>
				</div>
				<?php 
					if(isset($checkinf)){
						echo $checkinf;
					}
				?>
				<div class="clear"></div>
				<h2 class="payment" >Vui lòng chọn phương thức bên dưới để thanh toán:</h2>
				<a class="href_left" href="?typeC=1 &click"> Thanh Toán Sau Khi Nhận Hàng </a>
				<a class="href_right" href="?typeC=2 &click"> Thanh Toán Trực tuyến </a>
			</div>
		
 		</div>
 	</div>
	
<?php 
	include 'inc/footer.php';
?>