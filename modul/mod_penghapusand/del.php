<?php
    session_start();
    if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
        echo "<link href='style.css' rel='stylesheet' type='text/css'>
    <center>Untuk mengakses modul, Anda harus login <br>";
        echo "<a href=../../index.php><b>LOGIN</b></a></center>";
    }
    else{
    include "../../config/koneksi.php";
    include "../../config/fungsi_thumb.php";
    include "../../config/fungsi_seo.php";
    $created_date = date('Y-m-d H:i:s');

        $id = $_GET['id'];
        $idinves = $_GET['idinves'];
        if($id != null)
        {
            $query = mysql_query("DELETE FROM penghapusan where id_penghapusan='$id'");
            if($query)
            {
                $update = mysql_query("UPDATE invesd SET status_penggunaan = '1' where id_invesd = '$idinves'");
                echo "<script>alert('BERHASIL')</script>";
                header("location:../../media.php?module=dftrpenghapusand");
                
            }else{
                echo "<script>alert('GAGAL')</script>";
                header("location:../../media.php?module=dftrpenghapusand");
            }
        }
    }
?>