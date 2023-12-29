<?php
include "../../config/koneksi.php";
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{

header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=Inventaris.xls");//ganti nama sesuai keperluan
header("Pragma: no-cache");
header("Expires: 0");
?>
<center>	<h3>LAPORAN <strong>KONSTRUKSI</strong>( KIS ) <br/><small>KARTU INVENTARIS BARANG </small></h3></center>
		
<table style="border-collapse: collapse;" border="1" bordercolor="#000000" cellpadding="1" cellspacing="0" width="98%">
        <tbody>
	<tr>
	    <td rowspan="2" bordercolor="#000000" bgcolor="#ffffff" width="26" align="center"><font face="Arial Narrow" size="1">No</font></td>
	    <td rowspan="2" bordercolor="#000000" bgcolor="#ffffff" width="139" align="center"><font face="Arial Narrow" size="1">Nama / Jenis Barang </font></td>
	    <td rowspan="2" bordercolor="#000000" bgcolor="#ffffff" width="100" align="center"><font face="Arial Narrow" size="1">Bangunan (P,SP,D) </font></td>
	    <td colspan="2" bordercolor="#000000" bgcolor="#ffffff" align="center"><font face="Arial Narrow" size="1">Konstruksi</font></td>
	    <td rowspan="2" bordercolor="#000000" bgcolor="#ffffff" width="53" align="center"><font face="Arial Narrow" size="1">Luas (M2) </font></td>
	    <td rowspan="2" bordercolor="#000000" bgcolor="#ffffff" width="155" align="center"><font face="Arial Narrow" size="1">Letak/ Lokasi Alamat    </font></td>
	    <td colspan="2" bordercolor="#000000" bgcolor="#ffffff" align="center"><font face="Arial Narrow" size="1">Dokumen Gedung </font></td>
	    <td rowspan="2" bordercolor="#000000" bgcolor="#ffffff" width="64" align="center"><font face="Arial Narrow" size="1">Tanggal Mulai </font></td>
	    <td rowspan="2" bordercolor="#000000" bgcolor="#ffffff" width="55" align="center"><font face="Arial Narrow" size="1">Status Tanah </font></td>
	    <td rowspan="2" bordercolor="#000000" bgcolor="#ffffff" width="55" align="center"><font face="Arial Narrow" size="1">Nomor Kode Tanah </font></td>
	    <td rowspan="2" bordercolor="#000000" bgcolor="#ffffff" width="50" align="center"><font face="Arial Narrow" size="1">Jumlah</font></td>
	    <td rowspan="2" bordercolor="#000000" bgcolor="#ffffff" width="75" align="center"><font face="Arial Narrow" size="1">Asal Pembiayaan </font></td>
	    <td rowspan="2" bordercolor="#000000" bgcolor="#ffffff" width="75" align="center"><font face="Arial Narrow" size="1">Nilai Kontrak (Ribuan Rp.) </font></td>
	    <td rowspan="2" bordercolor="#000000" bgcolor="#ffffff" width="96" align="center"><font face="Arial Narrow" size="1">Keterangan</font></td>
	  </tr>
	  <tr>
	    <td bordercolor="#000000" bgcolor="#ffffff" height="23" width="69" align="center"><font face="Arial Narrow" size="1"> Bertingkat/ Tidak </font></td>
	    <td bordercolor="#000000" bgcolor="#ffffff" width="69" align="center"><font face="Arial Narrow" size="1">Beton/ Tidak </font></td>
	    <td bordercolor="#000000" bgcolor="#ffffff" width="58" align="center"><font face="Arial Narrow" size="1">Tanggal</font></td>
	    <td bordercolor="#000000" bgcolor="#ffffff" width="61" align="center"><font face="Arial Narrow" size="1">Nomor</font></td>
	  </tr>
	  <tr>
	    <td bordercolor="#000000" bgcolor="#cccccc" height="24"><div class="style3" align="center"><font face="Arial Narrow" size="1">1</font></div></td>
	    <td bordercolor="#000000" bgcolor="#cccccc" align="center"><font face="Arial Narrow" size="1">2</font></td>
	    <td bordercolor="#000000" bgcolor="#cccccc" align="center"><font face="Arial Narrow" size="1">3</font></td>
	    <td bordercolor="#000000" bgcolor="#cccccc" align="center"><font face="Arial Narrow" size="1">4</font></td>
	    <td bordercolor="#000000" bgcolor="#cccccc" align="center"><font face="Arial Narrow" size="1">5</font></td>
	    <td bordercolor="#000000" bgcolor="#cccccc" align="center"><font face="Arial Narrow" size="1">6</font></td>
	    <td bordercolor="#000000" bgcolor="#cccccc" align="center"><font face="Arial Narrow" size="1">7</font></td>
	    <td bordercolor="#000000" bgcolor="#cccccc" align="center"><font face="Arial Narrow" size="1">8</font></td>
	    <td bordercolor="#000000" bgcolor="#cccccc" align="center"><font face="Arial Narrow" size="1">9</font></td>
	    <td bordercolor="#000000" bgcolor="#cccccc" align="center"><font face="Arial Narrow" size="1">10</font></td>
	    <td bordercolor="#000000" bgcolor="#cccccc" align="center"><font face="Arial Narrow" size="1">11</font></td>
	    <td bordercolor="#000000" bgcolor="#cccccc" align="center"><font face="Arial Narrow" size="1">12</font></td>
	    <td bordercolor="#000000" bgcolor="#cccccc" align="center"><font face="Arial Narrow" size="1">13</font></td>
	    <td bordercolor="#000000" bgcolor="#cccccc" align="center"><font face="Arial Narrow" size="1">14</font></td>
	    <td bordercolor="#000000" bgcolor="#cccccc" align="center"><font face="Arial Narrow" size="1">15</font></td>
	    <td bordercolor="#000000" bgcolor="#cccccc" align="center"><font face="Arial Narrow" size="1">16</font></td>
	  </tr>
      <?php
                                              $tampil = mysql_query("SELECT * FROM invesf, barang, subdinas where invesf.skpd=subdinas.kode_subdinas and barang.kode_barang=invesf.kode_barang order by kode_invesf DESC") or die (mysql_error());
  $no=1;
    while ($r=mysql_fetch_array($tampil)){
?>	<tr>
   	              <td align="center"><font face="Arial Narrow" size="1"><?php echo"$no"; ?></font></td>
	              <td align="center"><font face="Arial Narrow" size="1"><?php echo"$r[nama_barang]"; ?></font></td>
	              <td align="center"><font face="Arial Narrow" size="1"><?php echo"$r[bangunan]"; ?></font></td>
	              <td align="center"><font face="Arial Narrow" size="1"><?php echo"$r[kondisi_bangunan]"; ?></font></td>
	              <td align="center"><font face="Arial Narrow" size="1"><?php echo"$r[kondisi_beton]"; ?></font></td>
                  <td align="center"><font face="Arial Narrow" size="1"><?php echo"$r[luas]"; ?></font></td>
	              <td align="center"><font face="Arial Narrow" size="1"><?php echo"$r[alamat]"; ?></font></td>
	              <td align="center"><font face="Arial Narrow" size="1"><?php echo"$r[sertifikat_tgl]"; ?></font></td>
	              <td align="center"><font face="Arial Narrow" size="1"><?php echo"$r[sertifikat_nomor]"; ?></font></td>
	              <td align="center"><font face="Arial Narrow" size="1"><?php echo"$r[tanggal_mulai]"; ?></font></td>
	              <td align="center"><font face="Arial Narrow" size="1"><?php echo"$r[status_tanah]"; ?></font></td>
	              <td align="center"><font face="Arial Narrow" size="1"><?php echo"$r[kode_tanah]"; ?></font></td>
        <td align="center"><font face="Arial Narrow" size="1"><?php echo"$r[jumlah]"; ?></font></td>
	              <td align="center"><font face="Arial Narrow" size="1"<?php echo"$r[asal]"; ?>></font></td>
	              <td align="right"><font face="Arial Narrow" size="1"><?php echo"$r[harga]"; ?></font></td>
	              <td align="center"><font face="Arial Narrow" size="1"><?php echo"$r[keterangan]"; ?></font></td>
                </tr>
                      <?php $no++; } ?>
			       <tr>
   	              <td colspan="11" align="center"><font face="Arial Narrow" size="1">SUB TOTAL</font></td>
	              <td align="center"><font face="Arial Narrow" size="1"><?php $aaaa=mysql_query("select sum(jumlah) as jumlahtotal from invesf");
				  $d=mysql_fetch_array($aaaa); 
				  echo"$d[jumlahtotal]"; ?></font></td>				  
	              <td align="center"><font face="Arial Narrow" size="1">&nbsp;</font></td>
	              <td align="center"><font face="Arial Narrow" size="1">&nbsp;</font></td>
	              <td align="right"><font face="Arial Narrow" size="1"><?php $aaaa=mysql_query("select sum(harga) as jumlahtotal from invesf");
				  $d=mysql_fetch_array($aaaa); 
				  echo"$d[jumlahtotal]"; ?></font></td>
	              <td align="center"><font face="Arial Narrow" size="1">&nbsp;</font></td>
                  </tr>
			      <tr>				  
   	              <td colspan="11" align="center"><font face="Arial Narrow" size="1">TOTAL</font></td>
	              <td align="center"><font face="Arial Narrow" size="1"><?php $aaaa=mysql_query("select sum(jumlah) as jumlahtotal from invesf");
				  $d=mysql_fetch_array($aaaa); 
				  echo"$d[jumlahtotal]"; ?></font></td>				  
	              <td align="center"><font face="Arial Narrow" size="1">&nbsp;</font></td>
	              <td align="center"><font face="Arial Narrow" size="1">&nbsp;</font></td>
	              <td align="right"><font face="Arial Narrow" size="1"><?php $aaaa=mysql_query("select sum(harga) as jumlahtotal from invesf");
				  $d=mysql_fetch_array($aaaa); 
				  echo"$d[jumlahtotal]"; ?></font></td>
	              <td align="center"><font face="Arial Narrow" size="1">&nbsp;</font></td>
                  </tr></tbody></table> <?php }?>