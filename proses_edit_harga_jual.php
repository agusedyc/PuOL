<?php
ob_start();
session_start();
include "koneksi.php";

$id_hj=$_POST["id_hj"];
$id_user=$_POST["id_user"];
$kode_produk=$_POST["kode_produk"];
$harga_jual=$_POST["harga_jual"];

$query="update harga_jual set id_user='$id_user', kode_produk='$kode_produk',harga_jual='$harga_jual' where id_hj='$id_hj'";

$hasil=mysqli_query($koneksi,$query);
if ($hasil){
	header("location:harga_jual.php");
}else{
	echo "Data Gagal dikoreksi";
}
?> 