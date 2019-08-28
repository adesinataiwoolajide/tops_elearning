<?php
    require_once('../header.php');
    require_once("../dev/general/all_purpose_class.php");
    $offence_id = $_GET['offence_id'];
    $offence = new Offence;
    $category = new Category;
    $all_purpose = new all_purpose($db);
    $viewOffence = $offence->getSingleOffenceList($offence_id);

    $customer_offences = explode(",",$viewOffence['category_id']);
    $total_amount = 0;
    foreach($customer_offences as $category_id){
        $fetch = $category->getSingleCategoryList($category_id);
        $price = $total_amount += $fetch['price'];
    }
   $total =  ($total_amount);

   if(!isset($_SESSION['transactionId'])){
    $_SESSION['transactionId'] = $all_purpose->generateRandomHash(16);   
}

	
?>
<div class="clearfix"></div>
	
<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumb-->
        <div class="row pt-2 pb-2">
            <div class="col-sm-9">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="./">Home</a></li>
                    <li class="breadcrumb-item"><a href="offence-details.php?slug=<?php echo $slug ?>">View Offence Details</a></li>
                    <li class="breadcrumb-item"><a href="offence.php">Add Offence</a></li>
                    
                    <li class="breadcrumb-item active" aria-current="page">Offence Details</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4">
                <div class="card profile-card-2">
                    <div class="card-body border-top border-light">
                        <div align="center">
                            <img src="../assets/images/logo.png" 
                            alt="skill img" style="width: 200px; height:200px">
                        </div>
                        <hr>
                    </div>
                </div>
                <div class="card profile-card-2">
                    
                    <div class="card-body border-top border-light">
                       
                        
                        <div class="media align-items-center">
                            <div><img src="../assets/images/logo.png" class="skill-img" alt="skill img"></div>
                            <div class="media-body text-left ml-3">
                                <div class="progress-wrapper">
                                    <!-- <p>Stock <span class="float-right"><?php echo $add = $stock['quantity']; ?></span></p> -->
                                    <div class="progress" style="height: 5px;">
                                        <div class="progress-bar gradient-ibiza" style="width:100%"></div>
                                    </div>
                                </div>                   
                            </div>
                        </div>
                        <hr>
                        <div class="media align-items-center">
                            <div><img src="../assets/images/logo.png" class="skill-img" alt="skill img"></div>
                            <div class="media-body text-left ml-3">
                                <div class="progress-wrapper">
                                    <p>Total Money <span class="float-right">&#8358;<?php echo number_format($total); ?></span></p>
                                    <div class="progress" style="height: 5px;">
                                        <div class="progress-bar gradient-purpink" style="width:100%"></div>
                                    </div>
                                </div>                   
                            </div>
                        </div>
                        <hr>
                        <div class="media align-items-center">
                            <div><img src="../assets/images/paystack2_-_copy_1508582999.jpg" class="skill-img" 
                            style="width:50px" alt="skill img"></div>
                            <div class="media-body text-left ml-3">
                                <div class="progress-wrapper"><?php
                                    if($viewOffence['payment_status'] ==0){ ?>
                                        <p>Make Payment <span class="float-right"></span></p>
                                        <form action="../handlers/offence/savePayment.php" method="post" id="self">
                                            <script src='https://js.paystack.co/v1/inline.js'></script>
                                            <input type="hidden" name="total_amount" value="<?php echo $total; ?>"  >
                                            <input type="hidden" name="offender_name" value="<?php echo $viewOffence['offender_name'] ?>"  >
                                            <input type="hidden" name="offence_id" id="shipping" value="<?php echo $offence_id; ?>">
                                            
                                            <div class="cart_navigation"> 
                                            <button class="btn btn-success" type="submit" name="submit"><i class="fa fa-money"></i>
                                                Proceed to Payment</button> 
                                                
                                            </div>
                                        </form><?php
                                    }else{ ?>
                                        <p style="color:green">Paid</p><?php
                                    } ?>
                                </div>                   
                            </div>
                        </div>
                        <hr>
                  
                    </div>
                </div>
                
            </div>

            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                    <ul class="nav nav-tabs nav-tabs-primary top-icon nav-justified">
                        <li class="nav-item">
                            <a href="javascript:void();" data-target="#profile" data-toggle="pill" class="nav-link active"><i class="icon-user"></i> 
                            <span class="hidden-xs">More Details</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:void();" data-target="#messages" data-toggle="pill" class="nav-link"><i class="icon-list"></i> <span class="hidden-xs">Stock and Orders</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:void();" data-target="#edit" data-toggle="pill" class="nav-link"><i class="icon-note"></i> <span class="hidden-xs">Edit</span></a>
                        </li>
                    </ul>
                    <div class="tab-content p-3">
                        <div class="tab-pane active" id="profile">
                            
                            <div class="row">
                                
                                <div class="col-md-12">
                                    <h5 class="mt-2 mb-3"><span class="fa fa-clock-o ion-clock float-right"></span> Offender Details</h5>
                                        <div class="table-responsive">
                                        <table class="table table-hover table-responsive">
                                            <tbody>                                    
                                                <tr>
                                                    <td>Plate Number</td  > 
                                                    <td><?php echo $viewOffence['plate_number'] ?></td>
                                                </tr>
                                            </tbody>

                                            <tbody>                                    
                                                <tr>
                                                    <td>Offender Name</td  > 
                                                    <td><?php echo $viewOffence['offender_name'] ?></td>
                                                </tr>
                                            </tbody>

                                            <tbody>                                    
                                                <tr>
                                                    <td>Offender Phone Number</td  > 
                                                    <td><?php echo $viewOffence['offender_phone'] ?></td>
                                                </tr>
                                            </tbody>

                                            <tbody>                                    
                                                <tr>
                                                    <td>Offence Category</td  > 
                                                    <td><?php
                                                        $catego=$viewOffence['category_id'];
                                                        $cut = explode(",", $catego);
                                                        foreach($cut as $list){

                                                            $category_id = $list;
                                                            $view = $category->getSingleCategoryList($category_id);
                                                            echo $view['category_name']. ", ";
                                                        }  ?>   
                                                    </td>
                                                </tr>
                                            </tbody>

                                            <tbody>                                    
                                                <tr>
                                                    <td>Vehicle Type</td  > 
                                                    <td><?php echo $viewOffence['vehicle_type'] ?></td>
                                                </tr>
                                            </tbody>

                                            <tbody>                                    
                                                <tr>
                                                    <td>State and LGA</td  > 
                                                    <td><?php echo $viewOffence['state']. " ". $viewOffence['local_govt'] ?></td>
                                                </tr>
                                            </tbody>

                                            <tbody>                                    
                                                <tr>
                                                    <td>Residential Address</td  > 
                                                    <td><?php echo $viewOffence['address'] ?></td>
                                                </tr>
                                            </tbody>
                                            
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!--/row-->
                        </div>
                        <div class="tab-pane" id="messages">
                            <div class="row"><?php
                                foreach($offence->getOffenderPhone($viewOffence['offender_phone']) as $listPrev){ ?>
                                    <div class="col-12 col-lg-6 col-xl-4">
                                        <div class="card gradient-orange">
                                            <div class="card-body">
                                                <div class="media d-flex">
                                                    <div class="media-body">
                                                        <span class="text-white">Date of Offence</span>
                                                        <h3 class="text-white"><?php echo $add = $listPrev['time_added']; ?></h3>
                                                    </div>
                                                    <div class="w-icon">
                                                        <i class="ti-marker text-white"></i>
                                                    </div>
                                                </div>
                                                <div id="widget-chart-4"></div>
                                            </div>
                                        </div>
                                    </div> <?php
                                } ?>
                                
                                
                            </div>
                            <div class="alert alert-success alert-dismissible" role="alert">
                                
                                <div class="alert-icon">
                                    <i class="icon-info"></i>
                                </div>
                                <div class="alert-message">
                                    
                                    <span><strong>Total Product: </strong> &#8358;<?php echo $add = $stock['quantity'] ?>.</span>
                                </div>
                            </div>
                            <div class="alert alert-warning alert-dismissible" role="alert">
                                
                                <div class="alert-icon">
                                    <i class="icon-info"></i>
                                </div>
                                <div class="alert-message">
                                    
                                    <span><strong>Total Asset: </strong>&#8358; <?php echo $add * $details['amount'] ?>.</span>
                                </div>
                            </div>
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                
                                <div class="alert-icon">
                                    <i class="icon-info"></i>
                                </div>
                                <div class="alert-message">
                                    
                                    <span><strong>Total Asset: </strong>&#8358; <?php echo $add * $details['amount'] ?>.</span>
                                </div>
                            </div>
                            <div class="row">
                                
                                <div class="col-12 col-lg-6 col-xl-4">
                                    <div class="card gradient-forest">
                                        <div class="card-body">
                                            <div class="media d-flex">
                                                <div class="media-body">
                                                    <span class="text-white">Total in Stock</span>
                                                    <h3 class="text-white"><?php echo $add = $stock['quantity']; ?></h3>
                                                </div>
                                                <div class="w-icon">
                                                    <i class="ti-marker text-white"></i>
                                                </div>
                                            </div>
                                            <div id="widget-chart-4"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 col-xl-4">
                                    <div class="card gradient-army">
                                        <div class="card-body">
                                            <div class="media d-flex">
                                                <div class="media-body">
                                                    <span class="text-white">Total Assets</span>
                                                    <h3 class="text-white">&#8358;<?php echo number_format($add*$details['amount']); ?></h3>
                                                </div>
                                                <div class="w-icon">
                                                    <i class="ti-marker text-white"></i>
                                                </div>
                                            </div>
                                            <div id="widget-chart-4"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 col-xl-4">
                                    <div class="card gradient-dusk">
                                        <div class="card-body">
                                            <div class="media d-flex">
                                                <div class="media-body">
                                                    <span class="text-white">Total Order</span>
                                                    <h3 class="text-white">0</h3>
                                                </div>
                                                <div class="w-icon">
                                                    <i class="ti-marker text-white"></i>
                                                </div>
                                            </div>
                                            <div id="widget-chart-4"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="tab-pane" id="edit">
                            <form action="update-product.php" method="POST" enctype="multipart/form-data">
                                <div class="form-group row ">
                                    <div class="col-sm-6">
                                        <label for="input-6">Change Image </label>
                                        <input type="file" class="form-control form-control-rounded" name="image" 
                                        >
                                        <span style="color: red">** This Field is Optional **</span>     
                                    </div>

                                    <div class="col-sm-6">
                                        <label for="input-6">Product Name </label>
                                        <input type="text" class="form-control form-control-rounded" name="product_name" required 
                                        placeholder="Enter The Product Name" value="<?php echo $details['product_name']; ?>">
                                        <span style="color: red">** This Field is Required **</span>     
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="input-6">Category Name </label>
                                        <select class="form-control form-control-rounded" name="category_id" required>
                                            <option value="<?php echo $category_id ?>"><?php echo $cate['category_name'] ?></option>
                                            <option value=""></option><?php
                                            foreach ($category->getAllCategory() as $listType) { ?>
                                                <option value="<?php echo $listType['category_id'] ?>">
                                                    <?php echo $listType['category_name'] ?>	
                                                </option><?php
                                            } ?>
                                        </select>
                                        <span style="color: red">** This Field is Required **</span>     
                                    </div>

                                    <div class="col-sm-6">
                                        <label for="input-6">Product Type </label>
                                        <select class="form-control form-control-rounded" name="type_id" id="" required onchange="showGenre(this.value)" required>>
                                            
                                            <option value="<?php echo $type_id ?>"><?php echo $type_name ?></option>
                                            <option value=""></option><?php
                                            foreach ($type->getAllProductType() as $listType) { ?>
                                                <option value="<?php echo $listType['type_id'] ?>" selected>
                                                    <?php echo $listType['type_name'] ?>	
                                                </option><?php
                                            } ?>
                                        </select>
                                        <span style="color: red">** This Field is Required **</span>     
                                    </div>

                                    <div class="col-sm-6" id="txtHint2">
                                        <label for="input-6">Sub Type Name </label>
                                        <select class="form-control form-control-rounded" name="genre_id" id="" required>
                                            <option value="<?php echo $see['genre_id'] ?>"><?php echo $see['genre_name'] ?></option>
                                        </select>
                                        <span style="color: green">** This Field is Autoload **</span>  
                                    </div>
                                    
                                    <div class="col-sm-6">
                                        <label for="input-6">Product Weight </label>
                                        <select class="form-control form-control-rounded" name="weight_name" id="" required onchange="showAmount(this.value)" required>
                                            
                                            <option value="<?php echo $weight_id ?>"><?php echo $deel['weight_name'] ?></option>
                                            <option value=""></option>
                                            <?php foreach($weight->getAllProductWeight() as $roll) { ?>
                                                <option value="<?php echo $roll['weight_id'] ?>"><?php echo $roll['weight_name']; ?></option>
                                            <?php } ?>
                                        </select>
                                        <span style="color: red">** This Field is Required **</span>     
                                    </div>
								
                                    <div class="col-sm-6" id="txtHint3">
                                        <label for="input-6">Weight Amount </label>
                                        <select class="form-control form-control-rounded" name="weight_id" required>
                                            <option value="<?php echo $weight_id ?>"><?php echo $deel['amount'] ?></option>
                                        </select>
                                        <span style="color: green">** This Field is Autoload **</span>  
                                    </div>

                                    
                                    <div class="col-sm-6">
                                        <label for="input-6">Supplier Name </label>
                                        <select class="form-control form-control-rounded" name="author_id" required>
                                            <option value="<?php echo $author_id ?>"><?php echo $hello['author_name'] ?></option>
                                            <option value=""></option><?php
                                            foreach ($author->getAllAuthor() as $listType) { ?>
                                                <option value="<?php echo $listType['author_id'] ?>">
                                                    <?php echo $listType['author_name'] ?>	
                                                </option><?php
                                            } ?>
                                        </select>
                                        <span style="color: red">** This Field is Required **</span>     
                                    </div>

                                    <div class="col-sm-6">
                                        <label for="input-6">Manufacturer Name </label>
                                        <select class="form-control form-control-rounded" name="publisher_id" required>
                                            <option value="<?php echo $publisher_id ?>">
                                            <?php echo $hel['publisher_name']; ?></option>
                                            
                                            <option value=""></option><?php
                                            foreach ($publisher->getAllPublisher() as $listType) { ?>
                                                <option value="<?php echo $listType['publisher_id'] ?>">
                                                    <?php echo $listType['publisher_name'] ?>	
                                                </option><?php
                                            } ?>
                                        </select>
                                        <span style="color: red">** This Field is Required **</span>     
                                    </div>

                                    <div class="col-sm-6">
                                        <label for="input-6">Product Quantity</label>
                                        <input type="number" class="form-control form-control-rounded" name="quantity" required 
                                        placeholder="Enter The Quantity" value="<?php echo $details['quantity']; ?>">
                                        <span style="color: red">** This Field is Required **</span>  
                                        <input type="hidden" name="quat" value="<?php echo $details['quantity']; ?>">   
                                    </div>

                                    <div class="col-sm-6">
                                        <label for="input-6">Product Amount </label>
                                        <input type="number" class="form-control form-control-rounded" name="amount" required 
                                        placeholder="Enter The Amount" value="<?php echo $details['amount']; ?>">
                                        <span style="color: red">** This Field is Required **</span>     
                                    </div> 
                                    <div class="col-sm-6">
                                        <label for="input-6">Product Edition</label>
                                        <input type="text" class="form-control form-control-rounded" name="edition" 
                                        placeholder="Enter The Edition" value="<?php echo $details['edition']; ?>">
                                        <span style="color: green">** This Field is Optional **</span>     
                                    </div>     
                                    <div class="col-sm-12">
                                        <label for="input-12">Product Description </label>
                                        <textarea class="form-control form-control-rounded" name="description" required 
                                        placeholder="Enter The Product Description"><?php echo $details['description'] ?> </textarea>
                                        <span style="color: red">** This Field is Required **</span>     
                                    </div>    
                                    <input type="hidden" name="slug" value="<?php echo $slug ?>">
                                    
                                    <div class="col-sm-12" align="center">
                                        <button type="submit" class="btn btn-success btn-lg btn-block" name="update-product">UPDATE THE PRODUCT DETAILS</button>
                                    </div>   
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>

    </div>
    <!-- End container-fluid-->
   </div><!--End content-wrapper-->
   <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->

    <script>
	function showUser(str) {
		if (str == "") {
		    document.getElementById("txtHint").innerHTML = "";
		    return;
		} else { 
		    if (window.XMLHttpRequest) {
		        // code for IE7+, Firefox, Chrome, Opera, Safari
		        xmlhttp = new XMLHttpRequest();
		    } else {
		        // code for IE6, IE5
		        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		    }
		    xmlhttp.onreadystatechange = function() {
		        if (this.readyState == 4 && this.status == 200) {
		            document.getElementById("txtHint").innerHTML = this.responseText;
		        }
		    };
		    xmlhttp.open("GET","loadsub.php?q="+str,true);
		    xmlhttp.send();
		}
	}
</script>

<script>
	function showGenre(str) {
		if (str == "") {
		    document.getElementById("txtHint2").innerHTML = "";
		    return;
		} else { 
		    if (window.XMLHttpRequest) {
		        // code for IE7+, Firefox, Chrome, Opera, Safari
		        xmlhttp = new XMLHttpRequest();
		    } else {
		        // code for IE6, IE5
		        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		    }
		    xmlhttp.onreadystatechange = function() {
		        if (this.readyState == 4 && this.status == 200) {
		            document.getElementById("txtHint2").innerHTML = this.responseText;
		        }
		    };
		    xmlhttp.open("GET","load_new.php?genre_id="+str,true);
		    xmlhttp.send();
		}
	}

	function showAmount(str) {
		if (str == "") {
		    document.getElementById("txtHint3").innerHTML = "";
		    return;
		} else { 
		    if (window.XMLHttpRequest) {
		        // code for IE7+, Firefox, Chrome, Opera, Safari
		        xmlhttp = new XMLHttpRequest();
		    } else {
		        // code for IE6, IE5
		        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		    }
		    xmlhttp.onreadystatechange = function() {
		        if (this.readyState == 4 && this.status == 200) {
		            document.getElementById("txtHint3").innerHTML = this.responseText;
		        }
		    };
		    xmlhttp.open("GET","load_amount.php?weight_id="+str,true);
		    xmlhttp.send();
		}
	}
</script>

<?php
	require_once('../footer.php');
?>