<?php 
include "../../config/koneksi.php";
include "../../config/fungsi_indotgl.php";
include "../../config/fungsi_combobox.php";
include "../../config/fungsi_rupiah.php";
include "../../config/bar128.php";
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{


header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=buku_inventaris.xls");//ganti nama sesuai keperluan
header("Pragma: no-cache");
header("Expires: 0");
?>
	<style type="text/css">
body table {
	text-align: center;
}
    </style>

<center>	<h3>BUKU INVENTARIS BARANG MILIK DESA<br/><small> </small></h3></center>
		
<?php
        if ($_SESSION['level']=='admin' OR $_SESSION['upt']){
        
          $tgl1 = $_SESSION ['tgl1'];
          $skpd = $_SESSION['skpd'];

        } else {
         
          $tgl1 = $_SESSION ['tgl1'];
        }
    ?>
<hr>	
<table width="100%" border="1">
<tr>
    <td rowspan="2" width="5%">No.</td>
    
    <td rowspan="2">Kode Barang</td>
    <td rowspan="2">Nama Barang</td>
    <?php
	if ($_SESSION['level']=='admin'){ 
?>
    <td rowspan="2">UPB</td>
<?php } ?>
    <td rowspan="2">Merk / Type</td>
    <td rowspan="2">Bahan</td>
	<td rowspan="2">Nomor Kendaraan/Sertifikat</td>
	<td rowspan="2">Luas / Ukuran</td>
    <td rowspan="2">Asal-Usul</td>
	<td colspan="4">Pembukuan</td>
	<td rowspan="2" width="15%">Keterangan</td></tr>
  <tr>
    <td>Tahun</td>
    <td>Banyaknya</td>
    <td>Harga Satuan</td>
	<td>Jumlah</td>
  </tr>
  <?php
	if ($_SESSION['level']=='admin' OR $_SESSION['upt']){ 
?>
  <tr>
    <td bgcolor="#CCCCCC">1</td>
    <td bgcolor="#CCCCCC">2</td>
    <td bgcolor="#CCCCCC">3</td>
    <td bgcolor="#CCCCCC">4</td>
    <td bgcolor="#CCCCCC">5</td>
    <td bgcolor="#CCCCCC">6</td>
    <td bgcolor="#CCCCCC">7</td>
    <td bgcolor="#CCCCCC">8</td>
    <td bgcolor="#CCCCCC">9</td>
    <td bgcolor="#CCCCCC">10</td>
    <td bgcolor="#CCCCCC">11</td>
    <td bgcolor="#CCCCCC">12</td>
    <td bgcolor="#CCCCCC">13</td>
	<td bgcolor="#CCCCCC">14</td>
  </tr>


<?php } else { ?>  
  <tr>
    <td bgcolor="#CCCCCC">1</td>
    <td bgcolor="#CCCCCC">2</td>
    <td bgcolor="#CCCCCC">3</td>
    <td bgcolor="#CCCCCC">4</td>
    <td bgcolor="#CCCCCC">5</td>
    <td bgcolor="#CCCCCC">6</td>
    <td bgcolor="#CCCCCC">7</td>
    <td bgcolor="#CCCCCC">8</td>
    <td bgcolor="#CCCCCC">9</td>
    <td bgcolor="#CCCCCC">10</td>
    <td bgcolor="#CCCCCC">11</td>
    <td bgcolor="#CCCCCC">12</td>
	<td bgcolor="#CCCCCC">13</td>
  </tr>
  <?php } ?>


				<?php
                      

if ($_SESSION['level']=='admin'){ 
  $tampil = mysql_query(
  "select  kode_subdinas, nama_subdinas, kode_barang, nama_barang, merk, bahan, no_sertifikat, luas, sumber_dana, tahun, tanggal_pembelian, sum( jumlah) as jumlah, harga,sum(total) as total,keterangan from 
  (select a.id_invesa, a.skpd as kode_subdinas, c.nama_subdinas as nama_subdinas,a.kode_barang as kode_barang, b.nama_barang as nama_barang, NULL as merk, NULL as bahan, a.no_sertifikat as no_sertifikat, a.luas as luas, a.sumber_dana as sumber_dana, 
  year(a.tanggal_pembelian) as tahun, a.tanggal_pembelian,  a.jumlah as jumlah,( a.harga+ ifnull(d.harga,0)) as harga, (a.jumlah* (a.harga+ifnull(d.harga,0))) as total ,a.keterangan as keterangan from invesa a
  inner join barang b on a.kode_barang=b.kode_barang
  inner join subdinas c on a.skpd=c.kode_subdinas 	
  Left join (select id_inves, kode_barang, sum(nilai) as harga from tb_pemeliharaan where tgl_documen<='$_SESSION[tgl1]') d on a.kode_barang=d.kode_barang and a.id_invesa=d.id_inves
  left join (select id_inves, kode_barang from penghapusan where tgl_sk<='$_SESSION[tgl1]') e on  a.kode_barang=e.kode_barang and a.id_invesa=e.id_inves
  where e.kode_barang is null and e.id_inves is null
  
  
  union all
  select a.id_invesb,  a.skpd as kode_subdinas, c.nama_subdinas as nama_subdinas,a.kode_barang as kode_barang, b.nama_barang as nama_barang, a.merk as merk, a.bahan as bahan, a.nomor_pol as no_sertifikat, a.ukuran as luas, a.sumber_dana as sumber_dana, 
  year(a.tanggal_pembelian) as tahun, a.tanggal_pembelian,  a.jumlah as jumlah,( a.harga+ ifnull(d.harga,0)) as harga, (a.jumlah* (a.harga+ifnull(d.harga,0))) as total, a.keterangan as keterangan from invesb a
  inner join barang b on a.kode_barang=b.kode_barang
  inner join subdinas c on a.skpd=c.kode_subdinas 
  Left join (select id_inves, kode_barang, sum(nilai) as harga from tb_pemeliharaan where tgl_documen<='$_SESSION[tgl1]') d on a.kode_barang=d.kode_barang and a.id_invesb=d.id_inves
  left join (select id_inves, kode_barang from penghapusan where tgl_sk<='$_SESSION[tgl1]') e on  a.kode_barang=e.kode_barang and a.id_invesb=e.id_inves
  where e.kode_barang is null and e.id_inves is null
  
  union all 
  select  a.id_invesc,  a.skpd as kode_subdinas, c.nama_subdinas as nama_subdinas,a.kode_barang as kode_barang, b.nama_barang as nama_barang, NULL as merk, a.kondisi_beton as bahan, NULL as no_sertifikat, a.luas as luas, a.sumber_dana as sumber_dana, 
  year(a.tanggal_pembelian) as tahun, a.tanggal_pembelian,  a.jumlah as jumlah ,( a.harga+ ifnull(d.harga,0)) as harga, (a.jumlah* (a.harga+ifnull(d.harga,0))) as total, a.keterangan as keterangan from invesc a
  inner join barang b on a.kode_barang=b.kode_barang
  inner join subdinas c on a.skpd=c.kode_subdinas 
  Left join (select id_inves, kode_barang, sum(nilai) as harga from tb_pemeliharaan where tgl_documen<='$_SESSION[tgl1]') d on a.kode_barang=d.kode_barang and a.id_invesc=d.id_inves
  left join (select id_inves, kode_barang from penghapusan where tgl_sk<='$_SESSION[tgl1]') e on  a.kode_barang=e.kode_barang and a.id_invesc=e.id_inves
  where e.kode_barang is null and e.id_inves is null
  
  union all
  select a.id_invesd,  a.skpd as kode_subdinas, c.nama_subdinas as nama_subdinas, a.kode_barang as kode_barang, b.nama_barang as nama_barang,  NULL as merk, a.konstruksi as bahan, NULL as no_sertifikat, a.luas as luas, a.sumber_dana as sumber_dana, 
  year(a.tanggal_pembelian) as tahun, a.tanggal_pembelian,  a.jumlah as jumlah ,( a.harga+ ifnull(d.harga,0)) as harga, (a.jumlah* (a.harga+ifnull(d.harga,0))) as total, a.keterangan as keterangan from invesd a
  inner join barang b on a.kode_barang=b.kode_barang
  inner join subdinas c on a.skpd=c.kode_subdinas 
  Left join (select id_inves, kode_barang, sum(nilai) as harga from tb_pemeliharaan where tgl_documen<='$_SESSION[tgl1]') d on a.kode_barang=d.kode_barang and a.id_invesd=d.id_inves
  left join (select id_inves, kode_barang from penghapusan where tgl_sk<='$_SESSION[tgl1]') e on  a.kode_barang=e.kode_barang and a.id_invesd=e.id_inves  
  where e.kode_barang is null and e.id_inves is null
  
  union all
  select a.id_invese,  a.skpd as kode_subdinas, c.nama_subdinas as nama_subdinas, a.kode_barang as kode_barang, b.nama_barang as nama_barang, NULL as merk, a.bahan as bahan, NULL as no_sertifikat, NULL as luas, a.sumber_dana as sumber_dana, 
  year(a.tanggal_pembelian) as tahun, a.tanggal_pembelian, a.jumlah as jumlah,( a.harga+ ifnull(d.harga,0)) as harga, (a.jumlah* (a.harga+ifnull(d.harga,0))) as total, a.keterangan as keterangan from invese a
  inner join barang b on a.kode_barang=b.kode_barang
  inner join subdinas c on a.skpd=c.kode_subdinas
  Left join (select id_inves, kode_barang, sum(nilai) as harga from tb_pemeliharaan where tgl_documen<='$_SESSION[tgl1]') d on a.kode_barang=d.kode_barang and a.id_invese=d.id_inves
  left join (select id_inves, kode_barang from penghapusan where tgl_sk<='$_SESSION[tgl1]') e on  a.kode_barang=e.kode_barang and a.id_invese=e.id_inves  
  where e.kode_barang is null and e.id_inves is null) as d 
  where kode_subdinas like '$skpd' and tanggal_pembelian <='$_SESSION[tgl1]'
  group by kode_subdinas, nama_subdinas, kode_barang, nama_barang, merk, bahan, no_sertifikat, luas, sumber_dana, tahun, tanggal_pembelian, harga, keterangan
  order by kode_barang") or die (mysql_error());
  



} else {
  $tampil = mysql_query(
  "select  kode_subdinas, nama_subdinas, kode_barang, nama_barang, merk, bahan, no_sertifikat, luas, sumber_dana, tahun, tanggal_pembelian, sum( jumlah) as jumlah, harga,sum(total) as total,keterangan from 
  (select a.id_invesa, a.skpd as kode_subdinas, c.nama_subdinas as nama_subdinas,a.kode_barang as kode_barang, b.nama_barang as nama_barang, NULL as merk, NULL as bahan, a.no_sertifikat as no_sertifikat, a.luas as luas, a.sumber_dana as sumber_dana, 
  year(a.tanggal_pembelian) as tahun, a.tanggal_pembelian,  a.jumlah as jumlah,( a.harga+ ifnull(d.harga,0)) as harga, (a.jumlah* (a.harga+ifnull(d.harga,0))) as total ,a.keterangan as keterangan from invesa a
  inner join barang b on a.kode_barang=b.kode_barang
  inner join subdinas c on a.skpd=c.kode_subdinas 	
Left join (select id_inves, kode_barang, sum(nilai) as harga from tb_pemeliharaan where tgl_documen<='$_SESSION[tgl1]') d on a.kode_barang=d.kode_barang and a.id_invesa=d.id_inves
left join (select id_inves, kode_barang from penghapusan where tgl_sk<='$_SESSION[tgl1]') e on  a.kode_barang=e.kode_barang and a.id_invesa=e.id_inves
where e.kode_barang is null and e.id_inves is null


  union all
  select a.id_invesb,  a.skpd as kode_subdinas, c.nama_subdinas as nama_subdinas,a.kode_barang as kode_barang, b.nama_barang as nama_barang, a.merk as merk, a.bahan as bahan, a.nomor_pol as no_sertifikat, a.ukuran as luas, a.sumber_dana as sumber_dana, 
  year(a.tanggal_pembelian) as tahun, a.tanggal_pembelian,  a.jumlah as jumlah,( a.harga+ ifnull(d.harga,0)) as harga, (a.jumlah* (a.harga+ifnull(d.harga,0))) as total, a.keterangan as keterangan from invesb a
  inner join barang b on a.kode_barang=b.kode_barang
  inner join subdinas c on a.skpd=c.kode_subdinas 
Left join (select id_inves, kode_barang, sum(nilai) as harga from tb_pemeliharaan where tgl_documen<='$_SESSION[tgl1]') d on a.kode_barang=d.kode_barang and a.id_invesb=d.id_inves
left join (select id_inves, kode_barang from penghapusan where tgl_sk<='$_SESSION[tgl1]') e on  a.kode_barang=e.kode_barang and a.id_invesb=e.id_inves
where e.kode_barang is null and e.id_inves is null

  union all
  select  a.id_invesc,  a.skpd as kode_subdinas, c.nama_subdinas as nama_subdinas,a.kode_barang as kode_barang, b.nama_barang as nama_barang, NULL as merk, a.kondisi_beton as bahan, NULL as no_sertifikat, a.luas as luas, a.sumber_dana as sumber_dana, 
  year(a.tanggal_pembelian) as tahun, a.tanggal_pembelian,  a.jumlah as jumlah ,( a.harga+ ifnull(d.harga,0)) as harga, (a.jumlah* (a.harga+ifnull(d.harga,0))) as total, a.keterangan as keterangan from invesc a
  inner join barang b on a.kode_barang=b.kode_barang
  inner join subdinas c on a.skpd=c.kode_subdinas 
Left join (select id_inves, kode_barang, sum(nilai) as harga from tb_pemeliharaan where tgl_documen<='$_SESSION[tgl1]') d on a.kode_barang=d.kode_barang and a.id_invesc=d.id_inves
left join (select id_inves, kode_barang from penghapusan where tgl_sk<='$_SESSION[tgl1]') e on  a.kode_barang=e.kode_barang and a.id_invesc=e.id_inves
where e.kode_barang is null and e.id_inves is null

  union all
  select a.id_invesd,  a.skpd as kode_subdinas, c.nama_subdinas as nama_subdinas, a.kode_barang as kode_barang, b.nama_barang as nama_barang,  NULL as merk, a.konstruksi as bahan, NULL as no_sertifikat, a.luas as luas, a.sumber_dana as sumber_dana, 
  year(a.tanggal_pembelian) as tahun, a.tanggal_pembelian,  a.jumlah as jumlah ,( a.harga+ ifnull(d.harga,0)) as harga, (a.jumlah* (a.harga+ifnull(d.harga,0))) as total, a.keterangan as keterangan from invesd a
  inner join barang b on a.kode_barang=b.kode_barang
  inner join subdinas c on a.skpd=c.kode_subdinas 
Left join (select id_inves, kode_barang, sum(nilai) as harga from tb_pemeliharaan where tgl_documen<='$_SESSION[tgl1]') d on a.kode_barang=d.kode_barang and a.id_invesd=d.id_inves
left join (select id_inves, kode_barang from penghapusan where tgl_sk<='$_SESSION[tgl1]') e on  a.kode_barang=e.kode_barang and a.id_invesd=e.id_inves  
where e.kode_barang is null and e.id_inves is null

union all
  select a.id_invese,  a.skpd as kode_subdinas, c.nama_subdinas as nama_subdinas, a.kode_barang as kode_barang, b.nama_barang as nama_barang, NULL as merk, a.bahan as bahan, NULL as no_sertifikat, NULL as luas, a.sumber_dana as sumber_dana, 
  year(a.tanggal_pembelian) as tahun, a.tanggal_pembelian, a.jumlah as jumlah,( a.harga+ ifnull(d.harga,0)) as harga, (a.jumlah* (a.harga+ifnull(d.harga,0))) as total, a.keterangan as keterangan from invese a
  inner join barang b on a.kode_barang=b.kode_barang
  inner join subdinas c on a.skpd=c.kode_subdinas
Left join (select id_inves, kode_barang, sum(nilai) as harga from tb_pemeliharaan where tgl_documen<='$_SESSION[tgl1]') d on a.kode_barang=d.kode_barang and a.id_invese=d.id_inves
left join (select id_inves, kode_barang from penghapusan where tgl_sk<='$_SESSION[tgl1]') e on  a.kode_barang=e.kode_barang and a.id_invese=e.id_inves  
where e.kode_barang is null and e.id_inves is null) as d 
  where kode_subdinas='$_SESSION[dinas]' and tanggal_pembelian <='$_SESSION[tgl1]'
group by kode_subdinas, nama_subdinas, kode_barang, nama_barang, merk, bahan, no_sertifikat, luas, sumber_dana, tahun, tanggal_pembelian, harga, keterangan
  order by kode_barang") or die (mysql_error());

}

$no=1; $total_harga_satuan = 0;

  while ($r=mysql_fetch_array($tampil)){

    $tgl = tgl_indo($r['tanggal_pembelian']);
    $harga = format_rupiah($r['harga']);
    // $hargaa = $r['harga'] * $r['jumlah'];
    $total = format_rupiah($r['total']);
    $total_harga_satuan += $r['total'];



?>
<tr>
  <td align="center"><?php echo"$no"; ?></td>
  <td align="left">&nbsp;<?php echo"$r[kode_barang]"; ?></td>
  <td align="left">&nbsp;<?php echo"$r[nama_barang]"; ?></td>
      <?php
if ($_SESSION['level']=='admin'){ 
?>
  <td align="left">&nbsp;<?php echo"$r[nama_subdinas]"; ?></td>
<?php } ?>

  <td align="left">&nbsp;<?php echo"$r[merk]"; ?></td>
  <td align="left">&nbsp;<?php echo"$r[bahan]"; ?></td>
<td align="left">&nbsp;<?php echo"$r[no_sertifikat]"; ?></td>
  <td align="left">&nbsp;<?php echo"$r[luas]"; ?></td>
  <td align="left">&nbsp;<?php echo"$r[sumber_dana]"; ?></td>
  <td align="left">&nbsp;<?php echo"$r[tahun]"; ?></td>
  <td align="left">&nbsp;<?php echo"$r[jumlah]"; ?></td>
<td align="left">&nbsp;<?php echo"$harga"; ?></td>
  <td align="right"><?php echo"Rp. $total,-"; ?>&nbsp;</td>
  <td align="left">&nbsp;<?php echo"$r[keterangan]"; ?></td>
</tr>
<?php $no++;
} ?>			      <tr>
<?php
if ($_SESSION['level']=='admin'){ 
$jmmmm = "12";
} else {
$jmmmm = "11";
}
	?>
    
    <?php
 if ($_SESSION['level']=='admin'){ 
 	$dinas  = "";
 } else {
 	$dinas  = "skpd = '$_SESSION[dinas]'";
 }
	?>
   	             
    
                  <td colspan="<?php echo"$jmmmm"; ?>" align="center" bgcolor="#CCCCCC">TOTAL</td>
	              <td align="right" bgcolor="#CCCCCC"><?php
				    					$jumlahtotal = format_rupiah($total_harga_satuan);

											echo"Rp. $jumlahtotal,-"; ?>&nbsp;</td>

	              <td align="center" bgcolor="#CCCCCC"><font face="Arial Narrow" size="1">&nbsp;</font></td>
                  </tr>
		
			  

        </table>
        <?php } ?>

        <table border="0"  width="100%">
        <tr >
            <td colspan="10"  width="100"> </td> 
            <?php
              if($_SESSION['level']=='user'){
            ?>     
            <td >Kepala Desa </td>  
            <?php
              }else{
            ?>  
              <td >Kepala Kecamatan </td> 
            <?php
              }
            ?>
          </tr>
          <tr >
            <td colspan="10" style="padding:20px 0;"> </td>    
            <!-- <td colspan="">NAma</td>     -->
          </tr>
          <tr >
            <td colspan="10" "> </td> 
            <?php
              if($_SESSION['level'] == 'user'){
            ?>   
            <td ><?=$_SESSION['kades']?></td>    
            <?php
              }else{
            ?>
                <td >Kecamatan Dawe</td>
            <?php
              }
            ?>
          </tr>
        </table>