<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'landing';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['content-tentang'] = 'landing/index/2';
$route['content-visi-misi'] = 'landing/index/3';
$route['content-persyaratan'] = 'landing/index/4';
$route['content-pengajuan'] = 'landing/index/5';
$route['content-kontak'] = 'landing/index/6';


$route['login'] = 'landing/index/7';
$route['daftar'] = 'landing/index/8';


//--------user--------


$route['pengajuan-pembuatan-KK'] = 'landing/pengajuan/1';
$route['pengajuan-EKTP-baru'] = 'landing/pengajuan/2';
$route['pengajuan-surat-pindah-keluar'] = 'landing/pengajuan/3';



$route['status-pengajuan-KK'] = 'landing/status_pengajuan/1';
$route['status-pengajuan-EKTP-baru'] = 'landing/status_pengajuan/2';
$route['status-pengajuan-surat-pindah-keluar'] = 'landing/status_pengajuan/3';



$route['bukti-pengajuan-KK'] = 'landing/bukti_pengajuan/1';
$route['bukti-pengajuan-EKTP-baru'] = 'landing/bukti_pengajuan/2';
$route['bukti-pengajuan-surat-pindah-keluar'] = 'landing/bukti_pengajuan/3';





// // --------admin--------


$route['admin-login'] = 'master/post_login';

$route['admin'] = 'master/index';
$route['admin-verifikasi-KK'] = 'master/verifikasi/1';
$route['admin-verifikasi-EKTP-baru'] = 'master/verifikasi/2';
$route['admin-verifikasi-SPK'] = 'master/verifikasi/3';

$route['admin-edit-verifikasi/(:any)/(:any)'] = 'master/edit_view_verifikasi/$1/$2';

$route['admin-bukti-pendaftaran-KK'] = 'master/bukti_pendaftaran/1';
$route['admin-bukti-pendaftaran-EKTP-baru'] = 'master/bukti_pendaftaran/2';
$route['admin-bukti-pendaftaran-SPK'] = 'master/bukti_pendaftaran/3';

$route['download-bukti-pendaftaran/(:any)'] = 'master/download_bukti_pendaftaran/$1';

$route['admin-user'] = 'master/user';
