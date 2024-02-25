<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="<?= base_url('user') ?>">Create User</a></li>
        </ol>
    </div>
</div>

<div class="container-fluid mt-3">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title mt-0">
                        Create User
                    </h2>
                    <div class="form-validation">
                        <form class="form-valide" action="<?= base_url('user/store') ?>" method="post">
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="username">Username <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" id="username" name="username" placeholder="Username..">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="email">Email <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" id="email" name="email" placeholder="Email..">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="password">Password <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password..">
                                </div>
                            </div>
                            <?php if ($user['role'] == 'user') : ?>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="role">Role <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <select class="form-control" id="role" name="role">
                                            <option value="user">User</option>
                                            <option value="guest">Guest</option>
                                        </select>
                                    </div>
                                </div>
                            <?php elseif ($user['role'] == 'admin') : ?>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="role">Role <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <select class="form-control" id="role" name="role">
                                            <option value="admin">Admin</option>
                                            <option value="user">User</option>
                                            <option value="guest">Guest</option>
                                        </select>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <div class="form-group row">
                                <div class="col-lg-8 ml-auto">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>