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
<center>	<h3>Laporan Aset Tanah ( KIS ) <br/><small>KARTU INVENTARIS BARANG </small></h3></center>
		
<hr>	
		<table style="border-collapse: collapse;" border="1" bordercolor="#000000" cellpadding="1" cellspacing="0" width="100%">
        <tbody>
	  <tr>
	    <td rowspan="3" bordercolor="#000000" bgcolor="#ffffff" width="28" align="center"><font face="Arial Narrow" size="1">No</font></td>
	    <td rowspan="3" bordercolor="#000000" bgcolor="#ffffff" width="83" align="center"><font face="Arial Narrow" size="1">Nama/Jenis Barang</font></td>
	    <td colspan="2" rowspan="2" bordercolor="#000000" bgcolor="#ffffff" align="center"><font face="Arial Narrow" size="1">Nomor</font></td>
	    <td rowspan="3" bordercolor="#000000" bgcolor="#ffffff" width="53" align="center"><font face="Arial Narrow" size="1">Luas (m2)</font></td>
	    <td rowspan="3" bordercolor="#000000" bgcolor="#ffffff" width="97" align="center"><font face="Arial Narrow" size="1">Tahun Pengadaan</font></td>
	    <td rowspan="3" bordercolor="#000000" bgcolor="#ffffff"><div align="center"><font face="Arial Narrow" size="1">Letak Alamat</font></div></td>
	    <td colspan="3" bordercolor="#000000" bgcolor="#ffffff" height="23" align="center"><font face="Arial Narrow" size="1">Status Tanah</font></td>
	    <td rowspan="3" bordercolor="#000000" bgcolor="#ffffff" align="center"><font face="Arial Narrow" size="1">Penggunaan</font></td>
	    <td rowspan="3" bordercolor="#000000" bgcolor="#ffffff" align="center"><font face="Arial Narrow" size="1">Jumlah</font></td>
	    <td rowspan="3" bordercolor="#000000" bgcolor="#ffffff" align="center"><font face="Arial Narrow" size="1">Asal Usul</font></td>
	    <td rowspan="3" bordercolor="#000000" bgcolor="#ffffff" align="center"><font face="Arial Narrow" size="1">Harga</font></td>
	    <td rowspan="3" bordercolor="#000000" bgcolor="#ffffff" align="center"><font face="Arial Narrow" size="1">Keterangan</font></td>
	  </tr>
	  <tr>
	    <td rowspan="2" bordercolor="#000000" bgcolor="#ffffff" align="center"><font face="Arial Narrow" size="1">Hak</font></td>
	    <td colspan="2" bordercolor="#000000" bgcolor="#ffffff" height="23" align="center"><font face="Arial Narrow" size="1">Sertifikat</font></td>
	  </tr>
	  <tr>
	    <td bordercolor="#000000" bgcolor="#ffffff" height="23" align="center"><font face="Arial Narrow" size="1">Kode Barang</font></td>
	    <td bordercolor="#000000" bgcolor="#ffffff" align="center"><font face="Arial Narrow" size="1">Register</font></td>
	    <td bordercolor="#000000" bgcolor="#ffffff" align="center"><font face="Arial Narrow" size="1">Tanggal</font></td>
	    <td bordercolor="#000000" bgcolor="#ffffff" align="center"><font face="Arial Narrow" size="1">Nomor</font></td>
	  </tr>
	  <tr>
	    <td bgcolor="#cccccc" height="24" align="center"><font face="Arial Narrow" size="1">1</font></td>
	    <td bgcolor="#cccccc" align="center"><font face="Arial Narrow" size="1">2</font></td>
	    <td bgcolor="#cccccc" align="center"><font face="Arial Narrow" size="1">3</font></td>
	    <td bgcolor="#cccccc" align="center"><font face="Arial Narrow" size="1">4</font></td>
	    <td bgcolor="#cccccc" align="center"><font face="Arial Narrow" size="1">5</font></td>
	    <td bgcolor="#cccccc" align="center"><font face="Arial Narrow" size="1">6</font></td>
	    <td bgcolor="#cccccc" align="center"><font face="Arial Narrow" size="1">7</font></td>
	    <td bgcolor="#cccccc" align="center"><font face="Arial Narrow" size="1">8</font></td>
	    <td bgcolor="#cccccc" align="center"><font face="Arial Narrow" size="1">9</font></td>
	    <td bgcolor="#cccccc" align="center"><font face="Arial Narrow" size="1">10</font></td>
	    <td bgcolor="#cccccc" align="center"><font face="Arial Narrow" size="1">11</font></td>
	    <td bgcolor="#cccccc" align="center"><font face="Arial Narrow" size="1">12</font></td>
	    <td bgcolor="#cccccc" align="center"><font face="Arial Narrow" size="1">13</font></td>
	    <td bgcolor="#cccccc" align="center"><font face="Arial Narrow" size="1">14</font></td>
	    <td bgcolor="#cccccc" align="center"><font face="Arial Narrow" size="1">15</font></td>		
	  </tr>
				<?php
													$bidang=$_GET[bidang];
									$barang=$_GET[barang];
									$skpd=$_GET[skpd];
									$tahun=$_GET[tahun];

                                              $tampil = mysql_query("SELECT * FROM invesa, barang, bidang, subdinas where invesa.skpd=subdinas.kode_subdinas and barang.kode_bidang=bidang.kode_bidang and barang.kode_barang=invesa.kode_barang and barang.kode_bidang like '%$bidang%'
  AND barang.kode_barang like '%$barang%' AND invesa.skpd like '%$skpd%' AND invesa.tahun_beli like '%$tahun%' ") or die (mysql_error());
  $no=1;
    while ($r=mysql_fetch_array($tampil)){
?>
  <tr>

   	              <td align="center"><?php echo"$no"; ?></td>
	              <td align="center"><font face="Arial Narrow" size="1"><?php echo"$r[nama_barang]"; ?></font></td>
	              <td align="center"><font face="Arial Narrow" size="1"><?php echo"$r[kode_barang]"; ?></font></td>
	              <td align="center"><font face="Arial Narrow" size="1"><?php echo"$r[kode_invesa]"; ?></font></td>
	              <td align="center"><font face="Arial Narrow" size="1"><?php echo"$r[luas]"; ?></font></td>
                  <td align="center"><font face="Arial Narrow" size="1"><?php echo"$r[tahun_beli]"; ?></font></td>
	              <td align="center"><font face="Arial Narrow" size="1"><?php echo"$r[alamat]"; ?></font></td>
	              <td align="center"><font face="Arial Narrow" size="1"><?php echo"$r[hak]"; ?></font></td>
	              <td align="center"><font face="Arial Narrow" size="1"><?php echo"$r[sertifikat_tgl]"; ?></font></td>
	              <td align="center"><font face="Arial Narrow" size="1"><?php echo"$r[sertifikat_no]"; ?></font></td>
	              <td align="center"><font face="Arial Narrow" size="1"><?php echo"$r[pengguna]"; ?></font></td>
	              <td align="center"><font face="Arial Narrow" size="1"><?php echo"$r[jumlah]"; ?></font></td>				  
	              <td align="center"><font face="Arial Narrow" size="1"><?php echo"$r[asal]"; ?></font></td>
	              <td align="right"><font face="Arial Narrow" size="1"><?php echo"$r[harga]"; ?> &nbsp; &nbsp; </font></td>
	              <td align="center"><font face="Arial Narrow" size="1"><?php echo"$r[keterangan]"; ?></font></td>
                      </tr>
<?php $no++;
} ?>			           <tr>
   	              <td colspan="11" align="center"><font face="Arial Narrow" size="1">SUB TOTAL</font></td>
	              <td align="center"><font face="Arial Narrow" size="1"><?php $aaaa=mysql_query("select sum(jumlah) as jumlahtotal from invesa, barang, bidang, subdinas where invesa.skpd=subdinas.kode_subdinas and barang.kode_bidang=bidang.kode_bidang and barang.kode_barang=invesa.kode_barang and barang.kode_bidang like '%$bidang%'
  AND barang.kode_barang like '%$barang%' AND invesa.skpd like '%$skpd%' AND invesa.tahun_beli like '%$tahun%'");
				  $d=mysql_fetch_array($aaaa); 
				  echo"$d[jumlahtotal]"; ?></font></td>				  
	              <td align="center"><font face="Arial Narrow" size="1">&nbsp;</font></td>
	              <td align="right"><font face="Arial Narrow" size="1"><?php $aaaa=mysql_query("select sum(harga) as jumlahtotal from invesa, barang, bidang, subdinas where invesa.skpd=subdinas.kode_subdinas and barang.kode_bidang=bidang.kode_bidang and barang.kode_barang=invesa.kode_barang and barang.kode_bidang like '%$bidang%'
  AND barang.kode_barang like '%$barang%' AND invesa.skpd like '%$skpd%' AND invesa.tahun_beli like '%$tahun%'");
				  $d=mysql_fetch_array($aaaa); 
				  echo"$d[jumlahtotal]"; ?> &nbsp; &nbsp; </font></td>
	              <td align="center"><font face="Arial Narrow" size="1">&nbsp;</font></td>
                  </tr>
			      <tr>				  
   	              <td colspan="11" align="center"><font face="Arial Narrow" size="1">TOTAL</font></td>
	              <td align="center"><font face="Arial Narrow" size="1"><?php $aaaa=mysql_query("select sum(jumlah) as jumlahtotal from invesa, barang, bidang, subdinas where invesa.skpd=subdinas.kode_subdinas and barang.kode_bidang=bidang.kode_bidang and barang.kode_barang=invesa.kode_barang and barang.kode_bidang like '%$bidang%'
  AND barang.kode_barang like '%$barang%' AND invesa.skpd like '%$skpd%' AND invesa.tahun_beli like '%$tahun%'");
				  $d=mysql_fetch_array($aaaa); 
				  echo"$d[jumlahtotal]"; ?></font></td>				  
	              <td align="center"><font face="Arial Narrow" size="1">&nbsp;</font></td>
	              <td align="right"><font face="Arial Narrow" size="1"><?php $aaaa=mysql_query("select sum(harga) as jumlahtotal from invesa, barang, bidang, subdinas where invesa.skpd=subdinas.kode_subdinas and barang.kode_bidang=bidang.kode_bidang and barang.kode_barang=invesa.kode_barang and barang.kode_bidang like '%$bidang%'
  AND barang.kode_barang like '%$barang%' AND invesa.skpd like '%$skpd%' AND invesa.tahun_beli like '%$tahun%'");
				  $d=mysql_fetch_array($aaaa); 
				  echo"$d[jumlahtotal]"; ?> &nbsp; &nbsp; </font></td>
	              <td align="center"><font face="Arial Narrow" size="1">&nbsp;</font></td>
                  </tr>
        </tbody>
        </table>
        <?php } ?>