<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/mod_invesa/aksi_invesa.php";
switch($_GET[act]){
  // Tampil Tag
  default:
?>
		<!-- Page container -->
 	<div class="page-container">


		<!-- Page content -->
	 	<div class="page-content">


			<!-- Page header -->
			<div class="page-header">
				<div class="page-title">
					<h3>Sistem Informasi Aset Daerah <small>Sistem ini membantu anda dalam melakukan manajement aset daerah</small></h3>
				</div>

				
			</div>
			<!-- /page header -->


			<!-- Breadcrumbs line -->
		
			<!-- /breadcrumbs line -->

		<!-- main content -->
		<!-- Callout -->
				<div class="error-wrapper text-center">
	    <h1>404</h1>
        <h6>- Oops, an error has occurred. Batas pengisian Data Aset Sudah Berakhir  !!! -</h6>
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
												<small>ALAT ANGKUT</small>

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
						<small>BUKU PERPUSTAKAAN</small>
					</div>
					<a href="?module=laporanE"><i class="icon-briefcase"></i></a>
				</li>
				
				</ul>

				
			<!-- /info blocks -->


			<?php
    break;  
}
}
?>
