<?php
ini_set('display_errors', 1); ini_set('log_errors',1); error_reporting(E_ALL); mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);	
session_start();
include 'dbconnect.php';

$cariuser['id_user']=$_SESSION['id_user'];
$cek=$cariuser['id_user'];




	if(!isset($_SESSION['log']))
		{	
			header('location:masuk');
		}
   

        if(isset($_FILES['fileToUpload'])){
            $name = $_FILES['fileToUpload']['name'];
            $target_dir = "upload/";
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
          
            // Select file type
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
          
            // Valid file extensions
            $extensions_arr = array("jpg","jpeg","png","gif");
          
            // Check extension
            if( in_array($imageFileType,$extensions_arr) ){
               // Upload file
               if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'],$target_dir.$name)){
                  // Insert record
                  $query = "UPDATE login SET gambar_user='".$name."' where id_user=$cek";
                  mysqli_query($conn,$query);
               }
          
            }
           
          }
    


  if(isset($_POST['adduser']))
    {
      $nama = $_POST['nama'];
      $username = $_POST['username'];
      $email = $_POST['email'];
      $no_wa = $_POST['no_wa'];
      $umur = $_POST['umur'];
      $pekerjaan = $_POST['pekerjaan'];



      $tambahuser = mysqli_query($conn,"UPDATE login SET nama='$nama', username='$username', email='$email', no_wa='$no_wa', umur='$umur', pekerjaan='$pekerjaan'
      where id_user=$cek  ");


      if ($tambahuser){  
      echo " <div class='alert alert-success'>
      <script>alert('Berhasil')</script>	
        </div> ";
        header('profil1');
      } else { echo "<div class='alert alert-warning'>
        Gagal mendaftar, silakan coba lagi.
        </div>
       <meta http-equiv='refresh' content='1; url= produk.php'/> ";
      }
      
    };
   
  

  
?>
<?php include("partials/headerindex.php") ?>
<?php include("partials/navbar.php") ?>


<body>
<div class="row">
  <div class="leftcolumn">
    <div class="cardleft"> <?php 

$brgs=mysqli_query($conn,"SELECT gambar_user from login WHERE id_user=$cek ");										
while($p=mysqli_fetch_array($brgs)){
  

  $image=$p['gambar_user']; 
  $image_src = "upload/".$image;
  ?>
  
  <img src="<?php echo $image_src; ?>" alt="John Doe" class="avatar">																					
  <?php 
}
    
?>
        
        <?php 
											$brgs=mysqli_query($conn,"SELECT * from login WHERE id_user=$cek ");										
											while($p=mysqli_fetch_array($brgs)){

												?>
												 <h5 style="margin-top:10%"><?php echo $p['nama']  ?></h5>										
                         <p style="margin-top:-10px" ><?php echo $p['email']  ?></p>															
												<?php 
											}
													
											?>




        

        

      </div> 

      <div class="cardleft1">
        <ul class="profil navbar-nav">
        <a href="profil" style="text-decoration:none;"> <li class="nav-item1 active"> <img style="width:8%; padding-bottom:4px;margin-right:10%" src="Assets/user.png"> Profil</li></a>
        <a href="status" > <li class="nav-item1 "> <img style="width:8%; padding-bottom:4px;margin-right:10%" src="Assets/notification1.svg">Status Kelas</li></a>
        <a href="sertifikat"> <li class="nav-item1 "> <img style="width:8%; padding-bottom:4px;margin-right:10%" src="Assets/certification.svg">Sertifikat</li></a>

        </ul>

      </div>
      
  </div>
  <div class="rightcolumn">
      <h2 style="padding-left:20px;">Profil</h2>
    <div class="cardright">
      <div class="card-header" style="background-color:white;">      
        <h5>Kamu</h5>
      </div> 
       <div class="card-body">
       <div class=row style="text-align:center">
      
     
         <div class="col-xs-12 col-md-6" >
                      
         <?php 

											$brgs=mysqli_query($conn,"SELECT gambar_user from login WHERE id_user=$cek ");										
											while($p=mysqli_fetch_array($brgs)){
                        

                        $image=$p['gambar_user']; 
                        $image_src = "upload/".$image;
												?>
                        
												<img src="<?php echo $image_src; ?>" alt="John Doe" class="avatar1">																					
												<?php 
											}
													
											?>
                      

        
          </div>
          <div class="col-xs-12 col-md-6" >
          <form class='formUpload' name='formUpload' id='formUpload' action="profil1" method="POST" enctype="multipart/form-data">
		<input value="Upload Image" class="ToUpload" name="fileToUpload" id="fileToUpload" type="file"style="display: none;">
  <input type="button" class="btn-foto1" value="Unggah" onclick="document.getElementById('fileToUpload').click();" />
	</form>
    


         
          </div>

         
       </div>
      

       </div>
       <div class="card-footer" style="background-color:white;">
       <form class="profil" method="post"  >

<?php 
											$brgs=mysqli_query($conn,"SELECT * from login WHERE id_user=$cek ");										
											while($p=mysqli_fetch_array($brgs)){

												?>
  
                   <div class="form-group" action="profil1.php" method="post">
                    <input type="text" class="form-control form-control-user shadow-none" id="exampleInputEmail" placeholder="Nama" name="nama" value="<?php echo $p['nama']  ?>">
                  </div>
                  <div class="form-group">
                    <input type="text" id=username1 class="form-control form-control-user shadow-none" id="exampleInputEmail" placeholder="Username" name="username" value="<?php echo $p['username']  ?>">
                  </div>
                  <div class="form-group">
                      <input type="email" id="email1" class="form-control form-control-user shadow-none" id="exampleInputEmail" placeholder="Email" name="email" value="<?php echo $p['email']  ?>">
                    </div>
                  <div class="form-group">                    
                      <input type="text" id="noWA1" class="form-control form-control-user shadow-none" id="exampleInputPassword" placeholder="No WA" name="no_wa" value="<?php echo $p['no_wa']  ?>">
                  </div>
                  <div class="form-group">                    
                      <input type="text" id="umur1" class="form-control form-control-user shadow-none" id="exampleInputPassword" placeholder="Umur" name="umur" value="<?php echo $p['umur']  ?>">
                  </div>
                  <div class="form-group">                    
                      <input type="text" id="pekerjaan1" class="form-control form-control-user shadow-none" id="exampleInputPassword" placeholder="Pekerjaan" name="pekerjaan" value="<?php echo $p['pekerjaan']  ?>">
                  </div>
                        

												<?php 
											}
													
											?>
                 
                  <button type="submit" name="adduser" class="btn btn-success form-control" >Simpan</button>
                </form>
       </div>
      </div>
      
      
  </div>
  <div class="rightcolumn2">
      
      <div class="cardleft2">
    
    
      
      <img src="Assets/communications.png" alt="John Doe" class="avatar2">																					
      <h5 style="margin-top:10%">Kamu Butuh Bantuan?</h5>										
      <p style="line-height:1.5;font-weight:normal;" >Tim kami siap untuk menjawab semua pertanyaan kamu seputar program kami.</p>
      <a href ="mailto:info@studybox.id" style="text-decoration:none;"><button class="btn-help">Hubungi Kami</button></a>
    
    
    
    
    
            
    
            
    
          </div> 
      </div>
 

  
</div>



</body>
</html>

<!-- End -->





<script type="text/javascript">
$(window).scroll(function(){
$('nav').toggleClass('scrolled', $(this).scrollTop() > 550);
});
</script>
<script>
function openCity(cityName) {
  var i;
  var x = document.getElementsByClassName("city");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  document.getElementById(cityName).style.display = "block";  
}
</script>
<script type="text/javascript">
$(window).scroll(function(){
$('.logo').toggleClass('scrolled', $(this).scrollTop() > 550);
});   
</script>
<script>

$(document).ready(function(){
                $('#fileToUpload').on('change',function(){
                        $('#formUpload').submit(); 
                });
       });
   
</script>


<script src="script.js"></script>
</body>
