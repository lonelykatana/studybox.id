<?php
session_start();

include 'dbconnect.php';
$idk = $_GET['id_kelas'];
if(isset($_POST['addpeserta1']))
	{
	    	echo " 
		<script>alert('Maaf Pendaftaran Batch 1 sudah selesai,silahkan Tunggu dan ikuti Bootcamp Batch 2 kami')</script> 	";
	};
	    /*
		$nama = $_POST['nama'];
		$email = $_POST['email'];
    $umur = $_POST['umur'];
    $nowa = $_POST['nowa'];
    $nama_kelas = $_POST['nama_kelas2'];
    $motivation_letter = $_POST['motivation_letter'];

   
		$tambahuser = mysqli_query($conn,"insert into data_peserta (nama, email, umur, no_wa, nama_kelas2, motivation_letter) 
		values('$nama','$email','$umur','$nowa','$nama_kelas','$motivation_letter')");
    
		if ($tambahuser){
		echo " <div class='alert alert-success'>
		<script>alert('Terima Kasih sudah Mendaftar Kelas di Study Box.')</script>	
		  </div>
		<meta http-equiv='refresh' content='1; url= index.php'/>  ";
		} else { echo "<div class='alert alert-warning'>
			Gagal mendaftar, silakan coba lagi.
		  </div>
		 <meta http-equiv='refresh' content='1; url= produk.php'/> ";
		}
		
	};
	*/

?>
<?php include("partials/headerproduk.php"); ?>
<?php include("partials/navbar.php") ;?>
      <!-- product section-->
 
 <section id="product" class="product" >

  <div class="container" data-aos="fade-up " style="margin-left:15%;padding-top:4vw;">
    <div class="row gx-0" >
    <?php 
				$p = mysqli_fetch_array(mysqli_query($conn,"Select * from kelas where id_kelas='$idk'"));

				?>
      <div  class="produk-detail col-lg-6 d-flex flex-row justify-content-center" data-aos="fade-up" data-aos-delay="200">
     
        <img src="<?php echo $p['gambar']?>" class="img_content" style="border-radius:25px;" alt=""   >  
        <div class="product-content">
     
          <h2><?php echo $p['nama_kelas'] ?></h2>
          <p class="product-description">
          <?php echo $p['deskripsi'] ?>
          </p>
          <div class="text-left text-lg-start">
            <div class="price-product snipcart-item block">
              <div class="harga">
                  <span class="harga1" style="text-decoration: line-through;"><i>Rp <?php echo $p['harga_before'] ?></i></span>
                      <h6 class="harga2" style="padding-left: 2vh; "><b>Rp <?php echo $p['harga_after'] ?></b> </h6>
              </div>
          
              <form method="post">
           
                <?php
          
          if(!isset($_SESSION['log']))
            {	
              echo "<a href='masuk.php'><input type='submit' value='Daftar Kelas'  class='btn_product'style='margin-top:7%' data-toggle='modal' data-target='#myModal' ></a>";
            }
            else{
              echo "<input type='submit' value='Daftar Kelas'  class='btn_product'style='margin-top:7%' data-toggle='modal' name='addpeserta1'>";
            }
                    ?>
              </form>
              <div id="myModal" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Daftar Kelas</h4>
                        </div>
                
                        <div class="modal-body">
                            <form action="produk.php" method="post" enctype="multipart/form-data">
                              
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input name="nama" type="text" class="form-control" required="required">
                                </div>
                                <div class="form-group">
                                  <label>Umur</label>
                                  <input name="umur" type="text" class="form-control" required="required">
                              </div>
                              <div class="form-group">
                                <label>Email</label>
                                <input name="email" type="text" class="form-control" required="required">
                            </div>
                            <div class="form-group">
                                <label>Nama Kelas</label>
                                <input name="nama_kelas2" type="text" class="form-control" value="<?php echo $p['nama_kelas'] ?>" readonly>
                            </div>
                            <div class="form-group">
                              <label>No. Whatsapp</label>
                              <input name="nowa" type="text" class="form-control" required="required">
                          </div>
                          <div class="form-group">
                              <label>Motivation Letter</label>
                              <textarea name="motivation_letter"class="form-control" id="exampleFormControlTextarea1" rows="3"required="required"></textarea>
                          </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                <input name="addpeserta" type="submit" class="btn btn-primary" value="Tambah">
                            </div>
                        </form>
                    </div>
                </div>
                </div>
          </div>
        </div>
      </div>
      

    </div>
    
  </div>
  <!-- FAQs -->
  <div class="faqs">
    <div class="panel_title"><h4>Kurikulum</h4></div>
    <div class="accordions">
            
      <div class="elements_accordions">

        <div class="accordion_container">
          <div class="accordion d-flex flex-row align-items-center active"><div><?php echo $p['judul_week1'] ?></div></div>
          <div class="accordion_panel">
            <p><?php echo $p['detail_week1'] ?></p>
          </div>
        </div>

        <div class="accordion_container">
          <div class="accordion d-flex flex-row align-items-center"><div><?php echo $p['judul_week2'] ?></div></div>
          <div class="accordion_panel">
            <p><?php echo $p['detail_week2'] ?></p>
          </div>
        </div>

        <div class="accordion_container">
          <div class="accordion d-flex flex-row align-items-center"><div><?php echo $p['judul_week3'] ?></div></div>
          <div class="accordion_panel">
            <p><?php echo $p['detail_week3'] ?></p>
          </div>
        </div>

        <div class="accordion_container">
          <div class="accordion d-flex flex-row align-items-center"><div><?php echo $p['judul_week4'] ?></div></div>
          <div class="accordion_panel">
            <p><?php echo $p['detail_week4'] ?></p>
          </div>
        </div>
        <div class="accordion_container">
          <div class="accordion d-flex flex-row align-items-center"><div><?php echo $p['judul_week5'] ?></div></div>
          <div class="accordion_panel">
            <p><?php echo $p['detail_week5'] ?></p>
          </div>
        </div>
        <div class="accordion_container">
          <div class="accordion d-flex flex-row align-items-center"><div><?php echo $p['judul_week6'] ?></div></div>
          <div class="accordion_panel">
            <p><?php echo $p['detail_week6'] ?></p>
          </div>
        </div>
        <div class="accordion_container">
          <div class="accordion d-flex flex-row align-items-center"><div><?php echo $p['judul_week7'] ?></div></div>
          <div class="accordion_panel">
            <p><?php echo $p['detail_week7'] ?></p>
          </div>
        </div>
        <div class="accordion_container">
          <div class="accordion d-flex flex-row align-items-center"><div><?php echo $p['judul_week8'] ?></div></div>
          <div class="accordion_panel">
            <p><?php echo $p['detail_week8'] ?></p>
          </div>
        </div>

      </div>

    </div>
  </div>
</div>

</section><!-- End About Section -->
<!-- Benefit-->
 
  <!-- Footer -->
  <?php include("partials/footer.php") ?>

  <!-- End -->
<script src="js/product.js"></script>
<script src="js/jquery-3.2.1.min.js"></script>
<script src="script.js"></script>
</body>
</html>