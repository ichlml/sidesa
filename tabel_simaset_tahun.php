<?php
include "config/koneksi.php";

$sub = mysql_query("SELECT * FROM $_GET[db] WHERE tanggal_pembelian NOT LIKE '2017-%' ");
while ($row=mysql_fetch_array($sub)){
	if($row['tanggal_pembelian']=='0000-00-00'){
		$tgl_baru = '2017-12-31';
	} else {
		$tgl_baru = '2017'.substr($row['tanggal_pembelian'], 4);
	}
	mysql_query("UPDATE $_GET[db] SET tanggal_pembelian = '$tgl_baru' WHERE id_".$_GET['db']." = '".$row['id_'.$_GET['db']]."' ");
}
?>

