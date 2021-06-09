
<?php

include '../dbconnect.php';
$idproduk = $_GET['idproduk'];


$lol = query("SELECT * FROM produk WHERE idproduk='$idproduk'");
if(isset($_POST["update"])){

    if(ubahproduk($_POST) > 0){
        echo "
        <script>alert('data berhasil');
        document.location.href='produk.php';</script>";

    } 
    else{
        echo "
        <script>alert('data error');
        document.location.href='produk.php';</script>";

    }
}
?>
<!DOCTYPE html> 
<html>
<head>
<title>Update Produk - SIPO</title>
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/themify-icons.css">
        <link rel="stylesheet" href="assets/css/metisMenu.css">
        <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
        <link rel="stylesheet" href="assets/css/slicknav.min.css">

        <!-- amchart css -->
        <link
            rel="stylesheet"
            href="https://www.amcharts.com/lib/3/plugins/export/export.css"
            type="text/css"
            media="all"/>
        <!-- Start datatable css -->
        <link
            rel="stylesheet"
            type="text/css"
            href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
        <link
            rel="stylesheet"
            type="text/css"
            href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
        <link
            rel="stylesheet"
            type="text/css"
            href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
        <link
            rel="stylesheet"
            type="text/css"
            href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
        <link
            rel="stylesheet"
            type="text/css"
            href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
        <link
            rel="stylesheet"
            type="text/css"
            href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">

        <!-- others css -->
        <link rel="stylesheet" href="assets/css/typography.css">
        <link rel="stylesheet" href="assets/css/default-css.css">
        <link rel="stylesheet" href="assets/css/styles.css">
        <link rel="stylesheet" href="assets/css/responsive.css">
        <!-- modernizr css -->
        <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
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
							<li><a href="index.php"><span>Home</span></a></li>
							<li><a href="../"><span>Kembali ke Toko</span></a></li>
							<li>
                                <a href="manageorder.php"><i class="ti-dashboard"></i><span>Kelola Pesanan</span></a>
                            </li>
							<li class="active">
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout"></i><span>Kelola Toko
                                    </span></a>
                                <ul class="collapse">
                                    <li ><a href="kategori.php">Kategori</a></li>
                                    <li class="active"><a href="produk.php">Produk</a></li>
									<li><a href="pembayaran.php">Metode Pembayaran</a></li>
                                </ul>
                            </li>
                            <li ><a href="gallery.php"><span>Kelola Gallery</span></a></li>
							<li ><a href="customer.php"><span>Kelola Pelanggan</span></a></li>
							<li><a href="user.php"><span>Kelola Staff</span></a></li>
                            <li>
                                <a href="../logout.php"><span>Logout</span></a>
                                
                            </li>
                            
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    
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
            
    
<!-- modal input -->
<div id="myModal" class="modal fade">

            <h4 class="modal-title">Tambah Produk</h4>
        </div>
        <?php 
											$brgs=mysqli_query($conn,"SELECT * from produk");
											$no=1;
											$p=mysqli_fetch_array($brgs)
												

												?>
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-info">
            <form action="edit_produk.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                    
                    <input
                        name="idproduk"
                        type="hidden"
                        class="form-control"
                        required="required"
                        autofocus="autofocus"
                        value="<?php echo $idproduk ?>">
                </div>
                <div class="form-group">
                    <label>Nama Produk</label>
                    <input
                        name="namaproduk"
                        type="text"
                        class="form-control"
                        required="required"
                        autofocus="autofocus">
                </div>
                <div class="form-group">
                    <label>Nama Kategori</label>
                    <select name="idkategori" class="form-control">
                        <option selected="selected">Pilih Kategori</option>
                        <?php
									$det=mysqli_query($conn,"select * from kategori order by namakategori ASC")or die(mysqli_error());
									while($d=mysqli_fetch_array($det)){
									?>
                        <option value="<?php echo $d['idkategori'] ?>"><?php echo $d['namakategori'] ?></option>
                        <?php
								}
								?>
                    </select>

                </div>
                <div class="form-group">
                    <label>Deskripsi</label>
                    <input name="deskripsi" type="text" class="form-control" required="required">
                </div>
                <div class="form-group">
                    <label>Rating (1-5)</label>
                    <input
                        name="rate"
                        type="number"
                        class="form-control"
                        min="1"
                        max="5"
                        required="required">
                </div>
                <div class="form-group">
                    <label>Harga Sebelum Diskon</label>
                    <input name="hargabefore" type="number" class="form-control">
                </div>
                <div class="form-group">
                    <label>Harga Setelah Diskon</label>
                    <input name="hargaafter" type="number" class="form-control">
                </div>
                <div class="form-group">
                    <label>Gambar</label>
                    <input name="uploadgambar" type="file" class="form-control">
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><a href="produk.php">Batal</button>
                <input name="update" type="submit" class="btn btn-primary" value="update">
            </div>
        </form>
        </div>
        </div>
    </div>
</div>
</div>
   <!-- footer area start-->
   <footer>
            <div class="footer-area">
                <p>Sistem Informasi Produk Organik</p>
            </div>
        </footer>
        <!-- footer area end-->        
       
<script>
$(document).ready(function () {
    $('#dataTable3').DataTable({dom: 'Bfrtip', buttons: ['print']});
});
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
<script
src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script
src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script
src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script
src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<!-- start chart js -->
<script
src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
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
<style>
    ul{
        color:black;
    }
</style>


