<?php
require "inc/function_sr.php";
require "vendor/autoload.php";
session_start();

$filename = "FORM_URAIAN_SubRayon_".$_SESSION['kode_subrayon']."_".str_replace(" ", "_", $_SESSION['nama_subrayon']).".xls";
copy('form_upload_nilai.xls', $filename);

$reader			= new \PhpOffice\PhpSpreadsheet\Reader\Xls();
$spreadsheet	= $reader->load($filename) or die("can't load");
$spreadsheet->setActiveSheetIndex(0);
$activeSheet = $spreadsheet->getActiveSheet();

$datas = siswa_subrayon($_SESSION['kode_subrayon'])['siswa'];
$data_siswa = "";
$row = 2;
foreach($datas as $data){
	$activeSheet->setCellValue('A'.$row, $data['no_peserta']);
	$activeSheet->setCellValue('B'.$row, $data['nama_siswa']);
	$activeSheet->setCellValue('C'.$row, $data['bi' ]);
	$activeSheet->setCellValue('D'.$row, $data['mat']);
	$activeSheet->setCellValue('E'.$row, $data['ipa']);
	$row++;
}

$writer = new \PhpOffice\PhpSpreadsheet\Writer\Xls($spreadsheet);

header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename="'. $filename .'.xls"');
header('Cache-Control: max-age=0');
$writer->save('php://output');

?>
