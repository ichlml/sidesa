<?php
include "config/koneksi.php";

/**
 * @author AyankQ
 * @copyright 2012
 */

if ($_SESSION['level']=='user'){
	
	$cek = mysql_fetch_array( mysql_query("SELECT status FROM tahun_input WHERE tahun = '$_SESSION[tahun]'") )['status'];
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
			<li><a href="media.php?module=home"><i class="icon-screen2"></i> <span>Dashboard</span></a></li>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-grid"></i> <span>Input</span> <b class="caret"></b></a>
				<ul class="dropdown-menu dropdown-menu-right">
<?php if($cek){ ?>
<?php if($_SESSION[upt]){ echo '<li><a href="media.php?module=modal">Nilai Belanja Modal</a></li>'; } ?>
								<li><a href="media.php?module=tanah">Tanah</a></li>
								<li><a href="media.php?module=alatangkut"> Mesin dan Peralatan</a></li>
								<li><a href="media.php?module=bangunan">Gedung dan Bangunan</a></li>
								<li><a href="media.php?module=jalanirigrasi">Jalan, Irigrasi & jaringan</a></li>
								<li><a href="media.php?module=asettetap">Aset Tetap Lainnya</a></li>
								<li><a href="media.php?module=personil">Personil</a></li>
								
<?php } ?>			
												</ul>
			</li>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-copy"></i> <span>Pemeliharaan</span> <b class="caret"></b></a>
				<ul class="dropdown-menu dropdown-menu-right">
					<!-- <li class="dropdown-submenu">
					<a tabindex="-1" href="#">Laporan Kartu Inventaris Barang&nbsp;</a>
						<ul class="dropdown-menu"> -->
								<li><a href="media.php?module=pemeliharaana">Tanah</a></li>
								<li><a href="media.php?module=pemeliharaanb">Mesin dan Peralatan</a></li>
								<li><a href="media.php?module=pemeliharaanc">Gedung dan Bangunan</a></li>
								<li><a href="media.php?module=pemeliharaand">Jalan, Irigasi dan Jaringan</a></li>
								<li><a href="media.php?module=pemeliharaane">Aset Tetap Lainya</a></li>
						<!-- </ul>
					</li> -->
				</ul>
			</li>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-copy"></i> <span>Penghapusan</span> <b class="caret"></b></a>
				<ul class="dropdown-menu dropdown-menu-right">
					<!-- <li class="dropdown-submenu">
					<a tabindex="-1" href="#">Laporan Kartu Inventaris Barang&nbsp;</a>
						<ul class="dropdown-menu"> -->
								<li><a href="media.php?module=penghapusana">Tanah</a></li>
								<li><a href="media.php?module=penghapusanb">Mesin dan Perakatan</a></li>
								<li><a href="media.php?module=penghapusanc">Gedung dan Bangunan</a></li>
								<li><a href="media.php?module=penghapusand">Jalan, Irigasi dan Jaringan</a></li>
								<li><a href="media.php?module=penghapusane">Aset Tetap Lainya</a></li>
						<!-- </ul>
					</li> -->
				</ul>
			</li>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-copy"></i> <span>Laporan</span> <b class="caret"></b></a>
				<ul class="dropdown-menu dropdown-menu-right">
					<li class="dropdown-submenu">
					<a tabindex="-1" href="#">Laporan Kartu Inventaris Barang&nbsp;</a>
						<ul class="dropdown-menu">
								<li><a href="media.php?module=laporanA">Laporan Tanah</a></li>
								<li><a href="media.php?module=laporanB">Laporan Mesin dan Peralatan</a></li>
								<li><a href="media.php?module=laporanC">Laporan Gedung dan Bangunan</a></li>
								<li><a href="media.php?module=laporanD">Laporan Jalan, Irigasi dan Jaringan</a></li>
								<li><a href="media.php?module=laporanE">Laporan Buku dan Perpustakaan</a></li>
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
					<span><?php echo"$_SESSION[nama_sub]"; ?></span>
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
