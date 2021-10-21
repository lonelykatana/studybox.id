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
      <a href="profil"> <li class="nav-item1 "> <img style="width:8%; padding-bottom:4px;margin-right:10%" src="Assets/bx_bxs-user.svg" class="filter-green"/> Profil</li></a>
        <a href="status" > <li class="nav-item1 active"> <img style="width:8%; padding-bottom:4px;margin-right:10%" src="Assets/vector.svg" class="filter-white"/>Status Kelas</li></a>
        <a href="sertifikat1"> <li class="nav-item1 "> <img style="width:8%; padding-bottom:4px;margin-right:10%" src="Assets/certificate.svg" class="filter-green"/>Sertifikat</li></a>


        </ul>

      </div>
      
  </div>
  <div class="rightcolumn3">
      <h2 class="profile-title">Status</h2>
    <div class="cardright3">
       <div class="card-body" style="height:250px">
       <table class="table table-bordered">
           <thead>
               <tr>
                   <th>No. Order</th>
                   <th>Nama Kelas</th>
                   <th>Tanggal Pembayaran</th>
                   <th>Status Pembayaran</th>

               </tr>
           </thead>
           <?php 
                       $sql = "SELECT transaksi.nama_kelas ,order_list.transaction_time ,order_list.transaction_status\n"
                      . "FROM ((transaksi\n"
                      . "INNER JOIN login ON transaksi.id_user = login.id_user)\n" 
                      . "INNER JOIN order_list ON transaksi.order_id = order_list.order_id) WHERE transaksi.id_user = $cek";
											$la=mysqli_query($conn,$sql);
											$no=1;
											while($a=mysqli_fetch_array($la)){

												?>
           <tbody>
               <tr>
           <td><?php echo $no++ ?></td>
           <td><?php echo $a['nama_kelas'] ?></td>
           <td><?php echo $a['transaction_time'] ?></td>
           <td><?php echo $a['transaction_status'] ?></td>
           </tr>
            <?php
											}
											?>
           </tbody>
                                        </table>
                                       
                                        
      

       </div>
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
