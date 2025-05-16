<!DOCTYPE html><html lang="id"><head>
  <meta charset="UTF-8">
  <title><?= $title ?? 'Dashboard' ?></title>
  <link rel="stylesheet" href="<?= base_url('assets/adminlte/plugins/fontawesome-free/css/all.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/adminlte/dist/css/adminlte.min.css') ?>">
</head><body class="hold-transition sidebar-mini">
<div class="wrapper">
  <?= $this->include('layouts/admin/navbar') ?>
  <?= $this->include('layouts/admin/sidebar') ?>
  <div class="content-wrapper">
    <?= $this->renderSection('content') ?>
  </div>
  <?= $this->include('layouts/admin/footer') ?>
</div>
<script src="<?= base_url('assets/adminlte/plugins/jquery/jquery.min.js') ?>"></script>
<script src="<?= base_url('assets/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<script src="<?= base_url('assets/adminlte/dist/js/adminlte.min.js') ?>"></script>
</body></html>
