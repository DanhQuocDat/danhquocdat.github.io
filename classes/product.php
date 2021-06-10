<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helper/format.php');
?>

<?php
	/**
	 * 
	 */
	class product
	{
		private $db;
		private $fm;
		function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}
		/** Thêm Sản Phẩm**/
		public function insert_product($data, $files){
			$productName = mysqli_real_escape_string($this->db->link, $data['productName']);
			$category = mysqli_real_escape_string($this->db->link, $data['category']);
			$brand = mysqli_real_escape_string($this->db->link, $data['brand']);
			$pro_desc = mysqli_real_escape_string($this->db->link, $data['pro_desc']);
			$pro_details = mysqli_real_escape_string($this->db->link, $data['pro_details']);
			$price = mysqli_real_escape_string($this->db->link, $data['price']);
			$style = mysqli_real_escape_string($this->db->link, $data['style']);
			$type = mysqli_real_escape_string($this->db->link, $data['type']);
			// Kiểm tra hình ảnh và lấy hình ảnh cho vào folder uploads
			$permited = array('jpg', 'jpeg', 'png', 'gif');
			$file_name = $_FILES['image']['name'];
			$file_size = $_FILES['image']['size'];
			$file_temp = $_FILES['image']['tmp_name'];

			$div = explode('.', $file_name);
			$file_ext = strtolower(end($div));
			$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
			$upload_image = "uploads/".$unique_image;

			if($productName=="" || $category=="" || $brand=="" || $pro_desc=="" || $pro_details=="" || $price=="" || $style=="" || $type=="" || $file_name=""){
				$alert = "<span class='error'>Vui lòng không bỏ trống! </span>";
				return $alert;
			}else{
				move_uploaded_file($file_temp, $upload_image);
				$query = "INSERT INTO tbl_product(productName, catId, brandId, pro_desc, pro_details, price, style, type,image) VALUES('$productName', '$category', '$brand', '$pro_desc', '$pro_details', '$price', '$style', '$type', '$unique_image') ";
				$result = $this->db->insert($query);
				if($result){
					$alert = "<span class='success'>Thêm Sản Phẩm Thành Công </span>";
					return $alert;
				}else{
					$alert = "<span class='error'>Thêm Sản Phẩm Không Thành Công! </span>";
					return $alert;
				}
			}
		}
		/**Hiển thị thông tin Sản phẩm **/
		public function show_product(){
			$query = "SELECT p.*, c.catName, b.brandName
			FROM  tbl_product as p, tbl_category as c, tbl_brand as b
			WHERE p.catId = c.catId
			AND p.brandId = b.brandId
			ORDER BY p.productId DESC";

			$result = $this->db->SELECT($query);
			return $result;
		}
		/** Sửa sản phẩm **/
		public function update_product($data, $files, $id){
			$productName = mysqli_real_escape_string($this->db->link, $data['productName']);
			$category = mysqli_real_escape_string($this->db->link, $data['category']);
			$brand = mysqli_real_escape_string($this->db->link, $data['brand']);
			$pro_desc = mysqli_real_escape_string($this->db->link, $data['pro_desc']);
			$pro_details = mysqli_real_escape_string($this->db->link, $data['pro_details']);
			$price = mysqli_real_escape_string($this->db->link, $data['price']);
			$style = mysqli_real_escape_string($this->db->link, $data['style']);
			$type = mysqli_real_escape_string($this->db->link, $data['type']);
			// Kiểm tra hình ảnh và lấy hình ảnh cho vào folder uploads
			$permited = array('jpg', 'jpeg', 'png', 'gif');
			$file_name = $_FILES['image']['name'];
			$file_size = $_FILES['image']['size'];
			$file_temp = $_FILES['image']['tmp_name'];

			$div = explode('.', $file_name); // tách từng phần của ảnh từ dấu '.'
			$file_ext = strtolower(end($div)); //lấy phần đuôi trong tên của hình
			$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
			$upload_image = "uploads/".$unique_image;

			if($productName=="" || $category=="" || $brand=="" || $pro_desc=="" || $pro_details=="" || $price=="" || $style=="" || $type==""){
				$alert = "<span class='error'>Vui lòng không bỏ trống </span>";
				return $alert;
			}else{
				//Nếu ng dùng chọn ảnh mới
				if(!empty($file_name)){
					if($file_size > 204800000){
						$alert = "<span class='error'>Kích thước hình ảnh không được quá 10MB! </span>";
						return $alert;
					}elseif (in_array($file_ext, $permited)==false ) {
						$alert = "<span class='error'>Chỉ được phép uploads :".implode(', ', $permited)."</span>";
						return $alert;
					}
					move_uploaded_file($file_temp, $upload_image);
					$query = "UPDATE tbl_product 
					SET productName = '$productName',
						catId = '$category',
						brandId = '$brand',
						pro_desc = '$pro_desc',
						pro_details = '$pro_details',
						style = '$style',
						type = '$type',
						price = '$price',
						image = '$unique_image'
					WHERE productId ='$id' ";

				}else{ //Nếu ng dùng không chọn ảnh mới
					$query = "UPDATE tbl_product 
					SET productName = '$productName',
						catId = '$category',
						brandId = '$brand',
						pro_desc = '$pro_desc',
						pro_details = '$pro_details',
						style = '$style',
						type = '$type',
						price = '$price'

					WHERE productId ='$id' ";
				}
				$result = $this->db->update($query);
				if($result){
					$alert = "<span class='success'>Sửa Sản Phẩm Thành Công </span>";
					return $alert;
				}else{
					$alert = "<span class='error'>Sửa Sản Phẩm Không Thành Công </span>";
					return $alert;
				}
			}	
		}
		public function getproductbyId($id){
			$query = "SELECT * FROM  tbl_product WHERE productId = '$id' ";
			$result = $this->db->SELECT($query);
			return $result;
		}
		/** Xóa sản phẩm **/
		public function del_product($id){
			$query = "DELETE FROM  tbl_product WHERE productId = '$id' ";
			$result = $this->db->DELETE($query);
			if($result){
				$alert = "<span class='success'>Xóa Sản Phẩm Thành Công </span>";
				return $alert;
			}else{
				$alert = "<span class='error'>Xóa Sản Phẩm Không Thành Công </span>";
				return $alert;
			}
		}
		//Hien thi all san pham o trang chu
		public function getproduct_allpro(){
			$pro_in_page = 16;
			if(!isset($_GET['page3'])){
				$page = 1;
			}else{
				$page = $_GET['page3'];
			}
			$in_page = ($page-1)*$pro_in_page;
			$query = "SELECT * FROM  tbl_product  LIMIT $in_page,$pro_in_page ";
			$result = $this->db->SELECT($query);
			return $result;
		}
		//Phân trang all san pham o trang chu
		public function getallproduct_pro(){
			$query = "SELECT * FROM  tbl_product ";
			$result = $this->db->SELECT($query);
			return $result;
		}
		//Hien thi san pham Nam o trang chu
		public function getproductn_feathered(){
			$pro_in_page = 8;
			if(!isset($_GET['page1'])){
				$page = 1;
			}else{
				$page = $_GET['page1'];
			}
			$in_page = ($page-1)*$pro_in_page;
			$query = "SELECT * FROM  tbl_product WHERE type = '1' LIMIT $in_page,$pro_in_page ";
			$result = $this->db->SELECT($query);
			return $result;
		}
		//Phân trang san pham Nam o trang chu
		public function getallproductn_feathered(){
			$query = "SELECT * FROM  tbl_product WHERE type = '1'";
			$result = $this->db->SELECT($query);
			return $result;
		}
		//Hien thi san pham NU o trang chu
		public function getproduct_nu(){
			$pro_in_page = 8;
			if(!isset($_GET['page2'])){
				$page = 1;
			}else{
				$page = $_GET['page2'];
			}
			$in_page = ($page-1)*$pro_in_page;
			$query = "SELECT * FROM  tbl_product WHERE type = '2' LIMIT $in_page,$pro_in_page ";
			$result = $this->db->SELECT($query);
			return $result;
		}
		//Phân trang san pham Nu o trang chu
		public function getallproduct_nu(){
			$query = "SELECT * FROM  tbl_product WHERE type = '2'";
			$result = $this->db->SELECT($query);
			return $result;
		}
		//Hien thi san pham Nam theo loai o trang chu
		public function getproduct_feathered($type){
			$pro_in_page = 8;
			if(!isset($_GET['page1'])){
				$page = 1;
			}else{
				$page = $_GET['page1'];
			}
			$in_page = ($page-1)*$pro_in_page;
			$query = "SELECT * FROM  tbl_product WHERE type = '$type' LIMIT $in_page,$pro_in_page ";
			$result = $this->db->SELECT($query);
			return $result;
		}
		//Phân trang san pham Nam theo loai o trang chu
		public function getallproduct_feathered($type){
			$query = "SELECT * FROM  tbl_product WHERE type = '$type'";
			$result = $this->db->SELECT($query);
			return $result;
		}
		//Hien thi san pham moi o trang chu
		public function getproduct_new(){
			$pro_in_page = 8;
			if(!isset($_GET['page'])){
				$page = 1;
			}else{
				$page = $_GET['page'];
			}
			$in_page = ($page-1)*$pro_in_page;
			$query = "SELECT * FROM  tbl_product ORDER BY productId DESC LIMIT $in_page,$pro_in_page";
			$result = $this->db->SELECT($query);
			return $result;
		}
		//Phân Trang Sản Phẩm Mới---------------------
		public function get_all_product(){
			$query = "SELECT * FROM  tbl_product";
			$result = $this->db->SELECT($query);
			return $result;
		}
		//Hien thi chi tiet san pham
		public function get_details($id){
			$query = "SELECT p.*, c.catName, b.brandName
			FROM  tbl_product as p, tbl_category as c, tbl_brand as b
			WHERE p.catId = c.catId
			AND p.brandId = b.brandId 
			AND p.productId = '$id' ";

			$result = $this->db->SELECT($query);
			return $result;

		}
		//So sánh sản phẩm 
		public function insertCompare($productid, $customer_id){
			$productid = mysqli_real_escape_string($this->db->link, $productid);
			$customer_id = mysqli_real_escape_string($this->db->link, $customer_id);

			$check_compare = "SELECT * FROM tbl_compare WHERE productId = '$productid' AND customer_id = '$customer_id'";
			$result_check = $this->db->select($check_compare);
			if($result_check){
				$msg = "<span class='error'>Sản Phẩm Đã Tồn Tại </span>";
				return $msg;
			}else{
				$query = "SELECT * FROM tbl_product WHERE productId = '$productid'";
				$result = $this->db->select($query)->fetch_assoc();

				$productName = $result['productName'];
				$price = $result['price'];
				$image = $result['image'];
				$pro_details = $result['pro_details'];

				$query_insert = "INSERT INTO tbl_compare(productId, price, image, customer_id, productName, pro_details) VALUES('$productid', '$price', '$image', '$customer_id', '$productName', '$pro_details') ";
				$insert_compare = $this->db->insert($query_insert);
				if($insert_compare){
					$alert = "<span class='success'>Đã Thêm </span>";
					return $alert;
				}else{
					$alert = "<span class='error'>Không Thêm Được </span>";
					return $alert;
				}
			}
		}
		//Lấy sản phẩm để so sánh
		public function get_compare($customer_id){
			$query = "SELECT * FROM  tbl_compare WHERE customer_id = '$customer_id' ORDER BY id DESC LIMIT 2";
			$result = $this->db->SELECT($query);
			return $result;
		}
		//Xóa sản phẩm so sánh
		public function delpro_compare($proid){
			$productId = mysqli_real_escape_string($this->db->link, $productId);
			$query = "DELETE  FROM tbl_compare WHERE productId = '$proid'";
			$result = $this->db->delete($query);
			if($result){
				echo "<script type='text/javascript'>window.location.href = 'compare.php'</script>";
			}else{
				$msg = "<span style='color:red; font-size:20px'> Không xóa được! </span>";
				return $msg;
			}
		}
		//Xóa sản phẩm so sánh khi người dùng đăng xuất
		public function del_compare($customerid){
			$sId = session_id();
			$query = "DELETE FROM tbl_compare WHERE customer_id = '$customerid'";
			$result = $this->db->delete($query);
			return $result;
		}
		//Thêm các slider
		public function insert_slider($data, $file){
			$sliderName = mysqli_real_escape_string($this->db->link, $data['sliderName']);
			$type = mysqli_real_escape_string($this->db->link, $data['type']);
		
			// Kiểm tra hình ảnh và lấy hình ảnh cho vào folder uploads
			$permited = array('jpg', 'jpeg', 'png', 'gif');
			$file_name = $_FILES['image']['name'];
			$file_size = $_FILES['image']['size'];
			$file_temp = $_FILES['image']['tmp_name'];

			$div = explode('.', $file_name); // tách từng phần của ảnh từ dấu '.'
			$file_ext = strtolower(end($div)); //lấy phần đuôi trong tên của hình
			$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
			$upload_image = "uploads/".$unique_image;

			if($sliderName=="" || $type=="" ){
				$alert = "<span class='error'>Vui lòng không bỏ trống! </span>";
				return $alert;
			}else{
				//Nếu ng dùng chọn ảnh mới
				if(!empty($file_name)){
					if($file_size > 2048000){
						$alert = "<span class='error'>Kích thước hình ảnh quá lớn! </span>";
						return $alert;
					}elseif (in_array($file_ext, $permited)==false ) {
						$alert = "<span class='error'>Chỉ được phép uploads :".implode(', ', $permited)."</span>";
						return $alert;
					}
					move_uploaded_file($file_temp, $upload_image);
					$query = "INSERT INTO tbl_slider(sliderName, type, slider_image ) VALUES('$sliderName', '$type', '$unique_image') ";
					$insert_slider = $this->db->insert($query);
					if($insert_slider){
						$alert = "<span class='success'>Đã Thêm Slider</span>";
						return $alert;
					}else{
						$alert = "<span class='error'>Không Thêm Được! </span>";
						return $alert;
					}
				}				
			}	
		}
		//Hiển thị các slider ra trang khách hàng
		public function show_slider(){
			$query = "SELECT * FROM tbl_slider WHERE type='1' ORDER BY sliderId DESC";
			$result = $this->db->SELECT($query);
			return $result;
		}
		public function show_slider1(){
			$query = "SELECT * FROM tbl_slider ORDER BY sliderId DESC";
			$result = $this->db->SELECT($query);
			return $result;
		}
		//Update loại ẩn hiện slider
		public function update_silder($id,$type){
			$type = mysqli_real_escape_string($this->db->link, $type);
			$query = "UPDATE tbl_slider SET type ='$type' WHERE sliderId='$id'";
			$result = $this->db->UPDATE($query);
			return $result;
		}
		//Xóa các slider
		public function del_silder($id){
			$query = "DELETE FROM  tbl_slider WHERE sliderId = '$id' ";
			$result = $this->db->DELETE($query);
			if($result){
				$alert = "<span class='success'>Xóa Thành Công </span>";
				return $alert;
			}else{
				$alert = "<span class='error'>Không Xóa Được </span>";
				return $alert;
			}	
		}
		//Tìm Kiếm Sản Phẩm
		public function search_product($tukhoa){
			$tukhoa = $this->fm->validation($tukhoa);
			$query = "SELECT * FROM  tbl_product WHERE productName LIKE '%$tukhoa%' ";
			$result = $this->db->SELECT($query);
			return $result;
		}
		//menu các sản phẩm
		public function getproduct_dh($name){
			$name = $this->fm->validation($name);
			$check_br = "SELECT brandId FROM tbl_brand WHERE brandName='$name' " ;
			$result_br = $this->db->select($check_br);
			if($result_br){
				while ($resultname= $result_br->fetch_assoc()) {
					$namebr = $resultname['brandId'];
					$pro_in_page = 8;
					if(!isset($_GET['pagemn'])){
						$page = 1;
					}else{
						$page = $_GET['pagemn'];
					}
					$in_page = ($page-1)*$pro_in_page;
					$query = "SELECT * FROM  tbl_product WHERE brandId = '$namebr' LIMIT $in_page,$pro_in_page ";
					$result = $this->db->SELECT($query);
					return $result;	
					if($result){
						return $result;
					}else{
						echo "<script> alert('Chưa có sản phẩm!') </script>";
						echo "<meta http-equiv='refresh' content='0;URL=index.php'>";
					}
				}
			}else{
				echo "<script> alert('Chưa có sản phẩm!') </script>";
				echo "<meta http-equiv='refresh' content='0;URL=index.php'>";
			}		
		}
		//phân trang sản phẩm menu
		public function getallproduct_mn($name){
			$name = $this->fm->validation($name);
			$check_br = "SELECT brandId FROM tbl_brand WHERE brandName='$name' " ;
			$result_br = $this->db->select($check_br);
			if($result_br){
				while ($resultname= $result_br->fetch_assoc()) {
					$namebr = $resultname['brandId'];
					$query = "SELECT * FROM  tbl_product WHERE brandId = '$namebr'";
					$result = $this->db->SELECT($query);
					return $result;	
					if($result){
						return $result;
					}else{
						echo "<script> alert('Chưa có sản phẩm!') </script>";
						echo "<meta http-equiv='refresh' content='0;URL=index.php'>";
					}
				}
			}
		}
		//menu các sản phẩm nam
		public function getproduct_dhn($name, $type){
			$name = $this->fm->validation($name);
			$check_br = "SELECT brandId FROM tbl_brand WHERE brandName='$name' " ;
			$result_br = $this->db->select($check_br);
			if($result_br){
				while ($resultname= $result_br->fetch_assoc()) {
					$namebr = $resultname['brandId'];
					$pro_in_page = 8;
					if(!isset($_GET['pagemn'])){
						$page = 1;
					}else{
						$page = $_GET['pagemn'];
					}
					$in_page = ($page-1)*$pro_in_page;
					$query = "SELECT * FROM  tbl_product WHERE brandId = '$namebr' AND type='$type' LIMIT $in_page,$pro_in_page ";
					$result = $this->db->SELECT($query);
					return $result;	
					if($result){
						return $result;
					}else{
						echo "<script> alert('Chưa có sản phẩm!') </script>";
						echo "<meta http-equiv='refresh' content='0;URL=index.php'>";
					}
				}
			}else{
				echo "<script> alert('Chưa có sản phẩm!') </script>";
				echo "<meta http-equiv='refresh' content='0;URL=index.php'>";
			}		
		}
		//phân trang sản phẩm menu nam
		public function getallproductn_mn($name,$type){
			$name = $this->fm->validation($name);
			$check_br = "SELECT brandId FROM tbl_brand WHERE brandName='$name' " ;
			$result_br = $this->db->select($check_br);
			if($result_br){
				while ($resultname= $result_br->fetch_assoc()) {
					$namebr = $resultname['brandId'];
					$query = "SELECT * FROM  tbl_product WHERE brandId = '$namebr' AND type='$type'";
					$result = $this->db->SELECT($query);
					return $result;	
					if($result){
						return $result;
					}else{
						echo "<script> alert('Chưa có sản phẩm!') </script>";
						echo "<meta http-equiv='refresh' content='0;URL=index.php'>";
					}
				}
			}
		}
		//Hien thi all smartwatch o trang chu
		public function getproducttm_allpro(){
			$pro_in_page = 16;
			if(!isset($_GET['page3'])){
				$page = 1;
			}else{
				$page = $_GET['page3'];
			}
			$in_page = ($page-1)*$pro_in_page;
			$query = "SELECT * FROM  tbl_product WHERE type='3' LIMIT $in_page,$pro_in_page ";
			$result = $this->db->SELECT($query);
			return $result;
		}
		//Phân trang all san pham smartwatch
		public function getallproduct_protm(){
			$query = "SELECT * FROM  tbl_product WHERE type='3' ";
			$result = $this->db->SELECT($query);
			return $result;
		}
		//menu các sản phẩm theo dây
		public function getproduct_st($style, $type){
			$pro_in_page = 8;
			if(!isset($_GET['page'])){
				$page = 1;
			}else{
				$page = $_GET['page'];
			}
			$in_page = ($page-1)*$pro_in_page;
			$query = "SELECT * FROM  tbl_product WHERE style = '$style' AND type ='$type' LIMIT $in_page,$pro_in_page ";
			$result = $this->db->SELECT($query);
			if($result){
				return $result;
			}else{
				echo "<script> alert('Chưa có sản phẩm!') </script>";
				echo "<meta http-equiv='refresh' content='0;URL=index.php'>";
			}		
		}
		//phân trang sản phẩm menu theo dây
		public function getallproduct_st($style, $type){
			$query = "SELECT * FROM  tbl_product WHERE style = '$style' AND type ='$type' ";
			$result = $this->db->SELECT($query);
			if($result){
				return $result;
			}else{
				echo "<script> alert('Chưa có sản phẩm!') </script>";
				echo "<meta http-equiv='refresh' content='0;URL=index.php'>";
			}
		}
		//Hien thi san pham Nam theo giá o trang chu
		public function getproduct_price($p1, $p2, $type){
			$pro_in_page = 8;
			if(!isset($_GET['page'])){
				$page = 1;
			}else{
				$page = $_GET['page'];
			}
			$in_page = ($page-1)*$pro_in_page;
			$query = "SELECT * FROM  tbl_product WHERE type = '$type' AND (price >=$p1 AND  price <$p2) LIMIT $in_page,$pro_in_page ";
			$result = $this->db->SELECT($query);
			if($result){
				return $result;
			}else{
				echo "<script> alert('Chưa có sản phẩm!') </script>";
				echo "<meta http-equiv='refresh' content='0;URL=index.php'>";
			}
		}
		//Phân trang san pham Nam o theo giá trang chu
		public function getallproduct_price($p1, $p2, $type){
			$query = "SELECT * FROM  tbl_product WHERE type = '$type' AND (price >=$p1 AND price <$p2)";
			$result = $this->db->SELECT($query);
			if($result){
				return $result;
			}else{
				echo "<script> alert('Chưa có sản phẩm!') </script>";
				echo "<meta http-equiv='refresh' content='0;URL=index.php'>";
			}
		}
	}
?>