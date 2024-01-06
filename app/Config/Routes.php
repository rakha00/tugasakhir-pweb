<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Mahasiswa::index');
$routes->post('/tambah_data_mahasiswa', 'Mahasiswa::tambah_data_mahasiswa');
$routes->post('/ubah_data_mahasiswa/(:any)', 'Mahasiswa::ubah_data_mahasiswa/$1');
$routes->delete('/(:any)', 'Mahasiswa::hapus_data_mahasiswa/$1');