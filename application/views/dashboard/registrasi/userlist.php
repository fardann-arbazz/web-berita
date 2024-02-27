<?php if (empty($registrasi)) : ?>
    <h2 class=" text-center font-weight-bold d-flex justify-content-center align-items-center" style="height: 100vh;">Tidak Ada Postingan</h2>
<?php else : ?>
    <?= $this->session->flashdata('message') ?>

    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="<?= base_url('user') ?>">List Registrasi</a></li>
            </ol>
        </div>
    </div>

    <div class="container">
        <div class="d-flex align-items-center justify-content-between">
            <h3 class="text-black-50">Register List</h3>
            <a href="<?= base_url('registrasi/generate_laporan_user') ?>" class="btn btn-sm btn-primary">Generate Laporan</a>
        </div>
    </div>

    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-md-7 col-lg-5">
                        <div class="card">
                            <img class="img-fluid" src="<?= base_url('registrasi/' . $registrasi['file_bukti']) ?>" alt="Imagessss">
                            <div class="card-body">
                                <h5 class="card-title">Card Registrasi</h5>
                                <p class="card-text">Bid Lomba : <?= $registrasi['bid_lomba'] ?></p>
                                <p class="card-text">Asal Sekolah : <?= $registrasi['asal_sekolah'] ?></p>
                                <p class="card-text">Nama Siswa : <?= $registrasi['nama_siswa'] ?></p>
                                <p class="card-text">Jenis Kelamin Siswa : <?= $registrasi['jk_siswa'] ?></p>
                                <p class="card-text">Nisn : <?= $registrasi['nisn'] ?></p>
                                <p class="card-text">Tempat Lahir Siswa : <?= $registrasi['tempat_lahir_siswa'] ?></p>
                                <p class="card-text">Tanggal Lahir Siswa : <?= $registrasi['tgl_lahir_siswa'] ?></p>
                                <p class="card-text">No Hp Siswa : <?= $registrasi['no_hp_siswa'] ?></p>
                                <p class="card-text">Nama Guru : <?= $registrasi['nama_guru'] ?></p>
                                <p class="card-text">Nip : <?= $registrasi['nip'] ?></p>
                                <p class="card-text">Jenis Kelamin Guru : <?= $registrasi['jk_guru'] ?></p>
                                <p class="card-text">Tempat Lahir Guru : <?= $registrasi['tempat_lahir_guru'] ?></p>
                                <p class="card-text">Tanggal Lahir Guru : <?= $registrasi['tgl_lahir_guru'] ?></p>
                                <p class="card-text">No Hp Guru : <?= $registrasi['no_hp_guru'] ?></p>
                            </div>
                            <div class="card-footer">
                                <a href="<?= base_url('registrasi/update/' . $registrasi['id']) ?>" class="btn btn-sm btn-success text-white">Edit Data</a>
                                <button type="button" data-toggle="modal" data-target="#exampleModalCenter<?= $registrasi['id'] ?>" class="btn btn-sm btn-danger">Delete Data</button>
                            </div>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalCenter<?= $registrasi['id'] ?>">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Hapus Data User</h5>
                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Apakah anda yakin akan menghapus data <?= $registrasi['nama_siswa'] ?></p>
                                </div>
                                <div class="modal-footer">
                                    <form action="<?= base_url('registrasi/deleteDataRegistrasi/' . $registrasi['id']) ?>">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>