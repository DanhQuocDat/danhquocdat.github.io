
<?php 
	include 'inc/header.php';
	// include 'inc/slider.php'
?>
<!-- <?php
	$login_check = Session::get('customer_login');
	if($login_check==false){
		echo '<li><a href="login.php">Thông Tin KH</a> </li>';
	}else{
		echo '<li><a href="profile.php">Thông Tin KH</a> </li>';
	}
?> -->
<?php
	// $pd = new product();
 //    if(!isset($_GET['proid']) || $_GET['proid'] == NULL){
 //        echo "<script> window.location ='404.php' </script>";
 //    }else{
 //        $id=$_GET['proid'];
 //    }
    //Chỉnh sửa thông tin khách hàng
	$id = Session::get('customer_id');
    if ($_SERVER['REQUEST_METHOD'] == 'POST'  && isset($_POST['save'])) {
        $updateCustomer = $cs->update_costomer($_POST,$id);
    }
?>
 <div class="main">
    <div class="content">
    	<div class="section group">
    		<div class="content_top">
			<div class="heading">
				<h3>Chỉnh Sửa Thông Tin Khách Hàng</h3>
			</div>
			<div class="clear"></div>
		</div>
		<form action="" method="POST">
		<table class="tblone">
			<tr>
				<?php
					if(isset($updateCustomer)){
						echo '<td colspan="3">'.$updateCustomer.'</td>';
					}
				?>
			</tr>
			<?php
				$id = Session::get('customer_id');
				$get_customer = $cs->show_customer($id);
				if($get_customer){
					while($result = $get_customer->fetch_assoc()){
			?>
			<tr>
				<td>Họ và Tên</td>
				<td>|</td>
				<td><input class="editprofile" type="text" name="name" value="<?php echo $result['name'] ?>" required></td>
			</tr>
			<tr>
				<td>Giới Tính</td>
				<td>|</td>
				<td class="editprofile">
					<input type="radio" name="gender" value="Nam" checked>
					<label for="Nam">Nam</label>
					<input  type="radio" name="gender" value="Nữ" >
					<label for="Nữ">Nữ</label>
				</td>
			</tr>
			<tr>
				<td>Email</td>
				<td>|</td>
				<td><input class="editprofile" type="text" name="email" value="<?php echo $result['email'] ?>" required></td>
			</tr>
			<tr>
				<td>Số Điện Thoại</td>
				<td>|</td>
				<td><input class="editprofile" type="text" name="phone" value="<?php echo $result['phone'] ?>" required></td>
			</tr>
			<tr>
				<td>Tỉnh/Thành Phố</td>
				<td>|</td>
				<td><input class="editprofile" type="text" name="city" value="<?php echo $result['city'] ?>"></td>
			</tr>
			<tr>
				<td>Địa Chỉ</td>
				<td>|</td>
				<td><input class="editprofile" type="text" name="address" value="<?php echo $result['address'] ?>" required></td>
			</tr>
			<tr>
				<td colspan="3"><input type="submit" name="save" value="Cập Nhật" class="grey"></td>
			</tr>
			<?php
					}
				}
			?>
		</table>
		</form>
 		</div>
 	</div>
	
<?php 
	include 'inc/footer.php';
?>