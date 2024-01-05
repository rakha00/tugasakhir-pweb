<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Mahasiswa::index');
$routes->post('/tambah_data_mahasiswa', 'Mahasiswa::tambah_data_mahasiswa');
$routes->post('/ubah_data_mahasiswa', 'Mahasiswa::ubah_data_mahasiswa');
$routes->delete('/(:any)', 'Mahasiswa::hapus_data_mahasiswa/$1');