<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/mod_invesd/aksi_invesd.php";
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
					<li><a href="?module=jalanirigrasi"> Setup Inventaris Jalan dan Irigrasi</a></li>
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
                    <li><a href="?module=jalanirigrasi&act=tambahjalanirigrasi"><i class="icon-plus"></i> Tambah Inventaris Jalan dan Irigrasi</a></li>
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

                    		Data berhasil diupdate  .... 
                    	</div><?php } ?>

                	<!-- First tab content -->
                	<div class="tab-pane active fade in" id="inside">

				    	<!-- Default datatable inside panel -->
			           <!-- Datatable with custom column filtering -->
			            <div class="panel panel-default">
			                <div class="panel-heading"><h6 class="panel-title"><i class="icon-table"></i> Data Inventaris Jalan dan Irigrasi</h6></div>
			                <div class="datatable-add-row">
				                <table class="table">
				                    <thead>
				                        <tr>
												<th width="3%">No</th>
												<th width="17%">Kode Barang </th>
											<?php 	if ($_SESSION['level']=='admin'){ ?>
	<th>SKPD</th>
    <?php } ?>
												<th>Nama Barang</th>
												<th>Register</th>
												<th>Jumlah</th>
												<th>Panjang</th>
												<th>Lebar</th>
												<th>Luas</th>
												<th>Harga</th>
												<th>Total</th>
												<th width="7%"><center>Action</center></th>
			                        </tr>
				                    </thead>

									<tfoot>
										<tr>
												<th width="3%">No</th>
												<th width="17%">Kode Barang </th>
																				<?php 	if ($_SESSION['level']=='admin'){ ?>
			<th>SKPD</th>
            <?php } ?>
												<th>Nama Barang</th>
												<th>Register</th>
												<th>Jumlah</th>
												<th>Luas</th>
												<th>Harga</th>
												<th>Total</th>
												<th>&nbsp; </th>
								</tr>
									</tfoot>

				                    <tbody>
<?php
	if ($_SESSION['level']=='admin'){ 
$tampil = mysql_query("SELECT * FROM invesd, barang, subdinas where invesd.skpd=subdinas.kode_subdinas and barang.kode_barang=invesd.kode_barang and invesd.status_penggunaan=1 order by invesd.id_invesd  DESC, invesd.register DESC") or die (mysql_error());
	} else {
$tampil = mysql_query("SELECT * FROM invesd, barang, subdinas where invesd.skpd=subdinas.kode_subdinas and barang.kode_barang=invesd.kode_barang and kode_subdinas = '$_SESSION[dinas]' and invesd.status_penggunaan=1 order by invesd.id_invesd  DESC, invesd.register DESC") or die (mysql_error());
	}
	$no=1;
    while ($r=mysql_fetch_array($tampil)){
				$total = $r[harga] * $r[jumlah];
				$harga = format_rupiah($r[harga]);
				$total = format_rupiah($total);

?>
										<tr>
                                            <td><?php echo"$no"; ?></td>
                                            <td><?php echo"$r[kode_barang]"; ?></td>
                                          											<?php 	if ($_SESSION['level']=='admin'){ ?>
  <td><?php echo"$r[nama_subdinas]"; ?></td> <?php } ?>
                                            <td><?php echo"$r[nama_barang]"; ?></td>
																						<td><?php echo"$r[register]"; ?></td>
                                            <td><?php echo"$r[jumlah]"; ?></td>
											<td><?php echo"$r[panjang]"; ?></td>
											<td><?php echo"$r[lebar]"; ?></td>
                                            <td><?php echo"$r[luas]"; ?></td>
                                            <td><?php echo"Rp. $harga,-"; ?></td>
                                            <td><?php echo"Rp. $total,-"; ?></td>
                                            <td>
												<center><?php echo"<a href=?module=jalanirigrasi&act=editjalanirigrasi&id=$r[id_invesd]>"; ?><span class="icon-quill2"></span> </a> &nbsp;   
												<?php
													if($_SESSION['akses'] == 'A'){
												?>
												<a href="<?php echo"$aksi?module=jalanirigrasi&act=hapus&id=$r[id_invesd]"; ?>" onclick="return confirm('Anda Yakin ingin menghapus data ?');"><span class="icon-remove4"></span> </a>&nbsp;</center>
												<?php
													}else{
														
													}
												?>
											</td>
											</tr> <?php $no++; }?>
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
  case "tambahjalanirigrasi":
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
					<li><a href="?module=jalanirigrasi">Setup Inventaris Jalan dan Irigrasi</a></li>
					<li><a href="#">Update Inventaris Jalan dan Irigrasi</a></li>
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
                    		Data berhasil di tambahkan ke database  .... <a href="media.php?module=jalanirigrasi">lihat data Inventaris Jalan dan Irigrasi</a>
                    	</div><?php } ?>

		    <!-- Form validation -->
          <form action="<?php echo"$aksi?module=jalanirigrasi&act=input"; ?>"  id="jqueryExample"  method="post" enctype="multipart/form-data" class="form-horizontal validate" role="form">
   <div class="block">
	                <h6 class="heading-hr"><i class="icon-checkmark-circle"></i> Form Tambah Inventaris Jalan dan Irigasi</h6>


					<div class="form-group">
						<div class="col-sm-6">
<label> Barang :</label>
 <select name="kode_barang" class="select-full required " id="kota" tabindex="3" data-placeholder="Pilih Barang...">	
 <option value="">-- Pilih Barang --</option>
 <?php 
		    $tampil=mysql_query("SELECT * FROM barang, bidang where barang.kode_bidang = '4' and  barang.kode_bidang = bidang.kode_bidang ORDER BY nama_barang");
            while($r=mysql_fetch_array($tampil)){
              echo "<option value='$r[kode_barang]'>$r[nama_barang]</option>";
            }
?>
													</select>			                    	
			                    </div>
					  <div class="col-sm-6">
											<?php 	if ($_SESSION['level']=='admin'){ ?>
<label> UPB :</label>
 <select name="skpd" class="select-full" id="skpd" tabindex="2" data-placeholder="Pilih SKPD...">														<option value=""></option>
          <?php 
		    $tampil=mysql_query("SELECT * FROM subdinas ORDER BY nama_subdinas");
            while($r=mysql_fetch_array($tampil)){
              echo "<option value='$r[kode_subdinas]'>$r[nama_subdinas]</option>";
            }
?>

													</select>		<?php } ?>	                    	
                      </div>
					</div>
					<div class="form-group">
						<div class="col-sm-6">
<label> Tanggal Pembelian :</label>
											  <input type="text" name="tanggal" id="tanggal" class="form-control required date start" data-parsley-required="true" >									

													</select>			                    	
			                    	
			                    </div>
					  <div class="col-sm-6">
			                  												<label for="inputku" class="req">Harga</label>
											  <input type="text" name="harga" id="inputku"  onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" class="form-control required " data-parsley-required="true" >								
  	
		                      </div>
					</div>
					<div class="form-group">
											
											  <div class="col-lg-6">
													  <label class="req">Konstruki </label> <br/>
														<input type="text" name="beton" id="beton" class="form-control required" data-parsley-required="true" >	
									
									
									</label>
													
                     				  </div>
<div class="col-lg-6">
								<label for="luas" class="req">Luas </label>
											  <input type="text" name="luas" id="luas" class="form-control required" data-parsley-required="true" >											  </div>
											
									  </div>
									  
									  <div class="form-group">
											
<div class="col-lg-6">
								<label for="panjang" class="req">Panjang </label>
											  <input type="text" name="panjang" id="panjang" class="form-control required" data-parsley-required="true" >	
										</div>	  
<div class="col-lg-6">
								<label for="lebar" class="req">Lebar </label>
											  <input type="text" name="lebar" id="lebar" class="form-control required" data-parsley-required="true" >											  </div>
											
									  </div>
										<div class="form-group">					  
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
											
											  <div class="col-lg-6">
<label> Sumber Dana :</label>
 <select name="sumber" class="form-control required " >	
 <option value="">-- Sumber Dana --</option>
 <option value="APBDes">APBDes</option>
 <option value="Kekayaan Asli Desa">Kekayaan Asli Desa</option>
 <option value="Lainnya">Lainnya</option>
</select>			                    	
       </div>
<div class="col-lg-6">
					  <label for="jumlah" class="req">Jumlah </label>
											  <input type="text" name="jumlah" id="jumlah" class="form-control required " data-parsley-required="true" >								
											  </div>
											
									  </div>

<div class="form-group">
					  <div class="col-sm-12">
											<label for="ckeditor_validate" class="req">Keterangan</label>
											<textarea class="form-control" name="keterangan" id="ckeditor_validate" cols="30" rows="4" data-parsley-required="true"></textarea>
										</div></div>

                    <div class="form-actions text-right">
                    	<input type="submit" value="Submit form" class="btn btn-primary">
                    </div>
                    
               
            </form>
            </div><?php
     break;
  
  // Form Edit Kategori  
  case "editjalanirigrasi":
 											if ($_SESSION['level']=='admin'){
 $edit=mysql_query("SELECT * FROM invesd, barang, subdinas where invesd.skpd=subdinas.kode_subdinas and barang.kode_barang=invesd.kode_barang and id_invesd='$_GET[id]'"); } else {
	  $edit=mysql_query("SELECT * FROM invesd, barang, subdinas where invesd.skpd=subdinas.kode_subdinas and barang.kode_barang=invesd.kode_barang and id_invesd='$_GET[id]' and subdinas.kode_subdinas = '$_SESSION[dinas]' ");
 }
    $r=mysql_fetch_array($edit);
  		$harga = format_rupiah($r[harga]);

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
					<li><a href="?module=jalanirigrasi">Setup Inventaris Jalan dan Irigrasi</a></li>
					<li><a href="#">Update Inventaris Jalan dan Irigrasi</a></li>
				</ul>

				<div class="visible-xs breadcrumb-toggle">
					<a class="btn btn-link btn-lg btn-icon" data-toggle="collapse" data-target=".breadcrumb-buttons"><i class="icon-menu2"></i></a>
				</div>

			</div>
			<!-- /breadcrumbs line -->


		    <!-- Form validation -->
            <form class="form-horizontal validate" method="post"  id="jqueryExample" action="<?php echo"$aksi?module=jalanirigrasi&act=update"; ?>" enctype="multipart/form-data"  role="form">
            <input type="hidden" name="id"  value="<?php echo"$_GET[id]"; ?>" />
  <div class="block">
	                <h6 class="heading-hr"><i class="icon-checkmark-circle"></i> Form Update Inventaris Bangunan</h6>


					<div class="form-group">
						<div class="col-sm-6">
<label> Barang :</label>
 <select name="kode_barang" class="select-full required " id="kota" tabindex="3" data-placeholder="Pilih Barang...">	
 <option value="">-- Pilih Barang --</option>
 <?php 
                 $tampil=mysql_query("SELECT * FROM barang, bidang where barang.kode_bidang = '4' and bidang.kode_bidang = barang.kode_bidang ORDER BY barang.nama_barang");

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
                      											<?php 	if ($_SESSION['level']=='admin'){ ?>

<label> UPB :</label>
 <select name="skpd" class="select-full" id="skpd" tabindex="2" data-placeholder="Pilih SKPD...">														<option value=""></option>
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

													</select>	 <?php } ?>		                    	
                      </div>
					</div>
					<div class="form-group">
						<div class="col-sm-6">
<label> Tanggal Pembelian :</label>
<input type="text" name="tanggal" id="tanggal" class="form-control date start required "  value="<?php echo"$r[tanggal_pembelian]"; ?>" >								

													</select>			                    	
			                    	
			                    </div>
					  <div class="col-sm-6">
			              												<label for="harga" class="req">Harga</label>
											  <input type="text" name="harga" id="harga" class="form-control required"  value="<?php echo"$harga"; ?>" data-parsley-required="true" id="inputku"  onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" />                    </div>
					</div>
					<div class="form-group">
											
											  <div class="col-lg-6">
													 
														<label for="beton" class="req">Konstruksi </label>
											  <input type="text" name="beton" id="beton" class="form-control required" data-parsley-required="true" value="<?php echo"$r[beton]"; ?>">
										Beton
									</label>	 													
                     				  </div>
<div class="col-lg-6">
								<label for="luas" class="req">Luas </label>
											  <input type="text" name="luas" id="luas" class="form-control required" data-parsley-required="true" value="<?php echo"$r[luas]"; ?>">											  </div>
											
									  </div>
									  
									  <div class="form-group">
											
<div class="col-lg-6">
								<label for="panjang" class="req">Panjang </label>
											  <input type="text" name="panjang" id="panjang" class="form-control required" data-parsley-required="true" value="<?php echo"$r[panjang]"; ?>">											  </div>
											
									  
<div class="col-lg-6">
								<label for="lebar" class="req">Lebar </label>
											  <input type="text" name="lebar" id="lebar" class="form-control required" data-parsley-required="true" value="<?php echo"$r[lebar]"; ?>">											  </div>
											
									  </div>
									  
										<div class="form-group">
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
											
											  <div class="col-lg-6">
                               				   <label> Sumber Dana :</label>
 <select name="sumber" class="form-control required " >	
 <option value="">-- Sumber Dana --</option>
  <option value="APBDes"  <?php if ($r['sumber_dana'] == "APBDes") { echo"selected='selected'"; } ?>>APBDes</option>
 <option value="Kekayaan Asli Desa"   <?php if ($r['sumber_dana'] == "Kekayaan Asli Desa") { echo"selected='selected'"; } ?>>Kekayaan Asli Desa</option>
 <option value="Lainnya"   <?php if ($r['sumber_dana'] == "Lainnya") { echo"selected='selected'"; } ?>>Lainnya</option>
</select>                  	
		            </div>

											
									  </div>

<div class="form-group">
					  <div class="col-sm-12">
											<label for="ckeditor_validate" class="req">Keterangan</label>
											<textarea class="form-control" name="keterangan" id="ckeditor_validate" cols="30" rows="4" data-parsley-required="true"><?php echo"$r[keterangan]"; ?></textarea>
										</div></div>

                    <div class="form-actions text-right">
                    	<input type="submit" value="Submit form" class="btn btn-primary">
                    </div>
                    
               
            </form>
            </div>
			
			
			
			
			<?php
    break;  
}
}
?>

