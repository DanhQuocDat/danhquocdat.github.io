<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helper/format.php');
?>
  
<?php
	/**
	 * 
	 */
	class category
	{
		private $db;
		private $fm;
		function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}
		/** Thêm Danh Mục Sản Phẩm**/
		public function insert_category($catName){
			$catName = $this->fm->validation($catName);
			$catName = mysqli_real_escape_string($this->db->link, $catName);

			if(empty($catName)){
				$alert = "<span class='error'>Vui lòng không bỏ trống! </span>";
				return $alert;
			}else{
				$query = "INSERT INTO tbl_category(catName) VALUES('$catName') ";
				$result = $this->db->insert($query);
				if($result){
					$alert = "<span class='success'>Thêm Thành Công </span>";
					return $alert;
				}else{
					$alert = "<span class='error'>Thêm Không Thành Công! </span>";
					return $alert;
				}
			}
		}
		/**Hiển thị Danh Mục Sản phẩm **/
		public function show_category(){
			$query = "SELECT * FROM  tbl_category ORDER BY catId DESC";
			$result = $this->db->SELECT($query);
			return $result;
		}
		/** Sửa danh mục sản phẩm **/
		public function update_category($catName, $id){
			$catName = $this->fm->validation($catName);
			$catName = mysqli_real_escape_string($this->db->link, $catName);
			$id = mysqli_real_escape_string($this->db->link, $id);

			if(empty($catName)){
				$alert = "<span class='error'>Vui lòng không bỏ trống! </span>";
				return $alert;
			}else{
				$query = "UPDATE tbl_category SET catName = '$catName' WHERE catId='$id' ";
				$result = $this->db->update($query);
				if($result){
					$alert = "<span class='success'>Sửa Danh Mục Thành Công </span>";
					return $alert;
				}else{
					$alert = "<span class='error'>Sửa Danh Mục Không Thành Công! </span>";
					return $alert;
				}
			}
		}
		public function getcatbyId($id){
			$query = "SELECT * FROM  tbl_category WHERE catId = '$id' ";
			$result = $this->db->SELECT($query);
			return $result;
		}
		/** Xóa Danh mục sản phẩm **/
		public function del_category($id){
			$query = "DELETE FROM  tbl_category WHERE catId = '$id' ";
			$result = $this->db->DELETE($query);
			if($result){
				$alert = "<span class='success'>Xóa Danh Mục Thành Công </span>";
				return $alert;
			}else{
				$alert = "<span class='error'>Xóa Danh Mục Không Thành Công </span>";
				return $alert;
			}
		}
		/**Hiển thị Danh Mục Sản phẩm ở trang chủ**/
		public function showall_category(){
			$query = "SELECT * FROM  tbl_category ORDER BY catId DESC";
			$result = $this->db->SELECT($query);
			return $result;
		}
		//Hiển thị sản phẩm theo danh mục
		public function get_productbycat($id){
			$query = "SELECT * FROM  tbl_product WHERE catId='$id' ORDER BY catId DESC LIMIT 8";
			$result = $this->db->SELECT($query);
			return $result;
		}
		//Hiển thị tên danh mục
		public function get_namebycat($id){
			$query = "SELECT tbl_product.*, tbl_category.catName, tbl_category.catId
				FROM  tbl_product, tbl_category
				WHERE tbl_product.catId = tbl_category.catId
				AND tbl_product.catId = '$id' LIMIT 1"  ;
			$result = $this->db->SELECT($query);
			return $result;
		}

	}
?>