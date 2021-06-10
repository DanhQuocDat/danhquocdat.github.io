<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helper/format.php');
?>
 
<?php
	/**
	 * 
	 */
	class cart
	{
		private $db;
		private $fm;
		function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}
		//Hiển Thị thông tin admin
		public function show_admin($id){
			$query = "SELECT * FROM tbl_admin WHERE adminId = '$id'";
			$get_admin = $this->db->select($query);
			return $get_admin;
		}
		//Thay Đổi Mật Khẩu admin
		public function update_pass($data,$id){
			$newpass = mysqli_real_escape_string($this->db->link, $data['newpass']);
			$oldpass = mysqli_real_escape_string($this->db->link, $data['oldpass']);
			// $getId = mysqli_real_escape_string($this->db->link, $id);
			$checkoldpw ="SELECT * FROM tbl_admin WHERE adminId = '$id' AND adminPass = md5('$oldpass')";
			$check_pw = $this->db->select($checkoldpw);
			if($check_pw==true){
				$query = "UPDATE tbl_admin 
					SET adminPass = md5('$newpass') WHERE adminId = '$id'";
				$result = $this->db->UPDATE($query);
				if($result){
					echo "<script> alert('Mật khẩu đã thay đổi!') </script>";
					echo "<script type='text/javascript'>window.location.href = 'changepassword.php'</script>";
				}else{
					echo "<script> alert('Mật khẩu chưa thay đổi!') </script>";
					echo "<script type='text/javascript'>window.location.href = 'changepassword.php'</script>";
				}
			}else{
				echo "<script> alert('Mật khẩu cũ không chính xác!') </script>";
				echo "<script type='text/javascript'>window.location.href = 'changepassword.php'</script>";
			}
			
		}
		//Thêm sản phẩm vào giỏ hàng
		public function add_to_cart($quantity, $id){

			$quantity = $this->fm->validation($quantity);
			$quantity = mysqli_real_escape_string($this->db->link, $quantity);
			$id = mysqli_real_escape_string($this->db->link, $id);
			$sId = session_id();

			$query = "SELECT * FROM tbl_product WHERE productId = '$id'";
			$result = $this->db->select($query)->fetch_assoc();

			$image = $result['image'];
			$price = $result['price'];
			$productName = $result['productName'];

			$checkcart ="SELECT * FROM tbl_cart WHERE productId = '$id'AND sId='$sId'";
			$check_cart = $this->db->select($checkcart);
			if($check_cart){
				$msg = "Sản phẩm đã được thêm, vui lòng vào giỏ hàng để thay đổi !";
				return $msg;
			}else{
				$query_insert = "INSERT INTO tbl_cart(productId, quantity, sId, image, price, productName) VALUES('$id', '$quantity', '$sId', '$image', '$price', '$productName') ";
				$insert_cart = $this->db->insert($query_insert);
				if($insert_cart){
					echo "<script type='text/javascript'>window.location.href = 'cart.php'</script>";
				}else{
					header('Location:404.php');
				}
			}
			
		}
		//Hiển thị sản phẩm ra giỏ hàng
		public function get_product_cart(){
			$sId = session_id();
			$query = "SELECT * FROM tbl_cart WHERE sId = '$sId'";
			$result = $this->db->select($query);
			return $result;
		}
		//Cập nhật số lượng sp trong giỏ hàng
		public function update_quantity_cart($quantity, $cartId){
			$quantity = mysqli_real_escape_string($this->db->link, $quantity);
			$cartId = mysqli_real_escape_string($this->db->link, $cartId);
			$query = "UPDATE tbl_cart 
					SET quantity = '$quantity'
					WHERE cartId ='$cartId' ";
			$result = $this->db->UPDATE($query);
			if($result){
				echo "<script> alert('Update thành công !') </script>";
				echo "<script type='text/javascript'>window.location.href = 'cart.php'</script>";
			}else{
				$msg = "<span style='color:red; font-size:20px'> Sửa sản phẩm không thành công! </span>";
				return $msg;
			}
		}
		//Xóa SP ra khỏi giỏ hàng
		public function del_product_cart($cartid){
			$cartid = mysqli_real_escape_string($this->db->link, $cartid);
			$query = "DELETE  FROM tbl_cart WHERE cartid = '$cartid'";
			$result = $this->db->delete($query);
			if($result){
				echo "<script type='text/javascript'>window.location.href = 'cart.php'</script>";
			}else{
				$msg = "<span style='color:red; font-size:20px'> Xóa sản phẩm không thành công! </span>";
				return $msg;
			}
		}
		public function check_cart(){
			$sId = session_id();
			$query = "SELECT * FROM tbl_cart WHERE sId = '$sId'";
			$result = $this->db->select($query);
			return $result;
		}
		public function del_all_cart(){
			$sId = session_id();
			$query = "DELETE FROM tbl_cart WHERE sId = '$sId'";
			$result = $this->db->select($query);
			return $result;
		}
		//Thêm thông tin thanh toán
		public function insertOrder($customer_id, $pay){
			$sId = session_id();
			$pay = mysqli_real_escape_string($this->db->link, $pay);
			$query = "SELECT * FROM tbl_cart WHERE sId = '$sId'";
			$get_product = $this->db->select($query);
			if($get_product){
				while ($result= $get_product->fetch_assoc()) {
					$customer_id = $customer_id;
					$productid = $result['productId'];
					$productName = $result['productName'];
					$quantity = $result['quantity'];
					$price = $result['price'] * $quantity;
					$image = $result['image'];

					$query_order = "INSERT INTO tbl_order(productId, productName, quantity, price, image, customer_id, pay) VALUES('$productid', '$productName', '$quantity', '$price', '$image', '$customer_id', '$pay') ";
					$insert_order = $this->db->insert($query_order);
				}
			}
		}
		//Hien thi tổng tiền hóa đơn của khách hàng
		public function getamount_price($customer_id){
			$query = "SELECT price FROM tbl_order WHERE customer_id='$customer_id' ";
			$get_price = $this->db->select($query);
			return $get_price;
		}
		public function get_cart_ordered($customer_id){
			$query = "SELECT * FROM tbl_order WHERE customer_id='$customer_id' ";
			$get_cart_ordered = $this->db->select($query);
			return $get_cart_ordered;
		}
		//KT ng dùng có đăng nhập và click xem thông tin đã đặt hàng
		public function check_order($customer_id){
			$sId = session_id();
			$query = "SELECT * FROM tbl_order WHERE customer_id = '$customer_id'";
			$result = $this->db->select($query);
			return $result;
		}
		//Hiển thị đơn đặt hàng mới cho admin
		public function get_inbox_cat(){
			$query = "SELECT * FROM tbl_order ORDER BY date_order";
			$get_inbox_cat = $this->db->select($query);
			return $get_inbox_cat;
		}
		//admin xử lý đơn hàng
		public function shiped($id, $time, $price){
			$id = mysqli_real_escape_string($this->db->link, $id);
			$time = mysqli_real_escape_string($this->db->link, $time);
			$price = mysqli_real_escape_string($this->db->link, $price);
			$query = "UPDATE tbl_order 
					SET status = '1'
					WHERE id ='$id' 
					AND price = '$price'
					AND date_order = '$time'";
			$result = $this->db->UPDATE($query);
			if($result){
				echo "<script> alert('Xử lý thành công !') </script>";
			}else{
				$msg = "<span style='color:red; font-size:20px'> Xử lý không thành công! </span>";
				return $msg;
			}
		}
		//Xóa sản phẩm khi đã xử lý đơn hàng
		public function del_shiped($id, $time, $price){
			$id = mysqli_real_escape_string($this->db->link, $id);
			$time = mysqli_real_escape_string($this->db->link, $time);
			$price = mysqli_real_escape_string($this->db->link, $price);
			$query = "DELETE FROM tbl_order 
					WHERE id ='$id' 
					AND price = '$price'
					AND date_order = '$time'";
			$result = $this->db->UPDATE($query);
			if($result){
				echo "<script> alert('Đã xóa đơn hàng !') </script>";
			}else{
				$msg = "<span style='color:red; font-size:20px'> Xóa đơn hàng không thành công! </span>";
				return $msg;
			}
		}
		//Khách hàng hủy đơn đặt hàng
		public function delor($id, $cus_id){
			$delete = "DELETE FROM tbl_order WHERE id ='$id' AND customer_id = '$cus_id'";
			$result = $this->db->UPDATE($delete);
			if($result){
				echo "<script> alert('Đã xóa đơn đặt hàng !') </script>";
			}else{
				echo "<script> alert('Không thành công !') </script>";
			}
		}
		//Khi Khách hàng nhận hàng
		public function cus_shiped($id, $time, $price, $dateOd){
			$id = mysqli_real_escape_string($this->db->link, $id);
			$time = mysqli_real_escape_string($this->db->link, $time);
			$price = mysqli_real_escape_string($this->db->link, $price);
			$dateOd = mysqli_real_escape_string($this->db->link, $dateOd);
			$query = "UPDATE tbl_order 
					SET status = '2', date_ordered = '$dateOd', pay='check'
					WHERE id ='$id' 
					AND price = '$price'
					AND date_order = '$time'";
			$result = $this->db->UPDATE($query);
			if($result){
				echo "<script> alert('Đã giao hàng !') </script>";
			}else{
				$msg = "<span style='color:red; font-size:20px'> Giao hàng không thành công! </span>";
				return $msg;
			}
		}
		//Thong Ke SP Ban Trong Ngay
		public function show_product_ordered($date_or){
			$dateOd = $this->fm->validation($date_or);
			$query = "SELECT o.*, p.* 
				FROM tbl_order AS o, tbl_product AS p 
				WHERE o.productId = p.productId AND
					o.status =2 AND
					o.date_ordered = '$dateOd' ";
			$get_ordered = $this->db->select($query);
			return $get_ordered;
			
		}
	}
?>