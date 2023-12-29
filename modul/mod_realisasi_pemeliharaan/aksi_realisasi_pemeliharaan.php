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

// Hapus realisasi_pemeliharaan
if ($module=='realisasi_pemeliharaan' AND $act=='hapus'){
  mysql_query("DELETE FROM realisasi_pemeliharaan WHERE kode_realisasi='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}

// Input realisasi_pemeliharaan
elseif ($module=='realisasi_pemeliharaan' AND $act=='input'){
  		$x="SELECT max(kode_realisasi) as maxidadmin FROM realisasi_pemeliharaan WHERE kode_realisasi LIKE '$_SESSION[baru]%'";
	$selectidmax=mysql_query($x) or die ("Eror Query".mysql_error()); 

    $hslidmax=mysql_fetch_array($selectidmax);

    $idmax=$hslidmax['maxidadmin'];


    $nourut = (int) substr($idmax, 4,4);

    $nourut++;


    $IDbaru = "$_SESSION[baru]" . sprintf("%04s", "$nourut");

  mysql_query("INSERT INTO realisasi_pemeliharaan (kode_realisasi, skpd, kode_barang, uraian, rekanan, tanggal, biaya, bukti, keterangan, username, waktu_input)
   VALUES ('$IDbaru','$_POST[skpda]','$_POST[kode_barang]','$_POST[uraian]','$_POST[rekanan]','$_POST[tanggal]','$_POST[biaya]','$_POST[bukti]','$_POST[keterangan]','$_SESSION[namauser]','$created_date');") or die (mysql_error());
  header('location:../../media.php?module='.$module);
}

// Update realisasi_pemeliharaan
elseif ($module=='realisasi_pemeliharaan' AND $act=='update'){
  mysql_query("UPDATE realisasi_pemeliharaan SET  skpd='$_POST[skpda]', kode_barang='$_POST[kode_barang]', uraian='$_POST[uraian]', rekanan='$_POST[rekanan]', tanggal='$_POST[uraian]', biaya='$_POST[biaya]', bukti='$_POST[bukti]', keterangan='$_POST[keterangan]', username='$_SESSION[namauser]', waktu_input='$created_date' WHERE kode_realisasi = '$_POST[id]'") or die (mysql_error());
  header('location:../../media.php?module='.$module);
}
}
?>
