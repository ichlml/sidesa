<?php
include "config/koneksi.php";
// cek tabel exist
$tbl_query = mysql_query("SHOW TABLES LIKE 'modal' ");
//if not exist, create table
if ( mysql_num_rows($tbl_query) == 0 ) {
	$tbl_query = mysql_query("CREATE TABLE IF NOT EXISTS modal ( 
	id_modal INT(255) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY, 
	skpd varchar(100),
	tahun_anggaran INT(4),
	apbn INT(255),
	apbd INT(255),
	waktu_input timestamp,
	user_update varchar(100),
	waktu_update timestamp
	) ");
}
?>

