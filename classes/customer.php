<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helper/format.php');
?>
<?php

	ob_start();
	class customer
	{
		private $db;
		private $fm;
		function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}
		//Thêm tài khoản khách hàng vào CSDL
		public function insert_customer($data){
			$name = mysqli_real_escape_string($this->db->link, $data['name']);
			$city = mysqli_real_escape_string($this->db->link, $data['city']);
			$gender = mysqli_real_escape_string($this->db->link, $data['gender']);
			$email = mysqli_real_escape_string($this->db->link, $data['email']);
			$address = mysqli_real_escape_string($this->db->link, $data['address']);
			$phone = mysqli_real_escape_string($this->db->link, $data['phone']);
			$country = mysqli_real_escape_string($this->db->link, $data['country']);
			$password = mysqli_real_escape_string($this->db->link, md5($data['password']));
			if($name=="" || $city=="" || $gender=="" || $email=="" || $address=="" || $phone=="" || $password=="" || $country=""){
				$alert = "<span class='error'>Vui lòng không bỏ trống! </span>";
				return $alert;
			}else{
				$check_email = "SELECT * FROM tbl_customer WHERE email='$email' AND type='Store' LIMIT 1" ;
				$result_check = $this->db->select($check_email);
				if($result_check){
					$alert = "<span class='error'>Email đã tồn tại! </span>";
					return $alert;
				}else{
					$query = "INSERT INTO tbl_customer(name, city, gender, email, address, phone, password, country, type) VALUES('$name', '$city', '$gender', '$email', '$address', '$phone', '$password', 'Việt Nam','Store') ";
					$result = $this->db->insert($query);
					if($result){
						$alert = "<span class='success'>Đăng Ký Thành Công </span>";
						return $alert;
					}else{
						$alert = "<span class='error'>Đăng Ký Thành Công </span>";
						return $alert;
					}
				}
			}
		}
		//Khách hàng đăng nhập 
		public function login_customer($data){
			$email = mysqli_real_escape_string($this->db->link, $data['email']);
			$password = mysqli_real_escape_string($this->db->link, md5($data['password']));
			if($email=='' || $password==''){
				$alert = "<span class='error'>Vui lòng không bỏ trống! </span>";
				return $alert;
			}else{
				$check_login = "SELECT * FROM tbl_customer WHERE email='$email' AND password='$password' " ;
				$result_check = $this->db->select($check_login);
				if($result_check){
					$value = $result_check->fetch_assoc();
					Session::set('customer_login', true);
					Session::set('customer_id', $value['id']);
					Session::set('customer_name', $value['name']);
					header('Location:order.php');
				}else{
					$alert = "<span class='error'>Email hoặc Mật khẩu không chính xác! </span>";
					return $alert;
					}
				}
		}
		//Kiểm tra thông tin khách hàng đủ chưa?
		public function checkinf($id, $typeC){
			$checkInf = "SELECT * FROM tbl_customer WHERE id='$id'";
			$result_checkInf = $this->db->select($checkInf);
			if($result_checkInf){
				$value = $result_checkInf->fetch_assoc();
				$add=$value['address'];
				$city=$value['city'];
				$phone=$value['phone'];
				if($add=='' || $city=='' || $phone==''){
					echo 	'<div class="w_check">
								<p>Vui lòng cập nhật lại đầy đủ thông tin!</p>
							</div>';
				}else{
					if($typeC==1){
						header('Location:../offpayment.php');
					}else{
						header('Location:../onlpayment.php');
					}
				}
			}
		}
		//Lấy thông tin khách hàng
		public function show_customer($id){
			$query = "SELECT * FROM tbl_customer WHERE id='$id' " ;
			$result = $this->db->select($query);
			return $result;
		}
		//Chỉnh sửa thông tin khách hàng
		public function update_costomer($data, $id){
			$name = mysqli_real_escape_string($this->db->link, $data['name']);
			$city = mysqli_real_escape_string($this->db->link, $data['city']);
			$gender = mysqli_real_escape_string($this->db->link, $data['gender']);
			$email = mysqli_real_escape_string($this->db->link, $data['email']);
			$address = mysqli_real_escape_string($this->db->link, $data['address']);
			$phone = mysqli_real_escape_string($this->db->link, $data['phone']);
			if($name=="" || $city=="" || $gender=="" || $email=="" || $address=="" || $phone=="" ){
				$alert = "<span class='error'>Vui lòng không bỏ trống! </span>";
				return $alert;
			}else{
				$query = "UPDATE tbl_customer SET name='$name', city='$city', gender='$gender', email='$email', address='$address', phone='$phone' WHERE id='$id'";
					$result = $this->db->insert($query);
					if($result){
						$alert = "<span class='success'>Chỉnh Sửa Thành Công </span>";
						return $alert;
					}else{
						$alert = "<span class='error'>Chỉnh Sửa Không Thành Công </span>";
						return $alert;
					}
			}
		}
		// Khách hàng thêm bình luận
		public function insert_comment(){
			$product_id = $_POST['id_cmt'];
			$rate = $_POST['vote'];
			$email = $_POST['nameOfcmt'];
			$comment = $_POST['cmt'];
			$datecmt = $_POST['date'];
			if($rate== null){
				$alert = "Vui lòng đánh giá";
				return $alert;
			}else{
				$check_login = "SELECT * FROM tbl_customer WHERE email='$email' " ;
				$result_check = $this->db->select($check_login);
				if($result_check){
					while ($resultname= $result_check->fetch_assoc()) {
						$name = $resultname['name'];
						$query = "INSERT INTO tbl_comment(name, email, cmt, product_id, vote, datecmt) VALUES('$name', '$email', '$comment', '$product_id', '$rate', '$datecmt') ";
						$result = $this->db->insert($query);	
						if($result){
							echo "<script> alert('Cảm ơn bạn đã đóng góp ý kiến!') </script>";
							echo "<meta http-equiv='refresh' content='0;URL=details.php?proid=$product_id'>";
						}else{
							echo "<script> alert('Đóng góp ý kiến không thành công!') </script>";
							echo "<meta http-equiv='refresh' content='0;URL=details.php?proid=$product_id'>";
						}
					}
				}else{
					echo "<script> alert('Email không chính xác!') </script>";
					echo "<meta http-equiv='refresh' content='0;URL=details.php?proid=$product_id'>";
				}
			}
		}
		//Hiển thị các bình luận ở trang admin
		public function get_comment(){
			$query = "SELECT c.*, p.productName
			FROM  tbl_product as p, tbl_comment as c
			WHERE p.productId = c.product_id			
			ORDER BY c.status ASC";

			$result = $this->db->SELECT($query);
			return $result;
		}
		//Admin Trả lời bình luận
		public function rep_comment($r_id){
			$rep_cmt = $_POST['rep_cmt'];
			echo $rep_cmt;
			$query = "UPDATE tbl_comment SET rep_cmt='$rep_cmt', status='1' WHERE cmt_id ='$r_id' ";
			$result = $this->db->UPDATE($query);	
			if($result){
				echo "<script> alert('Trả lời bình luận thành công!') </script>";
				echo "<meta http-equiv='refresh' content='0;URL=vote.php'>";
			}else{
				echo "<script> alert('Trả lời không thành công!') </script>";
				echo "<meta http-equiv='refresh' content='0;URL=vote.php'>";
			}
		}
		//Admin Xóa Bình Luận
		public function del_comment($id){
			$query = "DELETE FROM tbl_comment WHERE cmt_id='$id' ";
			$result = $this->db->DELETE($query);
			return $result;
		}
	}
?>