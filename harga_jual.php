<?php 
ob_start();
session_start();

if (empty($_SESSION["user"]) OR empty($_SESSION["group"])){
header("location:login.php");
} else {
  

// sertakan file koneksi.php
include "koneksi.php";

// perintah query
$query="select * from harga_jual";
//$perintah=mysql_query($query);
$perintah=mysqli_query($koneksi,$query);

// perintah query
$pilquery="select * from harga";
$pilperintah=mysqli_query($koneksi,$pilquery);

$title = "Harga Pulsa";
include "header.php";
include "navbar.php";
include "side.php";
?>


<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Daftar Harga Jual Pulsa    
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
      <h3 class="box-title">Tambah Harga Jual Pulsa</h3>
      <div class="box-tools pull-right">
        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
      </div>
    </div>
    <div class="box-body">
      <form action="proses_tambah_harga_jual.php" method="POST" accept-charset="utf-8">
      	<div class="row">
            <div class="col-xs-3">
              <input type="hidden" name="id_user" value="<?php echo $_SESSION["id_user"]; ?>" class="form-control" placeholder="Nama Produk">
              <!-- <input type="text" name="nama_produk" class="form-control" placeholder="Nama Produk"> -->
            </div>
            <div class="col-xs-2">
              <!-- <input type="text" name="kode_produk" class="form-control" placeholder="Kode Produk"> -->
              <select name="kode_produk" class="form-control">
                <option value="">Pilih Kode Produk</option>
                <?php while ($pildata=mysqli_fetch_array($pilperintah)) {?>
                    <option value="<?php echo $pildata['kode_produk']; ?>"><?php echo $pildata['kode_produk']; ?></option>
                <?php }?>
              </select>
            </div>
            <div class="col-xs-3">
              <input type="text" name="harga_jual" class="form-control" placeholder="Harga">
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
      <h3 class="box-title">Harga Jual Pulsa Agen</h3>
      <div class="box-tools pull-right">
        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
      </div>
    </div>
    <div class="box-body">
      <table class="table table-striped">
        <tr>
          <th>#</th>
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
          <td><?php echo $data["kode_produk"]; ?></td>
          <td><?php echo $data["harga_jual"]; ?></td>
          <td>
          <a href="harga_jual.php?id_hj=<?php echo $data["id_hj"]; ?>"><i class="fa fa-pencil-square"></i> Edit</a> | 
	      <a href="hapus_harga.php?id_hj=<?php echo $data["id_hj"]; ?>" onclick='return confirm_hapus()'><i class="fa fa-trash-o"></i> Hapus</a></td>
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
  	$id_harga=$_GET["id_hj"];
  	if ($id_harga==NULL) {
  		// echo "Kosong";
  		Null;
  	}else{
  		$id_hj=$_GET["id_hj"];
  		$queryuharga="select * from harga_jual where id_hj='$id_hj'";
		//$perintah=mysql_query($query);
		$perintahuharga=mysqli_query($koneksi,$queryuharga);
		$datauhrg=mysqli_fetch_array($perintahuharga);
  	?>
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Update Harga Jual Pulsa</h3>
      <div class="box-tools pull-right">
        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
      </div>
    </div>
    <div class="box-body">
      <form action="proses_edit_harga_jual.php" method="POST" accept-charset="utf-8">
      	<div class="row">
            <div class="col-xs-3">
              <input type="hidden" name="id_user" value="<?php echo $datauhrg["id_user"]; //$_SESSION["id_user"]; ?>" class="form-control" placeholder="Nama Produk">
              <input type="hidden" name="id_hj" value="<?php echo $datauhrg["id_hj"]; ?>">
            </div>
            <div class="col-xs-2">
              <input type="text" name="kode_produk" value="<?php echo $datauhrg["kode_produk"]; ?>" class="form-control" placeholder="Kode Produk">
            </div>
            <div class="col-xs-3">
              <input type="text" name="harga_jual" value="<?php echo $datauhrg["harga_jual"]; ?>" class="form-control" placeholder="Harga">
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