<?php
ini_set('display_errors', 1); ini_set('log_errors',1); error_reporting(E_ALL); mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);	
session_start();
include 'dbconnect.php';
include 'function.php';
if(!isset($_SESSION['log'])){
	
} else {
	header('location:index.php');
};
 
$err="";
$sukses="";
$email= "";
	if(isset($_POST['updatepass'])){
      $email=$_POST['email'];
      if($email==""){
          $err="Silahkan masukkan email";
      } else{
        $sqli1="select * from login where email='$email'";
        $q1=mysqli_query($conn,$sqli1);
        $n1=mysqli_num_rows($q1);

        if($n1<1){
            $err ="Email <b>$email</b> tidak ditemukan";
        }
      }
      
      if(empty($err)){
          $token_ganti_password=md5(rand(0,1000));
          $judul_email="Ganti Password";
          $isi_email="Mau ganti password,klik link! </br>";
          $isi_email.=url_dasar()."/ganti_password.php?email=$email&token=$token_ganti_password";
          kirim_email($email,$email,$judul_email,$isi_email);

          $sqli1="update login set token_ganti_password='$token_ganti_password' where email='$email'";
          mysqli_query($conn,$sqli1);
          $sukses="Link sudah dikirim ke email anda.";
          
      }
    }
?>


<?php include("partials/header.php") ?>
<?php include("partials/navbar.php") ?>
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
                        <h1 class="h4 text-gray-900 mb-4">Reset Password</h1>
                        <?php if($err){echo "<div class='alert'>$err</div>";}?>
                        <?php if($sukses){echo "<div class='sukses'>$sukses</div>";}?>
                      </div>                  
                <form method="post" action="forgot_pass.php">
                        <div class="form-group">
                          <input type="text" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email" name="email" value="<?php echo $email?>">                          
                        </div>
                         <hr>
      
                        <button type="submit" name="updatepass" class="btn btn-success form-control">Reset Password</button>
                        
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
    
</body>
</html>