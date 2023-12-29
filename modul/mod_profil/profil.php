<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/mod_profil/aksi_profil.php";

switch($_GET[act]){
  // Tampil Tag
  default:
	if ($_SESSION['level']=='admin'){ 
// level admin
    $edit=mysql_query("SELECT * FROM users WHERE username='$_SESSION[namauser]'");
    $r=mysql_fetch_array($edit);

?>
		<div class="page-content">


			<!-- Page header -->
			<div class="page-header">
				<div class="page-title">
					<h3>Sistem Informasi Aset Pengelolaan Aset Desa <small>Membantu Dalam Melakukan Pendataan aset Desa</small></h3>
				</div>

			</div>
			<!-- /page header -->


			<!-- Breadcrumbs line -->
			<div class="breadcrumb-line">
				<ul class="breadcrumb">
					<li><a href="?module=home">Home</a></li>
					<li><a href="#">Master</a></li>
					<li><a href="?module=profil">Setup profil</a></li>
					<li><a href="?module=profil&tambahprofil">Update profil</a></li>
				</ul>

				<div class="visible-xs breadcrumb-toggle">
					<a class="btn btn-link btn-lg btn-icon" data-toggle="collapse" data-target=".breadcrumb-buttons"><i class="icon-menu2"></i></a>
				</div>

			</div>
			<!-- /breadcrumbs line -->


		    <!-- Form validation -->
            <form class="form-horizontal validate" method="post" action="<?php echo"$aksi?module=profil&act=update"; ?>" role="form">
	            <div class="block">
	                <h6 class="heading-hr"><i class="icon-checkmark-circle"></i> Form Update profil</h6>

<?php echo"        <input type=hidden name=id value='$r[id_session]'>"; ?>
<?php echo"        <input type=hidden name=id value='$r[blokir]'>"; ?>

					<div class="form-group">
						<div class="col-sm-6">
													<label for="kode_profil" class="req">Username</label>
													<input type="text" name="username" id="username" class="form-control" value="<?php echo"$r[username]"; ?>" readonly data-parsley-required="true">
                                                    <span class="help-block">Data Username tidak Bisa di update</span>
			                    	
			                    </div>
					  <div class="col-sm-6">
						<label>Password :</label>
		                    	  <input type="text" class="form-control" name="password" id="password" value="">
<span class="help-block">Jika tidak di rubah silahkan di kosongi saja</span>

		                      </div>
								
								
								

					</div>
					
                    <div class="form-group">
						<div class="col-sm-6">
						<label>Nama Lengkap :</label>
		                    	  <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" value="<?php echo"$r[nama_lengkap]"; ?>">
			                    	
			                    </div>
					  <div class="col-sm-6">
						<label>Telepon :</label>
		                    	  <input type="text" class="form-control" name="no_telp" id="no_telp" value="<?php echo"$r[no_telp]"; ?>">
			                    	
		                      </div>
								
								
								

					</div>
                    <div class="form-group">
						<div class="col-sm-6">
						<label>Email :</label>
		                    	  <input type="text" class="form-control" name="email" id="nama_profil" value="<?php echo"$r[email]"; ?>">
			                    	
			                    </div>
						<div class="col-sm-6">
						<label>Penutupan :</label>
<select name="tutup" class="form-control">
<option value=""> -- Pilih -- </option>
<option value="B" <?php if ($r['tutup'] == 'B') { echo" selected='selected'"; } ?>>Buka Penginputan</option>
<option value="T" <?php if ($r['tutup'] == 'T') { echo" selected='selected'"; } ?>>Tutup Penginputan</option>
</select>

			                    	
			                    </div>
								
								
								

					</div>
                    
                    <div class="form-actions text-right">
                    	<input type="submit" value="Update" class="btn btn-primary">
                    </div>
                    
                </div>
            </form>
			<?php
     break;

   
	} else { 
	
// level subdinas
	    $edit=mysql_query("SELECT * FROM subdinas WHERE username='$_SESSION[namauser]'");
    $r=mysql_fetch_array($edit);
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
					<li><a href="#">Master</a></li>
					<li><a href="?module=user">Setup Administator per unit</a></li>
					<li><a href="?module=user&edituser">Form Administator Per Unit</a></li>
				</ul>

				<div class="visible-xs breadcrumb-toggle">
					<a class="btn btn-link btn-lg btn-icon" data-toggle="collapse" data-target=".breadcrumb-buttons"><i class="icon-menu2"></i></a>
				</div>

			</div>
			<!-- /breadcrumbs line -->


		    <!-- Form validation -->
            <form class="form-horizontal validate" method="post" action="<?php echo"$aksi?module=user&act=update"; ?>" role="form">
	               <div class="block">
	                <h6 class="heading-hr"><i class="icon-checkmark-circle"></i> Form Administator Per Unit</h6>
<input type="hidden" name="id" value="<?php echo"$_GET[id]"; ?>" />

					<div class="form-group">
						<div class="col-sm-6">
													<label for="kode_subdinas" class="req">Subdinas</label>
													<input type="text" name="subdinas" id="subdinas" class="form-control" value="<?php echo"$r[nama_subdinas]"; ?>" disabled >
			                    	
			                    </div>
                                <div class="col-sm-6">
													<label for="kode_subdinas" class="req">Username</label>
													<input type="text" name="subdinas" id="subdinas" class="form-control" value="<?php echo"$r[username]"; ?>" disabled >
			                    	
			                    </div>
								
								

					</div>
					<div class="form-group">
						<div class="col-sm-6">
													<label for="kode_subdinas" class="req">Nama Admin</label>
													<input type="text" name="nama" id="nama" class="form-control" value="<?php echo"$r[nama_admin]"; ?>" >
			                    	
			                    </div>
					  <div class="col-sm-6">
			                    		<label for="kode_subdinas" class="req">Password</label>
													<input type="text" name="password" id="password" class="form-control"  >
		                      </div>
								
								
								

					</div>
                    
                    	<div class="form-group">
					 <div class="col-sm-6">
<label> HP :</label>
													<input type="text" name="hp" id="hp" class="form-control" value="<?php echo"$r[hp]"; ?>" >
		                      </div>	
					 <div class="col-sm-6">
		<label> Kepala Desa :</label>
													<input type="text" name="kades" id="kades" class="form-control" value="<?php echo"$r[kades]"; ?>" >
		                      </div>	
								
								
								

					</div>
                    
                    	                                        
					<div class="form-group">
						<div class="col-sm-6">
			                    </div>
             </div>
                    
                    <div class="form-actions text-right">
                    	<input type="submit" value="Update" class="btn btn-primary">
                    </div>
                    
                </div>
            </form>
            
    
    
    <?php
	}
}
}
?>
