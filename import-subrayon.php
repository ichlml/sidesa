<?php
require "inc/function_sr.php";
get_header();
if(!isset($_SESSION['kode_subrayon'])){
	print "<script>window.location = '".BASE_URL."'</script>";
}

$data = getBatasWaktu();

foreach($data as $waktu){

    $id_batas_waktu = $waktu['id_batas_waktu'];

    $batas_waktu = $waktu['batas_waktu'];

}

$date_create = date_create_from_format('Y-m-d H:i:s', $batas_waktu);

$tgl_batas = date_format($date_create, "d/m/Y H:i:s");

$tgl_sekarang = date("d/m/Y H:i:s");

$hari_batas = date_format($date_create, "l");

if($tgl_sekarang > $tgl_batas){
	$disabled_mode = "disabled";
} else {
	$disabled_mode = "";
}

print '<div style="width:100%; padding: 5px; background-color: #DF584C; color: #FFFFFF"><b>Perhatian: </b>Batas waktu entri nilai pada hari '.HariIndo($hari_batas);
print '&nbsp;'.$tgl_batas;
print '</div>';

if(isset($_POST['simpan']))
{
	if($tgl_sekarang < $tgl_batas)
	{
		$_SESSION['colspan'] = 1;
		$_SESSION['bin_class'] = 'info';
		$_SESSION['mat_class'] = 'danger';
		$_SESSION['ipa_class'] = 'warning';
		unset($_SESSION['import_subrayon']);
		$no=0;
		foreach($_POST['jml_input'] as $ulang){
			$query = $db->query("UPDATE tb_siswa SET bi = '".$_POST['bi'][$no]."', 
											mat = '".$_POST['mat'][$no]."', 
											ipa = '".$_POST['ipa'][$no]."' WHERE no_peserta = '".$_POST['nopes'][$no]."'");
	
			//$query ? print '<script>alert("berhasil")</script>' : print '';
			$no++;
		}
		print "<script>window.location = 'import-subrayon.php'</script>";
	}
	else
	{
		print '<script>alert("Anda telah memasukkan nilai melewati batas deadline entri nilai! harap hubungi Admin Web!")</script>';
	}
}

// import excel
if (isset($_FILES["excel"])){
	if($tgl_sekarang < $tgl_batas)
	{
		if($_FILES["excel"]["error"] == UPLOAD_ERR_OK){
			$session_import = null;
			// get file extension
			$ext = pathinfo($_FILES['excel']['name'], PATHINFO_EXTENSION);
			$ext = strtolower($ext);
			$tmp_name = $_FILES["excel"]["tmp_name"];
			$new_path = realpath(".")."/excel_subrayon_".$_SESSION['kode_subrayon'].".".$ext;
			move_uploaded_file($tmp_name, $new_path) ? $tmp_name = $new_path : die('Unable to move the file');
			require ('./vendor/autoload.php');
			$reader = null;
			if ($ext == 'xls'){
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
			}
			if ($ext == 'xlsx'){
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
			}
			if ($ext == 'ods'){
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Ods();
	
			}
			$reader->setReadDataOnly(true);
			$spreadsheet = $reader->load($tmp_name) or die("can't load");
			$worksheet = $spreadsheet->getActiveSheet();
			$highestRow = $worksheet->getHighestRow();
			$dataArray = $worksheet->rangeToArray(
				'A2:F'.$highestRow,	// The worksheet range that we want to retrieve
				NULL,	// Value that should be returned for empty cells
				TRUE,	// Should formulas be calculated (the equivalent of getCalculatedValue() for each cell)
				TRUE,	// Should values be formatted (the equivalent of getFormattedValue() for each cell)
				TRUE	// Should the array be indexed by cell row and cell column
			);
			foreach ($dataArray as $cell_row => $cell_column) {
				$nomor_peserta = $cell_column['A'];
				$ind = str_replace(',' , '.' , $cell_column['C']);
				$mat = str_replace(',' , '.' , $cell_column['D']);
				$ipa = str_replace(',' , '.' , $cell_column['E']);
					$session_import[$nomor_peserta]['bin'] = $ind;
					$session_import[$nomor_peserta]['mat'] = $mat;
					$session_import[$nomor_peserta]['ipa'] = $ipa;
			}
			unlink($tmp_name);
			$_SESSION['colspan'] = 2;
			$_SESSION['bin_class'] = 'success';
			$_SESSION['mat_class'] = 'success';
			$_SESSION['ipa_class'] = 'success';
			$_SESSION['import_subrayon']  = $session_import;
		}
		print "<script>window.location = 'import-subrayon.php'</script>";
		
	}
	else
	{
		print '<script>alert("Anda telah memasukkan nilai melewati batas deadline entri nilai! harap hubungi Admin Web!")</script>';
	}
}

isset($_SESSION['colspan']) ? print '' : $_SESSION['colspan'] = 1 ;
isset($_SESSION['bin_class']) ? print '' : $_SESSION['bin_class'] = 'info' ;
isset($_SESSION['mat_class']) ? print '' : $_SESSION['mat_class'] = 'danger' ;
isset($_SESSION['ipa_class']) ? print '' : $_SESSION['ipa_class'] = 'warning' ;

$identitas = "Sub Rayon: <strong>".$_SESSION['kode_subrayon']." - ".$_SESSION['nama_subrayon']."</strong>";
$data_subrayon = siswa_subrayon($_SESSION['kode_subrayon']);
$jumlah_sekolah = " / <strong>".$data_subrayon['jum_sekolah']." sekolah </strong>";
$jumlah_siswa = " / <strong>".$data_subrayon['jum_siswa']." siswa </strong>";

$no = 1;
$id_input = 0;
$data_siswa = null;
if (isset($_SESSION['import_subrayon'])) {
	foreach($_SESSION['import_subrayon'] as $no_peserta => $data){
		$bin = round($data['bin'] , 1);
		$mat = round($data['mat'] , 1);
		$ipa = round($data['ipa'] , 1);
		$bin_class = ($bin > 100) ? 'danger' : null;
		$mat_class = ($mat > 100) ? 'danger' : null;
		$ipa_class = ($ipa > 100) ? 'danger' : null;
		$row_class = ($bin_class || $mat_class || $ipa_class) ? 'class="danger"' : null;
		if (isset($data_subrayon['siswa'][$no_peserta])){
			($bin != $data_subrayon['siswa'][$no_peserta]['bi' ]) ? $bin_class = 'success' : print '' ;
			($mat != $data_subrayon['siswa'][$no_peserta]['mat']) ? $mat_class = 'success' : print '' ;
			($ipa != $data_subrayon['siswa'][$no_peserta]['ipa']) ? $ipa_class = 'success' : print '' ;
		}
		
		$data_siswa .= '
			<tr '.$row_class.'>
				<td style="display: none"><input '.$disabled_mode.' type="hidden" name="jml_input[]" value="'.$no.'" /></td>
				<td style="display: none"><input '.$disabled_mode.' type="hidden" name="nopes[]" value="'.$no_peserta.'" /></td>
				<td style="text-align: center; width:  50px">'.$no.'</td>
				<td style="text-align: center; width: 120px">'.$no_peserta.'</td>
				<td>'.$data_subrayon['siswa'][$no_peserta]['nama_siswa'].'</td>
				<td style="width: 50px">'.$data_subrayon['siswa'][$no_peserta]['bi'].'</td>
				<td class="nilai-table '.$bin_class.'"><input '.$disabled_mode.' data-mapel="1" data-nomer="'.$id_input.'" type="number" step="0.1" min="0" max="100" maxlength="5" class="nilai" id="r1_'.$id_input.'" name="bi[]"  value="'.$bin.'" /></td>
				<td style="width: 50px">'.$data_subrayon['siswa'][$no_peserta]['mat'].'</td>
				<td class="nilai-table '.$mat_class.'"><input '.$disabled_mode.' data-mapel="2" data-nomer="'.$id_input.'" type="number" step="0.1" min="0" max="100" maxlength="5" class="nilai" id="r2_'.$id_input.'" name="mat[]" value="'.$mat.'" /></td>
				<td style="width: 50px">'.$data_subrayon['siswa'][$no_peserta]['ipa'].'</td>
				<td class="nilai-table '.$ipa_class.'"><input '.$disabled_mode.' data-mapel="3" data-nomer="'.$id_input.'" type="number" step="0.1" min="0" max="100" maxlength="5" class="nilai" id="r3_'.$id_input.'" name="ipa[]" value="'.$ipa.'" /></td>
			</tr>
		';
		$no++; $id_input++;
	}
} else {
	foreach($data_subrayon['siswa'] as $data){
		$row_class = ($data['bi'] > 100 || $data['mat'] > 100 || $data['ipa'] > 100) ? 'class="danger"' : null;
		$data_siswa .= '
			<tr '.$row_class.'>
				<td style="display: none"><input '.$disabled_mode.' type="hidden" name="jml_input[]" value="'.$no.'" /></td>
				<td style="display: none"><input '.$disabled_mode.' type="hidden" name="nopes[]" value="'.$data['no_peserta'].'" /></td>
				<td style="text-align: center; width:  50px">'.$no.'</td>
				<td style="text-align: center; width: 120px">'.$data['no_peserta'].'</td>
				<td>'.$data['nama_siswa'].'</td>
				<td class="nilai-table info">   <input '.$disabled_mode.' data-mapel="1" data-nomer="'.$id_input.'" type="number" step="0.1" min="0" max="100" maxlength="5" class="nilai" id="r1_'.$id_input.'" name="bi[]"  value="'.$data['bi'].'" /></td>
				<td class="nilai-table danger"> <input '.$disabled_mode.' data-mapel="2" data-nomer="'.$id_input.'" type="number" step="0.1" min="0" max="100" maxlength="5" class="nilai" id="r2_'.$id_input.'" name="mat[]" value="'.$data['mat'].'" /></td>
				<td class="nilai-table warning"><input '.$disabled_mode.' data-mapel="3" data-nomer="'.$id_input.'" type="number" step="0.1" min="0" max="100" maxlength="5" class="nilai" id="r3_'.$id_input.'" name="ipa[]" value="'.$data['ipa'].'" /></td>
			</tr>
		';
		$no++; $id_input++;
	}
}
?>

<div class="modal fade bs-example-modal-md" id="excelModal" tabindex="-1" role="dialog" aria-labelledby="excelModalLabel">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
	<form role="form" method="post" action="import-subrayon.php" enctype="multipart/form-data">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="excelModalLabel">Import Nilai Siswa SubRayon <?php print $_SESSION['nama_subrayon']; ?></h4>
      </div>
      <div class="modal-body">
			<label for="excel"> File excel : </label>
			<div class="input-group" style="margin-bottom: 12px">
				<span class="input-group-addon"><span class='glyphicon glyphicon-open-file'></span></span>
				<input <?php print $disabled_mode; ?> class="form-control" id="excel" name="excel" type="file" required></input>
			</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-success">Simpan</button>
      </div>
	</form>
    </div>
  </div>
</div>

<div class="container-fluid" style="width: 1040px">

	<div class="row" style="max-width: 1040px">
		<h3>
			<span class="pull-left"><strong>FORM ENTRI NILAI URAIAN</strong></span>
			<a class="btn btn-sm btn-success pull-right" href="#" onClick="HideAndSeek('detail_petunjuk'); return false;">PETUNJUK UPLOAD NILAI ( EXCEL )</a>
		</h3>
	</div>

	<div class="center-block" style="width: 1040px">
		<div id="detail_petunjuk" class='panel-body' style="display:none">
			<table class="table table-borderless table-hover" style="margin: 0px">
			<tbody>
				<tr>
					<td colspan="2">Langkah : </td>
				</tr>
				<tr>
					<td> 1. </td>
					<td>Klik tombol <a class="btn btn-sm btn-primary" href="#">DOWNLOAD FORM PESERTA UJIAN</a> untuk mendapatkan file excel (xls) berisi Daftar Peserta Ujian yang berfungsi sebagai Form untuk mengisikan nilai uraian</td>
				</tr>
				<tr>
					<td> 2. </td>
					<td>Isikan nilai uraian seluruh mata uji ke dalam file tersebut. <br/>JANGAN MERUBAH FORMAT TABEL <br/>JANGAN MEMBUAT FILE ATAU FORMAT SENDIRI </td>
				</tr>
				<tr>
					<td> 3. </td>
					<td>Klik tombol <a class="btn btn-sm btn-primary" href="#">UPLOAD NILAI</a> lalu pilih file tersebut untuk di upload</td>
				</tr>
				<tr>
					<td> 4. </td>
					<td>Periksa hasil import nilai. Bila sudah benar, klik tombol "SIMPAN"</td>
				</tr>
				<tr>
					<td> 5. </td>
					<td>Disarankan mencetak Daftar Nilai sebagai Arsip, dengan klik tombol "CETAK"</td>
				</tr>
			</tbody>
			</table>
		</div>
	</div>

	<div class="row" style="max-width: 1040px">
		<h3>
		<a class="btn btn-sm btn-danger pull-right" href="logout.php?stat=subrayon">KELUAR</a>
		<span class="pull-right">&nbsp;</span>
		<a class="btn btn-sm btn-primary pull-right" href="#" onclick="myPrintFunction()">CETAK</a>
		<span class="pull-right">&nbsp;</span>
		<a class="btn btn-sm btn-primary pull-right" href="#" data-toggle="modal" data-target="#excelModal">UPLOAD NILAI</a>
		<span class="pull-right">&nbsp;</span>
		<a class="btn btn-sm btn-primary pull-right" href="form-subrayon.php">DOWNLOAD FORM PESERTA UJIAN</a>
		<span class="pull-right">&nbsp;</span>
		</h3>
	</div>

	<form id="myForm" method="post">
	<div class="row" style="margin-top: 20px; margin-bottom: 10px; max-width: 1040px">
		<div class="pull-left"> <?php print $identitas; ?> &nbsp; </div>
		<div class="pull-left"> <?php print $jumlah_sekolah; ?> &nbsp; </div>
		<div class="pull-left"> <?php print $jumlah_siswa; ?> </div>
		<input <?php print $disabled_mode; ?> class="btn btn-sm btn-success pull-right" type="submit" id="bt_simpan" name="simpan" value="SIMPAN" >
	</div>

	<div class="row" style="max-width: 1040px">
		<div id="myHeaderRows" style="margin: 0px; overflow-y: scroll">
			<table class="table table-striped table-hover table-condensed table-bordered" style="margin-bottom: 3px">
				<thead>
<?php
if(isset($_SESSION['import_subrayon'])){
?>	
					<tr>
						<th rowspan="2" class="success" style="text-align: center; width:  50px">No.</th>
						<th rowspan="2" class="success" style="text-align: center; width: 120px">No.Peserta</th>
						<th rowspan="2" class="success" style="text-align: center">Nama</th>
						<th colspan="<?php print $_SESSION['colspan']; ?>" class="nilai-table <?php print $_SESSION['bin_class']; ?>">B.Ind</th>
						<th colspan="<?php print $_SESSION['colspan']; ?>" class="nilai-table <?php print $_SESSION['mat_class']; ?>">Mat</th>
						<th colspan="<?php print $_SESSION['colspan']; ?>" class="nilai-table <?php print $_SESSION['ipa_class']; ?>">IPA</th>
					</tr>
					<tr>
						<th style="width:50px" class="<?php print $_SESSION['bin_class']; ?>">lama</th>
						<th class="nilai-table <?php print $_SESSION['bin_class']; ?>">baru</th>
						<th style="width:50px" class="<?php print $_SESSION['mat_class']; ?>">lama</th>
						<th class="nilai-table <?php print $_SESSION['mat_class']; ?>">baru</th>
						<th style="width:50px" class="<?php print $_SESSION['ipa_class']; ?>">lama</th>
						<th class="nilai-table <?php print $_SESSION['ipa_class']; ?>">baru</th>
					</tr>
<?php
} else {
?>
					<tr>
						<th class="success" style="text-align: center; width:  50px">No.</th>
						<th class="success" style="text-align: center; width: 120px">No.Peserta</th>
						<th class="success" style="text-align: center">Nama</th>
						<th colspan="<?php print $_SESSION['colspan']; ?>" class="nilai-table <?php print $_SESSION['bin_class']; ?>">B.Ind</th>
						<th colspan="<?php print $_SESSION['colspan']; ?>" class="nilai-table <?php print $_SESSION['mat_class']; ?>">Mat</th>
						<th colspan="<?php print $_SESSION['colspan']; ?>" class="nilai-table <?php print $_SESSION['ipa_class']; ?>">IPA</th>
					</tr>
<?php
}
?>
				</thead>
			</table>
		</div>
		<div id="myDataRows" style="height: 370px; overflow-y: scroll">
			<table class="table table-striped table-hover table-condensed table-bordered">
				<tbody>
					<?php print $data_siswa; ?>
				</tbody>
			</table>
		</div>
		<br/>
	</div>
	</form>

</div>

<style>
.nilai-table {
	width: 90px;
	text-align: center;
}
.nilai {
	width: 80px;
	text-align: center;
}
html {
	overflow-y: scroll;
}
</style>

<script type="text/javascript">
	function HideAndSeek(a){
		if(document.getElementById(a).style.display == 'block'){
			document.getElementById(a).style.display = 'none';
		} else {
			document.getElementById(a).style.display = 'block';
		}
	};
</script>

<script type="text/javascript">
$(document).ready(function() {
    $("input[type=number]").on("focus", function() {
        $(this).on("keydown", function(event) {
			var cur_item = $(this); 
			var next_target = cur_item.data("mapel"); 
			var next_id = cur_item.data("nomer"); 
			
            if (event.keyCode === 13) {
                event.preventDefault();
				next_id++;
            }
            if (event.keyCode === 37) {
                event.preventDefault();
				if( next_target > 1 ){
					next_target--;
				}
            }
            if (event.keyCode === 38) {
                event.preventDefault();
				next_id--;
            }
            if (event.keyCode === 39) {
                event.preventDefault();
				if( next_target < 3 ){
					next_target++;
				}
            }
            if (event.keyCode === 40) {
                event.preventDefault();
				next_id++;
            }
			if(document.getElementById("r"+next_target+"_"+next_id)){
				document.getElementById("r"+next_target+"_"+next_id).focus();
			}
        });
    });

});
</script>

<script type="text/javascript">
document.getElementById("myForm").onkeypress = function(e) {
  var key = e.charCode || e.keyCode || 0;
  if (key == 13) {
    e.preventDefault();
  }
}
</script>

<script type="text/javascript">
	function myDisableScroll() {
		this.preventDefault();
	}
</script>

<script type="text/javascript">
	function myPrintFunction() { 
		document.getElementById('myHeaderRows').style.overflow  = 'visible';
		document.getElementById('myDataRows').style.overflow  = 'visible';
		window.print();
	}
</script>

<?php
get_footer();
?>