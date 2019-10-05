

<section class="panel">
	<h2 class="panel-title">Catalog</h2>
	<div class="mb-md">
		<button id="add" class="btn btn-dark add_btn">
			Add <i class="icon-plus"></i>
		</button>
		<div class="form-group search-area">
	        <input type="text" class="form-control" id="search_form" placeholder="Search...">
	        <label class="form-control-label" for="formGroupExampleInput"><i class="icon icon-magnify"></i>Search...</label>
    	</div>
	</div>
	<div class="card-title">
		<?php 
			if (isset($msg)) {
				echo $msg;
			}
	 ?>
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
			                <span class="column-title">Catalog Name</span>
			            </div>
			        </th>
			        <th class="secondary-text">
			            <div class="table-header">
			                <span class="column-title">Active</span>
			            </div>
			        </th>
			        <th class="secondary-text">
			           
			                <span class="column-title">Action</span>
			        </th>
			    </tr>
	        </thead>
	        <tbody id="table_search">
	        	<?php 
	        		$a = "1";
	        		$c = 1;
	        		foreach ($ctg as $ctg) {
	        			extract($ctg);
	        			if(($a++%2)=="0"){
	        				$highlight = 'table-active';
	        			}
	        			else{
	        				$highlight = '';
	        			}

	        			if($active == '1'){
	        				$b = '<p class="hidden">1</p><i style="color:green" class="icon-check"></i>';
	        			}else{
	        				$b = '<p class="hidden">0</p><i style="color:red" class="icon-close"></i>';
	        			}
	        			
	        			echo '
						<tr class="'.$highlight.'">
			                <th class="id_ctg" scope="row">'.$c++.'</th>
			                <td class="name_ctg">'.$product_type.'</td>
			                <td>'.$b.'</td>
			                <td>
			                	<form method="post" enctype="multipart/form-data">
				                	<button id="edit_'.$product_type_id.'" value="'.$product_type_id.'" type="button" name="edit" data-id="'.$product_type_id.'"  data-name="'.$product_type.'" data-active="'.$active.'" class="btn-form edit-btn">
				                		<i style="color:blue" class="icon-pencil"></i>
				                	</button>
				                	<button id="del_'.$product_type_id.'" type="button" name="del" data-id="'.$product_type_id.'" class="btn-form del-btn">
				                	 	<i style="color:red"  class="icon-trash"></i>
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

<div class="form-hidden hidden" id="add_form_hidden">
	<form method="post" enctype="multipart/form-data">
	    <div class="form-add">
	    	<div class="col">
	    		<h3>Add Form</h3>
	    	</div>
	        <div class="col">
	        	<div class="form-group row">
	        		<label>Name:  </label>
	            	<input name="product_type_input" type="text" class="form-control" placeholder="Catalog Name">
	        	</div>
	        </div>
	        <div class="col">
	        	<div class="form-group row">
	        		<label>Active:  </label>
		            <select name="active_input" class="form-control form-control-lg">
					    <option value="1">Active</option>
					    <option value="0" selected="selected">Disable</option>
					</select>
	        	</div>
	        </div>
	        <div class="col">
	        	<div class="form-group row btn-wrapper">
	        		<input value="ADD" type="submit" name="add_submit" class="btn btn-outline-success btn_accept">
	        		<input value="Cancel" type="button" style="margin-left: 10px;" class="btn btn-outline-danger btn_cancel">
	        	</div>
	        </div>
	    </div>
	</form>
</div>
<div class="form-hidden hidden" id="del-form-hidden">
	<form method="post" enctype="multipart/form-data">
	    <div class="form-del">
	    	<div class="col">
	    		<h3>Delete This Record?</h3>
	    	</div>
	        <div class="col">
	        	<div class="form-group row btn-wrapper">
	        		<input type="hidden" value="" id="hidden_id" name="hidden_id">
	        		<input value="ACCEPT" type="submit" name="del_accept" class="btn btn-outline-success btn_accept">
	        		<input value="Cancel" type="button" style="margin-left: 10px;" class="btn btn-outline-danger btn_cancel">
	        	</div>
	        </div>
	    </div>
	</form>
</div>
<div class="form-hidden hidden" id="edit_form_hidden">
	<form method="post" enctype="multipart/form-data">
	    <div class="form-edit">
	    	<input type="hidden" id="edit_hidden_id" name="edit_hidden_id" value="">
	    	<div class="col">
	    		<h3>Edit Form</h3>
	    	</div>
	        <div class="col">
	        	<div class="form-group row">
	        		<label>Name:  </label>
	            	<input id="product_type_edit" name="product_type_edit" type="text" value="" class="form-control" placeholder="Catalog Name">
	        	</div>
	        </div>
	        <div class="col">
	        	<div class="form-group row">
	        		<label>Active:  </label>
		            <select id="active_edit" name="active_edit" class="form-control form-control-lg">
					    <option value="0">Disable</option>
					    <option value="1">Active</option>
					</select>
	        	</div>
	        </div>
	        <div class="col">
	        	<div class="form-group row btn-wrapper">
	        		<input value="Edit" type="submit" name="edit_submit" class="btn btn-outline-success btn_accept">
	        		<input value="Cancel" type="button" style="margin-left: 10px;" class="btn btn-outline-danger btn_cancel">
	        	</div>
	        </div>
	    </div>
	</form>
</div>