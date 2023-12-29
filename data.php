<?php
//connect ke database
  mysql_connect("localhost","root","");
  mysql_select_db("skp");
//harus selalu gunakan variabel term saat memakai autocomplete,
//jika variable term tidak bisa, gunakan variabel q
$term = trim(strip_tags($_GET['term']));
  
$qstring = "SELECT * FROM barang where kode_bidang = '2' ";
//query database untuk mengecek tabel anime
$result = mysql_query($qstring);
  
while ($row = mysql_fetch_array($result))
{
    $row['value']=htmlentities(stripslashes($row['nama']));
    $row['id']=(int)$row['id'];
//buat array yang nantinya akan di konversi ke json
    $row_set[] = $row;
}
//data hasil query yang dikirim kembali dalam format json
echo json_encode($row_set);
?>