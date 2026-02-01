<header class="main-header">
    <a href="<?= base_url() ?>" class="logo">
      <span class="logo-mini"><b>M</b>I4</span>
      <span class="logo-lg"><b>MyIgniter</b>CI4</span>
    </a>
    <nav class="navbar navbar-static-top" role="navigation">
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?= base_url('assets/img/avatar.png') ?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?= session()->get('name') ?? 'Guest' ?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-header">
                <img src="<?= base_url('assets/img/avatar.png') ?>" class="img-circle" alt="User Image">
                <p>
                  <?= session()->get('name') ?? 'Guest' ?> - Admin
                  <small>User: <?= session()->get('username') ?></small>
                </p>
              </li>
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?= base_url('profil') ?>" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?= base_url('logout') ?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>