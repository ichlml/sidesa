<?php
session_start();
	if ($_SESSION['level']=='admin'){

 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{

include "../../config/koneksi.php";
include "../../config/library.php";
include "../../config/fungsi_thumb.php";
include "../../config/excel_reader2.php";
		$created_date = date('Y-m-d H:i:s');

$module=$_GET[module];
$act=$_GET[act];

// Hapus Tag
if ($module=='barang' AND $act=='hapus'){
  mysql_query("DELETE FROM barang WHERE kode_barang='$_GET[id]'");
  header('location:../../media.php?module=barang&code=2');
}

// Input barang
elseif ($module=='barang' AND $act=='input'){
/*		$x="SELECT max(kode_barang) as maxidadmin FROM barang WHERE kode_barang LIKE '$_POST[kode_bidang]%'";
	$selectidmax=mysql_query($x) or die ("Eror Query".mysql_error()); 

    $hslidmax=mysql_fetch_array($selectidmax);

    $idmax=$hslidmax['maxidadmin'];


    $nourut = (int) substr($idmax, 7,4);

    $nourut++;


    $IDbaru = "$_POST[kode_bidang]" . sprintf("%04s", "$nourut");  
*/
$kode_barang = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['kode_barang'],ENT_QUOTES))));
$kode_bidang = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['kode_bidang'],ENT_QUOTES))));
$nama_barang = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['nama_barang'],ENT_QUOTES))));
  mysql_query("INSERT INTO barang(kode_barang, kode_bidang, nama_barang, harga_barang, username, waktu_input) VALUES('$kode_barang','$kode_bidang','$nama_barang','$_POST[harga]','$_SESSION[namauser]','$created_date')");
  header('location:../../media.php?module=barang&act=tambahbarang&code=1');
}

elseif ($module=='barang' AND $act=='upload'){


// membaca file excel yang diupload
$data = new Spreadsheet_Excel_Reader($_FILES['userfile']['tmp_name']);

// membaca jumlah baris dari data excel
$baris = $data->rowcount($sheet_index=0);

// nilai awal counter untuk jumlah data yang sukses dan yang gagal diimport
$sukses = 0;
$gagal = 0;

// import data excel mulai baris ke-2 (karena baris pertama adalah nama kolom)
for ($i=2; $i<=$baris; $i++)
{
  // membaca data nim (kolom ke-1)
  $kode = $data->val($i, 1);
  // membaca data nama (kolom ke-2)
  $kode_bidang = $data->val($i, 2);
  // membaca data alamat (kolom ke-3)
  $nama_barang = $data->val($i, 3);
  // membaca data alamat (kolom ke-3)

  // setelah data dibaca, sisipkan ke dalam tabel mhs
  $query = "INSERT INTO barang(kode_barang, kode_bidang, nama_barang,  username, waktu_input) VALUES ('$kode', '$kode_bidang','$nama_barang', '$_SESSION[namauser]', '$created_date')";
  $hasil = mysql_query($query) or die (mysql_error());

  // jika proses insert data sukses, maka counter $sukses bertambah
  // jika gagal, maka counter $gagal yang bertambah
  if ($hasil) $sukses++;
  else $gagal++;
  header('location:../../media.php?module=barang&code=4');

}

}
// Update barang
elseif ($module=='barang' AND $act=='update'){
  mysql_query("UPDATE barang SET nama_barang = '$_POST[nama_barang]', harga_barang = '$_POST[harga]', user_update='$_SESSION[namauser]', waktu_update='$created_date' WHERE kode_barang = '$_POST[id]'");
  header('location:../../media.php?module=barang&code=3');
}
}
	}
?>
