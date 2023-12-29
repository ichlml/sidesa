<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>..::: Login Administrator :::..</title>
<link rel="stylesheet" type="text/css" href="style_login.css" />

<link rel="shortcut icon" href="images/images_admin/favicon.ico" />

<script type="text/javascript">
function validasi(form){
if (form.username.value == ""){
alert("Anda belum mengisikan Username");
form.username.focus();
return (false);
}
     
if (form.password.value == ""){
alert("Anda belum mengisikan Password");
form.password.focus();
return (false);
}

if (form.tahun.value == ""){
alert("Anda belum mengisikan Tahun input");
form.tahun.focus();
return (false);
}

return (true);
}
</script>

</head>

<body OnLoad="document.login.username.focus();">
<div id="main">

<!-- Header -->
<div id="header">
  <p><center><img src="images/images_login/LOGO-KABUPATEN-KUDUS.png" alt="Lokomedia" width="32" height="37" /></center></p>
  <p><center>Sistem Informasi Pendataan Aset Desa</center></p>
</div>

<!-- Middle -->
<div id="middle">
<form id="form-login" name="login" method="post" action="cek_login.php" onSubmit="return validasi(this)">
  
  <img src="images/images_login/img_login_user.png" align="absmiddle" class="img_user" />
  <input type="text" name="username" size="29" id="input" placeholder="username" />
  <br />
	
  <img src="images/images_login/img_login_pass.png" align="absmiddle" class="img_pass" />
  <input type="password" name="password" size="29" id="input" placeholder="password" />
  <br />
  
  <img src="images/images_login/img_login_year.png" align="absmiddle" class="img_pass" />
	<select name="tahun" style="width:267px" id="input">
		<option value="" selected disabled > -- pilih tahun input -- </option>
<?php
include "config/koneksi.php";
$tampil = mysql_query("SELECT * FROM tahun_input ORDER BY tahun DESC");
while ($row=mysql_fetch_array($tampil)){
	echo "<option value='$row[tahun]'>&nbsp; $row[tahun] &nbsp;</option>";
}
?>
	</select>
  <br />

  <input name="Submit" type="image" value="Submit" src="images/images_login/button_login.png" id="submit" align="absmiddle" />
</form>
</div>

<!-- don't Change ;) -->
<div class="clear"></div>

<!-- Footer -->
<div id="footer">Kecamatan Dawe Kabupaten Kudus</div>

<!-- vertical_effect -->
<div id="vertical_effect">&nbsp;</div>

</div>
</body>
</html>
