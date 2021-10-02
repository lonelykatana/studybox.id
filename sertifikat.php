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
      <a href="profil"> <li class="nav-item1 "> <img style="width:8%; padding-bottom:4px;margin-right:10%" src="Assets/user.png"> Profil</li></a>
        <a href="status" > <li class="nav-item1 "> <img style="width:8%; padding-bottom:4px;margin-right:10%" src="Assets/notification1.svg">Status Kelas</li></a>
        <a href="sertifikat"> <li class="nav-item1 active"> <img style="width:8%; padding-bottom:4px;margin-right:10%" src="Assets/certification.svg">Sertifikat</li></a>

        </ul>

      </div>
      
  </div>
  <div class="rightcolumn">
      <h2 style="padding-left:20px;">Selamat anda telah menyelesaikan langkah pertama.</h2>
    <div class="cardright1">
        <h1>lagi dibuat!!!</h1>
        <h1>lagi dibuat!!!</h1>
        <h1>lagi dibuat!!!</h1>
        <h1>lagi dibuat!!!</h1>
        
      
      
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
<script>
        $(document).ready(function () {
  
            $('ul.navbar-nav > li')
                    .click(function (e) {
                $('ul.navbar-nav > li')
                    .removeClass('active');
                $(this).addClass('active');
            });
        });
    </script>

<script src="script.js"></script>
</body>
