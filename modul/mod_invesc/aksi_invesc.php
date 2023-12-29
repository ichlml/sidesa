<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
include "../../config/koneksi.php";
include "../../config/fungsi_thumb.php";
include "../../config/fungsi_seo.php";

$module=$_GET[module];
$act=$_GET[act];
		$created_date = date('Y-m-d H:i:s');
if ($_SESSION['level']=='admin'){
// Hapus invesc
if ($module=='bangunan' AND $act=='hapus'){
    mysql_query("DELETE FROM invesc WHERE id_invesc ='$_GET[id]'");  
     
 header('location:../../media.php?module=bangunan&code=2');
}

// Input invesc
elseif ($module=='bangunan' AND $act=='input'){
$tanggal = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['tanggal'],ENT_QUOTES))));
$kode_barang = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['kode_barang'],ENT_QUOTES))));
$skpd = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['skpd'],ENT_QUOTES))));
$tingkat = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['tingkat'],ENT_QUOTES))));
$beton = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['beton'],ENT_QUOTES))));
$luas = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['luas'],ENT_QUOTES))));
$kondisi = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['kondisi'],ENT_QUOTES))));
$harga = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['harga'],ENT_QUOTES))));
$jumlah = 1;
$jml_input = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['jumlah'],ENT_QUOTES))));
$sumber = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['sumber'],ENT_QUOTES))));
$keterangan = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['keterangan'],ENT_QUOTES))));
   $harga = str_replace(".","",$harga);
   $status_penggunaan = 1;

   
  for ($i=1; $i<=$jml_input;$i++) {
   $register1= mysql_query("select max(register) as max_reg from invesc where kode_barang='$_POST[kode_barang]' and skpd='$_SESSION[dinas]';");
   $register2= mysql_fetch_array($register1);
   $register3= (int) $register2 ['max_reg'];
   $register=$register3+1;

mysql_query("INSERT INTO invesc ( register, skpd, kode_barang, tanggal_pembelian, kondisi_tingkat, kondisi_beton, luas, kondisi,jumlah, harga, sumber_dana, keterangan, username, waktu_input)  VALUES 
('$register','$skpd','$kode_barang','$tanggal','$tingkat','$beton','$luas','$kondisi','$jumlah','$harga','$sumber','$keterangan','$_SESSION[namauser]','$_POST[waktu_input]');")or die (mysql_error());
    $cek = mysql_fetch_array(mysql_query(" select * from invesc where kode_barang = '$kode_barang' order by id_invesc DESC "));






 header('location:../../media.php?module=bangunan&act=tambahbangunan&code=1');
} 
}
// Update invesc
elseif ($module=='bangunan' AND $act=='update'){
$tanggal = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['tanggal'],ENT_QUOTES))));
$kode_barang = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['kode_barang'],ENT_QUOTES))));
$skpd = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['skpd'],ENT_QUOTES))));
$tingkat = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['tingkat'],ENT_QUOTES))));
$beton = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['beton'],ENT_QUOTES))));
$luas = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['luas'],ENT_QUOTES))));
$kondisi = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['kondisi'],ENT_QUOTES))));
$harga = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['harga'],ENT_QUOTES))));
$sumber = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['sumber'],ENT_QUOTES))));
$keterangan = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['keterangan'],ENT_QUOTES))));
   $harga = str_replace(".","",$harga);

  mysql_query("UPDATE invesc SET skpd = '$skpd', kode_barang = '$kode_barang', tanggal_pembelian = '$tanggal', kondisi = '$kondisi', kondisi_tingkat = '$tingkat' , kondisi_beton = '$beton' , luas = '$luas' , harga = '$harga' , sumber_dana = '$sumber' , keterangan = '$keterangan' , user_update='$_SESSION[namauser]', waktu_update='$_POST[waktu_update]' WHERE id_invesc = '$_POST[id]'");

 

  header('location:../../media.php?module=bangunan&code=4');
}
} else {
if ($module=='bangunan' AND $act=='hapus'){
    mysql_query("DELETE FROM invesc WHERE id_invesc ='$_GET[id]' and skpd = '$_SESSION[dinas]' ");  
    
 header('location:../../media.php?module=bangunan&code=2');
}

// Input invesc
elseif ($module=='bangunan' AND $act=='input'){
$tanggal = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['tanggal'],ENT_QUOTES))));
$kode_barang = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['kode_barang'],ENT_QUOTES))));
$skpd = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['skpd'],ENT_QUOTES))));
$tingkat = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['tingkat'],ENT_QUOTES))));
$beton = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['beton'],ENT_QUOTES))));
$luas = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['luas'],ENT_QUOTES))));
$kondisi = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['kondisi'],ENT_QUOTES))));
$harga = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['harga'],ENT_QUOTES))));
$jumlah = 1;
$jml_input = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['jumlah'],ENT_QUOTES))));
$sumber = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['sumber'],ENT_QUOTES))));
$keterangan = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['keterangan'],ENT_QUOTES))));
   $harga = str_replace(".","",$harga);
   $status_penggunaan = 1;

   
  for ($i=1; $i<=$jml_input;$i++) {
   $register1= mysql_query("select max(register) as max_reg from invesc where kode_barang='$_POST[kode_barang]' and skpd='$_SESSION[dinas]';");
   $register2= mysql_fetch_array($register1);
   $register3= (int) $register2 ['max_reg'];
   $register=$register3+1;
   
mysql_query("INSERT INTO invesc ( register, skpd, kode_barang, tanggal_pembelian, kondisi_tingkat, kondisi_beton, luas, kondisi,jumlah, harga, sumber_dana, keterangan, username, waktu_input)  VALUES 
('$register','$_SESSION[dinas]','$kode_barang','$tanggal','$tingkat','$beton','$luas','$kondisi','$jumlah','$harga','$sumber','$keterangan','$_SESSION[namauser]','$_POST[waktu_input]');")or die (mysql_error());
     $cek = mysql_fetch_array(mysql_query(" select * from invesc where kode_barang = '$kode_barang' order by id_invesc DESC "));


 header('location:../../media.php?module=bangunan&act=tambahbangunan&code=1');
} 
}
// Update invesc
elseif ($module=='bangunan' AND $act=='update'){
$tanggal = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['tanggal'],ENT_QUOTES))));
$kode_barang = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['kode_barang'],ENT_QUOTES))));
$skpd = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['skpd'],ENT_QUOTES))));
$tingkat = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['tingkat'],ENT_QUOTES))));
$beton = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['beton'],ENT_QUOTES))));
$luas = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['luas'],ENT_QUOTES))));
$kondisi = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['kondisi'],ENT_QUOTES))));
$harga = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['harga'],ENT_QUOTES))));
$sumber = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['sumber'],ENT_QUOTES))));
$keterangan = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['keterangan'],ENT_QUOTES))));
   $harga = str_replace(".","",$harga);

  mysql_query("UPDATE invesc SET kode_barang = '$kode_barang', tanggal_pembelian = '$tanggal', kondisi = '$kondisi', kondisi_tingkat = '$tingkat' , kondisi_beton = '$beton' , luas = '$luas' , harga = '$harga' , sumber_dana = '$sumber' , keterangan = '$keterangan' , user_update='$_SESSION[namauser]', waktu_update='$_POST[waktu_update]' WHERE id_invesc = '$_POST[id]' and skpd = '$_SESSION[dinas]' ");

  



  header('location:../../media.php?module=bangunan&code=4');
}
	
	
}
}
?>
