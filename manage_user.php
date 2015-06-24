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
$query="select * from user";
//$perintah=mysql_query($query);
$perintah=mysqli_query($koneksi,$query);
$title = "Daftar Member";
include "header.php";
include "navbar.php";
include "side.php";
?>


<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Daftar Member    
  </h1>
</section>

<!-- Main content -->
<section class="content">
 <!--  <div class="callout callout-info">
    <h4>Harga Pulsa</h4>
    <p>Add the fixed class to the body tag to get this layout. The fixed layout is your best option if your sidebar is bigger than your content because it prevents extra unwanted scrolling.</p>
  </div> -->
  <!-- Default box -->
  <!-- <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Tambah Member</h3>
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
  </div> --><!-- /.box -->

  <?php 
  	$id_harga=$_GET["id_user"];
  	if ($id_harga==NULL) {
  		// echo "Kosong";
  		Null;
  	}else{
  		$id_user=$_GET["id_user"];
  		$queryuharga="select * from user where id_user='$id_user'";
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
      <form action="edit_mu.php" method="POST" accept-charset="utf-8">
      	<div class="row">
            <div class="col-xs-2">
            		<input type="hidden" name="id_user" value="<?php echo $datauhrg["id_user"]; ?>">
	              	<!-- <input type="hidden" name="status_user" value="0"> -->
		            <input type="text" name="nama" value="<?php echo $datauhrg["nama"]; ?>" class="form-control" placeholder="Nama Lengkap" maxlength="16" />
            		<!-- <input type="text" name="kode_agen" class="form-control" placeholder="Kode Agen..." maxlength="16" /> -->
					<!-- <input type="password" name="pass" class="form-control" placeholder="Password"/>	 -->
              <!-- <input type="text" name="nama_produk" value="<?php //echo $datauhrg["nama_produk"]; ?>" class="form-control" placeholder="Nama Produk"> -->
              <!-- <input type="hidden" name="id_harga" value="<?php //echo $datauhrg["id_harga"]; ?>"> -->
            </div>
            <div class="col-xs-2">
              <input type="text" name="pin" value="<?php echo $datauhrg["pin"]; ?>" class="form-control" placeholder="Pin Transaksi" maxlength="16" />
            </div>
            <div class="col-xs-2">
              <input type="text" name="user" value="<?php echo $datauhrg["user"]; ?>" class="form-control" placeholder="Username"/>
            </div>
            <div class="col-xs-2">
            	<select name="status_user" class="form-control">
                <?php 
                	if($datauhrg["status_user"]=='1'){
		        	 	$stat = "Aktif";
		        	 }else{
		        	 	$stat = "Non Aktif";
		        	 }
                 ?>
                <option value="<?php echo $datauhrg["status_user"]; ?>"><?php echo $stat; ?></option>
                <option value="<?php echo ($datauhrg["status_user"]=='1') ? "0" : "1" ?>"><?php echo ($datauhrg["status_user"]=='1') ? "Tidak Aktif" : "Aktif" ?></option>
              </select>
            </div>
            <div class="col-xs-2 text-center">
              <button type="submit" value='Koreksi' class="btn btn-info btn-flat" >Update</button>
            </div>
        </div>
      </form>
    </div>
  </div><!-- /.box -->
  <?php
  	}
   ?>

  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">List Daftar Member</h3>
      <div class="box-tools pull-right">
        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
      </div>
    </div>
    <div class="box-body">
      <table class="table table-striped">
        <tr>
          <th>#</th>
          <th>Nama</th>
          <th>Kode Agen</th>
          <th>PIN</th>
          <th>Username</th>
          <th>Group</th>
          <th>Status User</th>
          <th>Action</th>
        </tr>
        <?php 
        	$i=0;

        	while ($data=mysqli_fetch_array($perintah)){
        	 $i++;

        	 if($data["status_user"]=='1'){
        	 	$stat = "Aktif";
        	 }else{
        	 	$stat = "Non Aktif";
        	 }
         ?>
        <tr>
          <td><?php echo $i; ?></td>
          <td><?php echo $data["nama"]; ?></td>
          <td><?php echo $data["kode_agen"]; ?></td>
          <td><?php echo $data["pin"]; ?></td>
          <td><?php echo $data["user"]; ?></td>          
          <td><?php echo $data["group"]; ?></td>
          <td><?php echo $stat; ?></td>
          <td>
          <a href="manage_user.php?id_user=<?php echo $data["id_user"]; ?>"><i class="fa fa-pencil-square"></i> Edit</a> | 
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