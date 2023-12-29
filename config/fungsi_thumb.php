<?php
// Upload gambar untuk berita
function UploadImage($fupload_name){
  //direktori gambar
  $vdir_upload = "../../../foto_berita/";
  $vfile_upload = $vdir_upload . $fupload_name;

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);

  //identitas file asli
  $im_src = imagecreatefromjpeg($vfile_upload);
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);

  //Simpan dalam versi small 110 pixel
  //Set ukuran gambar hasil perubahan
  $dst_width = 110;
  $dst_height = ($dst_width/$src_width)*$src_height;

  //proses perubahan ukuran
  $im = imagecreatetruecolor($dst_width,$dst_height);
  imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

  //Simpan gambar
  imagejpeg($im,$vdir_upload . "small_" . $fupload_name);
  

  //Simpan dalam versi medium 360 pixel
  //Set ukuran gambar hasil perubahan
  $dst_width2 = 390;
  $dst_height2 = ($dst_width2/$src_width)*$src_height;

  //proses perubahan ukuran
  $im2 = imagecreatetruecolor($dst_width2,$dst_height2);
  imagecopyresampled($im2, $im_src, 0, 0, 0, 0, $dst_width2, $dst_height2, $src_width, $src_height);

  //Simpan gambar
  imagejpeg($im2,$vdir_upload . "medium_" . $fupload_name);
  
  //Hapus gambar di memori komputer
  imagedestroy($im_src);
  imagedestroy($im);
  imagedestroy($im2);
}

function UploadBanner($fupload_name){
  //direktori banner
  $vdir_upload = "../../../foto_banner/";
  $vfile_upload = $vdir_upload . $fupload_name;

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);
}


// Upload file untuk download file
function UploadFile($fupload_name){
  //direktori file
  $vdir_upload = "../../../files/";
  $vfile_upload = $vdir_upload . $fupload_name;

  //Simpan file
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);
}

function UploadDokumentanah($fupload_nameb){
  //direktori file
  $vdir_upload = "../../tanah/dokumen/";
  $vfile_upload = $vdir_upload . $fupload_nameb;

  //Simpan file
  move_uploaded_file($_FILES["fuploadb"]["tmp_name"], $vfile_upload);
}

function UploadTanah($fupload_namea){
  //direktori file
  $vdir_upload = "../../tanah/gambar/";
  $vfile_upload = $vdir_upload . $fupload_namea;

  //Simpan file
  move_uploaded_file($_FILES["fuploada"]["tmp_name"], $vfile_upload);
}

function UploadDokumenalatangkut($fupload_nameb){
  //direktori file
  $vdir_upload = "../../alatangkut/dokumen/";
  $vfile_upload = $vdir_upload . $fupload_nameb;

  //Simpan file
  move_uploaded_file($_FILES["fuploadb"]["tmp_name"], $vfile_upload);
}

function UploadAlatangkut($fupload_namea){
  //direktori file
  $vdir_upload = "../../alatangkut/gambar/";
  $vfile_upload = $vdir_upload . $fupload_namea;

  //Simpan file
  move_uploaded_file($_FILES["fuploada"]["tmp_name"], $vfile_upload);
}

function UploadDokumenbangunan($fupload_nameb){
  //direktori file
  $vdir_upload = "../../bangunan/dokumen/";
  $vfile_upload = $vdir_upload . $fupload_nameb;

  //Simpan file
  move_uploaded_file($_FILES["fuploadb"]["tmp_name"], $vfile_upload);
}

function UploadBangunan($fupload_namea){
  //direktori file
  $vdir_upload = "../../bangunan/gambar/";
  $vfile_upload = $vdir_upload . $fupload_namea;

  //Simpan file
  move_uploaded_file($_FILES["fuploada"]["tmp_name"], $vfile_upload);
}

function UploadDokumenjalanirigrasi($fupload_nameb){
  //direktori file
  $vdir_upload = "../../jalanirigrasi/dokumen/";
  $vfile_upload = $vdir_upload . $fupload_nameb;

  //Simpan file
  move_uploaded_file($_FILES["fuploadb"]["tmp_name"], $vfile_upload);
}

function UploadJalanirigrasi($fupload_namea){
  //direktori file
  $vdir_upload = "../../jalanirigrasi/gambar/";
  $vfile_upload = $vdir_upload . $fupload_namea;

  //Simpan file
  move_uploaded_file($_FILES["fuploada"]["tmp_name"], $vfile_upload);
}

function UploadDokumenkonstruksi($fupload_nameb){
  //direktori file
  $vdir_upload = "../../konstruksi/dokumen/";
  $vfile_upload = $vdir_upload . $fupload_nameb;

  //Simpan file
  move_uploaded_file($_FILES["fuploadb"]["tmp_name"], $vfile_upload);
}

function UploadKonstruksi($fupload_namea){
  //direktori file
  $vdir_upload = "../../konstruksi/gambar/";
  $vfile_upload = $vdir_upload . $fupload_namea;

  //Simpan file
  move_uploaded_file($_FILES["fuploada"]["tmp_name"], $vfile_upload);
}

function UploadDokumenasettetap($fupload_nameb){
  //direktori file
  $vdir_upload = "../../asettetap/dokumen/";
  $vfile_upload = $vdir_upload . $fupload_nameb;

  //Simpan file
  move_uploaded_file($_FILES["fuploadb"]["tmp_name"], $vfile_upload);
}

function UploadAsettetap($fupload_namea){
  //direktori file
  $vdir_upload = "../../asettetap/gambar/";
  $vfile_upload = $vdir_upload . $fupload_namea;

  //Simpan file
  move_uploaded_file($_FILES["fuploada"]["tmp_name"], $vfile_upload);
}

// Upload gambar untuk album galeri foto
function UploadAlbum($fupload_name){
  //direktori gambar
  $vdir_upload = "../../../img_album/";
  $vfile_upload = $vdir_upload . $fupload_name;

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);

  //identitas file asli
  $im_src = imagecreatefromjpeg($vfile_upload);
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);

  //Simpan dalam versi small 120 pixel
  //Set ukuran gambar hasil perubahan
  $dst_width = 120;
  $dst_height = ($dst_width/$src_width)*$src_height;

  //proses perubahan ukuran
  $im = imagecreatetruecolor($dst_width,$dst_height);
  imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

  //Simpan gambar
  imagejpeg($im,$vdir_upload . "kecil_" . $fupload_name);
  
  //Hapus gambar di memori komputer
  imagedestroy($im_src);
  imagedestroy($im);
}


// Upload gambar untuk galeri foto
function UploadGallery($fupload_name){
  //direktori gambar
  $vdir_upload = "../../../img_galeri/";
  $vfile_upload = $vdir_upload . $fupload_name;

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);

  //identitas file asli
  $im_src = imagecreatefromjpeg($vfile_upload);
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);

  //Simpan dalam versi small 100 pixel
  //Set ukuran gambar hasil perubahan
  $dst_width = 100;
  $dst_height = ($dst_width/$src_width)*$src_height;

  //proses perubahan ukuran
  $im = imagecreatetruecolor($dst_width,$dst_height);
  imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

  //Simpan gambar
  imagejpeg($im,$vdir_upload . "kecil_" . $fupload_name);
  
  //Hapus gambar di memori komputer
  imagedestroy($im_src);
  imagedestroy($im);
}


// Upload gambar untuk sekilas info
function UploadInfo($fupload_name){
  //direktori gambar
  $vdir_upload = "../../../foto_info/";
  $vfile_upload = $vdir_upload . $fupload_name;

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);

  //identitas file asli
  $im_src = imagecreatefromjpeg($vfile_upload);
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);

  //Simpan dalam versi small 54 pixel
  //Set ukuran gambar hasil perubahan
  $dst_width = 54;
  $dst_height = ($dst_width/$src_width)*$src_height;

  //proses perubahan ukuran
  $im = imagecreatetruecolor($dst_width,$dst_height);
  imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

  //Simpan gambar
  imagejpeg($im,$vdir_upload . "kecil_" . $fupload_name);
  
  //Hapus gambar di memori komputer
  imagedestroy($im_src);
  imagedestroy($im);
}

// Upload gambar untuk favicon
function UploadFavicon($fupload_name){
  //direktori favicon di root
  $vdir_upload = "../../../";
  $vfile_upload = $vdir_upload . $fupload_name;

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);
}
?>
