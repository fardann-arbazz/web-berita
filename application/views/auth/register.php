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

                            <form class="mt-5 mb-5 login-input" method="post" action="<?= base_url('auth/register'); ?>">
                                <div class="form-group">
                                    <input type="text" name="email" class="form-control" placeholder="Email">
                                    <?php echo form_error('email', '<small class="text-danger font-weight-bold">', '</small>') ?>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="username" class="form-control" placeholder="Username">
                                    <?php echo form_error('username', '<small class="text-danger font-weight-bold">', '</small>') ?>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control" placeholder="Password">
                                    <?php echo form_error('password', '<small class="text-danger font-weight-bold">', '</small>') ?>
                                </div>
                                <button type="submit" class="btn login-form__btn submit w-100">Sign in</button>
                            </form>
                            <p class="mt-5 login-form__footer">Have account <a href="<?= base_url('auth') ?>" class="text-primary">Sign Up </a> now</p>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>