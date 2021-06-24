<?php
session_start();

include 'dbconnect.php';

if(isset($_POST['adduser']))
	{
		$nama = $_POST['nama'];
		$username = $_POST['username'];
		$email = $_POST['email'];
		$password = password_hash($_POST['password'], PASSWORD_DEFAULT); 
		$tambahuser = mysqli_query($conn,"insert into login (nama, username, email, password) 
		values('$nama','$username','$email','$password')");
		if ($tambahuser){
		echo " <div class='alert alert-success'>
			Berhasil mendaftar, silakan masuk.
		  </div>

		<meta http-equiv='refresh' content='1; url= masuk.php'/>  ";

		} else { echo "<div class='alert alert-warning'>
			Gagal mendaftar, silakan coba lagi.
		  </div>
		 <meta http-equiv='refresh' content='1; url= daftar.php'/> ";
		}
		
	};

?>
<!DOCTYPE html>
<html lang="en">
<head>  
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StudyBox</title>
    <link rel="icon" href="/Assets/logo_color.svg" type="image/icon type">
    <link rel="stylesheet" href="footer.css"/> 
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
<nav class="fixed-top">
        <div class="logo2">
        <img src="Assets/logo_color.svg" style="width:2pc;height: 2pc;">
      <a class=" nav-item" href="index.php">
      <span class="logo_text">STUDY BOX</span></a>
    </div>
    <div >
        <ul class="nav-links">
          
            <div class="dropdownn" >
          <li>Course</li>
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
          </div>
            <?php
          
								if(!isset($_SESSION['log'])){
					echo '
					<li ><a href="daftar.php"> Daftar</a></li>
					<li ><a href="masuk.php">Masuk</a></li>
					';
				} else {
					
					if($_SESSION['role']=='Member'){
				
            echo ' <div class="dropdownn" >
            <li class="dropbtnn" style="width:150px;margin-left:5vh">Halo, '.$_SESSION["name"].' </li>
            <div class="dropdown-contentt">
              <li><a href="logout.php">Keluar?</a></li>
              </div>
              </div>';
					} else {
					echo '
          <div class="dropdownn" >
         <li class="dropbtn"style="width:150px;margin-left:5vh" >Halo, '.$_SESSION["name"].'</li>
            <div class="dropdown-contentt">
            <li ><a href="admin">Admin Panel</a></li>
            <li><a href="logout.php">Keluar?</a></li>
            </div></div>
					';
					};
					
				}
        
				?></li>
           
        </ul>
        </div>
        <div class="hamburger">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>
       
    </nav>
    <div class="logo2">
     
      <span class="logo_text">STUDY BOX</span>
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

    <!-- form daftar-->

    <div class="container" style="margin-top: 8%;">

        <div class="card o-hidden border-0 shadow-lg col-lg-6 my-5 mx-auto" s>
          <div class="card-body p-0">
            <div class="row">      
              <div class="col-lg">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Mulai Dengan Gratis</h1>
                  </div>
                    <form method="post">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="exampleInputEmail" placeholder="Nama" name="nama">
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="exampleInputEmail" placeholder="Username" name="username">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email" name="email">
                      </div>
                    <div class="form-group">
                      
                        <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" name="password">
                        
                      
                    </div>
                   
                    <hr>
      <button type="submit" name="adduser" class="btn btn-success form-control">Daftar</button>
                  </form>
                  <hr>
                  <div class="text-center">
                        <a class="small" >Sudah Punya akun? Lansung Login!</a>
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
    <footer class="footer-area footer--light" >
        <div class="footer-big">
          <!-- start .container -->
          <div class="container" style="padding:0px; ">
            <div class="row">
              <div class="col-xs-12 col-sm-6 col-md-3">
                <div class="footer-widget">
                  <div class="widget-about">
                    <div class="logo_footer">
                    <img src="Assets/logo_white.svg" alt="" width="40" class="mb-3">
                    <span class="logo_text_footer" style="color:white; ">STUDY BOX</span>
                    </div>
                    <h5 style="color:white; margin-top:10px"><i>Langkah pertama Anda dimulai di sini</i></h5>
                    
                  </div>
                </div>
                <!-- Ends: .footer-widget -->
              </div>
              <!-- end /.col-md-4 -->
              <div class="col-xs-12 col-sm-6 col-md-3"> 
                <div class="footer-widget">
                  <div class="footer-menu footer-menu--1">
                    <h4 class="footer-widget-title">Sitemap</h4>
                    <ul>
                      <li>
                        <a href="#">Home</a>
                      </li>
                      <li>
                        <a href="#">Tentang Kami</a>
                      </li>
                    </ul>
                  </div>
                  <!-- end /.footer-menu -->
                </div>
                <!-- Ends: .footer-widget -->
              </div>
              <!-- end /.col-md-3 -->
      
              <div class="col-xs-12 col-sm-6 col-md-3">
                <div class="footer-widget">
                  <div class="footer-menu footer-menu--1">
                    <h4 class="footer-widget-title">Kelas</h4>
                    <ul>
                      <li>
                        <a href="#">UI/UX</a>
                      </li>
                      <li>
                        <a href="#">Web Dev</a>
                      </li>
                     
                    </ul>
                  </div>
                  <!-- end /.footer-menu -->
                </div>
                <!-- Ends: .footer-widget -->
              </div>
              <!-- end /.col-lg-3 -->
      
              <div class="col-xs-12 col-sm-6 col-md-3">
                <div class="footer-widget">
                  <div class="footer-menu no-padding">
                    <h4 class="footer-widget-title">Hubungi Kami</h4>
                    <ul>
          <li><a href="#"><i class="fa fa-envelope" style="padding-right:0.3vw"></i>Email</a></li>
          <li><a href="#"><i class="fa fa-linkedin"style="padding-right:0.3vw"></i>LinkedIn</a></li>
          <li><a href="#"><i class="fa fa-whatsapp"style="padding-right:0.3vw"></i>Whatsapp</a></li>
          <li><a href="#"><i class="fa fa-instagram"style="padding-right:0.3vw"></i>Instagram</a></li>
        </ul>
                  </div>
                  <!-- end /.footer-menu -->
                </div>
                <!-- Ends: .footer-widget -->
              </div>
              <!-- Ends: .col-lg-3 -->
      
            </div>
            <!-- end /.row -->
          </div>
          <!-- end /.container -->
        </div>
        <!-- end /.footer-big -->
      
        <div class="mini-footer">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="copyright-text">
                  <p>© 2021 STUDYBOX All rights reserved.
                  </p>
                </div>
      
               
              </div>
            </div>
          </div>
        </div>
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
      $(document).ready(function() {
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 4000,
				easingType: 'linear' 
				};
			
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
    </script>
    
</body>
<script type="text/javascript">
		jQuery(document).ready(function(){
			jQuery('#demo1').skdslider({'delay':5000, 'animationSpeed': 2000,'showNextPrev':true,'showPlayButton':true,'autoSlide':true,'animationType':'fading'});
						
			jQuery('#responsive').change(function(){
			  $('#responsive_wrapper').width(jQuery(this).val());
			});
			
		});
</script>
</html>