<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../classes/cart.php');
    include_once ($filepath.'/../helper/format.php');
?>
<?php
    $ct = new cart();
    if(isset($_GET['adminid'])){
        $id = $_GET['adminid'];
    }   
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Thông Tin ADMIN</h2>
       <div class="block copyblock"> 
                  
        <form action="" method="POST">
            <table class="tblone" >
                <?php
                    $showad = $ct->show_admin($id);
                    if($showad){
                        while ($result = $showad->fetch_assoc()) {
                ?> 
                <tr>
                    <td>Họ và Tên</td>
                    <td>|</td>
                    <td><?php echo $result['adminName'] ?></td>
                </tr>
                <tr>
                    <td>Giới Tính</td>
                    <td>|</td>
                    <td><?php echo $result['gioitinh'] ?></td>
                </tr>
                <tr>
                    <td>E-Mail</td>
                    <td>|</td>
                    <td><?php echo $result['adminEmail'] ?></td>
                </tr>
                <tr>
                    <td>Tên Đăng Nhập</td>
                    <td>|</td>
                    <td><?php echo $result['adminUser'] ?></td>
                </tr>
                <tr>
                    <td>Level</td>
                    <td>|</td>
                    <td><?php echo $result['level'] ?></td>
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
<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();

        $('.datatable').dataTable();
        setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>
