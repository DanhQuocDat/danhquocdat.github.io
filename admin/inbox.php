<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../classes/cart.php');
	include_once ($filepath.'/../helper/format.php');
?>
<?php 
	$mytime = getdate(date("U"));
	$date_od = "$mytime[weekday], $mytime[month] $mytime[mday], $mytime[year]";
?>
<?php
	$ct = new cart();
	if(isset($_GET['shipid'])){
        $id = $_GET['shipid'];
        $time = $_GET['time'];
        $price =$_GET['price'];
        $shiped = $ct->shiped($id, $time, $price);
    }   
?>
<?php
	$ct = new cart();
	if(isset($_GET['delshipid'])){
        $id = $_GET['delshipid'];
        $time = $_GET['time'];
        $price =$_GET['price'];
        $del_shiped = $ct->del_shiped($id, $time, $price);
    }
    if(isset($_GET['confirmid'])){
        $id = $_GET['confirmid'];
        $time = $_GET['time'];
        $price =$_GET['price'];
        $dateOd = $date_od;
        $cus_shiped = $ct->cus_shiped($id, $time, $price, $dateOd);
    }      
?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Quản Lý Đơn Hàng</h2>
        <div class="block">
        <?php
        	if(isset($del_shiped)){
        		echo $del_shiped;
        	}
        ?>
        <?php
        	if(isset($shiped)){
        		echo $shiped;
        	}
        ?>          
        <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th style="width: 55px;">STT</th>
					<th style="width: 130px;;">Thời Gian Đặt</th>
					<th style="width: 256px;">Sản Phẩm</th>
					<th style="width: 93px;">Số Lượng</th>
					<th style="width: 115px;">Giá</th>
					<th style="width: 87px;">ID_KH</th>
					<th style="width: 85px;">Địa Chỉ</th>
					<th style="width: 125px;">Hành Động</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$ct = new cart();
					$fm = new Format();
					$get_inbox_cat = $ct->get_inbox_cat();
					if($get_inbox_cat){
						$i = 0;
						while($result = $get_inbox_cat->fetch_assoc()){
							$i++;
				?>
				<tr class="odd gradeX">
					<td><?php echo $i ?></td>
					<td><?php echo $fm->formatDate($result['date_order']) ?></td>
					<td><a title="Click để xem chi tiêt sản phẩm" href="../details.php?proid=<?php echo $result['productId'] ?>" target="_blank">
                        <?php echo $result['productName'] ?>
                        </a>
                    </td>
					<td><?php echo $result['quantity'] ?></td>
					<td><?php echo $fm->format_currency($result['price'])." "."đ" ?><br>
						<?php 
							if($result['pay']=='unpaid'){
								echo "(Chưa Thanh Toán)";
							}elseif($result['pay']=='paid'){
								echo "(Đã Thanh Toán)";
							}else{
								echo "";
							} 
						?>
					</td>
					<td><?php echo $result['customer_id'] ?></td>
					<td><a href="customer.php?customerid=<?php echo $result['customer_id'] ?>">Xem </a></td>
					<td>
						<?php 
							if($result['status']==0){
						?>
						<a href="?shipid=<?php echo $result['id'] ?>&price=<?php echo $result['price'] ?>&time=<?php echo $result['date_order'] ?>">Đang chờ xử lý</a>
						<?php
							}elseif($result['status']==1){
						?>
						<a href="?confirmid=<?php echo $result['id'] ?>&price=<?php echo $result['price'] ?>&time=<?php echo $result['date_order'] ?>">Đang vận chuyển</a>
						<?php 
							}else{
						?>
						<p style="font-weight: bold;">Đã xử lý <a style="color: red" href="?delshipid=<?php echo $result['id'] ?>&price=<?php echo $result['price'] ?>&time=<?php echo $result['date_order'] ?>">(Xóa)</a></p>
						<?php
							}
						?>
					</td>
				</tr>
				<?php						
						}
					}
				?>
			</tbody>
		</table>
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
