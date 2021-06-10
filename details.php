
<?php 
	include 'inc/header.php';
	// include 'inc/slider.php'
?>
<?php 
	$mytime = getdate(date("U"));
	$date = "$mytime[weekday], $mytime[month] $mytime[mday], $mytime[year]";

	$id=$_GET['proid'];
	$check_vote = "SELECT count(vote) AS num FROM tbl_comment WHERE product_id = '$id' " ;
	$sql = $db->select($check_vote);
	$datR = $sql->fetch_array();
	$num = $datR['num'];
	// $num= $sql->num_rows;
	$check_vote = "SELECT SUM(vote) AS total FROM tbl_comment WHERE product_id = '$id' " ;
	$sql = $db->select($check_vote);
	$data = $sql->fetch_array();
	$total = $data['total'];

	$avg= '';
	if($num!=0){
		if(is_nan(round(($total / $num) ,1))){
			$avg = 0;
		}else{
			$avg = round(($total / $num), 1) ;
		}
	}
	else{
		$avg = 0;
	}

?>
<?php
	$pd = new product();
    if(!isset($_GET['proid']) || $_GET['proid'] == NULL){
        // echo "<script> window.location ='404.php' </script>";
    }else{
        $id=$_GET['proid'];
    }
    //Khi nhan vao So Sánh
	$customer_id = Session::get('customer_id');
    if ($_SERVER['REQUEST_METHOD'] === 'POST'  && isset($_POST['compare'])) {
    	$productid = $_POST['productid'];
        $insertCompare = $product->insertCompare($productid, $customer_id);
    }
    //Khi nhan vao Mua Ngay
    if ($_SERVER['REQUEST_METHOD'] === 'POST'  && isset($_POST['submit'])) {
    	$quantity = $_POST['quantity'];
        $AddtoCart = $ct->add_to_cart($quantity, $id);
    }
    //Khi nhấn vào Bình Luận
    if(isset($_POST['rpbtn'])){
    	$insertcomment = $cs->insert_comment();
    } 
?>
 <div class="main">
    <div class="content">
    	<div class="section group">
    		<?php 
    			$get_product_details = $product->get_details($id);
    			if($get_product_details){
    				while ($result_details = $get_product_details->fetch_assoc()) {
 
    		?>
			<div class="cont-desc span_1_of_2">				
				<div class="grid images_3_of_2">
					<img src="admin/uploads/<?php echo $result_details['image'] ?>" alt="" />
				</div>
				<div class="desc span_3_of_2">
					<h2><?php echo $result_details['productName'] ?> </h2> <br>
					<div class="pdt-rate">
						<div class="pro-rating">
							<div class="clearfix rating mart8">
								<div class="rating-stars">
									<div class="grey-stars"></div>
									<div class="filled-stars" style="width: <?php echo $avg*20; ?>%"></div>
								</div>
							</div>
						</div>
					</div> 
					<br>
					<br>
					<p><?php echo $result_details['pro_desc'] ?></p>					
					<div class="price">
						<p>Giá: <span><?php echo $fm->format_currency($result_details['price'])." "."đ" ?></span></p>
						<p>Danh Mục: <span><?php echo $result_details['catName'] ?></span></p>
						<p>Thương Hiệu: <span><?php echo $result_details['brandName'] ?></span></p>
					</div>
					<div class="add-cart">
						<form action="" method="post">
							<input type="number" class="buyfield" name="quantity" value="1" min="1"/>
							<input type="submit" class="buysubmit" name="submit" value="Mua ngay"/> 
						</form>
						<?php 
							if(isset($AddtoCart)){
								echo '<span style="color:red; font_size: 20px;">Sản phẩm đã được thêm, vui lòng vào giỏ hàng để thay đổi!</span>';
							}
						?>				
					</div>
					<div class="add-cart">
						<form action="" method="post">
							<input type="hidden"  name="productid" value="<?php echo $result_details['productId'] ?>"/>
							
							<?php 
						  		$login_check = Session::get('customer_login');
					    		if($login_check){
					        		echo '<input type="submit" class="buysubmit" name="compare" value="So Sánh"/>';
					    		}else{
					    			echo '';
					    		}
					    	?>
							<?php
								if(isset($insertCompare)){
									echo $insertCompare;
								}
							?>
						</form>			
					</div>

				</div>
				<div class="product-desc">
					<h2>Mô Tả Sản Phẩm</h2>
					<p><?php echo $result_details['pro_details'] ?></p>
		    	</div>

		    	<div class="product-desc">
					<h2>Đánh Giá & Bình luận:</h2> 
					<div class="container">
						<div class="rating-review">
							<div class="tri table-flex">
								<table>
									<tbody>
										<tr>
											<td>
												<div class="rnb rvl"> 
													<h3><?php echo $avg; ?>/5.0</h3>
												</div>
												<div class="pdt-rate">
													<div class="pro-rating">
														<div class="clearfix rating mart8">
															<div class="rating-stars">
																<div class="grey-stars"></div>
																<div class="filled-stars" style="width: <?php echo $avg*20; ?>%"></div>
															</div>
														</div>
													</div>
												</div>
												<div class="rnrn">
													<p class="rars"><?php if($num==0){echo "NO";}else{echo $num;} ?> Reveiws</p>
												</div>
											</td>
											<td>
												<div class="rpd">
													<?php 
														$id=$_GET['proid'];
														$check_v5 = "SELECT count(vote) AS num_v5 FROM tbl_comment 
															WHERE product_id = '$id'
															AND vote='5' " ;
														$sql_v5 = $db->select($check_v5);
														$datV5 = $sql_v5->fetch_array();
														$num_v5 = $datV5['num_v5'];
													?>
													<div class="rnpd">
														<label>5 <i class="fa fa-star" style="cursor: pointer; font-size: 20px;">&#9733</i></label>
														<div class="ropd">
															<div class="ripd" style="width:<?php echo $num_v5*10; ?>%"></div>
														</div>
														<div class="label">(<?php echo $num_v5; ?>)</div>
													</div>
													<?php 
														$id=$_GET['proid'];
														$check_v4 = "SELECT count(vote) AS num_v4 FROM tbl_comment 
															WHERE product_id = '$id'
															AND vote='4' " ;
														$sql_v4 = $db->select($check_v4);
														$datV4 = $sql_v4->fetch_array();
														$num_v4 = $datV4['num_v4'];
													?>
													<div class="rnpd">
														<label>4 <i class="fa fa-star" style="cursor: pointer; font-size: 20px;">&#9733</i></label>
														<div class="ropd">
															<div class="ripd" style="width:<?php echo $num_v4*10; ?>%"></div>
														</div>
														<div class="label">(<?php echo $num_v4; ?>)</div>
													</div>
													<?php 
														$id=$_GET['proid'];
														$check_v3 = "SELECT count(vote) AS num_v3 FROM tbl_comment 
															WHERE product_id = '$id'
															AND vote='3' " ;
														$sql_v3 = $db->select($check_v3);
														$datV3 = $sql_v3->fetch_array();
														$num_v3 = $datV3['num_v3'];
													?>
													<div class="rnpd">
														<label>3 <i class="fa fa-star" style="cursor: pointer; font-size: 20px;">&#9733</i></label>
														<div class="ropd">
															<div class="ripd" style="width:<?php echo $num_v3*10; ?>%"></div>
														</div>
														<div class="label">(<?php echo $num_v3; ?>)</div>
													</div>
													<?php 
														$id=$_GET['proid'];
														$check_v2 = "SELECT count(vote) AS num_v2 FROM tbl_comment 
															WHERE product_id = '$id'
															AND vote='2' " ;
														$sql_v2 = $db->select($check_v2);
														$datV2 = $sql_v2->fetch_array();
														$num_v2 = $datV2['num_v2'];
													?>
													<div class="rnpd">
														<label>2 <i class="fa fa-star" style="cursor: pointer; font-size: 20px;">&#9733</i></label>
														<div class="ropd">
															<div class="ripd" style="width:<?php echo $num_v2*10; ?>%"></div>
														</div>
														<div class="label">(<?php echo $num_v2; ?>)</div>
													</div>
													<?php 
														$id=$_GET['proid'];
														$check_v1 = "SELECT count(vote) AS num_v1 FROM tbl_comment 
															WHERE product_id = '$id'
															AND vote='1' " ;
														$sql_v1 = $db->select($check_v1);
														$datV1 = $sql_v1->fetch_array();
														$num_v1 = $datV1['num_v1'];
													?>
													<div class="rnpd">
														<label>1 <i class="fa fa-star" style="cursor: pointer; font-size: 20px;">&#9733</i></label>
														<div class="ropd">
															<div class="ripd" style="width:<?php echo $num_v1*10; ?>%"></div>
														</div>
														<div class="label">(<?php echo $num_v1; ?>)</div>
													</div>
												</div>
											</td>
											<td>
												<div class="rrb">
													<button class="rbtn opmd"> Đánh Giá Ngay</button>
												</div>
											</td>
										</tr>
									</tbody>
								</table>
								<div class="review-modal" style="display: none;">
									<div class="review-bg"></div>
									<div class="rmp">
										<div class="rpc">
											<span><i class="far fa-times"></i></span>
										</div>
										<form action="" method="POST">
										<div class="rps" align="center">
											<i class="fa fa-star" data-index="0" style="display: none;"></i>
											<i class="fa fa-star" data-index="1" style="cursor: pointer; font-size: 30px;">&#9733</i>
											<i class="fa fa-star" data-index="2" style="cursor: pointer; font-size: 30px;">&#9733</i>
											<i class="fa fa-star" data-index="3" style="cursor: pointer; font-size: 30px;">&#9733</i>
											<i class="fa fa-star" data-index="4" style="cursor: pointer; font-size: 30px;">&#9733</i>
											<i class="fa fa-star" data-index="5" style="cursor: pointer; font-size: 30px;">&#9733</i>
										</div>
										<input type="hidden" name="id_cmt" value="<?php echo $id ?>">
										<input type="hidden" name="vote" value="" class="starRateV">
										<input type="hidden" name="date" value="<?php echo $date; ?>" class="rateDate">
										<div class="rptf" align="center">
											<input type="text" name="nameOfcmt" class="raterName" 
												<?php 
													$login_check1 = Session::get('customer_login');
													$id = Session::get('customer_id');
													if($login_check1==false){
														echo 'placeholder="Email..."';
													}else{
														$get_mcustomer = $cs->show_customer($id);
														if($get_mcustomer==true){
															while($result_mail = $get_mcustomer->fetch_assoc()){
												?>
												value="<?php echo $result_mail['email'] ?>"
												<?php
															}
														}
													}
												?>
												required="">
										</div>
										<div class="rptf" align="center">
											<textarea class="rateMsg" name="cmt" id="rate-field" placeholder="Bình luận...." required=""></textarea>
										</div>
										<div class="rate-error" align="center">
											<?php 
												if(isset($insertcomment)){
													 echo $insertcomment;
												} 
											?>		
										</div>
										<div class="rpsb" align="center">
											<input type="submit" name="rpbtn" class="rpbtn" value="Đánh Giá">
										</div>
										</form>
									</div>
								</div>
							</div>
							<div class="bri">
								<div class="uscm">
									<?php 
										$id=$_GET['proid'];
										$check_cmt = "SELECT * FROM tbl_comment WHERE product_id = '$id' " ;
										$sqlq = $db->select($check_cmt);
										if($sqlq){
											while($rs_cmnt=$sqlq->fetch_assoc()){
									?>
									<div class="uscm-secs">
										<div class="us-img">
											<p><?php echo substr($rs_cmnt['name'], 0 ,1) ?></p>
										</div>
										<div class="uscms">
											<div class="us-rate">
												<div class="pdt_rate">
													<div class="pro-rating">
														<div class="clearfix rating mart8">
															<div class="rating-stars">
																<div class="grey-stars"></div>
																<div class="filled-stars" style="width: <?php echo $rs_cmnt['vote']*20 ?>%"></div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="us-cmt">
												<p> <?php echo $rs_cmnt['cmt'] ?>.</p>
											</div>
											<div class="us-nm">
												<p><i>By <span class="cmnm"><?php echo $rs_cmnt['name'] ?> </span>On <span class="cmdt"><?php echo $rs_cmnt['datecmt'] ?></span></i></p>
											</div>
											<?php if($rs_cmnt['status']==1){ ?>
											<div ><p style="color: #602D8D; font-size: 15px; font-weight: bold; ">Trả Lời Cửa Hàng:</p></div>
											<div class="ad_nm" style="background-color: #dbdbdb;">
												<p style="color: black; margin-left: 20px; padding-right: 11px;"><?php echo $rs_cmnt['rep_cmt'] ?>.</p>
											</div>
											<?php } ?>											
										</div>
									</div>
									<?php
											}
										}
									?>
								</div>
							</div>
						</div>
					</div>
		    	</div>
			</div>
			<?php
					}
    			}
			?>
				<div class="rightsidebar span_3_of_1">
					<h2>DANH MỤC</h2>
					<ul>
						<?php
							//Lấy tất cả các danh mục
							$getall_category = $cat->showall_category();
							if($getall_category){
								while ($result_allcat = $getall_category->fetch_assoc()) {
						?>
				    	<li><a href="productbycat.php?catid=<?php echo $result_allcat['catId'] ?>"><?php echo $result_allcat['catName'] ?></a></li>
				      	<?php 
				      			}
							}
				      	?>
    				</ul>
    	
 				</div>
 		</div>
 	</div>
	
<?php 
	include 'inc/footer.php';
?>