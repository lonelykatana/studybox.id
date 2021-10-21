
<?php 
	session_start();
    ini_set('display_errors', 1); ini_set('log_errors',1); error_reporting(E_ALL); mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);	
	include 'dbconnect.php';
    if(isset($_POST['updatedata']))
    {   
        $id = $_POST['update_id'];
        $id1 = $_POST['id'];
        $orderid = $_POST['orderid'];

        //upload sertifikat
        $lokasi_file = $_FILES['fupload']['tmp_name'];
$nama_file   = $_FILES['fupload']['name'];
// Tentukan folder untuk menyimpan file
$folder = "sertifikat/$nama_file";
// tanggal sekarang
$tgl_upload = date("Ymd");
// Apabila file berhasil di upload
if (move_uploaded_file($lokasi_file,"$folder")){
  echo "Nama File : <b>$nama_file</b> sukses di upload";
  
  // Masukkan informasi file ke database
  

  $query = "UPDATE login SET sertifikat ='".$nama_file."' where id_user=$id ";
  
            
  mysqli_query($conn, $query);
}
        //upload foto sertifikat
      $query_run = mysqli_query($conn,  "UPDATE transaksi SET order_id='$orderid' WHERE id_user='$id'  ");
        if(!empty($_FILES["image"]["tmp_name"])){
          $fileinfo=PATHINFO($_FILES["image"]["name"]);
          $newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
          move_uploaded_file($_FILES["image"]["tmp_name"],"uploadadmin/" . $newFilename);
          $location="uploadadmin/" . $newFilename;
   
          mysqli_query($conn, "UPDATE login SET gambar_sertifikat='".$location."' where id_user=$id");
      
      }else{
          echo " <div class='alert alert-success'>
          <script>alert('gagal')</script>	
            </div>
          <meta http-equiv='refresh' content='1; url= transaksi.php'/>  ";
      } 
        
  
    }
    


    
  
  
    if(isset($_SESSION['login_admin']))
    {

	

	
	
	?>
    
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
	<link rel="icon" 
      type="image/png" 
      href="../favicon.png">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Kelola Staff - SIPO</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="admin/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="admin/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="admin/assets/css/themify-icons.css">
    <link rel="stylesheet" href="admin/assets/css/metisMenu.css">
    <link rel="stylesheet" href="admin/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="admin/assets/css/slicknav.min.css">
	
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
    <link rel="stylesheet" href="admin/assets/css/typography.css">
    <link rel="stylesheet" href="admin/assets/css/default-css.css">
    <link rel="stylesheet" href="admin/assets/css/styles.css">
    <link rel="stylesheet" href="admin/assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
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
            
            
            <!-- page title area end -->
            <div class="main-content-inner">
               
                <!-- market value area start -->
                <div class="row mt-5 mb-5">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-sm-flex justify-content-between align-items-center">
									<h2>Daftar Peserta</h2>                                
									</div>
                                    <div class="data-tables datatable-dark">
										 <table id="dataTable3" class="display" style="width:100%"><thead class="thead-dark">
											<tr>
                                            <th>Id User</th>
												<th>Id</th>
												<th>Order ID</th>
												
                                                <th>Nama</th>
												<th>Nama Kelas</th>
                                                <td>Update</td>
                                                
                                            
                                                
											</tr></thead><tbody>
											<?php 
											$brgs=mysqli_query($conn,"SELECT transaksi.id_trs, transaksi.order_id, transaksi.id_user, transaksi.id_trs, 
                                            transaksi.nama_kelas, login.nama
                                            FROM (transaksi INNER JOIN login ON transaksi.id_user = login.id_user) ");
											
											while($p=mysqli_fetch_array($brgs)){

												?>
												
												<tr>
                                                    <td><?php echo $p['id_user'] ?></td>
                                                    <td><?php echo $p['id_trs'] ?></td>
													<td><?php echo $p['order_id'] ?></td>
													
                                                    <td><?php echo $p['nama'] ?></td>
													<td><?php echo $p['nama_kelas'] ?></td>
                                                    <td> <button type="button" class="btn btn-success editbtn"> EDIT </button> </td> 
                                                    
                                                    
                                                    													
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

        <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Edit Student Data </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                
                <form action="transaksi.php" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="hidden" name="update_id" id="update_id" >
                        <div class="form-group">
                            <label> id </label>
                            <input type="text" name="id" id="id" class="form-control"
                                placeholder="Enter First Name">
                        </div>
                        <div class="form-group">
                            <label> Oder id </label>
                            <input type="text" name="orderid" id="orderid" class="form-control"
                                placeholder="Enter First Name">
                        </div>





                       
	                    <label>Foto sertifikat:</label><input type="file" name="image" accept="image/*">	
                        <label>File yang di upload :</label> <input type="file" name="fupload"><br>                    
	                    


                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="updatedata" class="btn btn-primary">Update Data</button>
                    </div>
                </form>
        <!-- footer area start-->
        <footer>
            <div class="footer-area">
                <p>Sistem Informasi Produk Organik</p>
            </div>
        </footer>
        <!-- footer area end-->
    </div>
    <!-- page container area end -->
	
<!-- script untuk update -->
<script>
        $(document).ready(function () {

            $("body").on('click', '.editbtn', function (e){
            

                $('#editmodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#update_id').val(data[0]);
               
                $('#id').val(data[1]);
                $('#orderid').val(data[2]);
               
                
            });
        });
    </script>



   

	
	<!-- jquery latest version -->
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <!-- bootstrap 4 js -->
    <script src="admin/assets/js/popper.min.js"></script>
    <script src="admin/assets/js/bootstrap.min.js"></script>
    <script src="admin/assets/js/owl.carousel.min.js"></script>
    <script src="admin/assets/js/metisMenu.min.js"></script>
    <script src="admin/assets/js/jquery.slimscroll.min.js"></script>
    <script src="admin/assets/js/jquery.slicknav.min.js"></script>
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
    <script src="admin/assets/js/line-chart.js"></script>
    <!-- all pie chart -->
    <script src="admin/assets/js/pie-chart.js"></script>
    <!-- others plugins -->
    <script src="admin/assets/js/plugins.js"></script>
    <script src="admin/assets/js/scripts.js"></script>
    <!-- jquery latest version -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
	
</body>
</html>
<?php
}
else
{
echo 'You shall not pass!';
}

?>