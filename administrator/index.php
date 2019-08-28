<?php
	require_once('../header.php');
    
    $category = new Category;
    $payment = new Payments;
    $offence = new Offence;
    $register = new staffRegistration($db);
    $total_payment = count($payment->getAllPayment());
   
?>
<div class="clearfix"></div>
	
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card mt-3 gradient-forest">
            <div class="card-content">
                <div class="row row-group m-0"  style="cursor: pointer">
                    <div class="col-12 col-lg-6 col-xl-3 border-white-2" onclick="location.href='payments.php'">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <div class="media-body text-left">
                                    <h4 class="mb-0 text-white">&#8358;<?php echo number_format($payment->sumAllPayments()); ?></h4>
                                    <span class="text-white">Total <br>Revenue</span>
                                </div>
                                <div class="align-self-center w-icon">
                                    <i class="icon-basket-loaded text-white"></i></div>
                            </div>
                            <div class="progress-wrapper mt-3">
                                <div class="progress" style="height:5px;">
                                    <div class="progress-bar" style="width:50%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 col-xl-3 border-white-2" onclick="location.href='user.php'">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <div class="media-body text-left">
                                    <h4 class="mb-0 text-white"><?php echo number_format($register->sumAllUser()); ?></h4>
                                    <span class="text-white">Total<br> Users</span>
                                </div>
                                <div class="align-self-center w-icon">
                                    <i class="icon-user text-white"></i></div>
                            </div>
                            <div class="progress-wrapper mt-3">
                                <div class="progress" style="height:5px;">
                                    <div class="progress-bar" style="width:50%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 col-xl-3 border-white-2" onclick="location.href='categories.php'">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <div class="media-body text-left">
                                    <h4 class="mb-0 text-white"><?php echo number_format($category->sumAllCategory()); ?></h4>
                                    <span class="text-white">Offence  <br>Categories</span>
                                </div>
                                <div class="align-self-center w-icon">
                                    <i class="icon-pie-chart text-white"></i></div>
                            </div>
                            <div class="progress-wrapper mt-3">
                                <div class="progress" style="height:5px;">
                                    <div class="progress-bar" style="width:50%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 col-xl-3 border-white-2" onclick="location.href=''">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <div class="media-body text-left">
                                    <h4 class="mb-0 text-white"><?php echo number_format($offence->sumAllOffence()); ?></h4>
                                    <span class="text-white">New <br> Offence</span>
                                </div>
                                <div class="align-self-center w-icon">
                                    <i class="icon-bell text-white"></i></div>
                            </div>
                            <div class="progress-wrapper mt-3">
                                <div class="progress" style="height:5px;">
                                    <div class="progress-bar" style="width:50%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
	    	<div class="col-lg-12">
	          	<div class="card"><?php
	          		if($total_payment==0){ ?>
                        <div class="card-header" align="center" style="color: red">
                            <i class="fa fa-table"></i> The Payment List is Empty
						</div><?php 
					}else{ ?>
						
		            
		            	<div class="card-header"><i class="fa fa-table"></i> List of Saved Payments</div>
	            		<div class="card-body">
							<div class="table-responsive">
								<table id="default-datatable" class="table table-bordered">
	              					<thead>
					                    <tr>
					                        <th>S/N</th>
                                            <th>Offerder Name</th>
                                            <th>Payment ID</th>
                                            <!-- <th>Paystack ID</th> -->
                                            <th>Offence</th>
                                            <th>Amount</th>
                                            <th>Payment</th>
					                    </tr>
					                </thead>

					                <tfoot>
					                    <tr>
                                        <th>S/N</th>
                                            <th>Offerder Name</th>
                                            <th>Payment ID</th>
                                            <!-- <th>Paystack ID</th> -->
                                            <th>Offence</th>
                                            <th>Amount</th>
                                            <th>Payment</th>
					                    </tr>
					                </tfoot>
					                <tbody>
					                	<?php $number =1; 
										foreach($payment->getAllPayment() as $listOffence) {
                                            $offence_id = $listOffence['offence_id'];
                                            $details = $offence->getSingleOffenceList($offence_id);
                                            $catego = $details['category_id'];
                                            
                                            $cut = explode(",", $catego);
                                            ?>
											<tr>
												<td><?php echo $number; ?>
													
												</td>
                                                <td><?php echo $details['offender_name'] ?></td>
                                                <td><?php echo $listOffence['transaction_id'] ?></td>
                                                
                                                <td><?php 
                                                    foreach($cut as $list){

                                                       $category_id = $list;
                                                       $view = $category->getSingleCategoryList($category_id);
                                                       echo $view['category_name']. ", ";
                                                    }
                                                ?></td>

                                                <td>&#8358;<?php echo $listOffence['total_amount'] ?>
                                                   
                                                </td>
                                                <td><?php 
                                                if($listOffence['status'] == 0){ ?>
                                                    <p style="color:red">Failed</p><?php
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