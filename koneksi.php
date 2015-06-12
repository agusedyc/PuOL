<?php 
$host="localhost";
$username="root";
$password="agusedyc";
$db="pulsa";

// koneksi ke server
//mysql_connect($host,$username,$password) or die ("Koneksi GAGAL");
$koneksi=mysqli_connect($host,$username,$password,$db) or die (mysqli_connect_error());
// pilih database
//mysql_select_db($db) or die ("database tidak bisa dipilih");
?> 