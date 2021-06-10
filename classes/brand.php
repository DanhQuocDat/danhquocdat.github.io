<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helper/format.php');
?>
 
<?php
	/**
	 * 
	 */
	class brand
	{
		private $db;
		private $fm;
		function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}
		/** Thêm Thương hiệu Sản Phẩm**/
		public function insert_brand($brandName){
			$brandName = $this->fm->validation($brandName);
			$brandName = mysqli_real_escape_string($this->db->link, $brandName);

			if(empty($brandName)){
				$alert = "<span class='error'>Vui lòng không bỏ trống! </span>";
				return $alert;
			}else{
				$query = "INSERT INTO tbl_brand(brandName) VALUES('$brandName') ";
				$result = $this->db->insert($query);
				if($result){
					$alert = "<span class='success'>Thêm Thương Hiệu Thành Công </span>";
					return $alert;
				}else{
					$alert = "<span class='error'>Thêm Không Thành Công! </span>";
					return $alert;
				}
			}
		}
		/**Hiển thị Danh Mục Sản phẩm **/
		public function show_brand(){
			$query = "SELECT * FROM  tbl_brand ORDER BY brandId DESC";
			$result = $this->db->SELECT($query);
			return $result;
		}
		/** Sửa thương hiệu sản phẩm **/
		public function update_brand($brandName, $id){
			$brandName = $this->fm->validation($brandName);
			$brandName = mysqli_real_escape_string($this->db->link, $brandName);
			$id = mysqli_real_escape_string($this->db->link, $id);

			if(empty($brandName)){
				$alert = "<span class='error'>Vui lòng không bỏ trống! </span>";
				return $alert;
			}else{
				$query = "UPDATE tbl_brand SET brandName = '$brandName' WHERE brandId='$id' ";
				$result = $this->db->update($query);
				if($result){
					$alert = "<span class='success'>Sửa Thương Hiệu Thành Công </span>";
					return $alert;
				}else{
					$alert = "<span class='error'>Sửa Không Thành Công! </span>";
					return $alert;
				}
			}
		}
		/** Lấy id thương hiệu **/
		public function getbrandbyId($id){
			$query = "SELECT * FROM  tbl_brand WHERE brandId = '$id' ";
			$result = $this->db->SELECT($query);
			return $result;
		}
		/** Xóa Danh mục sản phẩm **/
		public function del_brand($id){
			$query = "DELETE FROM  tbl_brand WHERE brandId = '$id' ";
			$result = $this->db->DELETE($query);
			if($result){
				$alert = "<span class='success'>Xóa Thương Hiệu Thành Công </span>";
				return $alert;
			}else{
				$alert = "<span class='error'>Xóa Thương Hiệu Không Thành Công! </span>";
				return $alert;
			}
		}
	}
?>