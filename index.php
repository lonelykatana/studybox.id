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
<!--
  <nav class="navbar-default fixed-top">
        <div class="logo">
            <span class="logo_text" style="padding-top: 0.6em;">STUDYBOX</span>
        </div>
       <div class="menuu">
        <div class="dropdown">
            <div class="dropbtn">Course</div>
            <div class="dropdown-content">
            <?php 
													//	$kat=mysqli_query($conn,"SELECT * from kelas order by id_kelas ASC");
													//	while($p=mysqli_fetch_array($kat)){

															?>
              <a href="produk.php?id_kelas=<?php //echo $p['id_kelas'] ?>"><?php //echo $p['nama_kelas'] ?></a>
              <?php
															//		}
														?>
            </div>
          </div>
          <div class="teks_menu" >
          <span class="teks_menu"></span>
          <?php
          /*
								if(!isset($_SESSION['log'])){
					echo '
					<span class="teks_menu"><a href="daftar.php"> Daftar</a></span>
					<span class="teks_menu"><a href="masuk.php">Masuk</a></span>
					';
				} else {
					
					if($_SESSION['role']=='Member'){
					echo '
					<span class="teks_menu" >Halo, '.$_SESSION["name"].'
					<span class="teks_menu"><a href="logout.php">Keluar?</a></span>
					';
					} else {
					echo '
					<span class="teks_menu" style="color:white">Halo, '.$_SESSION["name"].'
					<span class="teks_menu"><a href="admin">Admin Panel</a></span>
					<span class="teks_menu"><a href="logout.php">Keluar?</a></span>
					';
					};
					
				} 
        */
				?></div>
          
        </div>
    
      </nav>
      -->

        <!-- Navbar -->
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
    <div class="carousell">
      <div id="carouselExample1" class="carousel slide z-depth-1-half" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">

            <img class="d-block w-100" src="Assets/carousel7.png" alt="First slide" style="height: 40vw;">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="Assets/carousel8.jpg" alt="Second slide" style="height: 40vw;">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="Assets/carousel7.png" alt="Third slide" style="height: 40vw;">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExample1" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExample1" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
       
      </div>
     
    </div>
 

    <!-- ======= About Section ======= -->
    <section id="about" class="about" >
      <div class="text-center">
        <h2 class="section-heading text-uppercase" style="margin-top: -65px;">Tentang kami</h2><br>
       <!--<h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>--> 
    </div>
      <div class="container" data-aos="fade-up">
        
        <div class="row gx-0">

          <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
            
            <div class="content">
         
              <h2>StudyBox</h2>
              <p>
                Studybox adalah sebuah startup yang bergerak dalam bidang online course, mengedepankan tingkatan materi yang mendasar dan 
	dikemas secara...
              </p>
              <div class="text-left text-lg-start">
                <a href="#" class="btn-read-more d-inline-flex align-items-center justify-content-center align-self-center">
                  <span>Read More</span>
                 
                </a>
              </div>
            </div>
          </div>

          <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
         
            <img src="Assets/content1.jpeg" class="img-fluid" alt="" style="width: 80%;border-radius: 8px;margin-left: 10%;">
          </div>
        </div>
      </div>

    </section><!-- End About Section -->

   
    <!-- product Grid-->
  <section class="bg-light " id="product">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Product</h2><br>
           
        </div>
    
      
        <div class="row">
           
                <!-- product item 1-->
                <div class="product-item" style="margin-left:15%;display:flex;flex-direction:row" >
                <figure style="margin-right:20%"> 
                    <?php 
														$kat=mysqli_query($conn,"SELECT * from kelas order by id_kelas ASC");
														while($p=mysqli_fetch_array($kat)){

															?>
              
                              <div style="display:flex;flex-direction:column">
                        <img class="img-fluid" src="<?php echo $p['gambar'] ?>" alt="..." style="height: 200px;width:400px" />
                    </a>
                    <div class="product_section">
                        <div class="product-title1 product-caption"> 
                        <?php echo $p['nama_kelas'] ?></div>
                         <a href="produk.php?id_kelas=<?php echo $p['id_kelas'] ?>"> <button type="submit" class="btn_product" style="margin-left:-28%" >Cek Kelas</button> </a>
                    </div>
                    </figure>
                    <?php
																	}
														?>
                            </div>
                </div>
                </div>
    </div>
    </div>
</section>
<!-- Benefit-->
<section class="page-section" id="benefit">
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
  
    <!-- Footer -->
    <footer class="footer-area footer--light" >
        <div class="footer-big" >
          <!-- start .container -->
          <div class="container" style="padding:0px; ">
            <div class="row" style="padding:0px;">
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
  console.log("halo");

    $(window).scroll(function(){
      $('nav').toggleClass('scrolled', $(this).scrollTop() > 550);
    });
  </script>
  	<script type="text/javascript">
      $(window).scroll(function(){
        $('.logo').toggleClass('scrolled', $(this).scrollTop() > 550);
      });   
    </script>
    <script src="script.js"></script>
</body>
</html>