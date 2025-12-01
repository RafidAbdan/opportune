<div class="min-h-screen flex flex-col items-center justify-center bg-gray-50 px-4">
    <div class="bg-white p-8 rounded-2xl shadow-xl w-full max-w-md border border-gray-100">
        <div class="text-center mb-8">
            <a href="<?php echo base_url(); ?>"
                class="inline-flex items-center justify-center space-x-2 text-primary mb-4">
                <i data-lucide="graduation-cap" class="w-10 h-10"></i>
                <span class="text-3xl font-bold">Oppurtune</span>
            </a>
            <h2 class="text-xl font-semibold text-gray-700">Selamat Datang Kembali</h2>
            <p class="text-gray-500 text-sm mt-2">Masuk untuk mengakses fitur penuh.</p>
        </div>

        <?php if ($this->session->flashdata('error')): ?>
            <div class="bg-red-100 text-red-600 text-sm p-3 rounded-lg mb-4 text-center">
                <?php echo $this->session->flashdata('error'); ?>
            </div>
        <?php endif; ?>

        <?php echo validation_errors('<div class="bg-red-100 text-red-600 text-sm p-3 rounded-lg mb-4 text-center">', '</div>'); ?>

        <form action="<?php echo base_url('auth/login'); ?>" method="post" class="space-y-5">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                <input type="email" name="email" required
                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition"
                    placeholder="nama@email.com" />
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <input type="password" name="password" required
                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition"
                    placeholder="••••••••" />
            </div>

            <div class="flex items-center justify-between text-sm">
                <label class="flex items-center text-gray-600">
                    <input type="checkbox" class="mr-2 rounded text-primary focus:ring-primary" />
                    Ingat Saya
                </label>
                <a href="#" class="text-primary font-semibold hover:underline">Lupa Password?</a>
            </div>

            <button type="submit"
                class="w-full bg-primary text-white font-bold py-3 rounded-lg hover:bg-blue-900 transition shadow-lg">
                Masuk
            </button>
        </form>

        <div class="mt-8 text-center text-sm text-gray-500">
            Belum punya akun? <a href="<?php echo base_url('register'); ?>"
                class="text-primary font-bold hover:underline">Daftar Sekarang</a>
        </div>

        <div class="mt-6 p-4 bg-blue-50 rounded text-xs text-gray-600">
            <p><strong>Demo Credentials:</strong></p>
            <p>User: budi@example.com / user123</p>
            <p>Admin: admin@admin.com / admin123</p>
        </div>
    </div>
</div>