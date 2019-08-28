<?php
	require_once('../header.php');
    $category = new Category;
    $offence = new Offence;
    $total_offence = count($offence->getAllOffence());
?>
<div class="clearfix"></div>
	
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row pt-2 pb-2">
            <div class="col-sm-9">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="./">Home</a></li>
                    <li class="breadcrumb-item"><a href="offence.php">Add Offence</a></li>
                    <li class="breadcrumb-item active" aria-current="page">List of Saved Offences</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header"><i class="fa fa-table"></i> Please Fill The Below Form To Add New Offence </div>
                    <div class="card-body">
                        <form action="process-offence.php" method="POST" enctype="multipart/form-data">
                            
                            <div class="form-group row ">

                                <div class="col-sm-3">
                                	<label for="input-6">Offence Category </label>
                                    <select class="form-control form-control-rounded" style="height:50px" name="category_id[]" required multiple>
                                    	<option value="">-- Select Category --</option>
                                    	<option value=""></option><?php
                                    	foreach ($category->getAllCategory() as $listType) { ?>
                                    		<option value="<?php echo $listType['category_id'] ?>">
                                    			<?php echo $listType['category_name']. " &#8358;". number_format($listType['price']) ?>	
                                    		</option><?php
                                    	} ?>
                                    </select>
                                    <span style="color: red">** This Field is Required **</span>     
                                </div>
								
                                <div class="col-sm-3">
                                	<label for="input-6">Offender Name </label>
                                    <input type="text" class="form-control form-control-rounded" name="offender_name" required 
                                    placeholder="Enter The Offender Name">
                                    <span style="color: red">** This Field is Required **</span>     
                                </div>
								
								<div class="col-sm-3">
                                	<label for="input-6">Offender Phone Number </label>
                                    <input type="number" class="form-control form-control-rounded" name="offender_phone" required 
                                    placeholder="Enter The Offender Phone Number">
                                    <span style="color: red">** This Field is Required **</span>     
                                </div>

                                <div class="col-sm-3">
                                	<label for="input-6">Plate Number </label>
                                    <input type="text" class="form-control form-control-rounded" name="plate_number" required 
                                    placeholder="Enter The Plate Number">
                                    <span style="color: red">** This Field is Required **</span>     
                                </div>

                                <div class="col-sm-3">
                                	<label for="input-6">Vehicle Type </label>
                                    <select class="form-control form-control-rounded" name="vehicle_type" required>
                                    	<option value="">-- Select Vehicle --</option>
                                        <option value=""></option><?php
                                        $vehicle = array("Car", "Lorry", "Truck", "Bike", "Keke", "Others");
                                    	foreach ($vehicle as $vehicles) { ?>
                                    		<option value="<?php echo $vehicles ?>">
                                    			<?php echo $vehicles ?>	
                                    		</option><?php
                                    	} ?>
                                    </select>
                                    <span style="color: red">** This Field is Required **</span>     
                                </div>
								
								
                                <div class="col-sm-3">
                                    <label> State</label>
                                    <select class="form-control form-control-rounded" name="state" 
                                        required onchange="useSelectedItem(this)" id="theStates">
                                        <option value=""> -- Select The State -- </option> 
                                        
                                        <option value=""></option>
                                        <option value="Adamawa">Abia State</option>
                                        <option value="Anambra">Anambra State</option>
                                        <option value="Bauchi">Bauchi State</option>
                                        <option value="Bayelsa">Bayelsa State</option>
                                        <option value="Benue">Benue State</option>
                                        <option value="Borno">Borno State</option>
                                        
                                        <option value="Delta">Delta State</option>
                                        <option value="Ebonyi">Ebonyi State</option>
                                        <option value="Edo">Edo State</option>
                                        <option value="Ekiti">Ekiti State</option>
                                        <option value="Enugu">Enugu State</option>
                                        <option value="Gombe">Gombe State</option>
                                        <option value="Imo">Imo State</option>
                                        <option value="Jigawa">Jigawa State</option>
                                        <option value="Kaduna">Kaduna State</option>
                                        <option value="Kano">Kano State</option>
                                        <option value="Katsina">Katsina State</option>
                                        <option value="Kebbi">Kebbi State</option>
                                        <option value="Kogi">Kogi State</option>
                                        <option value="Kwara">Kwara State</option>
                                        <option value="Lagos">Lagos</option>
                                        <option value="Nasarawa">Nasarawa State</option>
                                        <option value="Niger">Niger State</option>
                                        <option value="Ogun">Ogun State</option>
                                        <option value="Ondo">Ondo State</option>
                                        <option value="Osun">Osun State</option>
                                        <option value="Oyo">Oyo State</option>
                                        <option value="Plateau">Plateau State</option>
                                        <option value="Rivers">Rivers State</option>
                                        <option value="Sokoto">Sokoto State</option>
                                        <option value="Taraba">Taraba State</option>
                                        <option value="Yobe">Yobe State</option>
                                        <option value="Zamfara">Zamfara State</option>
                                        <option value="FCT">FCT</option>
                                    <select>
                                    <span style="color: red">** This Field is Required **</span>

                                </div>
                                <div class="col-sm-3">
                                    <label> Local Govt</label>
                                    <select class="form-control form-control-rounded" id="locaGv" name="local_govt" required>
                                        <option value=""> -- Select The Category -- </option>
                                        <option value=""> </option>
                                    <select>
                                    <span style="color: red">** This Field is Required **</span>
                                    

                                </div>

                                <div class="col-sm-3">
                                	<label for="input-6">Residential Address </label>
                                    <textarea class="form-control form-control-rounded" name="address" required 
                                    placeholder="Enter The Offender Address"></textarea>
                                    <span style="color: red">** This Field is Required **</span>     
                                </div>
                                
                                <div class="col-sm-12" align="center">
                                    <button type="submit" id="" class="btn btn-success btn-lg btn-block" role="status" name="add-offence">ADD THE OFFENCE 
                                    </button>
                                </div>   
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
	    	<div class="col-lg-12">
	          	<div class="card"><?php
	          		if($total_offence==0){ ?>
                        <div class="card-header" align="center" style="color: red">
                            <i class="fa fa-table"></i> The List is Empty
						</div><?php 
					}else{ ?>
						
		            
		            	<div class="card-header"><i class="fa fa-table"></i> List of Saved Offences</div>
	            		<div class="card-body">
							<div class="table-responsive">
								<table id="default-datatable" class="table table-bordered">
	              					<thead>
					                    <tr>
					                        <th>S/N</th>
                                            <th>Offerder Name</th>
                                            <th>Offerder Phone</th>
                                            <th>Offence Category</th>
                                            <th>Total Money</th>
                                            <th>Payment</th>
					                    </tr>
					                </thead>

					                <tfoot>
					                    <tr>
                                            <th>S/N</th>
                                            <th>Offerder Name</th>
                                            <th>Offerder Phone</th>
                                            <th>Offence Category</th>
                                            <th>Total Money</th>
                                            <th>Payment</th>
					                    </tr>
					                </tfoot>
					                <tbody>
					                	<?php $number =1; 
										foreach($offence->getAllOffence() as $listOffence) {
											$offence_id = $listOffence['offence_id'];
                                            $catego=$listOffence['category_id'];
                                            $cut = explode(",", $catego);
                                            ?>
											<tr>
												<td><?php echo $number; ?>
													<a href="delete-offence.php?offence_id=<?php echo $offence_id ?>" class="" onclick="return(confirmToDelete());"><i class="fa fa-trash-o"></i></a>
                                                    <a href="edit-offence.php?offence_id=<?php echo $offence_id ?>" class="" onclick="return(confirmToEdit());"><i class="fa fa-pencil"></i></a>
                                                    
                                                    <a href="offence_details.php?offence_id=<?php echo $offence_id ?>" class=""><i class="fa fa-list"></i></a>
													
												</td>
                                                <td><?php echo $listOffence['offender_name'] ?></td>
                                                <td><?php echo $listOffence['offender_phone'] ?></td>
                                                <td><?php 
                                                    foreach($cut as $list){

                                                       $category_id = $list;
                                                       $view = $category->getSingleCategoryList($category_id);
                                                       echo $view['category_name']. ", ";
                                                    }
                                                ?></td>

                                                <td>&#8358;<?php
                                                
                                                    $customer_offences = explode(",",$listOffence['category_id']);
                                                    $total_amount = 0;
                                                    foreach($customer_offences as $category_id){
                                                        $fetch = $category->getSingleCategoryList($category_id);
                                                        $price = $total_amount += $fetch['price'];
                                                    }
                                                    echo number_format($total_amount);
                                                   
                                                ?></td>
                                                <td><?php 
                                                if($listOffence['payment_status'] == 0){ ?>
                                                    <p style="color:red">Pending</p><?php
                                                }else{ ?>
                                                    <p style="color:green">Paid</p><?php
                                                } ?></td>
											</tr><?php
											$number++; 
										}?>
						                
					                </tbody>
					               
	              				</table>
	              			</div>
	              		</div><?php
	             	} ?>
					 
              	</div>
            </div>
        </div>
        
    </div>
    <!-- End container-fluid-->
    
</div><!--End content-wrapper-->


<?php
	require_once('../footer.php');
?>