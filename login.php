<?php 
	$title = "Halaman login";
	include "header.php";

	// sertakan file koneksi.php
include "koneksi.php";

// perintah query
$query="select * from harga";
//$perintah=mysql_query($query);
$perintah=mysqli_query($koneksi,$query);
 ?>
<body class="login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="index.php"><b>Pulsa</b>Online</a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <div class="nav-tabs-custom">
	        <ul class="nav nav-tabs pull-right">
	        <li ><a href="#tab_3-3" data-toggle="tab">Registrasi</a></li>
	          <li class="active"><a href="#tab_1-1" data-toggle="tab">Login</a></li>
	          <li><a href="#tab_2-2" data-toggle="tab">Harga Pulsa</a></li>
	          <!-- <li class="pull-left header"> <p class="login-box-msg">Sign in</p></li> -->
	        </ul>
	        <div class="tab-content">
	          <div class="tab-pane active" id="tab_1-1">
	            <form action="proses.php" method="post">
		          <div class="form-group has-feedback">
		            <input type="text" name="user" class="form-control" placeholder="Username"/>
		            <span class="glyphicon glyphicon-pushpin form-control-feedback"></span>
		          </div>
		          <div class="form-group has-feedback">
		            <input type="password" name="pass" class="form-control" placeholder="Password"/>
		            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
		          </div>
		          <div class="row">
		            <div class="col-xs-4">
		              <button type="submit" value="Login" class="btn btn-primary btn-block btn-flat">Sign In</button>
		            </div><!-- /.col -->
		          </div>
		        </form>
	          </div><!-- /.tab-pane -->
	          <div class="tab-pane" id="tab_3-3">
	            <form action="registrasi.php" method="post">
	              <div class="form-group has-feedback">
	              	<input type="hidden" name="group" value="Downline">
	              	<input type="hidden" name="status_user" value="0">
		            <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" maxlength="16" />
		            <span class="glyphicon glyphicon-user form-control-feedback"></span>
		          </div>
		          <div class="form-group has-feedback">
		            <input type="text" name="kode_agen" class="form-control" placeholder="Kode Agen..." maxlength="16" />
		            <span class="glyphicon glyphicon-asterisk form-control-feedback"></span>
		          </div>
		          <div class="form-group has-feedback">
		            <input type="text" name="pin" class="form-control" placeholder="Pin Transaksi" maxlength="16" />
		            <span class="glyphicon glyphicon-record form-control-feedback"></span>
		          </div>
		          <div class="form-group has-feedback">
		            <input type="text" name="user" class="form-control" placeholder="Username"/>
		            <span class="glyphicon glyphicon-pushpin form-control-feedback"></span>
		          </div>
		          <div class="form-group has-feedback">
		            <input type="password" name="pass" class="form-control" placeholder="Password"/>
		            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
		          </div>
		          <div class="row">
		            <div class="col-xs-4">
		              <button type="submit" value="Login" class="btn btn-primary btn-block btn-flat">Sign In</button>
		            </div><!-- /.col -->
		          </div>
		        </form>
	          </div><!-- /.tab-pane -->
	          <div class="tab-pane" id="tab_2-2">
	            <div class="box">
	                <div class="box-header">
	                  <h3 class="box-title">Update Harga Pulsa</h3>
	                </div><!-- /.box-header -->
	                <div class="box-body no-padding">
	                  <table class="table table-striped">
	                    <tr>
	                      <th style="width: 10px">#</th>
	                      <th>Nama Produk</th>
	                      <th>Kode Produk</th>
	                      <th style="width: 40px">Harga</th>
	                    </tr>
	                    <?php 
	                    	while ($data=mysqli_fetch_array($perintah)){
	                     ?>
	                    <tr>
	                      <td><?php echo $data["id_harga"]; ?></td>
	                      <td><?php echo $data["nama_produk"]; ?></td>
	                      <td><?php echo $data["kode_produk"]; ?></td>
	                      <td><?php echo $data["harga"]; ?></td>
	                    </tr>
	                    <?php 
	                    	}
	                     ?>
	                  </table>
	                </div><!-- /.box-body -->
	              </div><!-- /.box -->
	          </div><!-- /.tab-pane -->
	        </div><!-- /.tab-content -->
	      </div><!-- nav-tabs-custom -->
        
      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

	<script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>

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
// $title = "Home Transaksi";
include "footer.php";
?> 
