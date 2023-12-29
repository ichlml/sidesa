<?php
include '../../config/koneksi.php';
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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personil</title>
</head>
<body>
<?php
    $id = $_POST['skpd'];
    $jenis = $_POST['jenis_personil'];
    $a = mysql_query("SELECT * FROM personil inner join subdinas using(kode_subdinas) WHERE kode_subdinas='$id'");
    $data = mysql_fetch_array($a);
?>
    <center>Data Personil <?=$data['nama_subdinas']?></center>
    <hr>
    <table width="100%" border="1">
    <tr>
												<th>No.</th>
												<th>Nama Jabatan </th>
												<th>Nama Pemangku</th>
												<th>Jenis Personil</th>
												<th>No SK</th>
												<th>Tanggal SK</th>
												<th>Pendidikan</th>
												<th>Foto</th>
												<!-- <th width="5%"><center>Action</center></th>				                        </tr> -->
				                    </thead>

				                    <tbody>
<?php

    $no=1;
    
    $query = mysql_query("SELECT * FROM personil where kode_subdinas='$id' AND jenis_personil='$jenis' ");
    while($r=mysql_fetch_array($query)){
    // print_r($r);
    // exit;
		
?>
				                        <tr>
                                            <td><?php echo"$no"; ?></td>
                                            <td><?php echo"$r[nama_jabatan]"; ?></td>
                                            <td><?php echo"$r[nama_pemangku]"; ?></td>
											<td><?php echo"$r[jenis_personil]"; ?></td>
											<td><?php echo"$r[no_sk]"; ?></td>
											<td><?php echo"$r[tgl_sk]"; ?></td>
                                            <td><?php echo"$r[pendidikan]"; ?></td>
                                            <td><img src="../..//modul/img/<?=$r['foto'] ?>" alt="foto personil" width="50" height="50"></td>
				                        </tr>
                                        <?php $no++; }?>
    
				                    </tbody>
    </table>
</body>
</html>
<script>
    window.print();
</script>