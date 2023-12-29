<div class="page-content">
	<div class="page-header">
			<div class="page-title">
				<h3>Sistem Informasi Pengelolaan Aset Desa <small>Membantu Dalam Melakukan Pendataan aset Desa</small></h3>
			</div>

			</div>
			<!-- /page header -->


			<!-- Breadcrumbs line -->
			<div class="breadcrumb-line">
				<ul class="breadcrumb">
					<li><a href="?module=home">Home</a></li>
					<li><a href="#">Pemeliharaan</a></li>
					<li><a href="?module=pemeliharaana">Pemeliharaan Mesin dan Peralatan</a></li>
				</ul>

			<div class="visible-xs breadcrumb-toggle">
				<a class="btn btn-link btn-lg btn-icon" data-toggle="collapse" data-target=".breadcrumb-buttons"><i class="icon-menu2"></i></a>
			</div>

	</div>
			<!-- /breadcrumbs line -->

			<?php
			//ambil data
			$id = $_GET['id'];
			// $user = $_SESSION['namauser'];
			
			$sql = mysql_query("SELECT * FROM invesb, barang, subdinas where invesb.skpd=subdinas.kode_subdinas and barang.kode_barang=invesb.kode_barang  and subdinas.kode_subdinas = '$_SESSION[dinas]' AND id_invesb='$id' order by invesb.id_invesb  DESC, invesb.register DESC") or die(mysql_error('koneksi gagal'));
			
			$data = mysql_fetch_array($sql);
			// echo '<pre>';
			// print_r($data);
			// exit;
			// echo '</pre>';
			// $aksi="modul/mod_pemeliharaan/aksi_pemba.php";
			?>
			<form method="post" action="modul/mod_pemeliharaanb/aksi_pmlb.php" role="form">
				<div class="block">
				<h6 class="heading-hr"><i class="icon-checkmark-circle"></i> Form Pemeliharaan Mesin dan Peralatan</h6>
				<div class="row">
					<div class="col-xs-6">
						<div class="form-group">
								<label for="">Kode Bidang</label>
								<input type="text" name="kode_bidang" id="kode_bidang" class="form-control" value="<?= $data['kode_bidang']?>" readonly required>
								<input type="hidden" name="id_invesb" id="id_invesb" class="form-control" value="<?= $data['id_invesb']?>" readonly required>
						</div>
						<div class="form-group">
								<label for="">Kode Barang</label>
								<input type="text" name="kode_barang" id="kode_barang" class="form-control" value="<?= $data['kode_barang']?>"  readonly required>
						</div>
						<div class="form-group">
								<label for="">Register</label>
								<input type="text" name="register" id="register" class="form-control" value="<?= $data['register']?>"  readonly required>
						</div>
					</div>
					<div class="col-xs-6">
						<div class="form-group">
								<label for="">Tanggal Dokumen</label>
								<input type="date" name="tgl_documen" id="tgl_documen" class="form-control" value="" required>
						</div>
						<div class="form-group">
								<label for="">Nilai</label>
								<input type="number" name="nilai" id="nilai" class="form-control" value="" required>
						</div>
						<div class="form-group">
								<label for="">Keterangan</label>
								<textarea name="keterangan" id="keterangan" cols="5" rows="5" class="form-control"></textarea>
						</div>
						<input type="submit" name="submit" value="Submit" class="btn btn-success btn-sm">
					</div>
				</div>
				</div>
			</form>
			<div class="tab-pane active fade in" id="inside">

            <!-- Default datatable inside panel -->
            <!-- Datatable with custom column filtering -->
            <div class="panel panel-default">
                <div class="panel-heading"><h6 class="panel-title"><i class="icon-table"></i> Riwayat Pemeliharaan <?=strtoupper($data['nama_barang'])?></h6></div>
                <div class="datatable-add-row">
                    <table class="table">
						<thead>
							<tr>
								<th>No.</th>
								<th>Nama Bidang</th>
								<th>Nama Barang</th>
								<th>Register</th>
								<th>Tanggal Dokumen</th>
								<th>Nilai</th>
								<th>Keterangan</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
						<?php
							$no=1;
							$kd = $data['kode_barang'];
							// print_r($kd);
							// exit;
							$sql = mysql_query("SELECT * FROM tb_pemeliharaan inner join bidang using(kode_bidang) inner join barang using(kode_barang) where barang.	kode_barang='$kd' order by tgl_documen DESC");
							while($row=mysql_fetch_array($sql)){
						?>
							<tr>
								<td><?= $no++?></td>
								<td><?= $row['nama_bidang']?></td>
								<td><?= $row['nama_barang']?></td>
								<td><?= $row['register']?></td>
								<td><?= $row['tgl_documen']?></td>
								<td><?= $row['nilai']?></td>
								<td><?= $row['keterangan']?></td>
								<td>
									<a href="./modul/mod_pemeliharaanb/hapus.php?id=<?=$row[id_pemeliharaan]; ?>" onclick="return confirm('Anda Yakin ingin menghapus data ?');"><span class="icon-remove4"></span> </a>
									</td>
								</td>
							</tr>    
						</tbody>
						<?php 
							}
						?>
                    </table>
                </div>
            </div>
            <!-- /datatable with custom column filtering -->

        </div>
        <!-- /first tab content -->
</div>