<div class="min-h-screen bg-gray-50 pt-20 pb-12">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

        <a href="<?php echo base_url('programs'); ?>"
            class="mb-6 inline-flex items-center text-gray-600 hover:text-primary transition">
            <i data-lucide="arrow-left" class="mr-2 w-5 h-5"></i> Kembali
        </a>

        <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
            <!-- Hero Image -->
            <div class="relative h-64 sm:h-80">
                <img src="<?php echo $scholarship['image']; ?>" alt="<?php echo $scholarship['title']; ?>"
                    class="w-full h-full object-cover" />
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent flex items-end">
                    <div class="p-8 text-white">
                        <div class="flex items-center space-x-2 mb-2">
                            <span class="bg-blue-600 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wide">
                                <?php echo $scholarship['category']; ?>
                            </span>
                            <span
                                class="bg-white/20 backdrop-blur-sm px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wide">
                                <?php echo $scholarship['field']; ?>
                            </span>
                        </div>
                        <h1 class="text-3xl sm:text-4xl font-bold mb-2"><?php echo $scholarship['title']; ?></h1>
                        <p class="text-lg text-blue-100 flex items-center">
                            <i data-lucide="globe" class="mr-2 w-4 h-4"></i> <?php echo $scholarship['provider']; ?>
                        </p>
                    </div>
                </div>
            </div>

            <div class="p-8">
                <!-- Key Info Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-8 border-b border-gray-100 pb-8">
                    <div class="flex items-start">
                        <div class="bg-blue-50 p-3 rounded-lg text-primary mr-4">
                            <i data-lucide="calendar" class="w-6 h-6"></i>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Deadline</p>
                            <p class="font-bold text-gray-900">
                                <?php echo date('d/m/Y', strtotime($scholarship['deadline'])); ?>
                            </p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="bg-blue-50 p-3 rounded-lg text-primary mr-4">
                            <i data-lucide="award" class="w-6 h-6"></i>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Jenjang</p>
                            <p class="font-bold text-gray-900"><?php echo $scholarship['degree']; ?></p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="bg-blue-50 p-3 rounded-lg text-primary mr-4">
                            <i data-lucide="book-open" class="w-6 h-6"></i>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Tipe Pendanaan</p>
                            <p class="font-bold text-gray-900">Full Funded</p>
                        </div>
                    </div>
                </div>

                <!-- Description -->
                <div class="mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">Tentang Beasiswa</h2>
                    <p class="text-gray-600 leading-relaxed text-lg">
                        <?php echo $scholarship['description']; ?>
                    </p>
                    <p class="text-gray-600 leading-relaxed mt-4">
                        Program ini dirancang untuk memberikan kesempatan kepada individu berbakat yang memiliki potensi
                        kepemimpinan yang kuat dan prestasi akademik yang unggul. Penerima beasiswa akan mendapatkan
                        akses ke jaringan alumni global dan berbagai peluang pengembangan diri.
                    </p>
                </div>

                <!-- Requirements (Dummy) -->
                <div class="mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">Persyaratan Pendaftaran</h2>
                    <ul class="space-y-3">
                        <?php
                        $requirements = [
                            "Warga Negara Indonesia (WNI)",
                            "Usia maksimal 35 tahun pada saat mendaftar",
                            "IPK minimal 3.00 (skala 4.00)",
                            "Memiliki sertifikat kemampuan bahasa Inggris (TOEFL/IELTS)",
                            "Sehat jasmani dan rohani",
                            "Tidak sedang menerima beasiswa lain"
                        ];
                        foreach ($requirements as $req):
                            ?>
                            <li class="flex items-start">
                                <i data-lucide="check-circle" class="text-green-500 mr-3 mt-0.5 w-5 h-5 flex-shrink-0"></i>
                                <span class="text-gray-700"><?php echo $req; ?></span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row gap-4 pt-4 border-t border-gray-100">
                    <?php if ($this->session->flashdata('success')): ?>
                        <div class="w-full bg-green-100 text-green-700 p-3 rounded mb-4 text-center">
                            <?php echo $this->session->flashdata('success'); ?>
                        </div>
                    <?php endif; ?>
                    <?php if ($this->session->flashdata('error')): ?>
                        <div class="w-full bg-red-100 text-red-700 p-3 rounded mb-4 text-center">
                            <?php echo $this->session->flashdata('error'); ?>
                        </div>
                    <?php endif; ?>

                    <?php if (isset($has_applied) && $has_applied): ?>
                        <button disabled
                            class="flex-1 bg-green-600 text-white font-bold py-4 rounded-xl shadow-lg flex items-center justify-center cursor-not-allowed opacity-75">
                            Sudah Mendaftar <i data-lucide="check-circle" class="ml-2 w-5 h-5"></i>
                        </button>
                    <?php else: ?>
                        <a href="<?php echo base_url('programs/apply/' . $scholarship['id']); ?>"
                            class="flex-1 bg-primary text-white font-bold py-4 rounded-xl hover:bg-blue-900 transition shadow-lg flex items-center justify-center">
                            Daftar Sekarang <i data-lucide="external-link" class="ml-2 w-5 h-5"></i>
                        </a>
                    <?php endif; ?>

                    <a href="<?php echo base_url('programs/toggle_favorite/' . $scholarship['id']); ?>"
                        class="flex-1 bg-white border-2 border-gray-200 text-gray-700 font-bold py-4 rounded-xl hover:bg-gray-50 transition flex items-center justify-center">
                        <?php if (isset($is_favorite) && $is_favorite): ?>
                            <span class="text-red-500 flex items-center">Tersimpan <i data-lucide="heart"
                                    class="ml-2 w-5 h-5 fill-current"></i></span>
                        <?php else: ?>
                            Simpan ke Favorit <i data-lucide="heart" class="ml-2 w-5 h-5"></i>
                        <?php endif; ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>