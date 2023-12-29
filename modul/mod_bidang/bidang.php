<?php
session_start();
	if ($_SESSION['level']=='admin'){

 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/mod_bidang/aksi_bidang.php";
	$x="SELECT max(kode_bidang) as maxidadmin FROM bidang WHERE kode_bidang LIKE 'BDGN%'";
	$selectidmax=mysql_query($x) or die ("Eror Query".mysql_error()); 

    $hslidmax=mysql_fetch_array($selectidmax);

    $idmax=$hslidmax['maxidadmin'];


    $nourut = (int) substr($idmax, 4,3);

    $nourut++;


    $IDbaru = "BDGN" . sprintf("%03s", "$nourut");  

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
					<h3>Sistem Informasi Pengelolaan Aset Desa <small>Membantu Dalam Melakukan Pendataan aset Desa</small></h3>
				</div>

			</div>
			<!-- /page header -->


			<!-- Breadcrumbs line -->
			<div class="breadcrumb-line">
				<ul class="breadcrumb">
					<li><a href="?module=home">Home</a></li>
					<li><a href="#">Master</a></li>
					<li><a href="?module=bidang">Setup Bidang</a></li>
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
                <!--    <li><a href="#outside" data-toggle="tab"><i class="icon-upload5"></i> Upload / Import Document</a></li> -->
                    <li><a href="?module=bidang&act=tambahbidang"><i class="icon-plus"></i> Tambah Data</a></li>
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
			                <div class="panel-heading"><h6 class="panel-title"><i class="icon-table"></i> Data Bidang</h6></div>
			                <div class="datatable-add-row">
				                <table class="table">
				                    <thead>
				                        <tr>
				                            <th width="5%">No</th>
				                            <th>Kode Bidang</th>
				                            <th>Nama Bidang</th>
				                            <th width="15%">Action</th>
				                        </tr>
				                    </thead>

									<tfoot>
										<tr>
											<th>no</th>
											<th>Kode Bidang</th>
											<th>Nama Bidang</th>
											<th>&nbsp;</th>
										</tr>
									</tfoot>

				                    <tbody>
                                    <?php
                                              $tampil = mysql_query("SELECT * FROM bidang ORDER BY kode_bidang DESC");
  $no=1;
    while ($r=mysql_fetch_array($tampil)){
?>
				                        <tr>
				                            <td><?php echo"$no"; ?></td>
				                            <td><?php echo"$r[kode_bidang]"; ?></td>
				                            <td><?php echo"$r[nama_bidang]"; ?></td>
				                            <td><center><?php echo"<a href=?module=bidang&act=editbidang&id=$r[kode_bidang]>"; ?><span class="icon-quill2"></span> </a> &nbsp; <?php echo"<a href=$aksi?module=bidang&act=hapus&id=$r[kode_bidang]"; ?> <span class="icon-remove4"></span> </a></center></td>
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
                    <div class="panel-heading"><h6 class="panel-title"><i class="icon-droplet"></i> Bidang</h6></div>
                	<div class="panel-body">
        <form class="form-horizontal" enctype="multipart/form-data"  method="post" action="<?php echo"$aksi?module=bidang&act=upload"; ?>" role="form">
                        <div class="form-group">
							<div class="col-sm-3">
								                                <span class="help-block">Contoh Desain From Import Bidang <a href="modul/mod_bidang/contoh_import_bidang.xls">download</a></span>
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

        	<!-- /page tabs -->
  <?php
    break;
  
  // Form Tambah Tag
  case "tambahbidang":
?>
		<div class="page-content">


			<!-- Page header -->
			<div class="page-header">
				<div class="page-title">
					<h3>Sistem Informasi Pengelolaan Aset Desa <small>Membantu Dalam Melakukan Pendataan aset Desa</small></h3>
				</div>

			</div>
			<!-- /page header -->


			<!-- Breadcrumbs line -->
			<div class="breadcrumb-line">
				<ul class="breadcrumb">
					<li><a href="?module=home">Home</a></li>
					<li><a href="#">Master</a></li>
					<li><a href="?module=bidang">Setup Bidang</a></li>
					<li><a href="?module=bidang&tambahbidang">Tambah Bidang</a></li>
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
                    		Data berhasil di tambahkan ke database kode : <?php echo"$_POST[kode_bidang]"; ?> .... <a href="media.php?module=bidang">lihat data bidang</a>
                    	</div><?php } ?>

		    <!-- Form validation -->
            <form class="form-horizontal validate" method="post" action="<?php echo"$aksi?module=bidang&act=input"; ?>" role="form">
	            <div class="block">
	                <h6 class="heading-hr"><i class="icon-checkmark-circle"></i> Form Tambah Bidang</h6>


					<div class="form-group">
						<div class="col-sm-6">
			                    	<label> Kode :</label>
									<input name="kode_bidang" type="text" class="required form-control" >
			                    	
			                    </div>
					  <div class="col-sm-6">
						<label>Nama :</label>
		                    	  <input type="text" class="required form-control" name="nama_bidang">
			                    	
		                      </div>
								
								
								

					</div>
                    
                    <div class="form-actions text-right">
                    	<input type="submit" value="Submit form" class="btn btn-primary">
                    </div>
                    
                </div>
            </form>
			
			<?php
     break;
  
  // Form Edit Kategori  
  case "editbidang":
    $edit=mysql_query("SELECT * FROM bidang WHERE kode_bidang='$_GET[id]'");
    $r=mysql_fetch_array($edit);

?>
		<div class="page-content">


			<!-- Page header -->
			<div class="page-header">
				<div class="page-title">
					<h3>Dynamic tables <small>Dynamic tables examples based on Datatable plugin</small></h3>
				</div>

			</div>
			<!-- /page header -->


			<!-- Breadcrumbs line -->
			<div class="breadcrumb-line">
				<ul class="breadcrumb">
					<li><a href="?module=home">Home</a></li>
					<li><a href="#">Master</a></li>
					<li><a href="?module=bidang">Setup Bidang</a></li>
					<li><a href="?module=bidang&tambahbidang">Update Bidang</a></li>
				</ul>

				<div class="visible-xs breadcrumb-toggle">
					<a class="btn btn-link btn-lg btn-icon" data-toggle="collapse" data-target=".breadcrumb-buttons"><i class="icon-menu2"></i></a>
				</div>

			</div>
			<!-- /breadcrumbs line -->


		    <!-- Form validation -->
            <form class="form-horizontal validate" method="post" action="<?php echo"$aksi?module=bidang&act=update"; ?>" role="form">
	            <div class="block">
	                <h6 class="heading-hr"><i class="icon-checkmark-circle"></i> Form Update Bidang</h6>


					<div class="form-group">
						<div class="col-sm-6">
													<label for="kode_bidang" class="req">Kode bidang</label>
													<input type="text" name="id" id="id" class="form-control" value="<?php echo"$r[kode_bidang]"; ?>" readonly="readonly" data-parsley-required="true">
			                    	
			                    </div>
					  <div class="col-sm-6">
						<label>Nama :</label>
		                    	  <input type="text" class="required form-control" name="nama_bidang" id="nama_bidang" value="<?php echo"$r[nama_bidang]"; ?>">
			                    	
		                      </div>
								
								
								

					</div>
                    
                    <div class="form-actions text-right">
                    	<input type="submit" value="Update" class="btn btn-primary">
                    </div>
                    
                </div>
            </form>
			<?php
    break;  
}
}
	}
?>
