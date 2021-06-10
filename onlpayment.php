
<?php 
	include 'inc/header.php';
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
 		<?php 
 			$vnd_usd = $gtotal/23000;
 		?>
 		<script src="https://www.paypalobjects.com/api/checkout.js"></script>
 		<div id="paypal-button"></div> 
 		<script>
			paypal.Button.render({
			    // Configure environment
			    env: '<?php echo $paypal->paypalEnv; ?>',
			    client: {
			        sandbox: '<?php echo $paypal->paypalClientID; ?>',
			        production: '<?php echo $paypal->paypalClientID; ?>'
			    },
			    // Customize button (optional)
			    locale: 'en_US',
			    style: {
			        size: 'large',
			        color: 'gold',
			        shape: 'pill',
			    },
			    // Set up a payment
			    payment: function (data, actions) {
			        return actions.payment.create({
			            transactions: [{
			                amount: {
			                    total: '<?php echo round($vnd_usd,2); ?>',
			                    currency: 'USD'
			                }
			            }]
			      });
			    },
			    // Execute the payment
			    onAuthorize: function (data, actions) {
			        return actions.payment.execute()
			        .then(function () {
			            // Show a confirmation message to the buyer
			            window.alert('Thank you for your purchase!');
			            
			            // Redirect to the payment process page
			            window.location = "success.php?paymentID="+data.paymentID+"&token="+data.paymentToken+"&payerID="+data.payerID+"&pid=<?php echo $id; ?>&pay=paid ";
			        });
			    }
			}, '#paypal-button');
			</script>
 	</div>
</form>
<?php  
	include 'inc/footer.php'; 
?>