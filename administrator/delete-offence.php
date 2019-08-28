<?php 
session_start();
require_once("../dev/autoload.php");
require_once("../dev/general/all_purpose_class.php");
require_once('../connection/connection.php');
$all_purpose = new all_purpose($db);
$category = new Category;
$offence = new Offence;
$return = $_SERVER['HTTP_REFERER'];
try{
    if(isset($_GET['offence_id'])){
        $email = $_SESSION['user_name'];
        $offence_id = $_GET['offence_id'];


        $details = $offence->getSingleOffenceList($offence_id);
        $offender_name = $details['offender_name'];
        $offender_phone = $details['offender_phone'];
        
        if($offence->deleteOffence($offence_id)){
            $action ="Deleted Offence For $offender_phone Offence Details";
            $his = $all_purpose->getUserDetailsandAddActivity($email, $action);
            $_SESSION['success'] = "You Have Deleted Offence For $offender_phone Details Successfully";
            $all_purpose->redirect($return);
        }else{
            $_SESSION['error'] = "Network Failure, Please Try Again Later";
            $all_purpose->redirect($return);
        }
        
    }else{
        $_SESSION['error'] = "Please Click On The trash Icon To Delete The Offence";
        $all_purpose->redirect($return);
    }
}catch(PDOException $e){
    $_SESSION['error'] =  $e->getMessage();
    $all_purpose->redirect($return);
}
?>