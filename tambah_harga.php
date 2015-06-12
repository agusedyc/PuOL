<html>
<head>
<title>Tambah harga</title>
</head>
<body>
<a href="index.php">kembali ke tabel</a>
<h2>Tambah harga</h2>
<form method="post" action="proses_tambah_harga.php">
<table border="0">
  <tr>
    <td>ID_HARGA</td><td>:</td>
	<td><input name="id_harga" type="text" size="20"></td>
  </tr>
  <tr>
   <td>NAMA PRODUK</td><td>:</td>
    <td><input name="nama_produk" type="text" size="50"></td> 
  </tr>
   <tr>
    <td>KODE PRODUK</td><td>:</td>
    <td><input name="kode_produk" type="text"></td>
  </tr>
    <tr>
    <td>HARGA</td><td>:</td>
    <td><input name="harga" type="text"></td>
  </tr>

  
   
  <tr>
    <td>&nbsp;</td><td>&nbsp;</td>
    <td><input type="submit" name="Submit" value="Tambah">
      <input type="reset" name="Reset" value="Batal"></td>
  </tr>
</table>
</form></body></html>