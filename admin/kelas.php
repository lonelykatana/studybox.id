<?php 
	session_start();
	include 'dbconnect.php';


    if(isset($_POST["hapuskelas"])){
        $id= $_GET["id_kelas"];

if( hapuskelas($id)>0){
    
    echo "
    <script>alert('data berhasil dihapus');
    document.location.href='kelas.php';</script>";

} 
else{
    echo "
    <script>alert('data gagal di hapus');
    document.location.href='kelas.php';</script>";

}
    }
    if(isset($_POST["addkelas"])) {
		$nama_kelas=$_POST['nama_kelas'];
		$deskripsi=$_POST['deskripsi'];
		$hargabefore=$_POST['harga_before'];
		$hargaafter=$_POST['harga_after'];
        $jweek1=$_POST['judul_week1'];
		$dweek1=$_POST['detail_week1'];
        $jweek2=$_POST['judul_week2'];
		$dweek2=$_POST['detail_week2'];
        $jweek3=$_POST['judul_week3'];
		$dweek3=$_POST['detail_week3'];
        $jweek4=$_POST['judul_week4'];
		$dweek4=$_POST['detail_week4'];
        $jweek5=$_POST['judul_week5'];
		$dweek5=$_POST['detail_week5'];
        $jweek6=$_POST['judul_week6'];
		$dweek6=$_POST['detail_week6'];
        $jweek7=$_POST['judul_week7'];
		$dweek7=$_POST['detail_week7'];
        $jweek8=$_POST['judul_week8'];
		$dweek8=$_POST['detail_week8'];

		$nama_file = $_FILES['uploadgambar']['name'];
		$ext = pathinfo($nama_file, PATHINFO_EXTENSION);
		$random = crypt($nama_file, time());
		$ukuran_file = $_FILES['uploadgambar']['size'];
		$tipe_file = $_FILES['uploadgambar']['type'];
		$tmp_file = $_FILES['uploadgambar']['tmp_name'];
		$path = "../produk/".$random.'.'.$ext;
		$pathdb = "produk/".$random.'.'.$ext;


		if($tipe_file == "image/jpeg" || $tipe_file == "image/png"){
		  if($ukuran_file <= 5000000){ 
			if(move_uploaded_file($tmp_file, $path)){ 
			
			  $query = "insert into kelas (nama_kelas, gambar, deskripsi,harga_before, harga_after,judul_week1,detail_week1 ,judul_week2,detail_week2 ,judul_week3,detail_week3 ,judul_week4,detail_week4 ,judul_week5,detail_week5 ,judul_week6,detail_week6 ,judul_week7,detail_week7 ,judul_week8,detail_week8)
			  values('$nama_kelas','$pathdb','$deskripsi','$hargabefore','$hargaafter','$jweek1','$dweek1', '$jweek2','$dweek2','$jweek3','$dweek3','$jweek4','$dweek4','$jweek5','$dweek5','$jweek6','$dweek6','$jweek7','$dweek7','$jweek8','$dweek8')";
			  $sql = mysqli_query($conn, $query); // Eksekusi/ Jalankan query dari variabel $query
			  
			  if($sql){ 
				
				echo "<br><meta http-equiv='refresh' content='5; URL=kelas.php'> You will be redirected to the form in 5 seconds";
					
			  }else{
				// Jika Gagal, Lakukan :
				echo "Sorry, there's a problem while submitting.";
				echo "<br><meta http-equiv='refresh' content='5; URL=kelas.php'> You will be redirected to the form in 5 seconds";
			  }
			}else{
			  // Jika gambar gagal diupload, Lakukan :
			  echo "Sorry, there's a problem while uploading the file.";
			  echo "<br><meta http-equiv='refresh' content='5; URL=kelas.php'> You will be redirected to the form in 5 seconds";
			}
		  }else{
			// Jika ukuran file lebih dari 1MB, lakukan :
			echo "Sorry, the file size is not allowed to more than 1mb";
			echo "<br><meta http-equiv='refresh' content='5; URL=kelas.php'> You will be redirected to the form in 5 seconds";
		  }
		}else{
		  // Jika tipe file yang diupload bukan JPG / JPEG / PNG, lakukan :
		  echo "Sorry, the image format should be JPG/PNG.";
		  echo "<br><meta http-equiv='refresh' content='5; URL=kelas.php'> You will be redirected to the form in 5 seconds";
		}
	
	};
	?>

<head>
    <meta charset="utf-8">
	<link rel="icon" 
      type="image/png" 
      href="../favicon.png">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Kelola Pelanggan - SIPO</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
	
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
	<!-- Start datatable css -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
	
    <!-- others css -->
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <div class="sidebar-menu">
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                    <ul class="metismenu" id="menu">
							<li class="active"><a href="index.php"><span>Home</span></a></li>
							<li><a href="../"><span>Kembali ke Study Box</span></a></li>
							<li>
                                <a href="kelas.php"><i class="ti-dashboard"></i><span>Kelola Kelas</span></a>
                            </li>
							
							<li><a href="user.php"><span>Kelola user</span></a></li>
							<li><a href="peserta.php"><span>Kelola pendaftar kelas</span></a></li>
                            <li>
                                <a href="../logout.php"><span>Logout</span></a>
                                
                            </li>
                            
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <div class="header-area">
                <div class="row align-items-center">
                    <!-- nav and search button -->
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                    <!-- profile info & task notification -->
                    <div class="col-md-6 col-sm-4 clearfix">
                        <ul class="notification-area pull-right">
                            <li><h3><div class="date">
								<script type='text/javascript'>
						
						var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
						var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
						var date = new Date();
						var day = date.getDate();
						var month = date.getMonth();
						var thisDay = date.getDay(),
							thisDay = myDays[thisDay];
						var yy = date.getYear();
						var year = (yy < 1000) ? yy + 1900 : yy;
						document.write(thisDay + ', ' + day + ' ' + months[month] + ' ' + year);		
						//-->
						</script></b></div></h3>

						</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- header area end -->
			
			
            <!-- page title area end -->
            <div class="main-content-inner">
               
                <!-- market value area start -->
                <div class="row mt-5 mb-5">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-sm-flex justify-content-between align-items-center">
									<h2>Daftar Pelanggan</h2>
                                    <button
                                        style="margin-bottom:20px"
                                        data-toggle="modal"
                                        data-target="#myModal"
                                        class="btn btn-info col-md-2">Tambah Produk</button>
                                        <div id="myModal" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Daftar Kelas</h4>
                        </div>
                
                        <div class="modal-body">
                            <form action="kelas.php" method="post" enctype="multipart/form-data">
                              
                                <div class="form-group">
                                    <label>Nama Kelas</label>
                                    <input name="nama_kelas" type="text" class="form-control" required="required">
                                </div>
                                <div class="form-group">
                                  <label>deskripsi</label>
                                  <input name="deskripsi" type="text" class="form-control" required="required">
                              </div>
                              <div class="form-group">
                                <label>hargabefore</label>
                                <input name="harga_before" type="text" class="form-control" required="required">
                            </div>
                            <div class="form-group">
                              <label>Harga After</label>
                              <input name="harga_after" type="text" class="form-control" required="required">
                          </div>
                          <div class="form-group">
                              <label>judul week1 </label>
                              <input name="judul_week1" type="text" class="form-control" required="required">
                          </div>
                          <div class="form-group">
                              <label>detail week 1</label>
                              <input name="detail_week1" type="text" class="form-control" required="required">
                          </div>
                          <div class="form-group">
                              <label>judul week2 </label>
                              <input name="judul_week2" type="text" class="form-control" required="required">
                          </div>
                          <div class="form-group">
                              <label>detail week2 </label>
                              <input name="detail_week2" type="text" class="form-control" required="required">
                          </div>
                          <div class="form-group">
                              <label>judul week3 </label>
                              <input name="judul_week3" type="text" class="form-control" required="required">
                          </div>
                          <div class="form-group">
                              <label>detail week3 </label>
                              <input name="detail_week3" type="text" class="form-control" required="required">
                          </div>
                          <div class="form-group">
                              <label>judul week4 </label>
                              <input name="judul_week4" type="text" class="form-control" required="required">
                          </div>
                          <div class="form-group">
                              <label>detail week4 </label>
                              <input name="detail_week4" type="text" class="form-control" required="required">
                          </div>
                          <div class="form-group">
                              <label>judul week5 </label>
                              <input name="judul_week5" type="text" class="form-control" required="required">
                          </div>
                          <div class="form-group">
                              <label>detail week5 </label>
                              <input name="detail_week5" type="text" class="form-control" required="required">
                          </div>
                          <div class="form-group">
                              <label>judul week6 </label>
                              <input name="judul_week6" type="text" class="form-control" required="required">
                          </div>
                          <div class="form-group">
                              <label>detail week6 </label>
                              <input name="detail_week6" type="text" class="form-control" required="required">
                          </div>
                          <div class="form-group">
                              <label>judul week7 </label>
                              <input name="judul_week7" type="text" class="form-control" required="required">
                          </div>
                          <div class="form-group">
                              <label>detail week7 </label>
                              <input name="detail_week7" type="text" class="form-control" required="required">
                          </div>
                          <div class="form-group">
                              <label>judul week8 </label>
                              <input name="judul_week8" type="text" class="form-control" required="required">
                          </div>
                          <div class="form-group">
                              <label>detail week8 </label>
                              <input name="detail_week8" type="text" class="form-control" required="required">
                          </div>

                          <div class="form-group">
                        <label>Gambar</label>
                        <input name="uploadgambar" type="file" class="form-control">
                    </div>             
                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                <input name="addkelas" type="submit" class="btn btn-primary" value="Tambah">
                            </div>
                        </form>
                    </div>
                </div>
                
                
                
                </div>
								</div>
                                <div class="data-tables datatable-dark">
                                    <table id="dataTable3" class="display" style="width:100%">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>No.</th>
                                                <th>Nama Produk</th>
                                                <th>Gambar</th>
                                                <th>Deskripsi</th>
                                                <th>Harga before</th>
                                                <th>Harga after</th>
                                                <th>Judul Week 1</th>
                                                <th>Detail Week 1</th>
                                                <th>Judul Week 2</th>
                                                <th>Detail Week 2</th>
                                                <th>Judul Week 3</th>
                                                <th>Detail Week 3</th>
                                                <th>Judul Week 4</th>
                                                <th>Detail Week 4</th>
                                                <th>Judul Week 5</th>
                                                <th>Detail Week 5</th>
                                                <th>Judul Week 6</th>
                                                <th>Detail Week 6</th>
                                                <th>Judul Week 7</th>
                                                <th>Detail Week 7</th>
                                                <th>Judul Week 8</th>
                                                <th>Detail Week 8</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
											$brgs=mysqli_query($conn,"SELECT * from kelas order by id_kelas ASC");
											$no=1;
											while($p=mysqli_fetch_array($brgs)){
                                                $id = $p['id_kelas'];

												?>

                                            <tr>
                                                <td><?php echo $no++ ?></td>
                                                <td><?php echo $p['nama_kelas'] ?></td>
                                                <td><img src="../<?php echo $p['gambar'] ?>" width="50%" \="\"></td>
                                                <td><?php echo $p['deskripsi'] ?></td>
                                                <td><?php echo $p['harga_before'] ?></td>
                                                <td><?php echo $p['harga_after'] ?></td>
                                                <td><?php echo $p['judul_week1'] ?></td>
                                                <td><?php echo $p['detail_week1'] ?></td>
                                                <td><?php echo $p['judul_week2'] ?></td>
                                                <td><?php echo $p['detail_week2'] ?></td>
                                                <td><?php echo $p['judul_week3'] ?></td>
                                                <td><?php echo $p['detail_week3'] ?></td>
                                                <td><?php echo $p['judul_week4'] ?></td>
                                                <td><?php echo $p['detail_week4'] ?></td>
                                                <td><?php echo $p['judul_week5'] ?></td>
                                                <td><?php echo $p['detail_week5'] ?></td>
                                                <td><?php echo $p['judul_week6'] ?></td>
                                                <td><?php echo $p['detail_week6'] ?></td>
                                                <td><?php echo $p['judul_week7'] ?></td>
                                                <td><?php echo $p['detail_week7'] ?></td>
                                                <td><?php echo $p['judul_week8'] ?></td>
                                                <td><?php echo $p['detail_week8'] ?></td>
                                               
                                                <td class="invert">
                                                    <div class="rem">           
                                                    <a class="aksi" href="hapus_kelas.php?id_kelas=<?php echo $p['id_kelas'] ?>">  <input type="submit" name="hapus" class="form-control" value="Hapus" ></a> 
                                                    <a class="aksi" href="edit_kelas.php?id_kelas=<?php echo $p['id_kelas'] ?>">  <input type="submit" name="update" class="form-control" value="update" ></a>  
                                                    </form>
                                                </div>
                                                
                                            </td>

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
                    </div>
                </div>
              
                
                <!-- row area start-->
            </div>
        </div>
        <!-- main content area end -->
        
        <!-- footer area start-->
        <footer>
            <div class="footer-area">
                <p>Sistem Informasi Produk Organik</p>
            </div>
        </footer>
        <!-- footer area end-->
    </div>
    <!-- page container area end -->
	
	
	<script>
	
	$(document).ready(function() {
    $('#dataTable3').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'print'
        ]
    } );
	} );
	</script>
	
	<!-- jquery latest version -->
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <!-- bootstrap 4 js -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>
		<!-- Start datatable js -->
	 <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <!-- start chart js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <!-- start highcharts js -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <!-- start zingchart js -->
    <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
    <script>
    zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
    ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "ee6b7db5b51705a13dc2339db3edaf6d"];
    </script>
    <!-- all line chart activation -->
    <script src="assets/js/line-chart.js"></script>
    <!-- all pie chart -->
    <script src="assets/js/pie-chart.js"></script>
    <!-- others plugins -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>
	
	
</body>

</html>
