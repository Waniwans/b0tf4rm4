<?= $this->extend('layouts/landing/main') ?>

<?= $this->section('content') ?>
<section class="container mt-5">

    <!-- Hero Slider -->
    <section class="hero-slider position-relative mb-5">
        <?php for ($i = 1; $i <= 5; $i++): ?>
            <div class="slide<?= $i === 1 ? ' active' : '' ?>">
                <img src="<?= base_url("assets/images/banner/hero{$i}.jpg") ?>" alt="Slide <?= $i ?>">
            </div>
        <?php endfor; ?>
        <button class="slider-prev">&#10094;</button>
        <button class="slider-next">&#10095;</button>
    </section>

    <div class="row">
        <!-- Kiri: Highlight Artikel -->
        <div class="col-lg-8 mb-4">
            <?php if (!empty($artikel_terbaru)): ?>
                <?php $highlight = $artikel_terbaru[0]; ?>
                <div class="card border-0 shadow-sm h-100">
                    <?php if (!empty($highlight['image'])): ?>
                        <img src="<?= base_url('uploads/articles/' . $highlight['image']) ?>" class="card-img-top" alt="<?= esc($highlight['title']) ?>">
                    <?php endif; ?>
                    <div class="card-body">
                        <h4 class="card-title"><?= esc($highlight['title']) ?></h4>
                        <p class="card-text text-muted"><?= word_limiter(strip_tags($highlight['content']), 30) ?></p>
                        <a href="<?= base_url('artikel/' . $highlight['slug']) ?>" class="btn btn-primary">Lebih Detail</a>
                    </div>
                </div>
            <?php endif; ?>
        </div>

        <!-- Kanan: Tab Navigasi -->
        <div class="col-lg-4 mb-4">
            <ul class="nav nav-tabs mb-3" id="infoTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="artikel-tab" data-bs-toggle="tab" data-bs-target="#artikel" type="button" role="tab">Artikel Terbaru</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="kategori-tab" data-bs-toggle="tab" data-bs-target="#kategori" type="button" role="tab">Kategori</button>
                </li>
            </ul>
            <div class="tab-content" id="infoTabContent" style="max-height: 440px; overflow-y: auto;">
                <!-- Artikel Terbaru -->
                <div class="tab-pane fade show active" id="artikel" role="tabpanel">
                    <?php if (!empty($artikel_terbaru)): ?>
                        <?php foreach (array_slice($artikel_terbaru, 1) as $artikel): ?>
                            <div class="mb-3">
                                <a href="<?= base_url('artikel/' . $artikel['slug']) ?>" class="text-dark fw-semibold d-block"><?= esc($artikel['title']) ?></a>
                                <small class="text-muted"><?= date('d M Y', strtotime($artikel['created_at'])) ?></small>
                                <hr>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p class="text-muted">Belum ada artikel.</p>
                    <?php endif; ?>
                </div>

                <!-- Kategori -->
                <div class="tab-pane fade" id="kategori" role="tabpanel">
                    <?php if (!empty($kategori)): ?>
                        <?php foreach ($kategori as $kat): ?>
                            <div class="mb-2">
                                <a href="<?= base_url('kategori/' . $kat['slug']) ?>" class="text-dark fw-semibold d-block"><?= esc($kat['name']) ?></a>
                                <hr>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p class="text-muted">Tidak ada kategori tersedia.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>
