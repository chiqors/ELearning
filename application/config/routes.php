<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'auth/login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['auth/login'] = 'auth/login';
$route['auth/register'] = 'auth/register';

// -----------------
// PELAJAR
// -----------------

$route['pelajar'] = 'Pelajar_Beranda/index';

$route['pelajar/join_course/(:any)'] = 'Pelajar_Beranda/join/$1';
$route['pelajar/pay'] = 'Pelajar_Beranda/pay/$1';

$route['pelajar/kursus'] = 'Pelajar_Kursus/index';
$route['pelajar/kursus/show/(:any)'] = 'Pelajar_Kursus/show/$1';

$route['pelajar/materi/show_materi/(:any)'] = 'Pelajar_Kursus/show_materi/$1';

$route['pelajar/nilai'] = 'Pelajar_Nilai/index';

// -----------------
// INSTRUKTUR
// -----------------

$route['instruktur'] = 'Instruktur_Beranda/index';

$route['instruktur/materi'] = 'Instruktur_Materi/index';
$route['instruktur/materi/create'] = 'Instruktur_Materi/create';
$route['instruktur/materi/store'] = 'Instruktur_Materi/store';
$route['instruktur/materi/show/(:any)'] = 'Instruktur_Materi/show/$1';
$route['instruktur/materi/edit/(:any)'] = 'Instruktur_Materi/edit/$1';
$route['instruktur/materi/update/(:any)'] = 'Instruktur_Materi/update/$1';
$route['instruktur/materi/destroy/(:any)'] = 'Instruktur_Materi/destroy/$1';
$route['instruktur/materi/nilai'] = 'Instruktur_Materi/nilai';
$route['instruktur/materi/nilai/(:any)'] = 'Instruktur_Materi/nilai/$1';

$route['instruktur/kursus'] = 'Instruktur_Kursus/index';
$route['instruktur/kursus/create'] = 'Instruktur_Kursus/create';
$route['instruktur/kursus/store'] = 'Instruktur_Kursus/store';
$route['instruktur/kursus/show/(:any)'] = 'Instruktur_Kursus/show/$1';
$route['instruktur/kursus/edit/(:any)'] = 'Instruktur_Kursus/edit/$1';
$route['instruktur/kursus/update/(:any)'] = 'Instruktur_Kursus/update/$1';
$route['instruktur/kursus/destroy/(:any)'] = 'Instruktur_Kursus/destroy/$1';

// -----------------
// PETUGAS ADMINISTRASI
// -----------------

$route['petugasadministrasi'] = 'PetugasAdministrasi_Beranda/index';

$route['petugasadministrasi/kursus/show/(:any)'] = 'PetugasAdministrasi_Beranda/show/$1';

$route['petugasadministrasi/pelajar_approval'] = 'PetugasAdministrasi_Pelajar/approve';
$route['petugasadministrasi/pelajar_store'] = 'PetugasAdministrasi_Pelajar/store';

$route['petugasadministrasi/instruktur'] = 'PetugasAdministrasi_Instruktur/index';
$route['petugasadministrasi/instruktur/create'] = 'PetugasAdministrasi_Instruktur/create';
$route['petugasadministrasi/instruktur/store'] = 'PetugasAdministrasi_Instruktur/store';
$route['petugasadministrasi/instruktur/show/(:any)'] = 'PetugasAdministrasi_Instruktur/show/$1';
$route['petugasadministrasi/instruktur/edit/(:any)'] = 'PetugasAdministrasi_Instruktur/edit/$1';
$route['petugasadministrasi/instruktur/update/(:any)'] = 'PetugasAdministrasi_Instruktur/update/$1';
$route['petugasadministrasi/instruktur/destroy/(:any)'] = 'PetugasAdministrasi_Instruktur/destroy/$1';

$route['petugasadministrasi/petugas'] = 'PetugasAdministrasi_Self/index';
$route['petugasadministrasi/petugas/create'] = 'PetugasAdministrasi_Self/create';
$route['petugasadministrasi/petugas/store'] = 'PetugasAdministrasi_Self/store';
$route['petugasadministrasi/petugas/show/(:any)'] = 'PetugasAdministrasi_Self/show/$1';
$route['petugasadministrasi/petugas/edit/(:any)'] = 'PetugasAdministrasi_Self/edit/$1';
$route['petugasadministrasi/petugas/update/(:any)'] = 'PetugasAdministrasi_Self/update/$1';
$route['petugasadministrasi/petugas/destroy/(:any)'] = 'PetugasAdministrasi_Self/destroy/$1';

$route['petugasadministrasi/pembayaran'] = 'PetugasAdministrasi_Pembayaran/index';
$route['petugasadministrasi/pembayaran/create'] = 'PetugasAdministrasi_Pembayaran/create';
$route['petugasadministrasi/pembayaran/store'] = 'PetugasAdministrasi_Pembayaran/store';
$route['petugasadministrasi/pembayaran/show/(:any)'] = 'PetugasAdministrasi_Pembayaran/show/$1';
$route['petugasadministrasi/pembayaran/edit/(:any)'] = 'PetugasAdministrasi_Pembayaran/edit/$1';
$route['petugasadministrasi/pembayaran/update/(:any)'] = 'PetugasAdministrasi_Pembayaran/update/$1';
$route['petugasadministrasi/pembayaran/destroy/(:any)'] = 'PetugasAdministrasi_Pembayaran/destroy/$1';
