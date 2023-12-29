<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/mod_realisasi_penghapusan/aksi_realisasi_penghapusan.php";
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
					<li><a href="?module=realisasi_penghapusan">Pendataan realisasi penghapusan</a></li>
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
                    <li><a href="?module=realisasi_penghapusan&act=tambahrealisasi_penghapusan"><i class="icon-plus"></i> Tambah Data</a></li>
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

                	<!-- First tab content -->
                	<div class="tab-pane active fade in" id="inside">

				    	<!-- Default datatable inside panel -->
			           <!-- Datatable with custom column filtering -->
			            <div class="panel panel-default">
			                <div class="panel-heading"><h6 class="panel-title"><i class="icon-table"></i> Data realisasi Penghapusan</h6></div>
			                <div class="datatable-add-row">
				                <table class="table">
				                    <thead>
				                        <tr>
												<th width="3%">No</th>
												<th width="17%">Kode</th>
												<th>Nama</th>
												<th>Kode Barang</th>
												<th>Barang</th>
												<th>Nomor SKPH </th>
												<th>Jumlah Barang </th>
												<th>Kondisi</th>
												<th width="7%"><center>Action</center></th>
                                                                  </tr>
				                    </thead>

									<tfoot>
										<tr>
												<th width="3%">No</th>
												<th width="17%">Kode</th>
												<th>Nama</th>
												<th>Kode Barang</th>
												<th>Barang</th>
												<th>Nomor SKPH </th>
												<th>Jumlah Barang </th>
												<th>Kondisi</th>
												<th>&nbsp;</th>
</tr>
									</tfoot>

				                    <tbody>
<?php
                                                                                              $tampil = mysql_query("SELECT * FROM realisasi_penghapusan, barang, subdinas where realisasi_penghapusan.kode_barang=barang.kode_barang AND realisasi_penghapusan.skpd=subdinas.kode_subdinas order by kode_realisasi_penghapusan DESC") or die (mysql_error());
  $no=1;
    while ($r=mysql_fetch_array($tampil)){
?>
											<tr>
                                            <td><?php echo"$no"; ?></td>
                                            <td><?php echo"$r[kode_realisasi_penghapusan]"; ?></td>
                                            <td><?php echo"$r[nama_subdinas]"; ?></td>
                                            <td><?php echo"$r[kode_barang]"; ?></td>
                                            <td><?php echo"$r[nama_barang]"; ?></td>
                                            <td><?php echo"$r[no_skph]"; ?></td>
                                            <td><?php echo"$r[jumlah]"; ?></td>
											  <td><?php echo"$r[kondisi]"; ?></td>
				                            <td><center><?php echo"<a href=?module=realisasi_penghapusan&act=editrealisasi_penghapusan&id=$r[kode_realisasi_penghapusan]>"; ?><span class="icon-quill2"></span> </a> &nbsp; <?php echo"<a href=$aksi?module=realisasi_penghapusan&act=hapus&id=$r[kode_realisasi_penghapusan]"; ?> <span class="icon-remove4"></span> </a> &nbsp; </center></td>
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
  case "tambahrealisasi_penghapusan":
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
					<li><a href="?module=realisasi_penghapusan">Setup realisasi penghapusan</a></li>
					<li><a href="?module=realisasi_penghapusan&tambahrealisasi_penghapusan">Tambah realisasi penghapusan</a></li>
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
                    		Data berhasil di tambahkan ke database  .... <a href="media.php?module=realisasi_penghapusan">lihat data realisasi_penghapusan</a>
                    	</div><?php } ?>

		    <!-- Form validation -->
            <form action="<?php echo"$aksi?module=realisasi_penghapusan&act=input"; ?>"  method="post" enctype="multipart/form-data" class="form-horizontal validate" role="form">
	            <div class="block">
	                <h6 class="heading-hr"><i class="icon-checkmark-circle"></i> Form Tambah realisasi penghapusan</h6>


					<div class="form-group">
						<div class="col-sm-6">
													<label for="s2_validate" class="req">Lokasi</label>
 <select name="skpda" class="select-full" id="skpda" tabindex="2" data-placeholder="Pilih SKPD...">														<option value=""></option>
<?php
//mengambil nama-nama propinsi yang ada di database
$propinsi = mysql_query("SELECT * FROM subdinas ORDER BY nama_subdinas");
while($p=mysql_fetch_array($propinsi)){
echo "<option value=\"$p[kode_subdinas]\">$p[nama_subdinas]</option>\n";
}
?>
</select>												
			                    </div>
					  <div class="col-sm-6">
                                          <label for="label" class="req">Barang</label>
<select name="kode_barang" id="kode_barang" class="form-control" id="s2_validate" tabindex="2" data-placeholder="Pilih Barang ...">
<option> -- Pilih Barang -- </option>
<?php
//mengambil nama-nama propinsi yang ada di database
$kota = mysql_query("SELECT * FROM invesa, barang, subdinas where invesa.skpd=subdinas.kode_subdinas and barang.kode_barang=invesa.kode_barang");
while($p=mysql_fetch_array($propinsi)){
echo "<option value=\"$p[kode_barang]\">$p[nama_barang]</option>\n";
}
                                              $tampil = mysql_query("SELECT * FROM invesb, barang, subdinas where invesb.skpd=subdinas.kode_subdinas and barang.kode_barang=invesb.kode_barang order by kode_invesb DESC") or die (mysql_error());
while($s = mysql_fetch_array($tampil)){
    echo "<option value=\"".$s['kode_barang']."\">".$s['nama_barang']."</option>\n";
}

                                              $tampill = mysql_query("SELECT * FROM invesc, barang, subdinas where invesc.skpd=subdinas.kode_subdinas and barang.kode_barang=invesc.kode_barang   order by kode_invesc DESC") ;
                                              $tampilll = mysql_query("SELECT * FROM invesd, barang, subdinas where invesd.skpd=subdinas.kode_subdinas and barang.kode_barang=invesd.kode_barang order by kode_invesd  order by kode_invesc DESC") ;
                                              $tampillll = mysql_query("SELECT * FROM invese, barang, subdinas where invese.skpd=subdinas.kode_subdinas and barang.kode_barang=invese.kode_barang order by kode_invese DESC") ;
                                              $tampilllll = mysql_query("SELECT * FROM invesf, barang, subdinas where invesf.skpd=subdinas.kode_subdinas and barang.kode_barang=invesf.kode_barang  order by kode_invesf DESC") ;
while($c = mysql_fetch_array($tampill)){
    echo "<option value=\"".$c['kode_barang']."\">".$c['nama_barang']."</option>\n";
}
while($d = mysql_fetch_array($tampilll)){
    echo "<option value=\"".$d['kode_barang']."\">".$d['nama_barang']."</option>\n";
}
while($e = mysql_fetch_array($tampillll)){
    echo "<option value=\"".$e['kode_barang']."\">".$e['nama_barang']."</option>\n";
}
while($f = mysql_fetch_array($tampilllll)){
    echo "<option value=\"".$f['kode_barang']."\">".$f['nama_barang']."</option>\n";
}

?>
</select>
                      </div>
					</div>
					<div class="form-group">
						<div class="col-sm-6">
												<label for="kode_barang" class="req">Nomor SKPH </label>
											  <input type="text" name="no_skph" id="no_skph" class="form-control" data-parsley-required="true" >								
			                    	
			                    </div>
					  <div class="col-sm-6">
												<label for="kode_barang" class="req">Jumlah </label>
											  <input type="text" name="jumlah" id="jumlah" class="form-control" data-parsley-required="true" >								
			                    	
		                      </div>
					</div>
                    <div class="form-group">
						<div class="col-sm-6">
												<label for="kode_barang" class="req">Kondisi </label>
											  <input type="text" name="kondisi" id="kondisi" class="form-control" data-parsley-required="true" >								
			                    	
			                    </div>
			                    	
					</div>
                    <div class="form-group">
						<div class="col-sm-12">
											<label for="ckeditor_validate" class="req">Keterangan</label>
											<textarea class="form-control" name="keterangan" id="ckeditor_validate" cols="30" rows="4" data-parsley-required="true"></textarea>
			                    	
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
  case "editrealisasi_penghapusan":
    $edit=mysql_query("SELECT * FROM realisasi_penghapusan, barang, subdinas where realisasi_penghapusan.kode_barang=barang.kode_barang AND realisasi_penghapusan.skpd=subdinas.kode_subdinas AND kode_realisasi_penghapusan='$_GET[id]'");
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
					<li><a href="?module=realisasi_penghapusan">Setup realisasi penghapusan</a></li>
					<li><a href="#">Update realisasi penghapusan</a></li>
				</ul>

				<div class="visible-xs breadcrumb-toggle">
					<a class="btn btn-link btn-lg btn-icon" data-toggle="collapse" data-target=".breadcrumb-buttons"><i class="icon-menu2"></i></a>
				</div>

			</div>
			<!-- /breadcrumbs line -->


		    <!-- Form validation -->
            <form class="form-horizontal validate" method="post" action="<?php echo"$aksi?module=realisasi_penghapusan&act=update"; ?>" enctype="multipart/form-data"  role="form">
	            <div class="block">
	                <h6 class="heading-hr"><i class="icon-checkmark-circle"></i> Form Update realisasi penghapusan</h6>


<div class="form-group">
											
											  <div class="col-lg-6">
												<label for="kode_barang" class="req">Kode realisasi penghapusan </label>
											  <input name="id" type="text" class="form-control" id="id" value="<?php echo"$r[kode_realisasi_penghapusan]"; ?>" readonly data-parsley-required="true" >								
                               				  </div>
											
									  </div>
					<div class="form-group">
						<div class="col-sm-6">
													<label for="s2_validate" class="req">Lokasi</label>
 <select name="skpda" class="select-full" id="skpda" tabindex="2" data-placeholder="Pilih SKPD...">														<option value=""></option>
<?php
                 $tampil=mysql_query("SELECT * FROM subdinas ORDER BY nama_subdinas");
          if ($r[kode_subdinas]==0){
            echo "<option value=0 selected></option>";
          }   

          while($w=mysql_fetch_array($tampil)){
            if ($r[kode_subdinas]==$w[kode_subdinas]){
              echo "<option value=$w[kode_subdinas] selected>$w[nama_subdinas]</option>";
            }
            else{
              echo "<option value=$w[kode_subdinas]>$w[nama_subdinas]</option>";
            }
          }
?>
</select>		
			                    </div>
					  <div class="col-sm-6">
                                          <label for="label" class="req">Barang</label>
<select name="kode_barang" id="kode_barang" class="form-control" id="s2_validate" data-parsley-required="true" data-parsley-trigger="change">
<option> -- Pilih Barang --</option>

<?php
                 $tampil=mysql_query("SELECT * FROM invesa, barang where invesa.kode_barang=barang.kode_barang and invesa.skpd='$r[skpd]' ");

          while($w=mysql_fetch_array($tampil)){
            if ($r[kode_barang]==$w[kode_barang]){
              echo "<option value=$w[kode_barang] selected>$w[nama_barang]</option>";
            }
            else{
              echo "<option value=$w[kode_barang]>$w[nama_barang]</option>";
            }
          }
?>
<?php
                 $tampil=mysql_query("SELECT * FROM invesb, barang where invesb.kode_barang=barang.kode_barang and invesb.skpd='$r[skpd]' ");

          while($w=mysql_fetch_array($tampil)){
            if ($r[kode_barang]==$w[kode_barang]){
              echo "<option value=$w[kode_barang] selected>$w[nama_barang]</option>";
            }
            else{
              echo "<option value=$w[kode_barang]>$w[nama_barang]</option>";
            }
          }
?>
<?php
                 $tampil=mysql_query("SELECT * FROM invesc, barang where invesc.kode_barang=barang.kode_barang and invesc.skpd='$r[skpd]' ");

          while($w=mysql_fetch_array($tampil)){
            if ($r[kode_barang]==$w[kode_barang]){
              echo "<option value=$w[kode_barang] selected>$w[nama_barang]</option>";
            }
            else{
              echo "<option value=$w[kode_barang]>$w[nama_barang]</option>";
            }
          }
?>
<?php
                 $tampil=mysql_query("SELECT * FROM invesd, barang where invesd.kode_barang=barang.kode_barang and invesd.skpd='$r[skpd]' ");

          while($w=mysql_fetch_array($tampil)){
            if ($r[kode_barang]==$w[kode_barang]){
              echo "<option value=$w[kode_barang] selected>$w[nama_barang]</option>";
            }
            else{
              echo "<option value=$w[kode_barang]>$w[nama_barang]</option>";
            }
          }
?> 
<?php
                 $tampil=mysql_query("SELECT * FROM invese, barang where invese.kode_barang=barang.kode_barang and invese.skpd='$r[skpd]' ");

          while($w=mysql_fetch_array($tampil)){
            if ($r[kode_barang]==$w[kode_barang]){
              echo "<option value=$w[kode_barang] selected>$w[nama_barang]</option>";
            }
            else{
              echo "<option value=$w[kode_barang]>$w[nama_barang]</option>";
            }
          }
?> 
<?php
                 $tampil=mysql_query("SELECT * FROM invesf, barang where invesf.kode_barang=barang.kode_barang and invesf.skpd='$r[skpd]' ");

          while($w=mysql_fetch_array($tampil)){
            if ($r[kode_barang]==$w[kode_barang]){
              echo "<option value=$w[kode_barang] selected>$w[nama_barang]</option>";
            }
            else{
              echo "<option value=$w[kode_barang]>$w[nama_barang]</option>";
            }
          }
?> </select>                                                          </div>
					</div>
					<div class="form-group">
					  <div class="col-sm-6">
												<label for="kode_barang" class="req">Nomor SKPH </label>
											  <input name="no_skph" type="text" class="form-control" id="no_skph" value="<?php echo"$r[no_skph]"; ?>" data-parsley-required="true" >								
			                    	
		                      </div>
					  <div class="col-sm-6">
												<label for="kode_barang" class="req">Jumlah </label>
											  <input name="jumlah" type="text" class="form-control" id="jumlah" value="<?php echo"$r[jumlah]"; ?>" data-parsley-required="true" >								
			                    	
		                      </div>
					</div>
					<div class="form-group">
					  <div class="col-sm-6">
												<label for="kode_barang" class="req">Kondisi </label>
											  <input name="kondisi" type="text" class="form-control" id="kondisi" value="<?php echo"$r[kondisi]"; ?>" data-parsley-required="true" >								
			                    	
		                      </div>
                              </div>
                              <div class="form-group">
					  <div class="col-sm-12">
											<label for="ckeditor_validate" class="req">Keterangan</label>
											<textarea class="form-control" name="keterangan" id="ckeditor_validate" cols="30" rows="4" data-parsley-required="true"><?php echo"$r[keterangan]"; ?></textarea>
			                    	
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
