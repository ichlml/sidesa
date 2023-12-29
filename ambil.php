<?php
include"config/koneksi.php";
$propinsi = $_GET['skpda'];
$kota = mysql_query("SELECT * FROM invesa, barang, subdinas where invesa.skpd=subdinas.kode_subdinas and barang.kode_barang=invesa.kode_barang and skpd='$propinsi' order by kode_invesa");
                                              $tampil = mysql_query("SELECT * FROM invesb, barang, subdinas where invesb.skpd=subdinas.kode_subdinas and barang.kode_barang=invesb.kode_barang and skpd='$propinsi' order by kode_invesb DESC") ;

                                              $tampill = mysql_query("SELECT * FROM invesc, barang, subdinas where invesc.skpd=subdinas.kode_subdinas and barang.kode_barang=invesc.kode_barang  and skpd='$propinsi' order by kode_invesc DESC") ;
                                              $tampilll = mysql_query("SELECT * FROM invesd, barang, subdinas where invesd.skpd=subdinas.kode_subdinas and barang.kode_barang=invesd.kode_barang order by kode_invesd and skpd='$propinsi' order by kode_invesd DESC") ;
                                              $tampillll = mysql_query("SELECT * FROM invese, barang, subdinas where invese.skpd=subdinas.kode_subdinas and barang.kode_barang=invese.kode_barang and skpd='$propinsi' order by kode_invese DESC") ;
                                              $tampilllll = mysql_query("SELECT * FROM invesf, barang, subdinas where invesf.skpd=subdinas.kode_subdinas and barang.kode_barang=invesf.kode_barang and skpd='$propinsi' order by kode_invesf DESC") ;

echo "<option>-- Pilih Barang --</option>";
while($k = mysql_fetch_array($kota)){
    echo "<option value=\"".$k['kode_barang']."\">".$k['nama_barang']."</option>\n";
}
while($s = mysql_fetch_array($tampil)){
    echo "<option value=\"".$s['kode_barang']."\">".$s['nama_barang']."</option>\n";
}
while($c = mysql_fetch_array($tampill)){
    echo "<option value=\"".$c['kode_barang']."\">".$c['nama_barang']."</option>\n";
}
while($d = mysql_fetch_array($tampilll)){
    echo "<option value=\"".$d['kode_barang']."\">".$d['nama_barang']."</option>\n";
}
while($e = mysql_fetch_array($tampillll)){
    echo "<option value=\"".$e['kode_barang']."\">".$e['nama_barang']."</option>\n";
}
while($f = mysql_fetch_array($tampilllll)){
    echo "<option value=\"".$f['kode_barang']."\">".$f['nama_barang']."</option>\n";
}
?>
