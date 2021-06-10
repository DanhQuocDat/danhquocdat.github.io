<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../classes/customer.php');
    include_once ($filepath.'/../helper/format.php');
?>
<?php
    if(!isset($_GET['customerid']) || $_GET['customerid'] == NULL){
        echo "<script> window.location ='inbox.php' </script>";
    }else{
        $id=$_GET['customerid'];
    }
    $cs = new customer();
?>
<?php ?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Thông Tin Người Nhận Hàng</h2>
       <div class="block copyblock"> 
                  
        <form action="" method="POST">
            <table class="tblone" >
                <?php
                    $get_customer = $cs->show_customer($id);
                    if($get_customer){
                        while ($result = $get_customer->fetch_assoc()) {
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
        </form>
        </div>
    </div>
</div>
<?php include 'inc/footer.php';?>