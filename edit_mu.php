<?php
ob_start();
session_start();
include "koneksi.php";

$reg = $_POST;
// print_r($reg);
$id_user = $reg['id_user'];
// $group = $reg['group'];
$status = $reg['status_user'];
$nama = $reg['nama'];
// $kode_agen = $reg['kode_agen'];
$pin = $reg['pin'];
$user = $reg['user'];
// $pass = $reg['pass'];
/*
group='$group',
kode_agen='$kode_agen',
pass='$pass'
*/
$query="update user set status_user='$status',nama='$nama',pin='$pin',user='$user' where id_user='$id_user'";
//$hasil=mysql_query($query);
$hasil=mysqli_query($koneksi,$query);
// echo "<a href=index.php>kembali ke tabel</a>";
// echo "<br><br>";
if ($hasil){
	header("location:manage_user.php");
}else{
	echo "Data Gagal dikoreksi";
}
?> 