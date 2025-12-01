<div class="min-h-screen">
    <!-- --- Hero Section --- -->
    <section class="relative bg-primary text-white py-24 lg:py-32 overflow-hidden">
        <!-- Dekorasi Latar Belakang -->
        <div
            class="absolute top-0 right-0 -mr-20 -mt-20 w-96 h-96 bg-blue-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob">
        </div>
        <div
            class="absolute bottom-0 left-0 -ml-20 -mb-20 w-96 h-96 bg-secondary rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-2000">
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center max-w-3xl mx-auto">
                <h1 class="text-4xl md:text-6xl font-extrabold mb-6 leading-tight">
                    Let's Find Your Dream <span class="text-secondary">Scholarship</span>, Together!
                </h1>
                <p class="text-lg md:text-xl text-blue-200 mb-10 leading-relaxed">
                    Kami menghadirkan informasi beasiswa terpercaya yang tidak hanya memberi peluang pendidikan,
                    tetapi juga membuka pengalaman nyata untuk meraih masa depan yang cerah.
                </p>

                <div class="flex flex-col sm:flex-row justify-center gap-4">
                    <a href="<?php echo base_url('search'); ?>"
                        class="inline-flex items-center justify-center px-8 py-4 text-base font-bold rounded-full text-primary bg-secondary hover:bg-white hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
                        <i data-lucide="search" class="mr-2 w-5 h-5"></i>
                        Cari Beasiswa Sekarang
                    </a>
                    <a href="<?php echo base_url('about'); ?>"
                        class="inline-flex items-center justify-center px-8 py-4 text-base font-bold rounded-full text-white border-2 border-white hover:bg-white hover:text-primary transition-all duration-300">
                        Tentang Kami
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- --- Value Proposition --- -->
    <section class="py-16 bg-blue-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-md transition">
                    <div class="bg-blue-100 w-12 h-12 rounded-lg flex items-center justify-center text-primary mb-4">
                        <i data-lucide="search" class="w-6 h-6"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Pencarian Tepat</h3>
                    <p class="text-gray-600">Algoritma cerdas kami menyesuaikan profil Anda dengan beasiswa yang paling
                        relevan.</p>
                </div>
                <div class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-md transition">
                    <div class="bg-blue-100 w-12 h-12 rounded-lg flex items-center justify-center text-primary mb-4">
                        <i data-lucide="check-circle" class="w-6 h-6"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Panduan Lengkap</h3>
                    <p class="text-gray-600">Mulai dari persyaratan hingga tips wawancara, kami memandu setiap langkah
                        Anda.</p>
                </div>
                <div class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-md transition">
                    <div class="bg-blue-100 w-12 h-12 rounded-lg flex items-center justify-center text-primary mb-4">
                        <i data-lucide="arrow-right" class="w-6 h-6"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Kisah Sukses</h3>
                    <p class="text-gray-600">Dapatkan wawasan berharga dari para awardee yang telah berhasil meraih
                        mimpi mereka.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- --- Featured Scholarships --- -->
    <section class="py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-end mb-12">
                <div>
                    <span class="text-primary font-bold tracking-wider uppercase text-sm">Pilihan Terbaik</span>
                    <h2 class="text-3xl font-bold text-gray-900 mt-2">Beasiswa Unggulan Minggu Ini</h2>
                </div>
                <a href="<?php echo base_url('search'); ?>"
                    class="hidden md:flex items-center text-primary font-semibold hover:text-blue-800">
                    Lihat Semua <i data-lucide="arrow-right" class="ml-2 w-5 h-5"></i>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php foreach ($scholarships as $scholarship): ?>
                    <?php $this->load->view('partials/scholarship_card', array('scholarship' => $scholarship)); ?>
                <?php endforeach; ?>
            </div>

            <div class="mt-12 text-center md:hidden">
                <a href="<?php echo base_url('search'); ?>"
                    class="inline-block bg-primary text-white px-6 py-3 rounded-lg font-bold hover:bg-blue-900 transition">Lihat
                    Semua Beasiswa</a>
            </div>
        </div>
    </section>

    <!-- --- Testimonials --- -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-center text-primary mb-16">Kisah Sukses Para Awardee</h2>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white p-8 rounded-xl shadow-md border-t-4 border-secondary">
                    <div class="flex items-center mb-6">
                        <img src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?auto=format&fit=crop&w=150&q=80"
                            alt="User" class="w-12 h-12 rounded-full mr-4" />
                        <div>
                            <h4 class="font-bold text-gray-900">Andi Pratama</h4>
                            <p class="text-xs text-gray-500">Awardee Beasiswa LPDP</p>
                        </div>
                    </div>
                    <p class="text-gray-600 italic">"Oppurtune sangat membantu saya menemukan informasi beasiswa yang
                        tersebar. Fitur filterisasinya sangat akurat!"</p>
                </div>

                <div class="bg-white p-8 rounded-xl shadow-md border-t-4 border-secondary">
                    <div class="flex items-center mb-6">
                        <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?auto=format&fit=crop&w=150&q=80"
                            alt="User" class="w-12 h-12 rounded-full mr-4" />
                        <div>
                            <h4 class="font-bold text-gray-900">Rina Oktaviani</h4>
                            <p class="text-xs text-gray-500">Awardee GKS Korea</p>
                        </div>
                    </div>
                    <p class="text-gray-600 italic">"Saya hampir menyerah mencari beasiswa ke Korea sampai saya
                        menemukan panduan lengkap di sini. Terima kasih Oppurtune!"</p>
                </div>

                <div class="bg-white p-8 rounded-xl shadow-md border-t-4 border-secondary">
                    <div class="flex items-center mb-6">
                        <img src="https://images.unsplash.com/photo-1599566150163-29194dcaad36?auto=format&fit=crop&w=150&q=80"
                            alt="User" class="w-12 h-12 rounded-full mr-4" />
                        <div>
                            <h4 class="font-bold text-gray-900">Fahri Alamsyah</h4>
                            <p class="text-xs text-gray-500">Awardee Djarum Plus</p>
                        </div>
                    </div>
                    <p class="text-gray-600 italic">"Fitur personalisasinya worth it banget. Langsung dapet rekomendasi
                        yang pas sama IPK aku."</p>
                </div>
            </div>
        </div>
    </section>
</div>