<section class="panel">
	<h2 class="panel-title">Product</h2>
	<div class="mb-md">
		<button id="add-prd" class="btn btn-dark add-prd">
			Add <i class="icon-plus"></i>
		</button>
		<div class="form-group search-area">
	        <input type="text" class="form-control" id="search_form" placeholder="Search...">
	        <label class="form-control-label" for="formGroupExampleInput"><i class="icon icon-magnify"></i>Search...</label>
    	</div>
	</div>
	<div class="card-title">
		<div class="output"></div>
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
			                <span class="column-title"></span>
			        </th>
			        <th class="secondary-text">
			            <div class="table-header">
			                <span class="column-title">Product Name</span>
			            </div>
			        </th>
			        <th class="secondary-text">
			            <div class="table-header">
			                <span class="column-title">Price</span>
			            </div>
			        </th>
			        <th class="secondary-text">
			            <div class="table-header">
			                <span class="column-title">Sale</span>
			            </div>
			        </th>
			        <th class="secondary-text">
			            <div class="table-header">
			                <span class="column-title">Details</span>
			            </div>
			        </th>
			        
			        <th class="secondary-text">
			            <div class="table-header">
			                <span class="column-title">Amount</span>
			            </div>
			        </th>
			        <th class="secondary-text">
			            <div class="table-header">
			                <span class="column-title">Type</span>
			            </div>
			        </th>
			        <th class="secondary-text">
			            <div class="table-header">
			                <span class="column-title">New</span>
			            </div>
			        </th>
			        <th class="secondary-text">
			            <div class="table-header">
			                <span class="column-title">Hot</span>
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
        		$b = 1;
        		$c = "";
        		$d = "";
        		foreach ($all_prd as $all_prd) {
        			extract($all_prd);
        			if(($a++%2)=="0"){
        				$highlight = 'table-active';
        			}
        			else{
        				$highlight = '';
        			}

        			if($check_new == '1'){
        				$c = '<p class="hidden">1</p><i style="color:green" class="icon-check"></i>';
        			}else{
        				$c = '<p class="hidden">0</p><i style="color:red" class="icon-close"></i>';
        			}
        			if($check_hot == '1'){
        				$d = '<p class="hidden">1</p><i style="color:green" class="icon-check"></i>';
        			}else{
        				$d = '<p class="hidden">0</p><i style="color:red" class="icon-close"></i>';
        			}
        			$img_prd_w = array('product_id' => $product_id);
					$img_prd = $act -> select_by_where('product_img',$img_prd_w);
					$e=0;
					$img_hiden_p="";
					foreach ($img_prd as $img_prd) {
						extract($img_prd);
						$img_hiden_p .= '<p data-idimg="'.$id_img.'" class="hidden img_'.$product_id.'">'.$href.$img_link.'</p>';
					}


					$ctg_w = array('id_prd' => $product_id);
					$ctg_select = $act -> select_by_where('ctg_prd',$ctg_w);
					$type = '';
					foreach ($ctg_select as $ctg_select) {
						extract($ctg_select);
						$ctg_name_w = array('product_type_id'=>$id_ctg);
						$ctg_name = $act -> select_by_where('product_type',$ctg_name_w);
						foreach ($ctg_name as $ctg_name) {
							extract($ctg_name);
							$type.=$product_type.'<br>';
						}
						
					}
					if ($type == "") {
						$type_show = "None Catalog";
					}
					else{
						$type_show = $type;
					}
        			echo '
					<tr class="'.$highlight.'">
		                <th scope="row">'.$b++.'</th>
		                <td>'.$img_hiden_p.'</td>
		                <td class="name_'.$product_id.'"><span>'.$product_name.'</span></td>
		                <td class="price_'.$product_id.'"><span>'.$product_price.'</span></td>
		                <td class="sale_'.$product_id.'"><span>'.$product_sale.'</span>%</td>
						<td class="detail_'.$product_id.'"><span>'.$full_detail.'</span></td>
						<td class="amount_'.$product_id.'"><span>'.$amount.'</span></td>
						<td class="type_'.$product_id.'"><span>'.$type_show.'</span></td>
						<td class="new_'.$product_id.'"><span>'.$c.'</span></td>
						<td class="hot_'.$product_id.'"><span>'.$d.'</span></td>
		                <td>
		                	<button type="button" name="edit-prd" data-id="'.$product_id.'" data-new="'.$check_new.'" data-hot="'.$check_hot.'" value="'.$product_id.'" class="btn-form edit-prd">
		                		<i style="color:blue" class="icon-pencil"></i>
		                	</button>
		                	<button type="button" style="color:red" name="del-prd" data-id="'.$product_id.'" value="'.$product_id.'" class="btn-form del-prd">
		                		<i style="color:red" class="icon-trash"></i>
		                	</button>
		                </td>
		            </tr>
        			';
        		}
        		
        	 ?>
	        </tbody>
	    </table>
	</div>
</section>

<!-- HIDDEN FORM -->
<div class="form-hidden del-form hidden" id="del-form-hidden">
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

<div class="form-hidden del-form hidden" id="del-img-hidden">
	<form method="post" enctype="multipart/form-data">
	    <div class="form-del">
	    	<div class="col">
	    		<h3>Delete This Image?</h3>
	    	</div>
	        <div class="col">
	        	<div class="form-group row btn-wrapper">
	        		<input type="hidden" value="" id="img_hidden_id" name="img_hidden_id">
	        		<input value="ACCEPT" type="submit" name="del_img_accept" class="btn btn-outline-success btn_accept">
	        		<input value="Cancel" type="button" style="margin-left: 10px;" class="btn btn-outline-danger btn_cancel">
	        	</div>
	        </div>
	    </div>
	</form>
</div>

<div class="bg-hidden hidden" id="edit_prd_hidden">
    <div class="page-content">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link btn active" id="basic-info-tab" data-toggle="tab" href="#basic-info-tab-pane" role="tab" aria-controls="basic-info-tab-pane" aria-expanded="true">Basic Info</a>
            </li>
            <li class="nav-item">
                <a class="nav-link btn" id="product-images-tab" data-toggle="tab" href="#product-images-tab-pane" role="tab" aria-controls="product-images-tab-pane">Product Images</a>
            </li>
            <div class="close-div">
                <button class="btn-form btn-close"><i class="icon-close-circle-outline"></i></button>
            </div>
        </ul>
        
        <div class="tab-content">
            <div class="tab-pane fade show active" id="basic-info-tab-pane" role="tabpanel" aria-labelledby="basic-info-tab">
                <div class="card p-6">
                    <form method="post" enctype="multipart/form-data">
			            <button class="nav-link save-edit-1 btn btn-dark" type="submit" id="save-btn" name="submit-edit">
			            	<span style="margin: 0 1rem">Save</span> <i class="icon-check-all"></i>
			            </button>

                    	<input type="hidden" id="hidden_prd_id" name="edit_hidden_prd_id" value="">
                        <div class="form-group">
                        	<label>Product Name</label>
                            <input type="text" class="form-control" name="edit_product_name" id="product_name" />
                        </div>
						<div class="form-group">
							<label>Product Price($)</label>
                            <input type="number" class="form-control" name="edit_product_price"  id="product_price" />
                            
                        </div>
                        <div class="form-group">
                        	<label>Product Sale(%)</label>
                            <input type="number" class="form-control" name="edit_product_sale"  id="product_sale" />
                            
                        </div>
                        <div class="form-group">
                        	<label>Product Description</label>
                            <textarea class="form-control" name="edit_product_detail" id="product_detail" rows="5"></textarea>
                            
                        </div>

                        <div class="form-group">
                        	<label>Categories</label>
							<select class="form-control form-control-lg" name="edit_catalog[]" id="catalog" multiple>
							    <option selected id="selected_catalog">Ctrl+Click for Multi Select</option>
							    <?php 
							    	$catalog = $act -> select_all('product_type','product_type_id');
							    	foreach ($catalog as $catalog) {
							    		extract($catalog);
							    		echo '<option value="'.$product_type_id.'">'.$product_type.'</option>';
							    	}
							     ?>
							</select>
                           
                        </div>
						 <div class="form-group">
						 	<label>Amount</label>
                            <input type="text" class="form-control" name="edit_product_amount" id="amount" />                           
                        </div>
                        <div class="form-group">
                            <div class="form-check form-check-inline">
							    <label class="form-check-label">
							        <input class="form-check-input" type="checkbox" id="new" name="edit_new" value="option1"/>
							        <span class="checkbox-icon"></span>
							        <span class="form-check-description">New</span>
							    </label>
							</div>
							<div class="form-check form-check-inline">
							    <label class="form-check-label">
							        <input class="form-check-input" type="checkbox" id="hot" name="edit_hot" value="option2"/>
							        <span class="checkbox-icon"></span>
							        <span class="form-check-description">Hot</span>
							    </label>
							</div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="tab-pane fade" id="product-images-tab-pane" role="tabpanel" aria-labelledby="product-images-tab">
                <div class="card p-6">
                    <div class="row">
                        <div class="custom-file">
                        	
                        	<form method="post" id="formUpload" enctype="multipart/form-data">    
                        		<div class="form-group">
		                        	<label>New Images</label>
		                            <select class="form-control form-control-lg" name="product_choose" id="product_choose">
									    <option>Select one</option>
									    <?php 
									    	$prd_choose = $act -> select_all('product','product_id');
									    	foreach ($prd_choose as $prd_choose) {
									    		extract($prd_choose);
									    		echo '<option value="'.$product_id.'">'.$product_name.'</option>';
									    	}
									     ?>
									</select>		                           
		                        </div>
					            
		                        <div class="form-group">
		                        	<input type="file" name="img_file[]" class="custom-file-input" id="customFile" multiple="true" onchange="previewImg(event);">
						    		<label class="custom-file-label" for="customFile">Choose new file</label>
		                        </div>
		                        <div class="box-preview-img col-12"></div>
						    	
						    	<button class="nav-link save-img-edit btn btn-dark add-img" type="submit" name="add-img"><span style="margin: 0 1rem">Save</span> <i class="icon-check-all"></i></button>
						    </form>
						    <div class="show-img"></div>
						</div>
                    </div>
                </div>
            </div>
        </div>            
    </div>
</div>