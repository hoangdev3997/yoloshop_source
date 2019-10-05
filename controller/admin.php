<?php 
session_start();

// connect database
	require '../model/connect.php';
	require '../model/libs.php';
//Thay đổi content theo page
	require '../view/admin/head.php';
	$href = '../upload/';
	$home = '';
	$slide = '';
	$banner = '';
	$catalog = '';
	$product = '';
	$order = '';
	$user = '';
	$contact = '';
	?>
<body class="layout layout-vertical layout-left-navigation layout-below-toolbar layout-below-footer">
    <main>
		<?php
			$act = new libs();
			if (isset($_SESSION['user']['id_user'])){
				if ($_SESSION['user']['level']!=2) {

		        	require '../view/admin/nav.php';
					?>
					<div id="wrapper">
						<?php 
						if (isset($_GET['page'])) {
							switch ($_GET['page']) {
								case 'catalog':
						 			$catalog = 'active';	
									require '../view/admin/header.php';
									break;
							
								case 'product':
									$product = 'active';	
									require '../view/admin/header.php';
									break;
								
								case 'order':
									$order = 'active';	
									require '../view/admin/header.php';
									break;

								case 'user':
									$user = 'active';	
									require '../view/admin/header.php';
									break;

								case 'contact':
									$contact = 'active';	
									require '../view/admin/header.php';
									break;

								default:
									$home = 'active';	
									require '../view/admin/header.php';
									break;
								}
							}
							else{
								$home = 'active';
								require '../view/admin/header.php';
							} ?>
						<div class="content-wrapper">
						<?php 
							$act = new libs();
							if (isset($_GET['page'])) {
				 				switch ($_GET['page']) {
				 					
				 					case 'catalog':
						 					//Delete Catalog
						 					$catalog = 'active';
						 					if (isset($_POST['del_accept'])) {
						 						$data = array('id_ctg' => $_POST['hidden_id'] );
												$data2 = array('product_type_id' => $_POST['hidden_id'] );

												
												$act -> delete('ctg_prd',$data);
												$act -> delete('product_type',$data2);
												
												
												}

											//Add Catalog
						 					if (isset($_POST['add_submit'])) {
												$data = array('product_type' => $_POST['product_type_input'] ,'active' => $_POST['active_input'] );
												$act -> insert('product_type',$data);
												$msg='<h4 style="color: red; margin-left: 1.5em">Add successfull</h4>';
											}
											//Edit Catalog
											if (isset($_POST['edit_submit'])) {

												$data = array('product_type' => $_POST['product_type_edit'] , 'active' => $_POST['active_edit']);
												$where = array('product_type_id'=>$_POST['edit_hidden_id']);
						    					
						    					$act -> update('product_type',$data,$where);
											}


											$act-> reset_ai('product_type','product_type_id');
						 					$ctg = $act ->  select_all('product_type','product_type_id');
												require '../view/admin/catalog.php';
										break;
									
									case 'product':
											$product = 'active';
											//Edit Product
											if(isset($_POST['submit-edit'])){
												if(isset($_POST['edit_new'])&&($_POST['edit_new'])){
					                                    $new = 1;
					                                }else
					                                {
					                                    $new = 0;
					                                }
					                            if(isset($_POST['edit_hot'])&&($_POST['edit_hot'])){
					                                    $hot = 1;
					                                }else
					                                {
					                                    $hot = 0;
					                                }
					                            $where = array('product_id' => $_POST['edit_hidden_prd_id'],);	
												$data = array(
													'product_name' => $_POST['edit_product_name'],
													'product_price' => $_POST['edit_product_price'],
													'product_sale' => $_POST['edit_product_sale'],
													'full_detail'	=>  $_POST['edit_product_detail'],
													'amount' => $_POST['edit_product_amount'],
													'check_new' => $new, 
													'check_hot' => $hot,
												);
												if(isset($_POST['edit_catalog'])){
													$act ->delete('ctg_prd',$where);
													while (list ($key, $val) = each ($_POST['edit_catalog'])) {
														$data_2 = array(
															'id_prd' => $_POST['edit_hidden_prd_id'],
															'id_ctg' => $val);
														$act -> insert('ctg_prd',$data_2);
														$act ->update('product',$data,$where);	
														}
													}
													else
													$act ->update('product',$data,$where);
												}
					    					

					    					//Add Image
					    					if(isset($_POST['add-img'])){
												// Sử dụng vòng lặp for để lưu từng file trong mảng
												foreach($_FILES['img_file']['name'] as $name => $value)
												{
												    $name_img = stripslashes($_FILES['img_file']['name'][$name]);
												    $source_img = $_FILES['img_file']['tmp_name'][$name];
												    $path_img = $href . $name_img;
												    move_uploaded_file($source_img, $path_img);
												    $data = array(
												    	'product_id' => $_POST['product_choose'],
												    	'img_link' => $name_img,
												    );
													$act ->reset_ai('product_img','id_img');
												    $act -> insert('product_img',$data);
												    $msg='<h4 style="color: red; margin-left: 1.5em">Upload Image Successfull</h4>';
												}
											}
											//Add Product
					    					if (isset($_POST['submit-add'])) {
					    						if(isset($_POST['new-add'])&&($_POST['new-add'])){
					                                    $new = 1;
					                                }else
					                                {
					                                    $new = 0;
					                                }
					                            if(isset($_POST['hot-add'])&&($_POST['hot-add'])){
					                                    $hot = 1;
					                                }else
					                                {
					                                    $hot = 0;
					                                }
												$data = array(
													'product_name' => $_POST['name-add'],
													'product_price' => $_POST['price-add'],
													'product_sale' => $_POST['sale-add'],
													'full_detail'	=>  $_POST['detail-add'],
													'amount' => $_POST['amount-add'],
													'check_new' => $new, 
													'check_hot' => $hot,
												);
												$act -> insert('product',$data);
												$id_newest = $act ->select_num_newst('product','product_id','1');
												foreach ($id_newest as $id_newest) {
													extract($id_newest);
													if( is_array($_POST['catalog-add'])){
														while (list ($key, $val) = each ($_POST['catalog-add'])) {
															$data_2 = array(
																'id_prd' => $product_id,	
																'id_ctg' => $val);
																$act ->reset_ai('ctg_prd','id');
															 	$act -> insert('ctg_prd',$data_2);
														}
														
													}else{echo "This isn't array";}
												}
												
												$msg='<h4 style="color: red; margin-left: 1.5em">Add successfull</h4>';
					    					}
					    					//Delete Image
					    					if (isset($_POST['del_img_accept'])) {
					    						$data = array('id_img' => $_POST['img_hidden_id'] );
												$act -> delete('product_img',$data);
						    						
						    					}
					    					//Delete Product
						 					if (isset($_POST['del_accept'])) {
						 						$data = array('id_prd' => $_POST['hidden_id'] );
												$data2 = array('product_id' => $_POST['hidden_id'] );

												$act -> delete('ctg_prd',$data);
												$act -> delete('product',$data2);
												}
											$act ->reset_ai('ctg_prd','id');
											$act ->reset_ai('product','product_id');
											$all_prd = $act -> select_all('product','product_id');
												require '../view/admin/product.php';
										break;
									
									case 'user':
										$user = 'active';
										$act-> reset_ai('user','id_user');
						 				$user = $act ->  select_all('user','id_user');
										require '../view/admin/user.php';
									break;

									case 'order':
										$order = 'active';
										require '../view/admin/order.php';
									break;

									case 'logout':
											unset($_SESSION['user']);
											echo '<script>window.location.replace("index.php?page=home");</script>';
										break;

									default:
										$home = 'active';
										require '../view/admin/dashboard.php';
										break;
								}
							}else{
				 				$home = 'active';
						 		require '../view/admin/dashboard.php';
						 	}
							?>
						</div>
					</div>
			<?php }else{ require '../view/404.php';}
			}else{ require '../view/404.php';}
			?>
	</main>

	<?php 
		require '../view/admin/footer.php';
		 ?>
</body>