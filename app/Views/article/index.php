<?= $this->extend('layouts/landing/main') ?>

<?= $this->section('content') ?>
<div class="container mt-5">
    <h2 class="mb-4">Artikel Terbaru</h2>

    <div class="row">
        <?php if (!empty($articles)): ?>
            <?php foreach ($articles as $article): ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title"><?= esc($article['title']) ?></h5>
                            <p class="card-text text-muted"><?= date('d M Y', strtotime($article['created_at'])) ?></p>
                            <a href="<?= base_url('artikel/' . $article['slug']) ?>" class="mt-auto btn btn-outline-primary btn-sm">Baca PDF</a>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        <?php else: ?>
            <div class="col-12">
                <p class="text-muted">Belum ada artikel tersedia.</p>
            </div>
        <?php endif ?>
    </div>
</div>
<?= $this->endSection() ?>
