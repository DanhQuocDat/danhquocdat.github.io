<?php 
	include 'inc/header.php';
	// include 'inc/slider.php'
?>
<?php
	// $pd = new product();
    if(isset($_GET['orderid']) && $_GET['orderid'] == 'order'){
        $customer_id = Session::get('customer_id');
        $pay = $_GET['pay'];
        $insertOrder = $ct->insertOrder($customer_id, $pay);
        $delCart = $ct->del_all_cart();
        header('Location:success.php');
    }
?>
<form action="" method="POST">
 <div class="main">
    <div class="content">
    	<div class="section group">
    		<div class="heading">
				<h3 style="margin-bottom: 20px;">Thanh Toán Sau Khi Nhận Hàng</h3>
			</div>
			<div class="clear"></div>
			<div class="box-left">
				<div class="cartpage">
			    	<h3 style="margin-bottom: 15px;">THÔNG TIN NHẬN HÀNG</h3>
					<table class="tblone" >
			<?php
				$id = Session::get('customer_id');
				$get_customer = $cs->show_customer($id);
				if($get_customer){
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
			<?php
					}
				}
			?>
		</table>
				</div>
			</div>
			<div class="box-right">
				<div class="cartpage">
			    	<h3 style="margin-bottom: 15px;">ĐƠN HÀNG CỦA BẠN</h3>
						<table class="tblone">
							<tr>
								<th width="5%">ID</th>
								<th width="20%">Tên sản phẩm</th>
								<th width="15%">Giá</th>
								<th width="20%">Số lượng</th>
								<th width="15%">Tổng</th>
							</tr>
							<?php 
								//Hien thi tt gio hang
								$get_product_cart = $ct->get_product_cart();
								if($get_product_cart){
									$subtotal = 0;
									$qty = 0;
									$i =0;
									while($result = $get_product_cart->fetch_assoc()){
										$i++;
							?>
							<tr>
								<td><?php echo $i ?></td>
								<td><?php echo $result['productName'] ?></td>
								<td><?php echo $fm->format_currency($result['price'])." "."đ" ?></td>
								<td><?php echo $result['quantity'] ?></td>
								<td>
									<?php 
									$total = $result['price'] * $result['quantity'] ;
									echo $fm->format_currency($total).' '.'đ' ;
									?>
								</td>
							</tr>
							<?php
										$qty = $qty + $result['quantity'];
										$subtotal += $total ;
									}
								}
							?>
							
						</table>
						<?php
							$check_cart = $ct->check_cart();
							if($check_cart){
						?>
						<table style="float:right;text-align:left; line-height: 25px; margin: 5px" width="40%">
							<tr>
								<th>Tạm tính: </th>
								<td>
									<?php 
										echo $fm->format_currency($subtotal).' '.'đ';
										Session::set('sum',$subtotal); 
										Session::set('qty',$qty); 
									?>	
								</td>
							</tr>
							<tr>
								<th>VAT: </th>
								<td>0.1% (<?php echo $fm->format_currency($vat = $subtotal * 0.001); ?>)</td>
							</tr>
							<tr>
								<th>Thành Tiền:</th>
								<td>
									<?php 
										$vat = $subtotal * 0.001;
										$gtotal = $subtotal + $vat ;
										echo $fm->format_currency($gtotal).' '.'đ';
									?>
								</td>
							</tr>
					   </table>
					   <?php
					   		}else{
					   			echo "<span style='color:blue; font-size:20px;'>Giỏ hàng trống!!! Vui lòng thêm sản phẩm cần mua</span>";
					   		}
					   ?>
					</div>
			</div>
 		</div>
 		<div style="border-top: 1px solid gray">
 			<center style="margin: 30px 0 20px 0px;" ><a class="sgrey" href="?orderid=order&pay=unpaid ">Tiến Hành Thanh Toán</a></center>
 		</div>
 	</div>
</form>
<?php 
	include 'inc/footer.php'; 
?>