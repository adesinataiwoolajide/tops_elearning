<?php 
    session_start();
    include('../connection/connection.php');
    require_once('../dev/registration/class_registration.php');
    include("../dev/general/all_purpose_class.php");
    $register = new staffRegistration($db);
    $all_purpose = new all_purpose($db);
    $return = $_SERVER['HTTP_REFERER'];
    try{
        if(isset($_POST['add-user'])){
            $eemail = $all_purpose->sanitizeInput($_POST['user_name']);
            $full_name = $all_purpose->sanitizeInput($_POST['full_name']);
            $password = $all_purpose->sanitizeInput(sha1($_POST['password']));
            $users = $eemail;
            $email = $eemail;
            $access = 1;

            if($register->checkingUserExistence($users)){
                $_SESSION['error']="Ooopss $eemail is in use by another user, Please Kindly use another E-Mail And Try Again";
	    		$all_purpose->redirect("user.php");
            }else{

                if($register->userRegistration($full_name, $eemail, $password, $access)){
                    $action ="Added $eemail Details to the User List";
                    $his = $all_purpose->getUserDetailsandAddActivity($email, $action);
                    $_SESSION['success'] = "You Have Added $eemail Details to the User List Successfully";
                    $all_purpose->redirect("user.php");
                }else{
                    $_SESSION['error']="Network Failure, Please Try Again Later";
                    $all_purpose->redirect("user.php");
                }
            }
        }else{
            $_SESSION['error']="Please FIll The Below Form To Add The User Details";
            $all_purpose->redirect("user.php");
        }
    }catch(PDOException $e){
    	$_SESSION['error'] = $e->getMessage();
    	$all_purpose->redirect("user.php");
    }


?>