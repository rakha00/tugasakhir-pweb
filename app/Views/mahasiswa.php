<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Mahasiswa</title>

    <link rel="icon" href="http://localhost/mahasiswa/assets/img/icon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/dataTables.bootstrap5.min.css" />

    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.8/js/dataTables.bootstrap5.min.js"></script>
</head>

<body>
    <div class="container mt-4">
        <div class="row align-items-center justify-content-between mb-4">
            <div class="col-4">
                <h1>Data Mahasiswa</h1>
            </div>
            <div class="col-4 text-end">
                <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal"
                    data-bs-target="#tambahModal">
                    Tambah data mahasiswa
                </button>
            </div>
        </div>
        <div class="mt-3">
            <table id="mahasiswaTable" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nama Lengkap</th>
                        <th>NPM</th>
                        <th>Kelas</th>
                        <th>Jurusan</th>
                        <th>No. HP</th>
                        <th class="col-1">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data_mahasiswa as $mahasiswa): ?>
                    <tr>
                        <td>
                            <?= $mahasiswa['nama_lengkap'] ?>
                        </td>
                        <td>
                            <?= $mahasiswa['npm'] ?>
                        </td>
                        <td>
                            <?= $mahasiswa['kelas'] ?>
                        </td>
                        <td>
                            <?= $mahasiswa['jurusan'] ?>
                        </td>
                        <td>
                            <?= $mahasiswa['no_hp'] ?>
                        </td>
                        <td>
                            <button type="button" id="<?= $mahasiswa['id']; ?>" class="ubahButton btn btn-primary"
                                data-bs-toggle="modal" data-bs-target="#ubahModal">
                                <i class="bi bi-pencil-fill"></i>
                            </button>
                            <button type="button" id="<?= $mahasiswa['id']; ?>" class="hapusButton btn btn-danger"
                                data-bs-toggle="modal" data-bs-target="#hapusModal">
                                <i class="bi bi-trash-fill"></i>
                            </button>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Button Ubah -->
    <a href="<?= base_url('ubah_data_mahasiswa') . '/' . $mahasiswa['id'] ?>" class="btn btn-primary"><i
            class="bi bi-pencil-fill"></i></a>

    <!-- Tambah Modal -->
    <div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-4" id="tambahModalLabel">Tambah Data Mahasiswa</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="tambahMahasiswa" class="needs-validation"
                        action="<?= base_url('tambah_data_mahasiswa') ?>" method="POST" novalidate>
                        <?= csrf_field(); ?>
                        <div class="input-group mb-3">
                            <span class="input-group-text fw-semibold col-2" style="padding-right: 130px;">Nama
                                Lengkap</span>
                            <input type="text" class="form-control form-control-lg" id="nama_lengkap"
                                name="nama_lengkap" value="<?= old('nama_lengkap'); ?>" maxlength="50" required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text fw-semibold col-2" style="padding-right: 130px;">NPM</span>
                            <input type="text" class="form-control form-control-lg" id="npm" name="npm"
                                value="<?= old('npm'); ?>" maxlength="8" required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text fw-semibold col-2" style="padding-right: 130px;">Kelas</span>
                            <input type="text" class="form-control form-control-lg" id="kelas" name="kelas"
                                value="<?= old('kelas'); ?>" maxlength="5" required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text fw-semibold col-2"
                                style="padding-right: 130px;">Jurusan</span>
                            <input type="text" class="form-control form-control-lg" id="jurusan" name="jurusan"
                                value="<?= old('jurusan'); ?>" maxlength="50" required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text fw-semibold col-2" style="padding-right: 130px;">No. HP</span>
                            <input type="text" class="form-control form-control-lg" id="no_hp" name="no_hp"
                                value="<?= old('no_hp'); ?>" maxlength="13" required>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Tambah Data</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Ubah Modal -->
    <div class="modal fade" id="ubahModal" tabindex="-1" aria-labelledby="ubahModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="ubahModalLabel">Ubah Data Mahasiswa</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('proses_tambah_mahasiswa') ?>" method="POST">
                        <div class="mb-3">
                            <?= csrf_field(); ?>
                            <label for="exampleFormControlInput1" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap"
                                placeholder="Nama Lengkap">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">NPM</label>
                            <input type="text" class="form-control" id="npm" name="npm" placeholder="NPM">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Kelas</label>
                            <input type="text" class="form-control" id="kelas" name="kelas" placeholder="Kelas">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Jurusan</label>
                            <input type="text" class="form-control" id="jurusan" name="jurusan" placeholder="Jurusan">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">No. HP</label>
                            <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="No. HP">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Ubah Data</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Hapus Modal -->

    <div class="modal fade" id="hapusModal" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="hapusModalLabel">Hapus Data</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah anda yakin ingin menghapus data mahasiswa ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <form action="" method="post" class="hapus d-inline">
                        <input type="hidden" name="_method" value="delete">
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Alert Berhasil Tambah -->
    <?php if (session()->getFlashdata("berhasil_tambah")): ?>
    <div class="alert-berhasil position-absolute bottom-0 end-0 mb-3 me-3">
        <div class="alert alert-success alert-dismissible">
            Data berhasil disimpan!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    <?php endif; ?>

    <!-- Alert Gagal Tambah -->
    <?php if (session('gagal_tambah')): ?>
    <div class="alert-berhasil position-absolute bottom-0 end-0 mb-3 me-3">
        <div class="alert alert-danger alert-dismissible">
            Data gagal ditambahkan!
            <ul>
                <?php foreach (session('gagal_tambah') as $error): ?>
                <li>
                    <?= esc($error) ?>
                </li>
                <?php endforeach ?>
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    <?php endif; ?>

    <!-- Alert Berhasil Hapus -->
    <?php if (session()->getFlashdata("berhasil_hapus")): ?>
    <div class="alert-berhasil position-absolute bottom-0 end-0 mb-3 me-3">
        <div class="alert alert-success alert-dismissible">
            Data berhasil dihapus!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    <?php endif; ?>

    <script>
    $(document).ready(function() {
        //Data Table
        $('#mahasiswaTable').DataTable({
            columns: [null,
                null,
                null,
                null,
                {
                    orderable: false
                },
                {
                    orderable: false
                }
            ]
        });

        //Hapus Button
        $('.hapusButton').click(function() {
            var idMahasiswa = $('.hapusButton').attr('id');
            $("form.hapus").attr("action", "<?= base_url('') . '/' . $mahasiswa['id'] ?>")
        });
    });

    //Bootstrap Validation  
    (() => {
        'use strict'

        const forms = document.querySelectorAll('.needs-validation')

        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
        })
    })();
    </script>
</body>

</html>