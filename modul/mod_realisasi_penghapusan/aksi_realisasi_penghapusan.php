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
if ($module=='realisasi_penghapusan' AND $act=='hapus'){
  mysql_query("DELETE FROM realisasi_penghapusan WHERE kode_realisasi_penghapusan='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}

// Input invesf
elseif ($module=='realisasi_penghapusan' AND $act=='input'){
  		$x="SELECT max(kode_realisasi_penghapusan) as maxidadmin FROM realisasi_penghapusan WHERE kode_realisasi_penghapusan LIKE '$_SESSION[baru]%'";
	$selectidmax=mysql_query($x) or die ("Eror Query".mysql_error()); 

    $hslidmax=mysql_fetch_array($selectidmax);

    $idmax=$hslidmax['maxidadmin'];


    $nourut = (int) substr($idmax, 4,4);

    $nourut++;


    $IDbaru = "$_SESSION[baru]" . sprintf("%04s", "$nourut");

  mysql_query("INSERT INTO realisasi_penghapusan (kode_realisasi_penghapusan, skpd, kode_barang, no_skph, jumlah, kondisi,keterangan, username, waktu_input)
   VALUES ('$IDbaru','$_POST[skpda]','$_POST[kode_barang]','$_POST[no_skph]','$_POST[jumlah]','$_POST[kondisi]','$_POST[keterangan]','$_SESSION[namauser]','$created_date');") or die (mysql_error());
  header('location:../../media.php?module='.$module);
}

// Update invesf
elseif ($module=='realisasi_penghapusan' AND $act=='update'){
  mysql_query("UPDATE realisasi_penghapusan SET  skpd='$_POST[skpda]', kode_barang='$_POST[kode_barang]', no_skph='$_POST[no_skph]', jumlah='$_POST[jumlah]', kondisi='$_POST[kondisi]',keterangan='$_POST[keterangan]', user_update='$_SESSION[namauser]', waktu_update='$created_date' WHERE kode_realisasi_penghapusan = '$_POST[id]'") or die (mysql_error());
  header('location:../../media.php?module='.$module);
}
}
?>
