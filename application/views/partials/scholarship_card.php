<div
    class="bg-white rounded-xl shadow-md hover:shadow-xl transition-shadow duration-300 overflow-hidden flex flex-col h-full border border-gray-100">
    <!-- Gambar Header -->
    <div class="h-48 overflow-hidden relative group">
        <img src="<?php echo $scholarship['image']; ?>" alt="<?php echo $scholarship['title']; ?>"
            class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500" />
        <div class="absolute top-4 right-4 bg-primary text-white text-xs font-bold px-3 py-1 rounded-full shadow-md">
            <?php echo $scholarship['category']; ?>
        </div>
    </div>

    <!-- Konten -->
    <div class="p-6 flex-grow flex flex-col">
        <div class="mb-4">
            <p class="text-sm text-blue-600 font-semibold mb-1"><?php echo $scholarship['provider']; ?></p>
            <h3 class="text-xl font-bold text-gray-800 leading-tight mb-2 line-clamp-2">
                <?php echo $scholarship['title']; ?></h3>
            <p class="text-gray-600 text-sm line-clamp-3 mb-4 flex-grow">
                <?php echo $scholarship['description']; ?>
            </p>
        </div>

        <!-- Info Tambahan -->
        <div class="flex items-center justify-between text-xs text-gray-500 border-t pt-4 mt-auto">
            <div class="flex items-center" title="Jenjang">
                <i data-lucide="award" class="mr-1 text-primary w-3.5 h-3.5"></i>
                <span><?php echo $scholarship['degree']; ?></span>
            </div>
            <div class="flex items-center" title="Batas Waktu">
                <i data-lucide="calendar" class="mr-1 text-red-500 w-3.5 h-3.5"></i>
                <span><?php echo date('d/m/Y', strtotime($scholarship['deadline'])); ?></span>
            </div>
        </div>

        <a href="<?php echo base_url('programs/' . $scholarship['id']); ?>"
            class="mt-4 block w-full text-center bg-transparent border-2 border-primary text-primary hover:bg-primary hover:text-white font-semibold py-2 rounded-lg transition-colors duration-300">
            Lihat Detail
        </a>
    </div>
</div>