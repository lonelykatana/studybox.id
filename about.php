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
<?php include("partials/header.php") ?>
<?php include("partials/navbar.php") ?>
       <!-- ======= About Section ======= -->
    <section id="about" class="about" style="padding-bottom:5vw" >
    <div class="text-center">
        <h2 class="section-heading " style=" padding-bottom:2%;font-size: 4.5vh;">TENTANG KAMI</h2><br>
         <!--<h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>--> 
      </div>
        <div class="container" data-aos="fade-up">
          
          <div class="row gx-0">
  
            <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
              
              <div class="content" style="margin-top:6%">
           
              <h3 >Study Box</h3>
                <p>
                    Study Box adalah sebuah startup yang bergerak dalam bidang online course, mengedepankan tingkatan materi yang mendasar dan 
                    dikemas secara bertahap dan mendetail dalam sebuah lingkungan komunitas belajar yang suportif
                </p>
              </div>
            </div>
  
            <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
            <img src="Assets/whoweare.jpg" class="img-fluid" alt="" style="width: 83.5%;border-radius: 8px;margin-left: 10%;">
            </div>
  
          </div>
        </div>
  
      </section><!-- End About Section -->

    
      <!-- feature_part start-->
    <section class="feature_part single_feature_padding page-section bg-white" style="padding: 4vw 0 3vw 0 ;">
        <div class="container">
            
               
                        <h2 style= "text-align:center;">Visi</h2>
                        <p style="text-align:center; font-size:1.8vh"  style="margin-top: 1.5rem;" >" Menciptakan sarana belajar online dengan materi dan lingkungan yang membangun fundamental di dunia digital. "</p>
                       
                    
        </div>
    </section>

    <section class="feature_part single_feature_padding page-section" style="padding: 4vw 0 3vw 0 ;">
        <div class="container">
          <h2 style="text-align:center;">Misi</h2>
            <div class="row" style="padding-top: 3vh;" >
                
                <div class="col-sm-6 col-xl-4">
                    <div class="single_feature">
                        <div class="single_feature_part">
                            <span class="single_feature_icon" style="margin-left:22vh"><i class="fa fa-graduation-cap" aria-hidden="true" style="font-size: 64px;"></i></span>
                             
                            <p class="visi-misi-teks text-center" style="padding-top: 1vw;">Mengadakan online course yang minim biaya namun kaya akan ilmu</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-4">
                    <div class="single_feature">
                        <div class="single_feature_part align-center">
                            <span class="single_feature_icon " style="margin-left:22vh"><i class="fa fa-briefcase " aria-hidden="true" style="font-size: 64px;"></i></span>
                         
                            <p class="visi-misi-teks text-center" style="padding-top: 1vw;">Menyediakan materi dasar yang mampu<br>menguatkan fundamental peserta dalam dunia digital hingga siap kerja</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-4"">
                    <div class="single_feature ">
                        <div class="single_feature_part single_feature_part_2">
                            <span class="single_service_icon style_icon" style="margin-left:22vh"><img src="Assets/iconguru.svg" width="64px" height="64px"    aria-hidden="true"  ></img></span>
                         
                            <p class="visi-misi-teks text-center" style="padding-top: 1vw;">Memfasilitasi peserta dengan mentor yang expert dibidangnya</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
 <!-- Benefit-->
<section class="page-section bg-white" id="benefit" style="padding-top: 3vw;">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase" >Benefit</h2><br>
           <!--<h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>--> 
        </div>
        <div class="row text-center">
        <div class="col-md-4">
             
             <img src ="Assets/benefit1.svg" style="width:15vh; height: 15vh; border-radius: 25px;">
             <p class="text-muted">Peserta dapat menelusuri suatu bidang secara perlahan dan bertahap dalam bimbingan terstruktur</p>
         </div>
         <div class="col-md-4">
           
             <img src ="Assets/benefit2.svg" style="width:15vh; height: 15vh;; border-radius: 25px;">
             <p class="text-muted">Dengan biaya yang relatif murah, peserta mendapatkan materi yang dimulai dari tingkat dasar hingga memahami fundamental dunia digital</p>
         </div>
         <div class="col-md-4">
             
            
             <img src ="Assets/benefit3.svg" style="width:15vh; height: 15vh;; border-radius: 25px;">
             <p class="text-muted">Peserta bisa berelasi dengan mentor yang sudah berpengalaman di dunia kerja</p>
         </div>
        </div>
    </div>
  </section>
  <?php include("partials/footer.php") ?>
<script src="script.js"></script>
<script src="/js/product.js"></script>
<script src="/js/jquery-3.2.1.min.js"></script>
</body>
</html>