<?php
ob_start();
session_start();
include "koneksi.php";

$id_trx=$_POST["id_trx"];
$tgl=$_POST["tgl"];
$no_hp=$_POST["no_hp"];
$kode_produk=$_POST["kode_produk"];
$bayar=$_POST["bayar"];
$saldo=$_POST["saldo"];
$id_user = $_SESSION["id_user"];

//Ambil Data Harga Setiap user
$ambilq="select * from harga_jual where id_user='$id_user' and kode_produk='$kode_produk'";
$ambil=mysqli_query($koneksi,$ambilq);
$dth=mysqli_fetch_array($ambil);

if($dth['harga_jual']!==NULL){
	// echo "Ada";
	if ($bayar==NULL) {
		$status = "Belum Bayar";
	}elseif($bayar>=$dth['harga_jual']){
		$status = "LUNAS";
	}else{
		$sisa = $dth['harga_jual'] - $bayar;
		$status = "- ".$sisa;
	}
}else{
	$status = "Harga Jual Belum Di input";
	// echo "Tidak Ada";
}

/*echo "<pre>";
// print_r($_POST);
print_r($bayar);
echo "<br>";
print_r($dth['harga_jual']);
echo "<br>";
print_r($_SESSION['id_user']);
echo "<br>";
print_r($dth);
echo "<br>";
print_r($status);
echo "</pre>";*/

$query="update transaksi set id_user='$id_user', tgl='$tgl', no_hp='$no_hp',kode_produk='$kode_produk',bayar='$bayar',saldo='$saldo', bayar='$bayar', status='$status' where id_trx='$id_trx'";
$hasil=mysqli_query($koneksi,$query);
if ($hasil){
	// echo "Data berhasil dikoreksi";
	header("location:transaksi.php");
}else{
	echo "Data Gagal dikoreksi";
}

?> 