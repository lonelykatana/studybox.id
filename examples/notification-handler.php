<?php

namespace Midtrans;
session_start();
use mysqli;
$conn = mysqli_connect("localhost","stus9859_adminStudybox","Tegarbujang123.","stus9859_studybox");

require_once dirname(__FILE__) . '/../Midtrans.php';
Config::$isProduction = false;
Config::$serverKey = 'SB-Mid-server-QCHlBPnXYgcA2_f_yJuVHL9w';


$notif = new Notification();

$transaction = $notif->transaction_status;
$type = $notif->payment_type;
$order_id = $notif->order_id;
$fraud = $notif->fraud_status;
$time = $notif->transaction_time;
$price = $notif->gross_amount;

$_SESSION['idorder'] = $order_id;




$updat = "UPDATE order_list SET order_id='$order_id', payment_type='$type', transaction_status='$transaction',transaction_time ='$time',price = '$price'
            WHERE order_id=$order_id";
$queri = "INSERT INTO order_list (order_id, payment_type, transaction_status,transaction_time,price) 
    values('$order_id','$type','$transaction','$time','$price')";

if ($transaction == 'capture') {
    // For credit card transaction, we need to check whether transaction is challenge by FDS or not
    if ($type == 'credit_card') {
        if ($fraud == 'challenge') {
            // TODO set payment status in merchant's database to 'Challenge by FDS'
            // TODO merchant should decide whether this transaction is authorized or not in MAP
            echo "Transaction order_id: " . $order_id ." is challenged by FDS";
        } else {
            // TODO set payment status in merchant's database to 'Success'
            echo "Transaction order_id: " . $order_id ." successfully captured using " . $type;
        }
    }
} else if ($transaction == 'settlement') {
    // TODO set payment status in merchant's database to 'Settlement'
     $run = mysqli_query($conn,$updat);
    $_SESSION['idorder'] = $order_id;
    echo "Transaction order_id: " . $order_id ." successfully transfered using " . $type;
    echo "Transaction Status: " . $transaction;
  
    
} else if ($transaction == 'pending') {
    $_SESSION['idorder'] = $order_id;
    // TODO set payment status in merchant's database to 'Pending'
    $run = mysqli_query($conn,$queri);
  
       echo "Transaction order_id: " . $order_id ." successfully transfered using " . $type;
    echo "Transaction Status: " . $transaction;
    	

} else if ($transaction == 'deny') {
    // TODO set payment status in merchant's database to 'Denied'
    $run = mysqli_query($conn,$updat);
    echo "Payment using " . $type . " for transaction order_id: " . $order_id . " is denied.";
} else if ($transaction == 'expire') {
    // TODO set payment status in merchant's database to 'expire'
    $run = mysqli_query($conn,$updat);
    echo "Payment using " . $type . " for transaction order_id: " . $order_id . " is expired.";
} else if ($transaction == 'cancel') {
    // TODO set payment status in merchant's database to 'Denied'
    $run = mysqli_query($conn,$updat);
    echo "Payment using " . $type . " for transaction order_id: " . $order_id . " is canceled.";
}


?>