<?php
include "koneksi.php";
$id_harga=$_GET["id_harga"];
$query="select * from harga where id_harga='$id_harga'";
//$perintah=mysql_query($query);
$perintah=mysqli_query($koneksi,$query);
$data=mysqli_fetch_array($perintah);
echo "<a href=index.php>kembali ke tabel</a>";
echo "<form method='post' action='proses_edit_harga.php'>
<table>
<tr><td>
ID HARGA </td><td>: </td><td>$id_harga <td><tr>
<tr><td>NAMA PRODUK</td><td> : </td><td><input name='nama_produk' type='text' size='50' value='$data[nama_produk]'></td></tr>
<tr><td>KODE PRODUK</td><td> : </td><td><input name='kode_produk' type='text' size='50' value='$data[kode_produk]'></td></tr>
<tr><td>HARGA</td><td> : </td><td><input name='harga' type='text' size='50' value='$data[harga]'></td></tr>

<input type=hidden name=id_harga value='$id_harga'>
<tr><td><input type='submit' name='Submit' value='Koreksi'></td><td></td>
<td><input type='reset' name='Reset' value='Batal'></td></tr>
</table>
</form>";
?> 
