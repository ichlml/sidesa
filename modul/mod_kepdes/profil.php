<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/mod_kepsek/aksi_profil.php";

?>
    		<div class="page-content">


			<!-- Page header -->
			<div class="page-header">
				<div class="page-title">
					<h3>Sistem Informasi Aset Daerah <small>Membantu Dalam Melakukan Manajement aset Daerah</small></h3>
				</div>

			</div>
			<!-- /page header -->


			<!-- Breadcrumbs line -->
			<div class="breadcrumb-line">
				<ul class="breadcrumb">
					<li><a href="?module=home">Home</a></li>
					<li><a href="#">Input</a></li>
					<li><a href="?module=user">Setup Kepala Sekolah per unit</a></li>
					<li><a href="?module=user&edituser">Form Kepala Sekolah Per Unit</a></li>
				</ul>

				<div class="visible-xs breadcrumb-toggle">
					<a class="btn btn-link btn-lg btn-icon" data-toggle="collapse" data-target=".breadcrumb-buttons"><i class="icon-menu2"></i></a>
				</div>

			</div>
			<!-- /breadcrumbs line -->

<?php
if ($_GET['code'] == 3){
?>
			<div class="alert alert-success fade in block-inner">
				<button type="button" class="close" data-dismiss="alert">×</button>
				Data berhasil diupdate  .... 
			</div>
<?php } ?>

			<h6 class="heading-hr"><i class="icon-checkmark-circle"></i> Form Kepala Sekolah Per Unit</h6>

<?php
	if ($_SESSION['level']=='admin'){ 
	// level admin
?>
	<div class="row">
		<div class="col-sm-6 col-sm-offset-3">
		<label for="skpd" class="req">Pilih Subdinas</label>
		<select class="select-full" id="skpd" tabindex="2" onChange="BukaDetail()" data-placeholder="Pilih Subdinas...">
		<option value="" selected disabled> -- Pilih UPB -- </option>
		 <?php 
			 if ($_SESSION['level']=='admin' OR $_SESSION[upt]){ 
					$somevariabelsubdinas = ($_SESSION['level']=='admin') ? null : "WHERE kd_sub = '$_SESSION[kdsub]'" ;
					$somevariabelquery = "SELECT * FROM subdinas ".$somevariabelsubdinas." ORDER BY nama_subdinas ";
					$tampil = mysql_query($somevariabelquery);
					while($r=mysql_fetch_array($tampil)){
					  echo "<option value='$r[username]'>$r[nama_subdinas]</option>";
					}
			 }
		?>
		</select>
		</div>
	</div>
	<br />
	<br />
<?php 
		$form_action	= "$aksi?module=profil&act=update";
		$user_id		= null;
		$user_nama		= null;
		$user_kepsek	= null;
		$user_nip		= null;
		$user_alamat	= null;
		$user_telepon	= null;

	} else { 
	// level subdinas
	    $edit=mysql_query("SELECT * FROM subdinas WHERE username='$_SESSION[namauser]'");
		$r=mysql_fetch_array($edit);
		
		$form_action	= "$aksi?module=profil&act=update";
		$user_id		= $_SESSION['namauser'];
		$user_nama		= $r['nama_subdinas'];
		$user_kepsek	= $r['nama_kepala'];
		$user_nip		= $r['nip'];
		$user_alamat	= $r['alamat_subdinas'];
		$user_telepon	= $r['telepon'];
	}
?>
		    <!-- Form validation -->
            <form class="form-horizontal validate" method="post" action="<?php echo $form_action; ?>" role="form">
				<div class="block">

					<input type="hidden" name="id" value="<?php echo"$user_id"; ?>" />
					<div class="form-group">
						<div class="col-sm-6">
								<label for="subdinas" class="req">Nama Subdinas</label>
								<input type="text" name="subdinas" id="subdinas" class="form-control" value="<?php echo $user_nama; ?>" readonly >
						</div>
						<div class="col-sm-6">
								<label for="username" class="req">Username</label>
								<input type="text" name="username" id="username" class="form-control" value="<?php echo $user_id; ?>" readonly >
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-6">
								<label for="nama" class="req">Nama Kepala Sekolah</label>
								<input type="text" name="nama" id="nama" class="form-control" value="<?php echo $user_kepsek; ?>" >
						</div>
						<div class="col-sm-6">
								<label for="nip" class="req">NIP</label>
								<input type="text" name="nip" id="nip" class="form-control" value="<?php echo $user_nip; ?>" >
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-6">
								<label for="alamat" class="req">Alamat Sekolah</label>
								<input type="text" name="alamat" id="alamat" class="form-control" value="<?php echo $user_alamat; ?>" >
						</div>
						<div class="col-sm-6">
								<label for="telepon" class="req">Telepon</label>
								<input type="text" name="telepon" id="telepon" class="form-control" value="<?php echo $user_telepon; ?>" >
						</div>
					</div>
				</div>
                    <div class="form-actions text-right">
                    	<input type="submit" value="Update" class="btn btn-primary">
                    </div>
            </form>
		</div>
<?php
	$tampil = mysql_query($somevariabelquery);
	echo "<script>";
	while($r=mysql_fetch_array($tampil)){
	  echo "window['$r[username]_nama']='$r[nama_subdinas]';";
	  echo "window['$r[username]_kepsek']='$r[nama_kepala]';";
	  echo "window['$r[username]_nip']='$r[nip]';";
	  echo "window['$r[username]_alamat']='$r[alamat_subdinas]';";
	  echo "window['$r[username]_telepon']='$r[telepon]';";
	}
	echo "</script>";
?>
	<script>
		function BukaDetail(){
			var a = document.getElementById('skpd').value;
			document.getElementById('username').value = a;
			document.getElementById('subdinas').value = window[a+'_nama'];
			document.getElementById('nama').value = window[a+'_kepsek'];
			document.getElementById('nip').value = window[a+'_nip'];
			document.getElementById('alamat').value = window[a+'_alamat'];
			document.getElementById('telepon').value = window[a+'_telepon'];
		};
	</script>

<?php
}
?>
