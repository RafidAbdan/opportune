<div class="flex min-h-screen bg-gray-100">

    <!-- Sidebar Sederhana -->
    <div class="w-64 bg-primary text-white flex flex-col">
        <div class="p-6 font-bold text-xl border-b border-blue-800">Admin Panel</div>
        <nav class="flex-1 p-4 space-y-2">
            <button id="tab-scholarships-btn"
                class="w-full flex items-center px-4 py-3 rounded transition bg-secondary text-primary font-bold"
                onclick="switchTab('scholarships')">
                <i data-lucide="book" class="mr-3 w-5 h-5"></i> Manajemen Beasiswa
            </button>
            <button id="tab-users-btn" class="w-full flex items-center px-4 py-3 rounded transition hover:bg-blue-800"
                onclick="switchTab('users')">
                <i data-lucide="user" class="mr-3 w-5 h-5"></i> Data Pengguna
            </button>
            <a href="<?php echo base_url('auth/logout'); ?>"
                class="w-full flex items-center px-4 py-3 rounded transition hover:bg-red-700 mt-auto">
                <i data-lucide="log-out" class="mr-3 w-5 h-5"></i> Logout
            </a>
        </nav>
    </div>

    <!-- Konten Utama -->
    <div class="flex-1 overflow-auto p-8">

        <!-- Header Content -->
        <div class="flex justify-between items-center mb-8">
            <h1 id="page-title" class="text-3xl font-bold text-gray-800">
                Daftar Beasiswa
            </h1>
            <div id="action-buttons">
                <button onclick="toggleForm()"
                    class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 flex items-center">
                    <i data-lucide="plus" class="mr-2 w-5 h-5"></i> Tambah Beasiswa
                </button>
            </div>
        </div>

        <!-- Flash Messages -->
        <?php if ($this->session->flashdata('success')): ?>
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline"><?php echo $this->session->flashdata('success'); ?></span>
            </div>
        <?php endif; ?>
        <?php if ($this->session->flashdata('error')): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline"><?php echo $this->session->flashdata('error'); ?></span>
            </div>
        <?php endif; ?>

        <!-- Tab Scholarships -->
        <div id="tab-scholarships">
            <!-- Form Tambah Beasiswa -->
            <div id="add-scholarship-form" class="hidden bg-white rounded-lg shadow p-6 mb-6">
                <h3 class="text-lg font-bold text-gray-800 mb-4">Tambah Beasiswa Baru</h3>
                <form action="<?php echo base_url('admin/save'); ?>" method="POST" class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Judul Beasiswa</label>
                            <input type="text" name="title" required
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Penyedia</label>
                            <input type="text" name="provider" required
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Deskripsi Singkat</label>
                        <textarea name="description" rows="3"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2"></textarea>
                    </div>
                    <div class="flex justify-end space-x-3">
                        <button type="button" onclick="toggleForm()"
                            class="bg-gray-200 text-gray-800 px-4 py-2 rounded hover:bg-gray-300">Batal</button>
                        <button type="submit"
                            class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan</button>
                    </div>
                </form>
            </div>

            <!-- Tabel Beasiswa -->
            <div class="bg-white rounded-lg shadow overflow-hidden">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Judul</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Penyedia</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Kategori</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Deadline</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <?php foreach ($scholarships as $s): ?>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900"><?php echo $s['title']; ?></div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-500"><?php echo $s['provider']; ?></div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        <?php echo $s['category']; ?>
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <?php echo date('d M Y', strtotime($s['deadline'])); ?>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <a href="<?php echo base_url('admin/delete/' . $s['id']); ?>"
                                        onclick="return confirm('Yakin ingin menghapus?')"
                                        class="text-red-600 hover:text-red-900 ml-4">
                                        <i data-lucide="trash-2" class="w-5 h-5"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Tab Users -->
        <div id="tab-users" class="hidden">
            <!-- Create User Form -->
            <div class="bg-white rounded-lg shadow p-6 mb-6">
                <h3 class="text-lg font-bold text-gray-800 mb-4">Tambah Pengguna Baru</h3>
                <form action="<?php echo base_url('admin/createUser'); ?>" method="POST"
                    class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <input type="text" name="name" placeholder="Nama Lengkap" required class="border p-2 rounded">
                    <input type="email" name="email" placeholder="Email" required class="border p-2 rounded">
                    <input type="password" name="password" placeholder="Password" required class="border p-2 rounded">
                    <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                        <i data-lucide="plus" class="inline w-4 h-4 mr-1"></i> Tambah
                    </button>
                </form>
            </div>

            <div class="bg-white rounded-lg shadow overflow-hidden">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Nama</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Email</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <?php if (isset($users) && !empty($users)): ?>
                            <?php foreach ($users as $u): ?>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900"><?php echo $u['name']; ?></div>
                                        <div class="text-xs text-gray-500 capitalize"><?php echo $u['role']; ?></div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-500">
                                            <?php
                                            // Mask email if not executive
                                            if ($this->session->userdata('role') == 'executive') {
                                                echo $u['email'];
                                            } else {
                                                $parts = explode('@', $u['email']);
                                                $name = $parts[0];
                                                $domain = $parts[1];
                                                echo substr($name, 0, 2) . '***@' . $domain;
                                            }
                                            ?>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <?php if ($this->session->userdata('role') == 'executive'): ?>
                                            <a href="<?php echo base_url('admin/deleteUser/' . $u['id']); ?>"
                                                onclick="return confirm('Yakin ingin menghapus user ini?')"
                                                class="text-red-600 hover:text-red-900">
                                                <i data-lucide="trash-2" class="w-5 h-5"></i>
                                            </a>
                                        <?php else: ?>
                                            <span class="text-gray-400 cursor-not-allowed" title="Hanya Executive yang bisa menghapus">
                                                <i data-lucide="lock" class="w-5 h-5"></i>
                                            </span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="3" class="px-6 py-4 text-center text-gray-500">Belum ada data pengguna.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

<script>
    function switchTab(tab) {
        document.getElementById('tab-scholarships').classList.add('hidden');
        document.getElementById('tab-users').classList.add('hidden');
        document.getElementById('tab-' + tab).classList.remove('hidden');

        document.getElementById('tab-scholarships-btn').classList.remove('bg-secondary', 'text-primary', 'font-bold');
        document.getElementById('tab-users-btn').classList.remove('bg-secondary', 'text-primary', 'font-bold');
        document.getElementById('tab-' + tab + '-btn').classList.add('bg-secondary', 'text-primary', 'font-bold');

        document.getElementById('page-title').innerText = tab === 'scholarships' ? 'Daftar Beasiswa' : 'Pengguna Terdaftar';

        if (tab === 'users') {
            document.getElementById('action-buttons').classList.add('hidden');
        } else {
            document.getElementById('action-buttons').classList.remove('hidden');
        }
    }

    function toggleForm() {
        const form = document.getElementById('add-scholarship-form');
        form.classList.toggle('hidden');
    }
</script>