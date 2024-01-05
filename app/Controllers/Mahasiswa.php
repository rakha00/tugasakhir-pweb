<?php

namespace App\Controllers;

use App\Models\MahasiswaModel;

class Mahasiswa extends BaseController
{
    protected $mahasiswaModel;
    public function __construct()
    {
        $this->mahasiswaModel = new MahasiswaModel();
    }
    public function index()
    {
        $data_mahasiswa = $this->mahasiswaModel->findall();
        return view('mahasiswa', ['data_mahasiswa' => $data_mahasiswa]);
    }

    public function tambah_data_mahasiswa()
    {
        if (
            !$this->validate([
                'npm' => [
                    'rules' => 'is_unique[mahasiswa.npm]',
                    'errors' => [
                        'is_unique' => 'NPM sudah terdaftar',
                    ]
                ],
                'no_hp' => [
                    'rules' => 'required|is_unique[mahasiswa.no_hp]',
                    'errors' => [
                        'is_unique' => 'No HP sudah terdaftar'
                    ]
                ]
            ])
        ) {
            $validation = \Config\Services::validation();
            $errors = $validation->getErrors();
            return redirect()->to(base_url())->withInput()->with('gagal_tambah', $errors);
        }
        $this->mahasiswaModel->insert($this->request->getPost());
        session()->setFlashdata('berhasil_tambah', 'Data berhasil ditambahkan!');
        return redirect()->to(base_url());
    }

    public function ubah_data_mahasiswa($id = false)
    {

        $mahasiswa_model = new MahasiswaModel();
        $data_mahasiswa = $mahasiswa_model->find($id);
        return view('edit_data_mahasiswa', ['data_mahasiswa' => $data_mahasiswa]);

        $this->mahasiswa_model->update($this->request->getPost('id_mahasiswa'), $this->request->getPost());
        return redirect()->to(base_url(''));
    }

    public function hapus_data_mahasiswa($id = false)
    {
        $this->mahasiswaModel->delete($id);
        session()->setFlashdata('berhasil_hapus', 'Data berhasil dihapus!');
        return redirect()->to(base_url());
    }
}