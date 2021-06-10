<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/category.php';?>
<?php include '../classes/brand.php';?>
<?php include '../classes/product.php';?>
<?php include_once '../helper/format.php';?>
<?php 
	$pd = new product();
	$fm = new Format();
	if(isset($_GET['productid'])){
        $id=$_GET['productid'];
    	$delpro = $pd->del_product($id);
    }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Danh Sách Sản Phẩm</h2>
        <div class="block">  
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th style="width: 25px;">ID</th>
					<th style="width: 140px;">Tên Sản Phẩm</th>
					<th style="width: 78px;">Giá Sản Phẩm</th>
					<th style="width: 70px;">Hình Ảnh</th>
					<th style="width: 80px;">Danh Mục</th>
					<th style="width: 80px;">Thương Hiệu</th>
					<th style="width: 140px;">Giới Thiệu</th>
					<th style="width: 140px;">Chi Tiết</th>
					<th>Chất Liệu</th>
					<th>Loại</th>
					<th style="width: 74px;">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$pdlist = $pd->show_product();
					if($pdlist){
						$i = 0;
						while ($result = $pdlist->fetch_assoc()) {
							$i++;
				?>			
				<tr class="odd gradeX">
					<td><?php echo $i ?></td>
					<td><?php echo $result['productName'] ?></td>
					<td><?php echo $fm->format_currency($result['price'])." "."đ" ?></td>
					<td><img src= "uploads/<?php echo $result['image'] ?>" width="80" height="80" style="margin-bottom: -80px"> </td>
					<td><?php echo $result['catName'] ?></td>
					<td><?php echo $result['brandName'] ?></td>
					<td><?php echo $fm->textShorten($result['pro_desc'], 100) ?></td>
					<td><?php echo $fm->textShorten($result['pro_details'], 100) ?></td>
					<td>
						<?php 
							if($result['style']==0){
								echo 'Dây Kim Loại';
							}elseif ($result['style']==1) {
								echo 'Dây Da';
							}elseif ($result['style']==2) {
								echo 'Dây Nhựa';
							}else{
								echo 'Dây Vải';
							}
					 	?>
					 </td>
					<td>
						<?php 
							if($result['type']==0){
								echo 'Cặp Đôi';
							}elseif ($result['type']==1) {
								echo 'Nam';
							}elseif ($result['type']==2) {
								echo 'Nữ';
							}else{
								echo 'Smartwatch';
							}
					 	?>
					 </td>
					<td><a href="productedit.php ?productid=<?php echo $result['productId'] ?>">Sửa</a> || <a href="?productid=<?php echo $result['productId'] ?>">Xóa</a></td>
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
