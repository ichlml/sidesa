﻿<?php

session_start();
    if ($_SESSION['level']=='admin')
    {

        if (empty($_SESSION['username']) AND empty($_SESSION['passuser']))
        {
            echo "<link href='style.css' rel='stylesheet' type='text/css'>
            <center>Untuk mengakses modul, Anda harus login <br>";
            echo "<a href=../../index.php><b>LOGIN</b></a></center>";
        }
    }

    switch($_GET[act]){
        // Tampil Tag
        default:
?>

<!-- Page content -->
<style type="text/css">
    .baru {
        color: #000;
    }
</style>

<div class="page-content">
    <!-- Page header -->
        <div class="page-header">
            <div class="page-title">
                <h3>Sistem Informasi Pengelolaan Aset Desa <small>Membantu Dalam Melakukan Pendataan aset Desa</small></h3>
            </div>
        </div>
    <!-- /page header -->
    <!-- Breadcrumbs line -->
    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li><a href="?module=home">Home</a></li>
            <li><a href="?module=pemeliharaan">Pemeliharaan Mesin dan Peralatan</a></li>
        </ul>

        <div class="visible-xs breadcrumb-toggle">
            <a class="btn btn-link btn-lg btn-icon" data-toggle="collapse" data-target=".breadcrumb-buttons"><i class="icon-menu2"></i></a>
        </div>

    </div>
    <!-- /breadcrumbs line -->
    <!-- Page tabs -->
    <div class="tabbable page-tabs">
                <ul class="nav nav-tabs">
	                <li class="active"><a href="#inside" data-toggle="tab"><i class="icon-checkbox-partial"></i> Tabel Data</a></li>
                  <!--  <li><a href="#outside" data-toggle="tab"><i class="icon-upload5"></i> Upload / Import Document</a></li> -->
                    <!-- <li><a href="?module=addPemeliharaana"><i class="icon-plus"></i> Tambah Data</a></li> -->
                </ul>
                <div class="tab-content">
<?php
if ($_GET['code'] == 2){
?>
<div class="alert alert-success fade in block-inner">
                    		<button type="button" class="close" data-dismiss="alert">×</button>
                    		Data berhasil dihapus  .... 
                    	</div><?php } ?>
<?php
if ($_GET['code'] == 3){
?>
<div class="alert alert-success fade in block-inner">
                    		<button type="button" class="close" data-dismiss="alert">×</button>
                    		Data berhasil diupdate  .... 
                    	</div><?php } ?>
<?php
if ($_GET['code'] == 4){
?>
<div class="alert alert-success fade in block-inner">
                    		<button type="button" class="close" data-dismiss="alert">×</button>

                    		Data berhasil diimport  .... 
                    	</div><?php } ?>

        <!-- First tab content -->
        <div class="tab-pane active fade in" id="inside">

            <!-- Default datatable inside panel -->
            <!-- Datatable with custom column filtering -->
            <div class="panel panel-default">
                <div class="panel-heading"><h6 class="panel-title"><i class="icon-table"></i> Data Barang</h6></div>
                <div class="datatable-add-row">
                <table class="table">
				                    <thead>
				                        <tr>
																								<th width="3%">No</th>
												<th width="17%">Kode Mesin dan Peralatan </th>
											<?php
											if ($_SESSION['level']=='admin'){ 
?>	<th>UPB</th> <?php  } ?>
												<th>Barang </th>
												<th>Register </th>
												<th>Jumlah</th>
												<th>Harga Satuan</th>
												<th>Tanggal Pembelian</th>
												<th>Sumber Dana</th>
												<th>Total</th>
												<th width="5%"><center>Action</center></th>
			                        </tr>
				                    </thead>

									<tfoot>
										<tr>
																								<th width="3%">No</th>
												<th width="17%">Kode Mesin dan Peralatan </th>
											<?php	if ($_SESSION['level']=='admin'){  ?>
<th>UPB</th> <?php } ?>
												<th>Barang </th>
												<th>Register </th>
												<th>Jumlah</th>
												<th>Harga Satuan</th>
												<th>Tanggal Pembelian</th>
												<th>Sumber Dana</th>
												<th>Total</th>
												<th width="7%"><center>Action</center></th>
								</tr>
									</tfoot>

				                    <tbody>
<?php
if ($_SESSION['level']=='admin'){ 
$tampil = mysql_query("SELECT * FROM invesb, barang, subdinas where invesb.skpd=subdinas.kode_subdinas and barang.kode_barang=invesb.kode_barang  and status_penggunaan=1  order by invesb.id_invesb  DESC, invesb.register DESC") or die (mysql_error());
} else {
$tampil = mysql_query("SELECT * FROM invesb, barang, subdinas where invesb.skpd=subdinas.kode_subdinas and barang.kode_barang=invesb.kode_barang  and subdinas.kode_subdinas = '$_SESSION[dinas]' and status_penggunaan=1 order by invesb.id_invesb  DESC, invesb.register DESC") or die (mysql_error());
}
 $no=1;
    while ($r=mysql_fetch_array($tampil)){
		
		$total = $r[harga] * $r[jumlah];
				$harga = format_rupiah($r[harga]);
				$total = format_rupiah($total);

?>
											<tr>
                                            <td><?php echo"$no"; ?></td>
                                            <td><?php echo"$r[kode_barang]"; ?></td>
                                          <?php	if ($_SESSION['level']=='admin'){  ?>  <td><?php echo"$r[nama_subdinas]"; ?></td> <?php } ?>
                                            <td><?php echo"$r[nama_barang]"; ?></td>
																						<td><?php echo"$r[register]"; ?></td>
                                            <td><?php echo"$r[jumlah]"; ?></td>
                                            <td><?php echo"Rp. $harga,-"; ?></td>
											<td><?php echo"$r[tanggal_pembelian]"; ?></td>
                                            <td><?php echo"$r[sumber_dana]"; ?></td>
                                            <td><?php echo"Rp. $total,-"; ?></td>
                                            <td><center><?php echo"<a title='Pemeliharaan' href=?module=pmlalatangkut&id=$r[id_invesb]>"; ?><span class="icon-folder-open"></span> 
                                            <!-- </a> &nbsp;  <a href="<?php echo"modul/mod_pemeliharaanb/update.php?id=$r[id_invesb]"; ?>" onclick="return confirm('Anda Yakin ingin menghapus data ?');"><span class="icon-remove4"></span> </a> &nbsp; </center></td> -->
											</tr> <?php $no++; }?>    
				                    </tbody>
				                </table>
                </div>
            </div>
            <!-- /datatable with custom column filtering -->

        </div>
        <!-- /first tab content -->
</div>
<?php
    }
?>