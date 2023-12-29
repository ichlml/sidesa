<?php
include "../../config/koneksi.php";
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
?>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
@page{size: auto; margin: 5mm 5mm 5mm 5mm;}
body{margin: 0px;}
</style>
</head>
<body>
<?php
function label_barang($skpd, $ruang,$tahun, $kd_barang, $register, $ket, $page_breaker){
	$arr_kode = explode(' ', $kd_barang);
	$break_page = ($page_breaker>1 AND $page_breaker%16==0) ? "page-break-after:always; " : null ;
?>
<table style="page-break-inside:avoid;page-break-after:auto; white-space:nowrap; width:9.9cm; height:3cm; border:3px solid black; margin-right:0.1cm; margin-bottom:0.5cm; font-family:Arial, Helvetica, sans-serif; font-size:12px" class="col-xs-6" border="1">
  <tbody>
	<tr style="height:1cm; font-family:Arial, Helvetica, sans-serif; font-size:20px">
		<td style="width:1.5cm; height:2cm" rowspan="2"><img src="../../images/images_login/LOGO-KABUPATEN-KUDUS.png" width="100%" height="100%"></td>
		<td style="text-align:center; font-weight:bold">11.23.<?php echo $skpd; ?>.<?php echo $ruang; ?>.<?php echo $tahun; ?></td>
	</tr>
	<tr style="height:1cm; font-family:Arial, Helvetica, sans-serif; font-size:20px">
		<td style="text-align:center; font-weight:bold">
			<?php echo	str_pad($arr_kode[0], 2, "0", STR_PAD_LEFT) . "." . 
						str_pad($arr_kode[1], 2, "0", STR_PAD_LEFT) . "." . 
						str_pad($arr_kode[2], 2, "0", STR_PAD_LEFT) . "." . 
						str_pad($arr_kode[3], 2, "0", STR_PAD_LEFT) . "." . 
						str_pad($register, 3, "0", STR_PAD_LEFT) ."&nbsp;&nbsp;&nbsp;" ;
			?>
		</td>
	</tr>
	<tr style="height:5mm; font-family:Arial, Helvetica, sans-serif; font-size:14px">
	<?php
	if($_SESSION['level']=='admin' OR $_SESSION['upt']){
	$nama_subdinas1 = mysql_fetch_array( mysql_query("SELECT * FROM subdinas WHERE kode_subdinas = '$_SESSION[DATA_LABEL_SUBDINAS]' ") );
	$nama_subdinas="$nama_subdinas1[nama_subdinas]";
	 } else{
	$nama_subdinas1 = mysql_fetch_array( mysql_query("SELECT * FROM subdinas WHERE kode_subdinas = '$_SESSION[dinas]' ") );
	$nama_subdinas="$nama_subdinas1[nama_subdinas]";
	}
	?>	
	<td colspan="2" style="text-align:center; font-weight:bold"><?php echo $nama_subdinas; ?> </td>
	</tr>
	<tr style="height:5mm; max-width:10cm; font-family:Arial, Helvetica, sans-serif; font-size:10px">
		<td colspan="2" style="text-align:right"> <?php echo $ket; ?> </td>
	</tr>
  </tbody>
</table>
<?php
}
	// $_GET['kode_subdinas'] dan $_GET['id_invesb']
	$data_subdinas = mysql_fetch_array( mysql_query("SELECT * FROM subdinas WHERE subdinas.kode_subdinas = '$_SESSION[DATA_LABEL_SUBDINAS]' ") );
	$kecamatan1="$data_subdinas[kd_unit]";
	$kecamatan=str_pad($kecamatan1, 4, "0", STR_PAD_LEFT) ;
	$skpd = "$kecamatan.$data_subdinas[kd_upb]";
	$tahun= substr($_SESSION['tahun'],0);
	if(isset($_SESSION['DATA_LABEL_CETAK'])){
		// all row
		$daftar_barang = mysql_query("SELECT invesb.ruang, invesb.register, invesb.keterangan, barang.kode_barang, barang.nama_barang FROM invesb, barang 
			WHERE invesb.skpd = '$_SESSION[DATA_LABEL_SUBDINAS]' AND invesb.kode_barang = barang.kode_barang AND invesb.tanggal_pembelian like '$_SESSION[tahun]%' ");
	} else {
		$daftar_id_barang = "'".implode("', '", $_SESSION['DATA_LABEL_BARANG'])."'";
		// get row by id_barang
		$daftar_barang = mysql_query("SELECT invesb.ruang, invesb.register, invesb.keterangan, barang.kode_barang, barang.nama_barang FROM invesb, barang 
			WHERE invesb.id_invesb IN ($daftar_id_barang) AND invesb.kode_barang = barang.kode_barang ");
	}
	$page_breaker = 0;
	// echo "<div class='row'>";
	while($data_barang=mysql_fetch_array($daftar_barang)){
		
		$kd_barang = $data_barang['kode_barang'] ;
		$ruang1 = $data_barang['ruang'] ;
		$ruang = str_pad($ruang1, 2, "0", STR_PAD_LEFT) ;
		$register = $data_barang['register'] ;
		$ket = "&nbsp; ".$data_barang['keterangan']." &nbsp;";
		
			label_barang($skpd,$ruang,$tahun, $kd_barang,$register,$ket,$page_breaker);
		}
	
	// echo "</div>";
echo "</body>";
}
?>
