<?php
	require_once('../header.php');
    $category = new Category;
    $offence = new Offence;
    $payment = new Payments;
    $total_payment = count($payment->getAllPayment());
?>
<div class="clearfix"></div>
	
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row pt-2 pb-2">
            <div class="col-sm-9">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="./">Home</a></li>
                    <li class="breadcrumb-item"><a href="payments.php">View Payments</a></li>
                    <li class="breadcrumb-item active" aria-current="page">List of Saved Payments</li>
                </ol>
            </div>
        </div>
        
        <div class="row">
	    	<div class="col-lg-12">
	          	<div class="card"><?php
	          		if($total_payment==0){ ?>
                        <div class="card-header" align="center" style="color: red">
                            <i class="fa fa-table"></i> The List is Empty
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