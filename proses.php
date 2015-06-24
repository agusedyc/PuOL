<?php
ob_start();
session_start();
include "koneksi.php";
$user=$_POST[user];
$pass=md5($_POST[pass]);
$login=mysqli_query($koneksi,"SELECT * FROM user WHERE user='$user' AND pass='$pass'");
$jumlah=mysqli_num_rows($login);
$x=mysqli_fetch_array($login);
if($jumlah == 1 and $x[status_user]!='0'){
$_SESSION[id_user]=$x[id_user];
$_SESSION[user]=$x[user];
$_SESSION[nama]=$x[nama];
$_SESSION[create_at]=$x[create_at];
$_SESSION[kode_agen]=$x[kode_agen];
$_SESSION[group]=$x[group];
header("location:transaksi.php");
}
else{
header("location:login.php");
}

?>
