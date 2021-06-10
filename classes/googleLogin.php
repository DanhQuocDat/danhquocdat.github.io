<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/database.php');
    include_once ($filepath.'/../helper/format.php');
?>

<?php
    /**
     * 
     */
    class googleLogin
    { 
        private $db;
        private $fm;
        function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }
        //Hàm login sau khi mạng xã hội trả dữ liệu về
        function loginFromSocialCallBack($socialUser) {
            $result = "SELECT * FROM tbl_customer WHERE email = '".$socialUser['email']."' ";
            $result_check = $this->db->select($result);
            if($result_check){
                '';
            }else{
                $query = "INSERT INTO tbl_customer(name, city, gender, email, address, phone, password, country, type) VALUES('".$socialUser['name']."', '', '".$socialUser['gender']."', '".$socialUser['email']."', '', '', '', 'Việt Nam', 'Google') ";
                $result_gg = $this->db->insert($query);
            }
            $check_login = "SELECT * FROM tbl_customer WHERE type='Google' AND email = '".$socialUser['email']."'";
            $gg_check = $this->db->select($check_login);
            if($gg_check){
                $value = $gg_check->fetch_assoc();
                Session::set('customer_login', true);
                Session::set('customer_id', $value['id']);
                Session::set('customer_name', $value['name']);
            }
        }
        function validateDateTime($date) {
            //Kiểm tra định dạng ngày tháng xem đúng DD/MM/YYYY hay chưa?
            preg_match('/^[0-9]{1,2}-[0-9]{1,2}-[0-9]{4}$/', $date, $matches);
            if (count($matches) == 0) { //Nếu ngày tháng nhập không đúng định dạng thì $match = array(); (rỗng)
                return false;
            }
            $separateDate = explode('-', $date);
            $day = (int) $separateDate[0];
            $month = (int) $separateDate[1];
            $year = (int) $separateDate[2];
            //Nếu là tháng 2
            if ($month == 2) {
                if ($year % 4 == 0) { //Nếu là năm nhuận
                    if ($day > 29) {
                        return false;
                    }
                } else { //Không phải năm nhuận
                    if ($day > 28) {
                        return false;
                    }
                }
            }
            //Check các tháng khác
            switch ($month) {
                case 1:
                case 3:
                case 5:
                case 7:
                case 8:
                case 10:
                case 12:
                    if ($day > 31) {
                        return false;
                    }
                    break;
                case 4:
                case 6:
                case 9:
                case 11:
                    if ($day > 30) {
                        return false;
                    }
                    break;
            }
            return true;
        }

    }
?>