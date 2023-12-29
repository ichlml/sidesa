<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/mod_penggunaan/aksi_penggunaan.php";
switch($_GET[act]){
  // Tampil Tag
  default:
?>
<!-- datatables -->


<div id="main_wrapper">
			<div class="page_content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<div class="panel panel-default">
							  <div class="panel-heading">Data Penggunaan Barang </div> 
								</br>
<a href="?module=penggunaan&act=tambahpenggunaan">
<button class="btn btn-primary" >Tambah Penggunaan Barang </button>
</a>
										</br><div class="panel-body">
											
				<table id="dt_basic" class="table table-striped">
										<thead>
											<tr>
												<th width="3%">No</th>
												<th width="17%">Kode</th>
												<th>SKPD</th>
												<th>Nama Barang </th>
												<th>SK KPH </th>
												<th>Tanggal SK </th>
												<th>Jumlah</th>
												<th width="7%"><center>Action</center></th>
											</tr>
										</thead>
										<tbody>
<?php
                                                                                              $tampil = mysql_query("SELECT * FROM pengguna, barang, subdinas where pengguna.kode_barang=barang.kode_barang AND pengguna.skpd=subdinas.kode_subdinas order by kode_penggunaan DESC") or die (mysql_error());
  $no=1;
    while ($r=mysql_fetch_array($tampil)){
?>
											<tr>
                                            <td><?php echo"$no"; ?></td>
                                            <td><?php echo"$r[kode_penggunaan]"; ?></td>
                                            <td><?php echo"$r[nama_subdinas]"; ?></td>
                                            <td><?php echo"$r[nama_barang]"; ?></td>
                                            <td><?php echo"$r[sk_kdh]"; ?></td>
                                            <td><?php echo"$r[tanggal_sk]"; ?></td>
                                            <td><?php echo"$r[jumlah]"; ?></td>
                                            <td><center><?php echo"<a href=?module=penggunaan&act=editpenggunaan&id=$r[kode_penggunaan]>"; ?><span class="glyphicon glyphicon-pencil"></span> </a> &nbsp; <?php echo"<a href=$aksi?module=penggunaan&act=hapus&id=$r[kode_penggunaan]"; ?> <span class="glyphicon glyphicon-trash"></span> </a> &nbsp;</center></td>
											</tr> <?php $no++; }?>
										</tbody>
			  </table>
							  </div>
							</div>
						</div>
					</div>
              </div></div></div>
<p>
  <?php
    break;
  
  // Form Tambah Tag
  case "tambahpenggunaan":
?>
	<!-- main content -->
		<div id="main_wrapper">
			<div class="page_content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<div class="panel panel-default">
								<div class="panel-heading">Form Tambah Penggunaan Barang </div>
								<div class="panel-body">
									<form data-parsley-validate action="<?php echo"$aksi?module=penggunaan&act=input"; ?>" method="POST">
											<div class="form-group">
											<div class="row">
											  <div class="col-lg-6">
													<label for="s2_validate" class="req">Lokasi</label>
													<select name="skpd" id="skpd" class="form-control" id="s2_validate" data-parsley-required="true" data-parsley-trigger="change">
<option>--Pilih Bidang--</option>
<?php
//mengambil nama-nama propinsi yang ada di database
$propinsi = mysql_query("SELECT * FROM subdinas ORDER BY nama_subdinas");
while($p=mysql_fetch_array($propinsi)){
echo "<option value=\"$p[kode_subdinas]\">$p[nama_subdinas]</option>\n";
}
?>
</select>													</div>                                        <div class="col-lg-6">
                                          <label for="label" class="req">Barang</label>
<select name="kode_barang" id="kode_barang" class="form-control" id="s2_validate" data-parsley-required="true" data-parsley-trigger="change">
<option>--Pilih Barang--</option>
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
										</div>                                        										<div class="form-group">
											<div class="row">
											  <div class="col-lg-6">
												<label for="kode_barang" class="req">SK KDH  </label>
<input type="text" name="sk_kdh" id="sk_kdh" class="form-control" data-parsley-required="true" >     											  
</div><div class="col-lg-6">
											
											<div class="input-group date ts_datepicker" data-date-format="yyyy-mm-dd" data-date-autoclose="true">
											 <label for="kode_barang" class="req">Tanggal SK </label>	<input name="tanggal_sk" type="text" class="form-control" id="tanggal_sk" >
												<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
					  </div>  							
                               				  </div>
											</div>
										</div>
										<div class="form-group">
											<div class="row">
											  <div class="col-lg-6">
												<label for="kode_barang" class="req">Jumlah  </label>
											  <input type="text" name="jumlah" id="jumlah" class="form-control" data-parsley-required="true" >								
   											  </div>											  <div class="col-lg-6">
												<label for="kode_barang" class="req">Kondisi</label>
											  <input type="text" name="kondisi" id="kondisi" class="form-control" data-parsley-required="true" >								
   											  </div>
											</div>
										</div>
										<div class="form-group"><div class="row"></div>
										</div>

<div class="form-group">
											<label for="ckeditor_validate" class="req">Keterangan</label>
											<textarea class="form-control" name="keterangan" id="ckeditor_validate" cols="30" rows="4" data-parsley-required="true"></textarea>
										</div>
<div class="form-sep">
											<button class="btn btn-primary">Validate</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		
		</div>
<?php
     break;
  
  // Form Edit Kategori  
  case "editpenggunaan":
    $edit=mysql_query("SELECT * FROM pengguna, barang, subdinas where pengguna.kode_barang=barang.kode_barang AND pengguna.skpd=subdinas.kode_subdinas AND kode_penggunaan='$_GET[id]'");
    $r=mysql_fetch_array($edit);

?>
	<!-- main content -->
		<div id="main_wrapper">
			<div class="page_content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<div class="panel panel-default">
								<div class="panel-heading">Form Edit penggunaan Barang </div>
								<div class="panel-body">
									<form data-parsley-validate action="<?php echo"$aksi?module=penggunaan&act=update"; ?>" method="POST">
																						<div class="form-group">
											<div class="row">
											  <div class="col-lg-6">
												<label for="kode_barang" class="req">Kode Penggunaan </label>
											  <input name="id" type="text" class="form-control"  value="<?php echo"$r[kode_penggunaan]"; ?>" readonly="" data-parsley-required="true" >								
                               				  </div>
									  </div>
	<div class="form-group">
											<div class="row">
											  <div class="col-lg-6">
													<label for="s2_validate" class="req">Lokasi</label>
													<select name="skpd" id="skpd" class="form-control" id="s2_validate" data-parsley-required="true" data-parsley-trigger="change">
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
												</div>                                        <div class="col-lg-6">
                                          <label for="label" class="req">Barang</label>
<select name="kode_barang" id="kode_barang" class="form-control" id="s2_validate" data-parsley-required="true" data-parsley-trigger="change">
<option>--Pilih Barang--</option>
<?php
                 $tampil=mysql_query("SELECT * FROM invesa, barang, subdinas where invesa.skpd=subdinas.kode_subdinas and barang.kode_barang=invesa.kode_barang");

          while($w=mysql_fetch_array($tampil)){
            if ($r[kode_barang]==$w[kode_barang]){
              echo "<option value=$w[kode_barang] selected>$w[nama_barang]</option>";
            }
            else{
              echo "<option value=$w[kode_barang]>$w[nama_barang]</option>";
            }
          }

											  $tampia = mysql_query("SELECT * FROM invesb, barang, subdinas where invesb.skpd=subdinas.kode_subdinas and barang.kode_barang=invesb.kode_barang order by kode_invesb DESC") or die (mysql_error());

          while($w=mysql_fetch_array($tampia)){
            if ($r[kode_barang]==$w[kode_barang]){
              echo "<option value=$w[kode_barang] selected>$w[nama_barang]</option>";
            }
            else{
              echo "<option value=$w[kode_barang]>$w[nama_barang]</option>";
            }
          }





 $tampill = mysql_query("SELECT * FROM invesc, barang, subdinas where invesc.skpd=subdinas.kode_subdinas and barang.kode_barang=invesc.kode_barang   order by kode_invesc DESC") ;
                                              $tampilll = mysql_query("SELECT * FROM invesd, barang, subdinas where invesd.skpd=subdinas.kode_subdinas and barang.kode_barang=invesd.kode_barang order by kode_invesd  order by kode_invesc DESC") ;
                                              $tampillll = mysql_query("SELECT * FROM invese, barang, subdinas where invese.skpd=subdinas.kode_subdinas and barang.kode_barang=invese.kode_barang order by kode_invese DESC") ;
                                              $tampilllll = mysql_query("SELECT * FROM invesf, barang, subdinas where invesf.skpd=subdinas.kode_subdinas and barang.kode_barang=invesf.kode_barang  order by kode_invesf DESC") ;

          while($w=mysql_fetch_array($tampill)){
            if ($r[kode_barang]==$w[kode_barang]){
              echo "<option value=$w[kode_barang] selected>$w[nama_barang]</option>";
            }
            else{
              echo "<option value=$w[kode_barang]>$w[nama_barang]</option>";
            }
          }

          while($w=mysql_fetch_array($tampilll)){
            if ($r[kode_barang]==$w[kode_barang]){
              echo "<option value=$w[kode_barang] selected>$w[nama_barang]</option>";
            }
            else{
              echo "<option value=$w[kode_barang]>$w[nama_barang]</option>";
            }
          }
          while($w=mysql_fetch_array($tampillll)){
            if ($r[kode_barang]==$w[kode_barang]){
              echo "<option value=$w[kode_barang] selected>$w[nama_barang]</option>";
            }
            else{
              echo "<option value=$w[kode_barang]>$w[nama_barang]</option>";
            }
          }

          while($w=mysql_fetch_array($tampilllll)){
            if ($r[kode_barang]==$w[kode_barang]){
              echo "<option value=$w[kode_barang] selected>$w[nama_barang]</option>";
            }
            else{
              echo "<option value=$w[kode_barang]>$w[nama_barang]</option>";
            }
          }

?>
</select>                                </div>

											</div>
										</div>
					<div class="form-group">
											<div class="row">
											  <div class="col-lg-6">
												<label for="kode_barang" class="req">SK KDH  </label>
<input name="sk_kdh" type="text" class="form-control" id="sk_kdh" value="<?php echo"$r[sk_kdh]"; ?>" data-parsley-required="true" >     											  
</div><div class="col-lg-6">
											<div class="input-group date ts_datepicker" data-date-format="yyyy-mm-dd" data-date-autoclose="true">
											 <label for="kode_barang" class="req">Tanggal SK </label>	<input name="tanggal_sk"  value="<?php echo"$r[tanggal_sk]"; ?>" type="text" class="form-control" id="tanggal_sk" >
												<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
					  </div>  					
                               				  </div>
											</div>
										</div>
										<div class="form-group">
											<div class="row">
											  <div class="col-lg-6">
												<label for="kode_barang" class="req">Jumlah  </label>
											  <input name="jumlah" type="text" class="form-control" id="jumlah" value="<?php echo"$r[jumlah]"; ?>" data-parsley-required="true" >								
   											  </div>											  <div class="col-lg-6">
												<label for="kode_barang" class="req">Kondisi</label>
											  <input name="kondisi" type="text" class="form-control" id="kondisi" value="<?php echo"$r[kondisi]"; ?>" data-parsley-required="true" >								
   											  </div>
											</div>
										</div>
										<div class="form-group"><div class="row"></div>
										</div>

<div class="form-group">
											<label for="ckeditor_validate" class="req">Keterangan</label>
											<textarea class="form-control" name="keterangan" id="ckeditor_validate" cols="30" rows="4" data-parsley-required="true"><?php echo"$r[keterangan]"; ?></textarea>
									  </div>
<div class="form-sep">
											<button class="btn btn-primary">Validate</button>
										</div>
									</form>
							</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		
		</div>
<?php
    break;  
}
}
?>
