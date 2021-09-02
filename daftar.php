<?php
session_start();

include 'dbconnect.php';

if(isset($_POST['adduser']))
	{
    if($_POST['password']==$_POST['password1']){
		$nama = $_POST['nama'];
		$username = $_POST['username'];
		$email = $_POST['email'];
		$password = password_hash($_POST['password'], PASSWORD_DEFAULT); 
		$tambahuser = mysqli_query($conn,"insert into login (nama, username, email, password) 
		values('$nama','$username','$email','$password')");

    if ( $_POST['nama'] =="" ||  $_POST['username'] =="" ||$_POST['email'] =="" ||  $_POST['password'] =="") {
      header('location:daftar.php?pesan=kosong');
    }
		elseif ($tambahuser){
      header('location:masuk.php');

		} else { echo "<div class='alert alert-warning'>
			Gagal mendaftar, silakan coba lagi.
		  </div>
		 <meta http-equiv='refresh' content='1; url= daftar.php'/> ";
		}
    
  }else{
    header("location:daftar.php?pesan=gagal");}

	};

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="footer.css"/>
  <link rel="stylesheet" href="style2.css"/> 
  <link href='https://fonts.googleapis.com/css?family=Caveat' rel='stylesheet'>
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



</head>
</head>
<body style="background-color:rgb(247,247,247);">

<nav class="navbar navbar-expand-md bg-putih navbar-light">
<div class="logo2">
        <img src="Assets/logo_color.svg" style="width:2pc;height: 2pc;">
      <a class=" nav-item" href="index.php">
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
        <a class="nav-link nav2" href="masuk.php">Masuk</a>
      </li>
      <li class="nav-item nav3">
        <a class="nav-link nav1" href="daftar.php">Daftar</a>
      </li>    
      </ul>
      ';
				} else {
					if($_SESSION['role']=='Member'){
				
            echo '

            <li class="nav-item dropdownn" >
          <a  class="nav-link">Course<i class="fa fa-caret-down" style="margin-left:8px"></i></span></a>
            <div class="dropdown-contentt">
            <a style="font-size:1rem;"href="logout.php">Keluar</a>
            /div>
          </li>

            ';
					} else if($_SESSION['role']=='Admin') {
            $_SESSION['login_admin']=true;
					echo '
          <li class="nav-item dropdownn" >
          <a  class="nav-link">Course<i class="fa fa-caret-down" style="margin-left:8px"></i></span></a>
            <div class="dropdown-contentt">
            <a style="font-size:1rem;"href="admin">Admin Panel</a>
            <a style="font-size:1rem;"href="logout.php">Keluar</a>
            </div>
          </li>
					';
					};
					
				}
        
				?>
    </ul>
  </div>  
</nav>


<div class="container">
    <div class="card o-hidden border-0 shadow-lg col-lg-6 my-5 mx-auto">
        <div class="card-body p-0">
          <div class="row" >      
            <div class="col-lg">
              <div class="p-5">
                <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-4">Mulai Dengan Gratis</h1>

                  <?php 
	if(isset($_GET['pesan'])){
		if($_GET['pesan']=="gagal"){
			echo "<div class='alert'>Password Tidak Sama</div>";
		} else if($_GET['pesan']=="kosong"){
      echo "<div class='alert'>Silahkan Isi Form</div>";
    }
	}
	?>                 


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
                  <div class="form-group">                    
                      <input type="password" class="form-control form-control-user" id="exampleInputPassword1" placeholder="Ulang Password" name="password1">                    
                   </div>
                 
                  <hr>
    <button type="submit" name="adduser" class="btn btn-success form-control">Daftar</button>
                </form>
                <hr>
                <div class="text-center">
                      <a class="small" >Sudah punya akun?<a href="masuk.php" style="text-decoration: none;font-size: 80%;
  font-weight: 400;"> Masuk sekarang</a></a>
                    </div>
              
              </div>
            </div>
          </div>
        </div>
      </div>
    
    </div>

</div>

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
              <h5 style="color:white; margin-top:10px; font-family: 'Caveat';font-size: 30px;"><i>Langkah pertama Anda dimulai di sini</i></h5>
              
            </div>
          </div>
          <!-- Ends: .footer-widget -->
        </div>
        <!-- end /.col-md-4 -->
        <div class="col-xs-12 col-sm-6 col-md-2"> 
          <div class="footer-widget">
            <div class="footer-menu no-padding">
              <h4 class="footer-widget-title">Sitemap</h4>
              <ul>
                <li>
                  <a href="index.php">Home</a>
                </li>
                <li>
                  <a href="about.php">Tentang Kami</a>
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
            <div class="footer-menu no-padding">
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
    <li><a href="mailto:info@studybox.id"><i class="fa fa-envelope" style="padding-right:0.3vw"></i>Email</a></li>
    <li><a href="https://www.linkedin.com/company/studybox-id/"><i class="fa fa-linkedin"style="padding-right:0.3vw"></i>LinkedIn</a></li>
    <li><a href="https://wa.me/6281260648147"><i class="fa fa-whatsapp"style="padding-right:0.3vw"></i>Whatsapp</a></li>
    <li><a href="https://www.instagram.com/studybox.id/"><i class="fa fa-instagram"style="padding-right:0.3vw"></i>Instagram</a></li>
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



</body>
</html>


