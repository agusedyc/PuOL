<html>
<body>
<?php

include "koneksi.php";

$query2="select * from harga ";
//$perintah2=mysql_query($query2);
$perintah2=mysqli_query($koneksi,$query2);


$id_trx=$_GET["id_trx"];
$query="select * from transaksi where id_trx='$id_trx'";
//$perintah=mysql_query($query);
$perintah=mysqli_query($koneksi,$query);
$data=mysqli_fetch_array($perintah);
echo "<a href=tampil_transaksi.php>kembali ke tabel</a>";
echo "<form method='post' action='proses_edit_transaksi.php'>
<table>
<tr><td>
ID </td><td>: </td><td>$id_trx <td><tr>
<tr><td>TANGGAL</td><td> : </td><td><input name='tgl' type='text' size='50' value='$data[tgl]'></td></tr>
<tr><td>NOMOR HP</td><td> : </td><td><input name='no_hp' type='text' size='50' value='$data[no_hp]'></td></tr>"

?>

<tr><td>NAMA PRODUK</td><td> : </td><td>

  <select name="nama_produk">
  <option value="">pilihan</option>
  <?php while ($data2=mysqli_fetch_array($perintah2)) { ?>
    <option value="<?php echo $data2['nama_produk']; ?>"><?php echo $data2['nama_produk']; ?></option>
  <?php }?>
    </select> </td></tr>





<?php
echo"<tr><td>HARGA</td><td> : </td><td><input name='harga' type='text' size='50' value='$data[harga]'></td></tr>
<tr><td>SALDO</td><td> : </td><td><input name='saldo' type='text' size='50' value='$data[saldo]'></td></tr>
<input type=hidden name=id_trx value='$id_trx'>
<tr><td><input type='submit' name='Submit' value='Koreksi'></td><td></td>
<td><input type='reset' name='Reset' value='Batal'></td></tr>
</table>
</form>";
?>
</body>
</html>