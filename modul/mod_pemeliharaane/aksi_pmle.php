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

    if(isset($_POST['submit']))
    {
        $kode_bidang = mysql_real_escape_string($_POST['kode_bidang']);
        $kode_barang = mysql_real_escape_string($_POST['kode_barang']);
        $register = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['register'],ENT_QUOTES))));
        $tgl_documen = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['tgl_documen'],ENT_QUOTES))));
        $nilai = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['nilai'],ENT_QUOTES))));
        $keterangan = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($_POST['keterangan'],ENT_QUOTES))));
        $id_invesa = $_POST['id_invese'];

        $sql = mysql_query("INSERT INTO tb_pemeliharaan VALUES ('','$id_invesa','$kode_bidang','$kode_barang', '$register', '$tgl_documen', '$nilai', '$keterangan')");

        // print_r($kode_bidang);
        // exit;

        if($sql)
        {
            echo "<script>alert('BERHASIL')</script>";
            header("location:../../media.php?module=pmle&id=".$id_invesa);
        }else{
            echo "<script>alert('GAGAL')</script>";
            header("location:../../media.php?module=pmle&id=".$id_invesa);
        }
    }
   }
?>