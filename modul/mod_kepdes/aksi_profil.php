<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
include "../../config/koneksi.php";
include "../../config/library.php";
include "../../config/fungsi_thumb.php";
include "../../config/excel_reader2.php";
		$created_date = date('Y-m-d H:i:s');

$module=$_GET['module'];
$act=$_GET['act'];

function anti_injection($data){
  $filter = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter;
}

if ($module=='profil' AND $act=='update'){
	mysql_query("UPDATE subdinas SET nama_kepala='$_POST[nama]', nip='$_POST[nip]', alamat_subdinas='$_POST[alamat]', telepon='$_POST[telepon]', user_update='$_SESSION[namauser]', waktu_input='$created_date' WHERE username = '$_POST[username]'") or die (mysql_error());
	header('location:../../media.php?module=kepsek&code=3');
}
}
?>
