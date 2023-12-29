<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/mod_invesa/aksi_invesa.php";
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
					<h3>Sistem Informasi Pengelolaan Aset Desa <small>Membantu Dalam Melakukan Pendataan Aset Desa</small></h3>
				</div>

			</div>
			<!-- /page header -->


			<!-- Breadcrumbs line -->
			<div class="breadcrumb-line">
				<ul class="breadcrumb">
					<li><a href="?module=home">Home</a></li>
					<li><a href="#">Master</a></li>
					<li><a href="?module=tanah">Pendataan Tanah</a></li>
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
                    <li><a href="?module=tanah&act=tambahtanah"><i class="icon-plus"></i> Tambah Data</a></li>
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
			                <div class="panel-heading"><h6 class="panel-title"><i class="icon-table"></i> Data Tanah</h6></div>
			                <div class="datatable-add-row">
				                <table class="table">
				                    <thead>
				                        <tr>
												<th width="3%">No</th>
												<th width="17%">Kode Inventaris Tanah </th>
										<?php	if ($_SESSION['level']=='admin'){ ?>
	<th>UPB</th>
										<?php } ?>
												<th>Barang</th>
												<th>Register</th>
												<th>Luas</th>
												<th>No Sertifikat</th>
												<th>Penggunaan</th>
												<th>Harga</th>
												<th>Sumber Dana</th>
												<th width="5%"><center>Action</center></th>				                        </tr>
				                    </thead>

									<tfoot>
										<tr>
												<th>No</th>
												<th width="17%">Kode Inventaris Tanah </th>
												<?php	if ($_SESSION['level']=='admin'){ ?>
										<th>UPB</th>
												<?php } ?>
												<th>Barang</th>
												<th>Register</th>
												<th>Luas</th>
												<th>No Sertifikat</th>
												<th>Penggunaan</th>
												<th>Harga</th>
												<th>Sumber Dana</th>
												<th>&nbsp;</th>										</tr>
									</tfoot>

				                    <tbody>
<?php

if ($_SESSION['level']=='admin'){ 
$tampil = mysql_query("SELECT * FROM invesa, barang, subdinas where invesa.skpd=subdinas.kode_subdinas and barang.kode_barang=invesa.kode_barang and invesa.status_penggunaan=1 order by invesa.id_invesa  DESC, invesa.register DESC") or die (mysql_error());
} else {
$tampil = mysql_query("SELECT * FROM invesa, barang, subdinas where invesa.skpd=subdinas.kode_subdinas and barang.kode_barang=invesa.kode_barang and subdinas.kode_subdinas = '$_SESSION[dinas]' and invesa.status_penggunaan=1 order by invesa.id_invesa  DESC, invesa.register DESC") or die (mysql_error());
}
$no=1;
    while ($r=mysql_fetch_array($tampil)){
		
		$harga = format_rupiah($r[harga]);
?>
				                        <tr>
                                            <td><?php echo"$no"; ?></td>
                                            <td><?php echo"$r[kode_barang]"; ?></td>
                                          										<?php	if ($_SESSION['level']=='admin'){ ?>
  <td><?php echo"$r[nama_subdinas]"; ?></td>
																				<?php } ?>
                                            <td><?php echo"$r[nama_barang]"; ?></td>
																						<td><?php echo"$r[register]"; ?></td>
                                            <td><?php echo"$r[luas]"; ?></td>
											<td><?php echo"$r[no_sertifikat]"; ?></td>
											<td><?php echo"$r[penggunaan]"; ?></td>
                                            <td><?php echo"Rp. $harga,-"; ?></td>
                                            <td><?php echo"$r[sumber_dana]"; ?></td>
				                            <td>
												<center><?php echo"<a href=?module=tanah&act=edittanah&id=$r[id_invesa]>"; ?><span class="icon-quill2"></span> </a> &nbsp;  
												
												<?php
													if($_SESSION['akses'] == 'A'){
												?>
												<a href="<?php echo"$aksi?module=tanah&act=hapus&id=$r[id_invesa]"; ?>" onclick="return confirm('Anda Yakin ingin menghapus data ?');"><span class="icon-remove4"></span> </a> &nbsp; </center>
												<?php
													}else{
														
													}
												?>
											</td>
				                        </tr>
                                        <?php $no++; } ?>
    
				                    </tbody>
				                </table>
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
  case "tambahtanah":
?>
		<div class="page-content">


			<!-- Page header -->
			<div class="page-header">
				<div class="page-title">
				<h3>Sistem Informasi Pengelolaan Aset Desa <small>Membantu Dalam Melakukan Pendataan Aset Desa</small></h3>
				</div>

			</div>
			<!-- /page header -->


			<!-- Breadcrumbs line -->
			<div class="breadcrumb-line">
				<ul class="breadcrumb">
					<li><a href="?module=home">Home</a></li>
					<li><a href="#">Master</a></li>
					<li><a href="?module=tanah">Setup Tanah</a></li>
					<li><a href="?module=tanah&tambahtanah">Tambah Tanah</a></li>
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
                    		Data berhasil di tambahkan ke database  .... <a href="media.php?module=tanah">lihat data tanah</a>
                    	</div><?php } ?>

		    <!-- Form validation -->
            <form action="<?php echo"$aksi?module=tanah&act=input"; ?>" id="jqueryExample" method="post" enctype="multipart/form-data" class="form-horizontal validate" role="form">
	            <div class="block">
	                <h6 class="heading-hr"><i class="icon-checkmark-circle"></i> Form Tambah Tanah</h6>


					
					<div class="form-group">
						<div class="col-sm-6">
<label> Barang :</label>
 <select name="kode_barang" class="select-full required" id="kota" tabindex="3" data-placeholder="Pilih Barang...">	
 <option value="">-- Pilih Barang --</option>
 <?php 
		    $tampil=mysql_query("SELECT * FROM barang, bidang where
			barang.kode_bidang = bidang.kode_bidang 
			and bidang.kode_bidang = '1' ORDER BY nama_barang");
            while($r=mysql_fetch_array($tampil)){
              echo "<option value='$r[kode_barang]'>$r[nama_barang]</option>";
            }
?>
													</select>			                    	
			                    	
			                    </div>
					  <div class="col-sm-6">
						<label>Luas :</label>
											  <input type="text" name="luas" id="luas" class="form-control required" data-parsley-required="true" >								
			                    	
		                      </div>
					</div>
					
					<div class="form-group">
						<div class="col-sm-6">
<label> No Sertifikat :</label>
<input type="text" name="no_sertifikat" id="no_sertifikat" class="form-control" data-parsley-required="true"  >								
                  	
			                    	
			                    </div>
					  <div class="col-sm-6">
						<label>Penggunaan :</label>
											  <input type="text" name="penggunaan" id="penggunaan"  class="form-control required " data-parsley-required="true" >								
			                    	
		                      </div>
					</div>
					
						<div class="form-group">
						<div class="col-sm-6">
<label> Tanggal Pembelian :</label>
<input type="text" name="tanggal" id="tanggal" class="form-control date start required " >								
					</div>
<div class="col-lg-6">
												<label for="jumlah" class="req">Jumlah </label>
											  <input type="text" name="jumlah" id="jumlah" class="form-control required " data-parsley-required="true" >								
                               				  </div>        	
			                   
										
										</div>
													<div class="form-group">

					  <div class="col-sm-6">
						<label>Harga Satuan :</label>
											  <input type="text" name="harga" id="inputku"  onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" class="form-control required " data-parsley-required="true" >								
			                    	
		                      </div>
													<div class="col-sm-6">
						<label>Kondisi :</label>
											  <select name="kondisi" class="form-control required " >					
												<option value="">-- Kondisi --</option>
 												<option value="Baik">Baik</option>
 												<option value="Kurang Baik">Kurang Baik</option>
 												<option value="Rusak berat">Rusak Berat</option>
												 </select>	
														
		                      </div>
													</div>
					
				<div class="form-group">
						<div class="col-sm-6">
<label> Sumber Dana :</label>
 <select name="sumber" class="form-control required " >	
 <option value="">-- Sumber Dana --</option>
 <option value="APBDes">APBDes</option>
 <option value="Kekayaan Asli Desa">Kekayaan Asli Desa</option>
 <option value="Lainnya">Lainnya</option>
</select>			                    	
			                    </div>
																<?php	if ($_SESSION['level']=='admin'){ ?>
			  <div class="col-sm-6">
						<label>UPB :</label>
 <select name="skpd" class="select-full" id="kota" tabindex="3" data-placeholder="Pilih Barang...">	
 <option value="">-- Pilih UPB --</option>
 <?php 
		    $tampil=mysql_query("SELECT * FROM subdinas  ORDER BY nama_subdinas");
            while($r=mysql_fetch_array($tampil)){
              echo "<option value='$r[kode_subdinas]'>$r[nama_subdinas]</option>";
            }
?>
													</select>			                    	
			                    	
		                      </div>
																<?php } ?>
	
					</div>
<!--
		<div class="form-group">
			<div class="col-sm-6">
                    	<label> Nomor BAST :</label>
						<input type="text" name="nobast" id="nobast" class="form-control" >
		  </div>
			<div class="col-sm-6">
                    	<label> Tanggal BAST :</label>
						<input type="text" name="tgbast" id="tgbast" class="form-control date start" >
		  </div>
		</div>
						
		<div class="form-group">
			<div class="col-sm-12">
                    	<label> Dokumen BAST <pdf/jpg/png> :</label>
						<input type="file" name="dokubast" id="dokubast" class="form-control" >
		  </div>
	  </div>
-->
<div class="form-group">
					  <div class="col-sm-12">
                    	<label> Keterangan :</label>
<textarea rows="5" cols="5" name="keterangan" class="form-control" id="keterangan"></textarea>			                    	
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
  case "edittanah":
  if ($_SESSION['level']=='admin'){ 
  $edit=mysql_query("SELECT * FROM invesa, barang, subdinas where invesa.skpd=subdinas.kode_subdinas and barang.kode_barang=invesa.kode_barang and id_invesa = '$_GET[id]'");
  } else {
  $edit=mysql_query("SELECT * FROM invesa, barang, subdinas where invesa.skpd=subdinas.kode_subdinas and barang.kode_barang=invesa.kode_barang and subdinas.kode_subdinas = '$_SESSION[dinas]' and id_invesa = '$_GET[id]'");
  }	  $r=mysql_fetch_array($edit);
  
  
  		$harga = format_rupiah($r[harga]);


?>

		<div class="page-content">


			<!-- Page header -->
			<div class="page-header">
				<div class="page-title">
				<h3>Sistem Informasi Pendataan Aset Desa <small>Membantu Dalam Melakukan Pendataan Aset Desa</small></h3>
				</div>

			</div>
			<!-- /page header -->


			<!-- Breadcrumbs line -->
			<div class="breadcrumb-line">
				<ul class="breadcrumb">
					<li><a href="?module=home">Home</a></li>
					<li><a href="#">Master</a></li>
					<li><a href="?module=tanah">Setup Tanah</a></li>
					<li><a href="#">Update Tanah</a></li>
				</ul>

				<div class="visible-xs breadcrumb-toggle">
					<a class="btn btn-link btn-lg btn-icon" data-toggle="collapse" data-target=".breadcrumb-buttons"><i class="icon-menu2"></i></a>
				</div>

			</div>
			<!-- /breadcrumbs line -->


		    <!-- Form validation -->
<form class="form-horizontal validate"  id="jqueryExample" method="post" action="<?php echo"$aksi?module=tanah&act=update"; ?>" enctype="multipart/form-data"  role="form">
<input type="hidden" name="id" value="<?php echo"$_GET[id]"; ?>"  />
	            <div class="block">
	                <h6 class="heading-hr"><i class="icon-checkmark-circle"></i> Form Tambah Tanah</h6>


					
					<div class="form-group">
						<div class="col-sm-6">
<label> Barang :</label>
 <select name="kode_barang" class="select-full required " id="kota" tabindex="3" data-placeholder="Pilih Barang...">	
 <option value="">-- Pilih Barang --</option>
 <?php 
                 $tampil=mysql_query("SELECT * FROM barang  where kode_bidang = '1' ORDER BY nama_barang");

          while($w=mysql_fetch_array($tampil)){
            if ($r[kode_barang]==$w[kode_barang]){
              echo "<option value='$w[kode_barang]' selected>$w[nama_barang]</option>";
            }
            else{
              echo "<option value='$w[kode_barang]'>$w[nama_barang]</option>";
            }
          }
?>
													</select>			                    	
			                    	
			                    </div>
					  <div class="col-sm-6">
						<label>Luas :</label>
<input type="text" name="luas" id="luas" class="form-control required" data-parsley-required="true" value="<?php echo"$r[luas]"; ?>" >								
			                    	
		                      </div>
					</div>
					
					<div class="form-group">
						<div class="col-sm-6">
<label> No Sertifikat :</label>
<input type="text" name="no_sertifikat" id="no_sertifikat" class="form-control" data-parsley-required="true" value="<?php echo"$r[no_sertifikat]"; ?>" >								
                  	
			                    	
			                    </div>
					  <div class="col-sm-6">
						<label>Penggunaan :</label>
											  <input type="text" name="penggunaan" id="penggunaan"  class="form-control required " data-parsley-required="true" value="<?php echo"$r[penggunaan]"; ?>">								
			                    	
		                      </div>
					</div>
					
						<div class="form-group">
						<div class="col-sm-6">
<label> Tanggal Pembelian :</label>
<input type="text" name="tanggal" id="tanggal" class="form-control date start required "  value="<?php echo"$r[tanggal_pembelian]"; ?>" >								
                  	
			                    	
			                    </div>
												
					<div class="form-group">										 
					  <div class="col-sm-6">
						<label>Harga Satuan :</label>
											  <input type="text" name="harga" id="harga" class="form-control required "  value="<?php echo"$harga"; ?>" data-parsley-required="true" id="inputku"  onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);"  />								
			                    	
		                      </div>
					  <div class="col-sm-6">
						<label>Kondisi :</label>
						<select name="kondisi" class="form-control required " >	
 							<option value="">-- Kondisi --</option>
  						<option value="Baik"  <?php if ($r['kondisi'] == "Baik") { echo"selected='selected'"; } ?>>Baik</option>
 							<option value="Kurang Baik" <?php if ($r['kondisi'] == "Kurang Baik") { echo"selected='selected'"; } ?>>Kurang Baik</option>
 							<option value="Rusak Berat" <?php if ($r['kondisi'] == "Rusak Berat") { echo"selected='selected'"; } ?>>Rusak Berat</option>
						</select> 	
		                      </div>
													</div>
				<div class="form-group">
						<div class="col-sm-6">
<label> Sumber Dana :</label>
 <select name="sumber" class="form-control required " >	
 <option value="">-- Sumber Dana --</option>
  <option value="APBDes"  <?php if ($r['sumber_dana'] == "APBDes") { echo"selected='selected'"; } ?>>APBDes</option>
 <option value="Kekayaan Asli Desa"   <?php if ($r['sumber_dana'] == "Kekayaan Asli Desa") { echo"selected='selected'"; } ?>>Kekayaan Asli Desa</option>
 <option value="Lainnya"   <?php if ($r['sumber_dana'] == "Lainnya") { echo"selected='selected'"; } ?>>Lainnya</option>
</select> 

		                    	
			                    </div>
														<?php	if ($_SESSION['level']=='admin'){ ?>
					  <div class="col-sm-6">
						<label>UPB :</label>
 <select name="skpd" class="select-full" id="kota" tabindex="3" data-placeholder="Pilih Barang...">	
 <option value="">-- Pilih UPB --</option>
 <?php 
		
			
			
			                 $tampil=mysql_query("SELECT * FROM subdinas  ORDER BY nama_subdinas ");

          while($w=mysql_fetch_array($tampil)){
            if ($r[kode_subdinas]==$w[kode_subdinas]){
              echo "<option value='$w[kode_subdinas]' selected>$w[nama_subdinas]</option>";
            }
            else{
              echo "<option value='$w[kode_subdinas]'>$w[nama_subdinas]</option>";
            }
          }

?>
													</select>			                    	
			                    	
		                      </div>
														<?php } ?>
					</div>
						
<div class="form-group">
					  <div class="col-sm-12">
                    	<label> Keterangan :</label>
<textarea rows="5" cols="5" name="keterangan" class="form-control" id="keterangan"><?php echo"$r[keterangan]"; ?></textarea>			                    	
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
?>
