<?php
// File: app/Views/admin/article/create.php
?>
<?= $this->extend('layouts/admin/main.php') ?>
<?= $this->section('content') ?>
<div class="content-header">
  <div class="container-fluid">
    <h1 class="m-0 text-dark">Tambah Artikel</h1>
  </div>
</div>
<div class="content">
  <div class="container-fluid">
    <div class="card">
      <div class="card-body">
        <form action="<?= base_url('article/store') ?>" method="post">
          <div class="form-group">
            <label>Judul</label>
            <input type="text" name="title" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Kategori</label>
            <select name="category_id" class="form-control" required>
              <?php foreach($categories as $c): ?>
              <option value="<?= $c['id'] ?>"><?= esc($c['name']) ?></option>
              <?php endforeach ?>
            </select>
          </div>
          <div class="form-group">
            <label>Isi</label>
            <textarea name="content" class="form-control" rows="5" required></textarea>
          </div>
          <button class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>
