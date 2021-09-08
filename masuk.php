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
if ( $_POST['email'] =="" ||  $_POST['password'] =="") {
  header("location:masuk.php?pesan=kosong");
}
		
else if( password_verify($pass, $cariuser['password']) ) {
			$_SESSION['id_user'] = $cariuser['id_user'];
			$_SESSION['role'] = $cariuser['role'];
      $_SESSION['name'] = $cariuser['username'];
      $_SESSION['log'] = "Logged";
			header('location:/StudyBoxWebsite/index.php');
      echo 'berhasil!';
		} else if ($email=='' || $pass=='') {
      
      header("location:masuk.php?pesan=kosong");
		}	 else {
      header("location:masuk.php?pesan=gagal");
    } 
    
	} 

?>
<?php include("partials/header.php") ?>
<?php include("partials/navbar.php") ?>

    <!-- form masuk-->

    <div class="container" style="margin-top:5%;margin-bottom:-4%;" >

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
                      <?php 
	if(isset($_GET['pesan'])){
		if($_GET['pesan']=="kosong"){
			echo "<div class='alert''>Silahkan masukkan Email dan password</div>";
		} else if($_GET['pesan']=="gagal"){
      echo "<div class='alert''>Email atau password salah</div>";
    }
    
	}
	?>                 
                <form method="post"  action="#" > 
                        <div class="form-group">
                          <input  type="text" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email" name="email" autofocus   >
                        </div>
                        <div class="form-group">
                          <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" name="password"    >
                          <a class="small" href="forgot_pass.php" style="padding-left: 2%;">Lupa Password </a>
                        </div>
                      
                       
                        <hr>
      
                        <button type="submit" name="login" class="btn btn-success form-control">Masuk</button>
                        
                      </form>
                      <hr>
      
                      <div class="text-center">
                      
                        <a class="small">Belum punya Akun? </a><a class="small" href="daftar.php"><b>Daftar Sekarang</b></a><br>
                      
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
 <?php include("partials/footer.php") ?>
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
    <script src="script.js"></script>
</body>
</html>