<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/mod_dinas/aksi_dinas.php";
	$x="SELECT max(kode_dinas) as maxidadmin FROM dinas WHERE kode_dinas LIKE 'DINAS%'";
	$selectidmax=mysql_query($x) or die ("Eror Query".mysql_error()); 

    $hslidmax=mysql_fetch_array($selectidmax);

    $idmax=$hslidmax['maxidadmin'];


    $nourut = (int) substr($idmax, 5,4);

    $nourut++;


    $IDbaru = "DINAS" . sprintf("%04s", "$nourut");  

switch($_GET[act]){
  // Tampil Tag
  default:
?>

		<!-- Page content -->
		<style type="text/css">
		.baru {
	color: #000;
}
        </style>
		
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
					<li><a href="?module=dinas">Setup Dinas</a></li>
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
                    <li><a href="#outside" data-toggle="tab"><i class="icon-upload5"></i> Upload / Import Document</a></li>
                    <li><a href="?module=dinas&act=tambahdinas"><i class="icon-plus"></i> Tambah Data</a></li>
                </ul>
                <div class="tab-content">
<?php
if ($_GET['code'] == 2){
?>
<div class="alert alert-success fade in block-inner">
                    		<button type="button" class="close" data-dismiss="alert">×</button>
                    		Data berhasil dihapus  .... 
                    	</div><?php } ?>
<?php
if ($_GET['code'] == 3){
?>
<div class="alert alert-success fade in block-inner">
                    		<button type="button" class="close" data-dismiss="alert">×</button>
                    		Data berhasil diupdate  .... 
                    	</div><?php } ?>
<?php
if ($_GET['code'] == 4){
?>
<div class="alert alert-success fade in block-inner">
                    		<button type="button" class="close" data-dismiss="alert">×</button>

                    		Data berhasil diimport  .... 
                    	</div><?php } ?>

                	<!-- First tab content -->
                	<div class="tab-pane active fade in" id="inside">

				    	<!-- Default datatable inside panel -->
			           <!-- Datatable with custom column filtering -->
			            <div class="panel panel-default">
			                <div class="panel-heading"><h6 class="panel-title"><i class="icon-table"></i> Data Dinas</h6></div>
			                <div class="datatable-add-row">
				                <table class="table">
				                    <thead>
				                        <tr>
				                            <th width="5%">No</th>
				                            <th>Kode Dinas</th>
				                            <th>Nama Dinas</th>
				                            <th width="15%">Action</th>
				                        </tr>
				                    </thead>

									<tfoot>
										<tr>
											<th>no</th>
											<th>Kode Dinas</th>
											<th>Nama Dinas</th>
											<th>&nbsp;</th>
										</tr>
									</tfoot>

				                    <tbody>
                                    <?php
                                              $tampil = mysql_query("SELECT * FROM dinas ORDER BY kode_dinas DESC");
  $no=1;
    while ($r=mysql_fetch_array($tampil)){
?>
				                        <tr>
				                            <td><?php echo"$no"; ?></td>
				                            <td><?php echo"$r[kode_dinas]"; ?></td>
				                            <td><?php echo"$r[nama_dinas]"; ?></td>
				                            <td><center><?php echo"<a href=?module=dinas&act=editdinas&id=$r[kode_dinas]>"; ?><span class="icon-quill2"></span> </a> &nbsp; <?php echo"<a href=$aksi?module=dinas&act=hapus&id=$r[kode_dinas]"; ?> <span class="icon-remove4"></span> </a></center></td>
				                        </tr>
                                        <?php $no++; } ?>
    
				                    </tbody>
				                </table>
			                </div>
				        </div>
				        <!-- /datatable with custom column filtering -->


				    

                	</div>
                	<!-- /first tab content -->


                	<!-- Second tab content -->
                	<div class="tab-pane fade" id="outside">
	<div class="block">	
				<h6><i class="icon-upload3"></i> Upload Data</h6>
                <div class="panel panel-default">
                    <div class="panel-heading"><h6 class="panel-title"><i class="icon-droplet"></i> Dinas</h6></div>
                	<div class="panel-body">
        <form class="form-horizontal" enctype="multipart/form-data"  method="post" action="<?php echo"$aksi?module=dinas&act=upload"; ?>" role="form">
                        <div class="form-group">
							<div class="col-sm-3">
								                                <span class="help-block">Contoh Desain From Import Dinas <a href="modul/mod_dinas/contoh_import_dinas.xls">download</a></span>
 <input name="userfile" type="file"  class="styled">
                                <span class="help-block">Pastikan data yang ada upload .xls (excel 2007)</span>
							</div>
						</div> 
                        <div class="form-actions text-left">
							<button name="upload" type="submit" class="btn btn-primary">Submit</button>
						</div>
                        </form>
					</div>
                        </div></div>
			</div>
				    	<!-- Default datatable -->
			          

                	</div>
                	<!-- /second tab content -->


                	

            	</div>

        	</div>
        	<!-- /page tabs -->
  <?php
    break;
  
  // Form Tambah Tag
  case "tambahdinas":
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
					<li><a href="?module=dinas">Setup Dinas</a></li>
					<li><a href="?module=dinas&tambahdinas">Tambah Dinas</a></li>
				</ul>

				<div class="visible-xs breadcrumb-toggle">
					<a class="btn btn-link btn-lg btn-icon" data-toggle="collapse" data-target=".breadcrumb-buttons"><i class="icon-menu2"></i></a>
				</div>

			</div>
			<!-- /breadcrumbs line -->
<?php
if ($_GET['code'] == 1){
?>
<div class="alert alert-success fade in block-inner">
                    		<button type="button" class="close" data-dismiss="alert">×</button>
                    		Data berhasil di tambahkan ke database  .... <a href="media.php?module=dinas">lihat data dinas</a>
                    	</div><?php } ?>

		    <!-- Form validation -->
            <form class="form-horizontal validate" method="post" action="<?php echo"$aksi?module=dinas&act=input"; ?>" role="form">
	            <div class="block">
	                <h6 class="heading-hr"><i class="icon-checkmark-circle"></i> Form Tambah Dinas</h6>


					<div class="form-group">
						<div class="col-sm-6">
			                    	<label> Kode :</label>
									<input name="kode_dinas" type="text" class="required form-control" id="kode_dinas" value="<?php echo"$IDbaru"; ?>" readonly="readonly">
			                    	
			                    </div>
					  <div class="col-sm-6">
						<label>Nama :</label>
		                    	  <input type="text" class="required form-control" name="nama_dinas" id="nama_dinas">
			                    	
		                      </div>
								
								
								

					</div>
                    
                    <div class="form-actions text-right">
                    	<input type="submit" value="Submit form" class="btn btn-primary">
                    </div>
                    
                </div>
            </form>
            </div></div>
			
			<?php
     break;
  
  // Form Edit Kategori  
  case "editdinas":
    $edit=mysql_query("SELECT * FROM dinas WHERE kode_dinas='$_GET[id]'");
    $r=mysql_fetch_array($edit);

?>
		<div class="page-content">


			<!-- Page header -->
			<div class="page-header">
				<div class="page-title">
					<h3>Sistem Informasi Aset Daerah <small>Modul dinas ini membantu anda dalam memanajement data Dinas</small></h3>
				</div>

			</div>
			<!-- /page header -->


			<!-- Breadcrumbs line -->
			<div class="breadcrumb-line">
				<ul class="breadcrumb">
					<li><a href="?module=home">Home</a></li>
					<li><a href="#">Master</a></li>
					<li><a href="?module=dinas">Setup Dinas</a></li>
					<li><a href="#">Update Dinas</a></li>
				</ul>

				<div class="visible-xs breadcrumb-toggle">
					<a class="btn btn-link btn-lg btn-icon" data-toggle="collapse" data-target=".breadcrumb-buttons"><i class="icon-menu2"></i></a>
				</div>

			</div>
			<!-- /breadcrumbs line -->


		    <!-- Form validation -->
            <form class="form-horizontal validate" method="post" action="<?php echo"$aksi?module=dinas&act=update"; ?>" role="form">
	            <div class="block">
	                <h6 class="heading-hr"><i class="icon-checkmark-circle"></i> Form Update Dinas</h6>


					<div class="form-group">
						<div class="col-sm-6">
													<label for="kode_dinas" class="req">Kode Dinas</label>
													<input type="text" name="id" id="id" class="form-control" value="<?php echo"$r[kode_dinas]"; ?>" readonly="readonly" data-parsley-required="true">
			                    	
			                    </div>
					  <div class="col-sm-6">
						<label>Nama :</label>
		                    	  <input type="text" class="required form-control" name="nama_dinas" id="nama_dinas" value="<?php echo"$r[nama_dinas]"; ?>">
			                    	
		                      </div>
								
								
								

					</div>
                    
                    <div class="form-actions text-right">
                    	<input type="submit" value="Update" class="btn btn-primary">
                    </div>
                    
                </div>
            </form>
            </div></div>
			<?php
    break;  
}
}
?>
