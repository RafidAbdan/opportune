import React from 'react';
import { Facebook, Twitter, Instagram, Mail, Phone, GraduationCap } from 'lucide-react';

const Footer: React.FC = () => {
  return (
    <footer className="bg-[#0A1640] text-white pt-16 pb-8">
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div className="grid grid-cols-1 md:grid-cols-4 gap-12 mb-12">
          
          {/* Kolom 1: Brand */}
          <div className="col-span-1 md:col-span-1">
            <div className="flex items-center space-x-2 mb-4">
               <GraduationCap className="h-8 w-8 text-secondary" />
               <span className="text-2xl font-bold tracking-wide">Oppurtune</span>
            </div>
            <p className="text-gray-400 text-sm leading-relaxed mb-6">
              Platform terpercaya untuk menemukan ribuan beasiswa S1, S2, dan S3 baik di dalam maupun luar negeri. Wujudkan mimpi pendidikan Anda bersama kami.
            </p>
            <div className="flex space-x-4">
              <a href="#" className="text-gray-400 hover:text-white transition"><Twitter size={20} /></a>
              <a href="#" className="text-gray-400 hover:text-white transition"><Facebook size={20} /></a>
              <a href="#" className="text-gray-400 hover:text-white transition"><Instagram size={20} /></a>
            </div>
          </div>

          {/* Kolom 2: Tautan Cepat */}
          <div>
            <h3 className="text-lg font-semibold mb-6 text-tertiary">Tautan Cepat</h3>
            <ul className="space-y-3 text-gray-400 text-sm">
              <li><a href="#/" className="hover:text-secondary transition">Home</a></li>
              <li><a href="#/search" className="hover:text-secondary transition">Cari Beasiswa</a></li>
              <li><a href="#/programs" className="hover:text-secondary transition">Program</a></li>
              <li><a href="#/articles" className="hover:text-secondary transition">Artikel & Tips</a></li>
            </ul>
          </div>

           {/* Kolom 3: Perusahaan */}
           <div>
            <h3 className="text-lg font-semibold mb-6 text-tertiary">Perusahaan</h3>
            <ul className="space-y-3 text-gray-400 text-sm">
              <li><a href="#/about" className="hover:text-secondary transition">Tentang Kami</a></li>
              <li><a href="#/" className="hover:text-secondary transition">Karir</a></li>
              <li><a href="#/" className="hover:text-secondary transition">Kebijakan Privasi</a></li>
              <li><a href="#/" className="hover:text-secondary transition">Syarat & Ketentuan</a></li>
            </ul>
          </div>

          {/* Kolom 4: Kontak */}
          <div>
            <h3 className="text-lg font-semibold mb-6 text-tertiary">Hubungi Kami</h3>
            <ul className="space-y-4 text-gray-400 text-sm">
              <li className="flex items-start">
                <Mail size={18} className="mr-3 mt-1 text-secondary" />
                <span>support@oppurtune.com</span>
              </li>
              <li className="flex items-start">
                <Phone size={18} className="mr-3 mt-1 text-secondary" />
                <span>+62 812 3456 7890</span>
              </li>
              <li className="text-xs text-gray-500 mt-4">
                Jakarta Selatan, DKI Jakarta<br/>Indonesia
              </li>
            </ul>
          </div>
        </div>

        <div className="border-t border-gray-800 pt-8 flex flex-col md:flex-row justify-between items-center text-sm text-gray-500">
          <p>&copy; 2025 Oppurtune. All rights reserved.</p>
          <div className="flex space-x-6 mt-4 md:mt-0">
            <a href="#" className="hover:text-white">Privacy</a>
            <a href="#" className="hover:text-white">Terms</a>
            <a href="#" className="hover:text-white">Sitemap</a>
          </div>
        </div>
      </div>
    </footer>
  );
};

export default Footer;