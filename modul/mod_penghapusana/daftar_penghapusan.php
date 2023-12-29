<?php

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
    <form action="?module=hapusa" method="post">
    <!-- /page header -->
    <!-- Breadcrumbs line -->
    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li><a href="?module=home">Home</a></li>
            <li><a href="?module=pemeliharaan">Penghapusan</a></li>
        </ul>

        <div class="visible-xs breadcrumb-toggle">
            <a class="btn btn-link btn-lg btn-icon" data-toggle="collapse" data-target=".breadcrumb-buttons"><i class="icon-menu2"></i></a>
        </div>

    </div>
    <!-- /breadcrumbs line -->

    <!-- Page tabs -->
    <div class="tabbable page-tabs">
                <ul class="nav nav-tabs">
	                <li class="active"><a href="#inside" data-toggle="tab"><i class="icon-checkbox-partial"></i> Data Daftar Penghapusan</a></li> 
                    <!-- <li><a href="?module=dftrrpenghapusana"><i class="icon-plus"></i> Daftar Penghapusan Tanah</a></li> -->
                </ul>
                <div class="tab-content">


        <!-- First tab content -->
        <div class="tab-pane active fade in" id="inside">

            <!-- Default datatable inside panel -->
            <!-- Datatable with custom column filtering -->
            <div class="panel panel-default">
                <div class="panel-heading"><h6 class="panel-title"><i class="icon-trash"></i>
                    Daftar Penghapusan
                    <!-- <input type="submit" value="Penghapusan" class="btn btn-success btn=sm"> -->
                </h6></div>
                <div class="datatable-add-row">
                    <table class="table">
                    <thead>
				                        <tr>
												
												<th width="3%">No</th>
												<th width="17%">Kode Inventaris Tanah </th>
										<?php	if ($_SESSION['level']=='admin'){ ?>
	<th>UPB</th>
										<?php } ?>
												<th>Barang</th>
												<th>Register</th>
												<th>Tanggal Penghapusan</th>
												<th>No SK</th>
												<th>Tanggal SK</th>
												<th>Penggunaan</th>
												<th>Harga</th>
												<th>Sumber Dana</th>
												<th>Aksi</th>
												<!-- <th width="5%"><center>Action</center></th> -->
                                                				                        </tr>
				                    </thead>

									<tfoot>
										<tr>
												
												<th>No</th>
												<th width="17%">Kode Inventaris Tanah </th>
												<?php	if ($_SESSION['level']=='admin'){ ?>
										<th>UPB</th>
												<?php } ?>
												<th>Barang</th>
												<th>Register</th>
												<th>Tanggal Penghapusan</th>
												<th>No SK</th>
												<th>Tanggal SK</th>
												<th>Penggunaan</th>
												<th>Harga</th>
												<th>Sumber Dana</th>
												<th>Aksi</th>
												<!-- <th>&nbsp;</th>		 -->
                                                								</tr>
									</tfoot>

				                    <tbody>
<?php

$tampil = mysql_query("SELECT * FROM invesa, barang, subdinas, penghapusan where invesa.skpd=subdinas.kode_subdinas and barang.kode_barang=invesa.kode_barang and invesa.id_invesa = penghapusan.id_inves and subdinas.kode_subdinas = '$_SESSION[dinas]' and barang.kode_bidang = penghapusan.kode_bidang order by invesa.id_invesa  DESC, invesa.register DESC") or die (mysql_error());

$no=1;
    while ($r=mysql_fetch_array($tampil)){
		
		$harga = format_rupiah($r[harga]);
?>
				                        <tr>
                                            
                                            <td><?php echo"$no"; ?></td>
                                            <td><?php echo"$r[kode_barang]"; ?></td>
                                          										<?php	if ($_SESSION['level']=='admin'){ ?>
  <td><?php echo"$r[nama_subdinas]"; ?></td>
																				<?php } ?>
                                            <td><?php echo"$r[nama_barang]"; ?></td>
																						<td><?php echo"$r[register]"; ?></td>
                                            <td><?php echo"$r[tgl_penghapusan]"; ?></td>
											<td><?php echo"$r[no_sk]"; ?></td>
											<td><?php echo"$r[tgl_sk]"; ?></td>
											<td><?php echo"$r[penggunaan]"; ?></td>
                                            <td><?php echo"Rp. $harga,-"; ?></td>
                                            <td><?php echo"$r[sumber_dana]"; ?></td>
                                            <td>
                                                <a href="./modul/mod_penghapusana/del.php?id=<?=$r['id_penghapusan']; ?>&&idinves=<?= $r['id_invesa'] ?>" onclick="return confirm('Anda Yakin ingin menghapus data ?');"><span class="icon-remove4"></span> </a>
                                            </td>
				                            
				                        </tr>
                                        <?php $no++; } ?>
    
				                    </tbody>
                    </table>
                </div>
            </div>
            </form>
            <!-- /datatable with custom column filtering -->

        </div>
        <!-- /first tab content -->
</div>
<?php
    }
?>
