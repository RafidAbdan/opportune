<div class="min-h-screen flex flex-col items-center justify-center bg-gray-50 px-4">
    <div class="bg-white p-8 rounded-2xl shadow-xl w-full max-w-md border border-gray-100">
        <div class="text-center mb-8">
            <a href="<?php echo base_url(); ?>"
                class="inline-flex items-center justify-center space-x-2 text-primary mb-4">
                <i data-lucide="graduation-cap" class="w-10 h-10"></i>
                <span class="text-3xl font-bold">Oppurtune</span>
            </a>
            <h2 class="text-xl font-semibold text-gray-700">Buat Akun Baru</h2>
            <p class="text-gray-500 text-sm mt-2">Daftar untuk mulai mencari beasiswa impianmu.</p>
        </div>

        <?php echo validation_errors('<div class="bg-red-100 text-red-600 text-sm p-3 rounded-lg mb-4 text-center">', '</div>'); ?>

        <form action="<?php echo base_url('auth/process_register'); ?>" method="post" class="space-y-5">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                <input type="text" name="name" required
                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition"
                    placeholder="Nama Lengkap" value="<?php echo set_value('name'); ?>" />
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                <input type="email" name="email" required
                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition"
                    placeholder="nama@email.com" value="<?php echo set_value('email'); ?>" />
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <input type="password" name="password" required
                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition"
                    placeholder="••••••••" />
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Password</label>
                <input type="password" name="confirm_password" required
                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition"
                    placeholder="••••••••" />
            </div>

            <button type="submit"
                class="w-full bg-primary text-white font-bold py-3 rounded-lg hover:bg-blue-900 transition shadow-lg">
                Daftar
            </button>
        </form>

        <div class="mt-8 text-center text-sm text-gray-500">
            Sudah punya akun? <a href="<?php echo base_url('login'); ?>"
                class="text-primary font-bold hover:underline">Masuk Sekarang</a>
        </div>
    </div>
</div>