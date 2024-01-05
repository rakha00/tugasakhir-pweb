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
            return redirect()->back()->withInput()->with('validation', $errors);
        }

        $this->mahasiswaModel->insert($this->request->getPost());
        session()->setFlashdata('berhasil', 'Data berhasil ditambahkan.');
        return redirect()->to(base_url());
    }

    public function edit_data_mahasiswa($id = false)
    {
        $mahasiswa_model = new MahasiswaModel();
        $data_mahasiswa = $mahasiswa_model->find($id);
        return view('edit_data_mahasiswa', ['data_mahasiswa' => $data_mahasiswa]);
    }

    public function proses_edit_mahasiswa()
    {
        $mahasiswa_model = new MahasiswaModel();
        try {
            $mahasiswa_model->update($this->request->getPost('id_mahasiswa'), $this->request->getPost());
            return redirect()->to(base_url(''));
        } catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {
            // Check if the error is due to a unique constraint violation
            if (strpos($e->getMessage(), '1062 Duplicate entry') !== false) {
                return redirect()->to(base_url('edit_data_mahasiswa'));
            } else {
                // For other database errors, you may want to log the error or take different action
                return redirect()->to(base_url('edit_data_mahasiswa'));
            }
        }
    }

    public function hapus_data_mahasiswa($id = false)
    {
        $this->mahasiswaModel->delete($id);
        return redirect()->to(base_url());
    }
}