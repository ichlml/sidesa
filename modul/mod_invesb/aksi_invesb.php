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

// Hapus invesb
if ($module=='alatangkut' AND $act=='hapus'){
    mysql_query("DELETE FROM invesb WHERE id_invesb ='$_GET[id]'");  

  header('location:../../media.php?module=alatangkut&code=2');
}

// Input invesb
elseif ($module=='alatangkut' AND $act=='input'){
$tanggal = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['tanggal'],ENT_QUOTES))));
$kode_barang = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['kode_barang'],ENT_QUOTES))));
$skpd = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['skpd'],ENT_QUOTES))));
$merk = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['merk'],ENT_QUOTES))));
$type = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['type'],ENT_QUOTES))));
$ruang = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['ruang'],ENT_QUOTES))));
$kondisi = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['kondisi'],ENT_QUOTES))));
$jumlah = 1;
$jml_input = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['jumlah'],ENT_QUOTES))));
$harga = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['harga'],ENT_QUOTES))));
$sumber = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['sumber'],ENT_QUOTES))));
$keterangan = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['keterangan'],ENT_QUOTES))));
$bahan = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['bahan'],ENT_QUOTES))));
  $harga = str_replace(".","",$harga);
  $status_penggunaan = 1;

  for ($i=1; $i<=$jml_input;$i++) {
    $register1= mysql_query("select max(register) as max_reg from invesb where kode_barang='$_POST[kode_barang]' and skpd='$_SESSION[dinas]';");
    $register2= mysql_fetch_array($register1);
    $register3= (int) $register2 ['max_reg'];
    $register=$register3+1;

  mysql_query("INSERT INTO invesb ( register, bahan, tanggal_pembelian, skpd, kode_barang, merk, type, ruang, kondisi,jumlah, harga, sumber_dana, keterangan, username, waktu_input)
   VALUES ('$register','$bahan','$tanggal','$skpd','$kode_barang','$merk','$type','$ruang','$kondisi','$jumlah','$harga','$sumber','$keterangan','$_SESSION[namauser]','$created_date');") or die (mysql_error());

   $cek = mysql_fetch_array(mysql_query(" select * from invesb where kode_barang = '$kode_barang' order by id_invesb DESC "));



  header('location:../../media.php?module=alatangkut&act=tambahalatangkut&code=1');
}
}
// Update invesb
elseif ($module=='alatangkut' AND $act=='update'){
$tanggal = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['tanggal'],ENT_QUOTES))));
$kode_barang = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['kode_barang'],ENT_QUOTES))));
$skpd = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['skpd'],ENT_QUOTES))));
$merk = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['merk'],ENT_QUOTES))));
$type = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['type'],ENT_QUOTES))));
$ruang = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['ruang'],ENT_QUOTES))));
$kondisi = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['kondisi'],ENT_QUOTES))));
$harga = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['harga'],ENT_QUOTES))));
$sumber = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['sumber'],ENT_QUOTES))));
$keterangan = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['keterangan'],ENT_QUOTES))));
$bahan = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['bahan'],ENT_QUOTES))));
   $harga = str_replace(".","",$harga);
 mysql_query("UPDATE invesb SET bahan = '$bahan', tanggal_pembelian = '$tanggal', kondisi = '$kondisi', skpd ='$skpd', kode_barang = '$kode_barang', merk = '$merk', type = '$type', ruang = '$ruang', harga = '$harga' , sumber_dana = '$sumber' , keterangan = '$keterangan' ,  user_update='$_SESSION[namauser]', waktu_update='$created_date' WHERE id_invesb = '$_POST[id]' ") or die (mysql_error());
 
 
 
 



  header('location:../../media.php?module=alatangkut&code=4');
}
} else {
	
// Hapus invesb
if ($module=='alatangkut' AND $act=='hapus'){
    mysql_query("DELETE FROM invesb WHERE id_invesb ='$_GET[id]' and skpd = '$_SESSION[dinas]' ");  
    
  header('location:../../media.php?module=alatangkut&code=2');
}

// Input invesb
elseif ($module=='alatangkut' AND $act=='input'){
$tanggal = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['tanggal'],ENT_QUOTES))));
$kode_barang = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['kode_barang'],ENT_QUOTES))));
$skpd = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['skpd'],ENT_QUOTES))));
$merk = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['merk'],ENT_QUOTES))));
$type = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['type'],ENT_QUOTES))));
$ruang = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['ruang'],ENT_QUOTES))));
$kondisi = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['kondisi'],ENT_QUOTES))));
$jumlah = 1;
$jml_input = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['jumlah'],ENT_QUOTES))));
$harga = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['harga'],ENT_QUOTES))));
$sumber = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['sumber'],ENT_QUOTES))));
$keterangan = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['keterangan'],ENT_QUOTES))));
$bahan = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['bahan'],ENT_QUOTES))));
  $harga = str_replace(".","",$harga);
  $status_penggunaan = 1;

 
  
  for ($i=1; $i<=$jml_input;$i++) {
  $register1= mysql_query("select max(register) as max_reg from invesb where kode_barang='$_POST[kode_barang]' and skpd='$_SESSION[dinas]';");
  $register2= mysql_fetch_array($register1);
  $register3= (int) $register2 ['max_reg'];
  $register=$register3+1;

  mysql_query("INSERT INTO invesb ( register, bahan, tanggal_pembelian, skpd, kode_barang, merk, type, ruang, kondisi,jumlah, harga, sumber_dana, keterangan, username, waktu_input)
   VALUES ('$register','$bahan','$tanggal','$_SESSION[dinas]','$kode_barang','$merk','$type','$ruang','$kondisi','$jumlah','$harga','$sumber','$keterangan','$_SESSION[namauser]','$created_date');") or die (mysql_error());
   
    $cek = mysql_fetch_array(mysql_query(" select * from invesb where kode_barang = '$kode_barang' order by id_invesb DESC "));





 header('location:../../media.php?module=alatangkut&act=tambahalatangkut&code=1');
}
}
// Update invesb
elseif ($module=='alatangkut' AND $act=='update'){
$tanggal = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['tanggal'],ENT_QUOTES))));
$kode_barang = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['kode_barang'],ENT_QUOTES))));
$skpd = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['skpd'],ENT_QUOTES))));
$merk = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['merk'],ENT_QUOTES))));
$type = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['type'],ENT_QUOTES))));
$ruang = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['ruang'],ENT_QUOTES))));
$kondisi = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['kondisi'],ENT_QUOTES))));
$harga = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['harga'],ENT_QUOTES))));
$sumber = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['sumber'],ENT_QUOTES))));
$keterangan = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['keterangan'],ENT_QUOTES))));
$bahan = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['bahan'],ENT_QUOTES))));
   $harga = str_replace(".","",$harga);
 mysql_query("UPDATE invesb SET bahan = '$bahan', tanggal_pembelian = '$tanggal', kondisi = '$kondisi',  kode_barang = '$kode_barang', merk = '$merk', type = '$type', ruang = '$ruang' , harga = '$harga' , sumber_dana = '$sumber' , keterangan = '$keterangan' ,  user_update='$_SESSION[namauser]', waktu_update='$created_date' WHERE id_invesb = '$_POST[id]' and skpd = '$_SESSION[dinas]'  ") or die (mysql_error());
 
 
  

  header('location:../../media.php?module=alatangkut&code=4');
}

}
}
?>
