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
        $id_invesa = $_POST['id_invesa'];
        if($id != null)
        {
            $query = mysql_query("DELETE FROM tb_pemeliharaan WHERE id_pemeliharaan = '$id' ");

            if($query)
            {
                echo "<script>alert('BERHASIL')</script>";
                header("location:../../media.php?module=pmltanah&id=".$id_invesa);
            }else{
                echo "<script>alert('GAGAL')</script>";
                header("location:../../media.php?module=pmltanah&id=".$id_invesa);
            }
        }
   }
?>