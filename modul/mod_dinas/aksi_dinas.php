<?php
session_start();
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
if ($module=='dinas' AND $act=='hapus'){
  mysql_query("DELETE FROM dinas WHERE kode_dinas='$_GET[id]'");
  header('location:../../media.php?module=dinas&code=2');
}

// Input dinas
elseif ($module=='dinas' AND $act=='input'){
  mysql_query("INSERT INTO dinas(kode_dinas, nama_dinas,  username, waktu_input) VALUES('$_POST[kode_dinas]','$_POST[nama_dinas]','$_SESSION[namauser]','$created_date')");
  header('location:../../media.php?module=dinas&act=tambahdinas&code=1');
}

elseif ($module=='dinas' AND $act=='upload'){


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
  $nama = $data->val($i, 2);
  // membaca data alamat (kolom ke-3)

  // setelah data dibaca, sisipkan ke dalam tabel mhs
  $query = "INSERT INTO dinas(kode_dinas, nama_dinas, username, waktu_input) VALUES ('$kode', '$nama',  '$_SESSION[namauser]', '$created_date')";
  $hasil = mysql_query($query);

  // jika proses insert data sukses, maka counter $sukses bertambah
  // jika gagal, maka counter $gagal yang bertambah
  if ($hasil) $sukses++;
  else $gagal++;
  header('location:../../media.php?module=dinas&code=4');

}
}

// Update dinas
elseif ($module=='dinas' AND $act=='update'){
  mysql_query("UPDATE dinas SET nama_dinas = '$_POST[nama_dinas]', user_update='$_SESSION[namauser]', waktu_update='$created_date' WHERE kode_dinas = '$_POST[id]'");
  header('location:../../media.php?module=dinas&code=3');
}
}
?>
