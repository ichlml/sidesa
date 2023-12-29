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

       $id= $_GET['id'];
       $update = mysql_query("UPDATE invesc SET status_penggunaan='0' where id_invesc='$id'");
    
       if ($update)
            {
                // tampilkan pesan order berhasil dan pindah ke halaman data order
                echo "<script>alert('Seleksi data Berhasil');window.location='../../media.php?module=pemeliharaanc'</script>";
            }
            //jika gagal update
            else
            {
                // tampilkan pesan order gagal dan pindah ke halaman data order
                echo "<script>alert('Seleksi Data Gagal');window.location='../../media.php?module=pemeliharaanc'</script>";
            }

       }
?>