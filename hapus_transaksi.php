<?php
ob_start();
session_start();
include "koneksi.php";

$id_trx=$_GET["id_trx"];

$query="delete from transaksi where id_trx='$id_trx'";
//$hasil=mysql_query($query);
$hasil=mysqli_query($koneksi,$query);
// echo "<a href=tampil_transaksi.php>kembali ke tabel</a>";
// echo "<br><br>";
if ($hasil){
	// echo "Data berhasil dihapus";
	header("location:transaksi.php");
}else{
	echo "Data Gagal dihapus";
}
?> 