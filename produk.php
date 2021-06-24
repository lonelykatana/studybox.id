<?php
session_start();

include 'dbconnect.php';
$idk = $_GET['id_kelas'];
if(isset($_POST['addpeserta']))
	{
		$nama = $_POST['nama'];
		$email = $_POST['email'];
    $umur = $_POST['umur'];
    $nowa = $_POST['nowa'];
   
		$tambahuser = mysqli_query($conn,"insert into data_peserta (nama, email, umur, no_wa) 
		values('$nama','$email','$umur','$nowa')");
    
		if ($tambahuser){
		echo " <div class='alert alert-success'>
			Berhasil mendaftar, silakan masuk.
		  </div>
		<meta http-equiv='refresh' content='1; url= index.php'/>  ";
		} else { echo "<div class='alert alert-warning'>
			Gagal mendaftar, silakan coba lagi.
		  </div>
		 <meta http-equiv='refresh' content='1; url= produk.php'/> ";
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
    <link rel="stylesheet" href="produk.css"/>
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
      <a class=" nav-item" href="index.php">
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
                <a class="dropdown-item nav-item" href="produk.html">UI/UX</a>
                <a class="dropdown-item" href="produk.html">Web Developer</a>
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
      
      
      
      <!-- product section-->
 
 <section id="product" class="product" style="margin-top:7%;">

  <div class="container" data-aos="fade-up " style="margin-left:10%;">
    <div class="row gx-0" >
    <?php 
				$p = mysqli_fetch_array(mysqli_query($conn,"Select * from kelas where id_kelas='$idk'"));

				?>
      <div  class="col-lg-6 d-flex flex-row justify-content-center" data-aos="fade-up" data-aos-delay="200">
     
        <img src="<?php echo $p['gambar']?>" class="img-fluid" alt="" style="width: 500px; height: 15vw;  box-shadow: 2px 5px 10px #888888"\="\">  
        <div class="product-content">
     
          <h2><?php echo $p['nama_kelas'] ?></h2>
          <p class="product-description">
          <?php echo $p['deskripsi'] ?>
          </p>
          <div class="text-left text-lg-start">
            <div class="price-product snipcart-item block">
              <div class="snipcart-thumb agileinfo_single_right_snipcart">
                  <h5 class="m-sing">Rp  <?php echo $p['harga_before'] ?>
                      <span>Rp <?php echo $p['harga_after'] ?></span></h4>
              </div>
              <?php
          
          if(!isset($_SESSION['log']))
            {	
              echo "<a href='masuk.php'><input type='submit' value='Daftar Kelas'  class='btn_product'style='margin-top:7%' data-toggle='modal' data-target='#myModal'></a>";
            }
            else{
              echo "<input type='submit' value='Daftar Kelas'  class='btn_product'style='margin-top:7%' data-toggle='modal' data-target='#myModal'>";
            }
                    ?>
              <form method="post">
           
            
              </form>
              <div id="myModal" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Daftar Kelas</h4>
                        </div>
                
                        <div class="modal-body">
                            <form action="produk.php" method="post" enctype="multipart/form-data">
                              
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input name="nama" type="text" class="form-control" required="required">
                                </div>
                                <div class="form-group">
                                  <label>Umur</label>
                                  <input name="umur" type="text" class="form-control" required="required">
                              </div>
                              <div class="form-group">
                                <label>Email</label>
                                <input name="email" type="text" class="form-control" required="required">
                            </div>
                            <div class="form-group">
                              <label>No. Whatsapp</label>
                              <input name="nowa" type="text" class="form-control" required="required">
                          </div>
                                                          
                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                <input name="addpeserta" type="submit" class="btn btn-primary" value="Tambah">
                            </div>
                        </form>
                    </div>
                </div>
                
                
                
                </div>
            
          </div>
        </div>
      </div>
      

    </div>
    
  </div>
  <!-- FAQs -->
  <div class="faqs">
    <div class="panel_title"><h4>Kurikulum</h4></div>
    <div class="accordions">
            
      <div class="elements_accordions">

        <div class="accordion_container">
          <div class="accordion d-flex flex-row align-items-center active"><div><?php echo $p['judul_week1'] ?></div></div>
          <div class="accordion_panel">
            <p><?php echo $p['detail_week1'] ?></p>
          </div>
        </div>

        <div class="accordion_container">
          <div class="accordion d-flex flex-row align-items-center"><div><?php echo $p['judul_week2'] ?></div></div>
          <div class="accordion_panel">
            <p><?php echo $p['detail_week2'] ?></p>
          </div>
        </div>

        <div class="accordion_container">
          <div class="accordion d-flex flex-row align-items-center"><div><?php echo $p['judul_week3'] ?></div></div>
          <div class="accordion_panel">
            <p><?php echo $p['detail_week3'] ?></p>
          </div>
        </div>

        <div class="accordion_container">
          <div class="accordion d-flex flex-row align-items-center"><div><?php echo $p['judul_week4'] ?></div></div>
          <div class="accordion_panel">
            <p><?php echo $p['detail_week4'] ?></p>
          </div>
        </div>
        <div class="accordion_container">
          <div class="accordion d-flex flex-row align-items-center"><div><?php echo $p['judul_week5'] ?></div></div>
          <div class="accordion_panel">
            <p><?php echo $p['detail_week5'] ?></p>
          </div>
        </div>
        <div class="accordion_container">
          <div class="accordion d-flex flex-row align-items-center"><div><?php echo $p['judul_week6'] ?></div></div>
          <div class="accordion_panel">
            <p><?php echo $p['detail_week6'] ?></p>
          </div>
        </div>
        <div class="accordion_container">
          <div class="accordion d-flex flex-row align-items-center"><div><?php echo $p['judul_week7'] ?></div></div>
          <div class="accordion_panel">
            <p><?php echo $p['detail_week7'] ?></p>
          </div>
        </div>
        <div class="accordion_container">
          <div class="accordion d-flex flex-row align-items-center"><div><?php echo $p['judul_week8'] ?></div></div>
          <div class="accordion_panel">
            <p><?php echo $p['detail_week8'] ?></p>
          </div>
        </div>

      </div>

    </div>
  </div>
</div>

</section><!-- End About Section -->
<!-- Benefit-->
<section class="page-section bg-light" id="mentor">
  <div class="container">
      <div class="text-center">
          <h2 class="section-heading text-uppercase align-items-center" >Mentor</h2><br>
         <!--<h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>--> 
      </div>
      <div class="row text-center">
          <div class="col-md-6" >
             
              <h4 class="my-2">UI/UX</h4>
              <img src ="Assets/mentor1.jpg" style="width: 10vw; height: 10vw; border-radius:100px;object-fit: cover;padding-top: 2%;">
              <div class="instructor_name"><a href="instructors.html">Elon Musk</a></div>
              <p class="text-muted">Matamu to the moon
              </p>
          </div>
          <div class="col-md-5">
            
              <h4 class="my-2">Web Developer</h4>
              <img src ="Assets/mentor2.jpg" style="width: 10vw; height: 10vw; border-radius: 100px;object-fit: cover;padding-top: 2%;">
              <div class="instructor_name"><a href="instructors.html">Keanu Reeves</a></div>
              <p class="text-muted">He killed Three men in a bar with a f*cking pencil</p>
          </div>
          
      </div>
  </div>
</section>
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
<script src="js/product.js"></script>
<script src="js/jquery-3.2.1.min.js"></script>
</body>
</html>