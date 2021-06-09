<?php
session_start();

if(!isset($_SESSION['log'])){
	
} else {
	header('location:index.php');
};

include 'dbconnect.php';


	if(isset($_POST['login']))
	{
	$email = mysqli_real_escape_string($conn,$_POST['email']);
	$pass = mysqli_real_escape_string($conn,$_POST['password']);
	$queryuser = mysqli_query($conn,"SELECT * FROM login WHERE email='$email'");
	$cariuser = mysqli_fetch_assoc($queryuser);
		
		if( password_verify($pass, $cariuser['password']) ) {
			$_SESSION['id_user'] = $cariuser['id_user'];
			$_SESSION['role'] = $cariuser['role'];
			header('location:index.html');
		} else {
			echo 'Username atau password salah';
			header("location:masuk.php");
		}		
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>  
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StudyBox</title>
    <link rel="icon" href="/Assets/logo_color.svg" type="image/icon type">
    <link rel="stylesheet" href="style.css"/>
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>

<body>
  <nav class="navbar navbar-default2 navbar-expand-lg  bg-light navbar-light fixed-top" style=" box-shadow: 2px 3px 8px #888888;">
    <div class="logo2">
      <a class=" nav-item" href="index.html">
      <span class="logo_text">STUDY BOX</span></a>
    </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav menuu mr-auto ">
            <li class="nav-item dropdown teks_menu">
              <a class="nav-link dropdown" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">
              Course
              </a>
              <div class="dropdown-menu" style="width: 200px;">
                
                <a class="dropdown-item nav-item" href="Produk/produk.html">UI/UX</a>
                <a class="dropdown-item" href="Produk/produk.html">Web Developer</a>
              </div>
            </li>
            <li class="nav-item teks_menu">
              <a class="nav-link" href="daftar.html">Daftar</a>
            </li>
            <li class="nav-item teks_menu">
              <a class="nav-link" href="masuk.html">Masuk</a>
            </li>
            
           
        </div>
      </nav>

    <!-- form masuk-->

    <div class="container" style="margin-top: 5%;">

        <!-- Outer Row -->
        <div class="row justify-content-center">
      
          <div class="col-xl-5 col-lg-12 col-md-9">
      
            <div class="card o-hidden border-0 shadow-lg my-5">
              <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
      
                  <div class="col-lg-12">
                    <div class="p-5">
                      <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Masuk Ke Study Box</h1>
                      </div>                  
                <form method="post">
                        <div class="form-group">
                          <input type="text" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email" name="email">
                          
                        </div>
                        <div class="form-group">
                          <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" name="password">
                          
                        </div>
                        <hr>
      
                        <button type="submit" name="login" class="btn btn-success form-control">Masuk</button>
                      </form>
                      <hr>
      
                      <div class="text-center">
                        <a class="small">Belum punya Akun? Daftar Sekarang</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
      
          </div>
      
        </div>
      
      </div>

 

    <!-- ======= About Section ======= -->   
    <!-- product Grid-->
  
<!-- Benefit-->

  
 <!-- Footer -->
 <footer class="bg-light "style=" box-shadow: 2px 3px 8px #888888;">
  <div class="container py-5">
    <div class="row py-4">
      <div class="col-lg-4 col-md-6 mb-4 mb-lg-0 ">
        <div class="logo_footer" >
          <img src="Assets/logo_color.svg" alt="" width="40" class="mb-3">
          <span class="logo_text_footer">STUDYBOX</span>
        </div>
        
        
        <p class="font-italic text-muted" style="margin-left:2vw">Bootcamp berkualitas ,Harga Ekonomis!</p>
   
      </div>
      <div class="col-lg-2 " style="margin-left:2vw">
        <h6 class="text-uppercase font-weight-bold mb-4" style="margin-left:-0.2vw"><a href="#" class="text-muted">About Us</a></h6>
        <ul class="list-unstyled mb-0">
          <li class="mb-2"><a href="#" class="text-muted"><i class="fa fa-envelope" style="padding-right:0.3vw"></i>Email</a></li>
          <li class="mb-2"><a href="#" class="text-muted"><i class="fa fa-linkedin"style="padding-right:0.3vw"></i>LinkedIn</a></li>
          <li class="mb-2"><a href="#" class="text-muted"><i class="fa fa-whatsapp"style="padding-right:0.3vw"></i>Whatsapp</a></li>
          <li class="mb-2"><a href="#" class="text-muted"><i class="fa fa-instagram"style="padding-right:0.3vw"></i>Instagram</a></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="container text-center">
    <p class="text-muted mb-0 py-2">© 2021 STUDYBOX All rights reserved.</p>
  </div>

  <!-- Copyrights -->
 
</footer>
<!-- End -->

	<script type="text/javascript">
    $(window).scroll(function(){
      $('nav').toggleClass('scrolled', $(this).scrollTop() > 550);
    });
  </script>
  	<script type="text/javascript">
      $(window).scroll(function(){
        $('.logo').toggleClass('scrolled', $(this).scrollTop() > 550);
      });   
    </script>
    
</body>
</html>