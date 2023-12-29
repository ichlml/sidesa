<?php
if ($_SESSION['level'] == 'user')
{

include "config/koneksi.php";
include "config/library.php";
include "config/fungsi_indotgl.php";
include "config/fungsi_combobox.php";
include "config/fungsi_rupiah.php";
include "config/bar128.php";
include "config/class_paging.php";

$ceking = mysql_fetch_array(mysql_query("select tutup from users where username = 'admin' "));
if ($ceking['tutup']=='B') { $ceking = true; } 
else { $ceking = false; }

$cek = mysql_fetch_array( mysql_query("SELECT status FROM tahun_input WHERE tahun = '$_SESSION[tahun]'") )['status'];

	switch ($_GET['module']) {
	case 'home' : 
?>
	<!-- Page container -->
 	<div class="page-container">


		<!-- Page content -->
	 	<div class="page-content">


			<!-- Page header -->
			<div class="page-header">
				<div class="page-title">
					<h3>Sistem Informasi Pengelolaan Aset Desa <small>Sistem ini membantu anda dalam melakukan pendataan aset desa</small></h3>
				</div>

				
			</div>
			<!-- /page header -->


			<!-- Breadcrumbs line -->
			<div class="breadcrumb-line">
				<ul class="breadcrumb">
					<li><a href="?module=home">Dashboard</a></li>
					
				</ul>

				<div class="visible-xs breadcrumb-toggle">
					<a class="btn btn-link btn-lg btn-icon" data-toggle="collapse" data-target=".breadcrumb-buttons"><i class="icon-menu2"></i></a>
				</div>

				
			</div>
			<!-- /breadcrumbs line -->

		<!-- main content -->
		<!-- Callout -->
			<div class="callout callout-info fade in">
				<button type="button" class="close" data-dismiss="alert">×</button>
				<h5>Selamat Datang </h5>
				<p>Sistem ini membantu anda dalam melakukan pendataan aset desa </p>
			</div>
            <!-- /callout -->
<!-- Info blocks -->
			
				<ul class="info-blocks">
				<li class="bg-info">
					<div class="top-info">
						<a href="?module=laporanA">Inventaris A</a>
												<small>TANAH</small>

					</div>
					<a href="?module=laporanA"><i class="icon-puzzle3"></i></a>

				</li>
				<li class="bg-danger">
					<div class="top-info">
						<a href="?module=laporanB">Inventaris B</a>
												<small>MESIN DAN PERALATAN</small>

					</div>
					<a href="?module=laporanB"><i class="icon-truck"></i></a>
				</li>
				<li class="bg-success">
					<div class="top-info">
						<a href="?module=laporanC">Inventaris C</a>
												<small>GEDUNG DAN BANGUNAN</small>

					</div>
					<a href="?module=laporanC"><i class="icon-office"></i></a>
				</li>
				<li class="bg-primary">
					<div class="top-info">
						<a href="?module=laporanD">Inventaris D</a>
												<small>JALAN, IRIGRASI DAN JARINGAN</small>

					</div>
					<a href="?module=laporanD"><i class="icon-road"></i></a>
				</li>
				<li class="bg-primary">
					<div class="top-info">
						<a href="?module=laporanE">Inventaris E</a>
						<small>Aset Tetap Lainnya</small>
					</div>
					<a href="?module=laporanE"><i class="icon-briefcase"></i></a>
				</li>
				<li class="bg-warning">
					<div class="top-info">
						<a href="?module=personil">Personil</a>
						<small>Desa</small>
					</div>
					<a href="?module=personil"><i class="icon-user"></i></a>
				</li>
				
				
			

<?php
		break; 
	case 'personil' : 
		include "modul/mod_personil/personil.php";
		break;
	case 'addPersonil' : 
		include "modul/mod_personil/add.php";
		break;
	case 'editpersonil' : 
		include "modul/mod_personil/edit.php";
		break;
	case 'user' : 
		include "modul/mod_pengguna/user.php";
		break;
	case 'modal' : 
		if ($ceking AND $cek) { include "modul/mod_modal/nilaibelanjamodal.php"; }
		else { include "modul/mod_tutup/tutup.php"; }
		break;
	case 'tanah' : 
		if ($ceking AND $cek) { include "modul/mod_invesa/invesa.php"; }
		else { include "modul/mod_tutup/tutup.php"; }
		break;
	case 'alatangkut' : 
		if ($ceking AND $cek) { include "modul/mod_invesb/invesb.php"; }
		else { include "modul/mod_tutup/tutup.php"; }
		break;
	case 'bangunan' : 
		if ($ceking AND $cek) { include "modul/mod_invesc/invesc.php"; }
		else { include "modul/mod_tutup/tutup.php"; }
		break;
	case 'jalanirigrasi' : 
		if ($ceking AND $cek) { include "modul/mod_invesd/invesd.php"; }
		else { include "modul/mod_tutup/tutup.php"; }
		break;
	case 'asettetap' : 
		if ($ceking AND $cek) { include "modul/mod_invese/invese.php"; }
		else { include "modul/mod_tutup/tutup.php"; }
		break;
	case 'kepsek' : 
		include "modul/mod_kepsek/profil.php";
		break;
	case 'konstruksi' : 
		include "modul/mod_invesf/invesf.php";
		break;
	case 'pemeliharaana' : 
		include "modul/mod_pemeliharaan/pemeliharaan.php";
		break;
	case 'pmltanah' : 
		include "modul/mod_pemeliharaan/add.php";
		break;
	case 'pemeliharaanb' : 
		include "modul/mod_pemeliharaanb/pemeliharaanb.php";
		break;
	case 'pmlalatangkut' : 
		include "modul/mod_pemeliharaanb/add.php";
		break;
	case 'pemeliharaanc' : 
		include "modul/mod_pemeliharaanc/pemeliharaanc.php";
		break;
	case 'pmlc' : 
		include "modul/mod_pemeliharaanc/add.php";
		break;
	case 'pemeliharaand' : 
		include "modul/mod_pemeliharaand/pemeliharaand.php";
		break;
		case 'pmld' : 
	include "modul/mod_pemeliharaand/add.php";
		break;
	case 'pemeliharaane' : 
		include "modul/mod_pemeliharaane/pemeliharaane.php";
		break;
		case 'pmle' : 
			include "modul/mod_pemeliharaane/add.php";
		break;
	case 'penghapusana' : 
	include "modul/mod_penghapusana/penghapusana.php";
		break;
	case 'hapusa' : 
		include "modul/mod_penghapusana/hapus.php";
		break;
	case 'dftrpenghapusana' : 
		include "modul/mod_penghapusana/daftar_penghapusan.php";
		break;
	case 'penghapusanb' :
	include "modul/mod_penghapusanb/penghapusanb.php";
		break;
	case 'hapusb' : 
		include "modul/mod_penghapusanb/hapus.php";
		break;
	case 'dftrpenghapusanb' : 
		include "modul/mod_penghapusanb/daftar_penghapusanb.php";
		break;
	case 'penghapusanc' :
	include "modul/mod_penghapusanc/penghapusanc.php";
		break;
		case 'hapusc' : 
			include "modul/mod_penghapusanc/hapus.php";
			break;
		case 'dftrpenghapusanc' : 
			include "modul/mod_penghapusanc/daftar_penghapusanc.php";
			break;
	case 'penghapusand' :
	include "modul/mod_penghapusand/penghapusand.php";
		break;
	case 'hapusd' : 
		include "modul/mod_penghapusand/hapus.php";
		break;
	case 'dftrpenghapusand' : 
		include "modul/mod_penghapusand/daftar_penghapusand.php";
		break;
	case 'penghapusane' :
		include "modul/mod_penghapusane/penghapusane.php";
		break;
	case 'hapuse' : 
		include "modul/mod_penghapusane/hapus.php";
		break;
	case 'dftrpenghapusane' : 
		include "modul/mod_penghapusane/daftar_penghapusane.php";
		break;
	case 'filter_lapb' :
		include "modul/mod_laporanb/filter.php";
		break;
	case 'rencana_pemeliharaan' : 
		include "modul/mod_rencana_pemeliharaan/rencana_pemeliharaan.php";
		break;
	case 'realisasi_pemeliharaan' : 
		include "modul/mod_realisasi_pemeliharaan/realisasi_pemeliharaan.php";
		break;
	case 'rencana_penghapusan' : 
		include "modul/mod_rencana_penghapusan/rencana_penghapusan.php";
		break;
	case 'realisasi_penghapusan' : 
		include "modul/mod_realisasi_penghapusan/realisasi_penghapusan.php";
		break;
	case 'profil' : 
		include "modul/mod_profil/profil.php";
		break;
	case 'mutasi' : 
		include "modul/mod_mutasi/mutasi.php";
		break;
	case 'gunausaha' : 
		include "modul/mod_gunausaha/gunausaha.php";
		break;
	case 'keluar' : 
		include "modul/mod_keluar/keluar.php";
		break;
	case 'penggunaan' : 
		include "modul/mod_penggunaan/penggunaan.php";
		break;
	case 'laporanA' : 
		include "modul/mod_laporana/laporana.php";
		break;
	case 'laporanB' : 
		include "modul/mod_laporanb/laporanb.php";
		break;
	case 'laporanC' : 
		include "modul/mod_laporanc/laporanc.php";
		break;
	case 'laporanD' : 
		include "modul/mod_laporand/laporand.php";
		break;
	case 'laporanE' : 
		include "modul/mod_laporane/laporane.php";
		break;
	case 'laporanF' : 
		include "modul/mod_laporanf/laporanf.php";
		break;
	case 'laporann' : 
		include "modul/mod_laporann/laporann.php";
		break;
	case 'label' : 
		include "modul/mod_label/label.php";
		break;
	case 'bukuinventaris' : 
		include "modul/mod_bukuinventaris/bukuinventaris.php";
		break;
	case 'rekapitulasiinventaris' : 
		include "modul/mod_rekapitulasiinventaris/rekapitulasiinventaris.php";
		break;
	
	default : 
		echo "<p><b>MODUL BELUM ADA ATAU BELUM LENGKAP</b></p>";
		break;
	} //end switch

} else {
	header("location:index.php");
}
?>