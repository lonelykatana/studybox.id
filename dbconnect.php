<?php 
// isi nama host, username mysql, dan password mysql anda
$conn = mysqli_connect("localhost","root","","studybox");

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

  
    $query = "UPDATE login SET 
  
  
     id_user='$iduser',nama ='$nama',username = '$usern',email = '$emaill' WHERE id_user=$iduser" ;
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
  }
   

?>