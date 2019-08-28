<?php
    require_once('../header.php');
    include('../connection/connection.php');
    require_once('../dev/registration/class_registration.php');
    $register = new staffRegistration($db);
    $user_name= $_GET['user_name'];
    $details = $register->gettingUserDetails($user_name);
?>
<div class="clearfix"></div>
	
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row pt-2 pb-2">
            <div class="col-sm-9">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="./">Home</a></li>
                    <li class="breadcrumb-item"><a href="edit-user.php?user_name=<?php echo $user_name ?>">Edit Users</a></li>
                    <li class="breadcrumb-item"><a href="user.php">Add System Users</a></li>
                    <li class="breadcrumb-item active" aria-current="page">List of Saved System Users</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header"><i class="fa fa-table"></i> Please Fill The Below Form To Update The User </div>
                    <div class="card-body">
                        <form action="update-user.php" method="POST" enctype="multipart/form-data">
                            
                            <div class="form-group row ">
                                
                                <div class="col-sm-4">
                                	<label for="input-12">Full Name </label>
                                    <input type="text" class="form-control form-control-rounded" name="full_name" required 
                                    placeholder="Enter The Full Name" value="<?php echo $details['full_name'] ?>">
                                    <span style="color: red">** This Field is Required **</span>     
                                </div>
                                <div class="col-sm-4">
                                	<label for="input-12">E-Mail </label>
                                    <input type="email" class="form-control form-control-rounded" name="user_name" required 
                                    placeholder="Enter The User Name" value="<?php echo $user_name ?>">
                                    <span style="color: red">** This Field is Required **</span>     
                                </div>
                                <div class="col-sm-4">
                                	<label for="input-12">Password </label>
                                    <input type="password" class="form-control form-control-rounded" name="password" 
                                    placeholder="Enter The Password">
                                    <span style="color: green">** This Field is Optional **</span>     
                                </div>

                                <div class="col-sm-12" align="center">
                                    <button type="submit" class="btn btn-success btn-lg btn-block" name="add-user">UPDATE THE USER </button>
                                </div>
                                <input type="hidden" name="user_id" value="<?php echo $details['user_id'] ?>">
                                <input type="hidden" name="prev" value="<?php echo $user_name?>">
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
	    	<div class="col-lg-12">
	          	<div class="card"><?php
	          		if($register->viewAllUsers()==0){ ?>
                        <div class="card-header" align="center" style="color: red">
                            <i class="fa fa-table"></i> The List is Empty
						</div><?php 
					}else{ ?>

		            
		            	<div class="card-header"><i class="fa fa-table"></i> List of Saved System Userss</div>
	            		<div class="card-body">
	              			<div class="table-responsive">
								<table id="default-datatable" class="table table-bordered">
	              					<thead>
					                    <tr>
					                        <th>S/N</th>
					                        <th>Full Name</th>
                                            <th>E-Mail</th>
                                            <!-- <th>Category</th> -->
					                    </tr>
					                </thead>

					                <tfoot>
					                    <tr>
                                            <th>S/N</th>
					                        <th>Full Name</th>
                                            <th>E-Mail</th>
                                            <!-- <th>Category</th> -->
					                    </tr>
					                </tfoot>
					                <tbody>
					                	<?php $number =1; 
										foreach($register->viewAllUsers() as $listUser) {
                                            $username = $listUser['user_name'];
											?>
											<tr>
												<td><?php echo $number; ?>
													<a href="delete-user.php?user_name=<?php echo $username ?>" class="btn btn-danger" onclick="return(confirmToDelete());"><i class="fa fa-trash-o"></i></a>
													<a href="edit-user.php?user_name=<?php echo $username ?>" class="btn btn-success" onclick="return(confirmToEdit());"><i class="fa fa-pencil"></i></a>
												</td>
												<td><?php echo $listUser['full_name'] ?></td>
												<td><?php echo $listUser['user_name'] ?></td>
                                                <!-- <td>Manager</td> -->
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