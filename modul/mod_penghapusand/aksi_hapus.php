<?php
  session_start();  
  if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
        echo "<link href='style.css' rel='stylesheet' type='text/css'>
        <center>Untuk mengakses modul, Anda harus login <br>";
        echo "<a href=../../index.php><b>LOGIN</b></a></center>";
    } else {
        include "../../config/koneksi.php";
        include "../../config/fungsi_thumb.php";
        include "../../config/fungsi_seo.php";
        $created_date = date('Y-m-d H:i:s');

        if(isset($_POST['hapus']))
        {
            // var_dump($_POST['no_sk']);
            // exit;
            for ($i=0; $i < count($_POST['id']); $i++) { 
                $nosk = mysql_real_escape_string($_POST['no_sk']);
                $tgl_sk = mysql_real_escape_string($_POST['tgl_sk']);
                $idinves = $_POST['id'][$i];
                $kode_barang = $_POST['kode_barang'][$i];
                $skpd = $_POST['skpd'][$i];
                $tgl = $_POST['tgl'][$i]; 
                $kode_bidang = $_POST['kode_bidang'][$i]; 

                // print_r($kode_barang);
                // exit;
                $sql = mysql_query("UPDATE invesd SET status_penggunaan = '0' where id_invesd = '$idinves' ");
                $sql_Tambah = mysql_query("INSERT INTO penghapusan values('','$idinves', '$kode_barang', '$kode_bidang', '$skpd', '$tgl', '$nosk', '$tgl_sk')");
            }
            
                echo "<script>alert('Berhasil'); window.location='../../media.php?module=penghapusand';</script>";

        }
    }
?>