<!--**********************************
            Sidebar start
        ***********************************-->
<div class="nk-sidebar">
    <div class="nk-nav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label">Dashboard</li>
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="icon-notebook menu-icon"></i> <span class="nav-text">Dashboard</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="<?= base_url('dashboard') ?>">Home</a></li>
                </ul>
            </li>
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="icon-speedometer menu-icon"></i><span class="nav-text">Data Master</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="<?= base_url('user') ?>">List User</a></li>
                    <li><a href="<?= base_url('user/create') ?>">Create User</a></li>
                </ul>
            </li>
            <li class="mega-menu mega-menu-sm">
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="icon-globe-alt menu-icon"></i><span class="nav-text">News</span>
                </a>
                <ul aria-expanded="false">
                    <?php if ($user['role'] == 'admin') : ?>
                        <li><a href="<?= base_url('news') ?>">News List</a></li>
                        <li><a href="<?= base_url('news/draftNews') ?>">Pengajuan News</a></li>
                    <?php elseif ($user['role'] == 'user') : ?>
                        <li><a href="<?= base_url('news/list') ?>">News List</a></li>
                    <?php else : ?>
                        <li><a href="#">News List</a></li>
                    <?php endif; ?>
                    <li><a href="<?= base_url('news/create') ?>">Create News</a></li>
                </ul>
            </li>
            <li class="nav-label">Apps</li>
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="icon-envelope menu-icon"></i> <span class="nav-text">Registrasi</span>
                </a>
                <ul aria-expanded="false">
                    <?php if ($user['role'] == 'admin') : ?>
                        <li><a href="<?= base_url('registrasi/admin') ?>">Registrasi List</a></li>
                    <?php elseif ($user['role'] == 'user') : ?>
                        <li><a href="<?= base_url('registrasi/list') ?>">Registrasi List</a></li>
                    <?php endif; ?>
                    <li><a href="<?= base_url('registrasi/create'); ?>">Create Registrasi</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<!--**********************************
            Sidebar end
        ***********************************-->

<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">