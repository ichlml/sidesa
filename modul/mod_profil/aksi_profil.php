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

function anti_injection($data){
  $filter = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter;
}

// Hapus Tag
if ($module=='profil' AND $act=='hapus'){
  mysql_query("DELETE FROM users WHERE username='$_GET[id]'");
  header('location:../../media.php?module=profil&code=2');
}

// Input profil
elseif ($module=='profil' AND $act=='input'){

  $pass=anti_injection(md5($_POST[password]));
  mysql_query("INSERT INTO users(username,
                                 password,
                                 nama_lengkap,
                                 email, 
                                 no_telp,
                                 id_session, skpd) 
	                       VALUES('$_POST[username]',
                                '$pass',
                                '$_POST[nama_lengkap]',
                                '$_POST[email]',
                                '$_POST[no_telp]',
                                '$pass','$_POST[skpd]')");
  header('location:../../media.php?module=profil&act=tambahprofil&code=1');
}

elseif ($module=='profil' AND $act=='update'){
		if ($_SESSION['level']=='admin'){
  if (empty($_POST[password])) {
    mysql_query("UPDATE users SET nama_lengkap   = '$_POST[nama_lengkap]',
                                  email          = '$_POST[email]',
                                  no_telp        = '$_POST[no_telp]', skpd ='$_POST[skpd]'  , tutup = '$_POST[tutup]'
                           WHERE  username     = '$_SESSION[namauser]'") or die (mysql_error());
  }
  // Apabila password diubah
  else{
    $pass=anti_injection(md5($_POST[password]));
    mysql_query("UPDATE users SET nama_lengkap   = '$_POST[nama_lengkap]', password = '$pass',
                                  email          = '$_POST[email]',
                                  no_telp        = '$_POST[no_telp]', skpd ='$_POST[skpd]'  , tutup = '$_POST[tutup]'
                           WHERE  username     = '$_SESSION[namauser]'") or die (mysql_error());
  }

 header('location:../../media.php?module=profil&code=3');
}
} else {
  if (empty($_POST[password])) {
    mysql_query("UPDATE subdinas SET admin  	 	= '$_POST[username]',
                                  nama_admin		= '$_POST[nama]',
                                  hp         		= '$_POST[hp]', 
                                  kades         		= '$_POST[kades]' 
                                 
                           WHERE  username     = '$_SESSION[namauser]'") or die (mysql_error());
  }
  // Apabila password diubah
  else{
    $pass=anti_injection(md5($_POST[password]));
    mysql_query("UPDATE subdinas SET admin  	 	= '$_POST[username]',
                                  nama_admin		= '$_POST[nama]',
                                  hp         		= '$_POST[hp]',  
                                  kades         		= '$_POST[kades]',  
                              
									password 		= '$pass'
									WHERE  username    = '$_SESSION[namauser]'")or die (mysql_error());
  }
 header('location:../../media.php?module=profil&code=3');
	
}
}
?>
