<?php 
	include 'inc/header.php';
	include 'inc/slider.php'
?>
<?php
	// //Cập nhật số lượng sp trong giỏ hàng
	// if ($_SERVER['REQUEST_METHOD'] === 'POST'  && isset($_POST['submit'])) {
	// 	$cartId = $_POST['cartId'];
 //    	$quantity = $_POST['quantity'];
 //        $update_quantity_cart = $ct->update_quantity_cart($quantity, $cartId);
 //        if($quantity<=0){
 //        	$delpro_cart = $ct->del_product_cart($cartId);
 //        }
 //    }
    //Xóa sản phẩm trong giỏ hàng
    if(isset($_GET['proid'])){
        $proid=$_GET['proid'];
    	$delpro_compare = $product->delpro_compare($proid);
    }
?>
<?php
	
	if(!isset($_GET['id'])){
		echo "<meta http-equiv='refresh' content='0;URL=?id=live'>";
	}
?>
 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2 style="width: 500px;">So Sánh Sản Phẩm</h2>
			    	<!-- <?php
			    		if(isset($update_quantity_cart)){
			    			echo $update_quantity_cart;
			    		}
			    	?> -->
			    	<?php
			    		if(isset($delpro_compare)){
			    			echo $delpro_compare;
			    		}
			    	?>
			    	<div>
			    		
			    		<center><table style="width: 80%">
			    			
							<tr class="tb_compart">
								<?php 
								//Hien thi tt gio hang
								$customer_id = Session::get('customer_id');
								$get_compare = $product->get_compare($customer_id);
								if($get_compare){
									$i = 0;
									while($result = $get_compare->fetch_assoc()){
										$i++;
							?>
								<th class="tb_compart"><?php echo $result['productName'] ?></th>
								<?php
									}
								}
							?>
							</tr>
							<tr class="tb_compart">
								<?php 
								//Hien thi tt gio hang
								$customer_id = Session::get('customer_id');
								$get_compare = $product->get_compare($customer_id);
								if($get_compare){
									$i = 0;
									while($result = $get_compare->fetch_assoc()){
										$i++;
							?>
								<td class="tb_compart"><?php echo $fm->format_currency($result['price'])." "."đ" ?></td>
								<?php
									}
								}
							?>
							</tr>
							<tr class="tb_compart">
								<?php 
								//Hien thi tt gio hang
								$customer_id = Session::get('customer_id');
								$get_compare = $product->get_compare($customer_id);
								if($get_compare){
									$i = 0;
									while($result = $get_compare->fetch_assoc()){
										$i++;
							?>
								<td class="tb_compart"><img src="admin/uploads/<?php echo $result['image'] ?>" alt="" width="200px" height="200px"/></td>
								<?php
									}
								}
							?>
							</tr>
							<tr class="tb_compart">
								<?php 
								//Hien thi tt gio hang
								$customer_id = Session::get('customer_id');
								$get_compare = $product->get_compare($customer_id);
								if($get_compare){
									$i = 0;
									while($result = $get_compare->fetch_assoc()){
										$i++;
							?>
								<td class="tb_compart"><?php echo $result['pro_details'] ?></td>
								<?php
									}
								}
							?>
							</tr>
							<tr class="tb_compart">
								<?php 
								//Hien thi tt gio hang
								$customer_id = Session::get('customer_id');
								$get_compare = $product->get_compare($customer_id);
								if($get_compare){
									$i = 0;
									while($result = $get_compare->fetch_assoc()){
										$i++;
							?>
								<td class="tb_compart"><a href="?proid=<?php echo $result['productId'] ?>"> Xóa </a></td>
								<?php
									}
								}
							?>
							</tr>
							
			    		</table>
			    			</center>
						</div>
						
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