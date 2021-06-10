<?php 
	include 'inc/header.php';
	// include 'inc/slider.php'
?>

<?php 
    //Khi KH ch đăng nhập tài khoản
    $login_check = Session::get('customer_login');
    if($login_check==false){
        header('Location:login.php');
    }
?>

<style>
	.order_page {
    font-size: 30px;
    font-family: cursive;
    font-weight: bold;
    color: #602D8D;
    text-align: center;
}
</style>

 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
				<div class="order_page">
					<h3>Welcome To My Store</h3>
				</div>	
			</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>

<?php 
	include 'inc/footer.php';
?>