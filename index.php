<?php

session_start();
include 'dbconnect.php';
if(isset($_POST['addprod'])){
	if(!isset($_SESSION['log']))
		{	
			header('location:masuk');
		}
    else{
      header('location:produk.php');
    }
  }
?>
<?php include("partials/headerindex.php") ?>
<?php include("partials/navbar.php") ?>



    <div class="carousell" style=" position: relative;">  
      <div id="carouselExample1" class="carousel slide carousel-fade z-depth-1-half" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
          
            <img class="d-block w-100" src="Assets/carousel1.png" alt="First slide" style="height: 40vw;object-fit: cover;" >      
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="Assets/carousel2.png" alt="Second slide" style="height: 40vw;object-fit: cover;">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="Assets/carousel3.png" alt="Third slide" style="height: 40vw;object-fit: cover;">
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
      <h5 class="centered"> <span class="caro">&nbsp Sukses adalah mereka yang memiliki fundamental yang kuat &nbsp </span> <br><br>
      <span class="caro" >&nbsp Bersama Study Box raih kesuksesanmu &nbsp </span>
      </h5>
     
     
    </div>
 

    <!-- ======= About Section ======= -->
    <section id="about" class="about" >
      <div class="text-center">
        <h2 class="section-heading " style="margin-top: -4%;padding-bottom:3%;font-size: 4.5vh;">TENTANG KAMI</h2><br>
       <!--<h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>--> 
    </div>
      <div class="container" data-aos="fade-up">
        
        <div class="row">

          <div class="col-lg-6 d-flex flex-column justify-content-center" style="margin-bottom:10%;" data-aos="fade-up" data-aos-delay="200">
            <div class="content"style="margin-top:6%">
         
              <h3 >Study Box</h3>
              <p>
                Study box adalah sebuah startup yang bergerak dalam bidang online course, mengedepankan tingkatan materi yang mendasar dan 
	dikemas secara...
              </p>
              <div class="text-left text-lg-start">
                <a href="#" class="btn-read-more d-inline-flex align-items-center justify-content-center align-self-center">
                  <span><a href="about">Read More</a></span>
                 
                </a>
              </div>
            </div>
          </div>

          <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
         
            <img src="Assets/whoweare.jpg" class="img-fluid" alt="" style="width: 83.5%;border-radius: 8px;margin-left: 10%;">
          </div>
        </div>
      </div>

    </section><!-- End About Section -->

     
    <section class="bg-white " id="product">
   
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Product</h2><br>
           
        </div>
                <div class="product-box">
                   
                    <div class="product_section" style="margin-bottom:20%">
                    <img class="img-fluid" src="uiux.png" alt="..." style="height:30vh;width:30vh; border-radius:25px;" />
                        <div class="product-title1 product-caption" style="display:inline-block;width:30vh;text-align:center;"> 
                        UI/UX</div>
                         <a href="produk.php?id_kelas=1"> <button type="submit" class="btn_product" >Cek Kelas</button> </a>
                    </div> 
                    <div class="product_section">
                    <img class="img-fluid" src="webdev.jpg" alt="..." style="height:30vh;width:30vh; border-radius:25px;" />
                        <div class="product-title1 product-caption" style="display:inline-block;width:30vh;text-align:center;"> 
                        Web Developer</div>
                         <a href="produk.php?id_kelas=2"> <button type="submit" class="btn_product" >Cek Kelas</button> </a>
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
  

<section class="bg-white " id="product">
   
   <div class="text-center">
       <h2 class="section-heading">Apa kata para Alumni Study Box</h2><br>      
   </div>
 
   <div class="blog-slider">
  <div class="blog-slider__wrp swiper-wrapper">
    <div class="blog-slider__item swiper-slide">
      <div class="blog-slider__img">
        
        <img src="foto1.JPG" alt="">
      </div>
      <div class="blog-slider__content">
        <span class="blog-slider__code">Alumni angkatan 1</span>
        <div class="blog-slider__title">Erick Gultom</div>
        <div class="blog-slider__text">"Kurikulum kelas di Study Box ini sangat gampang dipahami dan cocok diterapkan di perusahaan"</div>
       
      </div>
    </div>
    <div class="blog-slider__item swiper-slide">
      <div class="blog-slider__img">
        <img src="foto2.JPG" alt="">
      </div>
      <div class="blog-slider__content">
        <span class="blog-slider__code">Alumni angkatan 1</span>
        <div class="blog-slider__title">Ricky</div>
        <div class="blog-slider__text">"Sebelumnya saya tidak ada background IT tetapi saya bisa menjadi seorang developer"</div>
       
      </div>
    </div>
    
    <div class="blog-slider__item swiper-slide">
      <div class="blog-slider__img">
        <img src="foto3.JPG" alt="">
      </div>
      <div class="blog-slider__content">
        <span class="blog-slider__code">Alumni angkatan 1</span>
        <div class="blog-slider__title">Eric</div>
        <div class="blog-slider__text">"Tidak hanya teori, didalam kelas juga banyak praktek sehingga bisa langsung dipahami"</div>
        
      </div>
    </div>
    
  </div>
  <div class="blog-slider__pagination"></div>
</div>
       
      

</section>
    <!-- Footer -->
    <?php include("partials/footer.php") ?>
  <!-- End -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.5/js/swiper.min.js'></script><script  src="./script_testimoni.js"></script>

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
    <script src="script.js"></script>
</body>
</html>