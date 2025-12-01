<div class="min-h-screen bg-white pt-20 pb-12">
    <article class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">

        <a href="<?php echo base_url('articles'); ?>"
            class="mb-8 inline-flex items-center text-gray-500 hover:text-primary transition group">
            <i data-lucide="arrow-left" class="mr-2 w-5 h-5 group-hover:-translate-x-1 transition-transform"></i>
            Kembali ke Daftar Artikel
        </a>

        <!-- Header -->
        <header class="mb-10">
            <div class="flex items-center space-x-2 mb-4">
                <span class="bg-blue-100 text-primary px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wide">
                    <?php echo $article['category']; ?>
                </span>
            </div>
            <h1 class="text-3xl sm:text-4xl md:text-5xl font-extrabold text-gray-900 mb-6 leading-tight">
                <?php echo $article['title']; ?>
            </h1>

            <div class="flex items-center justify-between border-b border-gray-100 pb-8">
                <div class="flex items-center space-x-6">
                    <div class="flex items-center text-gray-500 text-sm">
                        <i data-lucide="user" class="mr-2 w-4 h-4"></i>
                        <span class="font-medium text-gray-900"><?php echo $article['author']; ?></span>
                    </div>
                    <div class="flex items-center text-gray-500 text-sm">
                        <i data-lucide="calendar" class="mr-2 w-4 h-4"></i>
                        <span><?php echo date('d/m/Y', strtotime($article['date'])); ?></span>
                    </div>
                </div>
                <button class="text-gray-400 hover:text-primary transition">
                    <i data-lucide="share-2" class="w-5 h-5"></i>
                </button>
            </div>
        </header>

        <!-- Featured Image -->
        <div class="mb-10 rounded-2xl overflow-hidden shadow-lg">
            <img src="<?php echo $article['image']; ?>" alt="<?php echo $article['title']; ?>"
                class="w-full h-auto object-cover" />
        </div>

        <!-- Content -->
        <div class="prose prose-lg prose-blue max-w-none text-gray-700">
            <p class="lead text-xl text-gray-600 mb-8 font-light">
                <?php echo $article['excerpt']; ?>
            </p>
            <p>
                <?php echo nl2br($article['content']); ?>
            </p>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                ex ea commodo consequat.
            </p>
            <h3>Poin Penting</h3>
            <ul>
                <li>Persiapkan dokumen jauh-jauh hari.</li>
                <li>Riset mendalam tentang universitas tujuan.</li>
                <li>Latihan wawancara dengan teman atau mentor.</li>
            </ul>
            <p>
                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
                laborum.
            </p>
        </div>

    </article>
</div>