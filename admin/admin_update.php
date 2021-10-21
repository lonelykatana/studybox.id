<?php

	include '../dbconnect.php';

  ini_set('display_errors', 1); ini_set('log_errors',1); error_reporting(E_ALL); mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);	

  if(isset($_POST['updatedata']))
  {   
      $id = $_POST['update_id'];
      if(!empty($_FILES["image"]["tmp_name"])){
		$fileinfo=PATHINFO($_FILES["image"]["name"]);
		$newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
		move_uploaded_file($_FILES["image"]["tmp_name"],"upload/" . $newFilename);
		$location="uploadadmin/" . $newFilename;
 
		$test= mysqli_query($conn, "UPDATE login SET gambar_user='".$location."' where id_user=$id");
    if($test){
      echo " <div class='alert alert-success'>
      <script>alert('berhasil')</script>	
        </div>
      <meta http-equiv='refresh' content='1; url= transaksi.php'/>  ";
         
      header('location:transaksi.php');
    }
    else{
      echo " <div class='alert alert-success'>
      <script>alert('gagal')</script>	
        </div>
      <meta http-equiv='refresh' content='1; url= transaksi.php'/>  ";
         
      header('location:transaksi.php');
    }
   
	}else{
		echo " <div class='alert alert-success'>
		<script>alert('gagal')</script>	
		  </div>
		<meta http-equiv='refresh' content='1; url= transaksi.php'/>  ";
	} 
      

  }
  else{
    echo " <div class='alert alert-success'>
		<script>alert('gagal')</script>	
		  </div>
		<meta http-equiv='refresh' content='1; url= transaksi.php'/>  ";
  }

?>