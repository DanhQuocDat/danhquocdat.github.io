<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../classes/cart.php');
    include_once ($filepath.'/../helper/format.php');
?>
<?php
    $ct = new cart();
    if(!isset($_GET['adminpw']) || $_GET['adminpw'] == NULL){
        echo "<script> window.location ='index.php' </script>";
    }else{
        $id=$_GET['adminpw']; 
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST'  && isset($_POST['submit'])) {
        $updatePass = $ct->update_pass($_POST,$id);
    }  
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Thay Đổi Mật Khẩu</h2>
        <div class="block">               
         <form action="" method="POST">
            <table class="form">					
                <tr>
                    <td>
                        <label>Mật Khẩu Cũ</label>
                    </td>
                    <td>
                        <input type="password" placeholder="Nhập mật khẩu cũ..."  name="oldpass" class="medium" required="" />
                    </td>
                </tr>
				 <tr>
                    <td>
                        <label>Mật Khẩu Mới</label>
                    </td>
                    <td>
                        <input type="password" placeholder="Nhập mật khẩu mới..." name="newpass" class="medium" required="" />
                    </td>
                </tr>
				 
				
				 <tr>
                    <td>
                    </td>
                    <td>
                        <input type="submit" name="submit" Value="Thay Đổi" />
                    </td>
                </tr>
            </table>
            </form>
        </div>
    </div>
</div>
<?php include 'inc/footer.php';?>