<?php
// File: app/Views/admin/article/upload_pdf.php
?>
<?= $this->extend('layouts/admin/main') ?>
<?= $this->section('content') ?>

<div class="content-header">
  <div class="container-fluid">
    <h1 class="m-0 text-dark">Import Artikel dari PDF</h1>
  </div>
</div>
<div class="content">
  <div class="container-fluid">
    <?= session()->getFlashdata('success') ? '<div class="alert alert-success">'.session()->getFlashdata('success').'</div>' : '' ?>
    <?= session()->getFlashdata('error') ? '<div class="alert alert-danger">'.session()->getFlashdata('error').'</div>' : '' ?>
    <div class="card">
      <div class="card-body">
        <form action="<?= base_url('admin/article/storeFromPdf') ?>" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label>Kategori</label>
            <select name="category_id" class="form-control" required>
              <?php foreach($categories as $c): ?>
                <option value="<?= $c['id'] ?>"><?= esc($c['name']) ?></option>
              <?php endforeach ?>
            </select>
          </div>
          <div class="form-group">
            <label>Upload PDF</label>
            <input type="file" name="pdf" accept="application/pdf" class="form-control" required>
          </div>
          <button class="btn btn-primary"><i class="fas fa-file-upload"></i> Upload dan Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection() ?>