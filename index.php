<?php
ob_start();
session_start();

if (empty($_SESSION["user"]) OR empty($_SESSION["group"])){
header("location:login.php");
} else {
if ($_SESSION["group"]!=="Upline"){
  header("location:transaksi.php");
}
// sertakan file koneksi.php
include "koneksi.php";

// perintah query
$query="select * from harga";
//$perintah=mysql_query($query);
$perintah=mysqli_query($koneksi,$query);
$title = "Harga Pulsa";
include "header.php";
include "navbar.php";
include "side.php";
?>


<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Daftar Harga Pulsa
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
      <h3 class="box-title">Tambah Harga</h3>
      <div class="box-tools pull-right">
        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
      </div>
    </div>
    <div class="box-body">
      <form action="proses_tambah_harga.php" method="POST" accept-charset="utf-8">
      	<div class="row">
            <div class="col-xs-3">
              <input type="text" name="nama_produk" class="form-control" placeholder="Nama Produk">
            </div>
            <div class="col-xs-2">
              <input type="text" name="kode_produk" class="form-control" placeholder="Kode Produk">
            </div>
            <div class="col-xs-3">
              <input type="text" name="harga" class="form-control" placeholder="Harga">
            </div>
            <div class="col-xs-4 text-center">
              <button type="submit" class="btn btn-info btn-flat" >Simpan</button>
            </div>
        </div>
      </form>
    </div>
  </div><!-- /.box -->

  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Harga Pulsa</h3>
      <div class="box-tools pull-right">
        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
      </div>
    </div>
    <div class="box-body">
      <table class="table table-striped">
        <tr>
          <th>#</th>
          <th>Nama Produk</th>
          <th>Kode Produk</th>
          <th>Harga</th>
          <th>Action</th>
        </tr>
        <?php
        	$i=0;

        	while ($data=mysqli_fetch_array($perintah)){
        	 $i++
         ?>
        <tr>
          <td><?php echo $i; ?></td>
          <td><?php echo $data["nama_produk"]; ?></td>
          <td><?php echo $data["kode_produk"]; ?></td>
          <td><?php echo $data["harga"]; ?></td>
          <td>
          <a href="index.php?id_harga=<?php echo $data["id_harga"]; ?>"><i class="fa fa-pencil-square"></i> Edit</a> |
	      <a href="hapus_harga.php?id_harga=<?php echo $data["id_harga"]; ?>" onclick='return confirm_hapus()'><i class="fa fa-trash-o"></i> Hapus</a></td>
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
  	$id_harga=$_GET["id_harga"];
  	if ($id_harga==NULL) {
  		// echo "Kosong";
  		Null;
  	}else{
  		$id_harga=$_GET["id_harga"];
  		$queryuharga="select * from harga where id_harga='$id_harga'";
		//$perintah=mysql_query($query);
		$perintahuharga=mysqli_query($koneksi,$queryuharga);
		$datauhrg=mysqli_fetch_array($perintahuharga);
  	?>
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Update Harga</h3>
      <div class="box-tools pull-right">
        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
      </div>
    </div>
    <div class="box-body">
      <form action="proses_edit_harga.php" method="POST" accept-charset="utf-8">
      	<div class="row">
            <div class="col-xs-3">
              <input type="text" name="nama_produk" value="<?php echo $datauhrg["nama_produk"]; ?>" class="form-control" placeholder="Nama Produk">
              <input type="hidden" name="id_harga" value="<?php echo $datauhrg["id_harga"]; ?>">
            </div>
            <div class="col-xs-2">
              <input type="text" name="kode_produk" value="<?php echo $datauhrg["kode_produk"]; ?>" class="form-control" placeholder="Kode Produk">
            </div>
            <div class="col-xs-3">
              <input type="text" name="harga" value="<?php echo $datauhrg["harga"]; ?>" class="form-control" placeholder="Harga">
            </div>
            <div class="col-xs-4 text-center">
              <button type="submit" value='Koreksi' class="btn btn-info btn-flat" >Update</button>
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
