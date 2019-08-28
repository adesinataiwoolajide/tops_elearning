<?php
    require_once('../header.php');
    include('../connection/connection.php');
    require_once('../dev/registration/class_registration.php');
    $register = new staffRegistration($db);
?>
<div class="clearfix"></div>
	
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row pt-2 pb-2">
            <div class="col-sm-9">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="./">Home</a></li>
                    <li class="breadcrumb-item"><a href="user.php">Add System Users</a></li>
                    <li class="breadcrumb-item active" aria-current="page">List of Saved System Users</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header"><i class="fa fa-table"></i> Please Fill The Below Form To Add New Users </div>
                    <div class="card-body">
                        <form action="update_password.php" method="POST" enctype="multipart/form-data">
                            
                            <div class="form-group row ">

                                <div class="col-sm-6">
                                	<label for="input-6">New Password </label>
                                    <input type="password" class="form-control form-control-rounded" name="password" required 
                                    placeholder="Enter The Password">
                                    <span style="color: red">** This Field is Required **</span>     
                                </div>
                                <div class="col-sm-6">
                                	<label for="input-6">Repeat Password </label>
                                    <input type="password" class="form-control form-control-rounded" name="repeat" required 
                                    placeholder="Repeat The Password">
                                    <span style="color: red">** This Field is Required **</span>     
                                </div>
                                

                                <div class="col-sm-12" align="center">
                                    <button type="submit" class="btn btn-success btn-lg btn-block" name="update_password">CHANGE THE PASSWORD </button>
                                </div>
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
       
    </div>
    <!-- End container-fluid-->
    
</div><!--End content-wrapper-->
       
        

<?php
	require_once('../footer.php');
?>