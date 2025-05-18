<!-- Sidebar -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <a href="<?= base_url('admin/dashboard') ?>" class="brand-link">
    <span class="brand-text font-weight-light">Nusantara Farma</span>
  </a>

  <div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="info">
        <a href="#" class="d-block"><?= session()->get('username') ?></a>
      </div>
    </div>

    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview">
        <!-- Dashboard -->
        <li class="nav-item">
          <a href="<?= base_url('admin/dashboard') ?>" class="nav-link <?= uri_string() === 'admin/dashboard' ? 'active' : '' ?>">
            <i class="nav-icon fas fa-home"></i>
            <p>Dashboard</p>
          </a>
        </li>

        <li class="nav-header">MANAGEMENT</li>

        <!-- Kategori -->
        <li class="nav-item">
          <a href="<?= base_url('admin/category') ?>" class="nav-link <?= strpos(uri_string(), 'admin/category') === 0 ? 'active' : '' ?>">
            <i class="nav-icon fas fa-tags"></i>
            <p>Kategori</p>
          </a>
        </li>

        <!-- Artikel -->
        <li class="nav-item has-treeview <?= strpos(uri_string(), 'admin/article') === 0 ? 'menu-open' : '' ?>">
          <a href="#" class="nav-link <?= strpos(uri_string(), 'admin/article') === 0 ? 'active' : '' ?>">
            <i class="nav-icon fas fa-newspaper"></i>
            <p>
              Artikel
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= base_url('admin/article') ?>" class="nav-link <?= uri_string() === 'admin/article' ? 'active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Daftar Artikel</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('admin/article/upload-pdf') ?>" class="nav-link <?= uri_string() === 'admin/article/upload-pdf' ? 'active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Import dari PDF</p>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
  </div>
</aside>
