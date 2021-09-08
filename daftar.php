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
<?php include("partials/header.php") ?>
<?php include("partials/navbar.php") ?>


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

<?php include("partials/footer.php") ?>



</body>
</html>


