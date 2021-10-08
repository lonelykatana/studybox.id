<?php
session_start();

include 'dbconnect.php';
$id_kelas = $_GET['id_kelas'];
$cariuser['id_user']=$_SESSION['id_user'];
$cek=$cariuser['id_user'];
if(isset($_POST['buyclass'])){
    echo " <div class='alert alert-success'>
    <script>alert('Berhasil mendaftar, Selanjutnya akan kami hubungi melalui whatsapp ya. Terima Kasih')</script>	
      </div>
    <meta http-equiv='refresh' content='1; url= index.php'/>  ";

}

?>


<?php include("partials/headerproduk.php"); ?>
<?php include("partials/navbar.php") ;?>
<?php 
				$p = mysqli_fetch_array(mysqli_query($conn,"Select * from kelas where id_kelas='$id_kelas'"));

				?>
<div class="container" style="padding-top: 3vh">
    <div class="row d-flex">
        <div class="col-12 col-md-5 order-md-2 mb-4 mb-md-0">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span>Cart</span>
               
            </h4>

            <ul class="list-group mb-3">
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div class="d-flex">
                        <div class="mr-4">
                            <h6 class="my-0"><?php echo $p['nama_kelas'] ?> </h6>
                            <small class="text-muted">8 Pertemuan</small>
                        </div>
                        <div class="form-group" style="margin-left: 1vh;">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text dk-span-group">IDR</span>
                                </div>
                                <input type="number" class="form-control" id="amount" placeholder="120000"
                                       value="<?php echo $p['harga_before'] ?>">
                            </div>
                        </div>

                    </div>

                </li>
            </ul>

           
        </div>
        <?php 
											$brgs=mysqli_query($conn,"SELECT * from login WHERE id_user=$cek ");										
											while($p=mysqli_fetch_array($brgs)){

												?>
        <div class="col-12 col-md-7 order-md-1">
            <h4>Checkout</h4>
            <form method = "post" novalidate>

                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label>Name</label>
                                    <input type="text" class="form-control" id="customerName" 
                                           placeholder=" "
                                           value="<?php echo $p['nama']  ?>" required>
                                    <div class="invalid-feedback">
                                        Valid name is required.
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label>Email</label>
                                    <input type="email" class="form-control" id="email" 
                                           placeholder="you@example.com"
                                           value="<?php echo $p['email']  ?>" required>
                                    <div class="invalid-feedback">
                                        Please enter a valid email address for shipping updates.
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label>Phone Number</label>
                                    <input type="text" class="form-control" id="phoneNumber" 
                                           placeholder="6281111111111"
                                           value="<?php echo $p['no_wa']  ?>" required>
                                    <div class="invalid-feedback">
                                        Please enter a valid phone number for shipping updates.
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="pekerjaan">Pekerjaan</label>
                                    <input type="text" class="form-control " id="address"
                                           placeholder="Website Developer" 
                                           value="<?php echo $p['pekerjaan']  ?>" required>
                                  
                                </div>
                                <?php 
											}	
											?>
                                <button name="buyclass" class="btn btn-primary">Purchase</button>
                            </div>
                          
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

   
</div>
    
    <?php include("partials/footer.php") ?>

<!-- End -->
<script src="js/product.js"></script>
<script src="js/jquery-3.2.1.min.js"></script>
<script src="script.js"></script>
</body>
</html>
