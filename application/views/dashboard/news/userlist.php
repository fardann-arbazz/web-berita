<?php if (empty($news)) : ?>
    <h2 class=" text-center font-weight-bold d-flex justify-content-center align-items-center" style="height: 100vh;">Belum Ada Postingan</h2>
<?php else : ?>
    <?= $this->session->flashdata('message') ?>

    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="<?= base_url('user') ?>">List News</a></li>
            </ol>
        </div>
    </div>

    <div class="container-fluid">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h4>Table List News</h4>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Title</th>
                                    <th>Gambar</th>
                                    <th>Isi Konten</th>
                                    <th>Status</th>
                                    <th>Category</th>
                                    <th>Pembuat</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $news['title'] ?></td>
                                    <td><img src="<?= base_url('thumbnail/' . $news['thumbnail']) ?>" alt="images" class="img-fluid"></td>
                                    <td><?= $news['isi_konten'] ?></td>
                                    <td><?= $news['status'] ?></td>
                                    <td><?= $news['category'] ?></td>
                                    <td><?= $news['pembuat'] ?></td>
                                    <td class="d-flex align-items-center justify-content-center">
                                        <a href="<?= base_url('news/update/' . $news['id']) ?>" class="btn btn-sm btn-primary text-white mr-1 mt-4">Edit Data</a>
                                        <button type="button" data-toggle="modal" data-target="#exampleModalCenter ?>" class="btn btn-sm btn-danger text-white mt-4">Delete Data</button>
                                    </td>
                                </tr>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModalCenter ?>">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Hapus Data User</h5>
                                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Apakah anda yakin akan menghapus data </p>
                                            </div>
                                            <div class="modal-footer">
                                                <form action="<?= base_url('user/delete/') ?>">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>