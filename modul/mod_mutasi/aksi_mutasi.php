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
if ($module=='mutasi' AND $act=='hapus'){
  mysql_query("DELETE FROM mutasi_barang WHERE kode_mutasi='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}

// Input invesf
elseif ($module=='mutasi' AND $act=='input'){
  		$x="SELECT max(kode_mutasi) as maxidadmin FROM mutasi_barang WHERE kode_mutasi LIKE '$_SESSION[baru]%'";
	$selectidmax=mysql_query($x) or die ("Eror Query".mysql_error()); 

    $hslidmax=mysql_fetch_array($selectidmax);

    $idmax=$hslidmax['maxidadmin'];


    $nourut = (int) substr($idmax, 4,4);

    $nourut++;


    $IDbaru = "$_SESSION[baru]" . sprintf("%04s", "$nourut");

  mysql_query("INSERT INTO mutasi_barang (kode_mutasi, skpd_awal, skpd_akhir, kode_barang, jumlah, username, waktu_input) 
   VALUES ('$IDbaru','$_POST[skpda]','$_POST[skpd_akhir]','$_POST[kode_barang]','$_POST[jumlah]','$_SESSION[namauser]','$created_date');") or die (mysql_error());
  header('location:../../media.php?module='.$module);
}

// Update invesf
elseif ($module=='mutasi' AND $act=='update'){
  mysql_query("UPDATE mutasi_barang SET  skpd_awal='$_POST[skpda]', kode_barang='$_POST[kode_barang]', skpd_akhir='$_POST[skpd_akhir]', jumlah='$_POST[jumlah]', user_update='$_SESSION[namauser]', waktu_update='$created_date' WHERE kode_mutasi = '$_POST[id]'") or die (mysql_error());
  header('location:../../media.php?module='.$module);
}
}
?>
