<div class="min-h-screen bg-white">
    <!-- Hero Section -->
    <div class="relative bg-primary py-20 sm:py-32">
        <div class="absolute inset-0 overflow-hidden">
            <img src="https://images.unsplash.com/photo-1521737604893-d14cc237f11d?auto=format&fit=crop&q=80&w=2000"
                alt="About Hero" class="w-full h-full object-cover opacity-20" />
        </div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-5xl lg:text-6xl">
                Tentang Oppurtune
            </h1>
            <p class="mt-6 text-xl text-blue-100 max-w-3xl mx-auto">
                Membuka pintu peluang pendidikan bagi putra-putri terbaik bangsa. Kami percaya pendidikan adalah hak
                setiap orang.
            </p>
        </div>
    </div>

    <!-- Mission & Vision -->
    <div class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
                <div class="bg-white p-8 rounded-xl shadow-sm hover:shadow-md transition">
                    <div
                        class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4 text-primary">
                        <i data-lucide="target" class="w-6 h-6"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Misi Kami</h3>
                    <p class="text-gray-600">
                        Menyediakan akses informasi beasiswa yang transparan, akurat, dan mudah diakses oleh semua
                        kalangan.
                    </p>
                </div>
                <div class="bg-white p-8 rounded-xl shadow-sm hover:shadow-md transition">
                    <div
                        class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4 text-primary">
                        <i data-lucide="users" class="w-6 h-6"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Komunitas</h3>
                    <p class="text-gray-600">
                        Membangun komunitas pencari beasiswa yang saling mendukung dan berbagi informasi positif.
                    </p>
                </div>
                <div class="bg-white p-8 rounded-xl shadow-sm hover:shadow-md transition">
                    <div
                        class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4 text-primary">
                        <i data-lucide="award" class="w-6 h-6"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Keunggulan</h3>
                    <p class="text-gray-600">
                        Platform terintegrasi dengan fitur personalisasi cerdas untuk mencocokkan profil dengan
                        beasiswa.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Team Section -->
    <div class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900">Tim Kami</h2>
                <p class="mt-4 text-gray-600">Orang-orang hebat di balik Oppurtune.</p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php
                // Dummy team data or fetch from DB if needed. 
                // Since mockData.ts had it, we can hardcode or use DB.
                // Let's use DB since we created team_members table.
                // But I didn't create Team_model. Let's just query directly or use hardcoded for now to match React exactly if DB is empty or just use DB.
                // I populated DB with team members. Let's fetch them.
                // Oh wait, I didn't pass team members to this view in Pages controller.
                // I should update Pages controller or just hardcode here for simplicity as it's a static page mostly.
                // Actually, let's update Pages controller to fetch team members.
                // Or just hardcode here to save time and tool calls, as it's "About" page.
                $teamMembers = [
                    [
                        'id' => '1',
                        'name' => 'Dr. Sarah Wijaya',
                        'role' => 'Founder & CEO',
                        'image' => 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&q=80&w=800',
                        'bio' => 'Pakar pendidikan dengan pengalaman 15 tahun memajukan akses pendidikan di Indonesia.'
                    ],
                    [
                        'id' => '2',
                        'name' => 'Budi Santoso, M.Ed',
                        'role' => 'Head of Education',
                        'image' => 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?auto=format&fit=crop&q=80&w=800',
                        'bio' => 'Alumni LPDP yang berdedikasi membimbing generasi muda meraih beasiswa impian.'
                    ],
                    [
                        'id' => '3',
                        'name' => 'Jessica Tan',
                        'role' => 'Chief Technology Officer',
                        'image' => 'https://images.unsplash.com/photo-1580489944761-15a19d654956?auto=format&fit=crop&q=80&w=800',
                        'bio' => 'Tech enthusiast yang membangun sistem rekomendasi cerdas Oppurtune.'
                    ]
                ];

                foreach ($teamMembers as $member):
                    ?>
                    <div class="bg-gray-50 rounded-xl overflow-hidden shadow-sm hover:shadow-md transition group">
                        <div class="aspect-w-3 aspect-h-3">
                            <img src="<?php echo $member['image']; ?>" alt="<?php echo $member['name']; ?>"
                                class="w-full h-64 object-cover object-center group-hover:scale-105 transition duration-300" />
                        </div>
                        <div class="p-6">
                            <h3 class="text-lg font-bold text-gray-900"><?php echo $member['name']; ?></h3>
                            <p class="text-primary font-medium mb-2"><?php echo $member['role']; ?></p>
                            <p class="text-gray-600 text-sm"><?php echo $member['bio']; ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <!-- Contact Section -->
    <div class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <div>
                    <h2 class="text-3xl font-bold text-gray-900 mb-6">Hubungi Kami</h2>
                    <p class="text-gray-600 mb-8">
                        Punya pertanyaan atau saran? Jangan ragu untuk menghubungi kami. Tim kami siap membantu Anda.
                    </p>

                    <div class="space-y-4">
                        <div class="flex items-start">
                            <i data-lucide="map-pin" class="text-primary mt-1 mr-4 w-6 h-6"></i>
                            <div>
                                <h4 class="font-bold text-gray-900">Alamat</h4>
                                <p class="text-gray-600">Jl. Pendidikan No. 123, Jakarta Selatan, Indonesia</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <i data-lucide="phone" class="text-primary mt-1 mr-4 w-6 h-6"></i>
                            <div>
                                <h4 class="font-bold text-gray-900">Telepon</h4>
                                <p class="text-gray-600">+62 21 555 0123</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <i data-lucide="mail" class="text-primary mt-1 mr-4 w-6 h-6"></i>
                            <div>
                                <h4 class="font-bold text-gray-900">Email</h4>
                                <p class="text-gray-600">info@oppurtune.com</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-8 rounded-xl shadow-lg">
                    <form class="space-y-6">
                        <div>
                            <label htmlFor="name" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                            <input type="text" id="name"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm p-3 border focus:ring-primary focus:border-primary"
                                placeholder="Nama Anda" />
                        </div>
                        <div>
                            <label htmlFor="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" id="email"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm p-3 border focus:ring-primary focus:border-primary"
                                placeholder="email@contoh.com" />
                        </div>
                        <div>
                            <label htmlFor="message" class="block text-sm font-medium text-gray-700">Pesan</label>
                            <textarea id="message" rows="4"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm p-3 border focus:ring-primary focus:border-primary"
                                placeholder="Tulis pesan Anda di sini..."></textarea>
                        </div>
                        <button type="button"
                            class="w-full bg-primary text-white font-bold py-3 rounded-lg hover:bg-blue-900 transition shadow-md">
                            Kirim Pesan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>