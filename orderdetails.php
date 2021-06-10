<?php 
	include 'inc/header.php';
	// include 'inc/slider.php'
?>
<?php
	$login_check = Session::get('customer_login');
	if($login_check==false){
		header('Location:login.php');
	}
?>
<?php
	$ct = new cart();
	if(isset($_GET['cartid'])){
        $id = $_GET['cartid'];
        $time = $_GET['time'];
        $price =$_GET['price'];
        $del_shiped = $ct->del_shiped($id, $time, $price);
    }
    //Huy Don Hang
    if(isset($_GET['id_or'])){
    	$id = $_GET['id_or'];
    	$cus_id = Session::get('customer_id');
        $delor = $ct->delor($id, $cus_id);
    }
?>
 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2 style="width: 500px;font-size: 25px;font-family: initial;" >Đơn Hàng Đã Đặt</h2>
						<table class="tblone">
							<tr>
								<th width="3%">ID</th>
								<th width="18%">Tên sản phẩm</th>
								<th width="10%">Hình ảnh</th>
								<th width="20%">Giá</th>
								<th width="7%">Số lượng</th>
								<th width="12%">Ngày đặt</th>
								<th width="15%">Trạng thái</th>
								<th width="5%">Hủy đơn</th>
							</tr>
							<?php 
								//Hien thi tt gio hang da dat
								$customer_id = Session::get('customer_id');
								$get_cart_ordered = $ct->get_cart_ordered($customer_id);
								if($get_cart_ordered){
									$i=0;
									while($result = $get_cart_ordered->fetch_assoc()){
										$i++;
							?>
							<tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $result['productName'] ?></td>
								<td><img src="admin/uploads/<?php echo $result['image'] ?>" alt=""/></td>
								<td><?php echo $fm->format_currency($result['price'])." "."đ" ?><br><br>
									<?php 
										if($result['pay']=='unpaid'){
											echo "(Chưa Thanh Toán)";
										}elseif($result['pay']=='paid'){
											echo "(Đã Thanh Toán)";
										}else{
											echo "";
										}
									?>
								</td>
								<td><?php echo $result['quantity'] ?></td>
								<td><?php echo $fm->formatDate($result['date_order']) ?></td>
								<td>
									<?php 
										if( $result['status']=='0'){
											echo 'Đang xử lý';
										}elseif($result['status']=='1'){
											echo 'Đang vận chuyển';
										}else{
											echo 'Đã nhận hàng';
										}
									?>
								</td>
								<td>
									<?php 
										if( $result['status']=='0'){
											echo '<a href="?id_or=' .$result['id'].' ">Hủy</a>';
										}else{
											echo '';
										}
									?>
								</td>
							</tr>
							<?php
									}
								}
							?>
							
						</table>
					</div>
					<div class="shopping">
						<div class="shopleft">
							<a href="index.php"> <img src="images/shop.png" alt="" /></a>
						</div>
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>

<?php 
	include 'inc/footer.php';
?>