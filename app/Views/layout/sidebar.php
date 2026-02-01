<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?= base_url('assets/img/avatar.png') ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?= session()->get('name') ?? 'Guest' ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        
        <li class="<?= ($segment ?? '') == 'dashboard' ? 'active' : '' ?>">
          <a href="<?= base_url('dashboard') ?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>

        <li class="treeview <?= (in_array($segment ?? '', ['mahasiswa', 'dosen'])) ? 'active' : '' ?>">
          <a href="#">
            <i class="fa fa-table"></i> <span>Manajemen Data</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li class="<?= ($segment ?? '') == 'mahasiswa' ? 'active' : '' ?>">
                <a href="<?= base_url('mahasiswa') ?>"><i class="fa fa-circle-o"></i> Data Mahasiswa</a>
            </li>
            <li class="<?= ($segment ?? '') == 'dosen' ? 'active' : '' ?>">
                <a href="<?= base_url('dosen') ?>"><i class="fa fa-circle-o"></i> Data Dosen</a>
            </li>
          </ul>
        </li>

        <li class="<?= ($segment ?? '') == 'pengaturan' ? 'active' : '' ?>">
          <a href="<?= base_url('pengaturan') ?>">
            <i class="fa fa-cogs"></i> <span>Pengaturan</span>
          </a>
        </li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>