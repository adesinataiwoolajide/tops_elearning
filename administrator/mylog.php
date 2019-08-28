<?php
    require_once('../header.php');
    $email =$_SESSION['user_name'];
    $db = Database::getInstance()->getConnection();
    $detail = $db->prepare("SELECT * FROM activity WHERE user_details=:email ORDER BY act_id DESC"); 
    $arrDet = array(':email'=>$email);
    $detail->execute($arrDet); 
?>
<div class="clearfix"></div>
	
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row pt-2 pb-2">
            <div class="col-sm-9">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="./">Home</a></li>
                    <li class="breadcrumb-item"><a href="mylog.php">My Log</a></li>
                    <li class="breadcrumb-item"><a href="activities_log.php">All Activities Log</a></li>
                    
                </ol>
            </div>
        </div>
        
        <div class="row">
	    	<div class="col-lg-12">
	          	<div class="card"><?php
	          		if($detail->rowCount()==0){ ?>
                        <div class="card-header" align="center" style="color: red">
                            <i class="fa fa-table"></i> <?php echo $_SESSION['name']; ?> Activities is Empty
						</div><?php 
					}else{ ?>
						
		            
		            	<div class="card-header"><i class="fa fa-table"></i> <?php echo $_SESSION['name']; ?> Activities Log</div>
	            		<div class="card-body">
							<div class="table-responsive">
								<table id="default-datatable" class="table table-bordered">
	              					<thead>
                                        <tr>
                                            <th>S/N</th>
                                            <th>Action</th>
                                            <th>Action Time</th> 
                                        </tr>
					                </thead>

					                <tfoot>
                                        <tr>
                                            <th>S/N</th>
                                            <th>Action</th>
                                            <th>Action Time</th> 
                                        </tr>
					                </tfoot>
					                <tbody>
					                	<?php $number =1; 
										while($row = $detail->fetch()){ ?>
											<tr>
                                                <td><?php echo $number; ?></td>
                                                <td><?php echo $row['action']; ?></td>
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