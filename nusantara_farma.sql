-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Bulan Mei 2025 pada 21.43
-- Versi server: 8.0.41
-- Versi PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nusantara_farma`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `articles`
--

CREATE TABLE `articles` (
  `id` int NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `slug` varchar(200) DEFAULT NULL,
  `content` text,
  `pdf_file` varchar(255) DEFAULT NULL,
  `category_id` int DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `articles`
--

INSERT INTO `articles` (`id`, `title`, `slug`, `content`, `pdf_file`, `category_id`, `user_id`, `created_at`) VALUES
(2, 'manfaat mengkudu bagi kesehatan superfood tropis yang jarang dilirik', 'manfaat-mengkudu-bagi-kesehatan-superfood-tropis-yang-jarang-dilirik', '[Konten diisi dari PDF]', '1747348609_80e4a6fbb6a5b6e5a45a.pdf', 1, 7, '2025-05-15 22:36:49'),
(3, '4 cara mencegah tbc yang efektif yang perlu kamu ketahui', '4-cara-mencegah-tbc-yang-efektif-yang-perlu-kamu-ketahui', 'TBC adalah penyakit menular yang disebabkan oleh infeksi bakteri Mycobacterium tuberculosis.\r\nMenurut Kementerian Kesehatan RI dan World Health Organization (WHO), penyakit TBC menyebar\r\nmelalui udara ketika penderita batuk, bersin, atau berbicara. Oleh karena itu, penting bagi kita\r\nsemua untuk memahami langkah-langkah pencegahan TBC agar terhindar dari penyebarannya.', '1747352149_9ce9eeb59d4a39e4bc5a.pdf', 2, 7, '2025-05-15 23:35:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`) VALUES
(1, 'Kesehatan Buah', 'kesehatan-buah', '2025-05-16 04:00:07'),
(2, 'pencegahan', 'pencegahan', '2025-05-16 06:35:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `chatbot_qna`
--

CREATE TABLE `chatbot_qna` (
  `id` int NOT NULL,
  `question` text,
  `answer` text,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `chatbot_qna`
--

INSERT INTO `chatbot_qna` (`id`, `question`, `answer`, `created_at`) VALUES
(1, 'Apa itu vaksin?', 'Vaksin adalah zat yang diberikan untuk merangsang sistem kekebalan tubuh agar melawan penyakit tertentu.', '2025-05-15 00:03:32'),
(2, 'Bagaimana cara menjaga kesehatan jantung?', 'Menjaga pola makan sehat, rutin berolahraga, dan menghindari merokok dapat menjaga kesehatan jantung.', '2025-05-15 00:03:32'),
(3, 'Apa gejala umum flu?', 'Gejala flu biasanya meliputi demam, batuk, pilek, sakit tenggorokan, dan badan terasa lemas.', '2025-05-15 00:03:32'),
(4, 'Apa itu diabetes?', 'Diabetes adalah kondisi di mana tubuh tidak dapat memproduksi atau menggunakan insulin dengan efektif, yang mengakibatkan kadar gula darah tinggi.', '2025-05-15 00:03:32'),
(5, 'Bagaimana cara mencegah hipertensi?', 'Mengatur pola makan, berolahraga secara teratur, dan menghindari stres dapat membantu mencegah hipertensi.', '2025-05-15 00:03:32'),
(6, 'Apa manfaat olahraga?', 'Olahraga dapat meningkatkan kesehatan jantung, mengurangi risiko penyakit, dan meningkatkan kesehatan mental.', '2025-05-15 00:03:32'),
(7, 'Apa itu kolesterol?', 'Kolesterol adalah zat lemak yang ditemukan dalam darah dan diperlukan untuk fungsi tubuh, tetapi kadar yang tinggi dapat meningkatkan risiko penyakit jantung.', '2025-05-15 00:03:32'),
(8, 'Apa yang dimaksud dengan BMI?', 'BMI (Body Mass Index) adalah ukuran yang digunakan untuk menilai berat badan seseorang berdasarkan tinggi badan dan berat badan.', '2025-05-15 00:03:32'),
(9, 'Apa gejala dehidrasi?', 'Gejala dehidrasi meliputi rasa haus yang berlebihan, mulut kering, kelelahan, dan pusing.', '2025-05-15 00:03:32'),
(10, 'Bagaimana cara menjaga kesehatan mental?', 'Menjaga kesehatan mental dapat dilakukan dengan berolahraga, tidur yang cukup, dan berbicara dengan orang yang dipercaya tentang perasaan Anda.', '2025-05-15 00:03:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `feedback`
--

CREATE TABLE `feedback` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `message` text,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint UNSIGNED NOT NULL,
  `version` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `class` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `group` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `namespace` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `time` int NOT NULL,
  `batch` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') DEFAULT 'user',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`, `created_at`) VALUES
(6, 'admin', 'admin@example.com', 'admin123', 'admin', '2025-05-15 01:14:38'),
(7, 'admin1', 'admin1@example.com', '$2y$10$RO5Yykr2ly.d447VvGknFeOV6xXYuZM9zEc8fNTCNQUlAFFS0VfAi', 'admin', '2025-05-15 03:14:43');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `chatbot_qna`
--
ALTER TABLE `chatbot_qna`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `chatbot_qna`
--
ALTER TABLE `chatbot_qna`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `articles_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
