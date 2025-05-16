<?php
// File: app/Views/admin/category/index.php
?>
<?= $this->extend('layouts/admin/main') ?>
<?= $this->section('content') ?>

<div class="content-header">
  <div class="container-fluid">
    <h1 class="m-0 text-dark">Manajemen Kategori</h1>
    <button class="btn btn-primary mt-3" data-toggle="modal" data-target="#categoryModal">
      <i class="fas fa-plus"></i> Tambah/Edit Kategori
    </button>
  </div>
</div>
<div class="content">
  <div class="container-fluid">
    <?= session()->getFlashdata('success') ? '<div class="alert alert-success">'.session()->getFlashdata('success').'</div>' : '' ?>
    <div class="card">
      <div class="card-body">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nama</th>
              <th>Slug</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($categories as $c): ?>
            <tr>
              <td><?= $c['id'] ?></td>
              <td><?= esc($c['name']) ?></td>
              <td><?= esc($c['slug']) ?></td>
              <td>
                <button class="btn btn-sm btn-warning" onclick="openCategoryModal(<?= $c['id'] ?>, '<?= esc($c['name'], 'js') ?>')">
                  <i class="fas fa-edit"></i>
                </button>
                <a href="<?= base_url('admin/category/delete/'.$c['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">
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

<!-- Modal Tambah/Edit Kategori -->
<div class="modal fade" id="categoryModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form id="categoryForm" method="post" action="<?= base_url('admin/category/store') ?>">
        <div class="modal-header">
          <h5 class="modal-title" id="categoryModalLabel">Tambah Kategori</h5>
          <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="id" id="catId">
          <div class="form-group">
            <label>Nama Kategori</label>
            <input type="text" name="name" id="catName" class="form-control" required>
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
function openCategoryModal(id, name) {
  document.getElementById('categoryModalLabel').innerText = id ? 'Edit Kategori' : 'Tambah Kategori';
  document.getElementById('catId').value = id || '';
  document.getElementById('catName').value = name || '';
  var form = document.getElementById('categoryForm');
  form.action = id
    ? '<?= base_url('admin/category/update/') ?>'+id
    : '<?= base_url('admin/category/store') ?>';
  $('#categoryModal').modal('show');
}
</script>

<?= $this->endSection() ?>