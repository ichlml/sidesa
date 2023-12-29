<?php
include "config/koneksi.php";
// cek tabel exist
$tbl_query = mysql_query("SHOW TABLES LIKE 'subdinas' ");
//if not exist, create table
if ( mysql_num_rows($tbl_query) == 0 ) {
	$tbl_query = mysql_query("CREATE TABLE IF NOT EXISTS subdinas ( 
	id_subdinas INT(255) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY, 
	kd_bidang VARCHAR(2) NOT NULL , 
	kd_unit VARCHAR(2) NOT NULL , 
	kd_sub VARCHAR(2) NOT NULL , 
	kd_upb VARCHAR(2) NOT NULL , 
	kode_subdinas varchar(100),
	kode_dinas varchar(100),
	nama_subdinas varchar(100),
	kelompok varchar(100),
	nama_kepala varchar(100),
	nip varchar(100),
	alamat_subdinas text,
	telepon varchar(100),
	username varchar(100),
	waktu_input timestamp,
	user_update varchar(100),
	waktu_update timestamp,
	password varchar(100),
	aktif enum('A', 'T'),
	hp varchar(50),
	nama_admin varchar(100),
	admin varchar(100)
	) ");
	
	$sub = mysql_query("SELECT * FROM subdinas_old");
	while ($row=mysql_fetch_array($sub)){
		$arr_kode = explode(" ", $row['kode_subdinas']);
		$sub_query = mysql_query("INSERT INTO subdinas ( 
			kd_bidang, 
			kd_unit, 
			kd_sub, 
			kd_upb, 
			kode_subdinas,
			kode_dinas,
			nama_subdinas,
			kelompok,
			nama_kepala,
			nip,
			alamat_subdinas,
			telepon,
			username,
			waktu_input,
			user_update,
			waktu_update,
			password,
			aktif,
			hp,
			nama_admin,
			admin
			) VALUES (
			'".$arr_kode[0]."',
			'".$arr_kode[1]."',
			'".str_pad($arr_kode[2], 2, "0", STR_PAD_LEFT)."', 
			'".str_pad($arr_kode[3], 2, "0", STR_PAD_LEFT)."',
			'".$row['kode_subdinas']."',
			'".$row['kode_dinas']."',
			'".$row['nama_subdinas']."',
			'".$row['kelompok']."',
			'".$row['nama_kepala']."',
			'".$row['nip']."',
			'".$row['alamat_subdinas']."',
			'".$row['telepon']."',
			'".$arr_kode[0].$arr_kode[1].str_pad($arr_kode[2], 2, "0", STR_PAD_LEFT).str_pad($arr_kode[3], 2, "0", STR_PAD_LEFT)."',
			'".$row['waktu_input']."',
			'".$row['user_update']."',
			'".$row['waktu_update']."',
			'".$row['password']."',
			'".$row['aktif']."',
			'".$row['hp']."',
			'".$row['nama_admin']."',
			'".$row['admin']."'
			) ");
	}
}
?>

