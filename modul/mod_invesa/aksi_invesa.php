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
$created_date = date('Y-m-d H:i:s');

$module=$_GET['module'];
$act=$_GET['act'];
  
  
  if ($_SESSION['level']=='admin'){ 

// Hapus invesa
if ($module=='tanah' AND $act=='hapus'){
    mysql_query("DELETE FROM invesa WHERE id_invesa ='$_GET[id]'");  
    
  header('location:../../media.php?module=tanah&code=2');
}

// Input invesa
elseif ($module=='tanah' AND $act=='input'){
	
$tanggal = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['tanggal'],ENT_QUOTES))));
$kode_barang = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['kode_barang'],ENT_QUOTES))));
$skpd = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['skpd'],ENT_QUOTES))));
$luas = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['luas'],ENT_QUOTES))));
$no_sertifikat = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['no_sertifikat'],ENT_QUOTES))));
$kondisi = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['kondisi'],ENT_QUOTES))));
$penggunaan = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['penggunaan'],ENT_QUOTES))));
$jumlah = 1;
$jml_input = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['jumlah'],ENT_QUOTES))));
$harga = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['harga'],ENT_QUOTES))));
$sumber = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['sumber'],ENT_QUOTES))));
$keterangan = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['keterangan'],ENT_QUOTES))));
  $harga = str_replace(".","",$harga);
  $status_penggunaan = 1;


  for ($i=1; $i<=$jml_input;$i++) {
    $register1= mysql_query("select max(register) as max_reg from invesa where kode_barang='$_POST[kode_barang]' and skpd='$_SESSION[dinas]';");
    $register2= mysql_fetch_array($register1);
    $register3= (int) $register2 ['max_reg'];
    $register=$register3+1;

mysql_query("INSERT INTO invesa (register, tanggal_pembelian, skpd, kode_barang, luas, kondisi, jumlah, no_sertifikat, penggunaan, harga, sumber_dana, keterangan, username, waktu_input ) 
VALUES ('$register','$tanggal','$skpd','$kode_barang','$luas','$kondisi','$jumlah','$no_sertifikat','$penggunaan','$harga','$sumber',
'$keterangan','$_SESSION[namauser]','$created_date');") or die (mysql_error());

$cek = mysql_fetch_array(mysql_query(" select * from invesa where kode_barang = '$kode_barang' order by id_invesa DESC "));

  

header('location:../../media.php?module=tanah&act=tambahtanah&code=1');
}
}

// Update invesa
elseif ($module=='tanah' AND $act=='update'){
$tanggal = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['tanggal'],ENT_QUOTES))));
$kode_barang = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['kode_barang'],ENT_QUOTES))));
$skpd = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['skpd'],ENT_QUOTES))));
$luas = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['luas'],ENT_QUOTES))));
$kondisi = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['kondisi'],ENT_QUOTES))));

$no_sertifikat = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['no_sertifikat'],ENT_QUOTES))));
$penggunaan = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['penggunaan'],ENT_QUOTES))));
$harga = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['harga'],ENT_QUOTES))));
$sumber = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['sumber'],ENT_QUOTES))));
$keterangan = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['keterangan'],ENT_QUOTES))));
  $harga = str_replace(".","",$harga);

mysql_query("UPDATE invesa SET tanggal_pembelian = '$tanggal', kondisi = '$kondisi' , skpd = '$skpd' , kode_barang = '$kode_barang' , luas = '$luas' , no_sertifikat='$no_sertifikat', penggunaan='$penggunaan', harga = '$harga', sumber_dana = '$sumber', keterangan = '$keterangan', user_update='$_SESSION[namauser]', waktu_update='$created_date' WHERE 	id_invesa = '$_POST[id]'") or die (mysql_error());




  header('location:../../media.php?module=tanah&code=3');

}


  } else {
	  if ($module=='tanah' AND $act=='hapus'){
    mysql_query("DELETE FROM invesa WHERE id_invesa ='$_GET[id]' and skpd = '$_SESSION[dinas]' ");  
    
 header('location:../../media.php?module=tanah&code=2');
}

// Input invesa
elseif ($module=='tanah' AND $act=='input'){
	
$tanggal = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['tanggal'],ENT_QUOTES))));
$kode_barang = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['kode_barang'],ENT_QUOTES))));
$skpd = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['skpd'],ENT_QUOTES))));
$luas = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['luas'],ENT_QUOTES))));
$kondisi = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['kondisi'],ENT_QUOTES))));
$jumlah = 1;
$jml_input = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['jumlah'],ENT_QUOTES))));
$no_sertifikat = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['no_sertifikat'],ENT_QUOTES))));
$penggunaan = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['penggunaan'],ENT_QUOTES))));
$harga = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['harga'],ENT_QUOTES))));
$sumber = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['sumber'],ENT_QUOTES))));
$keterangan = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['keterangan'],ENT_QUOTES))));
  $harga = str_replace(".","",$harga);
  $status_penggunaan = 1;
  
  for ($i=1; $i<=$jml_input;$i++) {
    $register1= mysql_query("select max(register) as max_reg from invesa where kode_barang='$_POST[kode_barang]' and skpd='$_SESSION[dinas]';");
    $register2= mysql_fetch_array($register1);
    $register3= (int) $register2 ['max_reg'];
    $register=$register3+1;
    
mysql_query("INSERT INTO invesa (register, tanggal_pembelian, skpd, kode_barang, luas, kondisi, jumlah, no_sertifikat, penggunaan, harga, sumber_dana, keterangan, username, waktu_input ) 
VALUES ('$register','$tanggal','$_SESSION[dinas]','$kode_barang','$luas','$kondisi','$jumlah','$no_sertifikat','$penggunaan','$harga','$sumber',
'$keterangan','$_SESSION[namauser]','$created_date');") or die (mysql_error());

$cek = mysql_fetch_array(mysql_query(" select * from invesa where kode_barang = '$kode_barang' order by id_invesa DESC "));

  

  header('location:../../media.php?module=tanah&act=tambahtanah&code=1');
}
}
// Update invesa
elseif ($module=='tanah' AND $act=='update'){
$tanggal = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['tanggal'],ENT_QUOTES))));
$kode_barang = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['kode_barang'],ENT_QUOTES))));

$luas = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['luas'],ENT_QUOTES))));
$kondisi = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['kondisi'],ENT_QUOTES))));

$no_sertifikat = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['no_sertifikat'],ENT_QUOTES))));
$penggunaan = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['penggunaan'],ENT_QUOTES))));
$harga1 = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['harga'],ENT_QUOTES))));
$sumber = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['sumber'],ENT_QUOTES))));
$keterangan = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['keterangan'],ENT_QUOTES))));
  $harga = str_replace(".","",$harga1);

mysql_query("UPDATE invesa SET tanggal_pembelian = '$tanggal', kondisi = '$kondisi',  kode_barang = '$kode_barang' , luas = '$luas' , no_sertifikat='$no_sertifikat', 
penggunaan='$penggunaan', harga = '$harga', sumber_dana = '$sumber', keterangan = '$keterangan', user_update='$_SESSION[namauser]', waktu_update='$created_date' 
WHERE 	id_invesa = '$_POST[id]' and skpd = '$_SESSION[dinas]' ") or die (mysql_error());



 header('location:../../media.php?module=tanah&code=3');

}
}


}
?>
