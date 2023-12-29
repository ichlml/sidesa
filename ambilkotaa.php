<?php
include"config/koneksi.php";
  $edit=mysql_query("SELECT * FROM invesa, barang, subdinas where invesa.skpd=subdinas.kode_subdinas and barang.kode_barang=invesa.kode_barang and kode_invesa='$_GET[id]'");
    $r=mysql_fetch_array($edit);
  if ($d[kode_barang]!=''){
$kota = mysql_query("SELECT * FROM barang WHERE kode_bidang='$r[kode_bidang]' order by nama_barang");
while($k = mysql_fetch_array($kota)){
    echo "<option value=\"".$k['kode_barang']."\">".$k['nama_barang']."</option>\n";
} 
  } else {

$propinsi = $_GET['kode_bidang'];
$kota = mysql_query("SELECT * FROM barang WHERE kode_bidang='$propinsi' order by nama_barang");
while($k = mysql_fetch_array($kota)){
    echo "<option value=\"".$k['kode_barang']."\">".$k['nama_barang']."</option>\n";
} }
?>
