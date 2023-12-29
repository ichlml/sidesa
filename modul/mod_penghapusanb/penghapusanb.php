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
    <form action="?module=hapusb" method="post">
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
	                <li class="active"><a href="#inside" data-toggle="tab"><i class="icon-checkbox-partial"></i> Tabel Data</a></li> 
                    <li><a href="?module=dftrpenghapusanb"><i class="icon-plus"></i> Daftar Penghapusan Mesin dan Peralatan </a></li>
                </ul>
                <div class="tab-content">


        <!-- First tab content -->
        <div class="tab-pane active fade in" id="inside">

            <!-- Default datatable inside panel -->
            <!-- Datatable with custom column filtering -->
            <div class="panel panel-default">
                <div class="panel-heading"><h6 class="panel-title"><i class="icon-trash"></i>
                
                    <input type="submit" value="Penghapusan" class="btn btn-success btn=sm">
                </h6></div>
                <div class="datatable-add-row">
                    <table class="table">
                    <thead>
				                        <tr>
												<th width="3%">
                                                    <input type="checkbox" id="sellect_all" value="">
                                                </th>
												<th width="3%">No</th>
												<th width="17%">Kode Inventaris Tanah </th>
										<?php	if ($_SESSION['level']=='admin'){ ?>
	<th>UPB</th>
										<?php } ?>
												<th>Barang</th>
												<th>Register</th>
												<th>Luas</th>
												<th>No Sertifikat</th>
												<th>Penggunaan</th>
												<th>Harga</th>
												<th>Sumber Dana</th>
												<!-- <th width="5%"><center>Action</center></th> -->
                                                				                        </tr>
				                    </thead>

									<tfoot>
										<tr>
												<th> </th>
												<th>No</th>
												<th width="17%">Kode Inventaris Tanah </th>
												<?php	if ($_SESSION['level']=='admin'){ ?>
										<th>UPB</th>
												<?php } ?>
												<th>Barang</th>
												<th>Register</th>
												<th>Luas</th>
												<th>No Sertifikat</th>
												<th>Penggunaan</th>
												<th>Harga</th>
												<th>Sumber Dana</th>
												<!-- <th>&nbsp;</th>		 -->
                                                								</tr>
									</tfoot>

				                    <tbody>
<?php

if ($_SESSION['level']=='admin'){ 
$tampil = mysql_query("SELECT * FROM invesb , barang, subdinas where invesb.skpd=subdinas.kode_subdinas and barang.kode_barang=invesb.kode_barang  AND status_penggunaan=1 order by invesb.id_invesb  DESC, invesb.register DESC") or die (mysql_error());
} else {
$tampil = mysql_query("SELECT * FROM invesb, barang, subdinas where invesb.skpd=subdinas.kode_subdinas and barang.kode_barang=invesb.kode_barang and subdinas.kode_subdinas = '$_SESSION[dinas]' AND status_penggunaan=1 order by invesb.id_invesb  DESC, invesb.register DESC") or die (mysql_error());
}
$no=1;
    while ($r=mysql_fetch_array($tampil)){
		
		$harga = format_rupiah($r[harga]);
?>
				                        <tr>
                                            <td> 
                                                <input type="checkbox" name="checked[]" class="check" value="<?=$r['id_invesb']?>" >
                                            </td>
                                            <td><?php echo"$no"; ?></td>
                                            <td><?php echo"$r[kode_barang]"; ?></td>
                                          										<?php	if ($_SESSION['level']=='admin'){ ?>
  <td><?php echo"$r[nama_subdinas]"; ?></td>
																				<?php } ?>
                                            <td><?php echo"$r[nama_barang]"; ?></td>
																						<td><?php echo"$r[register]"; ?></td>
                                            <td><?php echo"$r[luas]"; ?></td>
											<td><?php echo"$r[no_sertifikat]"; ?></td>
											<td><?php echo"$r[penggunaan]"; ?></td>
                                            <td><?php echo"Rp. $harga,-"; ?></td>
                                            <td><?php echo"$r[sumber_dana]"; ?></td>
				                            
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

<script>
    $(document).ready(function(){
        $('#sellect_all').on('click', function(){
            if(this.checked) 
            {
                $('.check').each(function(){
                    this.checked = true;
                })
            } else {
                $('.check').each(function(){
                    this.checked = false;
                })
            }
        });

        $('.check').on('click', function(){
            if($('.check:checked').leght == $('.check').leght){
                $('#sellect_all').prop('.checked' == true)
            }else {
                $('#sellect_all').prop('.checked' == false)
            }
        })
    })
</script>