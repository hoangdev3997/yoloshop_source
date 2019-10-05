<?php 
	session_start();

	include '../model/connect.php';
	include '../model/libs.php';
	include '../view/header.php';
 ?>

 <body>
 	<?php 
 		$db = new libs();
 		$output_script = '';
		//Khai báo biến
		$nav = array(
			'active' => 1
		);
		$href = '../upload/';
		//call function 
		$menu = $db -> select_where_and_order_desc('product_type',$nav,'product_type');
		if (empty($_GET['page']) || $_GET['page']!='login') {
			require '../view/nav.php';
		}
 		
 		if (isset($_GET['page'])) {
 			switch ($_GET['page']) {
	 			case 'shop':
	 				$product_tab_2 = $db -> select_where_and_order_desc('product_type',$nav,'product_type');
	 				include '../view/shop.php';
	 				break;
	 			case 'product':
	 				$last_prd =  $db -> select_num_newst('product','product_id','8');
	 			include '../view/product.php';
	 			break;
	 			case 'contact':
	 				$fav_prd =  $db -> select_num_newst('product','product_id','8');
	 				include '../view/contact.php';
	 				break;
	 			case 'login':

	 				if (empty($_SESSION['user']['id_user'])) {
						require '../view/admin/head.php';
						$act = new libs();
						echo '
							<body class="layout layout-vertical layout-left-navigation layout-below-toolbar layout-below-footer">
						    <main>';
						if (isset($_POST['submit_login'])) {
				           //Lấy dữ liệu nhập vào
				            $username_login = addslashes($_POST['username']);
				            $password_login = addslashes($_POST['password']);
				            // mã hóa pasword
				            //$password = md5($password);
				             
				            //Kiểm tra tên đăng nhập có tồn tại không
				            $where = array('account' => $username_login);
				            $where_2 = array('password' => $password_login);
				            $login_data = $act ->select_by_2_where('user',$where,$where_2);
				            if(is_array($login_data)){
				                extract($login_data);
				                $_SESSION['user']= array(
				                	'id_user' => $id_user,
				                	'account' => $account,
				                	'password' => $password,
					                'name' => $name,
					                'phone' => $phone,
					                'email' => $email,
					                'birth' => $birth,
					                'avatar' => $avatar, 
					                'level' => $level
				                );
				                echo '<script>window.location.replace("?page=home");</script>';               
				            }else{
				            	echo'';
				            }
				        }
				            echo '<div id="wrapper">';
								require '../view/login.php'; 
							echo '</div>';
						echo '</main>';
							require '../view/admin/footer.php';
						echo'</body>';
				    	}
	 			break;
	 			case 'logout':
	 				unset($_SESSION['user']);
					echo '<script>window.location.replace("?page=#");</script>';
	 				break;

	 			default:
		 			$product_tab_2 = $db -> select_where_and_order_desc('product_type',$nav,'product_type');
		 			$lastest_product = $db -> select_num_newst('product','product_id','8');
	 				$menu1 = $db -> select_where_and_order_desc('product_type',$nav,'product_type');
	 				include '../view/home.php';
	 				break;
	 			}
 		}
 		else{
 			$menu1 = $db -> select_where_and_order_desc('product_type',$nav,'product_type');
 			$product_tab_2 = $db -> select_where_and_order_desc('product_type',$nav,'product_type');
 			$lastest_product = $db -> select_num_newst('product','product_id','8');

 			include '../view/home.php';
 		}

 		if (empty($_GET['page']) || $_GET['page']!='login') {
			include '../view/footer.php';
		}
 		
 	?>
 </body>