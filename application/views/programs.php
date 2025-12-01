<div class="min-h-screen bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-12">
            <h1 class="text-3xl font-bold text-gray-900">Program Beasiswa Tersedia</h1>
            <p class="mt-4 text-gray-600">Temukan daftar lengkap peluang pendidikan di sini.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php foreach ($scholarships as $scholarship): ?>
                <?php $this->load->view('partials/scholarship_card', array('scholarship' => $scholarship)); ?>
            <?php endforeach; ?>
        </div>
    </div>
</div>