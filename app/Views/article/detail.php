<?= $this->extend('layouts/landing/main') ?>

<?= $this->section('content') ?>
<div class="container mt-5">
    <div class="row">
        <!-- Konten Artikel -->
        <div class="col-lg-8">
            <h2><?= esc($article['title']) ?></h2>
            <p class="text-muted"><?= date('d M Y', strtotime($article['created_at'])) ?></p>

            <?php if (!empty($article['pdf_file'])): ?>
                <div id="pdf-viewer" class="mt-4 border rounded p-3 shadow-sm" style="background: #fff;"></div>
            <?php else: ?>
                <p class="text-muted">Tidak ada file PDF untuk artikel ini.</p>
            <?php endif; ?>
        </div>

        <!-- Sidebar Artikel Lainnya -->
        <div class="col-lg-4 mt-4 mt-lg-0 border-start ps-lg-4">
            <h4 class="mb-3">Artikel Terbaru Lainnya</h4>
            <?php if (!empty($latest)): ?>
                <?php foreach ($latest as $item): ?>
                    <div class="card mb-3 shadow-sm border-0">
                        <div class="card-body p-3">
                            <a href="<?= base_url('artikel/' . $item['slug']) ?>" class="text-dark fw-bold d-block">
                                <?= esc($item['title']) ?>
                            </a>
                            <small class="text-muted"><?= date('d M Y', strtotime($item['created_at'])) ?></small>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="text-muted">Tidak ada artikel lainnya.</p>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- Tambahkan PDF.js dan script render -->
<?php if (!empty($article['pdf_file'])): ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.4.120/pdf.min.js"></script>
    <script>
        const url = "<?= base_url('uploads/pdf/' . $article['pdf_file']) ?>";
        const container = document.getElementById('pdf-viewer');

        pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.4.120/pdf.worker.min.js';

        const loadingTask = pdfjsLib.getDocument(url);
        loadingTask.promise.then(function(pdf) {
            for (let i = 1; i <= pdf.numPages; i++) {
                pdf.getPage(i).then(function(page) {
                    const scale = 1.5;
                    const viewport = page.getViewport({ scale });

                    const canvas = document.createElement("canvas");
                    canvas.classList.add("mb-4", "w-100");
                    const context = canvas.getContext("2d");
                    canvas.height = viewport.height;
                    canvas.width = viewport.width;

                    const renderContext = {
                        canvasContext: context,
                        viewport: viewport
                    };

                    page.render(renderContext).promise.then(function () {
                        container.appendChild(canvas);
                    });
                });
            }
        }).catch(function(error) {
            container.innerHTML = "<p class='text-danger'>Gagal memuat PDF.</p>";
        });
    </script>
<?php endif; ?>
<?= $this->endSection() ?>
