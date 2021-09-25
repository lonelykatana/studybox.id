<body style="background-color:rgb(247,247,247)">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-md bg-putih navbar-light">
<div class="logo2">
        <img src="Assets/logo_color.svg" style="width:2pc;height: 2pc;">
      <a class=" nav-item" href="index">
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
        <a class="nav-link nav2" href="masuk">Masuk</a>
      </li>
      <li class="nav-item nav3">
        <a class="nav-link nav1" href="daftar">Daftar</a>
      </li>    
      </ul>
      ';
				} else {
					if($_SESSION['role']=='Member'){
				
            echo '

            <li class="nav-item dropdownn" >
          <a  class="nav-link"> <h6>Halo, '.$_SESSION["name"].'<i class="fa fa-caret-down" style="margin-left:8px"></i></h6></a>
            <div class="dropdown-contentt">

            <a style="font-size:1rem;"href="profil">Profil Saya</a>
            <a style="font-size:1rem;"href="logout">Keluar</a>
           
          </li>

            ';
					}
           else if($_SESSION['role']=='Admin') {
            $_SESSION['login_admin']=true;
					echo '
          <li class="nav-item dropdownn" >
          <a  class="nav-link"><h6>Halo, '.$_SESSION["name"].' <i class="fa fa-caret-down" style="margin-left:8px"></i></h6></a>
            <div class="dropdown-contentt">
            <a style="font-size:1rem;"href="admin">Admin Panel</a>
            <a style="font-size:1rem;"href="logout">Keluar</a>
            </div>
          </li>
					';
					}
          
          ;
					
				}
        
				?>
    </ul>
  </div>  
</nav>