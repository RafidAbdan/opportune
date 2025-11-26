import React from 'react';
import { Link } from 'react-router-dom';
import { ArrowRight, Search, CheckCircle } from 'lucide-react';
import ScholarshipCard from '../components/ScholarshipCard';
import { useApp } from '../contexts/AppContext';

const Home: React.FC = () => {
  const { scholarships } = useApp();
  const featuredScholarships = scholarships.slice(0, 3); // Ambil 3 pertama untuk ditampilkan

  return (
    <div className="min-h-screen">
      {/* --- Hero Section --- */}
      <section className="relative bg-primary text-white py-24 lg:py-32 overflow-hidden">
        {/* Dekorasi Latar Belakang */}
        <div className="absolute top-0 right-0 -mr-20 -mt-20 w-96 h-96 bg-blue-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob"></div>
        <div className="absolute bottom-0 left-0 -ml-20 -mb-20 w-96 h-96 bg-secondary rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-2000"></div>

        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
          <div className="text-center max-w-3xl mx-auto">
            <h1 className="text-4xl md:text-6xl font-extrabold mb-6 leading-tight">
              Let's Find Your Dream <span className="text-secondary">Scholarship</span>, Together!
            </h1>
            <p className="text-lg md:text-xl text-blue-200 mb-10 leading-relaxed">
              Kami menghadirkan informasi beasiswa terpercaya yang tidak hanya memberi peluang pendidikan, 
              tetapi juga membuka pengalaman nyata untuk meraih masa depan yang cerah.
            </p>
            
            <div className="flex flex-col sm:flex-row justify-center gap-4">
              <Link 
                to="/search" 
                className="inline-flex items-center justify-center px-8 py-4 text-base font-bold rounded-full text-primary bg-secondary hover:bg-white hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1"
              >
                <Search className="mr-2" size={20} />
                Cari Beasiswa Sekarang
              </Link>
              <Link 
                to="/about" 
                className="inline-flex items-center justify-center px-8 py-4 text-base font-bold rounded-full text-white border-2 border-white hover:bg-white hover:text-primary transition-all duration-300"
              >
                Tentang Kami
              </Link>
            </div>
          </div>
        </div>
      </section>

      {/* --- Value Proposition --- */}
      <section className="py-16 bg-blue-50">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="grid md:grid-cols-3 gap-8">
            <div className="bg-white p-8 rounded-2xl shadow-sm hover:shadow-md transition">
              <div className="bg-blue-100 w-12 h-12 rounded-lg flex items-center justify-center text-primary mb-4">
                <Search size={24} />
              </div>
              <h3 className="text-xl font-bold text-gray-900 mb-3">Pencarian Tepat</h3>
              <p className="text-gray-600">Algoritma cerdas kami menyesuaikan profil Anda dengan beasiswa yang paling relevan.</p>
            </div>
            <div className="bg-white p-8 rounded-2xl shadow-sm hover:shadow-md transition">
              <div className="bg-blue-100 w-12 h-12 rounded-lg flex items-center justify-center text-primary mb-4">
                <CheckCircle size={24} />
              </div>
              <h3 className="text-xl font-bold text-gray-900 mb-3">Panduan Lengkap</h3>
              <p className="text-gray-600">Mulai dari persyaratan hingga tips wawancara, kami memandu setiap langkah Anda.</p>
            </div>
            <div className="bg-white p-8 rounded-2xl shadow-sm hover:shadow-md transition">
              <div className="bg-blue-100 w-12 h-12 rounded-lg flex items-center justify-center text-primary mb-4">
                <ArrowRight size={24} />
              </div>
              <h3 className="text-xl font-bold text-gray-900 mb-3">Kisah Sukses</h3>
              <p className="text-gray-600">Dapatkan wawasan berharga dari para awardee yang telah berhasil meraih mimpi mereka.</p>
            </div>
          </div>
        </div>
      </section>

      {/* --- Featured Scholarships --- */}
      <section className="py-20">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="flex justify-between items-end mb-12">
            <div>
              <span className="text-primary font-bold tracking-wider uppercase text-sm">Pilihan Terbaik</span>
              <h2 className="text-3xl font-bold text-gray-900 mt-2">Beasiswa Unggulan Minggu Ini</h2>
            </div>
            <Link to="/search" className="hidden md:flex items-center text-primary font-semibold hover:text-blue-800">
              Lihat Semua <ArrowRight size={18} className="ml-2" />
            </Link>
          </div>

          <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            {featuredScholarships.map(scholarship => (
              <ScholarshipCard key={scholarship.id} data={scholarship} />
            ))}
          </div>
          
          <div className="mt-12 text-center md:hidden">
            <Link to="/search" className="btn-primary inline-block">Lihat Semua Beasiswa</Link>
          </div>
        </div>
      </section>

      {/* --- Testimonials --- */}
      <section className="py-20 bg-gray-50">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <h2 className="text-3xl font-bold text-center text-primary mb-16">Kisah Sukses Para Awardee</h2>
          <div className="grid md:grid-cols-3 gap-8">
            <div className="bg-white p-8 rounded-xl shadow-md border-t-4 border-secondary">
              <div className="flex items-center mb-6">
                <img src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?auto=format&fit=crop&w=150&q=80" alt="User" className="w-12 h-12 rounded-full mr-4" />
                <div>
                  <h4 className="font-bold text-gray-900">Andi Pratama</h4>
                  <p className="text-xs text-gray-500">Awardee Beasiswa LPDP</p>
                </div>
              </div>
              <p className="text-gray-600 italic">"Oppurtune sangat membantu saya menemukan informasi beasiswa yang tersebar. Fitur filterisasinya sangat akurat!"</p>
            </div>
            
            <div className="bg-white p-8 rounded-xl shadow-md border-t-4 border-secondary">
               <div className="flex items-center mb-6">
                <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?auto=format&fit=crop&w=150&q=80" alt="User" className="w-12 h-12 rounded-full mr-4" />
                <div>
                  <h4 className="font-bold text-gray-900">Rina Oktaviani</h4>
                  <p className="text-xs text-gray-500">Awardee GKS Korea</p>
                </div>
              </div>
              <p className="text-gray-600 italic">"Saya hampir menyerah mencari beasiswa ke Korea sampai saya menemukan panduan lengkap di sini. Terima kasih Oppurtune!"</p>
            </div>

            <div className="bg-white p-8 rounded-xl shadow-md border-t-4 border-secondary">
               <div className="flex items-center mb-6">
                <img src="https://images.unsplash.com/photo-1599566150163-29194dcaad36?auto=format&fit=crop&w=150&q=80" alt="User" className="w-12 h-12 rounded-full mr-4" />
                <div>
                  <h4 className="font-bold text-gray-900">Fahri Alamsyah</h4>
                  <p className="text-xs text-gray-500">Awardee Djarum Plus</p>
                </div>
              </div>
              <p className="text-gray-600 italic">"Fitur personalisasinya worth it banget. Langsung dapet rekomendasi yang pas sama IPK aku."</p>
            </div>
          </div>
        </div>
      </section>
    </div>
  );
};

export default Home;