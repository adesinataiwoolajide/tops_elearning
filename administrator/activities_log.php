<?php
    require_once('../header.php');
    $db = Database::getInstance()->getConnection();
    $detail = $db->prepare("SELECT * FROM activity ORDER BY act_id DESC"); 
    $detail->execute(); 
?>
<div class="clearfix"></div>
	
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row pt-2 pb-2">
            <div class="col-sm-9">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="./">Home</a></li>
                    <li class="breadcrumb-item"><a href="mylog.php">My Log</a></li>
                    <li class="breadcrumb-item active" aria-current="page">User Activities Log</li>
                </ol>
            </div>
        </div>
        
        <div class="row">
	    	<div class="col-lg-12">
	          	<div class="card"><?php
	          		if($detail->rowCount()==0){ ?>
                        <div class="card-header" align="center" style="color: red">
                            <i class="fa fa-table"></i> User Activities is Empty
						</div><?php 
					}else{ ?>
						
		            
		            	<div class="card-header"><i class="fa fa-table"></i> User Activities Log</div>
	            		<div class="card-body">
							<div class="table-responsive">
								<table id="default-datatable" class="table table-bordered">
	              					<thead>
                                        <tr>
                                            <th>S/N</th>
                                            <th>Action</th>
                                            <th>Staff Details</th> 
                                            <th>Action Time</th> 
                                        </tr>
					                </thead>

					                <tfoot>
                                        <tr>
                                            <th>S/N</th>
                                            <th>Action</th>
                                            <th>Staff Details</th> 
                                            <th>Action Time</th> 
                                        </tr>
					                </tfoot>
					                <tbody>
					                	<?php $number =1; 
										while($row = $detail->fetch()){ ?>
											<tr>
                                                <td><?php echo $number; ?></td>
                                                <td><?php echo $row['action']; ?></td>
                                                <td><?php echo $row['user_details']; ?></td>
                                                <td><?php echo $row['time_added']; ?></td>
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