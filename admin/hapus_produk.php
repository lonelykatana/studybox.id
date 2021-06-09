<?php

include '../dbconnect.php';

$id= $_GET["idproduk"];

if( hapusproduk($id)>0){
    
    echo "
    <script>alert('data berhasil dihapus');
    document.location.href='produk.php';</script>";

} 
else{
    echo "
    <script>alert('data gagal di hapus');
    document.location.href='produk.php';</script>";

}
?>
