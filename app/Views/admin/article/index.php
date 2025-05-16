<?php

?>
<?= $this->extend('layouts/admin/main') ?>
<?= $this->section('content') ?>

<!-- Page Header -->
<div class="content-header">
  <div class="container-fluid">
    <h1 class="m-0 text-dark">Manajemen Artikel</h1>
    <button class="btn btn-primary mt-3" data-toggle="modal" data-target="#articleModal">
      <i class="fas fa-plus"></i> Tambah/Edit Artikel
    </button>
    <a href="<?= base_url('admin/article/upload-pdf') ?>" class="btn btn-secondary mt-3">
      <i class="fas fa-file-upload"></i> Import PDF
    </a>
  </div>
</div>

<!-- Alerts -->
<?= session()->getFlashdata('success') ? '<div class="alert alert-success">'.session()->getFlashdata('success').'</div>' : '' ?>
<?= session()->getFlashdata('error') ? '<div class="alert alert-danger">'.session()->getFlashdata('error').'</div>' : '' ?>

<!-- Article Table -->
<div class="content">
  <div class="container-fluid">
    <div class="card">
      <div class="card-body">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th>Judul</th>
              <th>Kategori</th>
              <th>Tanggal</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($articles as $a): ?>
            <tr>
              <td><?= $a['id'] ?></td>
              <td><?= esc($a['title']) ?></td>
              <td><?= esc($a['category_name'] ?? $a['category_id']) ?></td>
              <td><?= $a['created_at'] ?></td>
              <td>
                <button class="btn btn-sm btn-warning" 
                        onclick="openArticleModal(<?= $a['id'] ?>, '<?= esc($a['title'], 'js') ?>', '<?= esc($a['content'], 'js') ?>', <?= $a['category_id'] ?>)">
                  <i class="fas fa-edit"></i>
                </button>
                <a href="<?= base_url('admin/article/delete/'.$a['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">
                  <i class="fas fa-trash"></i>
                </a>
              </td>
            </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- Modal Form Tambah/Edit Artikel -->
<div class="modal fade" id="articleModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="articleForm" method="post" action="<?= base_url('admin/article/store') ?>">
        <div class="modal-header">
          <h5 class="modal-title" id="articleModalLabel">Tambah Artikel</h5>
          <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="id" id="artId">
          <div class="form-group">
            <label>Judul</label>
            <input type="text" name="title" id="artTitle" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Kategori</label>
            <select name="category_id" id="artCategory" class="form-control" required>
              <?php foreach($categories as $c): ?>
              <option value="<?= $c['id'] ?>"><?= esc($c['name']) ?></option>
              <?php endforeach ?>
            </select>
          </div>
          <div class="form-group">
            <label>Isi</label>
            <textarea name="content" id="artContent" class="form-control" rows="5" required></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
function openArticleModal(id, title, content, categoryId) {
  document.getElementById('articleModalLabel').innerText = id ? 'Edit Artikel' : 'Tambah Artikel';
  document.getElementById('artId').value        = id || '';
  document.getElementById('artTitle').value     = title || '';
  document.getElementById('artContent').value   = content || '';
  document.getElementById('artCategory').value  = categoryId || '';
  var form = document.getElementById('articleForm');
  form.action = id 
    ? '<?= base_url('admin/article/store') ?>' 
    : '<?= base_url('admin/article/store') ?>';
  $('#articleModal').modal('show');
}
</script>

<?= $this->endSection() ?>
