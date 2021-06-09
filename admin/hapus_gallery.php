<?php

include '../dbconnect.php';

$id= $_GET["idpost"];

if( hapusgallery($id)>0){
    
    echo "
    <script>alert('data berhasil dihapus');
    document.location.href='gallery.php';</script>";

} 
else{
    echo "
    <script>alert('data gagal di hapus');
    document.location.href='gallery.php';</script>";

}
?>
