<?= $this->extend('layouts/admin/main') ?>
<?= $this->section('content') ?>

<div class="content-header">
  <div class="container-fluid">
    <h1 class="m-0 text-dark">Manajemen Chatbot</h1>
    <button class="btn btn-primary mt-3" data-toggle="modal" data-target="#chatbotModal">
      <i class="fas fa-plus"></i> Tambah/Edit Entri
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
              <th>Pertanyaan</th>
              <th>Jawaban</th>
              <th>Tanggal</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($entries as $e): ?>
            <tr>
              <td><?= $e['id'] ?></td>
              <td><?= esc($e['question']) ?></td>
              <td><?= esc($e['answer']) ?></td>
              <td><?= $e['created_at'] ?></td>
              <td>
                <button class="btn btn-sm btn-warning" 
                        onclick="openChatbotModal(<?= $e['id'] ?>, '<?= esc($e['question'], 'js') ?>', '<?= esc($e['answer'], 'js') ?>')">
                  <i class="fas fa-edit"></i>
                </button>
                <a href="<?= base_url('admin/chatbot/delete/'.$e['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">
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

<!-- Modal Form Tambah/Edit -->
<div class="modal fade" id="chatbotModal" tabindex="-1" role="dialog" aria-labelledby="chatbotModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form id="chatbotForm" method="post" action="<?= base_url('admin/chatbot/store') ?>">
        <div class="modal-header">
          <h5 class="modal-title" id="chatbotModalLabel">Tambah Entri Chatbot</h5>
          <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="id" id="entryId">
          <div class="form-group">
            <label>Pertanyaan</label>
            <textarea name="question" id="entryQuestion" class="form-control" rows="3" required></textarea>
          </div>
          <div class="form-group">
            <label>Jawaban</label>
            <textarea name="answer" id="entryAnswer" class="form-control" rows="3" required></textarea>
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
function openChatbotModal(id, question, answer) {
  document.getElementById('chatbotModalLabel').innerText = id ? 'Edit Entri Chatbot' : 'Tambah Entri Chatbot';
  document.getElementById('entryId').value        = id;
  document.getElementById('entryQuestion').value  = question;
  document.getElementById('entryAnswer').value    = answer;
  var form = document.getElementById('chatbotForm');
  form.action = id 
    ? '<?= base_url('admin/chatbot/update/') ?>'+id 
    : '<?= base_url('admin/chatbot/store') ?>';
  $('#chatbotModal').modal('show');
}
</script>

<?= $this->endSection() ?>
