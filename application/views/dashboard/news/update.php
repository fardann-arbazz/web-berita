<?= $this->session->flashdata('message') ?>

<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="<?= base_url('user') ?>">Update News</a></li>
        </ol>
    </div>
</div>

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-validation">
                        <?php echo form_open_multipart('news/updateData/' . $news['id']); ?>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="title">Judul <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" id="title" name="title" value="<?= $news['title'] ?>" placeholder="Title..">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="thumbnail">Thumbnail <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <?php if (!empty($news['thumbnail'])) : ?>
                                    <img src="<?= base_url('thumbnail/' . $news['thumbnail']) ?>" class="mb-1" alt="Thumbnail" height="80px">
                                    <input type="hidden" name="thumbnail" value="<?= $news['thumbnail'] ?>">
                                <?php endif; ?>
                                <input type="file" class="form-control-file" id="thumbnail" name="thumbnail">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="isi_konten">Isi Konten <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <textarea class="form-control" id="isi_konten" name="isi_konten" rows="5" placeholder="Konten.."><?= $news['isi_konten'] ?></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="category">Category <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <select class="form-control" id="category" name="category" value="<?= $news['category'] ?>">
                                    <option value="berita">Berita</option>
                                    <option value="informasi">Informasi</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="pembuat">Pembuat <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" id="pembuat" name="pembuat" value="<?= $news['pembuat'] ?>" placeholder="Pembuat..">
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