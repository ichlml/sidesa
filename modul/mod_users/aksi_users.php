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

$module=$_GET[module];
$act=$_GET[act];

// Input user
if ($module=='user' AND $act=='input'){
}

// Update user
elseif ($module=='user' AND $act=='update'){
  if (empty($_POST[password])) {
    mysql_query("UPDATE subdinas SET admin  	 	= '$_POST[username]',
                                  nama_admin		= '$_POST[nama]',
                                  hp         		= '$_POST[hp]',  
                                  aktif        		= '$_POST[aktif]',  
                                  akses        		= '$_POST[akses]'  
                           WHERE  username     = '$_POST[id]'") or die (mysql_error());
  }
  // Apabila password diubah
  else{
    $pass=md5($_POST[password]);
    mysql_query("UPDATE subdinas SET admin  	 	= '$_POST[username]',
                                  nama_admin		= '$_POST[nama]',
                                  hp         		= '$_POST[hp]',  
                                  aktif        		= '$_POST[aktif]',
                                  akses        		= '$_POST[akses]',
									password 		= '$pass'
									WHERE  username    = '$_POST[id]'")or die (mysql_error());
  }
  header('location:../../media.php?module='.$module);
}
}
?>
