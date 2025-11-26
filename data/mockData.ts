import { Scholarship, User, Article, TeamMember } from '../types';

// Data Dummy Beasiswa
export const initialScholarships: Scholarship[] = [
  {
    id: '1',
    title: 'Beasiswa Bakti BCA',
    provider: 'BCA Finance',
    category: 'Nasional',
    deadline: '2025-12-31',
    degree: 'S1',
    description: 'Program beasiswa untuk mahasiswa berprestasi di seluruh Indonesia dengan bantuan biaya kuliah dan uang saku. Terbuka untuk semua jurusan dengan minimal IPK 3.00.',
    image: 'https://images.unsplash.com/photo-1523050854058-8df90110c9f1?auto=format&fit=crop&q=80&w=800',
    field: 'Umum'
  },
  {
    id: '2',
    title: 'Global Korea Scholarship',
    provider: 'NIIED Korea',
    category: 'Internasional',
    deadline: '2025-09-15',
    degree: 'S2',
    description: 'Beasiswa penuh dari pemerintah Korea Selatan untuk mahasiswa internasional jenjang pascasarjana. Mencakup biaya kuliah, tiket pesawat, dan tunjangan bulanan.',
    image: 'https://images.unsplash.com/photo-1532012197267-da84d127e765?auto=format&fit=crop&q=80&w=800',
    field: 'Teknologi'
  },
  {
    id: '3',
    title: 'Djarum Beasiswa Plus',
    provider: 'Djarum Foundation',
    category: 'Nasional',
    deadline: '2025-05-20',
    degree: 'S1',
    description: 'Bukan sekadar beasiswa prestasi, tetapi juga pelatihan soft skills untuk pemimpin masa depan. Mendapatkan pelatihan karakter dan kepemimpinan.',
    image: 'https://images.unsplash.com/photo-1523240795612-9a054b0db644?auto=format&fit=crop&q=80&w=800',
    field: 'Umum'
  },
  {
    id: '4',
    title: 'Erasmus+ Mundus',
    provider: 'European Union',
    category: 'Internasional',
    deadline: '2025-01-15',
    degree: 'S2',
    description: 'Kesempatan belajar di berbagai negara Eropa dengan pembiayaan penuh. Program master gabungan yang bergengsi.',
    image: 'https://images.unsplash.com/photo-1498243691581-b145c3f54a5a?auto=format&fit=crop&q=80&w=800',
    field: 'Lingkungan'
  },
  {
    id: '5',
    title: 'Beasiswa Unggulan',
    provider: 'Kemendikbud',
    category: 'Nasional',
    deadline: '2025-08-10',
    degree: 'S1/S2/S3',
    description: 'Mendukung putra-putri terbaik bangsa untuk melanjutkan pendidikan di perguruan tinggi terbaik dalam dan luar negeri.',
    image: 'https://images.unsplash.com/photo-1434030216411-0b793f4b4173?auto=format&fit=crop&q=80&w=800',
    field: 'Seni'
  },
  {
    id: '6',
    title: 'MEXT Scholarship',
    provider: 'Govt of Japan',
    category: 'Internasional',
    deadline: '2025-04-30',
    degree: 'S1',
    description: 'Beasiswa Monbukagakusho untuk studi di universitas Jepang. Mencakup biaya sekolah penuh dan uang saku bulanan.',
    image: 'https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&q=80&w=800',
    field: 'Teknologi'
  },
  {
    id: '7',
    title: 'Chevening Scholarship',
    provider: 'UK Government',
    category: 'Internasional',
    deadline: '2025-11-01',
    degree: 'S2',
    description: 'Beasiswa penuh untuk studi S2 di universitas mana pun di Inggris. Mencari pemimpin masa depan.',
    image: 'https://images.unsplash.com/photo-1513635269975-59663e0ac1ad?auto=format&fit=crop&q=80&w=800',
    field: 'Sosial'
  },
  {
    id: '8',
    title: 'Fulbright Scholarship',
    provider: 'USA Government',
    category: 'Internasional',
    deadline: '2025-02-15',
    degree: 'S2/S3',
    description: 'Program pertukaran pendidikan bergengsi ke Amerika Serikat. Terbuka untuk berbagai disiplin ilmu.',
    image: 'https://images.unsplash.com/photo-1525921429617-e511f274aa3c?auto=format&fit=crop&q=80&w=800',
    field: 'Pendidikan'
  },
  {
    id: '9',
    title: 'LPDP Reguler',
    provider: 'Kemenkeu RI',
    category: 'Nasional',
    deadline: '2025-07-01',
    degree: 'S2/S3',
    description: 'Beasiswa penuh dari pemerintah Indonesia untuk calon pemimpin masa depan. Tersedia untuk universitas dalam dan luar negeri.',
    image: 'https://images.unsplash.com/photo-1554224155-8d04cb21cd6c?auto=format&fit=crop&q=80&w=800',
    field: 'Bisnis'
  },
  {
    id: '10',
    title: 'Australia Awards',
    provider: 'Australian Govt',
    category: 'Internasional',
    deadline: '2025-04-30',
    degree: 'S2/S3',
    description: 'Beasiswa internasional bergengsi yang didanai oleh Pemerintah Australia. Fokus pada pembangunan.',
    image: 'https://images.unsplash.com/photo-1523580494863-6f3031224c94?auto=format&fit=crop&q=80&w=800',
    field: 'Lingkungan'
  },
  {
    id: '11',
    title: 'Tanoto Foundation',
    provider: 'Tanoto Foundation',
    category: 'Nasional',
    deadline: '2025-06-30',
    degree: 'S1',
    description: 'Beasiswa kepemimpinan untuk mahasiswa S1 berprestasi yang memiliki jiwa kepemimpinan.',
    image: 'https://images.unsplash.com/photo-1517486808906-6ca8b3f04846?auto=format&fit=crop&q=80&w=800',
    field: 'Bisnis'
  },
  {
    id: '12',
    title: 'CIMB Niaga Scholarship',
    provider: 'CIMB Niaga',
    category: 'Nasional',
    deadline: '2025-08-20',
    degree: 'S1',
    description: 'Mendukung mimpi mahasiswa Indonesia untuk terus berkarya dan berinovasi di bidang perbankan dan teknologi.',
    image: 'https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?auto=format&fit=crop&q=80&w=800',
    field: 'Bisnis'
  }
];

// Data Dummy Artikel
export const initialArticles: Article[] = [
  {
    id: '1',
    title: '5 Tips Lolos Wawancara Beasiswa LPDP',
    excerpt: 'Simak rahasia sukses menghadapi pewawancara LPDP langsung dari awardee.',
    content: 'Wawancara adalah tahap krusial dalam seleksi beasiswa LPDP. Persiapan mental dan materi sangat dibutuhkan...',
    image: 'https://images.unsplash.com/photo-1557804506-669a67965ba0?auto=format&fit=crop&q=80&w=800',
    date: '2025-11-20',
    category: 'Wawancara',
    author: 'Admin Oppurtune'
  },
  {
    id: '2',
    title: 'Cara Menulis Essay Beasiswa yang Menarik',
    excerpt: 'Essay adalah cerminan diri Anda. Buat essay yang stand out dengan struktur ini.',
    content: 'Essay beasiswa haruslah personal namun profesional. Mulailah dengan hook yang menarik...',
    image: 'https://images.unsplash.com/photo-1455390582262-044cdead277a?auto=format&fit=crop&q=80&w=800',
    date: '2025-11-18',
    category: 'Persiapan Dokumen',
    author: 'Sarah Putri'
  },
  {
    id: '3',
    title: 'Kuliah di Inggris dengan Chevening',
    excerpt: 'Pengalaman seru kuliah S2 di UK dengan beasiswa penuh Chevening.',
    content: 'Inggris menawarkan pendidikan kelas dunia. Chevening membuka pintu bagi pemimpin masa depan...',
    image: 'https://images.unsplash.com/photo-1513635269975-59663e0ac1ad?auto=format&fit=crop&q=80&w=800',
    date: '2025-11-15',
    category: 'Cerita Sukses',
    author: 'Budi Santoso'
  },
  {
    id: '4',
    title: 'Strategi Mendapatkan LoA Unconditional',
    excerpt: 'Langkah demi langkah mendapatkan Letter of Acceptance dari kampus impian.',
    content: 'LoA adalah syarat utama banyak beasiswa. Jangan tunda pendaftaran kampus...',
    image: 'https://images.unsplash.com/photo-1523050854058-8df90110c9f1?auto=format&fit=crop&q=80&w=800',
    date: '2025-11-10',
    category: 'Persiapan Dokumen',
    author: 'Admin Oppurtune'
  }
];

// Data Dummy Team
export const teamMembers: TeamMember[] = [
  {
    id: '1',
    name: 'Fathi Cardiana',
    role: 'CEO & Founder',
    bio: 'Visioner di balik Oppurtune, berdedikasi untuk mendemokratisasi akses informasi pendidikan.',
    image: 'https://images.unsplash.com/photo-1560250097-0b93528c311a?auto=format&fit=crop&q=80&w=400'
  },
  {
    id: '2',
    name: 'Sarah Johnson',
    role: 'Head of Content',
    bio: 'Ahli strategi konten dengan pengalaman 10 tahun di bidang edukasi.',
    image: 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&q=80&w=400'
  },
  {
    id: '3',
    name: 'Michael Chen',
    role: 'Lead Developer',
    bio: 'Fullstack developer yang memastikan platform berjalan lancar dan aman.',
    image: 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?auto=format&fit=crop&q=80&w=400'
  }
];

// Data Dummy Pengguna
export const initialUsers: User[] = [
  {
    id: 'u1',
    name: 'Budi Santoso',
    email: 'budi@example.com',
    password: 'user123',
    role: 'user'
  },
  {
    id: 'u2',
    name: 'Siti Aminah',
    email: 'siti@example.com',
    password: 'user456',
    role: 'user'
  }
];