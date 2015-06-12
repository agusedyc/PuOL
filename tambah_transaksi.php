<?php
include "koneksi.php";

$query="select * from harga ";
//$perintah=mysql_query($query);
$perintah=mysqli_query($koneksi,$query);
?>
<html>
<head>
<title>Tambah Transaksi</title>
</head>
<body>
<a href="tampil_transaksi.php">kembali ke tabel</a>
<h2>Tambah Transaksi</h2>
<form method="post" action="proses_tambah_transaksi.php">
<table border="0">
  <tr>
    <td>ID</td><td>:</td>
	<td><input name="id_trx" type="text" size="20"></td>
  </tr>
  <tr>
   <td>TANGGAL</td><td>:</td>
    <td><input name="tgl" type="text" size="50"></td> 
  </tr>
   <tr>
    <td>NOMOR HP</td><td>:</td>
    <td><input name="no_hp" type="text"></td>
  </tr>

  <tr>
    <td>NAMA PRODUK</td><td>:</td>
    <td>
	<select name="nama_produk">
		<option value="">pilihan</option>
		<?php while ($data=mysqli_fetch_array($perintah)) {?>
				<option value="<?php echo $data['nama_produk']; ?>"><?php echo $data['nama_produk']; ?></option>
		<?php }?>
				</select>
	
	</td>
  </tr>
   <tr>
    <td>HARGA</td><td>:</td>
    <td><input name="harga" type="text"></td>
  </tr>
  <tr>
    <td>SALDO</td><td>:</td>
    <td><input name="saldo" type="text"></td>
  </tr>
  <tr>
    <td>&nbsp;</td><td>&nbsp;</td>
    <td><input type="submit" name="Submit" value="Tambah">
      <input type="reset" name="Reset" value="Batal"></td>
  </tr>
</table>
</form></body></html>
