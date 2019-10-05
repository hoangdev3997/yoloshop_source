
	<!-- Page info -->
	<section>	
		<div class="container-banner">
			<div class="page-top-info">
				<div class="set-bg set-bg-page-info "data-setbg="../view/img/banner-bg.jpg">
					<div class="bg-blur">
						<h4>Contact</h4>
						<div class="site-pagination">
							<a href="">Home</a> 
							<i class="fas fa-angle-right"></i>
							<a href="">Contact</a> 

						</div>	
					</div>
			</div>
		</div>
	</section>
	<!-- Page info end -->



	<!-- Contact section -->
	<section class="contact-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 contact-info">
					<h3>Contact form</h3>
					<p>778/B1 Nguyen Kiem Street, Phu Nhuan Provice, Ho Chi Minh City</p>
					<p>+84-965 960 207</p>
					<p>hoangnhps08308@fpt.edu.com</p>
					<div class="contact-social">
						<a href="#"><i class="fa fa-pinterest"></i></a>
						<a href="#"><i class="fa fa-facebook"></i></a>
						<a href="#"><i class="fa fa-twitter"></i></a>
						<a href="#"><i class="fa fa-dribbble"></i></a>
						<a href="#"><i class="fa fa-behance"></i></a>
					</div>
					<form class="contact-form">
						<input type="text" placeholder="Your name">
						<input type="text" placeholder="Your e-mail">
						<input type="text" placeholder="Subject">
						<textarea placeholder="Message"></textarea>
						<button class="site-btn">SEND NOW</button>
					</form>
				</div>
			</div>
		</div>
		<div class="map">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1346.1275897970222!2d106.68128923084544!3d10.81209247695923!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xf872809fb8deded!2zVHLGsMahzIBuZyBDYW8gxJDEg8yJbmcgRlBUIFBvbHl0ZWNobmljIChDUzIp!5e0!3m2!1svi!2s!4v1560259394567!5m2!1svi!2s" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe></iframe>
		</div>
	</section>
	<!-- Contact section end -->


	<!-- Related product section -->
	<section class="related-product-section spad">
		<div class="container">
			<div class="section-title">
				<h2>Your Favorites</h2>
			</div>
			<div class="product-slider owl-carousel">
				<?php 
					foreach ($fav_prd as $fav_prd) {
						extract($fav_prd);
						
						$where_lastest_prd = array(
							'product_id' => $product_id
						);
						$img_lastest_prd = $db -> select_where_limit_1('product_img',$where_lastest_prd);
						foreach ($img_lastest_prd as $img_lastest_prd) {
							extract($img_lastest_prd);
							$sale = '';
							
							if ($product_sale > 0) {
								$sale = '<div class="tag-sale">SALE $'.$product_sale.'</div>';
								$price = $product_price - (($product_price * $product_sale)/100);
							}
							else if ($product_sale < 0) {
								$sale = '<div class="tag-new">NEW</div>';
								$price = $product_price;
							}
							else{
								$price = $product_price;
							}
							echo 
							'<div class="product-item">
									<div class="pi-pic">
										'.$sale.'
										<img src="'.$href .$img_link.'" alt="">
										<div class="pi-links">
											<a href="#" class="add-card"><i class="fas fa-shopping-bag"></i><span>ADD TO CART</span></a>
											<a href="index.php?page=product&id='.$product_id.'" class="wishlist-btn"><i class="far fa-eye"></i><span>VIEW MORE</span></a>
										</div>
									</div>
									<div class="pi-text">
										<h6>$'.round($price,0).'</h6>
										<a href="index.php?page=product&id='.$product_id.'">'.$product_name.'</a>
									</div>
								</div>';
						}
					}
				?>	
			</div>
		</div>
	</section>
	<!-- Related product section end -->

