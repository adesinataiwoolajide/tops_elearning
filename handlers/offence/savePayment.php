<?php
session_start();
require_once("../../dev/autoload.php");
require_once("../../connection/connection.php");
require_once("../../vendor/autoload.php");
require_once '../../dev/general/all_purpose_class.php';
$all_purpose = new all_purpose($db);
if(!isset($_SESSION['id'])){ ?>
    <script>
        window.location=('./');
    </script><?php 
    $_SESSION['error'] = "Please Register Or Login into Your Account"; 
}

    $payment = new Payments;
    $offence = new Offence;
    $return = $_SERVER['HTTP_REFERER'];

    $_SESSION['paystackReference'] = bin2hex(random_bytes(10));
    $transaction_id =$_SESSION['transactionId'];
    $payment->deletePayment($transaction_id); // delete instance of this payment
    $status =0;
    $offence_id = $_POST['offence_id'];
    $total_amount = $_POST['total_amount'];
    $savePay = $payment->createPayment($offence_id, $total_amount, $status, $transaction_id, $_SESSION['paystackReference']); //save order

    if($savePay){
        
        $_SESSION['orderAmount'] = $_POST['total_amount'];

        //Glorious Test Key
        //sk_test_3ab911f611cb52cd9ac47d872263f96536b6cb2b

        //Glorious Live Key
        //pk_live_bca47aeb1428068a1d0ae730e9f7067b6eea7ab6
        
        $paystack = new Yabacon\Paystack('sk_test_3ab911f611cb52cd9ac47d872263f96536b6cb2b');
        try
        {
          $tranx = $paystack->transaction->initialize([
            'amount'=> $_POST['total_amount'] * 100,       // in kobo
            'email'=> $_SESSION['user_name'],         // unique to customers
            'reference'=> $_SESSION['paystackReference'], // unique to transactions
          ]);


        } catch(\Yabacon\Paystack\Exception\ApiException $e){
            $_SESSION['error'] = "Unable to proceed with the transaction. Please try again";
            $all_purpose->redirect($return);       
        }

        if('success' === $tranx->data->status) {
            if(!empty($payment->updatePayment($transaction_id)) AND
                ($offence->updateOffencePayment($offence_id))){

            }else{
                $_SESSION['error'] = "Unable to update the payment Status. Please try again";
                $all_purpose->redirect($return);
            }
           
           
        }

        header('Location: ' . $tranx->data->authorization_url);    
    }else{
        $_SESSION['error'] = "Unable to proceed with the transaction. Please try again";
        $all_purpose->redirect($return);              
    }
?>