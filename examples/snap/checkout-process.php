<?php

namespace Midtrans;
include 'dbconnect.php';

require_once dirname(__FILE__) . '/../../Midtrans.php';


//Set Your server key
Config::$serverKey = "SB-Mid-server-QCHlBPnXYgcA2_f_yJuVHL9w";

// Uncomment for production environment
// Config::$isProduction = true;

// Enable sanitization
Config::$isSanitized = true;

// Enable 3D-Secure
Config::$is3ds = true;

// Uncomment for append and override notification URL
Config::$appendNotifUrl = "http://cisti.studybox.id/examples/notification-handler.php";
Config::$overrideNotifUrl = "http://cisti.studybox.id/examples/notification-handler.php";

// Required
$transaction_details = array(
    'order_id' => rand(),
    'gross_amount' => 1000, // no decimal allowed for creditcard
);

// Optional
$item1_details = array(
    'id' => 'a1',
    'price' => 18000,
    'quantity' => 1,
    'name' => "Apple"
);

// Optional
$item2_details = array(
    'id' => 'a2',
    'price' => 20000,
    'quantity' => 2,
    'name' => "Orange"
);

// Optional
$item_details = array ($item1_details, $item2_details);

// Optional
$billing_address = array(
    'first_name'    => "Andri",
    'last_name'     => "Litani",
    'address'       => "Mangga 20",
    'city'          => "Jakarta",
    'postal_code'   => "16602",
    'phone'         => "081122334455",
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
    'first_name'    => "Andri",
    'last_name'     => "Litani",
    'email'         => "andri@litani.com",
    'phone'         => "081122334455",
    'billing_address'  => $billing_address,
    'shipping_address' => $shipping_address
);


    
// Fill transaction details
$transaction = array(
    
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
              
                        window.location.replace("http://cisti.studybox.id/examples/snap/sukses.php");
                    },  
                    // Optional
                    onPending: function(result){
                        
                        window.location.replace("http://cisti.studybox.id/examples/snap/pending.php");
                    },
                    // Optional
                    onError: function(result){
                        window.location.replace("http://cisti.studybox.id/examples/snap/error.php");
                    }
            });
        }
        </script>
    </body>
</html>
