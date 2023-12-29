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
    mysql_query("DELETE FROM invesmen WHERE id ='$_GET[id]' and inves = '1' ");  
  header('location:../../media.php?module=tanah&code=2');
}

// Input invesa
elseif ($module=='tanah' AND $act=='input'){
	
$tanggal = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['tanggal'],ENT_QUOTES))));
$kode_barang = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['kode_barang'],ENT_QUOTES))));
$skpd = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['skpd'],ENT_QUOTES))));
$luas = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['luas'],ENT_QUOTES))));
$harga = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['harga'],ENT_QUOTES))));
$sumber = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['sumber'],ENT_QUOTES))));
$keterangan = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['keterangan'],ENT_QUOTES))));
  $harga = str_replace(".","",$harga);


mysql_query("INSERT INTO invesa (tanggal_pembelian, skpd, kode_barang, luas, harga, sumber_dana, keterangan, username, waktu_input ) 
VALUES ('$tanggal','$skpd','$kode_barang','$luas','$harga','$sumber',
'$keterangan','$_SESSION[namauser]','$created_date');") or die (mysql_error());

$cek = mysql_fetch_array(mysql_query(" select * from invesa where kode_barang = '$kode_barang' order by id_invesa DESC "));

  
mysql_query("INSERT INTO invesmen (kode_barang, tanggal_pembelian, luas, harga, sumber_dana, keterangan, skpd, inves, username, id ) 
VALUES ('$kode_barang','$tanggal','$luas','$harga','$sumber','$keterangan','$skpd','1','$_SESSION[namauser]','$cek[id_invesa]')");

header('location:../../media.php?module=tanah&act=tambahtanah&code=1');
  
}

// Update invesa
elseif ($module=='tanah' AND $act=='update'){
$tanggal = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['tanggal'],ENT_QUOTES))));
$kode_barang = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['kode_barang'],ENT_QUOTES))));
$skpd = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['skpd'],ENT_QUOTES))));
$luas = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['luas'],ENT_QUOTES))));
$harga = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['harga'],ENT_QUOTES))));
$sumber = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['sumber'],ENT_QUOTES))));
$keterangan = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['keterangan'],ENT_QUOTES))));
  $harga = str_replace(".","",$harga);

mysql_query("UPDATE invesa SET tanggal_pembelian = '$tanggal', skpd = '$skpd' , kode_barang = '$kode_barang' , luas = '$luas' , harga = '$harga', sumber_dana = '$sumber', keterangan = '$keterangan', user_update='$_SESSION[namauser]', waktu_update='$created_date' WHERE 	id_invesa = '$_POST[id]'") or die (mysql_error());


mysql_query("UPDATE invesmen SET kode_barang = '$kode_barang' , tanggal_pembelian = '$tanggal', luas='$luas', harga ='$harga', sumber_dana ='$sumber', keterangan = '$keterangan', skpd = '$skpd'  WHERE 	id = '$_POST[id]' and inves = '1' ") or die (mysql_error());



  header('location:../../media.php?module=tanah&code=3');

}


  } else {
	  if ($module=='tanah' AND $act=='hapus'){
    mysql_query("DELETE FROM invesa WHERE id_invesa ='$_GET[id]' and skpd = '$_SESSION[dinas]' ");  
     mysql_query("DELETE FROM invesmen WHERE id ='$_GET[id]' and inves = '1' and skpd = '$_SESSION[dinas]'  ");  
 header('location:../../media.php?module=tanah&code=2');
}

// Input invesa
elseif ($module=='tanah' AND $act=='input'){
	
$tanggal = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['tanggal'],ENT_QUOTES))));
$kode_barang = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['kode_barang'],ENT_QUOTES))));
$skpd = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['skpd'],ENT_QUOTES))));
$luas = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['luas'],ENT_QUOTES))));
$harga = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['harga'],ENT_QUOTES))));
$sumber = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['sumber'],ENT_QUOTES))));
$keterangan = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['keterangan'],ENT_QUOTES))));
  $harga = str_replace(".","",$harga);

mysql_query("INSERT INTO invesa (tanggal_pembelian, skpd, kode_barang, luas, harga, sumber_dana, keterangan, username, waktu_input ) 
VALUES ('$tanggal','$_SESSION[dinas]','$kode_barang','$luas','$harga','$sumber',
'$keterangan','$_SESSION[namauser]','$created_date');") or die (mysql_error());

$cek = mysql_fetch_array(mysql_query(" select * from invesa where kode_barang = '$kode_barang' order by id_invesa DESC "));

  
mysql_query("INSERT INTO invesmen (kode_barang, tanggal_pembelian, luas, harga, sumber_dana, keterangan, skpd, inves, username, id ) 
VALUES ('$kode_barang','$tanggal','$luas','$harga','$sumber','$keterangan','$_SESSION[dinas]','1','$_SESSION[namauser]','$cek[id_invesa]')");

  header('location:../../media.php?module=tanah&act=tambahtanah&code=1');
}

// Update invesa
elseif ($module=='tanah' AND $act=='update'){
$tanggal = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['tanggal'],ENT_QUOTES))));
$kode_barang = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['kode_barang'],ENT_QUOTES))));
$skpd = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['skpd'],ENT_QUOTES))));
$luas = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['luas'],ENT_QUOTES))));
$harga = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['harga'],ENT_QUOTES))));
$sumber = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['sumber'],ENT_QUOTES))));
$keterangan = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['keterangan'],ENT_QUOTES))));
  $harga = str_replace(".","",$harga);

mysql_query("UPDATE invesa SET tanggal_pembelian = '$tanggal',  kode_barang = '$kode_barang' , luas = '$luas' , harga = '$harga', sumber_dana = '$sumber', keterangan = '$keterangan', user_update='$_SESSION[namauser]', waktu_update='$created_date' WHERE 	id_invesa = '$_POST[id]' and skpd = '$_SESSION[dinas]' ") or die (mysql_error());


mysql_query("UPDATE invesmen SET kode_barang = '$kode_barang' , tanggal_pembelian = '$tanggal', luas='$luas', harga ='$harga', sumber_dana ='$sumber', keterangan = '$keterangan', skpd = '$skpd'  WHERE 	id = '$_POST[id]' and inves = '1' and skpd = '$_SESSION[dinas]'  ") or die (mysql_error());
 
 header('location:../../media.php?module=tanah&code=3');

}
}


}
?>
