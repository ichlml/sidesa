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
            $nama_jabatan = mysql_real_escape_string($_POST['nama_jabatan']);
            $kode_subdinas = mysql_real_escape_string($_POST['kode_subdinas']);
            $nama_pemangku = mysql_real_escape_string($_POST['nama_pemangku']);
            $jenis_personil = mysql_real_escape_string($_POST['jenis_personil']);
            $tempat_lahir = mysql_real_escape_string($_POST['tempat_lahir']);
            $tgl_lahir = mysql_real_escape_string($_POST['tgl_lahir']);
            $jkel = mysql_real_escape_string($_POST['jkel']);
            $no_sk = mysql_real_escape_string($_POST['no_sk']);
            $tgl_sk = mysql_real_escape_string($_POST['tgl_sk']);
            $pendidikan = mysql_real_escape_string($_POST['pendidikan']);
            $nf = $_FILES['foto']['name'];
            $af = $_FILES['foto']['tmp_name'];
            move_uploaded_file($af, '../img/'.$nf);

            $sql_tambah = mysql_query("INSERT INTO personil VALUES('','$kode_subdinas','$nama_jabatan', '$nama_pemangku','$jenis_personil','$tempat_lahir', '$tgl_lahir', '$jkel','$no_sk','$tgl_sk','$pendidikan','$nf')");

            if($sql_tambah)
            {
                echo "<script>alert('BERHASIL')</script>";
                header("location:../../media.php?module=personil");
            }else{
                echo "<script>alert('GAGAL')</script>";
                header("location:../../media.php?module=personil");
            }
        }elseif (isset($_POST['edit'])) {
            $id_personil = mysql_real_escape_string($_POST['id_personil']);
            $nama_jabatan = mysql_real_escape_string($_POST['nama_jabatan']);
            $nama_pemangku = mysql_real_escape_string($_POST['nama_pemangku']);
            $jenis_personil = mysql_real_escape_string($_POST['jenis_personil']);
            $tempat_lahir = mysql_real_escape_string($_POST['tempat_lahir']);
            $tgl_lahir = mysql_real_escape_string($_POST['tgl_lahir']);
            $jkel = mysql_real_escape_string($_POST['jkel']);
            $no_sk = mysql_real_escape_string($_POST['no_sk']);
            $tgl_sk = mysql_real_escape_string($_POST['tgl_sk']);
            $pendidikan = mysql_real_escape_string($_POST['pendidikan']);
            $nf = $_FILES['foto']['name'];
            $af = $_FILES['foto']['tmp_name'];
            move_uploaded_file($af, '../img/'.$nf);

            $sql_update = mysql_query("UPDATE personil SET 
            nama_jabatan='$nama_jabatan', 
            nama_pemangku='$nama_pemangku', 
            jenis_personil='$jenis_personil', 
            tempat_lahir='$tempat_lahir', 
            tgl_lahir='$tgl_lahir', 
            jkel='$jkel', 
            no_sk='$no_sk', 
            tgl_sk='$tgl_sk', 
            pendidikan='$pendidikan', 
            foto='$nf' 
            WHERE id_personil = '$id_personil' ");

            // ($sql_update);
            // exit;
            if($sql_update)
            {
                echo "<script>alert('BERHASIL')</script>";
                header("location:../../media.php?module=personil");
            }else{
                echo "<script>alert('GAGAL')</script>";
                header("location:../../media.php?module=personil");
            }
        }
   }
?>