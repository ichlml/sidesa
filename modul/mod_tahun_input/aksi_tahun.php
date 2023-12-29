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
if ($module=='bidang' AND $act=='hapus'){
  mysql_query("DELETE FROM bidang WHERE kode_bidang='$_GET[id]'");
  header('location:../../media.php?module=bidang&code=2');
}

// Input bidang
elseif ($module=='bidang' AND $act=='input'){

$kode_bidang = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['kode_bidang'],ENT_QUOTES))));
$nama_bidang = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['nama_bidang'],ENT_QUOTES))));

  mysql_query("INSERT INTO bidang(kode_bidang, nama_bidang,  username, waktu_input) VALUES('$kode_bidang','$nama_bidang','$_SESSION[namauser]','$created_date')") or die (mysql_error());
  header('location:../../media.php?module=bidang&act=tambahbidang&code=1');
}

elseif ($module=='bidang' AND $act=='upload'){

	$x="SELECT max(kode_bidang) as maxidadmin FROM bidang WHERE kode_bidang LIKE 'BDGN%'";
	$selectidmax=mysql_query($x) or die ("Eror Query".mysql_error()); 

    $hslidmax=mysql_fetch_array($selectidmax);

    $idmax=$hslidmax['maxidadmin'];


    $nourut = (int) substr($idmax, 4,3);

    $nourut++;


    $IDbaru = "BDGN" . sprintf("%03s", "$nourut");  

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
  $query = "INSERT INTO bidang(kode_bidang, nama_bidang, username, waktu_input) VALUES ('$kode', '$nama',  '$_SESSION[namauser]', '$created_date')";
  $hasil = mysql_query($query);

  // jika proses insert data sukses, maka counter $sukses bertambah
  // jika gagal, maka counter $gagal yang bertambah
  if ($hasil) $sukses++;
  else $gagal++;
  header('location:../../media.php?module=bidang&code=4');

}




}

// Update bidang
elseif ($module=='bidang' AND $act=='update'){
	$kode_bidang = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['kode_bidang'],ENT_QUOTES))));
$nama_bidang = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['nama_bidang'],ENT_QUOTES))));

  mysql_query("UPDATE bidang SET nama_bidang = '$nama_bidang', user_update='$_SESSION[namauser]', waktu_update='$created_date' WHERE kode_bidang = '$_POST[id]'");
  header('location:../../media.php?module=bidang&code=3');
}
}
	}
?>
