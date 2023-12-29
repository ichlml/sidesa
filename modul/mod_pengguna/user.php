<?php
session_start();
	if ($_SESSION['level']=='admin'){

 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/mod_users/aksi_users.php";
	$x="SELECT max(kode_subdinas) as maxidadmin FROM subdinas WHERE kode_subdinas LIKE 'DINAS%'";
	$selectidmax=mysql_query($x) or die ("Eror Query".mysql_error()); 

    $hslidmax=mysql_fetch_array($selectidmax);

    $idmax=$hslidmax['maxidadmin'];


    $nourut = (int) substr($idmax, 4,14);

    $nourut++;


    $IDbaru = "DINAS" . sprintf("%014s", "$nourut");  

switch($_GET[act]){
  // Tampil Tag
  default:
?>
		<!-- Page content -->
		<style type="text/css">
		.baru {
	color: #000;
}
        </style>
		
		<div class="page-content">


			<!-- Page header -->
			<div class="page-header">
				<div class="page-title">
					<h3>Sistem Informasi Aset Desa <small>Membantu Dalam Melakukan Manajement aset Desa</small></h3>
				</div>

			</div>
			<!-- /page header -->


			<!-- Breadcrumbs line -->
			<div class="breadcrumb-line">
				<ul class="breadcrumb">
					<li><a href="?module=home">Home</a></li>
					<li><a href="#">Master</a></li>
					<li><a href="?module=user">Setup Administrator System per Unit</a></li>
				</ul>

				<div class="visible-xs breadcrumb-toggle">
					<a class="btn btn-link btn-lg btn-icon" data-toggle="collapse" data-target=".breadcrumb-buttons"><i class="icon-menu2"></i></a>
				</div>

			</div>
			<!-- /breadcrumbs line -->


	        <!-- Page tabs -->
            <div class="tabbable page-tabs">
                <div class="tab-content">
<?php
if ($_GET['code'] == 2){
?>
<div class="alert alert-success fade in block-inner">
                    		<button type="button" class="close" data-dismiss="alert">×</button>
                    		Data berhasil dihapus  .... 
                    	</div><?php } ?>
<?php
if ($_GET['code'] == 3){
?>
<div class="alert alert-success fade in block-inner">
                    		<button type="button" class="close" data-dismiss="alert">×</button>
                    		Data berhasil diupdate  .... 
                    	</div><?php } ?>
<?php
if ($_GET['code'] == 4){
?>
<div class="alert alert-success fade in block-inner">
                    		<button type="button" class="close" data-dismiss="alert">×</button>

                    		Data berhasil diimport  .... 
                    	</div><?php } ?>

                	<!-- First tab content -->
                	<div class="tab-pane active fade in" id="inside">

				    	<!-- Default datatable inside panel -->
			           <!-- Datatable with custom column filtering -->
			            <div class="panel panel-default">
			                <div class="panel-heading"><h6 class="panel-title"><i class="icon-table"></i> Data Administrator System per Unit</h6></div>
			                <div class="datatable-add-row">
				                <table class="table">
				                    <thead>
				                        <tr>
												<th width="3%">No</th>
												<th width="17%">Kode UPB</th>
												<th>UPB</th>
												<th>Username</th>
												<th>Status</th>
												<th width="5%"><center>Action</center></th>
				                        </tr>
				                    </thead>

									<tfoot>
										<tr>
												<th>No</th>
												<th>Kode UPB</th>
												<th>UPB</th>
												<th>Username</th>
												<th>Status</th>
												<th>&nbsp;</th>
										</tr>
									</tfoot>

				                    <tbody>
<?php
$tampil = mysql_query("SELECT * FROM subdinas  ORDER BY nama_subdinas DESC");
  $no=1;
    while ($r=mysql_fetch_array($tampil)){
		
		if ($r['username']!='')
		{
			$admin = "$r[username]";
		} else {
			$admin = "Belum disetting";
		}
		
		if ($r['aktif'] == 'A')
		{
			$status = "Aktif";
		} else {
			$status = "Non-Aktif";
		}

		
?>
				                        <tr>
                                            <td><?php echo"$no"; ?></td>
                                            <td><?php echo"$r[kode_subdinas]"; ?></td>
                                            <td><?php echo"$r[nama_subdinas]"; ?></td>
                                            <td><?php echo"$admin"; ?></td>
                                            <td><?php echo"$status"; ?></td>
				                            <td><center><?php echo"<a href=?module=user&act=edituser&id=$r[username]>"; ?><span class="icon-eye"></span> </a></center></td>
				                        </tr>
                                        <?php $no++; } ?>
    
				                    </tbody>
				                </table>
			                </div>
				        </div>
				        <!-- /datatable with custom column filtering -->


				    

                	</div>
                	<!-- /first tab content -->


                	<!-- Second tab content -->
                	
				    	<!-- Default datatable -->
			          

                	</div>
                	<!-- /second tab content -->


                	

            	</div>

        	<!-- /page tabs -->
			
			<?php
     break;
  
  // Form Edit Kategori  
  case "edituser":
    $edit=mysql_query("SELECT * FROM subdinas WHERE  username = '$_GET[id]'");
    $r=mysql_fetch_array($edit);

?>
		<div class="page-content">


			<!-- Page header -->
			<div class="page-header">
				<div class="page-title">
					<h3>Sistem Informasi Aset Desa <small>Membantu Dalam Melakukan Manajement aset Desa</small></h3>
				</div>

			</div>
			<!-- /page header -->


			<!-- Breadcrumbs line -->
			<div class="breadcrumb-line">
				<ul class="breadcrumb">
					<li><a href="?module=home">Home</a></li>
					<li><a href="#">Master</a></li>
					<li><a href="?module=user">Setup Administator per unit</a></li>
					<li><a href="?module=user&edituser">Form Administator Per Unit</a></li>
				</ul>

				<div class="visible-xs breadcrumb-toggle">
					<a class="btn btn-link btn-lg btn-icon" data-toggle="collapse" data-target=".breadcrumb-buttons"><i class="icon-menu2"></i></a>
				</div>

			</div>
			<!-- /breadcrumbs line -->


		    <!-- Form validation -->
            <form class="form-horizontal validate" method="post" action="<?php echo"$aksi?module=user&act=update"; ?>" role="form">
	            <div class="block">
	                <h6 class="heading-hr"><i class="icon-checkmark-circle"></i> Form Administator Per Unit</h6>
<input type="hidden" name="id" value="<?php echo"$_GET[id]"; ?>" />

					<div class="form-group">
						<div class="col-sm-6">
													<label for="kode_subdinas" class="req">Subdinas</label>
													<input type="text" name="subdinas" id="subdinas" class="form-control" value="<?php echo"$r[nama_subdinas]"; ?>" disabled >
			                    	
			                    </div>
                                <div class="col-sm-6">
													<label for="kode_subdinas" class="req">Username</label>
													<input type="text" name="subdinas" id="subdinas" class="form-control" value="<?php echo"$r[username]"; ?>" disabled >
			                    	
			                    </div>
								
								

					</div>
					<div class="form-group">
						<div class="col-sm-6">
													<label for="kode_subdinas" class="req">Nama Admin</label>
													<input type="text" name="nama" id="nama" class="form-control" value="<?php echo"$r[nama_admin]"; ?>" >
			                    	
			                    </div>
					  <div class="col-sm-6">
			                    		<label for="kode_subdinas" class="req">Password</label>
													<input type="text" name="password" id="password" class="form-control"  >
		                      </div>
								
								
								

					</div>
                    
                    	<div class="form-group">
					 <div class="col-sm-6">
<label> HP :</label>
													<input type="text" name="hp" id="hp" class="form-control" value="<?php echo"$r[hp]"; ?>" >
		                      </div>	
					 <div class="col-sm-6">
<label> Akses :</label> <br>
<label class="radio-inline radio-info">
										<input name="akses"  value ="A" type="radio" class="styled" <?php if ($r['akses'] == 'A') { echo"checked='checked'"; }  ?>>
										Aktif
									</label>
									<label class="radio-inline radio-info">
										<input name="akses"   value ="T" type="radio" class="styled"  <?php if ($r['akses'] == 'T') { echo"checked='checked'"; }  ?>>
										Non - Aktif
									</label>	
		                      </div>	
							  <div class="col-sm-6">
										
<label>Aktif :</label> <br/>
		                    	<label class="radio-inline radio-info">
										<input name="aktif"  value ="A" type="radio" class="styled" <?php if ($r['aktif'] == 'A') { echo"checked='checked'"; }  ?>>
										Aktif
									</label>
									<label class="radio-inline radio-info">
										<input name="aktif"   value ="T" type="radio" class="styled"  <?php if ($r['aktif'] == 'T') { echo"checked='checked'"; }  ?>>
										Non - Aktif
									</label>		
			                    	
			                    </div>
					 
								
								
								

					</div>
                    
                    	                                        
					<div class="form-group">
						<div class="col-sm-6">
			                    </div>
             </div>
                    
                    <div class="form-actions text-right">
                    	<input type="submit" value="Update" class="btn btn-primary">
                    </div>
                    
                </div>
            </form>
            
			<?php
    break;  
}
}
	}
?>
