<?php
    include 'lib/session.php';
    Session::init();
?>
<?php
	include 'lib/database.php';
	include 'helper/format.php'; 
	include 'google_source.php';
	
	spl_autoload_register(function($class){
		include_once "classes/".$class.".php";
	});

	$db = new Database();
	$fm = new Format();
	$ct = new cart();
	$us = new user();
	$cat = new category();
	$product = new product();
	$cs = new customer();
	$paypal = new PaypalExpress;
?>
<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>

<!DOCTYPE HTML>
<head>
<title>Đồng Hồ Đeo Tay Chính Hãng</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/menu.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/vote.css" rel="stylesheet" type="text/css" media="all"/>
<script src="js/jquerymain.js"></script>
<script src="js/script.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script> 
<script type="text/javascript" src="js/nav.js"></script>
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script> 
<script type="text/javascript" src="js/nav-hover.js"></script>
<script type="text/javascript" src="js/vote.js"></script>
<link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>

<script type="text/javascript">
  $(document).ready(function($){
    $('#dc_mega-menu-orange').dcMegaMenu({rowItems:'4',speed:'fast',effect:'fade'});
  });
</script>
</head>
<body>
  <div class="wrap">
		<div class="header_top">
			<div class="logo">
				<a href="index.php"><img src="images/logo.png" alt="" /></a>
			</div>
			  <div class="header_top_right">
			    <div class="search_box">
				    <form action="search.php" method="post">
				    	<input type="text" name="tukhoa" placeholder="Tìm kiếm sản phẩm" >
				    	<input type="submit" name="search_product" value="Tìm Kiếm">
				    </form>
			    </div>
			    <div class="shopping_cart">
					<div class="cart">
						<a href="cart.php" title="View my shopping cart" rel="nofollow">
								<span class="cart_title">Giỏ hàng</span>
								<span class="no_product">
									<?php
										$check_cart = $ct->check_cart();
										if($check_cart){
											//$sum = Session::get("sum");
											$qty = Session::get("qty");
											echo /*$sum.' '.'đ'.' - '.*/$qty.' '.'SP';
										}else{
											echo 'Trống';
										}	
									?>	
								</span>
							</a>
						</div>
			      </div>
			<?php
				if(isset($_GET['customerid'])){
					$customerid = $_GET['customerid'];
					$delCart = $ct->del_all_cart();
					$delCompare = $product->del_compare($customerid);
					Session::destroy();
				}
			?>
		   <div class="login">
		   	<?php 
		   		$login_check = Session::get('customer_login');
		   		if($login_check==false){
		   			echo '<a href="login.php">Đăng nhập</a></div>';
		   		}else{
		   			echo '<a href="?customerid='.Session::get('customer_id').'"> Đăng xuất</a></div>'; 
		   		}
		   	?>
		 <div class="clear"></div>
	</div>
	 <div class="clear"></div>
 </div>
 <table class="menu1">
	<tr>
		<th class="TH"> 
			<a href="allproduct.php" id="mn">THƯƠNG HIỆU</a>
			<center><div class="th_brand"><div class="thbrand">
				<ul>
					<li><a title="Các Hãng Bán Chạy" href="productbycat.php?catid=<?php echo $result_allcat['catId'] ?>" class="item-link">CÁC HÃNG BÁN CHẠY</a>
					<div class="nav-sublist">
						<ul>
							<li><a title="Saga" href="dongho.php?name=saga" class="item-link" >Saga</a></li>
							<li><a title="Đồng hồ Balê-Fouetté" href="dongho.php?name=Fouetté" class="item-link" >Fouetté</a></li>
							<li><a title="Casio" href="dongho.php?name=Casio" class="item-link" >Casio</a></li>
							<li><a title="Citizen" href="dongho.php?name=Citizen" class="item-link" >Citizen</a></li>
							<li><a title="Seiko" href="dongho.php?name=Seiko" class="item-link" >Seiko</a></li>
							<li><a title="Olym Pianus-Olympia Start" href="dongho.php?name=OP" class="item-link" >OP</a></li>
							<li><a title="Daniel Wellington (DW)" href="dongho.php?name=Daniel Wellington (DW)" class="item-link" >Daniel Wellington (DW)</a></li>
						</ul>
					</div>
					</li>
					<li><a title="Khuyên Dùng" href="#" class="item-link">KHUYÊN DÙNG</a>
					<div class="nav-sublist">
						<ul>
							<li><a title="Orient" href="dongho.php?name=Orient" class="item-link" >Orient</a></li>
							<li><a title="G-Shock & Baby-G" href="dongho.php?name=G-Shock Baby-G" class="item-link" >G-Shock & Baby-G</a></li>
							<li><a title="Fossil" href="dongho.php?name=Fossil" class="item-link" >Fossil</a></li>
							<li><a title="Skagen" href="dongho.php?name=Skagen" class="item-link" >Skagen</a></li>
							<li><a title="Candino" href="dongho.php?name=Candino" class="item-link" >Candino</a></li>
							<li><a title="Michael Kors" href="dongho.php?name=Michael Kors" class="item-link" >Michael Kors</a></li>
							<li><a title="Adriatica" href="dongho.php?name=Adriatica" class="item-link" >Adriatica</a></li>
						</ul>
					</div>
					</li>
					<li><a title="Swiss Made" href="#" class="item-link">SWISS MADE (THỤY SỸ)</a>
					<div class="nav-sublist">
						<ul>
							<li><a title="Longines" href="dongho.php?name=Longines" class="item-link" >Longines</a></li>
							<li><a title="Đồng Hồ Doxa" href="dongho.php?name=Doxa" class="item-link" >Doxa</a></li>
							<li><a title="Tissot" href="dongho.php?name=Tissot" class="item-link" >Tissot</a></li>
							<li><a title="Đồng Hồ Rado" href="dongho.php?name=Rado" class="item-link" >Rado</a></li>
							<li><a title="Đồng Hồ Movado" href="dongho.php?name=Movado" class="item-link" >Movado</a></li>
						</ul>
					</div>
					</li>
					<li><a title="Các Dòng Đặc Biệt" href="#" class="item-link">CÁC DÒNG ĐẶC BIỆT</a>
					<div class="nav-sublist">
						<ul>
							<li><a title="Smartwatch" href="allprotm.php" class="item-link" >Đồng Hồ Thông Minh</a></li>
						</ul>
					</div>
					</li>
				</ul>
			</div>
			</div></center>
		</th>
		<th class="dropdown-nam">
			<a href="allprotl.php?type=1 &n=Nam" id="mn">NAM</a>
			<center><div class="th_brand"><div class="thbrand">
				<ul>
					<li><a title="Khoảng Giá" href="#" class="item-link">KHOẢNG GIÁ</a>
					<div class="nav-sublist">
						<ul>
							<li><a title="Dưới 2tr" href="allprotg.php?p1=0 &p2=2000000 &t=1" class="item-link" >Dưới 2tr</a></li>
							<li><a title="2tr-3tr" href="allprotg.php?p1=2000000 &p2=3000000 &t=1" class="item-link" >2tr-3tr</a></li>
							<li><a title="3tr-4tr" href="allprotg.php?p1=3000000 &p2=4000000 &t=1" class="item-link" >3tr-4tr</a></li>
							<li><a title="4tr-5tr" href="allprotg.php?p1=4000000 &p2=5000000 &t=1" class="item-link" >4tr-5tr</a></li>
							<li><a title="Trên 5tr" href="allprotg.php?p1=5000000 &p2=999999999 &t=1" class="item-link" >Trên 5tr</a></li>
						</ul>
					</div>
					</li>
					<li><a title="Chất Liệu Dây" href="#" class="item-link">CHẤT LIỆU DÂY</a>
					<div class="nav-sublist">
						<ul>
							<li><a title="Dây Kim Loại" href="material.php?style=0 &type=1 &nm=Nam" class="item-link" >Dây Kim Loại</a></li>
							<li><a title="Dây Da" href="material.php?style=1 &type=1 &nm=Nam" class="item-link" >Dây Da</a></li>
							<li><a title="Dây Nhựa / Cao Su" href="material.php?style=2 &type=1 &nm=Nam" class="item-link" >Dây Nhựa / Cao Su</a></li>
							<li><a title="Dây Vải" href="material.php?style=3 &type=1 &nm=Nam" class="item-link" >Dây Vải</a></li>
						</ul>
					</div>
					</li>
					<li><a title="Thương Hiệu Hot" href="#" class="item-link">THƯƠNG HIỆU HOT</a>
					<div class="nav-sublist">
						<ul>
							<li><a title="Citizen" href="donghotl.php?name=Citizen &type=1" class="item-link" >Citizen</a></li>
							<li><a title="Casio" href="donghotl.php?name=Casio &type=1" class="item-link" >Casio</a></li>
							<li><a title="Olym Pianus-Olympia Start" href="donghotl.php?name=OP &type=1" class="item-link" >OP</a></li>
							<li><a title="Đồng Hồ Doxa" href="donghotl.php?name=Doxa &type=1" class="item-link" >Doxa</a></li>
							<li><a title="Đồng Hồ Tissot" href="donghotl.php?name=Tissot &type=1" class="item-link" >Tissot</a></li>
						</ul>
					</div>
					</li>
					<li><a title="Swiss Made" href="#" class="item-link">SWISS MADE (THỤY SỸ)</a>
					<div class="nav-sublist">
						<ul>
							<li><a title="Longines" href="donghotl.php?name=Longines &type=1" class="item-link" >Longines</a></li>
							<li><a title="Đồng Hồ Doxa" href="donghotl.php?name=Doxa &type=1" class="item-link" >Doxa</a></li>
							<li><a title="Tissot" href="donghotl.php?name=Tissot &type=1" class="item-link" >Tissot</a></li>
							<li><a title="Đồng Hồ Rado" href="donghotl.php?name=Rado &type=1" class="item-link" >Rado</a></li>
							<li><a title="Đồng Hồ Movado" href="donghotl.php?name=Movado &type=1" class="item-link" >Movado</a></li>
						</ul>
					</div>
					</li>
					<li><a title="Các Dòng Đặc Biệt" href="#" class="item-link">CÁC DÒNG ĐẶC BIỆT</a>
					<div class="nav-sublist">
						<ul>
							<li><a title="Smartwatch" href="allprotm.php" class="item-link" >Đồng Hồ Thông Minh</a></li>
						</ul>
					</div>
					</li>
				</ul>
			</div>
			</div></center>
		</th>
		<th class="dropdown-nu"> 
			<a href="allprotl.php?type=2 &n=Nữ" id="mn">NỮ</a>
			<center><div class="th_brand"><div class="thbrand">
				<ul>
					<li><a title="Khoảng Giá" href="#" class="item-link">KHOẢNG GIÁ</a>
					<div class="nav-sublist">
						<ul>
							<li><a title="Dưới 2tr" href="allprotg.php?p1=0 &p2=2000000 &t=2" class="item-link" >Dưới 2tr</a></li>
							<li><a title="2tr-3tr" href="allprotg.php?p1=2000000 &p2=3000000 &t=2" class="item-link" >2tr-3tr</a></li>
							<li><a title="3tr-4tr" href="allprotg.php?p1=3000000 &p2=4000000 &t=2" class="item-link" >3tr-4tr</a></li>
							<li><a title="4tr-5tr" href="allprotg.php?p1=4000000 &p2=5000000 &t=2" class="item-link" >4tr-5tr</a></li>
							<li><a title="Trên 5tr" href="allprotg.php?p1=5000000 &p2=999999999 &t=2" class="item-link" >Trên 5tr</a></li>
						</ul>
					</div>
					</li>
					<li><a title="Chất Liệu Dây" href="#" class="item-link">CHẤT LIỆU DÂY</a>
					<div class="nav-sublist">
						<ul>
							<li><a title="Dây Kim Loại" href="material.php?style=0 &type=2 &nm=Nữ" class="item-link" >Dây Kim Loại</a></li>
							<li><a title="Dây Da" href="material.php?style=1 &type=2 &nm=Nữ" class="item-link" >Dây Da</a></li>
							<li><a title="Dây Nhựa / Cao Su" href="material.php?style=2 &type=2 &nm=Nữ" class="item-link" >Dây Nhựa / Cao Su</a></li>
							<li><a title="Dây Vải" href="material.php?style=3 &type=2 &nm=Nữ" class="item-link" >Dây Vải</a></li>
						</ul>
					</div>
					</li>
					<li><a title="Thương Hiệu Hot" href="#" class="item-link">THƯƠNG HIỆU HOT</a>
					<div class="nav-sublist">
						<ul>
							<li><a title="Saga" href="donghotl.php?name=Saga &type=2" class="item-link" >Saga</a></li>
							<li><a title="Casio" href="donghotl.php?name=Casio &type=2" class="item-link" >Casio</a></li>
							<li><a title="Fouetté" href="donghotl.php?name=Fouetté &type=2" class="item-link" >Fouetté</a></li>
							<li><a title="Đồng Hồ Doxa" href="donghotl.php?name=Doxa &type=2" class="item-link" >Doxa</a></li>
							<li><a title="Đồng Hồ Citizen" href="donghotl.php?name=Citizen &type=2" class="item-link" >Citizen</a></li>
						</ul>
					</div>
					</li>
					<li>
						<a title="Xem Tất Cả Đồng Hồ Nữ" href="allprotl.php?type=2 &n=Nữ" class="a_img">
							<i class="fa"></i>
							<span class="menu-item-descr"></span>
							<div class="dropdown-img">
								<img src="https://donghohaitrieu.com/wp-content/uploads/2014/05/Dong-Ho-Nu-1.png" width="463" height="167" class="lazyloaded" data-ll-status="loaded">
								<noscript><img src="https://donghohaitrieu.com/wp-content/uploads/2014/05/Dong-Ho-Nu-1.png" width="700" height="167" /></noscript>
							</div>
						</a>
					</li>
				</ul>
			</div>
			</div></center>
		</th>
		<th class="dropdown-cd"> 
			<a href="allprotl.php?type=0 &n=Đôi"id="mn">CẶP ĐÔI </a>
			<center><div class="th_brand"><div class="thbrand">
				<ul>
					<li><a title="Khoảng Giá" href="#" class="item-link">KHOẢNG GIÁ</a>
					<div class="nav-sublist">
						<ul>
							<li><a title="Dưới 2tr" href="allprotg.php?p1=0 &p2=2000000 &t=0" class="item-link" >Dưới 2tr</a></li>
							<li><a title="2tr-3tr" href="allprotg.php?p1=2000000 &p2=3000000 &t=0" class="item-link" >2tr-3tr</a></li>
							<li><a title="3tr-4tr" href="allprotg.php?p1=3000000 &p2=4000000 &t=0" class="item-link" >3tr-4tr</a></li>
							<li><a title="4tr-5tr" href="allprotg.php?p1=4000000 &p2=5000000 &t=0" class="item-link" >4tr-5tr</a></li>
							<li><a title="Trên 5tr" href="allprotg.php?p1=5000000 &p2=999999999 &t=0" class="item-link" >Trên 5tr</a></li>
						</ul>
					</div>
					</li>
					<li><a title="Chất Liệu Dây" href="#" class="item-link">CHẤT LIỆU DÂY</a>
					<div class="nav-sublist">
						<ul>
							<li><a title="Dây Kim Loại" href="material.php?style=0 &type=0 &nm=Đôi" class="item-link" >Dây Kim Loại</a></li>
							<li><a title="Dây Da" href="material.php?style=1 &type=0 &nm=Đôi" class="item-link" >Dây Da</a></li>
							<li><a title="Dây Nhựa / Cao Su" href="#" class="item-link" >Dây Nhựa / Cao Su</a></li>
							<li><a title="Dây Vải" href="#" class="item-link" >Dây Vải</a></li>
						</ul>
					</div>
					</li>
					<li><a title="Thương Hiệu Hot" href="#" class="item-link">THƯƠNG HIỆU HOT</a>
					<div class="nav-sublist">
						<ul>
							<li><a title="Casio" href="donghotl.php?name=Casio &type=0" class="item-link" >Casio</a></li>
							<li><a title="Citizen" href="donghotl.php?name=Citizen &type=0" class="item-link" >Citizen</a></li>
							<li><a title="Seiko" href="donghotl.php?name=Seiko &type=0" class="item-link" >Seiko</a></li>
							<li><a title="G-Shock & Baby-G" href="#" class="item-link" >G-Shock & Baby-G</a></li>
							<li><a title="Skagen" href="#" class="item-link" >Skagen</a></li>
						</ul>
					</div>
					</li>
					<li>
						<a title="Xem Tất Cả Đồng Hồ Đôi" href="allprotl.php?type=0 &n=Đôi" class="a_img">
							<i class="fa"></i>
							<span class="menu-item-descr"></span>
							<div class="dropdown-img">
								<img src="https://donghohaitrieu.com/wp-content/uploads/2015/02/dong-ho-doi-menu.png" width="463" height="167" class="lazyloaded" data-ll-status="loaded">
								<noscript><img src="https://donghohaitrieu.com/wp-content/uploads/2015/02/dong-ho-doi-menu.png" width="463" height="167" /></noscript>
							</div>
						</a>
					</li>
				</ul>
			</div>
			</div></center>
		</th>
		<?php 
	  		$login_check1 = Session::get('customer_login');
	  		$id = Session::get('customer_id');
    		if($login_check1==false){
    			echo '<th class="dropdown-LH"> 
						<a title="So Sánh Sản Phẩm" href="login.php" id="mn">THÔNG TIN KH </a>
					 </th>';
    		}else{
    			echo '<th class="dropdown-LH"> 
						<a title="Thông Tin Khách Hàng" href="profile.php" id="mn">THÔNG TIN KH </a>
					 </th>';
    		}
    	?>
		<?php 
	  		$login_check = Session::get('customer_login');
    		if($login_check==false){
    			echo '<th class="dropdown-LH"> 
						<a title="So Sánh Sản Phẩm" href="login.php" id="mn">SO SÁNH </a>
					 </th>';
    		}else{
    			echo '<th class="dropdown-LH"> 
						<a title="So Sánh Sản Phẩm" href="compare.php" id="mn">SO SÁNH </a>
					 </th>';
    		}
    	?>
		<th class="dropdown-LH"> 
			<a title="LIÊN HỆ" href="contact.php"id="mn">LIÊN HỆ </a>
		</th>
	</tr>
</table>