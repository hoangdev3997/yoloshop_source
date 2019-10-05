
	<!-- Page info -->
	<section>	
		<div class="container-banner">
			<div class="page-top-info">
				<div class="set-bg set-bg-page-info "data-setbg="../view/img/banner-bg.jpg">
					<div class="bg-blur">
						<h4>World of wine</h4>
						<div class="site-pagination">
							<a href="">Home</a> 
							<i class="fas fa-angle-right"></i>
							<a href="">Shop</a> 

						</div>	
					</div>
			</div>
		</div>
	</section>
	<!-- Page info end -->

	<!-- Category section -->
	<section class="category-section spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 order-2 order-lg-1">
					<div class="filter-widget mb-0">
						<h2 class="fw-title mb-3">Categories</h2>
						<div class="filter-widget mb-3">
							<div id="btnContainer">
								<button class="btn active" id="gridView"><i class="fa fa-th-large"></i> Grid</button>
								<button class="btn" id="listView"><i class="fa fa-bars"></i> List</button>
							</div>
						</div>
						<div class="filter-widget mb-4">
							<div class="col-12">
								<div class="header-search-form">
									<input type="text" name="search-data"  id="search_form"  placeholder="Search ...">
								</div>
							</div>
						</div>
						<div class="filter-widget">
							<h2 class="fw-title">Brand</h2>
							<ul class="category-menu">
								<li class="click-on" data-hienlen="new"><a>All</a></li>
								<?php 
									foreach ($product_tab_2 as $product_tab_2) {
										extract($product_tab_2);
										$data = explode(' ',$product_type);
										echo '<li class="click-on" data-hienlen="'.strtolower($data[0]).'"><a>'.$product_type.'</a></li>';
									}
								 ?>
							</ul>
						</div>
						<div class="filter-widget mb-0">
							<h2 class="fw-title">refine by</h2>
							<div class="price-range-wrap">
								<h4>Price</h4>
	                            <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content" data-min="10" data-max="5000">
									<div class="ui-slider-range ui-corner-all ui-widget-header" style="left: 0%; width: 100%;"></div>
									<span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 0%;">
									</span>
									<span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 100%;">
									</span>
								</div>
								<div class="range-slider">
	                                <div class="price-input">
	                                    <input type="text" id="minamount">
	                                    <input type="text" id="maxamount">
	                                </div>
	                            </div>
	                        </div>
						</div>
					</div>
				</div>

				<div class="col-lg-9  order-1 order-lg-2 mb-5 mb-lg-0">
					<div class="row">
						<div class="row dehienthi hienra area_search" id="new">
						<?php 

							$prd_nor = $db -> select_num_newst('product','product_id','9');
							foreach ($prd_nor as $prd_nor) {
								extract($prd_nor);
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
				 						<div class="col-lg-4 col-sm-6 item-prd">
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
												
												<a href="index.php?page=product&id='.$product_id.'">'.$product_name.'</a>
												<h6>$'.round($price,0).'</h6>
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
					 						<div class="col-lg-4 col-sm-6 item-prd">
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


						<div class="col-lg-12 col-md-10 text-center pt-5 d-flex justify-content-center">
							<div class="btn-loadmore">
								<button class="site-btn sb-line sb-dark"> LOAD MORE</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Category section end -->
