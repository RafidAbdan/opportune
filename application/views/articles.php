<div class="min-h-screen bg-gray-50 pt-20 pb-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Header -->
        <div class="text-center mb-12">
            <h1 class="text-3xl font-bold text-gray-900 sm:text-4xl">Artikel & Tips Beasiswa</h1>
            <p class="mt-4 text-xl text-gray-600 max-w-2xl mx-auto">
                Panduan lengkap, tips wawancara, dan cerita inspiratif dari para awardee untuk membantumu meraih impian.
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">

            <!-- Main Content - Article Grid -->
            <div class="lg:col-span-3">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <?php if (!empty($articles)): ?>
                        <?php foreach ($articles as $article): ?>
                            <div
                                class="bg-white rounded-xl shadow-sm overflow-hidden hover:shadow-md transition flex flex-col h-full">
                                <div class="relative h-48">
                                    <img src="<?php echo $article['image']; ?>" alt="<?php echo $article['title']; ?>"
                                        class="w-full h-full object-cover" />
                                    <div
                                        class="absolute top-4 left-4 bg-white/90 backdrop-blur-sm px-3 py-1 rounded-full text-xs font-bold text-primary shadow-sm">
                                        <?php echo $article['category']; ?>
                                    </div>
                                </div>
                                <div class="p-6 flex-1 flex flex-col">
                                    <div class="flex items-center text-xs text-gray-500 mb-3 space-x-4">
                                        <div class="flex items-center">
                                            <i data-lucide="calendar" class="mr-1 w-3.5 h-3.5"></i>
                                            <?php echo date('d/m/Y', strtotime($article['date'])); ?>
                                        </div>
                                        <div class="flex items-center">
                                            <i data-lucide="user" class="mr-1 w-3.5 h-3.5"></i>
                                            <?php echo $article['author']; ?>
                                        </div>
                                    </div>
                                    <h3 class="text-xl font-bold text-gray-900 mb-3 line-clamp-2 hover:text-primary transition">
                                        <a
                                            href="<?php echo base_url('articles/' . $article['id']); ?>"><?php echo $article['title']; ?></a>
                                    </h3>
                                    <p class="text-gray-600 text-sm mb-4 line-clamp-3 flex-1">
                                        <?php echo $article['excerpt']; ?>
                                    </p>
                                    <a href="<?php echo base_url('articles/' . $article['id']); ?>"
                                        class="inline-flex items-center text-primary font-semibold hover:text-blue-800 transition mt-auto">
                                        Baca Selengkapnya <i data-lucide="arrow-right" class="ml-2 w-4 h-4"></i>
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div
                            class="col-span-full text-center py-12 bg-white rounded-xl border border-dashed border-gray-300">
                            <p class="text-gray-500">Tidak ada artikel yang ditemukan.</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-1 space-y-8">

                <!-- Search Widget -->
                <div class="bg-white p-6 rounded-xl shadow-sm">
                    <h3 class="font-bold text-gray-900 mb-4">Cari Artikel</h3>
                    <div class="relative">
                        <input type="text" placeholder="Kata kunci..."
                            class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-primary focus:border-primary" />
                        <i data-lucide="search" class="absolute left-3 top-2.5 text-gray-400 w-4.5 h-4.5"></i>
                    </div>
                </div>

                <!-- Categories Widget -->
                <div class="bg-white p-6 rounded-xl shadow-sm">
                    <h3 class="font-bold text-gray-900 mb-4">Kategori</h3>
                    <ul class="space-y-2">
                        <li>
                            <button
                                class="w-full text-left px-3 py-2 rounded-lg transition flex items-center justify-between bg-blue-50 text-primary font-medium">
                                <span>Semua Kategori</span>
                                <span
                                    class="bg-gray-100 text-gray-500 text-xs px-2 py-0.5 rounded-full"><?php echo count($articles); ?></span>
                            </button>
                        </li>
                        <!-- Static categories for now, or dynamic from DB -->
                        <?php
                        $categories = array_unique(array_column($articles, 'category'));
                        foreach ($categories as $cat):
                            ?>
                            <li>
                                <button
                                    class="w-full text-left px-3 py-2 rounded-lg transition flex items-center justify-between text-gray-600 hover:bg-gray-50">
                                    <span><?php echo $cat; ?></span>
                                    <span class="bg-gray-100 text-gray-500 text-xs px-2 py-0.5 rounded-full">
                                        <?php
                                        $count = 0;
                                        foreach ($articles as $a) {
                                            if ($a['category'] == $cat)
                                                $count++;
                                        }
                                        echo $count;
                                        ?>
                                    </span>
                                </button>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <!-- Newsletter Widget (Dummy) -->
                <div class="bg-primary p-6 rounded-xl shadow-lg text-white">
                    <h3 class="font-bold text-lg mb-2">Newsletter</h3>
                    <p class="text-blue-100 text-sm mb-4">Dapatkan info beasiswa terbaru langsung di inboxmu.</p>
                    <input type="email" placeholder="Email kamu"
                        class="w-full px-4 py-2 rounded-lg text-gray-900 mb-2 focus:outline-none" />
                    <button
                        class="w-full bg-blue-800 hover:bg-blue-900 text-white font-bold py-2 rounded-lg transition">
                        Langganan
                    </button>
                </div>

            </div>
        </div>
    </div>
</div>