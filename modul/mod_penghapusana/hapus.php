<?php

        session_start();
        $chck = $_POST['checked'];
        if(!isset($chck))
        {
            echo "<script>alert('Tidak Ada Investasi yang di Pilih'); window.location='media.php?module=penghapusana';</script>";
        }else {
    ?>

<div class="page-content">
    <div class="page-header">
        <div class="page-title">
				<h3>Sistem Informasi Aset Daerah <small>Membantu Dalam Melakukan Manajement aset Daerah</small></h3>
			</div>
    </div>
    <!-- Breadcrumbs line -->
    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li><a href="?module=home">Home</a></li>
            <li><a href="#">Penghapusan</a></li>
            <!-- <li><a href="?module=pemeliharaana">Pemeliharaan Aset Tetap Lainya</a></li> -->
        </ul>

        <div class="visible-xs breadcrumb-toggle">
            <a class="btn btn-link btn-lg btn-icon" data-toggle="collapse" data-target=".breadcrumb-buttons"><i class="icon-menu2"></i></a>
        </div>
    </div>

    <!-- form  -->
    <form action="modul/mod_penghapusana/aksi_hapus.php" method="post" role="form">
        <div class="block">
        <h6 class="heading-hr"><i class="icon-checkmark-circle"></i> Form Penghapusan</h6>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="no_sk">No SK</label>
                    <input type="text" name="no_sk" id="no_sk" class="form-control">
                </div>
                <div class="form-group col-md-6">
                    <label for="tgl_sk">Tanggal SK</label>
                    <input type="date" name="tgl_sk" id="tgl_sk" class="form-control">
                </div>
                <!-- <div class="form-group col-md-6"> -->
                <?php
                    foreach ($chck as $key) { 
                        $sql = mysql_query("SELECT * FROM invesa, barang, subdinas where invesa.skpd=subdinas.kode_subdinas and barang.kode_barang=invesa.kode_barang and subdinas.kode_subdinas = '$_SESSION[dinas]' AND id_invesa='$key' order by invesa.id_invesa  DESC, invesa.register DESC ");
                        while($r=mysql_fetch_array($sql)){

                    ?>
                        <input type="hidden" name="id[]" value="<?= $r['id_invesa']?>" class="form-control">
                        <input type="hidden" name="kode_barang[]" value="<?= $r['kode_barang']?>" class="form-control">
                        <input type="hidden" name="skpd[]" value="<?= $r['skpd']?>" class="form-control">
                        <input type="hidden" name="tgl[]" value="<?= date("Y-m-d") ?>" class="form-control">
                        <input type="hidden" name="kode_bidang[]" value="<?= $r['kode_bidang'] ?>" class="form-control">
                <?php } }?>
                    <!-- </div> -->
                    <div class="form-group pull-right">
                        <input type="submit" value="Hapus" name="hapus" class="btn btn-sm btn-success">
                    </div>
            </div>
        </div>
    </form>
        
    <?php 
        
        } 
    ?>
</div>