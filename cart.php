<?php 
	include 'inc/header.php';
	// include 'inc/slider.php'
?>
<?php
	//Cập nhật số lượng sp trong giỏ hàng
	if ($_SERVER['REQUEST_METHOD'] === 'POST'  && isset($_POST['submit'])) {
		$cartId = $_POST['cartId'];
    	$quantity = $_POST['quantity'];
        $update_quantity_cart = $ct->update_quantity_cart($quantity, $cartId);
        if($quantity<=0){
        	$delpro_cart = $ct->del_product_cart($cartId);
        }
    }
    //Xóa sản phẩm trong giỏ hàng
    if(isset($_GET['cartid'])){
        $cartid=$_GET['cartid'];
    	$delpro_cart = $ct->del_product_cart($cartid);
    }
?>
<?php
	//Khi nhấn mua -> cập nhật số lượng trên mục giỏ hàng
	if(!isset($_GET['id'])){
		echo "<meta http-equiv='refresh' content='0;URL=?id=live'>";
	}
?>
 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2>Giỏ Hàng</h2>
			    	<?php
			    		if(isset($update_quantity_cart)){
			    			echo $update_quantity_cart;
			    		}
			    	?>
			    	<?php
			    		if(isset($delpro_cart)){
			    			echo $delpro_cart;
			    		}
			    	?>
						<table class="tblone">
							<tr>
								<th width="20%">Tên sản phẩm</th>
								<th width="10%">Hình ảnh</th>
								<th width="15%">Giá</th>
								<th width="25%">Số lượng</th>
								<th width="20%">Tổng</th>
								<th width="10%">Hành động</th>
							</tr>
							<?php 
								//Hien thi tt gio hang
								$get_product_cart = $ct->get_product_cart();
								if($get_product_cart){
									$subtotal = 0;
									$qty = 0;
									while($result = $get_product_cart->fetch_assoc()){

							?>
							<tr>
								<td><?php echo $result['productName'] ?></td>
								<td><img src="admin/uploads/<?php echo $result['image'] ?>" alt=""/></td>
								<td><?php echo $fm->format_currency($result['price'])." "."đ" ?></td>
								<td>
									<form action="" method="post">
										<input type="hidden" name="cartId" value="<?php echo $result['cartId'] ?>"/>
										<input type="number" name="quantity" min="0" value="<?php echo $result['quantity'] ?>"/>
										<input type="submit" name="submit" value="Update"/>
									</form>
								</td>
								<td>
									<?php 
									$total = $result['price'] * $result['quantity'] ;
									echo $fm->format_currency($total).' '.'đ' ;
									?>
								</td>
								<td><a href="?cartid=<?php echo $result['cartId'] ?>"> Xóa </a></td>
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
						<table style="float:right;text-align:left;line-height:25px;" width="40%">
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
								<th>VAT : </th>
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
					<div class="shopping">
						<div class="shopleft">
							<a href="index.php"> <img src="images/shop.png" alt="" /></a>
						</div>
						<div class="shopright">
							<?php 
								$login_check = Session::get('customer_login');
								if($login_check){
									echo '<a href="payment.php"> <img src="images/check.png" alt="" /></a>';
								}else{
									echo '<a href="login.php"> <img src="images/check.png" alt="" /></a>';
								}
							?>
						</div>
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>

<?php 
	include 'inc/footer.php';
?>