<?php 
session_start();
require_once("../dev/autoload.php");
require_once("../dev/general/all_purpose_class.php");
require_once('../connection/connection.php');
$all_purpose = new all_purpose($db);
$offence = new Offence;
$return = $_SERVER['HTTP_REFERER'];
try{
    if(isset($_POST['add-offence'])){
        $email = $_SESSION['user_name'];
        $category_id =implode("," , ($_POST['category_id']));
        $offender_name = $all_purpose->sanitizeInput($_POST['offender_name']);
       
        $offender_phone = $all_purpose->sanitizeInput($_POST['offender_phone']);
        $plate_number = strtoupper($all_purpose->sanitizeInput($_POST['plate_number']));
        $vehicle_type = $all_purpose->sanitizeInput($_POST['vehicle_type']);
        $state = $all_purpose->sanitizeInput($_POST['state']);

        $local_govt = $all_purpose->sanitizeInput($_POST['local_govt']);
        $address = $all_purpose->sanitizeInput($_POST['address']);

        
        if($offence->createOffence($category_id, $offender_name, $offender_phone, $plate_number, $vehicle_type, $state, $local_govt, $address))
		{
            $action ="Added Offence for $offender_phone";
            $his = $all_purpose->getUserDetailsandAddActivity($email, $action);
            $_SESSION['success'] = "You Have Added Offence for $offender_phone Successfully";
            $all_purpose->redirect($return);
        }else{
            $_SESSION['error'] = "Network Failure, Please Try Again Later";
            $all_purpose->redirect($return);
        }
        
        
    }else{
        $_SESSION['error'] = "Please Fill The Form Below To Add The Offence Details";
        $all_purpose->redirect($return);
    }
}catch(PDOException $e){
    $_SESSION['error'] =  $e->getMessage();
    $all_purpose->redirect($return);
}
?>