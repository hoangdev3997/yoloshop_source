


	<!-- Hero section -->
	<section class="hero-section">
		<div class="hero-slider owl-carousel">
			<div class="hs-item set-bg" data-setbg="../view/img/bg.jpg">
				<div class="container">
					<div class="row">
						<div class="col-xl-6 col-lg-7 text-white">
							<span>New Arrivals</span>
							<h2>World Of Wine</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum sus-pendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. </p>
							<a href="#" class="site-btn sb-line">DISCOVER</a>
							<a href="#" class="site-btn sb-white">ADD TO CART</a>
						</div>
					</div>
					<div class="offer-card text-white">
						<span>from</span>
						<h2>$29</h2>
						<p>SHOP NOW</p>
					</div>
				</div>
			</div>
			<div class="hs-item set-bg" data-setbg="../view/img/bg-1.jpg">
				<div class="container">
					<div class="row">
						<div class="col-xl-6 col-lg-7 text-white">
							<span>New Arrivals</span>
							<h2>World Of Wine</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum sus-pendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. </p>
							<a href="#" class="site-btn sb-line">DISCOVER</a>
							<a href="#" class="site-btn sb-white">ADD TO CART</a>
						</div>
					</div>
					<div class="offer-card text-white">
						<span>from</span>
						<h2>$29</h2>
						<p>SHOP NOW</p>
					</div>
				</div>
			</div>
			<div class="hs-item set-bg" data-setbg="../view/img/bg-3.jpg">
				<div class="container">
					<div class="row">
						<div class="col-xl-6 col-lg-7 text-white">
							<span>New Arrivals</span>
							<h2>World Of Wine</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum sus-pendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. </p>
							<a href="#" class="site-btn sb-line">DISCOVER</a>
							<a href="#" class="site-btn sb-white">ADD TO CART</a>
						</div>
					</div>
					<div class="offer-card text-white">
						<span>from</span>
						<h2>$29</h2>
						<p>SHOP NOW</p>
					</div>
				</div>
			</div>
			<div class="hs-item set-bg" data-setbg="../view/img/bg-2.jpg">
				<div class="container">
					<div class="row">
						<div class="col-xl-6 col-lg-7 text-white">
							<span>New Arrivals</span>
							<h2>World Of Wine</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum sus-pendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. </p>
							<a href="#" class="site-btn sb-line">DISCOVER</a>
							<a href="#" class="site-btn sb-white">ADD TO CART</a>
						</div>
					</div>
					<div class="offer-card text-white">
						<span>from</span>
						<h2>$29</h2>
						<p>SHOP NOW</p>
					</div>
				</div>
			</div>
			<div class="hs-item set-bg" data-setbg="../view/img/bg-4.jpg">
				<div class="container">
					<div class="row">
						<div class="col-xl-6 col-lg-7 text-white">
							<span>New Arrivals</span>
							<h2>World Of Wine</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum sus-pendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. </p>
							<a href="#" class="site-btn sb-line">DISCOVER</a>
							<a href="#" class="site-btn sb-white">ADD TO CART</a>
						</div>
					</div>
					<div class="offer-card text-white">
						<span>from</span>
						<h2>$29</h2>
						<p>SHOP NOW</p>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="slide-num-holder" id="snh-1"></div>
		</div>
	</section>
	<!-- Hero section end -->


	<!-- lastest product section -->
	<section class="top-letest-product-section">
		<div class="container">
			<div class="section-title">
				<h2>LATEST PRODUCTS</h2>
			</div>
			<div class="product-slider owl-carousel">
				<?php 
					foreach ($lastest_product as $lastest_product) {
						extract($lastest_product);
						
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
							echo 
							'<div class="product-item">
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
								
							</div>'
							;
						}
					}
				 ?>				
			</div>
		</div>
	</section>
	<!-- letest product section end -->



	<!-- Product filter section -->
	<section class="product-filter-section ptload">
		<div class="container">
			<div class="section-title">
				
				<h2>BROWSE TOP SELLING PRODUCTS</h2>
			</div>
			<ul class="product-filter-menu">
				<li class="click-on selected" data-hienlen="top"><button>TOP SELLER</button></li>
				<li class="click-on" data-hienlen="new"><button>NEW </button></li>
				<?php 
					foreach ($menu1 as $menu1) {
						extract($menu1);
						$data = explode(' ',$product_type);
						echo '<li class="click-on" data-hienlen="'.strtolower($data[0]).'"><button>'.$product_type.'</button></li>';
					}
				 ?>
			</ul>
			<div class="row dehienthi hienra" id="top">
				<?php 

					$prd_top = $db -> select_num_rand('product','8');
					foreach ($prd_top as $prd_top) {
						extract($prd_top);
						$b = array('product_id' => $product_id, );
 						$img_new = $db -> select_where_limit_1('product_img',$b);
 						foreach ($img_new as $img_new) {
 							extract($img_new);
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
		 						<div class="col-lg-3 col-sm-6">
								<div class="product-item">
									<div class="pi-pic">
										'.$hot.$new.$sale.'
										<img src="'.$href .$img_link .'" alt="">
										<div class="pi-links">
											<a href="#" class="add-card"><i class="fas fa-shopping-bag"></i><span>ADD TO CART</span></a>
											<a href="index.php?page=product&id='.$product_id.'" class="wishlist-btn"><i class="far fa-eye"></i><span>VIEW MORE</span></a>
										</div>
									</div>
									<div class="pi-text">
										<h6>$'.round($price,0).'</h6>
										<a href="index.php?page=product&id='.$product_id.'">'.$product_name.'</a>
									</div>
								</div>
								</div>
		 						 ';
 						}
					}
				 ?>
			</div>

			<div class="row dehienthi" id="new">
				<?php 
					$where_1 = array('check_new'=>'1');
					$prd_new = $db -> select_by_where_num_rand('product',$where_1,'8');
					foreach ($prd_new as $prd_new) {
						extract($prd_new);
						
						$b = array('product_id' => $product_id, );
 						$img_new = $db -> select_where_limit_1('product_img',$b);
 						foreach ($img_new as $img_new) {
 							extract($img_new);
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
		 						<div class="col-lg-3 col-sm-6">
								<div class="product-item">
									<div class="pi-pic">
									'.$hot.$new.$sale.'
										<img src="'.$href .$img_link .'" alt="">
										<div class="pi-links">
											<a href="#" class="add-card"><i class="fas fa-shopping-bag"></i><span>ADD TO CART</span></a>
											<a href="index.php?page=product&id='.$product_id.'" class="wishlist-btn"><i class="far fa-eye"></i><span>VIEW MORE</span></a>
										</div>
									</div>
									<div class="pi-text">
										<h6>$'.round($price,0).',00</h6>
										<a href="index.php?page=product&id='.$product_id.'">'.$product_name.'</a>
									</div>
								</div>
								</div>
		 						 ';
 						}
					}
				 ?>
			</div>
			<?php 
				$prd_type_tab_w = array('active'=>'1');
				$prd_type_tab = $db ->select_by_where('product_type',$prd_type_tab_w);

				foreach ($prd_type_tab as $prd_type_tab) {
					extract($prd_type_tab);
					$data_tab = explode(' ',$product_type);
					$tab_w = array('id_ctg'=>$product_type_id);
					$product_tab = $db -> select_by_where('ctg_prd',$tab_w);
						echo '
							<div class="row dehienthi area_search" id="'.strtolower($data_tab[0]).'">
								';
					foreach ($product_tab as $product_tab) {
						extract($product_tab);
						$prd_show_w = array('product_id'=>$id_prd);
						$prd_show=$db->select_by_where('product',$prd_show_w);
						
						foreach ($prd_show as $prd_show) {
							extract($prd_show);
							$sale = '';
 							$new = '';
 							$hot ='';
 							$img_w_show = array('product_id' => $product_id, );
								$img = $db -> select_where_limit_1('product_img',$img_w_show);
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
							foreach ($img as $img) {
								extract($img);
								echo '
		 						<div class="col-lg-3 col-sm-6 item-prd">
									<div class="product-item">
										<div class="pi-pic">
										'.$hot.$new.$sale.'
											<img src="'.$href .$img_link .'" alt="">
											<div class="pi-links">
												<a href="#" class="add-card"><i class="fas fa-shopping-bag"></i><span>ADD TO CART</span></a>
												<a href="index.php?page=product&id='.$product_id.'" class="wishlist-btn"><i class="far fa-eye"></i><span>VIEW MORE</span></a>
											</div>
										</div>
										<div class="pi-text">
											<h6>$'.round($price,0).'</h6>
											<a href="index.php?page=product&id='.$product_id.'">'.$product_name.'</a>
										</div>
									</div>
								</div>
		 						 ';
							}
							
						}
						
					}
					echo '</div>';
				}
			 ?>
			<div class="text-center pt-5 d-flex justify-content-center">
				<div class="btn-loadmore">
					<button class="site-btn sb-line sb-dark">LOAD MORE</button>
				</div>
			</div>
		</div>
	</section>
	<!-- Product filter section end -->


	<!-- Banner section -->
	<section class="banner-section">
		<div class="container-banner">
			<div class="banner set-bg" data-setbg="../view/img/banner-bg.jpg">
				<div class="tag-new">NEW</div>
				<span>New Arrivals</span>
				<h2>Varietal Wines</h2>
				<a href="#" class="site-btn">SHOP NOW</a>
			</div>
		</div>
	</section>
	<!-- Banner section end  -->
