<?php
ob_start();
session_start();
include "koneksi.php";

$id_harga=$_GET["id_harga"];

$query="delete from harga where id_harga='$id_harga'";
//$hasil=mysql_query($query);
$hasil=mysqli_query($koneksi,$query);
// echo "<a href=index.php>kembali ke tabel</a>";
// echo "<br><br>";
if ($hasil){
	header("location:index.php");
}else{
	echo "Data Gagal dihapus";
}
?> 