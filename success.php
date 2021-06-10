<?php 
	include 'inc/header.php';
	// include 'inc/slider.php'
?>
<?php
    //Thanh toán online
    if(!empty($_GET['paymentID']) && !empty($_GET['token']) && !empty($_GET['payerID']) && !empty($_GET['pid']) ){ 
        // Get payment info from URL 
        $paymentID = $_GET['paymentID']; 
        $token = $_GET['token']; 
        $payerID = $_GET['payerID']; 
        $productID = $_GET['pid'];
         
        // Validate transaction via PayPal API 
        $paymentCheck = $paypal->validate($paymentID, $token, $payerID, $productID); 
         
        // If the payment is valid and approved 
        if($paymentCheck && $paymentCheck->state == 'approved'){ 
            // $customer_id = Session::get('customer_id');
            $id = $_GET['pid'];
            $pay = $_GET['pay'];
            $insertOrder = $ct->insertOrder($id, $pay);
            $delCart = $ct->del_all_cart();
            header('Location:success.php');
            } 
        }
?>
<form action="" method="POST">
 <div class="main">
    <div class="content">
    	<div class="section group">
    		<center><h2 style="color: green"> Đặt Hàng Thành Công</h2></center>
    		<?php
    			$customer_id = Session::get('customer_id');
    			$get_amount = $ct->getamount_price($customer_id);
    			if($get_amount){   		
    				$amount = 0;		
    				while($result = $get_amount->fetch_assoc()){
    					$price = $result['price'];
                        $amount += $price ;
                    }
                }
    		?>
    		<center><p class="success1">Đơn Hàng Đang Được Xử Lý. Xem Lại Đơn Hàng Tại <a href="orderdetails.php">Đây.</a></p></center>
    	</div>
 	</div>
 </div>
</form>
<?php 
	include 'inc/footer.php';
?>