<?php

?>
<?= $this->extend('layouts/admin/main') ?>
<?= $this->section('content') ?>
<div class="content-header">
  <div class="container-fluid">
    <h1 class="m-0 text-dark">Tambah Kategori</h1>
  </div>
</div>
<div class="content">
  <div class="container-fluid">
    <div class="card">
      <div class="card-body">
        <form action="<?= base_url('admin/category/store') ?>" method="post">
          <div class="form-group">
            <label>Nama Kategori</label>
            <input type="text" name="name" class="form-control" required>
          </div>
          <button class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>