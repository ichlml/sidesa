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
if ($module=='keluar' AND $act=='hapus'){
  mysql_query("DELETE FROM keluar WHERE kode_keluar='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}

// Input invesf
elseif ($module=='keluar' AND $act=='input'){
  		$x="SELECT max(kode_keluar) as maxidadmin FROM keluar WHERE kode_keluar LIKE '$_SESSION[baru]%'";
	$selectidmax=mysql_query($x) or die ("Eror Query".mysql_error()); 

    $hslidmax=mysql_fetch_array($selectidmax);

    $idmax=$hslidmax['maxidadmin'];


    $nourut = (int) substr($idmax, 4,4);

    $nourut++;


    $IDbaru = "$_SESSION[baru]" . sprintf("%04s", "$nourut");

  mysql_query("INSERT INTO keluar (kode_keluar, skpd, kode_barang, harga, jumlah, nilai, tanggal_keluar, tanggal_kembali, keterangan, username, waktu_input) 
   VALUES ('$IDbaru','$_POST[skpda]','$_POST[kode_barang]','$_POST[harga]','$_POST[jumlah]','$_POST[nilai]','$_POST[tanggal_keluar]','$_POST[tanggal_kembali]','$_POST[keterangan]','$_SESSION[namauser]','$created_date');") or die (mysql_error());
  header('location:../../media.php?module='.$module);
}

// Update invesf
elseif ($module=='keluar' AND $act=='update'){
  mysql_query("UPDATE keluar SET  skpd='$_POST[skpda]', kode_barang='$_POST[kode_barang]', harga='$_POST[harga]', jumlah='$_POST[jumlah]', nilai='$_POST[nilai]', tanggal_keluar='$_POST[tanggal_keluar]', tanggal_kembali='$_POST[tanggal_kembali]', keterangan='$_POST[keterangan]', user_update='$_SESSION[namauser]', waktu_update='$created_date' WHERE kode_keluar = '$_POST[id]'") or die (mysql_error());
  header('location:../../media.php?module='.$module);
}
}
?>
