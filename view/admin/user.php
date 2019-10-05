<section class="panel">
	<h2 class="panel-title">User</h2>
	<div class="mb-md">
		<div class="form-group search-area">
	        <input type="text" class="form-control" id="search_form" placeholder="Search...">
	        <label class="form-control-label" for="formGroupExampleInput"><i class="icon icon-magnify"></i>Search...</label>
    	</div>
	</div>
	<div class="table-responsive">
	    <table id="data_table" class="table">
	        <thead>
	            <tr>
			        <th class="secondary-text">
			            <div class="table-header">
			                <span class="column-title">ID</span>
			            </div>
			        </th>
			        <th class="secondary-text">
			            <div class="table-header">
			                <span class="column-title">Account</span>
			            </div>
			        </th>
			        <th class="secondary-text">
			            <div class="table-header">
			                <span class="column-title">Email</span>
			            </div>
			        </th>
			        <th class="secondary-text">
			            <span class="column-title">Password</span>=
			        </th>
			        <th class="secondary-text">
			            <div class="table-header">
			                <span class="column-title">Name</span>
			            </div>
			        </th>
			        <th class="secondary-text">
			            <div class="table-header">
			                <span class="column-title">Birthday</span>
			            </div>
			        </th>
			        <th class="secondary-text">
			            <div class="table-header">
			                <span class="column-title">Address</span>
			            </div>
			        </th>
			        <th class="secondary-text">
			            <span class="column-title">Phone</span>
			        </th>
			        <th class="secondary-text">
			            <span class="column-title">Avatar</span>
			        </th>
			        <th class="secondary-text">
			            <div class="table-header">
			                <span class="column-title">Permission</span>
			            </div>
			        </th>
			        <th class="secondary-text">
			            <span class="column-title">Action</span>
			        </th>
			    </tr>

	        </thead>
	        <tbody id="table_search">
	        	<?php 
	        		$a = 1;
	        		$b = 1;
	        		foreach ($user as $user) {
	        			extract($user);
	        			if(($a++%2)=="0"){
	        				$highlight = 'table-active';
	        			}
	        			else{
	        				$highlight = '';
	        			}
	        			echo '
						<tr class="'.$highlight.'">
			                <th class="id_user" scope="row">'.$b++.'</th>
			                <td class="account">'.$account.'</td>
			                <td class="email">'.$email.'</td>
			                <td class="password">'.$password.'</td>
			                <td class="name">'.$name.'</td>
			                <td class="birthday">'.$birth.'</td>
			                <td class="address">'.$address.'</td>
			                <td class="phone">'.$phone.'</td>
			                <td class="avatar_user"><img src="'.$avatar.'" alt="avatar_'.$id_user.'"></td>
			                <td class="permission">'.$level.'</td>
			                <td>
			                	<form method="post" enctype="multipart/form-data">
				                	<button id="edit_'.$id_user.'" type="button" class="btn-form edit-btn">
				                		<i style="color:blue" class="icon-pencil"></i>
				                	</button>
				                </form>
			                </td>
			            </tr>
	        			';
	        		}
	        	 ?>
	        </tbody>
	    </table>
	</div>
</section>