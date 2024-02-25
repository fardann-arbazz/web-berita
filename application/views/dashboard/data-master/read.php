<?= $this->session->flashdata('message') ?>

<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="<?= base_url('user') ?>">List User</a></li>
        </ol>
    </div>
</div>


<div class="container-fluid mt-3">


    <div class="col-lg-7">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h4>Table List User</h4>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($users as $row) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $row->username ?></td>
                                    <td><?= $row->email ?></td>
                                    <td><?= $row->role ?></td>
                                    <td>
                                        <a href="<?= base_url('user/update/' . $row->id) ?>" class="btn btn-sm btn-primary text-white">Edit Data</a>
                                        <button type="button" data-toggle="modal" data-target="#exampleModalCenter<?= $row->id ?>" class="btn btn-sm btn-danger text-white">Delete Data</button>
                                    </td>
                                </tr>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModalCenter<?= $row->id ?>">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Hapus Data User</h5>
                                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Apakah anda yakin akan menghapus data <?= $row->username ?></p>
                                            </div>
                                            <div class="modal-footer">
                                                <form action="<?= base_url('user/delete/' . $row->id) ?>">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>