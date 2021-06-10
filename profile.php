
<?php 
	include 'inc/header.php';
	// include 'inc/slider.php'
?>
<?php
	// $login_check = Session::get('customer_login');
	// if($login_check==false){
	// 	echo '<li><a href="login.php">Thông Tin KH</a> </li>';
	// }else{
	// 	echo '<li><a href="profile.php">Thông Tin KH</a> </li>';
	// }
?> 
<?php
	// $pd = new product();
 //    if(!isset($_GET['proid']) || $_GET['proid'] == NULL){
 //        echo "<script> window.location ='404.php' </script>";
 //    }else{
 //        $id=$_GET['proid'];
 //    }
 //    //Khi nhan vao Mua Ngay
 //    if ($_SERVER['REQUEST_METHOD'] === 'POST'  && isset($_POST['submit'])) {
 //    	$quantity = $_POST['quantity'];
 //        $AddtoCart = $ct->add_to_cart($quantity, $id);
 //    }
?>
 <div class="main">
    <div class="content">
    	<div class="section group">
    		<div class="content_info">
			<div class="heading">
				<h3>Thông Tin Khách Hàng</h3>
			</div>
			<div class="clear"></div>
			</div>
			<?php 
		  		$customer_id = Session::get('customer_id');
		  		$check_order = $ct->check_order($customer_id); 
	    		if($check_order==true){
	        		echo '<div class="content_info1">
					<div class="heading">
						<h3><a class="link" href="orderdetails.php">Đơn Hàng Đã Đặt</a></h3>
					</div>
					<div class="clear"></div>
					</div>';
	    		}else{
	    			// header('Location:login.php');
	    		}
    		?>
		<table class="tblone" >
			<?php
				$id = Session::get('customer_id');
				$get_customer = $cs->show_customer($id);
				if($get_customer==true){
					while($result = $get_customer->fetch_assoc()){
			?>
			<tr>
				<td>Họ và Tên</td>
				<td>|</td>
				<td><?php echo $result['name'] ?></td>
			</tr>
			<tr>
				<td>Giới Tính</td>
				<td>|</td>
				<td><?php echo $result['gender'] ?></td>
			</tr>
			<tr>
				<td>Số Điện Thoại</td>
				<td>|</td>
				<td><?php echo $result['phone'] ?></td>
			</tr>
			<tr>
				<td>Email</td>
				<td>|</td>
				<td><?php echo $result['email'] ?></td>
			</tr>
			<tr>
				<td>Quốc Gia</td>
				<td>|</td>
				<td><?php echo $result['country'] ?></td>
			</tr>
			<tr>
				<td>Thành Phố</td>
				<td>|</td>
				<td><?php echo $result['city'] ?></td>
			</tr>
			<tr>
				<td>Địa Chỉ</td>
				<td>|</td>
				<td><?php echo $result['address'] ?></td>
			</tr>
			<tr>
				<td colspan="3"><a href="editprofile.php"> Chỉnh Sửa Thông Tin</a></td>
			</tr>
			<?php
					}
				}
			?>
		</table>
 		</div>
 	</div>
	
<?php 
	include 'inc/footer.php';
?>