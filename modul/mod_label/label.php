<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/mod_label/cetak_label.php";

if(isset($_SESSION['DATA_LABEL_SUBDINAS'])) {unset($_SESSION['DATA_LABEL_SUBDINAS']);}
if(isset($_SESSION['DATA_LABEL_BARANG'])) {unset($_SESSION['DATA_LABEL_BARANG']);}
if(isset($_SESSION['DATA_LABEL_CETAK'])) {unset($_SESSION['DATA_LABEL_CETAK']);}

// if set _POST
if (isset($_POST['idbarang'])){
	$_SESSION['DATA_LABEL_SUBDINAS'] = $_POST['skpd'];
	$_SESSION['DATA_LABEL_BARANG'] = $_POST['idbarang'];
	echo '<iframe src="modul/mod_label/cetak_label.php" style="display:none;" name="frame"></iframe>';
	echo "<script> $(document).ready(function() { frames['frame'].print(); }); </script>";
}
if (isset($_GET['cetak'])){
	$_SESSION['DATA_LABEL_CETAK'] = $_GET['cetak'];
	$_SESSION['DATA_LABEL_SUBDINAS'] = $_GET['skpd'];
	echo '<iframe src="modul/mod_label/cetak_label.php" style="display:none;" name="frame"></iframe>';
	echo "<script> $(document).ready(function() { frames['frame'].print(); }); </script>";
}

switch($_GET['act']){
  // Tampil Tag
  default:

	if ($_SESSION['level']=='admin' OR $_SESSION['upt']){ 
		if( isset($_SESSION['judul_header']) ){
			unset($_SESSION['judul_header']);
		}
	}

?>
<style type="text/css">
	body table, th {
		text-align: center;
	}
</style>

<!-- Page container -->
 	<div class="page-container">


		<!-- Page content -->
	 	<div class="page-content">


<br/><br/><br/>			<!-- /page header -->


			<!-- Breadcrumbs line -->
			<!-- /breadcrumbs line -->

		<!-- main content -->
<center>	<h3>CETAK LABEL BARANG : 
<?php if($_SESSION['level']=='admin' OR $_SESSION['upt']){
	echo "( belum pilih UPB )";
}else{echo $_SESSION['nama_sub'];}
?><br/>TAHUN ANGGARAN <?php echo $_SESSION['tahun']; ?></h3></center>

<hr>

<?php
if ($_SESSION['level']=='admin' OR $_SESSION['upt']){
		$kode_subdinas = "JOKER";
} else {
		$kode_subdinas = "$_SESSION[dinas]";
}
?>
<form method="POST" action="?module=label">

<input type="hidden" name="skpd" value="<?php echo $kode_subdinas; ?>"  />

	<table width="100%" border="1" style="white-space:nowrap">
	<tbody>
	<tr style="text-align:center">
		<th> Pilih Semua <br/> <input id="cek_semua" type="checkbox"></input> </th>
		<th> Register </th>
		<th> Kode Barang </th>
		<th> Nama Barang / Keterangan </th>
		<th> Jumlah </th>
	</tr>
<?php
	$daftar_barang = mysql_query("SELECT invesb.id_invesb, invesb.register, invesb.jumlah, invesb.keterangan, barang.kode_barang, barang.nama_barang FROM invesb, barang 
		WHERE invesb.status_penggunaan=1 and invesb.skpd = '$kode_subdinas' AND invesb.kode_barang = barang.kode_barang AND invesb.tanggal_pembelian like '$_SESSION[tahun]%' 
		order by invesb.kode_barang, invesb.register ");

	while($barang=mysql_fetch_array($daftar_barang)){
?>
	<tr style="text-align:center">
		<td>
			<input name="idbarang[]" type="checkbox" class="pilih_barang" value="<?php echo $barang['id_invesb']; ?>"></input>
		</td>
		<td> <?php echo $barang['register']; ?> </td>
		<td> <?php echo $barang['kode_barang']; ?> </td>
		<td> <?php echo $barang['nama_barang']." &nbsp;/&nbsp; ket: [ ".$barang['keterangan']." ]"; ?> </td>
		<td> <?php echo $barang['jumlah']; ?> </td>
	</tr>
<?php
	}
?>
	</tbody>
	</table>
	<br/><br/><br/>

			<div class="form-actions text-right">
<?php
if ($_SESSION['level']=='admin' OR $_SESSION['upt']){
?>
			<a href="#default-modal" data-toggle="modal" class="btn btn-primary">Search</a>
<?php } else { ?>
			<input type="submit" value="Cetak Label Pilihan" class="btn btn-primary">
			<a href="?module=label&cetak=semua&skpd=<?php echo urlencode($kode_subdinas);?>" class="btn btn-primary">Cetak Semua Label Barang UPB</a>
<?php } ?>
			</div>
</form>
<script>
	document.getElementById('cek_semua').onchange = function () {
		var cekvalue = this.checked;

		var targetboxes = document.getElementsByClassName('pilih_barang');
		for(var index in targetboxes){
			//cek-uncek each checkbox
			targetboxes[index].checked = cekvalue;
		}
	}
</script>

<br/>


            <!-- Default modal -->            <!-- Default modal -->
			<div id="default-modal" class="modal fade" tabindex="-1" role="dialog">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title">Search Form</h4>
						</div>

				        <!-- New invoice template -->
				        <div class="panel">
							<div class="panel-body">

					    <!-- Form validation -->
            <form class="form-horizontal validate" method="GET"  role="form">
	            <input type="hidden" name="act" value="cari"  />
                <input type="hidden" name="module" value="label"  />
                <div class="block">
	                <h6 class="heading-hr"><i class="icon-checkmark-circle"></i> Search Form</h6>


					<div class="form-group">
                                
                                
					  <div class="col-sm-12"> SKPD 
                        <label>:</label>
 <select name="skpd" class="select-full" id="skpd" tabindex="2" data-placeholder="Pilih SKPD...">
 <?php 
	 if ($_SESSION['level']=='admin' OR $_SESSION['upt']){ 
			$somevariabelsubdinas = ($_SESSION['level']=='admin') ? null : "WHERE kd_sub = '$_SESSION[kdsub]'" ;
			$somevariabelquery = "SELECT * FROM subdinas ".$somevariabelsubdinas." ORDER BY nama_subdinas ";
		    $tampil = mysql_query($somevariabelquery);
            while($r=mysql_fetch_array($tampil)){
              echo "<option value='".urlencode($r['kode_subdinas'])."'>$r[nama_subdinas]</option>";
            }
	 }
?>
			</select>

		                      </div>
					</div>
                    

                    <div class="form-actions text-right">
                    	<input type="submit" value="Search" class="btn btn-primary">
                    </div>
                    
                </div>
            </form>
			<!-- /new invoice template -->
</div></div>
						
					</div>
				</div>
			</div>
			<!-- /default modal -->
            
            
<?php
    break;


	case "cari":
if ($_SESSION['level']=='admin' OR $_SESSION['upt']){

?>

<style type="text/css">
	body table, th {
		text-align: center;
	}
</style>

<!-- Page container -->
 	<div class="page-container">


		<!-- Page content -->
	 	<div class="page-content">


<br/><br/><br/>			<!-- /page header -->


			<!-- Breadcrumbs line -->
			<!-- /breadcrumbs line -->

		<!-- main content -->
<center>	<h3>CETAK LABEL BARANG : <?php echo mysql_fetch_array(mysql_query("select nama_subdinas from subdinas where kode_subdinas = '".urldecode($_GET['skpd'])."' "))['nama_subdinas']; ?><br/>
TAHUN ANGGARAN <?php echo $_SESSION['tahun']; ?></h3></center>

<hr>

<?php
		$kode_subdinas = urldecode($_GET['skpd']);
?>
<form method="POST" action="?act=cari&module=label&skpd=<?php echo $_GET['skpd'];?>">

<input type="hidden" name="skpd" value="<?php echo $kode_subdinas; ?>"  />

	<table width="100%" border="1" style="white-space:nowrap">
	<tbody>
	<tr style="text-align:center">
		<th> Pilih Semua <br/> <input id="cek_semua" type="checkbox"></input> </th>
		<th> No. </th>
		<th> Kode Barang </th>
		<th> Nama Barang / Keterangan </th>
		<th> Jumlah </th>
	</tr>
<?php
	$daftar_barang = mysql_query("SELECT invesb.id_invesb, invesb.register, invesb.jumlah, invesb.keterangan, barang.kode_barang, barang.nama_barang FROM invesb, barang 
		WHERE invesb.skpd = '$kode_subdinas' AND invesb.kode_barang = barang.kode_barang AND invesb.tanggal_pembelian like '$_SESSION[tahun]%'
	order by invesb.kode_barang, invesb.register ");
	$nomor_barang = 1;
	while($barang=mysql_fetch_array($daftar_barang)){
?>
	<tr style="text-align:center">
		<td>
			<input name="idbarang[]" type="checkbox" class="pilih_barang" value="<?php echo $barang['id_invesb']; ?>"></input>
		</td>
		<td> <?php echo $barang['register']; ?> </td>
		<td> <?php echo $barang['kode_barang']; ?> </td>
		<td> <?php echo $barang['nama_barang']." &nbsp;/&nbsp; ket: [ ".$barang['keterangan']." ]"; ?> </td>
		<td> <?php echo $barang['jumlah']; ?> </td>
	</tr>
<?php
		$nomor_barang++;
	}
?>
	</tbody>
	</table>
	<br/><br/><br/>

	<div class="form-actions text-right">
			<input type="submit" value="Cetak Label Pilihan" class="btn btn-primary">
			<a href="#default-modal" data-toggle="modal" class="btn btn-primary">Search</a>
			<a href="?module=label&cetak=semua&skpd=<?php echo $_GET['skpd'];?>" class="btn btn-primary">Cetak Semua Label Barang UPB</a>
	</div>
</form>
<script>
	document.getElementById('cek_semua').onchange = function () {
		var cekvalue = this.checked;

		var targetboxes = document.getElementsByClassName('pilih_barang');
		for(var index in targetboxes){
			//cek-uncek each checkbox
			targetboxes[index].checked = cekvalue;
		}
	}
</script>
<br/>


            <!-- Default modal -->            <!-- Default modal -->
			<div id="default-modal" class="modal fade" tabindex="-1" role="dialog">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title">Search Form</h4>
						</div>

				        <!-- New invoice template -->
				        <div class="panel">
							<div class="panel-body">

					    <!-- Form validation -->
            <form class="form-horizontal validate" method="GET"  role="form">
	            <input type="hidden" name="act" value="cari"  />
                <input type="hidden" name="module" value="label"  />
                <div class="block">
	                <h6 class="heading-hr"><i class="icon-checkmark-circle"></i> Search Form</h6>


					<div class="form-group">
                                
                                
					  <div class="col-sm-12"> SKPD 
                        <label>:</label>
 <select name="skpd" class="select-full" id="skpd" tabindex="2" data-placeholder="Pilih SKPD...">
 <?php 
	 if ($_SESSION['level']=='admin' OR $_SESSION['upt']){ 
			$somevariabelsubdinas = ($_SESSION['level']=='admin') ? null : "WHERE kd_sub = '$_SESSION[kdsub]'" ;
			$somevariabelquery = "SELECT * FROM subdinas ".$somevariabelsubdinas." ORDER BY nama_subdinas ";
		    $tampil = mysql_query($somevariabelquery);
            while($r=mysql_fetch_array($tampil)){
              echo "<option value='".urlencode($r['kode_subdinas'])."'>$r[nama_subdinas]</option>";
            }
	 }
?>
			</select>

		                      </div>
					</div>
                    

                    <div class="form-actions text-right">
                    	<input type="submit" value="Search" class="btn btn-primary">
                    </div>
                    
                </div>
            </form>
			<!-- /new invoice template -->
</div></div>
						
					</div>
				</div>
			</div>
			<!-- /default modal -->
            
            
<?php
}    break;
}
}
?>
