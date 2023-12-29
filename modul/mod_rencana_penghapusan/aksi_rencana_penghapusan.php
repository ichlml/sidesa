<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
include "../../config/koneksi.php";
include "../../config/fungsi_seo.php";
		$created_date = date('Y-m-d H:i:s');

$module=$_GET[module];
$act=$_GET[act];

// Hapus invesf
if ($module=='rencana_penghapusan' AND $act=='hapus'){
  mysql_query("DELETE FROM rencana_penghapusan WHERE kode_rencana='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}

// Input invesf
elseif ($module=='rencana_penghapusan' AND $act=='input'){
  		$x="SELECT max(kode_rencana) as maxidadmin FROM rencana_penghapusan WHERE kode_rencana LIKE '$_SESSION[baru]%'";
	$selectidmax=mysql_query($x) or die ("Eror Query".mysql_error()); 

    $hslidmax=mysql_fetch_array($selectidmax);

    $idmax=$hslidmax['maxidadmin'];


    $nourut = (int) substr($idmax, 4,4);

    $nourut++;


    $IDbaru = "$_SESSION[baru]" . sprintf("%04s", "$nourut");

  mysql_query("INSERT INTO rencana_penghapusan (kode_rencana, skpd, kode_barang, jumlah, kondisi, username, waktu_input)
   VALUES ('$IDbaru','$_POST[skpda]','$_POST[kode_barang]','$_POST[jumlah]','$_POST[kondisi]','$_SESSION[namauser]','$created_date');") or die (mysql_error());
  header('location:../../media.php?module='.$module);
}

// Update invesf
elseif ($module=='rencana_penghapusan' AND $act=='update'){
  mysql_query("UPDATE rencana_penghapusan SET  skpd='$_POST[skpda]', kode_barang='$_POST[kode_barang]', jumlah='$_POST[jumlah]', kondisi='$_POST[kondisi]', user_update='$_SESSION[namauser]', waktu_update='$created_date' WHERE kode_rencana = '$_POST[id]'") or die (mysql_error());
  header('location:../../media.php?module='.$module);
}
}
?>
