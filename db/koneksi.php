<?php
$hostname = "Localhost";
$username = "root";
$password = "";
$database_name = "pelatihan";

$db = mysqli_connect($hostname, $username, $password, $database_name);

if($db->connect_error){
    echo "koneksi gagal";
    die("error");
}
   
?>