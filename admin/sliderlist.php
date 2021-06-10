<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/product.php';?>
<?php 
	$product = new product();
	if(isset($_GET['type_slider']) && isset($_GET['type'])){
		$id = $_GET['type_slider'];
		$type = $_GET['type'];
		$update_silder = $product->update_silder($id, $type);
	}
	if(isset($_GET['del_slider'])){
		$id = $_GET['del_slider'];
		$del_silder = $product->del_silder($id);
	}
?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Danh Sách Slider</h2>
        <div class="block"> 
        	<?php 
        		if(isset($del_silder)){
        			echo $del_silder;
        		}
        	?> 
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th class="slider" style="width: 55px;">STT</th>
					<th class="slider" style="width: 100px;">Tên Slider</th>
					<th class="slider" style="width: 555px;">Hình Ảnh </th>
					<th class="slider" style="width: 44px;">Loại </th>
					<th class="slider" style="width: 85px;">Hành Động</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$product = new product();
					$get_slider = $product->show_slider1();
					if($get_slider){
						$i=0;
						while($result_slider = $get_slider->fetch_assoc()){
							$i++;
				?>
				<tr class="odd gradeX">
					<td><?php echo $i ?></td>
					<td><?php echo $result_slider['sliderName'] ?></td>
					<td><center><img src="uploads/<?php echo $result_slider['slider_image'] ?>" height="170px" width="550px"/></center></td>
					<td>
						<?php 
							if($result_slider['type']==1){	
						?>
						<a href="?type_slider=<?php echo $result_slider['sliderId'] ?>&type=0">Tắt</a> 
						<?php 
							}else{
						?>
						<a href="?type_slider=<?php echo $result_slider['sliderId'] ?>&type=1">Bật</a> 
						<?php 
							}
						?>
					</td>				
					<td>
						<a href="?del_slider=<?php echo $result_slider['sliderId'] ?>" onclick="return confirm('Bạn Thật Sự Muốn Xóa!');" >Xóa</a> 
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
