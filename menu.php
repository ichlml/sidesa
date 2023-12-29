<?php
include "../config/koneksi.php";

/**
 * @author AyankQ
 * @copyright 2012
 */

if ($_SESSION['level']=='admin'){
?>
    	<!-- Navbar -->
	<div class="navbar navbar-inverse" role="navigation">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-icons">
				<span class="sr-only">Toggle right icons</span>
				<i class="icon-grid"></i>
			</button>
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
				<span class="sr-only">Toggle menu</span>
				<i class="icon-paragraph-justify2"></i>
			</button>
			<a class="navbar-brand" href="#"><img src="images/logo.png" alt="Londinium"></a>
		</div>

		<ul class="nav navbar-nav collapse" id="navbar-menu">
<?php 		if ($_SESSION['view']=='S'){ ?>
			<li><a href="media.php?module=home"><i class="icon-screen2"></i> <span>Dashboard</span></a></li>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-paragraph-justify2"></i> <span>Master</span> <b class="caret"></b></a>
				<ul class="dropdown-menu dropdown-menu-right">
								<li><a href="media.php?module=bidang"> Setup Bidang</a></li>
								<li><a href="media.php?module=barang">Setup Barang</a></li>							
								<li><a href="media.php?module=user">Setup Administrator </a></li>
								<li><a href="media.php?module=tahun">Setup Tahun Input </a></li>							
				</ul>
			</li>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-grid"></i> <span>Input</span> <b class="caret"></b></a>
				<ul class="dropdown-menu dropdown-menu-right">
								<li><a href="media.php?module=tanah">Tanah</a></li>
								<li><a href="media.php?module=alatangkut"> Mesin dan Peralatan</a></li>
								<li><a href="media.php?module=bangunan">Gedung dan Bangunan</a></li>
								<li><a href="media.php?module=jalanirigrasi">Jalan, Irigrasi & jaringan</a></li>
								<li><a href="media.php?module=asettetap"> Buku Perpustakaan</a></li>
								
				</ul>
			</li>
			
			<!-- <li><a href="media.php?module=pemeliharaan"><i class="icon-folder8"></i> <span>Pemeliharaan</span></a></li> -->
<?php } ?>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-copy"></i> <span>Laporan</span> <b class="caret"></b></a>
				<ul class="dropdown-menu dropdown-menu-right">
					<li class="dropdown-submenu">
					<a tabindex="-1" href="#">Laporan Kartu Inventaris Barang&nbsp;</a>
						<ul class="dropdown-menu">
								<li><a href="media.php?module=laporanA">Tanah</a></li>
								<li><a href="media.php?module=laporanB">Mesin dan Peralatan</a></li>
								<li><a href="media.php?module=laporanC">Gedung dan Bangunan</a></li>
								<li><a href="media.php?module=laporanD">Jalan, Irigasi dan Jaringan</a></li>
								<li><a href="media.php?module=laporanE">Aset Tetap Lainnya</a></li>
								<li><a href="media.php?module=laporann">Buku Inventaris Desa</a></li>
						</ul>
					</li>
					
					<li>
						<a href="media.php?module=label">Cetak Label Barang&nbsp;</a>
					</li>
				</ul>
			</li>
		</ul>

		<ul class="nav navbar-nav navbar-right collapse" id="navbar-icons">
			<li><a href="#"><span>Tahun Login : <?php echo"$_SESSION[tahun]"; ?></span></a></li>
			<li class="user dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown">
					<span><?php echo"$_SESSION[namalengkap]"; ?></span>
					<i class="caret"></i>
				</a>
				<ul class="dropdown-menu dropdown-menu-right icons-right">
					<li><a href="media.php?module=profil&act=editprofil&id=<?php echo"$_SESSION[namauser]"; ?>"><i class="icon-cog"></i> Settings</a></li>
					<li><a href="logout.php"><i class="icon-exit"></i> Logout</a></li>
				</ul>
			</li>
		</ul>
	</div>
	<!-- /navbar -->


<?php

}
?>
