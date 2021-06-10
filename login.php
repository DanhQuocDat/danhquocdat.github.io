<?php 
	include 'inc/header.php';
	// include 'inc/slider.php'\
?>
<?php 
    unset($_SESSION['access_token']);
?>
<?php 
	$login_check = Session::get('customer_login');
	if($login_check){
		header('Location:order.php');
	}
?>
<?php
    // Thêm tài khoản khách hàng
    if ($_SERVER['REQUEST_METHOD'] == 'POST'  && isset($_POST['submit'])) {

        $insertCustomer = $cs->insert_customer($_POST);
    }
?>
<?php 
	// Đăng nhập khách hàng
    if ($_SERVER['REQUEST_METHOD'] == 'POST'  && isset($_POST['login'])) {

        $loginCustomer = $cs->login_customer($_POST);
    }
?>
 <div class="main">
    <div class="content">
    	<div class="login_panel">
        	<h3>ĐĂNG NHẬP</h3>
        	<p>Đăng nhập vào form dưới đây.</p>
        	<?php
        		if(isset($loginCustomer)){
    				echo $loginCustomer;
    			}
        	?>
        	<form action="" method="POST">
                <input type="text" name="email" class="field" placeholder="E-Mail...." required>
                <input type="password" name="password" class="field" placeholder="Mật khẩu...." required>
            	<p class="note">Nếu bạn quên mật khẩu, vui lòng nhập email và click <a href="#">here</a></p>
                <center>
                	<div class="buttons">
                		<div><input type="submit" name="login" class="grey" value="Đăng nhập">
                		</div>
                	</div>
                </center>
                <p class="note">Hoặc đăng nhập bằng:</p>
                <div>
                	<a href="#"><img src="./images/rsz_fb.png" title="Đăng nhập bằng Facebook"></a>
                </div>
                <div>
                	<?php 
                		if(isset($authUrl)){ ?>
                		<a href="<?= $authUrl ?>"><img src="./images/rsz_google.png" title="Đăng nhập bằng Google"></a>
                	<?php }?>
                </div>
            </form>
        </div>
        <?php

        ?>
    	<div class="register_account">
    		<h3>ĐĂNG KÝ TÀI KHOẢN</h3>
    		<?php 
    			if(isset($insertCustomer)){
    				echo $insertCustomer;
    			}
    		?>
    		<form action="" method="POST">
		   		<table>
		   			<tbody>
						<tr>
						<td>
							<div>
							<input type="text" name ="name" placeholder="Họ và tên...." required>
							</div>
							
							<div>
							<select id="gender" name="gender" onchange="change_gender(this.value)" class="frm-field required" required>
								<option value="null">Giới Tính</option>         
								<option value="Nam">Nam</option>
								<option value="Nữ">Nữ</option>
		         			</select>
				 			</div>
							
							<div>
								<input type="text" name="email" placeholder="E-Mail...." required>
							</div>
							<div>
								<input type="text" name ="phone" placeholder="Số điện thoại...." required>
							</div>
		    			</td>
		    			<td>
			    			<div>
							<select id="country" name="country" onchange="change_country(this.value)" class="frm-field required" required>
								<option value="null">Quốc gia</option>         
								<option value="Việt Nam">Việt Nam</option>
		         			</select>
				 			</div>		        
		
			           		<div>
			          			<input type="text" name="city" placeholder="Tỉnh/Thành phố...." required>
			          		</div>
					  
					  		<div>
								<input type="text" name="address" placeholder="Địa chỉ...." required>
							</div>
							<div>
								<input type="text" name="password" placeholder="Mật khẩu...." required>
							</div>
		    			</td>
		    			</tr> 
		    		</tbody>
				</table> 
		   <div class="search"><div><input type="submit" name="submit" class="grey" value="Đăng ký"></div></div>
		    <p class="terms">By clicking 'Create Account' you agree to the <a href="#">Terms &amp; Conditions</a>.</p>
		    <div class="clear"></div>
		    </form>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>

<?php 
	include 'inc/footer.php';
?>