<script language="javascript">
function confirm_hapus()
{
	ok=confirm('Anda yakin ingin menghapus?')
	if (ok){
	  return true;
	}else{
	  return false;
	}
}
</script>
<?php 
// sertakan file koneksi.php
include "koneksi.php";

// perintah query
$query="select * from transaksi";
//$perintah=mysql_query($query);
$perintah=mysqli_query($koneksi,$query);
echo "<a href=index.php><B>TAMPIL HARGA</B></a>";
echo "<h2>Daftar transaksi</h2><br><a href=tambah_transaksi.php>Tambah transaksi</a>
	  <table border=1>
	  <tr>
  <td>ID_TRANSAKSI</td><td>TANGGAL</td>
  <td>NOMOR HP</td><td>NAMA PRODUK</td><td>HARGA</td><td>SALDO</td>
  <td>PILIHAN</td>
	  </tr>";
// tampilkan data
while ($data=mysqli_fetch_array($perintah))
{
	echo "<tr>		  
<td>$data[id_trx]</td><td>$data[tgl]</td>
<td>$data[no_hp]</td><td>$data[nama_produk]</td><td>$data[harga]</td><td>$data[saldo]</td>
	        <td> <a href=edit_transaksi.php?id_trx=$data[id_trx]>edit</a> | 
	         <a href=hapus_transaksi.php?id_trx=$data[id_trx] onclick='return confirm_hapus()'>hapus</a></td>
	  </tr>";
}
echo "</table>";
?> 