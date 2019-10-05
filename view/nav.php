<header class="header-section">
		<div class="header-top">
			<div class="container">
				<div></div>
				<div class="row align-items-center">
					<div class="col-lg-2 text-center text-lg-left">
						<!-- logo -->
						<a href="../index.php" class="site-logo">
							<img src="../view/img/logo.png" alt="">
						</a>
					</div>
					<div class="col-xl-6 col-lg-5">
						<form class="header-search-form"  method="post" enctype="multipart/form-data" action="index.php?page=shop">
							<input type="text" name="search-data" placeholder="Search ...">
							<button type="submit" name="search"><i class="fas fa-search"></i></button>
						</form>
					</div>
					<div class="col-xl-4 col-lg-5 d-flex justify-content-end">
						<div class="user-panel">
							
								<?php 
									$admin_page = '';
									if(isset($_SESSION['user']['id_user'])) {
										if ($_SESSION['user']['level'] != 2) {
											$admin_page = '<li><a href="admin.php"><i class="fas fa-user-shield"></i>Admin Page</a></li>';
										}
											echo '
											<div class="up-item-login">
												<ul class="main-menu">
													<li>
														<i class="far fa-user"></i><a href="#">'.$_SESSION['user']['name'].'</a>
														<ul class="sub-menu">
															'.$admin_page.'
															<li><a href="#"><i class="fas fa-user-edit"></i>Edit Profile</a></li>

															<li><a href="?page=logout"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
														</ul>
													</li>
												</ul>
											</div>
											';
										}else{
										echo '
										<div class="up-item">
										<i class="far fa-user"></i>
										<span class="hidden-span"><a href="?page=login">Sign In</a> or <a href="#">Create Account</a></span>
										</div>';
									}
									
								?>
							<div class="right-item">
								<div class="shopping-card">
									<i class="fas fa-shopping-bag"></i>
									<span class="amount-icon">0</span>
								</div>
								<span class="hidden-span"><a href="#">Shopping Cart</a></span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<nav class="main-navbar">
			<div class="container">
				<!-- menu -->
				<div id="nav_main" class="row d-flex justify-content-end">
					<div class="search-nav d-hidden">
						<form class="header-search-form" method="post" enctype="multipart/form-data" action="index.php?page=shop">
								<input type="text" name="search-data" placeholder="Search ...">
							
								<button type="submit" name="search">
									<i class="fas fa-search"></i>
								</button>
							
						</form>
					</div>
					<ul class="main-menu">
					<li><a href="index.php">Home</a></li>
					<li><a href="index.php?page=shop">World of Wine</a>
						<ul class="sub-menu">
							<?php 
							foreach ($menu as $menu) {
								extract($menu);
								echo '<li><a href="index.php?page=shop&type='.$product_type_id.'">'.$product_type.'</a></li>';
							}
							 ?>
						</ul>
					</li>
					<li><a href="index.php?page=about">About</a></li>
					<li><a href="index.php?page=contact">Contact</a></li>

				</ul>
				</div>
				
			</div>
		</nav>
	</header>