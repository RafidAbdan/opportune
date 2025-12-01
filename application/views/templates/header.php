<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Oppurtune - Find Your Dream Scholarship</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#162660', // Royal Blue
                        secondary: '#D0E6FD', // Powder Blue
                        tertiary: '#F1E4D1', // Bone
                    }
                }
            }
        }
    </script>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-50 flex flex-col min-h-screen">

    <!-- Navbar -->
    <nav class="bg-primary shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">

                <!-- Logo -->
                <div class="flex items-center">
                    <a href="<?php echo base_url(); ?>" class="flex items-center space-x-2">
                        <i data-lucide="graduation-cap" class="h-8 w-8 text-secondary"></i>
                        <span class="text-2xl font-bold text-white tracking-wide">Oppurtune</span>
                    </a>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="<?php echo base_url(); ?>"
                        class="<?php echo ($this->uri->segment(1) == '' || $this->uri->segment(1) == 'home') ? 'text-secondary font-bold' : 'text-white hover:text-secondary'; ?>">Home</a>
                    <a href="<?php echo base_url('search'); ?>"
                        class="<?php echo ($this->uri->segment(1) == 'search') ? 'text-secondary font-bold' : 'text-white hover:text-secondary'; ?>">Cari
                        Beasiswa</a>
                    <a href="<?php echo base_url('programs'); ?>"
                        class="<?php echo ($this->uri->segment(1) == 'programs') ? 'text-secondary font-bold' : 'text-white hover:text-secondary'; ?>">Program</a>
                    <a href="<?php echo base_url('articles'); ?>"
                        class="<?php echo ($this->uri->segment(1) == 'articles') ? 'text-secondary font-bold' : 'text-white hover:text-secondary'; ?>">Artikel
                        & Tips</a>
                    <a href="<?php echo base_url('about'); ?>"
                        class="<?php echo ($this->uri->segment(1) == 'about') ? 'text-secondary font-bold' : 'text-white hover:text-secondary'; ?>">Tentang
                        Kami</a>

                    <?php if ($this->session->userdata('user_id')): ?>
                        <div class="flex items-center space-x-4 ml-4">
                            <?php if ($this->session->userdata('role') == 'admin' || $this->session->userdata('role') == 'executive'): ?>
                                <a href="<?php echo base_url('admin'); ?>"
                                    class="px-3 py-1 bg-red-600 text-white text-sm rounded hover:bg-red-700 transition">
                                    Dashboard
                                </a>
                            <?php endif; ?>
                            <a href="<?php echo base_url('user/profile'); ?>" class="flex items-center text-tertiary hover:text-white transition">
                                <i data-lucide="user" class="mr-1 w-5 h-5"></i>
                                <span class="text-sm font-medium"><?php echo $this->session->userdata('name'); ?></span>
                            </a>
                            <a href="<?php echo base_url('auth/logout'); ?>"
                                class="text-white hover:text-red-300 transition" title="Keluar">
                                <i data-lucide="log-out" class="w-5 h-5"></i>
                            </a>
                        </div>
                    <?php else: ?>
                        <a href="<?php echo base_url('login'); ?>"
                            class="bg-secondary text-primary px-5 py-2 rounded-full font-bold hover:bg-white transition-colors duration-300">
                            Sign In
                        </a>
                    <?php endif; ?>
                </div>

                <!-- Mobile Menu Button (Simplified for PHP, requires JS for toggle) -->
                <div class="flex items-center md:hidden">
                    <button id="mobile-menu-btn" class="text-white hover:text-secondary focus:outline-none">
                        <i data-lucide="menu" class="w-7 h-7"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu Dropdown -->
        <div id="mobile-menu" class="hidden md:hidden bg-primary pb-4 px-4 shadow-xl border-t border-blue-900">
            <div class="flex flex-col space-y-3 mt-4">
                <a href="<?php echo base_url(); ?>"
                    class="text-white block px-3 py-2 rounded hover:bg-blue-900">Home</a>
                <a href="<?php echo base_url('search'); ?>"
                    class="text-white block px-3 py-2 rounded hover:bg-blue-900">Cari Beasiswa</a>
                <a href="<?php echo base_url('programs'); ?>"
                    class="text-white block px-3 py-2 rounded hover:bg-blue-900">Program</a>
                <a href="<?php echo base_url('articles'); ?>"
                    class="text-white block px-3 py-2 rounded hover:bg-blue-900">Artikel & Tips</a>
                <a href="<?php echo base_url('about'); ?>"
                    class="text-white block px-3 py-2 rounded hover:bg-blue-900">Tentang Kami</a>

                <?php if ($this->session->userdata('user_id')): ?>
                    <div class="pt-4 border-t border-blue-800">
                        <p class="text-tertiary mb-2 text-sm">Masuk sebagai: <?php echo $this->session->userdata('name'); ?>
                        </p>
                        <?php if ($this->session->userdata('role') == 'admin' || $this->session->userdata('role') == 'executive'): ?>
                            <a href="<?php echo base_url('admin'); ?>" class="block text-red-300 mb-2 font-bold">Admin
                                Dashboard</a>
                        <?php endif; ?>
                        <a href="<?php echo base_url('user/profile'); ?>" class="block text-white mb-2">Profil Saya</a>
                        <a href="<?php echo base_url('auth/logout'); ?>"
                            class="text-white bg-red-600 px-4 py-2 rounded w-full text-left flex items-center">
                            <i data-lucide="log-out" class="mr-2 w-4 h-4"></i> Keluar
                        </a>
                    </div>
                <?php else: ?>
                    <a href="<?php echo base_url('login'); ?>"
                        class="bg-secondary text-primary text-center px-5 py-3 rounded-md font-bold hover:bg-white mt-4 block">
                        Sign In / Sign Up
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </nav>

    <script>
        // Mobile menu toggle
        const btn = document.getElementById('mobile-menu-btn');
        const menu = document.getElementById('mobile-menu');

        if (btn && menu) {
            btn.addEventListener('click', () => {
                menu.classList.toggle('hidden');
                // Toggle icon
                const icon = btn.querySelector('i');
                if (menu.classList.contains('hidden')) {
                    icon.setAttribute('data-lucide', 'menu');
                } else {
                    icon.setAttribute('data-lucide', 'x');
                }
                lucide.createIcons();
            });
        }
    </script>