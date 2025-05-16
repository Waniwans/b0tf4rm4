<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title><?= isset($title) ? esc($title) : 'Nusantara Farma' ?></title>
    <!-- Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Font Awesome (Optional) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />

    <style>
        html, body {
            height: 100%;
            margin: 0;
        }
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        main.content {
            flex: 1 0 auto;
        }

        .navbar {
            background-color: #007b5e; /* Hijau tua */
        }

        .navbar a {
            color: white;
        }

        .navbar a:hover {
            color: #00cba9; /* Hijau muda aksen */
        }

        .hero-slider {
            background-color: #f8f9fa;
            position: relative;
            max-height: 400px;
            overflow: hidden;
            border-radius: 12px;
        }

        .hero-slider .slide {
            display: none;
            width: 100%;
            height: 100%;
        }

        .hero-slider .slide img {
            width: 100%;
            height: auto;
            display: block;
            object-fit: cover;
            border-radius: 12px;
        }

        .hero-slider .slide.active {
            display: block;
        }

        .slider-prev,
        .slider-next {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(0, 0, 0, 0.5);
            color: #fff;
            border: none;
            padding: 10px;
            font-size: 20px;
            cursor: pointer;
            z-index: 10;
            border-radius: 50%;
            transition: background 0.3s ease;
        }

        .slider-prev:hover,
        .slider-next:hover {
            background: rgba(0, 0, 0, 0.7);
        }

        .slider-prev { left: 15px; }
        .slider-next { right: 15px; }

        .layanan-card {
            background-color: white;
            border: 1px solid #e1e1e1;
            border-radius: 10px;
            text-align: center;
            padding: 1rem;
            transition: all 0.3s ease;
        }

        .layanan-card:hover {
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        .nav-tabs .nav-link.active {
            background-color: #00cba9;
            color: white;
            border: none;
        }

        .nav-tabs .nav-link {
            color: #007b5e;
        }

        .card {
            border-radius: 10px;
            border: none;
        }

        .card-title {
            color: #007b5e;
        }

        #pdf-viewer canvas {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            border-radius: 0.5rem;
        }

        .border-start {
            border-left: 1px solid #ddd !important;
        }

        footer {
            flex-shrink: 0;
            background-color: #007b5e;
            color: white;
        }

        footer a {
            color: #00cba9;
        }

        footer a:hover {
            color: #ffffff;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold text-white" href="<?= base_url('/') ?>">Nusantara Farma</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navMenu">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a href="<?= base_url('/') ?>" class="nav-link">Beranda</a></li>
                    <li class="nav-item"><a href="<?= base_url('artikel') ?>" class="nav-link">Artikel</a></li>
                    <li class="nav-item"><a href="<?= base_url('chatbot') ?>" class="nav-link">Chatbot</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="content container my-4">
        <?= $this->renderSection('content') ?>
    </main>

    <!-- Footer -->
    <footer class="text-center py-3 border-top">
        <div class="container">
            <small>© <?= date('Y') ?> Nusantara Farma</small>
        </div>
    </footer>

    <!-- Popup Chatbot -->
    <script type="module">
        import Chatbot from "https://cdn.jsdelivr.net/npm/flowise-embed/dist/web.js"
        Chatbot.init({
            chatflowid: "48aa876f-4652-4ece-9776-b9ada6e393a7",
            apiHost: "https://cloud.flowiseai.com",
            theme: {
                buttonBackgroundColor: "#009879",
                chatWindowBackgroundColor: "#ffffff",
                textColor: "#333",
                welcomeMessage: "Halo! Saya chatbot kesehatan. Ada yang bisa saya bantu?",
            }
        })
    </script>

    <!-- Hero slides -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let slides = document.querySelectorAll('.hero-slider .slide');
            if (slides.length === 0) return;

            let current = 0;
            const showSlide = idx => {
                slides.forEach((s, i) => s.classList.toggle('active', i === idx));
            };

            let timer = setInterval(() => {
                current = (current + 1) % slides.length;
                showSlide(current);
            }, 5000);

            const prevBtn = document.querySelector('.slider-prev');
            const nextBtn = document.querySelector('.slider-next');

            if (prevBtn) {
                prevBtn.addEventListener('click', () => {
                    clearInterval(timer);
                    current = (current - 1 + slides.length) % slides.length;
                    showSlide(current);
                });
            }

            if (nextBtn) {
                nextBtn.addEventListener('click', () => {
                    clearInterval(timer);
                    current = (current + 1) % slides.length;
                    showSlide(current);
                });
            }
        });
    </script>

    <!-- PDF.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.4.120/pdf.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
