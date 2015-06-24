<?php 
ob_start();
session_start();
include "koneksi.php";
$reg = $_POST;
// print_r($reg);
// $group = "Downline";
// $status = "0";
$nama = $reg["nama"];
$kode_agen = $reg["kode_agen"];
$pin = $reg["pin"];
$user = $reg["user"];
$pass = md5($reg["pass"]);


$query="insert into user(user,nama,kode_agen,pin,pass) 
values('$user','$nama','$kode_agen','$pin','$pass')";
// print_r($query);
$hasil=mysqli_query($koneksi,$query);
// print_r($hasil);
if ($hasil){
	header("location:login.php");
	
}else{
	echo "Data Gagal disimpan";
}
?> 