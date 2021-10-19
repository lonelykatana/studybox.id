<?php
namespace Midtrans;
include 'dbconnect.php';

require_once dirname(__FILE__) . '/Midtrans.php';
session_start();
//Set Your server key
Config::$serverKey = "SB-Mid-server-QCHlBPnXYgcA2_f_yJuVHL9w";

// Uncomment for production environment
// Config::$isProduction = true;

// Enable sanitization
Config::$isSanitized = true;

// Enable 3D-Secure
Config::$is3ds = true;
$id_kelas = $_GET['id_kelas'];
$cariuser['id_user']=$_SESSION['id_user'];
$cek=$cariuser['id_user'];
// Uncomment for append and override notification URL
// Config::$appendNotifUrl = "https://example.com";
// Config::$overrideNotifUrl = "https://example.com";
$p = mysqli_fetch_array(mysqli_query($conn,"Select * from kelas where id_kelas='$id_kelas'"));
$idusr = mysqli_fetch_array(mysqli_query($conn,"Select * from login where id_user='$cek'"));
// Required
$transaction_details = array(
    'order_id' => rand(),
    'gross_amount' => 1000, // no decimal allowed for creditcard
);

// Optional
$item1_details = array(
    'id' => $p['id_kelas'],
    'price' => $p['harga_before'],
    'quantity' => 1,
    'name' => $p['nama_kelas']
);

// Optional


// Optional
$item_details = array ($item1_details);

// Optional
$billing_address = array(
    'first_name'    => $idusr['username'],
    'last_name'     => "",
    'address'       => "Mangga 20",
    'city'          => "Jakarta",
    'postal_code'   => "16602",
    'phone'         => $idusr['no_wa'],
    'country_code'  => 'IDN'
);

// Optional
$shipping_address = array(
    'first_name'    => "Obet",
    'last_name'     => "Supriadi",
    'address'       => "Manggis 90",
    'city'          => "Jakarta",
    'postal_code'   => "16601",
    'phone'         => "08113366345",
    'country_code'  => 'IDN'
);

// Optional
$customer_details = array(
    'first_name'    => $idusr['username'],
    'last_name'     => "",
    'email'         => $idusr['email'],
    'phone'         => $idusr['no_wa'],
    'billing_address'  => $billing_address,
    'shipping_address' => $shipping_address
);

// Optional, remove this to display all available payment methods
$enable_payments = array('credit_card','cimb_clicks','mandiri_clickpay','echannel');

// Fill transaction details
$transaction = array(
    'enabled_payments' => $enable_payments,
    'transaction_details' => $transaction_details,
    'customer_details' => $customer_details,
    'item_details' => $item_details,
);

$snapToken = Snap::getSnapToken($transaction);
echo "snapToken = ".$snapToken;
?>

<!DOCTYPE html>
<html>
    <body>
        <button id="pay-button">Pay!</button>
        <pre><div id="result-json">JSON result will appear here after payment:<br></div></pre> 

        <!-- TODO: Remove ".sandbox" from script src URL for production environment. Also input your client key in "data-client-key" -->
        <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-iITLWt3JRNfx6Qvu"></script>
        <script type="text/javascript">
            document.getElementById('pay-button').onclick = function(){
                // SnapToken acquired from previous step
                snap.pay('<?php echo $snapToken?>', {
                    // Optional
                    onSuccess: function(result){
                        /* You may add your own js here, this is just example */ document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                    },
                    // Optional
                    onPending: function(result){
                        /* You may add your own js here, this is just example */ document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                    },
                    // Optional
                    onError: function(result){
                        /* You may add your own js here, this is just example */ document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                    }
                });
            };
        </script>
    </body>
</html>
