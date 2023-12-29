<?php
include"config/koneksi.php";
$propinsi = $_GET['caria'];
$kota = mysql_query("SELECT * FROM barang WHERE kode_bidang='$propinsi' order by nama_barang");
	echo" <option value=0 selected>- Pilih Barang -</option>";
while($k = mysql_fetch_array($kota)){
    echo "<option value=\"".$k['kode_barang']."\">".$k['nama_barang']."</option>\n";
}
?>
