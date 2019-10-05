
<?php 
	if(isset($_GET['id'])){
		$where = array('product_id' => $_GET['id'], );
		$product_by_id = $db -> select_by_where('product',$where);
		foreach ($product_by_id as $product_by_id) {
			extract($product_by_id);
			$sale = '';
				$new = '';
				$hot ='';
				if ($product_sale > 0) {
				$sale = '<div class="tag-sale">SALE $'.$product_sale.'</div>';
				$price = $product_price - (($product_price * $product_sale)/100);
			}
			else{
				$price = $product_price;
			}
			if ($check_new>0) {
				$new = '<div class="tag-new">NEW</div>';
			}
			if ($check_hot>0) {
				$hot = '<div class="tag-hot">HOT</div>';
			}
			$img_prd_w = array(
							'product_id' => $product_id
						);
			$img_prd = $db -> select_by_where('product_img',$img_prd_w);
			$img_big = $db -> select_where_limit_1('product_img',$img_prd_w);
			
		}
	}
 ?>
<!-- Page info -->
	<section>	
		<div class="container-banner">
			<div class="page-top-info">
				<div class="set-bg set-bg-page-info "data-setbg="../view/img/banner-bg.jpg">
					<div class="bg-blur">
						<h4><?php echo $product_name ?></h4>
						<div class="site-pagination">
							<a href="index.php">Home</a> 
							<i class="fas fa-angle-right"></i>
							<a href="index.php?page=shop">Shop</a> 
							<i class="fas fa-angle-right"></i>
							<a href="index.php?page=product&id=<?php $product_id ?>"><?php echo $product_name ?></a> 

						</div>	
					</div>
			</div>
		</div>
	</section>
	<!-- Page info end -->


	<!-- product section -->
	<section class="product-section">
		<div class="container">
			<div class="back-link">
				<a href="#"> &lt;&lt; Back to Category</a>
			</div>
			<div class="row">
				<div class="col-lg-6">

					<div class="product-pic-zoom">
						<?php foreach ($img_big as $img_big) {
							extract($img_big);
							echo '
							<img class="product-big-img" src="'.$href .$img_big['img_link'].'" alt="'.$product_name.'">
							';
						} ?>
					</div>
					<div class="product-thumbs" tabindex="1" style="overflow: hidden; outline: none;">
						<div class="product-thumbs-track">
							<?php 
								$a = 0;
								foreach ($img_prd as $img_prd) {
									extract($img_prd);
									if ($a == 0) {
									echo'
									<div class="pt active" data-imgbigurl="'.$href .$img_link.'">
										<img src="'.$href .$img_prd['img_link'].'" alt="">
									</div>
									';	
									}
									if ($a > 0){
										echo'
										<div class="pt" data-imgbigurl="'.$href .$img_link.'">
											<img src="'.$href .$img_prd['img_link'].'" alt="">
										</div>
										';	
									} 
									$a++;
								}
							 ?>
						</div>
					</div>
				</div>
				<div class="col-lg-6 product-details">
					<h2 class="p-title"><?php echo $product_name ?></h2>
					<h3 class="p-price"><span class="f-price">$<?php echo $price ?> </span> <span class="s-price">$<?php echo $product_price ?> </span></h3>
					<h4 class="p-stock">Available: <?php 
						if ($amount > 0) {
							echo '<span>In Stock</span>';
						}
						else{
							echo '<span>Out Stock</span>';
						}
					 ?></h4>
					<div class="p-rating">
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o"></i>
						<i class="fa fa-star-o fa-fade"></i>
					</div>
					<div class="p-review">
						<a href="">3 reviews</a>|<a href="">Add your review</a>
					</div>
					<div class="quantity">
						<p>Quantity</p>
                        <div class="pro-qty"><input type="text" value="1"></div>
                    </div>
					<a href="#" class="site-btn">SHOP NOW</a>
					<div id="accordion" class="accordion-area">
						<div class="panel">
							<div class="panel-header" id="headingOne">
								<button class="panel-link active" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1">information</button>
							</div>
							<div id="collapse1" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
								<div class="panel-body">
									<h4><?php echo $product_name ?></h4>
									<p><?php echo $full_detail; ?></p>
								</div>
							</div>
						</div>
						<div class="panel">
							<div class="panel-header" id="headingThree">
								<button class="panel-link" data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapse2">shipping & Returns</button>
							</div>
							<div id="collapse2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
								<div class="panel-body">
									<h4>7 Days Returns</h4>
									<p>Cash on Delivery Available<br>Home Delivery <span>3 - 4 days</span></p>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pharetra tempor so dales. Phasellus sagittis auctor gravida. Integer bibendum sodales arcu id te mpus. Ut consectetur lacus leo, non scelerisque nulla euismod nec.</p>
								</div>
							</div>
						</div>
					</div>
					<div class="social-sharing">
						<a href=""><i class="fa fa-google-plus"></i></a>
						<a href=""><i class="fa fa-pinterest"></i></a>
						<a href=""><i class="fa fa-facebook"></i></a>
						<a href=""><i class="fa fa-twitter"></i></a>
						<a href=""><i class="fa fa-youtube"></i></a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- product section end -->

	<!-- Related product section -->
	<section class="related-product-section spad">
		<div class="container">
			<div class="section-title">
				<h2>Your Favorites</h2>
			</div>
			<div class="product-slider owl-carousel">
			<?php 
				foreach ($last_prd as $last_prd) {
					extract($last_prd);
					
					$where_lastest_prd = array(
						'product_id' => $product_id
					);
					$img_lastest_prd = $db -> select_where_limit_1('product_img',$where_lastest_prd);
					foreach ($img_lastest_prd as $img_lastest_prd) {
						extract($img_lastest_prd);
						$sale = '';
							$new = '';
							$hot ='';
							if ($product_sale > 0) {
							$sale = '<div class="tag-sale">SALE $'.$product_sale.'</div>';
							$price = $product_price - (($product_price * $product_sale)/100);
						}
						else{
							$price = $product_price;
						}
						if ($check_new>0) {
							$new = '<div class="tag-new">NEW</div>';
						}
						if ($check_hot>0) {
							$hot = '<div class="tag-hot">HOT</div>';
						}
							echo '
							<div class="product-item">
								<div class="pi-pic">
								'.$hot.$new.$sale.'
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
