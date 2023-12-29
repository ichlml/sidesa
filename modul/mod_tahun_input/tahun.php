<?php
session_start();

if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
if ($_SESSION['level']=='admin'){
// cek tabel exist
$tbl_query = mysql_query("SHOW TABLES LIKE 'tahun_input' ");
//if not exist, create table
if ( mysql_num_rows($tbl_query) == 0 ) {
	$tbl_query = mysql_query("CREATE TABLE IF NOT EXISTS tahun_input ( 
		id_tahun INT(255) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY, 
		tahun INT(4),
		status enum('1', '0')
	) ");
}

if (isset($_POST['tahun']) OR $_GET['act'] == 'ubah'){
	switch($_GET['act']){
		case 'tambah' :
			mysql_query("INSERT INTO tahun_input (tahun, status) VALUES ('$_POST[tahun]', '1') ");
		break;
		
		case 'ubah' :
			mysql_query("UPDATE tahun_input SET status = '0' WHERE id_tahun IN ('".implode("', '", $_SESSION['DATA_TAHUN_INPUT'])."') ");
			if (isset($_POST['tahun'])){
				mysql_query("UPDATE tahun_input SET status = '1' WHERE id_tahun IN ('".implode("', '", $_POST['tahun'])."') ");
			}
			unset($_SESSION['DATA_TAHUN_INPUT']) ;
		break;
	}
	echo "<script>window.location = '?module=tahun'</script>";
}

if ($_GET['act'] == 'hapus'){
	mysql_query("DELETE FROM tahun_input WHERE id_tahun $_GET[id] ");
	echo "<script>window.location = '?module=tahun'</script>";
}

switch($_GET['act']){
  // Tampil Tag
  default:
?>
		<!-- Page content -->
		<div class="page-content">

			<!-- Page header -->
			<div class="page-header">
				<div class="page-title">
					<h3>Sistem Informasi Aset Desa <small>Membantu Dalam Melakukan Manajement aset Desa</small></h3>
				</div>

			</div>
			<!-- /page header -->


			<!-- Breadcrumbs line -->
			<div class="breadcrumb-line">
				<ul class="breadcrumb">
					<li><a href="?module=home">Home</a></li>
					<li><a href="#">Master</a></li>
					<li><a href="?module=tahun">Setup Tahun Input</a></li>
				</ul>

				<div class="visible-xs breadcrumb-toggle">
					<a class="btn btn-link btn-lg btn-icon" data-toggle="collapse" data-target=".breadcrumb-buttons"><i class="icon-menu2"></i></a>
				</div>

			</div>
			<!-- /breadcrumbs line -->


	        <!-- Page tabs -->
            <div class="tabbable page-tabs">
                <ul class="nav nav-tabs">
	                <li class="active"><a href="#inside" data-toggle="tab"><i class="icon-checkbox-partial"></i> Tabel Data</a></li>
                    <li><a href="?module=tahun&act=tambah"><i class="icon-plus"></i> Tambah Tahun Input</a></li>
                </ul>
                <div class="tab-content">

				<!-- First tab content -->
                	<div class="tab-pane active fade in" id="inside">

				    	<!-- Default datatable inside panel -->
			           <!-- Datatable with custom column filtering -->
			            <div class="panel panel-default">
			                <div class="panel-heading"><h6 class="panel-title"><i class="icon-table"></i> Data Tahun Input</h6></div>
			                <div class="datatable-add-row">
<form method="POST" action="?module=tahun&act=ubah">
				                <table class="table">
				                    <thead>
				                        <tr>
				                            <th>Tahun Input</th>
				                            <th>Perbolehkan? <br/> <input id="cek_semua" type="checkbox"></input></th>
				                            <th>Hapus</th>
				                        </tr>
				                    </thead>

									<tfoot> 
										<tr>
											<td></td>
											<td>
												<div class="form-actions text-center">
													<input type="submit" value="Simpan Perubahan" class="btn btn-primary">
												</div>
											</td>
											<td></td>
										</tr>
									</tfoot>

				                    <tbody>
<?php
$tampil = mysql_query("SELECT * FROM tahun_input ORDER BY tahun DESC");
$daftar_idtahun = null;
while ($r=mysql_fetch_array($tampil)){
	$daftar_idtahun[] = $r['id_tahun'] ;
	$cek = ($r['status']) ? "checked" : null ;
?>
				                        <tr>
				                            <td><?php echo"$r[tahun]"; ?></td>
											<td><input name="tahun[]" type="checkbox" class="pilih_tahun" value="<?php echo "$r[id_tahun]"; ?>" <?php echo $cek;?>></input></td>
											<td><a href="<?php echo "?module=tahun&act=hapus&id=$r[id_tahun]"; ?>"> <span class="icon-remove4"></span> </a></td>
				                        </tr>
<?php 
	}
$_SESSION['DATA_TAHUN_INPUT'] = $daftar_idtahun ;
?>
				                    </tbody>
				                </table>
</form>
			                </div>
				        </div>
				        <!-- /datatable with custom column filtering -->

                	</div>
                	<!-- /first tab content -->
                	

            	</div>
			</div>
        	<!-- /page tabs -->
<?php
    break;
  
  // Form Tambah Tag
  case "tambah":
?>
		<div class="page-content">

			<!-- Page header -->
			<div class="page-header">
				<div class="page-title">
					<h3>Sistem Informasi Aset Desa <small>Membantu Dalam Melakukan Manajement aset Desa</small></h3>
				</div>

			</div>
			<!-- /page header -->


			<!-- Breadcrumbs line -->
			<div class="breadcrumb-line">
				<ul class="breadcrumb">
					<li><a href="?module=home">Home</a></li>
					<li><a href="#">Master</a></li>
					<li><a href="?module=tahun">Setup Bidang</a></li>
					<li><a href="?module=tahun&act=tambah">Tambah Bidang</a></li>
				</ul>

				<div class="visible-xs breadcrumb-toggle">
					<a class="btn btn-link btn-lg btn-icon" data-toggle="collapse" data-target=".breadcrumb-buttons"><i class="icon-menu2"></i></a>
				</div>

			</div>
			<!-- /breadcrumbs line -->

		    <!-- Form validation -->
            <form class="form-horizontal validate" method="post" action="<?php echo"?module=tahun&act=tambah";?>" role="form">
	            <div class="block">
	                <h6 class="heading-hr"><i class="icon-checkmark-circle"></i> Form Tambah Tahun Input</h6>

					<div class="form-group">
						<div class="col-sm-6 col-sm-offset-3">
							<label> Tahun :</label>
							<select name="tahun" id="input" class="select-full">
								<option value="" selected disabled > -- pilih tahun input -- </option>
								<option value="<?php print date('Y', strtotime(date('Y')." + 5 year")); ?>"><?php print date('Y', strtotime(date('Y')." + 5 year")); ?></option>
								<option value="<?php print date('Y', strtotime(date('Y')." + 4 year")); ?>"><?php print date('Y', strtotime(date('Y')." + 4 year")); ?></option>
								<option value="<?php print date('Y', strtotime(date('Y')." + 3 year")); ?>"><?php print date('Y', strtotime(date('Y')." + 3 year")); ?></option>
								<option value="<?php print date('Y', strtotime(date('Y')." + 2 year")); ?>"><?php print date('Y', strtotime(date('Y')." + 2 year")); ?></option>
								<option value="<?php print date('Y', strtotime(date('Y')." + 1 year")); ?>"><?php print date('Y', strtotime(date('Y')." + 1 year")); ?></option>
								<option value="<?php print date('Y'); ?>"><?php print date('Y'); ?></option>
								<option value="<?php print date('Y', strtotime(date('Y')." - 1 year")); ?>"><?php print date('Y', strtotime(date('Y')." - 1 year")); ?></option>
								<option value="<?php print date('Y', strtotime(date('Y')." - 2 year")); ?>"><?php print date('Y', strtotime(date('Y')." - 2 year")); ?></option>
								<option value="<?php print date('Y', strtotime(date('Y')." - 3 year")); ?>"><?php print date('Y', strtotime(date('Y')." - 3 year")); ?></option>
								<option value="<?php print date('Y', strtotime(date('Y')." - 4 year")); ?>"><?php print date('Y', strtotime(date('Y')." - 4 year")); ?></option>
								<option value="<?php print date('Y', strtotime(date('Y')." - 5 year")); ?>"><?php print date('Y', strtotime(date('Y')." - 5 year")); ?></option>
								<option value="<?php print date('Y', strtotime(date('Y')." - 6 year")); ?>"><?php print date('Y', strtotime(date('Y')." - 6 year")); ?></option>
								<option value="<?php print date('Y', strtotime(date('Y')." - 7 year")); ?>"><?php print date('Y', strtotime(date('Y')." - 7 year")); ?></option>
								<option value="<?php print date('Y', strtotime(date('Y')." - 8 year")); ?>"><?php print date('Y', strtotime(date('Y')." - 8 year")); ?></option>
								<option value="<?php print date('Y', strtotime(date('Y')." - 9 year")); ?>"><?php print date('Y', strtotime(date('Y')." - 9 year")); ?></option>
								<option value="<?php print date('Y', strtotime(date('Y')." - 10 year")); ?>"><?php print date('Y', strtotime(date('Y')." - 10 year")); ?></option>
							</select>
						</div>
					</div>
                    <div class="form-actions text-right">
                    	<input type="submit" value="Submit form" class="btn btn-primary">
                    </div>
                </div>
            </form>
			
			<?php
     break;
}
?>
<style>
	th, td {text-align: center}
</style>
<script>
	document.getElementById('cek_semua').onchange = function () {
		var cekvalue = this.checked;

		var targetboxes = document.getElementsByClassName('pilih_tahun');
		for(var index in targetboxes){
			//cek-uncek each checkbox
			targetboxes[index].checked = cekvalue;
		}
	}
</script>

<?php
}
}
?>
