<div class="page-content">
    <!-- Page header -->
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
            <li><a href="?module=pemeliharaan">Personil</a></li>
        </ul>

        <div class="visible-xs breadcrumb-toggle">
            <a class="btn btn-link btn-lg btn-icon" data-toggle="collapse" data-target=".breadcrumb-buttons"><i class="icon-menu2"></i></a>
        </div>

    </div>
    <!-- /breadcrumbs line -->

    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="panel-title"><h3>Pilih Desa</h3></div>
        </div>
        <div class="panel-body">
            <form method="POST" action="modul/mod_personiladmin/cetak.php">
                <div class="block">
                    <div class="row">
                            <div class="col-md-7">
                                <label for="">SKPD</label>
                                <select name="skpd" class="select-full" id="skpd" tabindex="2" data-placeholder="Pilih SKPD...">
                                <option value="" selected> -- Pilih UPB -- </option>
                                    
                                <?php 
                                    if ($_SESSION['level']=='admin' OR $_SESSION[upt]){ 
                                        
                                        $somevariabelquery = "SELECT * FROM subdinas ORDER BY nama_subdinas ";
                                        $tampil = mysql_query($somevariabelquery);
                                            while($r=mysql_fetch_array($tampil)){
                                                echo "<option value='".$r['kode_subdinas']."'>$r[nama_subdinas]</option>";
                                            }
                                    }
                                ?>

                                                        </select>		
                            </div>
                            <!-- <div class="col-md-7"> <br> -->
                            <div class="col-md-7"><br>
                                    <label for="">Jenis Personil</label>
                                    <select name="jenis_personil" id="jenis_personil" class="form-control">
                                        <option value="" selected disabled> PILIH JENIS PERSONIL</option>
                                        <option value="Perangkat Desa">Perangkat Desa</option>
                                        <option value="KPMD">KPMD</option>
                                        <option value="BPD">BPD</option>
                                        <option value="Karang Taruna">Karang Taruna</option>
                                        <option value="PKK">PKK</option>
                                        <option value="Limas">Limas</option>
                                        <option value="Lainya">Lainya</option>
                                    </select>
                            </div>
                        </div>
                    </div>
                            <input type="submit" value="Submit" class="btn btn-sm btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>