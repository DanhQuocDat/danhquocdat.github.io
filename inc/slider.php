
	<div class="header_bottom">
		<div class="header_bottom_left">
			<div class="section group">
				<div class="listview_1_of_2 images_1_of_2">
					<div class="a-img">
						 <a href="allprotl.php?type=1 &n=Nam"><img src="images/nam.png" alt="" width="500px" /></a>
					</div>
			   </div>			
				<div class="listview_1_of_2 images_1_of_2">
					<div class="a-img">
						  <a href="allprotl.php?type=2 &n=Nữ"><img src="images/nu.png" alt="" / ></a>
					</div>
				</div>
			</div>
			<div class="section group">
				<div class="listview_1_of_2 images_1_of_2">
					<div class="a-img">
						 <a href="allprotl.php?type=0 &n=Đôi"> <img src="images/capdoi.png" alt="" /></a>
					</div>
			   </div>			
				<div class="listview_1_of_2 images_1_of_2">
					<div class="a-img">
						  <a href="#"><img src="images/treem.png" alt="" / ></a>
					</div>
				</div>
			</div>
		  <div class="clear"></div>
		</div>
			 <div class="header_bottom_right_images">
		   <!-- FlexSlider -->
             
			<section class="slider">
				  <div class="flexslider">
					<ul class="slides">
						<?php 
							$get_slider = $product->show_slider();
							if($get_slider){
								while($result_slider = $get_slider->fetch_assoc()){
						?>
						<li><img src="admin/uploads/<?php echo $result_slider['slider_image'] ?>" alt="<?php echo $result_slider['sliderName'] ?>"/></li>
						<?php 								
								}
							}
						?>
				    </ul>
				  </div>
	      </section>
<!-- FlexSlider -->
	    </div>
	  <div class="clear"></div>
  </div>