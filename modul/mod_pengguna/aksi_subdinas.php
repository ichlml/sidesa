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
if ($module=='subdinas' AND $act=='hapus'){
  mysql_query("DELETE FROM subdinas WHERE kode_subdinas='$_GET[id]'");
  header('location:../../media.php?module=subdinas&code=2');
}

// Input subdinas
elseif ($module=='subdinas' AND $act=='input'){
		$x="SELECT max(kode_subdinas) as maxidadmin FROM subdinas WHERE kode_subdinas LIKE '$_POST[kode_dinas]%'";
	$selectidmax=mysql_query($x) or die ("Eror Query".mysql_error()); 

    $hslidmax=mysql_fetch_array($selectidmax);

    $idmax=$hslidmax['maxidadmin'];


    $nourut = (int) substr($idmax, 10,4);

    $nourut++;


    $IDbaru = "$_POST[kode_dinas]" . sprintf("%04s", "$nourut");  

  mysql_query("INSERT INTO subdinas(kode_subdinas, kode_dinas, nama_subdinas, kelompok, nama_kepala, nip, alamat_subdinas, telepon, username, waktu_input) VALUES('$IDbaru','$_POST[kode_dinas]','$_POST[nama_subdinas]','$_POST[kelompok]','$_POST[nama_kepala]','$_POST[nip]','$_POST[alamat]','$_POST[telepon]','$_SESSION[namauser]','$created_date')") or die (mysql_error());
  header('location:../../media.php?module=subdinas&act=tambahsubdinas&code=1');
}

elseif ($module=='subdinas' AND $act=='upload'){


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
  $kode_dinas = $data->val($i, 2);
  // membaca data alamat (kolom ke-3)

  $nama_subdinas = $data->val($i, 3);
  // membaca data alamat (kolom ke-3)

  $kelompok = $data->val($i, 4);
  // membaca data alamat (kolom ke-3)
  $nama_kepala = $data->val($i, 5);
  // membaca data alamat (kolom ke-3)
  $nip = $data->val($i, 6);
  // membaca data alamat (kolom ke-3)

  $alamat = $data->val($i, 7);
  // membaca data alamat (kolom ke-3)

  $telepon = $data->val($i, 8);
  // membaca data alamat (kolom ke-3)

  // setelah data dibaca, sisipkan ke dalam tabel mhs
  $query = "INSERT INTO subdinas(kode_subdinas, kode_dinas, nama_subdinas, kelompok, nama_kepala, nip, alamat_subdinas, telepon, username, waktu_input) VALUES ('$kode', '$kode_dinas', '$nama_subdinas', '$kelompok', '$nama_kepala', '$nip', '$alamat', '$telepon',  '$_SESSION[namauser]', '$created_date')";
  $hasil = mysql_query($query);

  // jika proses insert data sukses, maka counter $sukses bertambah
  // jika gagal, maka counter $gagal yang bertambah
  if ($hasil) $sukses++;
  else $gagal++;
  header('location:../../media.php?module=subdinas&code=4');

}




}
// Update subdinas

elseif ($module=='subdinas' AND $act=='update'){
  $akses = $_POST['akses'];
  var_dump($akses);
  exit;
  mysql_query("UPDATE subdinas SET kode_dinas='$_POST[kode_dinas]', nama_subdinas='$_POST[nama_subdinas]', kelompok='$_POST[kelompok]', nama_kepala='$_POST[nama_kepala]', nip='$_POST[nip]', alamat_subdinas='$_POST[alamat]', telepon='$_POST[telepon]', user_update='$_SESSION[namauser]', waktu_input='$created_date' WHERE kode_subdinas = '$_POST[id]'") or die (mysql_error());
  header('location:../../media.php?module=subdinas&code=3');
}
}
	}
?>
