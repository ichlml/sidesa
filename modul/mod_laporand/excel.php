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
header("Content-Disposition: attachment; filename=INVENTARIS_JALAN_IRIGASI_JARINGAN.xls");//ganti nama sesuai keperluan
header("Pragma: no-cache");
header("Expires: 0");
?>
	<style type="text/css">
body table {
	text-align: center;
}
    </style>

<center>	<h3>KARTU INVENTARIS BARANG MILIK DESA<br/><small>JALAN, IRIGASI DAN JARINGAN </small></h3></center>
		
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
	if ($_SESSION['level']=='admin' OR $_SESSION['upt']){ 
?>
    <td rowspan="2">UPB</td>
<?php } ?>
<td rowspan="2">Panjang</td>
    <td rowspan="2">Lebar</td>
    <td rowspan="2">Luas / Ukuran</td>
    <td rowspan="2">Sumber Dana</td>
    <td colspan="4">Pembukuan</td>
    <td rowspan="2" width="15%">Keterangan</td>
  </tr>
  <tr>
    <td>Tanggal</td>
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
  </tr>
  <?php } ?>

				<?php
if ($_SESSION['level']=='admin' OR $_SESSION['upt']){ 
  $tampil = mysql_query("Select  skpd, kode_barang, nama_barang, nama_subdinas,panjang, lebar, luas, sumber_dana, tanggal_pembelian,  sum(jumlah) as jumlah, harga, sum(total) as total, keterangan from  (
    SELECT a.id_invesd, a.skpd, a.kode_barang, b.nama_barang, c.nama_subdinas,a.panjang, a.lebar, a.luas, a.sumber_dana, a.tanggal_pembelian,  a.jumlah,( a.harga+ ifnull(d.harga,0)) as harga, (a.jumlah* (a.harga+ifnull(d.harga,0))) as total,  a.keterangan FROM invesd a 
    Inner join barang b on a.kode_barang=b.kode_barang
    Left join (select id_inves, kode_barang, sum(nilai) as harga from tb_pemeliharaan where tgl_documen<='$_SESSION[tgl1]' group by id_inves, kode_barang) d on a.kode_barang=d.kode_barang and a.id_invesd=d.id_inves
    left join (select id_inves, kode_barang from penghapusan where tgl_sk<='$_SESSION[tgl1]') e on  a.kode_barang=e.kode_barang and a.id_invesd=e.id_inves
    Inner join subdinas c on a.skpd=c.kode_subdinas
    where a.skpd like '$skpd' and a.tanggal_pembelian <= '$_SESSION[tgl1]' and e.kode_barang is null and e.id_inves is null)  as x
      group by skpd, kode_barang, nama_barang, nama_subdinas,panjang, lebar, luas, sumber_dana, tanggal_pembelian, harga, keterangan
      order by kode_barang") or die (mysql_error());
} else {
  $tampil = mysql_query("Select  skpd, kode_barang, nama_barang, nama_subdinas,panjang, lebar, luas, sumber_dana, tanggal_pembelian,  sum(jumlah) as jumlah, harga, sum(total) as total, keterangan from  (
    SELECT a.id_invesd, a.skpd, a.kode_barang, b.nama_barang, c.nama_subdinas,a.panjang, a.lebar, a.luas, a.sumber_dana, a.tanggal_pembelian,  a.jumlah,( a.harga+ ifnull(d.harga,0)) as harga, (a.jumlah* (a.harga+ifnull(d.harga,0))) as total,  a.keterangan FROM invesd a 
    Inner join barang b on a.kode_barang=b.kode_barang
    Left join (select id_inves, kode_barang, sum(nilai) as harga from tb_pemeliharaan where tgl_documen<='$_SESSION[tgl1]' group by id_inves, kode_barang) d on a.kode_barang=d.kode_barang and a.id_invesd=d.id_inves
    left join (select id_inves, kode_barang from penghapusan where tgl_sk<='$_SESSION[tgl1]') e on  a.kode_barang=e.kode_barang and a.id_invesd=e.id_inves
    Inner join subdinas c on a.skpd=c.kode_subdinas
    where a.skpd = '$_SESSION[dinas]' and a.tanggal_pembelian <= '$_SESSION[tgl1]' and e.kode_barang is null and e.id_inves is null)  as x
      group by skpd, kode_barang, nama_barang, nama_subdinas,panjang, lebar, luas, sumber_dana, tanggal_pembelian, harga,keterangan
      order by kode_barang") or die (mysql_error());
    }
    $no=1; $total_harga_satuan = 0;
    // $total_harga_jumlah = 0;
      while ($r=mysql_fetch_array($tampil)){
   
   
    $tgl = tgl_indo($r['tanggal_pembelian']);
    $harga = format_rupiah($r['harga']);
    // $hargaa = $r['harga'] * $r['jumlah'];
    $total = format_rupiah($r['total']);
    $total_harga_satuan += $r['total'];
    // $total_harga_jumlah += $hargaa;
    // $hargaa = format_rupiah($hargaa);
    
     
    
    
    ?>
     <tr>
      <td align="center"><?php echo"$no"; ?></td>
      <td align="left">&nbsp;<?php echo"$r[kode_barang]"; ?></td>
      <td align="left">&nbsp;<?php echo"$r[nama_barang]"; ?></td>
          <?php
    if ($_SESSION['level']=='admin' OR $_SESSION['upt']){ 
  ?>
      <td align="left">&nbsp;<?php echo"$r[nama_subdinas]"; ?></td>
  <?php } ?>
  
  <td align="left">&nbsp;<?php echo"$r[panjang]"; ?></td>
      <td align="left">&nbsp;<?php echo"$r[lebar]"; ?></td>
      <td align="left">&nbsp;<?php echo"$r[luas]"; ?></td>
      <td align="left">&nbsp;<?php echo"$r[sumber_dana]"; ?></td>
      <td align="left">&nbsp;<?php echo"$tgl"; ?></td>
      <td align="left">&nbsp;<?php echo"$r[jumlah]"; ?></td>
      <td align="right"><?php echo"$harga"; ?>&nbsp;</td>
      <td align="right"><?php echo"Rp. $total,-"; ?>&nbsp;</td>
      <td align="left">&nbsp;<?php echo"$r[keterangan]"; ?></td>
    </tr>
  <?php $no++;
  } ?>			      <tr>
  <?php
    if ($_SESSION['level']=='admin' OR $_SESSION['upt']){ 
  $jmmmm = "11";
    } else {
  $jmmmm = "10";
	}
	?>        <td colspan="<?php echo"$jmmmm"; ?>" align="center" bgcolor="#CCCCCC">TOTAL</td>
  <!--	              <td align="right" bgcolor="#CCCCCC"><?php
                       // if ($_SESSION['level']=='admin'){ 
   // $aaaa=mysql_query("select sum(harga) as jumlahtotal from invesd");
                     // } else {
                   // $aaaa=mysql_query("select sum(harga) as jumlahtotal from invesd where skpd = '$_SESSION[dinas]' ");
     // }
                     // $d=mysql_fetch_array($aaaa); 
              // $jumlahtotal = format_rupiah($d['jumlahtotal']);
              // $jumlahtotal = format_rupiah($total_harga_satuan);
  
            // echo"$jumlahtotal"; ?>&nbsp;</td>
  -->	              <td align="right" bgcolor="#CCCCCC"><?php 
                                 // if ($_SESSION['level']=='admin'){ 
   // $aaaa=mysql_query("select sum(harga) as jumlahtotal from invesd");
                     // } else {
                   // $aaaa=mysql_query("select sum(harga) as jumlahtotal from invesd where skpd = '$_SESSION[dinas]' ");
     // }
  // $d=mysql_fetch_array($aaaa); 
              // $jumlahtotal = format_rupiah($d['jumlahtotal']);
              $jumlahtotal = format_rupiah($total_harga_satuan);
  
            echo"Rp. $jumlahtotal,-"; ?>&nbsp;</td>
                  <td align="center" bgcolor="#CCCCCC"><font face="Arial Narrow" size="1">&nbsp;</font></td>
                    </tr>
        </table>         <?php } ?>

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