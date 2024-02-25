<div class="login-form-bg h-100">
    <div class="container h-100">
        <div class="row justify-content-center h-100">
            <div class="col-xl-6">
                <div class="form-input-content">
                    <div class="card login-form mb-0">
                        <div class="card-body pt-5">
                            <a class="text-center" href="index.html">
                                <h4><?= $title ?></h4>
                            </a>

                            <?= $this->session->flashdata('message') ?>

                            <form class="mt-5 mb-5 login-input" method="post" action="<?= base_url('auth') ?>">
                                <div class="form-group">
                                    <input name="username" type="text" class="form-control" placeholder="Username">
                                    <?= form_error('username', '<small class="text-danger font-weight-bold">', '</small>') ?>
                                </div>
                                <div class="form-group">
                                    <input name="password" type="password" class="form-control" placeholder="Password">
                                    <?= form_error('password', '<small class="text-danger font-weight-bold">', '</small>') ?>
                                </div>
                                <button type="submit" class="btn login-form__btn submit w-100">Sign In</button>
                            </form>
                            <p class="mt-5 login-form__footer">Dont have account? <a href="<?= base_url('auth/register') ?>" class="text-primary">Sign Up</a> now</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>