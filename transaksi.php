<?php 
ob_start();
session_start();

if (empty($_SESSION["user"]) OR empty($_SESSION["group"])){
header("location:login.php");
} else {

// sertakan file koneksi.php
include "koneksi.php";
$id_user = $_SESSION["id_user"];
// perintah query
$query="select * from transaksi where id_user='$id_user'";
//$perintah=mysql_query($query);
$perintah=mysqli_query($koneksi,$query);

// perintah query
$pilquery="select * from harga";
$pilperintah=mysqli_query($koneksi,$pilquery);

//Ambil Kode
$pilquery="select * from harga_jual where id_user='$id_user'";
$pilperintah=mysqli_query($koneksi,$pilquery);

$title = "Transaksi";
include "header.php";
include "navbar.php";
include "side.php";
?>


<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Transaksi Pulsa  
  </h1>
</section>

<!-- Main content -->
<section class="content">
 <!--  <div class="callout callout-info">
    <h4>Harga Pulsa</h4>
    <p>Add the fixed class to the body tag to get this layout. The fixed layout is your best option if your sidebar is bigger than your content because it prevents extra unwanted scrolling.</p>
  </div> -->
  <!-- Default box -->
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Tambah Transaksi</h3>
      <div class="box-tools pull-right">
        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
      </div>
    </div>
    <div class="box-body">
      <form action="proses_tambah_transaksi.php" method="POST" accept-charset="utf-8">
      	<div class="row">
            <div class="col-xs-2">
              <input type="date" name="tgl" class="form-control" placeholder="Tanggal ..">
            </div>
            <div class="col-xs-2">
              <input type="text" name="no_hp" class="form-control" placeholder="No Hp..">
            </div>
            <div class="col-xs-2">
              <!-- <input type="text" name="kode_produk" class="form-control" placeholder="Kode Produk.."> -->
              <select name="kode_produk" class="form-control">
                <option value="">Pilih Kode Produk</option>
                <?php while ($pildata=mysqli_fetch_array($pilperintah)) {?>
                    <option value="<?php echo $pildata['kode_produk']; ?>"><?php echo $pildata['kode_produk']; ?></option>
                <?php }?>
              </select>
            </div>
             <div class="col-xs-2">
              <input type="text" name="bayar" class="form-control" placeholder="Bayar..">
            </div>
             <div class="col-xs-2">
              <input type="text" name="saldo" class="form-control" placeholder="Saldo Akhir">
            </div>
            <div class="col-xs-2 text-center">
              <button type="submit" class="btn btn-info btn-flat" >Simpan</button>
            </div>
        </div>
      </form>
    </div>
  </div><!-- /.box -->

  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Transaksi Pulsa</h3>
      <div class="box-tools pull-right">
        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
      </div>
    </div>
    <div class="box-body">
      <table class="table table-striped">
        <tr>
          <th>#</th>
          <th>Tanggal</th>
          <th>No HP</th>
          <th>Kode Produk</th>
          <th>Bayar</th>
          <th>Tgl Bayar</th>
          <th>Status</th>
          <!-- <th>Saldo</th> -->
          <th>Action</th>
        </tr>
        <?php 
        	$i=0;

        	while ($data=mysqli_fetch_array($perintah)){
        	 $i++
         ?>
        <tr>
          <td><?php echo $i; ?></td>
          <td><?php echo $data["tgl"]; ?></td>
          <td><?php echo $data["no_hp"]; ?></td>
          <td><?php echo $data["kode_produk"]; ?></td>
          <td><?php echo $data["bayar"]; ?></td>
          <td><?php echo $data["tgl_bayar"]; ?></td>
          <td><?php echo $data["status"]; ?></td>
          <!-- <td><?php //echo $data["saldo"]; ?></td> -->
          <td>
          <a href="transaksi.php?id_trx=<?php echo $data["id_trx"]; ?>"><i class="fa fa-pencil-square"></i> Edit</a> | 
	      <a href="hapus_transaksi.php?id_trx=<?php echo $data["id_trx"]; ?>" onclick='return confirm_hapus()'><i class="fa fa-trash-o"></i> Hapus</a></td>
  		  </tr>
        </tr>
        <?php 
        	}
         ?>
      </table>
    </div><!-- /.box-body -->
    <!-- <div class="box-footer">
      Footer
    </div> --><!-- /.box-footer-->
  </div><!-- /.box -->
  <?php 
  	$id_trx=$_GET["id_trx"];
  	if ($id_trx==NULL) {
  		// echo "Kosong";
  		Null;
  	}else{
  		$id_trx=$_GET["id_trx"];
  		$queryutrx="select * from transaksi where id_trx='$id_trx'";
		//$perintah=mysql_query($query);
		$perintahutrx=mysqli_query($koneksi,$queryutrx);
		$datautrx=mysqli_fetch_array($perintahutrx);

		$pilquery="select * from harga_jual where id_user='$id_user'";
		$pilperintah=mysqli_query($koneksi,$pilquery);
  	?>
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Update Transaksi</h3>
      <div class="box-tools pull-right">
        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
      </div>
    </div>
    <div class="box-body">
      <form action="proses_edit_transaksi.php" method="POST" accept-charset="utf-8">
      	<div class="row">
      		<div class="col-xs-2">
              <input type="date" name="tgl" value="<?php echo $datautrx["tgl"]; ?>" class="form-control" placeholder="Tanggal ..">
              <input type="hidden" name="id_trx" value="<?php echo $datautrx["id_trx"]; ?>">
            </div>
            <div class="col-xs-2">
              <input type="text" name="no_hp" value="<?php echo $datautrx["no_hp"]; ?>" class="form-control" placeholder="No Hp..">
            </div>
            <div class="col-xs-2">
              <!-- <input type="text" name="kode_produk" value="<?php //echo $datautrx["kode_produk"]; ?>" class="form-control" placeholder="Kode Produk.."> -->
              <select name="kode_produk" class="form-control">
              	<?php //if($datautrx["kode_produk"]!=NULL) { ?>
              		<option value="<?php echo $datautrx["kode_produk"]; ?>"><?php echo $datautrx["kode_produk"]; ?></option>
              	<?php //}else{ ?>
              		<!-- <option value="">Pilih Kode Produk</option> -->
              	<?php// } ?>
                
                <?php while ($pildata=mysqli_fetch_array($pilperintah)) {?>
                    <option value="<?php echo $pildata['kode_produk']; ?>"><?php echo $pildata['kode_produk']; ?></option>
                <?php }?>
              </select>
            </div>
             <div class="col-xs-2">
              <input type="text" name="bayar" value="<?php echo $datautrx["bayar"]; ?>" class="form-control" placeholder="Bayar..">
            </div>
             <div class="col-xs-2">
              <input type="text" name="saldo" value="<?php echo $datautrx["saldo"]; ?>" class="form-control" placeholder="Saldo Akhir">
            </div>
            <div class="col-xs-2 text-center">
              <button type="submit" class="btn btn-info btn-flat" >Update</button>
            </div>
        </div>
      </form>
    </div>
  </div><!-- /.box -->
  <?php
  	}
   ?>
</section><!-- /.content -->



<?php } 
include "footer-content.php";
?>

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