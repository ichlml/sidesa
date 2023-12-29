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
					<li><a href="#">Personil</a></li>
				</ul>

			<div class="visible-xs breadcrumb-toggle">
				<a class="btn btn-link btn-lg btn-icon" data-toggle="collapse" data-target=".breadcrumb-buttons"><i class="icon-menu2"></i></a>
			</div>

	</div>
			<!-- /breadcrumbs line -->
			<form method="post" action="modul/mod_personil/aksi.php" role="form" enctype="multipart/form-data">
				<div class="block">
				<h6 class="heading-hr"><i class="icon-checkmark-circle"></i> Form Personil</h6>
				<div class="row">
					<div class="col-xs-6">
						<div class="form-group">
								<label for="">Nama Jabatan</label>
								<input type="text" name="nama_jabatan" id="nama_jabatan" class="form-control" value="" required>
								<input type="hidden" name="kode_subdinas" id="kode_subdinas" class="form-control" value="<?= $_SESSION['dinas']?>" readonly required>
						</div>
						<div class="form-group">
								<label for="">Nama Pemangku</label>
								<input type="text" name="nama_pemangku" id="nama_pemangku" class="form-control" value=""  required>
						</div>
						<div class="form-group">
								<label for="">Jenis Personil</label>
								<select name="jenis_personil" id="jenis_personil" class="form-control">
                                    <option value="" disabled selected>Pilih Jenis Personil</option>
                                    <option value="Perangkat Desa">Perangkat Desa</option>
                                    <option value="KPMD">KPMD</option>
                                    <option value="BPD">BPD</option>
                                    <option value="Karang Taruna">Karang Taruna</option>
                                    <option value="PKK">PKK</option>
                                    <option value="Limas">Limas</option>
                                    <option value="Lainya">Lainya</option>
                                </select>
						</div>
                        <div class="form-group">
								<label for="">Tempat Lahir</label>
								<input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" value=""  required>
						</div>
                        <div class="form-group">
								<label for="">Tanggal Lahir</label>
								<input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control" value=""  required>
						</div>
					</div>
					<div class="col-xs-6">
						<div class="form-group">
								<label for="">Jenis Kelamin</label>
                                <select name="jkel" id="jkel" class="form-control">
                                    <option value="" selected disabled>Pilih Jenis Kelamin</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
						</div>
						<div class="form-group">
								<label for="">No SK</label>
								<input type="text" name="no_sk" id="no_sk" class="form-control" value="" required>
						</div>
						<div class="form-group">
								<label for="">Tanggal SK</label>
								<input type="date" name="tgl_sk" id="tgl_sk" class="form-control" value="" required>
						</div>
						<div class="form-group">
								<label for="">Pendidikan</label>
								<input type="text" name="pendidikan" id="pendidikan" class="form-control" value="" required>
						</div>
						<div class="form-group">
								<label for="">Foto</label>
								<input type="file" name="foto" id="foto" class="form-control" value="" required>
						</div>
						<input type="submit" name="submit" value="Submit" class="btn btn-success btn-sm">
					</div>
				</div>
				</div>
			</form>
			
        <!-- /first tab content -->
</div>