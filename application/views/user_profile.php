<div class="min-h-screen bg-gray-50 py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Page Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Profil Saya</h1>
            <p class="mt-2 text-gray-600">Kelola informasi akun dan lihat beasiswa yang tersimpan.</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            <!-- Sidebar / Profile Card -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                    <div class="flex items-center space-x-4 mb-6">
                        <div class="bg-primary/10 p-3 rounded-full">
                            <i data-lucide="user" class="w-8 h-8 text-primary"></i>
                        </div>
                        <div>
                            <h2 class="text-xl font-bold text-gray-900"><?php echo $user['name']; ?></h2>
                            <p class="text-sm text-gray-500"><?php echo $user['email']; ?></p>
                        </div>
                    </div>

                    <div class="space-y-1">
                        <button onclick="switchTab('profile')" id="btn-profile"
                            class="w-full flex items-center space-x-3 px-4 py-3 rounded-lg text-left transition bg-primary text-white">
                            <i data-lucide="settings" class="w-5 h-5"></i>
                            <span class="font-medium">Pengaturan Akun</span>
                        </button>
                        <button onclick="switchTab('wishlist')" id="btn-wishlist"
                            class="w-full flex items-center space-x-3 px-4 py-3 rounded-lg text-left text-gray-600 hover:bg-gray-50 transition">
                            <i data-lucide="heart" class="w-5 h-5"></i>
                            <span class="font-medium">Beasiswa Tersimpan</span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="lg:col-span-2">

                <!-- Flash Messages -->
                <?php if ($this->session->flashdata('success')): ?>
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6"
                        role="alert">
                        <span class="block sm:inline"><?php echo $this->session->flashdata('success'); ?></span>
                    </div>
                <?php endif; ?>
                
                <?php if ($this->session->flashdata('error')): ?>
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-6"
                        role="alert">
                        <span class="block sm:inline"><?php echo $this->session->flashdata('error'); ?></span>
                    </div>
                <?php endif; ?>

                <!-- Wishlist Tab -->
                <div id="tab-wishlist" class="hidden">
                    <?php if (empty($favorites)): ?>
                        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-12 text-center">
                            <div class="bg-gray-50 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                                <i data-lucide="heart-off" class="w-8 h-8 text-gray-400"></i>
                            </div>
                            <h4 class="text-lg font-medium text-gray-900">Belum ada beasiswa tersimpan</h4>
                            <p class="text-gray-500 mt-2 mb-6">Simpan beasiswa yang menarik untuk dilihat nanti.</p>
                            <a href="<?php echo base_url('programs'); ?>" class="text-primary font-bold hover:underline">Cari
                                Beasiswa</a>
                        </div>
                    <?php else: ?>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <?php foreach ($favorites as $scholarship): ?>
                                <div
                                    class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition group">
                                    <div class="relative h-40 overflow-hidden">
                                        <img src="<?php echo $scholarship['image']; ?>" alt="<?php echo $scholarship['title']; ?>"
                                            class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                                        <div class="absolute top-4 right-4">
                                            <span
                                                class="bg-white/90 backdrop-blur text-xs font-bold px-3 py-1 rounded-full text-primary shadow-sm">
                                                <?php echo $scholarship['category']; ?>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="p-5">
                                        <h4 class="font-bold text-gray-900 mb-1 line-clamp-1">
                                            <?php echo $scholarship['title']; ?>
                                        </h4>
                                        <p class="text-sm text-gray-500 mb-4"><?php echo $scholarship['provider']; ?></p>
    
                                        <div class="flex items-center justify-between mt-4 pt-4 border-t border-gray-50">
                                            <a href="<?php echo base_url('programs/' . $scholarship['id']); ?>"
                                                class="text-sm font-medium text-primary hover:underline">
                                                Lihat Detail
                                            </a>
                                            <a href="<?php echo base_url('programs/toggle_favorite/' . $scholarship['id']); ?>"
                                                class="text-red-500 hover:text-red-700" title="Hapus dari favorit">
                                                <i data-lucide="trash-2" class="w-5 h-5"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Profile Settings Tab -->
                <div id="tab-profile">
                    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-6">Pengaturan Akun</h3>

                        <?php echo form_open_multipart('user/updateProfile'); ?>
                        
                        <!-- Photo Upload -->
                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Foto Profil</label>
                            <div class="flex items-center space-x-6">
                                <div class="shrink-0">
                                    <?php if (isset($user['photo']) && $user['photo']): ?>
                                        <img class="h-16 w-16 object-cover rounded-full" 
                                             src="<?php echo base_url('uploads/profile_pics/' . $user['photo']); ?>" 
                                             alt="Current profile photo">
                                    <?php else: ?>
                                        <div class="h-16 w-16 rounded-full bg-gray-200 flex items-center justify-center">
                                            <i data-lucide="user" class="w-8 h-8 text-gray-400"></i>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <label class="block">
                                    <span class="sr-only">Choose profile photo</span>
                                    <input type="file" name="photo" accept="image/*"
                                        class="block w-full text-sm text-slate-500
                                        file:mr-4 file:py-2 file:px-4
                                        file:rounded-full file:border-0
                                        file:text-sm file:font-semibold
                                        file:bg-primary/10 file:text-primary
                                        hover:file:bg-primary/20
                                    "/>
                                </label>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 gap-6">
                            <!-- Name -->
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                                <input type="text" name="name" id="name" 
                                    value="<?php echo set_value('name', $user['name']); ?>"
                                    class="w-full rounded-lg border-gray-300 focus:border-primary focus:ring-primary shadow-sm"
                                    required>
                                <?php echo form_error('name', '<p class="text-red-500 text-xs mt-1">', '</p>'); ?>
                            </div>

                            <!-- Email -->
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Alamat Email</label>
                                <input type="email" name="email" id="email" 
                                    value="<?php echo set_value('email', $user['email']); ?>"
                                    class="w-full rounded-lg border-gray-300 focus:border-primary focus:ring-primary shadow-sm"
                                    required>
                                <?php echo form_error('email', '<p class="text-red-500 text-xs mt-1">', '</p>'); ?>
                            </div>

                            <!-- Degree (Optional as per controller) -->
                            <div>
                                <label for="degree" class="block text-sm font-medium text-gray-700 mb-1">Gelar / Pendidikan</label>
                                <input type="text" name="degree" id="degree" 
                                    value="<?php echo set_value('degree', isset($user['degree']) ? $user['degree'] : ''); ?>"
                                    class="w-full rounded-lg border-gray-300 focus:border-primary focus:ring-primary shadow-sm"
                                    placeholder="Contoh: S1 Teknik Informatika">
                            </div>

                            <!-- Password (Optional) -->
                            <div>
                                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password Baru (Opsional)</label>
                                <input type="password" name="password" id="password" 
                                    class="w-full rounded-lg border-gray-300 focus:border-primary focus:ring-primary shadow-sm"
                                    placeholder="Biarkan kosong jika tidak ingin mengubah password">
                                <p class="text-xs text-gray-500 mt-1">Minimal 6 karakter</p>
                            </div>
                        </div>

                        <div class="mt-8 pt-6 border-t border-gray-100 flex justify-end">
                            <button type="submit" 
                                class="bg-primary text-white px-6 py-2.5 rounded-lg font-medium hover:bg-primary/90 transition shadow-sm">
                                Simpan Perubahan
                            </button>
                        </div>

                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
    function switchTab(tabName) {
        // Hide all tabs
        document.getElementById('tab-profile').classList.add('hidden');
        document.getElementById('tab-wishlist').classList.add('hidden');

        // Reset button styles
        document.getElementById('btn-profile').classList.remove('bg-primary', 'text-white');
        document.getElementById('btn-profile').classList.add('text-gray-600', 'hover:bg-gray-50');

        document.getElementById('btn-wishlist').classList.remove('bg-primary', 'text-white');
        document.getElementById('btn-wishlist').classList.add('text-gray-600', 'hover:bg-gray-50');

        // Show selected tab
        document.getElementById('tab-' + tabName).classList.remove('hidden');

        // Highlight selected button
        document.getElementById('btn-' + tabName).classList.add('bg-primary', 'text-white');
        document.getElementById('btn-' + tabName).classList.remove('text-gray-600', 'hover:bg-gray-50');
    }
</script>