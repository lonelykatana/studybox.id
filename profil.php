<?php
session_start();
include 'dbconnect.php';

$idk = $_SESSION['id_user'];
if(isset($_POST['addprod'])){
	if(!isset($_SESSION['log']))
		{	
			header('location:masuk.php');
		}
    else{
      header('location:produk.php');
    }
  }

  if(isset($_POST["adduser"])){

    if(ubahproduk($_POST) > 0){
        echo "
        <script>alert('data berhasil');
        document.location.href='profil.php';</script>";

    } 
    else{
        echo "
        <script>alert('data error');
        document.location.href='profil.php';</script>";

    }
}
?>
<?php include("partials/headerindex.php") ?>
<?php include("partials/navbar.php") ?>

<div class="profile-container">
    <div class="name-account">
        <img src="foto12.jpg  " class="pict-profile">
       
        <span class="name-profile">
        <?php
								if(isset($_SESSION['log'])){
					echo '  '.$_SESSION["name"].' ';
                                }
                                ?>	
</span>
    </div>

    <table style="margin-top:4vw">
        <tr>
            <td width="19%" style="border-right: 1px solid black;" valign="top" >

            <ul>
        <li class="menu-profile-text" onclick="openCity('London')"><i class="fa fa-user" aria-hidden="true" style="font-size:20px; padding-right:0.7vw"></i>My Profile</li>
        <li class="menu-profile-text" onclick="openCity('Paris')"><i class="fa fa-star-half-o" aria-hidden="true" style="font-size:20px; padding-right:0.5vw"></i>Order Course</li>
        <li class="menu-profile-text" onclick="openCity('Tokyo')"><i class="fa fa-key" aria-hidden="true" style="font-size:20px; padding-right:0.4vw"></i>Edit Profile</li>
  </ul>

</td>
            <td>

            <div id="London" class="city sub-menu-content"  style="display:none">
  <h2>My Profile</h2>
  <div class="sub-menu-text">
  <div> <span class="caption-menu">Nama</span>
     <span class="profile-content-text"> <?php echo '  '.$_SESSION["name"].' ';?></span></div>
    
  </div>
  <div class="sub-menu-text">
  <div> <span class="caption-menu">Username</span>
     <span class="profile-content-text"> <?php echo '  '.$_SESSION["usern"].' ';?></span></div>
    
  </div>
  <div class="sub-menu-text">
  <div> <span class="caption-menu">Email</span>
     <span class="profile-content-text"> <?php echo '  '.$_SESSION["emaill"].' ';?></span></div>
    
  </div>
  <div class="sub-menu-text">
  <div> <span class="caption-menu">No.HP</span>
     <span class="profile-content-text"> <?php echo '  '.$_SESSION["name"].' ';?></span></div>
  </div>
  <div class="sub-menu-text">
  <div> <span class="caption-menu">Umur</span>
     <span class="profile-content-text"> <?php echo '  '.$_SESSION["name"].' ';?></span></div>
  </div>
  <div class="sub-menu-text">
  <div> <span class="caption-menu">Pekerjaan</span>
     <span class="profile-content-text"> <?php echo '  '.$_SESSION["name"].' ';?></span></div>
  </div>
</div>

<div id="Paris" class="w3-container w3-display-container city" style="display:none">
 
  <h2>Order Course</h2>
  <p>ini tempat melihat pembayaran course</p> 
</div>

<div id="Tokyo" class="sub-menu-content city" style="display:none">
 



  <h2>Edit Profile</h2>
  <form method="post" action="profil.php" class="form-edit-profile">
  <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="exampleInputEmail" placeholder="id_user"   name="id_user"  value="<?php echo '  '.$_SESSION["id_user"].' ';?>">
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="exampleInputEmail" placeholder="Nama"   name="nama"  value="<?php echo '  '.$_SESSION["name"].' ';?>">
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="exampleInputEmail" placeholder="Username" name="username" value="<?php echo '  '.$_SESSION["usern"].' ';?>">
                  </div>
                  <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email" name="email" value="<?php echo '  '.$_SESSION["emaill"].' ';?>">
                    </div>
                  <hr>
    <button type="submit" name="adduser" class="btn btn-success form-control">Edit</button>
                </form>
 
</div>
            </td>
        </tr>
    </table>
</div>


   
       <!-- <hr style="border-top: 1px solid black; margin-top:3vw">
        <div class="menu-profile">
            
    <ul>
  <li class="w3-bar-item w3-button" onclick="openCity('London')">London</li>
  <li class="w3-bar-item w3-button" onclick="openCity('Paris')">Paris</li>
  <li class="w3-bar-item w3-button" onclick="openCity('Tokyo')">Tokyo</li>
  </ul>
</div>

<div id="London" class="w3-container w3-display-container city">
  <span onclick="this.parentElement.style.display='none'"
  class="w3-button w3-large w3-display-topright">&times;</span>
  <h2>London</h2>
  <p>London is the capital city of England.</p>
</div>

<div id="Paris" class="w3-container w3-display-container city" style="display:none">
  <span onclick="this.parentElement.style.display='none'"
  class="w3-button w3-large w3-display-topright">&times;</span>
  <h2>Paris</h2>
  <p>Paris is the capital of France.</p> 
</div>

<div id="Tokyo" class="w3-container w3-display-container city" style="display:none">
  <span onclick="this.parentElement.style.display='none'"
  class="w3-button w3-large w3-display-topright">&times;</span>
  <h2>Tokyo</h2>
  <p>Tokyo is the capital of Japan.</p>
</div>


        </div>
    </div>
    
</div>
-->





<!-- Footer -->
<?php include("partials/footer.php") ?>
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
<script src="script.js"></script>
</body>
