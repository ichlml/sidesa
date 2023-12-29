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
if ($module=='gunausaha' AND $act=='hapus'){
  mysql_query("DELETE FROM pinjaman WHERE kode_guna='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}

// Input invesf
elseif ($module=='gunausaha' AND $act=='input'){
  		$x="SELECT max(kode_guna) as maxidadmin FROM pinjaman WHERE kode_guna LIKE '$_SESSION[baru]%'";
	$selectidmax=mysql_query($x) or die ("Eror Query".mysql_error()); 

    $hslidmax=mysql_fetch_array($selectidmax);

    $idmax=$hslidmax['maxidadmin'];


    $nourut = (int) substr($idmax, 4,4);

    $nourut++;


    $IDbaru = "$_SESSION[baru]" . sprintf("%04s", "$nourut");

  mysql_query("INSERT INTO pinjaman (kode_guna, skpd, kode_barang, nilai, jangka_waktu, alamat_pihak, keterangan, username, waktu_input) 
   VALUES ('$IDbaru','$_POST[skpda]','$_POST[kode_barang]','$_POST[nilai]','$_POST[jangka_waktu]','$_POST[alamat_pihak]','$_POST[keterangan]','$_SESSION[namauser]','$created_date');") or die (mysql_error());
  header('location:../../media.php?module='.$module);
}

// Update invesf
elseif ($module=='gunausaha' AND $act=='update'){
  mysql_query("UPDATE pinjaman SET  skpd='$_POST[skpda]', kode_barang='$_POST[kode_barang]', nilai='$_POST[nilai]', jangka_waktu='$_POST[jangka_waktu]', alamat_pihak='$_POST[alamat_pihak]', keterangan='$_POST[keterangan]', user_update='$_SESSION[namauser]', waktu_update='$created_date' WHERE kode_guna = '$_POST[id]'") or die (mysql_error());
  header('location:../../media.php?module='.$module);
}
}
?>
