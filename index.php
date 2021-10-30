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
        
        <div class="row gx-0">

          <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
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
                   
                    <div class="product_section">
                    <img class="img-fluid" src="uiux2.jpg" alt="..." style="height:30vh;width:30vh; border-radius:25px;box-shadow: 2px 5px 10px #888888;" />
                        <div class="product-title1 product-caption" style="display:inline-block;width:30vh;text-align:center;"> 
                        UI/UX</div>
                         <a href="produk.php?id_kelas=1"> <button type="submit" class="btn_product" >Cek Kelas</button> </a>
                    </div> 
                    <div class="product_section">
                    <img class="img-fluid" src="web2.jpg" alt="..." style="height:30vh;width:30vh; border-radius:25px;box-shadow: 2px 5px 10px #888888;" />
                        <div class="product-title1 product-caption" style="display:inline-block;width:30vh;text-align:center;"> 
                        Web Developer</div>
                         <a href="produk.php?id_kelas=2"> <button type="submit" class="btn_product" >Cek Kelas</button> </a>
                    </div> 
                </div>
   
     
</section>
 <section class="page-section" id="event" style="padding-top: 3vw;">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase" >Event</h2><br>
           <!--<h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>--> 
        </div>
        
    
         <div class="col-md-12 text-center event-box">
             
             <img src ="Assets/event1.jpg" style="height:30vh;width:30vh; border-radius:25px;margin:0 auto;">
             <div class="product-title1 product-caption" style="display:inline-block;font-size:25px;text-align:center;"> Webinar - Grace Ling</div>
                         <a href="https://docs.google.com/forms/d/e/1FAIpQLSdqUPlWGFhcgo86aJ1nasMywhxdwCQUpYpjsaSU8_a9g2d-ZQ/viewform?usp=sf_link"> <button type="submit" class="btn_product btn_product1" style="margin-top:18px;">Ikuti Webinar</button> </a>
                    </div> 
         
        </div>
    </div>
  </section>
 
<!-- Benefit-->
<section class="bg-white" id="benefit">
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
  

<section class="page-section " id="product">
   
   <div class="text-center">
       <h2 class="section-heading">Apa kata para Alumni Study Box</h2><br>      
   </div>
 
   <div class="blog-slider">
  <div class="blog-slider__wrp swiper-wrapper">
    <div class="blog-slider__item swiper-slide">
      <div class="blog-slider__img">
        
        <img src="testi1.jpeg" alt="">
      </div>
      <div class="blog-slider__content" style="padding-right:4%; padding-left:1%">
        <span class="blog-slider__code">UI/UX Design Batch 1</span>
        <div class="blog-slider__title">Agnes Angela Stepanie Siregar</div>
        <div class="blog-slider__text">“ Overall thank you banget udah ngadain bootcamp gratis ini. materi nya bener bener worth to be paid si menurut aku. So good job team Study Box! Aku merasa mendapatkan ilmu baru yg sangat valuable. “</div>
       
      </div>
    </div>
    <div class="blog-slider__item swiper-slide">
      <div class="blog-slider__img">
        <img src="testi2.jpeg" alt="">
      </div>
      <div class="blog-slider__content"style="padding-right:4%; padding-left:1%">
        <span class="blog-slider__code">Web Development Bacth 1</span>
        <div class="blog-slider__title">Levi Jonatan</div>
        <div class="blog-slider__text">“ Selama belajar di Mini Bootcamp Study Box, saya mendapat pengalaman belajar yang menyenangkan dan tentunya mendapat banyak ilmu baru, Pengajarnya seru, baik(suka bercanda<br> disela-sela belajar), dan kita diajari dari dasar jadi nanti misalnya ada yang bingung bisa langsung ditanya dan dibantu deh.“</div>
       
      </div>
    </div>
    
    <div class="blog-slider__item swiper-slide">
      <div class="blog-slider__img">
        <img src="testi3.jpeg" alt="">
      </div>
      <div class="blog-slider__content"style="padding-right:4%; padding-left:1%">
        <span class="blog-slider__code">UI/UX Design Batch 1</span>
        <div class="blog-slider__title">Valentine Trihandayani</div>
        <div class="blog-slider__text">“Selama mengikuti Mini Bootcamp di Study Box cukup produktif. Mentor memberi materi kemudian membagi kami kedalam room untuk latihan. Tiap minggu diberi challenge sehingga saya sendiri jadi semakin memahami UI/UX Design. Saya sangat senang dapat mengikuti Bootcamp ini, dimana mentor memberikan ilmunya secara gratis tanpa imbalan  dan ilmunya menjadi bekal bagi saya untuk bisa menghadapi dunia pekerjaan. Terimakasih studybox “</div>
        
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