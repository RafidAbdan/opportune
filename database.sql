-- Database: opportune_db

CREATE DATABASE IF NOT EXISTS opportune_db;
USE opportune_db;

-- Users Table
CREATE TABLE IF NOT EXISTS users (
    id VARCHAR(50) PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('user', 'admin') DEFAULT 'user',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Scholarships Table
CREATE TABLE IF NOT EXISTS scholarships (
    id VARCHAR(50) PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    provider VARCHAR(255) NOT NULL,
    category VARCHAR(100),
    deadline DATE,
    degree VARCHAR(50),
    description TEXT,
    image VARCHAR(255),
    field VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Articles Table
CREATE TABLE IF NOT EXISTS articles (
    id VARCHAR(50) PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    excerpt TEXT,
    content TEXT,
    image VARCHAR(255),
    date DATE,
    category VARCHAR(100),
    author VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Team Members Table
CREATE TABLE IF NOT EXISTS team_members (
    id VARCHAR(50) PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    role VARCHAR(100),
    bio TEXT,
    image VARCHAR(255)
);

-- Applications Table
CREATE TABLE IF NOT EXISTS applications (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id VARCHAR(50) NOT NULL,
    scholarship_id VARCHAR(50) NOT NULL,
    status ENUM('pending', 'accepted', 'rejected') DEFAULT 'pending',
    applied_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (scholarship_id) REFERENCES scholarships(id) ON DELETE CASCADE
);

-- Favorites Table
CREATE TABLE IF NOT EXISTS favorites (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id VARCHAR(50) NOT NULL,
    scholarship_id VARCHAR(50) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (scholarship_id) REFERENCES scholarships(id) ON DELETE CASCADE
);

-- Insert Initial Data (from mockData.ts)

-- Users
INSERT INTO users (id, name, email, password, role) VALUES
('u1', 'Budi Santoso', 'budi@example.com', 'user123', 'user'),
('u2', 'Siti Aminah', 'siti@example.com', 'user456', 'user'),
('u3', 'Admin Utama', 'admin@admin.com', 'admin123', 'admin'),
('u4', 'Executive', 'admin_executive@executive1.com', 'executive123', 'admin');

-- Scholarships
INSERT INTO scholarships (id, title, provider, category, deadline, degree, description, image, field) VALUES
('1', 'Beasiswa Bakti BCA', 'BCA Finance', 'Nasional', '2025-12-31', 'S1', 'Program beasiswa untuk mahasiswa berprestasi di seluruh Indonesia dengan bantuan biaya kuliah dan uang saku. Terbuka untuk semua jurusan dengan minimal IPK 3.00.', 'https://images.unsplash.com/photo-1523050854058-8df90110c9f1?auto=format&fit=crop&q=80&w=800', 'Umum'),
('2', 'Global Korea Scholarship', 'NIIED Korea', 'Internasional', '2025-09-15', 'S2', 'Beasiswa penuh dari pemerintah Korea Selatan untuk mahasiswa internasional jenjang pascasarjana. Mencakup biaya kuliah, tiket pesawat, dan tunjangan bulanan.', 'https://images.unsplash.com/photo-1532012197267-da84d127e765?auto=format&fit=crop&q=80&w=800', 'Teknologi'),
('3', 'Djarum Beasiswa Plus', 'Djarum Foundation', 'Nasional', '2025-05-20', 'S1', 'Bukan sekadar beasiswa prestasi, tetapi juga pelatihan soft skills untuk pemimpin masa depan. Mendapatkan pelatihan karakter dan kepemimpinan.', 'https://images.unsplash.com/photo-1523240795612-9a054b0db644?auto=format&fit=crop&q=80&w=800', 'Umum'),
('4', 'Erasmus+ Mundus', 'European Union', 'Internasional', '2025-01-15', 'S2', 'Kesempatan belajar di berbagai negara Eropa dengan pembiayaan penuh. Program master gabungan yang bergengsi.', 'https://images.unsplash.com/photo-1498243691581-b145c3f54a5a?auto=format&fit=crop&q=80&w=800', 'Lingkungan'),
('5', 'Beasiswa Unggulan', 'Kemendikbud', 'Nasional', '2025-08-10', 'S1/S2/S3', 'Mendukung putra-putri terbaik bangsa untuk melanjutkan pendidikan di perguruan tinggi terbaik dalam dan luar negeri.', 'https://images.unsplash.com/photo-1434030216411-0b793f4b4173?auto=format&fit=crop&q=80&w=800', 'Seni'),
('6', 'MEXT Scholarship', 'Govt of Japan', 'Internasional', '2025-04-30', 'S1', 'Beasiswa Monbukagakusho untuk studi di universitas Jepang. Mencakup biaya sekolah penuh dan uang saku bulanan.', 'https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&q=80&w=800', 'Teknologi'),
('7', 'Chevening Scholarship', 'UK Government', 'Internasional', '2025-11-01', 'S2', 'Beasiswa penuh untuk studi S2 di universitas mana pun di Inggris. Mencari pemimpin masa depan.', 'https://images.unsplash.com/photo-1513635269975-59663e0ac1ad?auto=format&fit=crop&q=80&w=800', 'Sosial'),
('8', 'Fulbright Scholarship', 'USA Government', 'Internasional', '2025-02-15', 'S2/S3', 'Program pertukaran pendidikan bergengsi ke Amerika Serikat. Terbuka untuk berbagai disiplin ilmu.', 'https://images.unsplash.com/photo-1525921429617-e511f274aa3c?auto=format&fit=crop&q=80&w=800', 'Pendidikan'),
('9', 'LPDP Reguler', 'Kemenkeu RI', 'Nasional', '2025-07-01', 'S2/S3', 'Beasiswa penuh dari pemerintah Indonesia untuk calon pemimpin masa depan. Tersedia untuk universitas dalam dan luar negeri.', 'https://images.unsplash.com/photo-1554224155-8d04cb21cd6c?auto=format&fit=crop&q=80&w=800', 'Bisnis'),
('10', 'Australia Awards', 'Australian Govt', 'Internasional', '2025-04-30', 'S2/S3', 'Beasiswa internasional bergengsi yang didanai oleh Pemerintah Australia. Fokus pada pembangunan.', 'https://images.unsplash.com/photo-1523580494863-6f3031224c94?auto=format&fit=crop&q=80&w=800', 'Lingkungan'),
('11', 'Tanoto Foundation', 'Tanoto Foundation', 'Nasional', '2025-06-30', 'S1', 'Beasiswa kepemimpinan untuk mahasiswa S1 berprestasi yang memiliki jiwa kepemimpinan.', 'https://images.unsplash.com/photo-1517486808906-6ca8b3f04846?auto=format&fit=crop&q=80&w=800', 'Bisnis'),
('12', 'CIMB Niaga Scholarship', 'CIMB Niaga', 'Nasional', '2025-08-20', 'S1', 'Mendukung mimpi mahasiswa Indonesia untuk terus berkarya dan berinovasi di bidang perbankan dan teknologi.', 'https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?auto=format&fit=crop&q=80&w=800', 'Bisnis');

-- Articles
INSERT INTO articles (id, title, excerpt, content, image, date, category, author) VALUES
('1', '5 Tips Lolos Wawancara Beasiswa LPDP', 'Simak rahasia sukses menghadapi pewawancara LPDP langsung dari awardee.', 'Wawancara adalah tahap krusial dalam seleksi beasiswa LPDP. Persiapan mental dan materi sangat dibutuhkan...', 'https://images.unsplash.com/photo-1557804506-669a67965ba0?auto=format&fit=crop&q=80&w=800', '2025-11-20', 'Wawancara', 'Admin Oppurtune'),
('2', 'Cara Menulis Essay Beasiswa yang Menarik', 'Essay adalah cerminan diri Anda. Buat essay yang stand out dengan struktur ini.', 'Essay beasiswa haruslah personal namun profesional. Mulailah dengan hook yang menarik...', 'https://images.unsplash.com/photo-1455390582262-044cdead277a?auto=format&fit=crop&q=80&w=800', '2025-11-18', 'Persiapan Dokumen', 'Sarah Putri'),
('3', 'Kuliah di Inggris dengan Chevening', 'Pengalaman seru kuliah S2 di UK dengan beasiswa penuh Chevening.', 'Inggris menawarkan pendidikan kelas dunia. Chevening membuka pintu bagi pemimpin masa depan...', 'https://images.unsplash.com/photo-1513635269975-59663e0ac1ad?auto=format&fit=crop&q=80&w=800', '2025-11-15', 'Cerita Sukses', 'Budi Santoso'),
('4', 'Strategi Mendapatkan LoA Unconditional', 'Langkah demi langkah mendapatkan Letter of Acceptance dari kampus impian.', 'LoA adalah syarat utama banyak beasiswa. Jangan tunda pendaftaran kampus...', 'https://images.unsplash.com/photo-1523050854058-8df90110c9f1?auto=format&fit=crop&q=80&w=800', '2025-11-10', 'Persiapan Dokumen', 'Admin Oppurtune');

-- Team Members
INSERT INTO team_members (id, name, role, bio, image) VALUES
('1', 'Fathi Cardiana', 'CEO & Founder', 'Visioner di balik Oppurtune, berdedikasi untuk mendemokratisasi akses informasi pendidikan.', 'https://images.unsplash.com/photo-1560250097-0b93528c311a?auto=format&fit=crop&q=80&w=400'),
('2', 'Sarah Johnson', 'Head of Content', 'Ahli strategi konten dengan pengalaman 10 tahun di bidang edukasi.', 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&q=80&w=400'),
('3', 'Michael Chen', 'Lead Developer', 'Fullstack developer yang memastikan platform berjalan lancar dan aman.', 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?auto=format&fit=crop&q=80&w=400');
