<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Mahasiswa::index');
$routes->post('/tambah_data_mahasiswa', 'Mahasiswa::tambah_data_mahasiswa');
$routes->post('/proses_edit_mahasiswa', 'Mahasiswa::proses_edit_mahasiswa');
$routes->delete('/(:any)', 'Mahasiswa::hapus_data_mahasiswa/$1');