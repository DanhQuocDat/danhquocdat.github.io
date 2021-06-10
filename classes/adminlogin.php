<?php
	$filepath = realpath(dirname(__FILE__));
	include ($filepath.'/../lib/session.php');
	Session::checkLogin();
	include_once($filepath.'/../lib/database.php');
	include_once($filepath.'/../helper/format.php');
?>

<?php
	/**
	 * 
	 */
	class adminlogin
	{ 
		private $db;
		private $fm;
		function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}
		public function login_admin($adminUser, $adminPass){
			$adminUser = $this->fm->validation($adminUser);
			$adminPass = $this->fm->validation($adminPass);

			$adminUser = mysqli_real_escape_string($this->db->link, $adminUser);
			$adminPass = mysqli_real_escape_string($this->db->link, $adminPass);

			if(empty($adminUser) || empty($adminPass)){
				$alert = "Vui lòng không bỏ trống!";
				return $alert;
			}else{
				$query = "SELECT * FROM tbl_admin WHERE adminUser = '$adminUser' AND adminPass = '$adminPass' LIMIT 1";
				$result = $this->db->select($query);

				if($result != false){
					$value = $result->fetch_assoc();
					Session::set('adminlogin', true);
					Session::set('adminId', $value['adminId']);
					Session::set('adminUser', $value['adminUser']);
					Session::set('adminName', $value['adminName']);
					Session::set('adminPass', $value['adminPass']);
					header('Location:index.php');
				}else{
					$alert = "Tài khoản hoặc mật khẩu không chính xác!";
					return $alert;
				}
			}
		}

	}
?>