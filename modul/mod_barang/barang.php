<?php

session_start();
	if ($_SESSION['level']=='admin'){

	if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/mod_barang/aksi_barang.php";

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
					<h3>Sistem Informasi Pengelolaan Aset Desa <small>Membantu Dalam Melakukan Manajement aset Desa</small></h3>
				</div>

			</div>
			<!-- /page header -->


			<!-- Breadcrumbs line -->
			<div class="breadcrumb-line">
				<ul class="breadcrumb">
					<li><a href="?module=home">Home</a></li>
					<li><a href="#">Master</a></li>
					<li><a href="?module=barang">Setup Barang</a></li>
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
                  <!--  <li><a href="#outside" data-toggle="tab"><i class="icon-upload5"></i> Upload / Import Document</a></li> -->
                    <li><a href="?module=barang&act=tambahbarang"><i class="icon-plus"></i> Tambah Data</a></li>
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
			                <div class="panel-heading"><h6 class="panel-title"><i class="icon-table"></i> Data Barang</h6></div>
			                <div class="datatable-add-row">
				                <table class="table">
				                    <thead>
				                        <tr>
				                            <th width="5%">No</th>
				                            <th>Kode Barang</th>
				                            <th>Nama Bidang</th>
				                            <th>Nama Barang</th>
				                            <th width="15%">Action</th>
				                        </tr>
				                    </thead>

									<tfoot>
										<tr>
											<th>no</th>
				                            <th>Kode Barang</th>
				                            <th>Nama Bidang</th>
				                            <th>Nama Barang</th>
											<th>&nbsp;</th>
										</tr>
									</tfoot>

				                    <tbody>
                                    <?php
                                              $tampil = mysql_query("SELECT * FROM barang, bidang where barang.kode_bidang=bidang.kode_bidang ORDER BY kode_barang DESC");
  $no=1;
    while ($r=mysql_fetch_array($tampil)){
				    $harga = format_rupiah($r[harga_barang]);

?>
				                        <tr>
				                            <td><?php echo"$no"; ?></td>
				                            <td><?php echo"$r[kode_barang]"; ?></td>
				                            <td><?php echo"$r[nama_bidang]"; ?></td>
				                            <td><?php echo"$r[nama_barang]"; ?></td>
				                            <td><center><?php echo"<a href=?module=barang&act=editbarang&id=".urlencode($r[kode_barang]).">"; ?><span class="icon-quill2"></span> </a> &nbsp; <?php echo"<a href=$aksi?module=barang&act=hapus&id=$r[kode_barang]"; ?> <span class="icon-remove4"></span> </a></center></td>
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
                    <div class="panel-heading"><h6 class="panel-title"><i class="icon-droplet"></i> Barang</h6></div>
                	<div class="panel-body">
        <form class="form-horizontal" enctype="multipart/form-data"  method="post" action="<?php echo"$aksi?module=barang&act=upload"; ?>" role="form">
                        <div class="form-group">
							<div class="col-sm-3">
								                                <span class="help-block">Contoh Desain From Import Barang <a href="modul/mod_barang/contoh_import_barang.xls">download</a></span>
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
  case "tambahbarang":
?>
		<div class="page-content">


			<!-- Page header -->
			<div class="page-header">
				<div class="page-title">
					<h3>Sistem Informasi Pengelolaan Aset Desa <small>Membantu Dalam Melakukan Manajement aset Desa</small></h3>
				</div>

			</div>
			<!-- /page header -->


			<!-- Breadcrumbs line -->
			<div class="breadcrumb-line">
				<ul class="breadcrumb">
					<li><a href="?module=home">Home</a></li>
					<li><a href="#">Master</a></li>
					<li><a href="?module=barang">Setup Barang</a></li>
					<li><a href="?module=barang&tambahbarang">Tambah Barang</a></li>
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
                    		Data berhasil di tambahkan ke database kode : <?php echo"$_POST[kode_barang]"; ?> .... <a href="media.php?module=barang">lihat data barang</a>
                    	</div><?php } ?>

		    <!-- Form validation -->
            <form class="form-horizontal validate" method="post" action="<?php echo"$aksi?module=barang&act=input"; ?>" role="form">
	            <div class="block">
	                <h6 class="heading-hr"><i class="icon-checkmark-circle"></i> Form Tambah Barang</h6>


					<div class="form-group">
						<div class="col-sm-6">
<label> Nama Bidang :</label>
 <select name="kode_bidang" class="form-control" id="kode_bidang" tabindex="2" data-placeholder="Pilih Nama Bidang...">														<option value=""></option>
          <?php 
		    $tampil=mysql_query("SELECT * FROM bidang ORDER BY nama_bidang");
            while($r=mysql_fetch_array($tampil)){
              echo "<option value=$r[kode_bidang]>$r[nama_bidang]</option>";
            }
?>

													</select>
			                    	
			                    </div>
                          </div>      
                                					<div class="form-group">
                    
					  <div class="col-sm-6">
		              <label> Kode Barang :</label>
<input name="kode_barang" type="text" class="required form-control" id="kode_barang" >
        </div>
					
                    
						<div class="col-sm-6">
<label>Nama Barang :</label>
		                    	  <input type="text" class="required form-control" name="nama_barang" id="nama_barang">
			                    	
			                    	
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
  case "editbarang":
    $edit=mysql_query("SELECT * FROM barang WHERE kode_barang='".urldecode($_GET[id])."'");
    $r=mysql_fetch_array($edit);

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
					<li><a href="?module=barang">Setup Barang</a></li>
					<li><a href="?module=barang">Tambah Barang</a></li>
				</ul>

				<div class="visible-xs breadcrumb-toggle">
					<a class="btn btn-link btn-lg btn-icon" data-toggle="collapse" data-target=".breadcrumb-buttons"><i class="icon-menu2"></i></a>
				</div>

			</div>
			<!-- /breadcrumbs line -->


		    <!-- Form validation -->
            <form class="form-horizontal validate" method="post" action="<?php echo"$aksi?module=barang&act=update"; ?>" role="form">
	            <div class="block">
	                <h6 class="heading-hr"><i class="icon-checkmark-circle"></i> Form Update Barang</h6>
<input type="hidden" name="id" value="<?php echo"$r[kode_barang]"; ?>" />
                    					<div class="form-group">
						<div class="col-sm-6">
<label> Kode Barang :</label>
<input name="kode_barang" type="text" class="required form-control" id="kode_barang" value="<?php echo"$r[kode_barang]"; ?>" readonly="readonly" >
			                    	
			                    </div>
                                
                                

					</div>
					<div class="form-group">
						<div class="col-sm-6">
<label> Nama Bidang :</label>
 <select name="kode_bidang" class="form-control" id="kode_bidang" tabindex="2" data-placeholder="Pilih Nama Bidang...">														<option value=""></option>
<?php
                 $tampil=mysql_query("SELECT * FROM bidang ORDER BY nama_bidang");
          if ($r[kode_bidang]==0){
            echo "<option value=0 selected>--- Pilih Bidang ---</option>";
          }   

          while($w=mysql_fetch_array($tampil)){
            if ($r[kode_bidang]==$w[kode_bidang]){
              echo "<option value=$w[kode_bidang] selected>$w[nama_bidang]</option>";
            }
            else{
              echo "<option value=$w[kode_bidang]>$w[nama_bidang]</option>";
            }
          }
?> 

													</select>
			                    	
			                    </div>
                                
                                
					  <div class="col-sm-6">
<label>Nama Barang :</label>
		                    	  <input type="text" class="required form-control" name="nama_barang" id="nama_barang" value="<?php echo"$r[nama_barang]"; ?>" >
			                    	
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
}
	} 
?>
