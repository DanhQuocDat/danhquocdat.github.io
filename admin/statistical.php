<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/category.php';?>
<?php include '../classes/brand.php';?>
<?php include '../classes/product.php';?>
<?php include '../classes/cart.php';?>
<?php include_once '../helper/format.php';?>
<?php 
	$mytime = getdate(date("U"));
	$date_od = "$mytime[weekday], $mytime[month] $mytime[mday], $mytime[year]";

	$ct = new cart();
	$fm = new Format();
	$date_or = $date_od ;
	$or_list = $ct->show_product_ordered($date_or);
	//Tong SP da ban
	$db = new Database();
	$get_sum = "SELECT SUM(o.quantity) AS sum_q FROM tbl_order AS o, tbl_product AS p 
				WHERE o.productId = p.productId AND o.status =2 AND o.date_ordered = '$date_or' " ;
	$sql_q = $db->select($get_sum);
	$data = $sql_q->fetch_array();
	$sum_q = $data['sum_q'];
	//Tong tien thu khi ban san pham
	$get_sump = "SELECT SUM(o.price) AS sum_p FROM tbl_order AS o, tbl_product AS p 
				WHERE o.productId = p.productId AND o.status =2 AND o.date_ordered = '$date_or' " ;
	$sql_p = $db->select($get_sump);
	$datap = $sql_p->fetch_array();
	$sum_p = $datap['sum_p'];
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Sản Phẩm Bán Ra Hôm Nay (<?php echo $date_od ?>)</h2>
        <div class="tk_ordered">
        	<p>Tổng Sản Phẩm Bán Ra: <?php echo $sum_q; ?> Sản Phẩm </p>
        	<p>Tổng Tiền: <?php echo $fm->format_currency($sum_p)." "."Đ" ?></p>
        </div>
        <div class="block">  
            <table class="data display datatable" id="example" style="width: 70%">
			<thead>
				<tr>
					<th style="width: 50px;">ID</th>
					<th style="width: 140px;">Tên Sản Phẩm</th>
					<th style="width: 100px;">Hình Ảnh</th>
					<th style="width: 150px;">Số Lượng</th>
					<th style="width: 150px;">Giá Sản Phẩm</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					if($or_list){
						$i = 0;
						while ($result = $or_list->fetch_assoc()) {
							$i++;
				?>		
				<tr class="odd gradeX">
					<td><?php echo $i; ?></td>
					<td><a title="Click để xem chi tiêt sản phẩm" href="../details.php?proid=<?php echo $result['productId'] ?>" target="_blank">
                        <?php echo $result['productName'] ?>
                        </a>
                    </td>
					<td><img src= "uploads/<?php echo $result['image'] ?>" width="80" height="80" style="margin-bottom: -65px"></td> 
					<td><?php echo $result['quantity']; ?></td>
					<td><?php echo $fm->format_currency($result['price'])." "."đ/ 1 SP" ?></td>					
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
