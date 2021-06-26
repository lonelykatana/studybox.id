<?php
session_start();
include 'dbconnect.php';
if(isset($_POST['addprod'])){
	if(!isset($_SESSION['log']))
		{	
			header('location:masuk.php');
		}
    else{
      header('location:produk.php');
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
    <link rel="icon" href="Assets/logo_color.svg" type="image/icon type">
    <link rel="stylesheet" href="footer.css"/> 
    <link rel="stylesheet" href="produk.css"/>
    <link rel="stylesheet" href="style.css"/>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href='https://fonts.googleapis.com/css?family=Caveat' rel='stylesheet'>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/v4-shims.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</head>
<body style="background-color: rgb(247,247,247);">
<nav class="fixed-top">
        <div class="logo2">
        <img src="Assets/logo_color.svg" style="width:2pc;height: 2pc;">
      <a class=" nav-item" href="index.php">
      <span class="logo_text">STUDY BOX</span></a>
    </div>
    <div >
        <ul class="nav-links">
          
            <div class="dropdownn" >
          <li style="padding-left:8%;margin-top: 10%;"><span style="display: flex;flex-direction:row;margin-top:-0.4vw;">Course  <i class="fa fa-caret-down" style="margin-top:0.3vw;margin-left:0.4vw"></i></span></li>
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
					<li class="nav-menu"><a href="daftar.php"> Daftar</a></li>
					<li class="nav-menu"><a href="masuk.php">Masuk</a></li>
					';
				} else {
					if($_SESSION['role']=='Member'){
				
            echo '
            <div class="dropdownn" style="margin-top:0.4vw;margin-left:9vh">
            <li class="nav-menu" style="width:200px; " > <h6>Halo, '.$_SESSION["name"].'  <i class="fa fa-caret-down" style="margin-left:0.2vw;margin-top:0.1vw"></i></h6> </li>
            <div class="dropdown-contentt" >
              <li ><a href="logout.php">Keluar?</a></li>
              </div>
              </div>';
					} else {
					echo '
          <div class="dropdownn"  style="margin-top:0.4vw;margin-left:9vh">
         <li class="nav-menu" style="width:200px; "  ><h6>Halo, '.$_SESSION["name"].'  <i class="fa fa-caret-down" style="margin-left:0.2vw;margin-top:0.1vw"></i></h6> </li>
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
       <!-- ======= About Section ======= -->
    <section id="about" class="about" style="padding-bottom:3vw" >
        <div class="text-center">
          <h2 class="section-heading text-uppercase" style="margin-top: px;font-size:2.2vw">Tentang kami</h2><br>
         <!--<h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>--> 
      </div>
        <div class="container" data-aos="fade-up">
          
          <div class="row gx-0">
  
            <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
              
              <div class="content">
           
                <h2 style="margin-top:-10%">StudyBox</h2><br>
                <p>
                    Studybox adalah sebuah startup yang bergerak dalam bidang online course, mengedepankan tingkatan materi yang mendasar dan 
                    dikemas secara bertahap dan mendetail dalam sebuah lingkungan komunitas belajar yang suportif
                </p>
              
              </div>
            </div>
  
            <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
              <img src="Assets/content1.jpeg" class="img-fluid" alt="" style="width: 65%;border-radius: 8px;margin-left: 10%;">
            </div>
  
          </div>
        </div>
  
      </section><!-- End About Section -->

    
      <!-- feature_part start-->
    <section class="feature_part single_feature_padding page-section bg-white" style="padding: 4vw 0 3vw 0 ;">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-xl-3 align-self-center">
                    <div class="single_feature_text ">
                        <h2>Visi & Misi</h2>
                        <p class="visi-misi-teks"  style="margin-top: 1.5rem;" >Menciptakan sarana belajar online dengan materi dan lingkungan yang membangun fundamental di dunia digital </p>
                       
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="single_feature">
                        <div class="single_feature_part">
                            <span class="single_feature_icon"><i class="fa fa-graduation-cap " aria-hidden="true" style="font-size: 64px;padding-left: 25%;"></i></span>
                            
                            <p class="visi-misi-teks">Mengadakan online course yang minim biaya namun kaya akan ilmu</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="single_feature">
                        <div class="single_feature_part">
                            <span class="single_feature_icon"><i class="fa fa-briefcase " aria-hidden="true" style="font-size: 64px;padding-left: 25%;"></i></span>
                         
                            <p class="visi-misi-teks">Menyediakan materi dasar yang mampu menguatkan fundamental peserta dalam dunia digital hingga siap kerja</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="single_feature">
                        <div class="single_feature_part single_feature_part_2">
                            <span class="single_service_icon style_icon"><i class="fad fa-chalkboard-teacher " aria-hidden="true" style="font-size: 64px;padding-left: 25%;"></i></span>
                         
                            <p class="visi-misi-teks">Memfasilitasi peserta dengan mentor yang expert dibidangnya</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
 <!-- Benefit-->
<section class="page-section" id="benefit" style="padding-top: 3vw;">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase" >Benefit</h2><br>
           <!--<h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>--> 
        </div>
        <div class="row text-center">
            <div class="col-md-4">
               
                <h4 class="my-3">Benefit1</h4>
                <img src ="Assets/content1.jpeg" style="width: 80px; height: 80px; border-radius: 25px;">
                <p class="text-muted">Peserta dapat menelusuri suatu bidang secara perlahan dan bertahap dalam bimbingan terstruktur</p>
            </div>
            <div class="col-md-4">
              
                <h4 class="my-3">Benefit2</h4>
                <img src ="Assets/content1.jpeg" style="width: 80px; height: 80px; border-radius: 25px;">
                <p class="text-muted">Dengan biaya yang relatif murah, peserta mendapatkan materi yang dimulai dari tingkat dasar hingga memahami fundamental dunia digital</p>
            </div>
            <div class="col-md-4">
                
                <h4 class="my-3">Benefit3</h4>
                <img src ="Assets/content1.jpeg" style="width: 80px; height: 80px; border-radius: 25px;">
                <p class="text-muted">Peserta bisa berelasi dengan mentor yang sudah berpengalaman di dunia kerja</p>
            </div>
        </div>
    </div>
  </section>
  <footer class="footer-area footer--light" >
        <div class="footer-big" >
          <!-- start .container -->
          <div class="container" style="padding:0px; ">
            <div class="row" style="padding:0px;">
              <div class="col-xs-12 col-sm-6 col-md-5" >
                <div class="footer-widget" >
                  <div class="widget-about">
                    <div class="logo_footer">
                    <img src="Assets/logo_white.svg" alt="" width="40" class="mb-3">
                    <span class="logo_text_footer" style="color:white; ">STUDY BOX</span>
                    </div>
                    <h5 style="color:white; margin-top:10px; font-family: 'Caveat';font-size: 30px;"><i>" Langkah pertama Anda dimulai di sini "</i></h5>
                    
                  </div>
                </div>
                <!-- Ends: .footer-widget -->
              </div>
              <!-- end /.col-md-4 -->
              <div class="col-xs-12 col-sm-6 col-md-2"> 
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
     
              <div class="col-xs-12 col-sm-6 col-md-2">
                <div class="footer-widget">
                  <div class="footer-menu footer-menu--1">
                    <h4 class="footer-widget-title">Kelas</h4>
                    <ul>
                    <?php 
														$kat=mysqli_query($conn,"SELECT * from kelas order by id_kelas ASC");
														while($p=mysqli_fetch_array($kat)){

															?>
             
             
                      <li>
                      <a style="font-size:1rem;"href="produk.php?id_kelas=<?php echo $p['id_kelas'] ?>"><?php echo $p['nama_kelas'] ?></a>
                      </li>
                      <?php
																	}
														?>
                     
                    </ul>
                  </div>
                  <!-- end /.footer-menu -->
                </div>
                <!-- Ends: .footer-widget -->
              </div>
              <!-- end /.col-lg-3 -->
      
              <div class="col-xs-12 col-sm-6 col-md-2">
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
<script src="script.js"></script>
<script src="/js/product.js"></script>
<script src="/js/jquery-3.2.1.min.js"></script>
</body>
</html>