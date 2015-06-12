<?php
ob_start();
session_start();
include "koneksi.php";

// $id_hj=$_POST["id_hj"];
$id_user=$_SESSION["id_user"];
$kode_produk=$_POST["kode_produk"];
$harga_jual=$_POST["harga_jual"];

$query="insert into harga_jual(id_user,kode_produk,harga_jual) values('$id_user','$kode_produk','$harga_jual')";

$hasil=mysqli_query($koneksi,$query);
if ($hasil){
	header("location:harga_jual.php");
}else{
	echo "Data Gagal dikoreksi";
}
?> 