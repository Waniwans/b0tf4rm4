<?php
// File: app/Views/admin/dashboard.php
?>
<?= $this->extend('layouts/admin/main') ?>
<?= $this->section('content') ?>
<!-- Content Header -->
<div class="content-header">
  <div class="container-fluid">
    <h1 class="m-0 text-dark">Dashboard Admin</h1>
  </div>
</div>
<!-- Main content -->
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
          <div class="inner">
            <h3>123</h3>
            <p>Artikel Edukasi</p>
          </div>
          <div class="icon">
            <i class="fas fa-book-medical"></i>
          </div>
          <a href="<?= base_url('admin/article') ?>" class="small-box-footer">Lihat Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- Tambahkan kotak lainnya sesuai kebutuhan -->
    </div>
  </div>
</div>
<?= $this->endSection() ?>

  <!-- Content -->
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <h1 class="m-0 text-dark">Selamat Datang, <?= session()->get('username') ?></h1>
      </div>
    </div>

    <div class="content">
      <div class="container-fluid">
        <!-- Konten dashboard -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <h3>123</h3>
                <p>Artikel Edukasi</p>
              </div>
              <div class="icon">
                <i class="fas fa-book-medical"></i>
              </div>
              <a href="#" class="small-box-footer">Lihat Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- Tambahkan kotak lainnya -->
        </div>
      </div>
    </div>
  </div>

  <footer class="main-footer text-center">
    <strong>&copy; 2025 Nusantara Farma</strong>
  </footer>
</div>

<script src="<?= base_url('assets/adminlte/plugins/jquery/jquery.min.js') ?>"></script>
<script src="<?= base_url('assets/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<script src="<?= base_url('assets/adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') ?>"></script>
<script src="<?= base_url('assets/adminlte/dist/js/adminlte.min.js') ?>"></script>
</body>
</html>
