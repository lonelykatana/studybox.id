<?php
namespace Midtrans;
session_start();
include 'dbconnect.php';
$id_kelas = $_GET['id_kelas'];
$cariuser['id_user']=$_SESSION['id_user'];
$cek=$cariuser['id_user'];
/*if(isset($_POST['buyclass'])){
    echo " <div class='alert alert-success'>
    <script>alert('Berhasil mendaftar, Selanjutnya akan kami hubungi melalui whatsapp ya. Terima Kasih')</script>	
      </div>
    <meta http-equiv='refresh' content='1; url= index.php'/>  ";

}
*/
$base = $_SERVER['REQUEST_URI'];

require_once dirname(__FILE__) . '/Midtrans.php';

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
$customer_details = array(
    'first_name'    => $idusr['username'],
    'last_name'     => "",
    'email'         => $idusr['email'],
    'phone'         => $idusr['no_wa'],
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

if(isset($_POST["addData"])){
    $orderid = $_POST['order_id'];
    $iduser = $_POST['id_user'];
    $nama = $_POST['nama'];
    $nama_kelas = $_POST['nama_kelas'];
    $trs_status = $_POST['trs_status'];
    $queri = "INSERT INTO transaksi (order_id, id_user,nama_kelas) values('$orderid','$iduser','$nama_kelas')";
    
    $sql = mysqli_query($conn,$queri);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
          content="Demo application to show you the process of endTo-end payment using Jokul Checkout">

    <title>Studybox Checkout Payment</title>
    <link rel="icon" href="Assets/logo_color.svg" type="image/icon type">
    <link rel="stylesheet" href="footer.css"/> 
    <link rel="stylesheet" href="produk.css"/>
    <link rel="stylesheet" href="style2.css"/>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Caveat' rel='stylesheet'>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <!-- Load Jokul Checkout JS script -->  
</head>

<body  style="background-color:rgb(247,247,247)">
<nav class="navbar navbar-expand-md bg-putih navbar-light">
<div class="logo2">
        <img src="Assets/logo_color.svg" style="width:2pc;height: 2pc;">
      <a class=" nav-item" href="index">
      <span class="logo_text">STUDY BOX</span></a>
    </div>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav" style="margin-left:auto">

<!-- Dropdown -->
<li class="nav-item dropdownn" >
<a  class="nav-link" style="margin-right:20px;">Course<i class="fa fa-caret-down" style="margin-left:8px"></i></span></a>
            <div class="dropdown-contentt">
            <?php 
														$kat=mysqli_query($conn,"SELECT * from kelas order by id_kelas ASC");
														while($p=mysqli_fetch_array($kat)){
															?>
              <a style="font-size:1rem;"href="produk.php?id_kelas=<?php echo $p['id_kelas'] ?>"><?php echo $p['nama_kelas'] ?></a>
              <?php
																	}
														?>
            </div>
          </li>
<li class="nav-item dropdown">
<?php
								if(!isset($_SESSION['log'])){
					echo '		
      <ul class="nav3">
      <li class="nav-item nav3">
        <a class="nav-link nav2" href="masuk">Masuk</a>
      </li>
      <li class="nav-item nav3">
        <a class="nav-link nav1" href="daftar">Daftar</a>
      </li>    
      </ul>
      ';
				} else {
					if($_SESSION['role']=='Member'){
				
            echo '

            <li class="nav-item dropdownn" >
          <a  class="nav-link"> <h6>Halo, '.$_SESSION["name"].'<i class="fa fa-caret-down" style="margin-left:8px"></i></h6></a>
            <div class="dropdown-contentt">

            <a style="font-size:1rem;"href="profil">Profil Saya</a>
            <a style="font-size:1rem;"href="logout">Keluar</a>
           
          </li>

            ';
					}
           else if($_SESSION['role']=='Admin') {
            $_SESSION['login_admin']=true;
					echo '
          <li class="nav-item dropdownn" >
          <a  class="nav-link"><h6>Halo, '.$_SESSION["name"].' <i class="fa fa-caret-down" style="margin-left:8px"></i></h6></a>
            <div class="dropdown-contentt">
            <a style="font-size:1rem;"href="admin">Admin Panel</a>
            <a style="font-size:1rem;"href="logout">Keluar</a>
            </div>
          </li>
					';
					}
          ;	
				}
				?>
    </ul>
  </div>  
</nav>
<?php 
				$p = mysqli_fetch_array(mysqli_query($conn,"Select * from kelas where id_kelas='$id_kelas'"));

				?>
<div class="container" style="padding-top: 3vh">
    <div class="row d-flex">
        <div class="col-12 col-md-5 order-md-2 mb-4 mb-md-0">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span>Cart</span>
               
            </h4>

            <ul class="list-group mb-3">
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div class="d-flex">
                        <div class="mr-4">
                            <h6 class="my-0"><?php echo $p['nama_kelas'] ?> </h6>
                            <small class="text-muted">8 Pertemuan</small>
                        </div>
                        <div class="form-group" style="margin-left: 1vh;">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text dk-span-group">IDR</span>
                                </div>
                                <input type="number" class="form-control" id="amount" placeholder="120000"
                                       value="<?php echo $p['harga_before'] ?>" disabled>
                            </div>
                        </div>

                    </div>

                </li>
            </ul>   
        </div>
        <?php 
											$brgs=mysqli_query($conn,"SELECT * from login WHERE id_user=$cek ");										
											while($p=mysqli_fetch_array($brgs)){

												?>
        <div class="col-12 col-md-7 order-md-1">
            <h4>Checkout</h4>
            <form  method="POST" novalidate>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label>Name</label>
                                    <input type="text" class="form-control" id="customerName" 
                                           placeholder=" "
                                           value="<?php echo $p['nama']  ?>" required>
                                    <div class="invalid-feedback">
                                        Valid name is required.
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label>Email</label>
                                    <input type="email" class="form-control" id="email" 
                                           placeholder="you@example.com"
                                           value="<?php echo $p['email']  ?>" required>
                                    <div class="invalid-feedback">
                                        Please enter a valid email address for shipping updates.
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label>Phone Number</label>
                                    <input type="text" class="form-control" id="phoneNumber" 
                                           placeholder="6281111111111"
                                           value="<?php echo $p['no_wa']  ?>" required>
                                    <div class="invalid-feedback">
                                        Please enter a valid phone number for shipping updates.
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="pekerjaan">Pekerjaan</label>
                                    <input type="text" class="form-control " id="address"
                                           placeholder="Website Developer" 
                                           value="<?php echo $p['pekerjaan']  ?>" required>

                                </div>
                                <?php 
											}	
											?>
                                            
                                            <input type="hidden" name="amount" value="<?php echo $p['harga_before'] ?>"/>  
                                            <p id="pay-button">Pay!</p>
                                         
                                             
                                         
											
                                              
                            </div>
                           
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>

    <?php include("partials/footer.php") ?>

<div id="myModal2" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                
            </div>
            <div class="modal-body">
				<p>Subscribe to our mailing list</p>
				    <?php 
											$brgs=mysqli_query($conn,"SELECT * from login WHERE id_user=$cek ");										
											while($q=mysqli_fetch_array($brgs)){

												?>
									<form  method="POST" action="" >
									     <label>Order</label>
                            <div class="form-group">
                                <input type="hidden" class="form-control"id="myData2" name="order_id" value="">
                                </div>
                                      <div class="form-group">
                                        <input  type="hidden"class="form-control" type="hidden" name="id_user" value="<?php echo $q['id_user']  ?>">
                                      </div>
                                   <div class="form-group">
                                       <label>Nama</label>
                                         <input  class="form-control" name="nama" value="<?php echo $q['nama']  ?>">
                                      </div>
                                      <div class="form-group">
                                             <label>Transaksi Status</label>
                                         <input  class="form-control" id="data_trs" name="trs_status" value="">
                                      </div>
                                    
                                                                                  <?php 
											}	
											?>
											<?php 
				$p = mysqli_fetch_array(mysqli_query($conn,"Select * from kelas where id_kelas='$id_kelas'"));

				?>
				                      <div class="form-group">
                                     	<input class="form-control" name="nama_kelas" value="<?php echo $p['nama_kelas']  ?>">	
                                      </div>
									   <div class="form-group">
									   <button name="addData"  class="btn btn-primary">Ok</button>
                                      </div>
                                   
                                              </form>
                                              

		
            </div>
        </div>
    </div>
</div>

  
       
   </script>
<!-- End -->
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-iITLWt3JRNfx6Qvu"></script>
        <script type="text/javascript">
            document.getElementById('pay-button').onclick = function(){
                // SnapToken acquired from previous step
                snap.pay('<?php echo $snapToken?>', {
               onSuccess: function(result)
               {console.log('success');
               console.log(result.order_id);},
                onPending: function(result){
            
	          jQuery.noConflict();
              $('#myModal2').modal('show');
       
              
	       document.getElementById("myData2").value = result.order_id;
	       document.getElementById("data_trs").value = result.transaction_status;
	     
                },
                     
                onError: function(result){
                    console.log('error');
                    console.log(result);},
                onClose: function(){
                    console.log('customer closed the popup without finishing the payment');}
               });
        }
        </script>
   
<script src="js/product.js"></script>
<script src="js/jquery-3.2.1.min.js"></script>
<script src="script.js"></script>
</body>
</html>
