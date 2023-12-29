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
if ($module=='penggunaan' AND $act=='hapus'){
  mysql_query("DELETE FROM pengguna WHERE kode_penggunaan='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}

// Input invesf
elseif ($module=='penggunaan' AND $act=='input'){
  		$x="SELECT max(kode_penggunaan) as maxidadmin FROM pengguna WHERE kode_penggunaan LIKE '$_SESSION[baru]%'";
	$selectidmax=mysql_query($x) or die ("Eror Query".mysql_error()); 

    $hslidmax=mysql_fetch_array($selectidmax);

    $idmax=$hslidmax['maxidadmin'];


    $nourut = (int) substr($idmax, 4,4);

    $nourut++;


    $IDbaru = "$_SESSION[baru]" . sprintf("%04s", "$nourut");

  mysql_query("INSERT INTO pengguna (kode_penggunaan, skpd, kode_barang, sk_kdh, tanggal_sk, jumlah, kondisi, keterangan, username, waktu_input)
   VALUES ('$IDbaru','$_POST[skpda]','$_POST[kode_barang]','$_POST[sk_kdh]','$_POST[tanggal_sk]','$_POST[jumlah]','$_POST[kondisi]','$_POST[keterangan]','$_SESSION[namauser]','$created_date');") or die (mysql_error());
  header('location:../../media.php?module='.$module);
}

// Update invesf
elseif ($module=='penggunaan' AND $act=='update'){
  mysql_query("UPDATE pengguna SET  skpd='$_POST[skpda]', kode_barang='$_POST[kode_barang]', sk_kdh='$_POST[sk_kdh]', tanggal_sk='$_POST[tanggal_sk]', jumlah='$_POST[jumlah]',kondisi='$_POST[kondisi]', keterangan='$_POST[keterangan]', user_update='$_SESSION[namauser]', waktu_update='$created_date' WHERE kode_penggunaan = '$_POST[id]'") or die (mysql_error());
  header('location:../../media.php?module='.$module);
}
}
?>
