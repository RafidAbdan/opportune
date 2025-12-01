<footer class="bg-[#0A1640] text-white pt-16 pb-8 mt-auto">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-12">

            <!-- Kolom 1: Brand -->
            <div class="col-span-1 md:col-span-1">
                <div class="flex items-center space-x-2 mb-4">
                    <i data-lucide="graduation-cap" class="h-8 w-8 text-secondary"></i>
                    <span class="text-2xl font-bold tracking-wide">Oppurtune</span>
                </div>
                <p class="text-gray-400 text-sm leading-relaxed mb-6">
                    Platform terpercaya untuk menemukan ribuan beasiswa S1, S2, dan S3 baik di dalam maupun luar negeri.
                    Wujudkan mimpi pendidikan Anda bersama kami.
                </p>
                <div class="flex space-x-4">
                    <a href="#" class="text-gray-400 hover:text-white transition"><i data-lucide="twitter"
                            class="w-5 h-5"></i></a>
                    <a href="#" class="text-gray-400 hover:text-white transition"><i data-lucide="facebook"
                            class="w-5 h-5"></i></a>
                    <a href="#" class="text-gray-400 hover:text-white transition"><i data-lucide="instagram"
                            class="w-5 h-5"></i></a>
                </div>
            </div>

            <!-- Kolom 2: Tautan Cepat -->
            <div>
                <h3 class="text-lg font-semibold mb-6 text-tertiary">Tautan Cepat</h3>
                <ul class="space-y-3 text-gray-400 text-sm">
                    <li><a href="<?php echo base_url(); ?>" class="hover:text-secondary transition">Home</a></li>
                    <li><a href="<?php echo base_url('search'); ?>" class="hover:text-secondary transition">Cari
                            Beasiswa</a></li>
                    <li><a href="<?php echo base_url('programs'); ?>"
                            class="hover:text-secondary transition">Program</a></li>
                    <li><a href="<?php echo base_url('articles'); ?>" class="hover:text-secondary transition">Artikel &
                            Tips</a></li>
                </ul>
            </div>

            <!-- Kolom 3: Perusahaan -->
            <div>
                <h3 class="text-lg font-semibold mb-6 text-tertiary">Perusahaan</h3>
                <ul class="space-y-3 text-gray-400 text-sm">
                    <li><a href="<?php echo base_url('about'); ?>" class="hover:text-secondary transition">Tentang
                            Kami</a></li>
                    <li><a href="#" class="hover:text-secondary transition">Karir</a></li>
                    <li><a href="#" class="hover:text-secondary transition">Kebijakan Privasi</a></li>
                    <li><a href="#" class="hover:text-secondary transition">Syarat & Ketentuan</a></li>
                </ul>
            </div>

            <!-- Kolom 4: Kontak -->
            <div>
                <h3 class="text-lg font-semibold mb-6 text-tertiary">Hubungi Kami</h3>
                <ul class="space-y-4 text-gray-400 text-sm">
                    <li class="flex items-start">
                        <i data-lucide="mail" class="mr-3 mt-1 text-secondary w-5 h-5"></i>
                        <span>support@oppurtune.com</span>
                    </li>
                    <li class="flex items-start">
                        <i data-lucide="phone" class="mr-3 mt-1 text-secondary w-5 h-5"></i>
                        <span>+62 812 3456 7890</span>
                    </li>
                    <li class="text-xs text-gray-500 mt-4">
                        Jakarta Selatan, DKI Jakarta<br />Indonesia
                    </li>
                </ul>
            </div>
        </div>

        <div
            class="border-t border-gray-800 pt-8 flex flex-col md:flex-row justify-between items-center text-sm text-gray-500">
            <p>&copy; 2025 Oppurtune. All rights reserved.</p>
            <div class="flex space-x-6 mt-4 md:mt-0">
                <a href="#" class="hover:text-white">Privacy</a>
                <a href="#" class="hover:text-white">Terms</a>
                <a href="#" class="hover:text-white">Sitemap</a>
            </div>
        </div>
    </div>
</footer>

<!-- Initialize Lucide Icons -->
<script>
    lucide.createIcons();
</script>
</body>

</html>