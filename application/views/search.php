<div class="min-h-screen bg-gray-50 pb-20">

    <!-- Header Pencarian -->
    <div class="bg-primary pt-12 pb-24 px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto text-center">
            <h1 class="text-3xl md:text-4xl font-bold text-white mb-6">Peluang Terbaik Menantimu</h1>
            <div class="relative">
                <form action="<?php echo base_url('search'); ?>" method="get">
                    <input type="text" name="q" placeholder="Cari beasiswa (contoh: Bakti BCA, LPDP...)"
                        class="w-full pl-12 pr-4 py-4 rounded-full shadow-lg focus:outline-none focus:ring-4 focus:ring-blue-500/30 text-gray-800"
                        value="<?php echo $this->input->get('q'); ?>" />
                    <i data-lucide="search"
                        class="absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400 w-5 h-5"></i>
                </form>
            </div>
        </div>
    </div>

    <!-- Konten Utama - Offset ke atas -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-16">

        <!-- Box Personalisasi (Fitur Premium) -->
        <div class="bg-white rounded-xl shadow-xl p-8 mb-12 border border-gray-100 relative overflow-hidden">
            <!-- Premium Badge (Hidden if unlocked, simulated with JS) -->
            <div id="premium-badge"
                class="absolute top-0 right-0 bg-yellow-400 text-yellow-900 text-xs font-bold px-3 py-1 rounded-bl-lg z-10 flex items-center">
                <i data-lucide="star" class="mr-1 w-3 h-3"></i> PREMIUM
            </div>

            <div class="flex items-center mb-6">
                <div class="bg-blue-100 p-3 rounded-full mr-4 text-primary">
                    <i data-lucide="filter" class="w-6 h-6"></i>
                </div>
                <div>
                    <h2 class="text-xl font-bold text-gray-900">Mulai Pencarian Personal</h2>
                    <p class="text-gray-500 text-sm">Sesuaikan pencarianmu dengan mengisi jenjang, jurusan, dan IPK
                        minimum.</p>
                </div>
            </div>

            <form id="personalization-form" class="grid grid-cols-1 md:grid-cols-4 gap-4 items-end">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Jenjang</label>
                    <select
                        class="w-full border-gray-300 rounded-md shadow-sm p-2 border bg-gray-50 focus:ring-primary focus:border-primary">
                        <option>S1 (Sarjana)</option>
                        <option>S2 (Magister)</option>
                        <option>D3 (Diploma)</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Jurusan</label>
                    <input type="text" placeholder="Cth: Informatika"
                        class="w-full border-gray-300 rounded-md shadow-sm p-2 border bg-gray-50 focus:ring-primary focus:border-primary" />
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">IPK Minimum</label>
                    <input type="number" step="0.01" placeholder="3.00"
                        class="w-full border-gray-300 rounded-md shadow-sm p-2 border bg-gray-50 focus:ring-primary focus:border-primary" />
                </div>
                <button type="submit"
                    class="bg-primary text-white font-bold py-2 px-4 rounded-md hover:bg-blue-900 transition w-full h-[42px]">
                    Cari Beasiswa
                </button>
            </form>
        </div>

        <!-- Modal Paywall -->
        <div id="paywall-modal"
            class="hidden fixed inset-0 z-[60] flex items-center justify-center bg-black bg-opacity-70 backdrop-blur-sm p-4">
            <div class="bg-white rounded-2xl max-w-md w-full p-8 relative animate-fade-in-up">
                <div
                    class="absolute -top-12 left-1/2 transform -translate-x-1/2 bg-yellow-400 p-4 rounded-full shadow-lg">
                    <i data-lucide="lock" class="text-white w-8 h-8"></i>
                </div>

                <div class="text-center mt-6">
                    <h3 class="text-2xl font-bold text-gray-900 mb-2">Buka Fitur Premium</h3>
                    <p class="text-gray-600 mb-6">
                        Dapatkan rekomendasi beasiswa yang dipersonalisasi khusus berdasarkan IPK dan jurusan Anda.
                        Tingkatkan peluang lolos hingga 80%!
                    </p>

                    <div class="bg-blue-50 p-4 rounded-lg mb-6 border border-blue-100">
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-gray-600">Paket Personalisasi</span>
                            <span class="text-gray-400 line-through">Rp 100.000</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="font-bold text-primary">Harga Promo</span>
                            <span class="text-2xl font-bold text-green-600">Rp 50.000</span>
                        </div>
                    </div>

                    <button id="pay-btn"
                        class="w-full bg-primary text-white font-bold py-3 rounded-xl hover:bg-blue-900 transition-colors shadow-lg mb-3">
                        Bayar Sekarang (Simulasi)
                    </button>
                    <button id="close-modal-btn" class="text-gray-400 text-sm hover:text-gray-600">
                        Nanti saja, terima kasih
                    </button>
                </div>
            </div>
        </div>

        <!-- Top Scholarships Available -->
        <div class="mb-16">
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-2xl font-bold text-gray-900">Top Scholarships Available</h2>
                <span class="text-sm text-gray-500"><?php echo count($scholarships); ?> Beasiswa Ditemukan</span>
            </div>

            <?php if (!empty($scholarships)): ?>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    <?php foreach ($scholarships as $scholarship): ?>
                        <?php $this->load->view('partials/scholarship_card', array('scholarship' => $scholarship)); ?>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <div class="text-center py-12 bg-white rounded-lg border border-dashed border-gray-300">
                    <p class="text-gray-500">Tidak ada beasiswa yang cocok dengan pencarian
                        "<?php echo $this->input->get('q'); ?>".</p>
                </div>
            <?php endif; ?>
        </div>

        <!-- Popular Categories -->
        <div class="mb-16">
            <h2 class="text-2xl font-bold text-gray-900 text-center mb-2">Popular Scholarship Categories</h2>
            <p class="text-gray-500 text-center mb-10">Browse scholarships by your field.</p>

            <div id="categories-grid"
                class="grid grid-cols-2 md:grid-cols-4 gap-6 transition-all duration-500 ease-in-out">
                <!-- Categories will be rendered by JS or PHP loop -->
                <?php
                $categories = [
                    ['name' => 'Health Science', 'icon' => 'heart-pulse', 'color' => 'red'],
                    ['name' => 'Technology', 'icon' => 'cpu', 'color' => 'blue'],
                    ['name' => 'Environmental', 'icon' => 'leaf', 'color' => 'green'],
                    ['name' => 'Arts', 'icon' => 'palette', 'color' => 'purple'],
                    ['name' => 'Business', 'icon' => 'briefcase', 'color' => 'orange'],
                    ['name' => 'Education', 'icon' => 'book', 'color' => 'yellow'],
                    ['name' => 'Social Sciences', 'icon' => 'users', 'color' => 'indigo'],
                    ['name' => 'General', 'icon' => 'globe', 'color' => 'teal'],
                ];
                // Initially show 4
                foreach (array_slice($categories, 0, 4) as $cat):
                    ?>
                    <div
                        class="bg-white p-6 rounded-xl shadow-sm hover:shadow-lg transition text-center cursor-pointer group">
                        <div
                            class="w-16 h-16 bg-<?php echo $cat['color']; ?>-100 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-<?php echo $cat['color']; ?>-200 transition">
                            <i data-lucide="<?php echo $cat['icon']; ?>"
                                class="text-<?php echo $cat['color']; ?>-600 w-8 h-8"></i>
                        </div>
                        <h3 class="font-semibold text-gray-800"><?php echo $cat['name']; ?></h3>
                    </div>
                <?php endforeach; ?>

                <!-- Hidden categories -->
                <?php foreach (array_slice($categories, 4) as $cat): ?>
                    <div
                        class="hidden-category hidden bg-white p-6 rounded-xl shadow-sm hover:shadow-lg transition text-center cursor-pointer group">
                        <div
                            class="w-16 h-16 bg-<?php echo $cat['color']; ?>-100 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-<?php echo $cat['color']; ?>-200 transition">
                            <i data-lucide="<?php echo $cat['icon']; ?>"
                                class="text-<?php echo $cat['color']; ?>-600 w-8 h-8"></i>
                        </div>
                        <h3 class="font-semibold text-gray-800"><?php echo $cat['name']; ?></h3>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="text-center mt-8">
                <button id="toggle-categories-btn"
                    class="bg-black text-white px-8 py-3 rounded-full font-medium hover:bg-gray-800 transition flex items-center mx-auto">
                    View All Categories <i data-lucide="chevron-down" class="ml-2 w-4 h-4"></i>
                </button>
            </div>
        </div>

    </div>
</div>

<script>
    // Paywall Logic
    const form = document.getElementById('personalization-form');
    const modal = document.getElementById('paywall-modal');
    const closeBtn = document.getElementById('close-modal-btn');
    const payBtn = document.getElementById('pay-btn');
    const badge = document.getElementById('premium-badge');
    let isPremium = false;

    form.addEventListener('submit', (e) => {
        e.preventDefault();
        if (!isPremium) {
            modal.classList.remove('hidden');
        } else {
            alert("Filter personalisasi diterapkan! (Demo)");
        }
    });

    closeBtn.addEventListener('click', () => {
        modal.classList.add('hidden');
    });

    payBtn.addEventListener('click', () => {
        if (confirm("Simulasi: Lanjutkan pembayaran?")) {
            isPremium = true;
            modal.classList.add('hidden');
            if (badge) badge.style.display = 'none';
            alert("Pembayaran Berhasil! Fitur personalisasi aktif.");
        }
    });

    // Categories Toggle
    const toggleBtn = document.getElementById('toggle-categories-btn');
    const hiddenCats = document.querySelectorAll('.hidden-category');
    let expanded = false;

    toggleBtn.addEventListener('click', () => {
        expanded = !expanded;
        hiddenCats.forEach(cat => {
            if (expanded) cat.classList.remove('hidden');
            else cat.classList.add('hidden');
        });

        const icon = toggleBtn.querySelector('i');
        if (expanded) {
            toggleBtn.innerHTML = 'Show Less <i data-lucide="chevron-up" class="ml-2 w-4 h-4"></i>';
        } else {
            toggleBtn.innerHTML = 'View All Categories <i data-lucide="chevron-down" class="ml-2 w-4 h-4"></i>';
        }
        lucide.createIcons();
    });
</script>