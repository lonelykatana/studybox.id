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
$email= $_GET['email'];
$token= $_GET['token'];

if($token =='' or $email==''){
    $err .="Link tidak valid. Email dan token tidak tersedia.";
} else{
    $sql1="select * from login where email='$email' and token_ganti_password='$token'";
    $q1=mysqli_query($conn,$sql1);
    $n1=mysqli_num_rows($q1);

    if($n1<1){
        $err .="Link tidak valid. Email dan Token tidak sesuai.";
    }
}

if(isset($_POST['updatepass'])){
    $password =$_POST['password']; 
    $password1 = password_hash($password, PASSWORD_DEFAULT); 
      $konfirmasi_password=$_POST['konfirmasi_password'];

      if($password=='' or $konfirmasi_password==''){
          $err.="Silahkan masukkan Password dan Konfirmasi Password";
      } elseif( $konfirmasi_password!=$password){
            $err .="Password dan Konfirmasi Password tidak sesuai.";
      }
      
      if(empty($err)){
          $sql1="update login set token_ganti_password='',password='$password1' where email='$email'";
          mysqli_query($conn,$sql1);
          $sukses="Password berhasil diganti. Silahkan <a href='".url_dasar()."/masuk.php'>login</a> ";
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
                        <h1 class="h4 text-gray-900 mb-4">Ganti Password</h1>
                        <?php if($err){echo "<div class='alert'>$err</div>";}?>
                        <?php if($sukses){echo "<div class='sukses'>$sukses</div>";}?>
                      </div>                  
                <form method="post" action="">
                        <div class="form-group">
                          <input type="password" class="form-control form-control-user" id="exampleInputEmail" placeholder="Password baru" name="password" >                          
                        </div>
                        <div class="form-group">
                          <input type="password" class="form-control form-control-user" id="exampleInputEmail" placeholder="Konfirmasi Password" name="konfirmasi_password">                          
                        </div> 
                         <hr>
      
                        <button type="submit" name="updatepass" class="btn btn-success form-control">Ganti Password</button>
                        
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