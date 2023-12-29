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
// Hapus invesd
if ($module=='jalanirigrasi' AND $act=='hapus'){
    mysql_query("DELETE FROM invesd WHERE id_invesd ='$_GET[id]'");  
     
  header('location:../../media.php?module=jalanirigrasi&code=2');
}

// Input invesd
elseif ($module=='jalanirigrasi' AND $act=='input'){
$tanggal = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['tanggal'],ENT_QUOTES))));
$kode_barang = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['kode_barang'],ENT_QUOTES))));
$skpd = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['skpd'],ENT_QUOTES))));
$tingkat = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['tingkat'],ENT_QUOTES))));
$beton = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['beton'],ENT_QUOTES))));
$luas = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['luas'],ENT_QUOTES))));
$panjang = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['panjang'],ENT_QUOTES))));
$lebar = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['lebar'],ENT_QUOTES))));
$kondisi = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['kondisi'],ENT_QUOTES))));
$harga = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['harga'],ENT_QUOTES))));
$jumlah = 1;
$jml_input = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['jumlah'],ENT_QUOTES))));
$sumber = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['sumber'],ENT_QUOTES))));
$keterangan = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['keterangan'],ENT_QUOTES))));
   $harga = str_replace(".","",$harga);
   $status_penggunaan = 1;

    
  for ($i=1; $i<=$jml_input;$i++) {
    $register1= mysql_query("select max(register) as max_reg from invesd where kode_barang='$_POST[kode_barang]' and skpd='$_SESSION[dinas]';");
    $register2= mysql_fetch_array($register1);
    $register3= (int) $register2 ['max_reg'];
    $register=$register3+1;

  mysql_query("INSERT INTO invesd (register, skpd, kode_barang, tanggal_pembelian, beton, luas, panjang, lebar, kondisi,jumlah, harga, sumber_dana, keterangan, username, waktu_input) VALUES
('$register','$skpd','$kode_barang','$tanggal','$beton','$luas','$panjang','$lebar','$kondisi','$jumlah','$harga','$sumber','$keterangan','$_SESSION[namauser]','$_POST[waktu_input]');")or die (mysql_error());
 
     $cek = mysql_fetch_array(mysql_query(" select * from invesd where kode_barang = '$kode_barang' order by id_invesd DESC "));

  
 
  header('location:../../media.php?module=jalanirigrasi&act=tambahjalanirigrasi&code=1');
}
 }
// Update invesd
elseif ($module=='jalanirigrasi' AND $act=='update'){
 $tanggal = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['tanggal'],ENT_QUOTES))));
$kode_barang = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['kode_barang'],ENT_QUOTES))));
$skpd = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['skpd'],ENT_QUOTES))));
$tingkat = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['tingkat'],ENT_QUOTES))));
$beton = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['beton'],ENT_QUOTES))));
$luas = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['luas'],ENT_QUOTES))));
$panjang = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['panjang'],ENT_QUOTES))));
$lebar = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['lebar'],ENT_QUOTES))));
$kondisi = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['kondisi'],ENT_QUOTES))));
$harga = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['harga'],ENT_QUOTES))));

$sumber = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['sumber'],ENT_QUOTES))));
$keterangan = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['keterangan'],ENT_QUOTES))));
   $harga = str_replace(".","",$harga);
   $status_penggunaan = 1;

 mysql_query("UPDATE invesd SET skpd = '$skpd', kode_barang = '$kode_barang', tanggal_pembelian = '$tanggal', kondisi = '$kondisi',  beton = '$beton' , luas = '$luas' , panjang = '$panjang', lebar = '$lebar', harga = '$harga' , sumber_dana = '$sumber' , keterangan = '$keterangan'  WHERE id_invesd = '$_POST[id]'") or die (mysql_error());


 
 
 
  header('location:../../media.php?module=jalanirigrasi&code=4');
}
} else {
	// Hapus invesd
if ($module=='jalanirigrasi' AND $act=='hapus'){
    mysql_query("DELETE FROM invesd WHERE id_invesd ='$_GET[id]' and skpd = '$_SESSION[dinas]' ");  
       
 header('location:../../media.php?module=jalanirigrasi&code=2');
}

// Input invesd
elseif ($module=='jalanirigrasi' AND $act=='input'){
$tanggal = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['tanggal'],ENT_QUOTES))));
$kode_barang = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['kode_barang'],ENT_QUOTES))));
$skpd = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['skpd'],ENT_QUOTES))));
$tingkat = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['tingkat'],ENT_QUOTES))));
$beton = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['beton'],ENT_QUOTES))));
$luas = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['luas'],ENT_QUOTES))));
$panjang = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['panjang'],ENT_QUOTES))));
$lebar = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['lebar'],ENT_QUOTES))));
$harga = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['harga'],ENT_QUOTES))));
$jumlah = 1;
$jml_input = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['jumlah'],ENT_QUOTES))));
$sumber = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['sumber'],ENT_QUOTES))));
$keterangan = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['keterangan'],ENT_QUOTES))));
   $harga = str_replace(".","",$harga);

     for ($i=1; $i<=$jml_input;$i++) {
    $register1= mysql_query("select max(register) as max_reg from invesd where kode_barang='$_POST[kode_barang]' and skpd='$_SESSION[dinas]';");
    $register2= mysql_fetch_array($register1);
    $register3= (int) $register2 ['max_reg'];
    $register=$register3+1;

  mysql_query("INSERT INTO invesd (register, skpd, kode_barang, tanggal_pembelian, beton, luas, panjang, lebar, kondisi,jumlah, harga, sumber_dana, keterangan, username, waktu_input) VALUES
('$register','$_SESSION[dinas]','$kode_barang','$tanggal','$beton','$luas','$panjang','$lebar','$kondisi','$jumlah','$harga','$sumber','$keterangan','$_SESSION[namauser]','$_POST[waktu_input]');")or die (mysql_error());
      $cek = mysql_fetch_array(mysql_query(" select * from invesd where kode_barang = '$kode_barang' order by id_invesd DESC "));

  


 header('location:../../media.php?module=jalanirigrasi&act=tambahjalanirigrasi&code=1');
}
 }
// Update invesd
elseif ($module=='jalanirigrasi' AND $act=='update'){
 $tanggal = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['tanggal'],ENT_QUOTES))));
$kode_barang = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['kode_barang'],ENT_QUOTES))));
$skpd = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['skpd'],ENT_QUOTES))));
$tingkat = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['tingkat'],ENT_QUOTES))));
$beton = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['beton'],ENT_QUOTES))));
$luas = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['luas'],ENT_QUOTES))));
$panjang = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['panjang'],ENT_QUOTES))));
$lebar = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['lebar'],ENT_QUOTES))));
$harga = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['harga'],ENT_QUOTES))));
$sumber = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['sumber'],ENT_QUOTES))));
$keterangan = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['keterangan'],ENT_QUOTES))));
   $harga = str_replace(".","",$harga);

 mysql_query("UPDATE invesd SET  kode_barang = '$kode_barang', tanggal_pembelian = '$tanggal', kondisi = '$kondisi',  beton = '$beton' , luas = '$luas' , panjang = '$panjang', lebar = '$lebar' , harga = '$harga' , sumber_dana = '$sumber' , keterangan = '$keterangan'  WHERE id_invesd = '$_POST[id]' and skpd = '$_SESSION[dinas]'") or die (mysql_error());
  
  header('location:../../media.php?module=jalanirigrasi&code=4');
}
}
}
?>
