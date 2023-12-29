<?php
include "config/koneksi.php";
function anti_injection($data){
  $filter = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter;
}

$username = anti_injection($_POST['username']);
$pass     = anti_injection(md5($_POST['password']));

// pastikan username dan password adalah berupa huruf atau angka.
if (!ctype_alnum($username) OR !ctype_alnum($pass)){
  echo "Sekarang loginnya tidak bisa di injeksi lho.";
}
else{
	// mysql_query("INSERT INTO users (username, password, nama_lengkap, email, no_telp, level, blokir, id_session, skpd, tutup, viewer) 
	// VALUES ('$username', '$pass', 'thom', 'thom@email.com', '', 'admin', 'N', '', '', '', 'V') ");
	// mysql_query("INSERT INTO subdinas (kode_subdinas, kode_dinas, nama_subdinas, kelompok, nama_kepala, nip, alamat_subdinas, telepon, username, waktu_input, user_update, waktu_update, password, aktif, hp, nama_admin, admin) 
	// VALUES ('$username', '$pass', 'thom', 'thom@email.com', '', 'admin', 'N', '', '', '', 'V') ");
	// mysql_query("UPDATE users SET password='$pass' ");
	// mysql_query("UPDATE subdinas SET password='$pass' WHERE nama_subdinas='SMK NEGERI 1 KUDUS' ");
$login=mysql_query("SELECT * FROM users WHERE username='$username' AND password='$pass' AND blokir='N'");
$loginn=mysql_query("SELECT * FROM subdinas WHERE username='$username' AND password='$pass' AND aktif ='A'");



$ketemu=mysql_num_rows($login);
$r=mysql_fetch_array($login);
  
$ketemuu=mysql_num_rows($loginn);
$rr=mysql_fetch_array($loginn);



// Apabila username dan password ditemukan
if ($ketemu > 0){
  session_start();
  include "timeout.php";
  $_SESSION['namauser']     = $r['username'];
  $_SESSION['namalengkap']  = $r['nama_lengkap'];
  $_SESSION['passuser']     = $r['password'];
  $_SESSION['leveluser']    = $r['level'];
  $_SESSION['id_session']   = $r['id_session'];
  $_SESSION['baru']   	  = $r['skpd'];
  $_SESSION['level']   	  = "admin";
  $_SESSION['view']   	  = $r['viewer'];
  $_SESSION['login'] = 1;
  $_SESSION['tahun'] = $_POST['tahun'];
  timer();
  $sid_lama = session_id();
	session_regenerate_id();
	$sid_baru = session_id();
 //  mysql_query("UPDATE users SET id_session='$sid_baru' WHERE username='$_SESSION[namauser]'");
  header('location:media.php?module=home');
}
// Apabila username dan password ditemukan
else if ($ketemuu > 0){
  session_start();
  include "timeout.php";
  $_SESSION['namauser']		= $rr['username'];
  $_SESSION['namalengkap']	= $rr['nama_admin'];
  $_SESSION['nama_sub']		= $rr['nama_subdinas'];
  $_SESSION['passuser']		= $rr['password'];
  $_SESSION['dinas']		= $rr['kode_subdinas'];
  $_SESSION['telepon']		= $rr['telepon'];
  $_SESSION['level']		= "user";
  $_SESSION['kades']		= $rr['kades'];
  $_SESSION['akses']		= $rr['akses'];
  $_SESSION['login']		= 1;
  $_SESSION['tahun']		= $_POST['tahun'];
  $_SESSION['upt']			= false;
  $_SESSION['kdsub']		= $rr['kd_sub'];
  if (strpos($rr['nama_subdinas'], 'UPT')!==false OR strpos($rr['nama_subdinas'], 'DINAS')!==false){
	$_SESSION['upt']        = true;
  }
  timer();
  $sid_lama = session_id();
	session_regenerate_id();
	$sid_baru = session_id();
  header('location:media.php?module=home');
}
else{
  include "error-login.php";
}





}
?>
