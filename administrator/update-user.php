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
            $user_id = $_POST['user_id'];
            $prev= $_POST['prev'];

            if(empty($password)){
                if($register->updateUserThedetails($user_id, $full_name, $eemail, $access)){
                    $action ="Changed User E-mail From $prev to $eemail";
                    $his = $all_purpose->getUserDetailsandAddActivity($email, $action);
                    $_SESSION['success'] = "You Have Changed User E-amil From $prev to $eemail Successfully";
                    $all_purpose->redirect("user.php");
                }else{
                    $_SESSION['error']="Network Failure, Please Try Again Later";
                    $all_purpose->redirect($return);
                }
            }else{
                if($register->updateUserdetailsWithoutPic($user_id, $full_name, $eemail, $password, $access)){
                    $action ="Changed User E-mail From $prev to $eemail and Updated the password";
                    $his = $all_purpose->getUserDetailsandAddActivity($email, $action);
                    $_SESSION['success'] = "Changed User E-amil From $prev to $eemail and Updated the password Successfully";
                    $all_purpose->redirect('user.php');
                }else{
                    $_SESSION['error']="Network Failure, Please Try Again Later";
                    $all_purpose->redirect($return);
                }
            }

            
        }else{
            $_SESSION['error']="Please FIll The Below Form To Update The User Details";
            $all_purpose->redirect($return);
        }
    }catch(PDOException $e){
    	$_SESSION['error'] = $e->getMessage();
    	$all_purpose->redirect($return);
    }


?>