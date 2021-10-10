<?php 
// isi nama host, username mysql, dan password mysql anda
$conn = mysqli_connect("localhost","id17608588_studybox123","K%T)y-o<T7MDMl6]","id17608588_studybox123");

if(!$conn){
	echo "gagal connect database";
} else {
	
};
function query($query){
    global $conn;
    $result = mysqli_query($conn,$query);
    $rows =[];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;


} 
function ubahproduk($data){
    global $conn;
  
    $iduser=htmlspecialchars($data["id_user"]);
    $nama=htmlspecialchars($data["nama"]);
    $usern=htmlspecialchars($data["username"]);
    $emaill=htmlspecialchars($data["email"]);

  
    $nama_file = $_FILES['uploadgambar']['name'];
    $ext = pathinfo($nama_file, PATHINFO_EXTENSION);
    $random = crypt($nama_file, time());
    $ukuran_file = $_FILES['uploadgambar']['size'];
    $tipe_file = $_FILES['uploadgambar']['type'];
    $tmp_file = $_FILES['uploadgambar']['tmp_name'];
    $path = "produk/".$random.'.'.$ext;
    $pathdb = "/produk/".$random.'.'.$ext;

    if( $tipe_file == "image/jpg" || $tipe_file == "image/png"){
        if( $ukuran_file <= 10000000){ 
          if(move_uploaded_file( $tmp_file, $path)){ 
            
    
          }
        }
      }
    
    $query = "UPDATE login SET 
  
  
     id_user='$iduser',nama ='$nama',username = '$usern',email = '$emaill' , gambar_user = '$pathdb' WHERE id_user=$iduser" ;
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
  }
   

?>