<?= $this->session->flashdata('message') ?>

<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="<?= base_url('registrasi/create') ?>">Update Registrasi</a></li>
        </ol>
    </div>
</div>

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-validation">
                        <?php echo form_open_multipart('registrasi/updateData/' . $registrasi['id']); ?>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="bid_lomba">Bid Lomba <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" id="bid_lomba" name="bid_lomba" placeholder="Bid Lomba.." value="<?= $registrasi['bid_lomba'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="asal_sekolah">Asal Sekolah <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" id="asal_sekolah" name="asal_sekolah" placeholder="Asal Sekolah.." value="<?= $registrasi['asal_sekolah'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="nama_siswa">Nama Siswa <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" placeholder="Nama Siswa.." value="<?= $registrasi['nama_siswa'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="jk_siswa">Jenis Kelamin Siswa <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <select class="form-control" id="jk_siswa" name="jk_siswa" value="<?= $registrasi['jk_siswa'] ?>">
                                    <option value="Laki Laki">Laki Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="nisn">Nisn <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" id="nisn" name="nisn" placeholder="Nisn.." value="<?= $registrasi['nisn'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="tempat_lahir_siswa">Tempat Lahir Siswa <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" id="tempat_lahir_siswa" name="tempat_lahir_siswa" placeholder="Tempat Lahir Siswa.." value="<?= $registrasi['tempat_lahir_siswa'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="tgl_lahir_siswa">Tanggal Lahir Siswa <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <input type="date" class="form-control" id="tgl_lahir_siswa" name="tgl_lahir_siswa" placeholder="Tanggal Lahir Siswa.." value="<?= $registrasi['tgl_lahir_siswa'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="no_hp_siswa">No Hp Siswa <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" id="no_hp_siswa" name="no_hp_siswa" placeholder="No Siswa.." value="<?= $registrasi['no_hp_siswa'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="nama_guru">Nama Guru <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" id="nama_guru" name="nama_guru" placeholder="Nama Guru.." value="<?= $registrasi['nama_guru'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="nip">Nip <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" id="nip" name="nip" placeholder="Nip.." value="<?= $registrasi['nip'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="jk_guru">Jenis Kelamin Guru <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <select class="form-control" id="jk_guru" name="jk_guru" value="<?= $registrasi['jk_guru'] ?>">
                                    <option value="Laki Laki">Laki Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="tempat_lahir_guru">Tempat Lahir Guru <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" id="tempat_lahir_guru" name="tempat_lahir_guru" placeholder="Tempat Lahir Guru.." value="<?= $registrasi['tempat_lahir_guru'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="tgl_lahir_guru">Tanggal Lahir Guru <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <input type="date" class="form-control" id="tgl_lahir_guru" name="tgl_lahir_guru" placeholder="Tanggal Lahir Guru.." value="<?= $registrasi['tgl_lahir_guru'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="no_hp_guru">No Hp Guru <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" id="no_hp_guru" name="no_hp_guru" placeholder="No Guru.." value="<?= $registrasi['no_hp_guru'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="file_bukti">File Bukti <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <img src="<?= base_url('registrasi/' . $registrasi['file_bukti']) ?>" alt="file bukti" class="img-fluid">
                                <input type="hidden" name="file_bukti" value="<?= $registrasi['file_bukti'] ?>">
                                <input type="file" class="form-control-file" id="file_bukti" name="file_bukti">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-8 ml-auto">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>