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
    <!-- /page header -->
    <!-- Breadcrumbs line -->
    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li><a href="?module=home">Home</a></li>
            <li><a href="?module=pemeliharaan">Personil</a></li>
        </ul>

        <div class="visible-xs breadcrumb-toggle">
            <a class="btn btn-link btn-lg btn-icon" data-toggle="collapse" data-target=".breadcrumb-buttons"><i class="icon-menu2"></i></a>
        </div>

    </div>
    <!-- /breadcrumbs line -->
    <!-- Page tabs -->
    <div class="tabbable page-tabs">
                <ul class="nav nav-tabs">
                  <!--  <li><a href="#outside" data-toggle="tab"><i class="icon-upload5"></i> Upload / Import Document</a></li> -->
                    <li><a href="?module=addPersonil"><i class="icon-plus"></i> Tambah Data Personil</a></li>
	                <li class="active"><a href="#desa" data-toggle="tab"><i class="icon-checkbox-partial"></i> Perangkat Desa</a></li>
	                <li class=""><a href="#kpmd" data-toggle="tab"><i class="icon-checkbox-partial"></i> KPDM</a></li>
	                <li class=""><a href="#bpd" data-toggle="tab"><i class="icon-checkbox-partial"></i> BPD</a></li>
	                <li class=""><a href="#karang" data-toggle="tab"><i class="icon-checkbox-partial"></i> Karang Taruna</a></li>
	                <li class=""><a href="#pkk" data-toggle="tab"><i class="icon-checkbox-partial"></i> PKK</a></li>
	                <li class=""><a href="#limas" data-toggle="tab"><i class="icon-checkbox-partial"></i> Limas</a></li>
	                <li class=""><a href="#lainya" data-toggle="tab"><i class="icon-checkbox-partial"></i> Lainya</a></li>
                </ul>
                <div class="tab-content">

        <!-- First tab content -->
        <div class="tab-pane active fade in" id="desa">

            <!-- Default datatable inside panel -->
            <!-- Datatable with custom column filtering -->
            <div class="panel panel-default">
                <div class="panel-heading"><h6 class="panel-title"><i class="icon-table"></i> Data Personil</h6></div>
                <div class="datatable-add-row">
                    <table class="table">
                    <thead>
				                        <tr>
												<th>No.</th>
												<th>Nama Jabatan </th>
												<th>Nama Pemangku</th>
												<th>Jenis Personil</th>
												<th>No SK</th>
												<th>Tanggal SK</th>
												<th>Pendidikan</th>
												<th>Foto</th>
												<th width="5%"><center>Action</center></th>				                        </tr>
				                    </thead>

									<tfoot>
										<tr>
                                                <th>No.</th>
												<th>Nama Jabatan </th>
												<th>Nama Pemangku</th>
												<th>Jenis Personil</th>
												<th>No SK</th>
												<th>Tanggal SK</th>
												<th>Pendidikan</th>
												<th>Foto</th>
												<th>&nbsp;</th>										</tr>
									</tfoot>

				                    <tbody>
<?php

    $no=1;
    $Sesion = $_SESSION['dinas'];
    $query = mysql_query("SELECT * FROM personil Where jenis_personil = 'Perangkat Desa' AND kode_subdinas='$Sesion'");
    while ($r=mysql_fetch_array($query)){
		
?>
				                        <tr>
                                            <td><?php echo"$no"; ?></td>
                                            <td><?php echo"$r[nama_jabatan]"; ?></td>
                                            <td><?php echo"$r[nama_pemangku]"; ?></td>
											<td><?php echo"$r[jenis_personil]"; ?></td>
											<td><?php echo"$r[no_sk]"; ?></td>
											<td><?php echo"$r[tgl_sk]"; ?></td>
                                            <td><?php echo"$r[pendidikan]"; ?></td>
                                            <td><img src="./modul/img/<?=$r['foto'] ?>" alt="foto personil" width="50" height="50"></td>
				                            <td><center><?php echo"<a title='Edit' href=?module=editpersonil&id=$r[id_personil]>"; ?><span class="icon-folder-open"></span> 
                                            </a> &nbsp;  <a href="<?php echo"modul/mod_personil/hapus.php?id=$r[id_personil]"; ?>" onclick="return confirm('Anda Yakin ingin menghapus data ?');"><span class="icon-remove4"></span> </a> &nbsp; </center></td>
				                        </tr>
                                        <?php $no++; } ?>
    
				                    </tbody>
                    </table>
                </div>
            </div>
            <!-- /datatable with custom column filtering -->

        </div>
        <!-- END OF first tab content -->

        <!-- First tab content Tugas -->
        <div class="tab-pane fade in" id="kpmd">

            <!-- Default datatable inside panel -->
            <!-- Datatable with custom column filtering -->
            <div class="panel panel-default">
                <div class="panel-heading"><h6 class="panel-title"><i class="icon-table"></i> Data Personil</h6></div>
                <div class="datatable-add-row">
                    <table class="table">
                    <thead>
				                        <tr>
												<th>No.</th>
												<th>Nama Jabatan </th>
												<th>Nama Pemangku</th>
												<th>Jenis Personil</th>
												<th>No SK</th>
												<th>Tanggal SK</th>
												<th>Pendidikan</th>
												<th>Foto</th>
												<th width="5%"><center>Action</center></th>				                        </tr>
				                    </thead>

									<tfoot>
										<tr>
                                                <th>No.</th>
												<th>Nama Jabatan </th>
												<th>Nama Pemangku</th>
												<th>Jenis Personil</th>
												<th>No SK</th>
												<th>Tanggal SK</th>
												<th>Pendidikan</th>
												<th>Foto</th>
												<th>&nbsp;</th>										</tr>
									</tfoot>

				                    <tbody>
<?php

    $no=1;
    $Sesion = $_SESSION['dinas'];
    $query = mysql_query("SELECT * FROM personil Where jenis_personil = 'Tugas' AND kode_subdinas='$Sesion'");
    while ($r=mysql_fetch_array($query)){
		
?>
				                        <tr>
                                            <td><?php echo"$no"; ?></td>
                                            <td><?php echo"$r[nama_jabatan]"; ?></td>
                                            <td><?php echo"$r[nama_pemangku]"; ?></td>
											<td><?php echo"$r[jenis_personil]"; ?></td>
											<td><?php echo"$r[no_sk]"; ?></td>
											<td><?php echo"$r[tgl_sk]"; ?></td>
                                            <td><?php echo"$r[pendidikan]"; ?></td>
                                            <td><img src="./modul/img/<?=$r['foto'] ?>" alt="foto personil" width="50" height="50"></td>
				                            <td><center><?php echo"<a title='Edit' href=?module=editpersonil&id=$r[id_personil]>"; ?><span class="icon-folder-open"></span> 
                                            </a> &nbsp;  <a href="<?php echo"modul/mod_personil/hapus.php?id=$r[id_personil]"; ?>" onclick="return confirm('Anda Yakin ingin menghapus data ?');"><span class="icon-remove4"></span> </a> &nbsp; </center></td>
				                        </tr>
                                        <?php $no++; } ?>
    
				                    </tbody>
                    </table>
                </div>
            </div>
            <!-- /datatable with custom column filtering -->

        </div>
        <!-- END OF first tab content -->
        <!-- First tab content BPD -->
        <div class="tab-pane fade in" id="bpd">

            <!-- Default datatable inside panel -->
            <!-- Datatable with custom column filtering -->
            <div class="panel panel-default">
                <div class="panel-heading"><h6 class="panel-title"><i class="icon-table"></i> Data Personil</h6></div>
                <div class="datatable-add-row">
                    <table class="table">
                    <thead>
				                        <tr>
												<th>No.</th>
												<th>Nama Jabatan </th>
												<th>Nama Pemangku</th>
												<th>Jenis Personil</th>
												<th>No SK</th>
												<th>Tanggal SK</th>
												<th>Pendidikan</th>
												<th>Foto</th>
												<th width="5%"><center>Action</center></th>				                        </tr>
				                    </thead>

									<tfoot>
										<tr>
                                                <th>No.</th>
												<th>Nama Jabatan </th>
												<th>Nama Pemangku</th>
												<th>Jenis Personil</th>
												<th>No SK</th>
												<th>Tanggal SK</th>
												<th>Pendidikan</th>
												<th>Foto</th>
												<th>&nbsp;</th>										</tr>
									</tfoot>

				                    <tbody>
<?php

    $no=1;
    $Sesion = $_SESSION['dinas'];
    $query = mysql_query("SELECT * FROM personil Where jenis_personil = 'BPD' AND kode_subdinas='$Sesion'");
    while ($r=mysql_fetch_array($query)){
		
?>
				                        <tr>
                                            <td><?php echo"$no"; ?></td>
                                            <td><?php echo"$r[nama_jabatan]"; ?></td>
                                            <td><?php echo"$r[nama_pemangku]"; ?></td>
											<td><?php echo"$r[jenis_personil]"; ?></td>
											<td><?php echo"$r[no_sk]"; ?></td>
											<td><?php echo"$r[tgl_sk]"; ?></td>
                                            <td><?php echo"$r[pendidikan]"; ?></td>
                                            <td><img src="./modul/img/<?=$r['foto'] ?>" alt="foto personil" width="50" height="50"></td>
				                            <td><center><?php echo"<a title='Edit' href=?module=editpersonil&id=$r[id_personil]>"; ?><span class="icon-folder-open"></span> 
                                            </a> &nbsp;  <a href="<?php echo"modul/mod_personil/hapus.php?id=$r[id_personil]"; ?>" onclick="return confirm('Anda Yakin ingin menghapus data ?');"><span class="icon-remove4"></span> </a> &nbsp; </center></td>
				                        </tr>
                                        <?php $no++; } ?>
    
				                    </tbody>
                    </table>
                </div>
            </div>
            <!-- /datatable with custom column filtering -->

        </div>
        <!-- END OF first tab content -->
        <!-- First tab content Karang Taruna -->
        <div class="tab-pane fade in" id="karang">

            <!-- Default datatable inside panel -->
            <!-- Datatable with custom column filtering -->
            <div class="panel panel-default">
                <div class="panel-heading"><h6 class="panel-title"><i class="icon-table"></i> Data Personil</h6></div>
                <div class="datatable-add-row">
                    <table class="table">
                    <thead>
				                        <tr>
												<th>No.</th>
												<th>Nama Jabatan </th>
												<th>Nama Pemangku</th>
												<th>Jenis Personil</th>
												<th>No SK</th>
												<th>Tanggal SK</th>
												<th>Pendidikan</th>
												<th>Foto</th>
												<th width="5%"><center>Action</center></th>				                        </tr>
				                    </thead>

									<tfoot>
										<tr>
                                                <th>No.</th>
												<th>Nama Jabatan </th>
												<th>Nama Pemangku</th>
												<th>Jenis Personil</th>
												<th>No SK</th>
												<th>Tanggal SK</th>
												<th>Pendidikan</th>
												<th>Foto</th>
												<th>&nbsp;</th>										</tr>
									</tfoot>

				                    <tbody>
<?php

    $no=1;
    $Sesion = $_SESSION['dinas'];
    $query = mysql_query("SELECT * FROM personil Where jenis_personil = 'Karang Taruna' AND kode_subdinas='$Sesion'");
    while ($r=mysql_fetch_array($query)){
		
?>
				                        <tr>
                                            <td><?php echo"$no"; ?></td>
                                            <td><?php echo"$r[nama_jabatan]"; ?></td>
                                            <td><?php echo"$r[nama_pemangku]"; ?></td>
											<td><?php echo"$r[jenis_personil]"; ?></td>
											<td><?php echo"$r[no_sk]"; ?></td>
											<td><?php echo"$r[tgl_sk]"; ?></td>
                                            <td><?php echo"$r[pendidikan]"; ?></td>
                                            <td><img src="./modul/img/<?=$r['foto'] ?>" alt="foto personil" width="50" height="50"></td>
				                            <td><center><?php echo"<a title='Edit' href=?module=editpersonil&id=$r[id_personil]>"; ?><span class="icon-folder-open"></span> 
                                            </a> &nbsp;  <a href="<?php echo"modul/mod_personil/hapus.php?id=$r[id_personil]"; ?>" onclick="return confirm('Anda Yakin ingin menghapus data ?');"><span class="icon-remove4"></span> </a> &nbsp; </center></td>
				                        </tr>
                                        <?php $no++; } ?>
    
				                    </tbody>
                    </table>
                </div>
            </div>
            <!-- /datatable with custom column filtering -->

        </div>
        <!-- END OF first tab content -->
        <!-- First tab content Karang PKK -->
        <div class="tab-pane fade in" id="pkk">

            <!-- Default datatable inside panel -->
            <!-- Datatable with custom column filtering -->
            <div class="panel panel-default">
                <div class="panel-heading"><h6 class="panel-title"><i class="icon-table"></i> Data Personil</h6></div>
                <div class="datatable-add-row">
                    <table class="table">
                    <thead>
				                        <tr>
												<th>No.</th>
												<th>Nama Jabatan </th>
												<th>Nama Pemangku</th>
												<th>Jenis Personil</th>
												<th>No SK</th>
												<th>Tanggal SK</th>
												<th>Pendidikan</th>
												<th>Foto</th>
												<th width="5%"><center>Action</center></th>				                        </tr>
				                    </thead>

									<tfoot>
										<tr>
                                                <th>No.</th>
												<th>Nama Jabatan </th>
												<th>Nama Pemangku</th>
												<th>Jenis Personil</th>
												<th>No SK</th>
												<th>Tanggal SK</th>
												<th>Pendidikan</th>
												<th>Foto</th>
												<th>&nbsp;</th>										</tr>
									</tfoot>

				                    <tbody>
<?php

    $no=1;
    $Sesion = $_SESSION['dinas'];
    $query = mysql_query("SELECT * FROM personil Where jenis_personil = 'PKK' AND kode_subdinas='$Sesion'");
    while ($r=mysql_fetch_array($query)){
		
?>
				                        <tr>
                                            <td><?php echo"$no"; ?></td>
                                            <td><?php echo"$r[nama_jabatan]"; ?></td>
                                            <td><?php echo"$r[nama_pemangku]"; ?></td>
											<td><?php echo"$r[jenis_personil]"; ?></td>
											<td><?php echo"$r[no_sk]"; ?></td>
											<td><?php echo"$r[tgl_sk]"; ?></td>
                                            <td><?php echo"$r[pendidikan]"; ?></td>
                                            <td><img src="./modul/img/<?=$r['foto'] ?>" alt="foto personil" width="50" height="50"></td>
				                            <td><center><?php echo"<a title='Edit' href=?module=editpersonil&id=$r[id_personil]>"; ?><span class="icon-folder-open"></span> 
                                            </a> &nbsp;  <a href="<?php echo"modul/mod_personil/hapus.php?id=$r[id_personil]"; ?>" onclick="return confirm('Anda Yakin ingin menghapus data ?');"><span class="icon-remove4"></span> </a> &nbsp; </center></td>
				                        </tr>
                                        <?php $no++; } ?>
    
				                    </tbody>
                    </table>
                </div>
            </div>
            <!-- /datatable with custom column filtering -->

        </div>
        <!-- END OF first tab content -->
        <!-- First tab content Karang Limas -->
        <div class="tab-pane fade in" id="limas">

            <!-- Default datatable inside panel -->
            <!-- Datatable with custom column filtering -->
            <div class="panel panel-default">
                <div class="panel-heading"><h6 class="panel-title"><i class="icon-table"></i> Data Personil</h6></div>
                <div class="datatable-add-row">
                    <table class="table">
                    <thead>
				                        <tr>
												<th>No.</th>
												<th>Nama Jabatan </th>
												<th>Nama Pemangku</th>
												<th>Jenis Personil</th>
												<th>No SK</th>
												<th>Tanggal SK</th>
												<th>Pendidikan</th>
												<th>Foto</th>
												<th width="5%"><center>Action</center></th>				                        </tr>
				                    </thead>

									<tfoot>
										<tr>
                                                <th>No.</th>
												<th>Nama Jabatan </th>
												<th>Nama Pemangku</th>
												<th>Jenis Personil</th>
												<th>No SK</th>
												<th>Tanggal SK</th>
												<th>Pendidikan</th>
												<th>Foto</th>
												<th>&nbsp;</th>										</tr>
									</tfoot>

				                    <tbody>
<?php

    $no=1;
    $Sesion = $_SESSION['dinas'];
    $query = mysql_query("SELECT * FROM personil Where jenis_personil = 'Limas' AND kode_subdinas='$Sesion'");
    while ($r=mysql_fetch_array($query)){
		
?>
				                        <tr>
                                            <td><?php echo"$no"; ?></td>
                                            <td><?php echo"$r[nama_jabatan]"; ?></td>
                                            <td><?php echo"$r[nama_pemangku]"; ?></td>
											<td><?php echo"$r[jenis_personil]"; ?></td>
											<td><?php echo"$r[no_sk]"; ?></td>
											<td><?php echo"$r[tgl_sk]"; ?></td>
                                            <td><?php echo"$r[pendidikan]"; ?></td>
                                            <td><img src="./modul/img/<?=$r['foto'] ?>" alt="foto personil" width="50" height="50"></td>
				                            <td><center><?php echo"<a title='Edit' href=?module=editpersonil&id=$r[id_personil]>"; ?><span class="icon-folder-open"></span> 
                                            </a> &nbsp;  <a href="<?php echo"modul/mod_personil/hapus.php?id=$r[id_personil]"; ?>" onclick="return confirm('Anda Yakin ingin menghapus data ?');"><span class="icon-remove4"></span> </a> &nbsp; </center></td>
				                        </tr>
                                        <?php $no++; } ?>
    
				                    </tbody>
                    </table>
                </div>
            </div>
            <!-- /datatable with custom column filtering -->

        </div>
        <!-- END OF first tab content -->
        <!-- First tab content Karang Lainya -->
        <div class="tab-pane fade in" id="lainya">

            <!-- Default datatable inside panel -->
            <!-- Datatable with custom column filtering -->
            <div class="panel panel-default">
                <div class="panel-heading"><h6 class="panel-title"><i class="icon-table"></i> Data Personil</h6></div>
                <div class="datatable-add-row">
                    <table class="table">
                    <thead>
				                        <tr>
												<th>No.</th>
												<th>Nama Jabatan </th>
												<th>Nama Pemangku</th>
												<th>Jenis Personil</th>
												<th>No SK</th>
												<th>Tanggal SK</th>
												<th>Pendidikan</th>
												<th>Foto</th>
												<th width="5%"><center>Action</center></th>				                        </tr>
				                    </thead>

									<tfoot>
										<tr>
                                                <th>No.</th>
												<th>Nama Jabatan </th>
												<th>Nama Pemangku</th>
												<th>Jenis Personil</th>
												<th>No SK</th>
												<th>Tanggal SK</th>
												<th>Pendidikan</th>
												<th>Foto</th>
												<th>&nbsp;</th>										</tr>
									</tfoot>

				                    <tbody>
<?php

    $no=1;
    $Sesion = $_SESSION['dinas'];
    $query = mysql_query("SELECT * FROM personil Where jenis_personil = 'Lainya' AND kode_subdinas='$Sesion'");
    while ($r=mysql_fetch_array($query)){
		
?>
				                        <tr>
                                            <td><?php echo"$no"; ?></td>
                                            <td><?php echo"$r[nama_jabatan]"; ?></td>
                                            <td><?php echo"$r[nama_pemangku]"; ?></td>
											<td><?php echo"$r[jenis_personil]"; ?></td>
											<td><?php echo"$r[no_sk]"; ?></td>
											<td><?php echo"$r[tgl_sk]"; ?></td>
                                            <td><?php echo"$r[pendidikan]"; ?></td>
                                            <td><img src="./modul/img/<?=$r['foto'] ?>" alt="foto personil" width="50" height="50"></td>
				                            <td><center><?php echo"<a title='Edit' href=?module=editpersonil&id=$r[id_personil]>"; ?><span class="icon-folder-open"></span> 
                                            </a> &nbsp;  <a href="<?php echo"modul/mod_personil/hapus.php?id=$r[id_personil]"; ?>" onclick="return confirm('Anda Yakin ingin menghapus data ?');"><span class="icon-remove4"></span> </a> &nbsp; </center></td>
				                        </tr>
                                        <?php $no++; } ?>
    
				                    </tbody>
                    </table>
                </div>
            </div>
            <!-- /datatable with custom column filtering -->

        </div>
        <!-- END OF first tab content -->
</div>
<?php
    }
?>