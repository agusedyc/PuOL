<?php 
ob_start();
session_start();
include "koneksi.php";
$id_harga    = $_POST["id_harga"];
$nama_produk = $_POST["nama_produk"];
$kode_produk = $_POST["kode_produk"];
$harga       = $_POST["harga"];


$query="insert into harga(id_harga,nama_produk,kode_produk,harga) values('$id_harga','$nama_produk','$kode_produk','$harga')";
//$hasil=mysql_query($query);
$hasil=mysqli_query($koneksi,$query);
// echo "<a href=index.php>kembali ke tabel</a>";
// echo "<br><br>";
if ($hasil){
	header("location:index.php");
	
}else{
	echo "Data Gagal disimpan";
}
?> 