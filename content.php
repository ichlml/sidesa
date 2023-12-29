<?php
if ($_SESSION['level'] == 'admin')
{

include "config/koneksi.php";
include "config/library.php";
include "config/fungsi_indotgl.php";
include "config/fungsi_combobox.php";
include "config/fungsi_rupiah.php";
include "config/bar128.php";
include "config/class_paging.php";

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
				<li class="bg-primary">
					<div class="top-info">
						<a href="?module=bidang">Master Bidang</a>
						
					</div>
					<a href="?module=bidang"><i class="icon-rock"></i></a>
				</li>
				<li class="bg-success">
					<div class="top-info">
						<a href="?module=barang">Master Barang</a>
					</div>
					<a href="?module=barang"><i class="icon-cogs"></i></a>
				</li>
				
				<li class="bg-warning">
					<div class="top-info">
						<a href="?module=user">Master User</a>
					</div>
					<a href="?module=user"><i class="icon-users"></i></a>
				</li>
				<li class="bg-warning">
					<div class="top-info">
						<a href="?module=filterpersonil">Master Personil</a>
					</div>
					<a href="?module=filterpersonil"><i class="icon-users"></i></a>
				</li>
		  </ul>
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
						<small>Aset tetap lainnya</small>
					</div>
					<a href="?module=laporanE"><i class="icon-briefcase"></i></a>
				</li>
				
				
			
			
<?php
		break;
	case 'filterpersonil' : 
		include "modul/mod_personiladmin/filter.php";
		break;
	case 'bidang' : 
		include "modul/mod_bidang/bidang.php";
		break;
	case 'barang' : 
		include "modul/mod_barang/barang.php";
		break;
	
	case 'dinas' : 
		include "modul/mod_dinas/dinas.php";
		break;
	case 'subdinas': 
		include "modul/mod_subdinas/subdinas.php";
		break;
	case 'user' : 
		include "modul/mod_pengguna/user.php";
		break;
	case 'tahun' : 
		include "modul/mod_tahun_input/tahun.php";
		break;
	case 'modal' : 
		include "modul/mod_modal/nilaibelanjamodal.php";
		break;
	case 'tanah' : 
		include "modul/mod_invesa/invesa.php";
		break;
	case 'alatangkut' : 
		include "modul/mod_invesb/invesb.php";
		break;
	case 'bangunan' : 
		include "modul/mod_invesc/invesc.php";
		break;
	case 'jalanirigrasi' : 
		include "modul/mod_invesd/invesd.php";
		break;
	case 'asettetap' : 
		include "modul/mod_invese/invese.php";
		break;
	case 'kepsek' : 
		include "modul/mod_kepsek/profil.php";
		break;
	case 'konstruksi' : 
		include "modul/mod_invesf/invesf.php";
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