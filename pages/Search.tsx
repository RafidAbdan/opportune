import React, { useState } from 'react';
import { Search as SearchIcon, Filter, Lock, Star, Globe, Cpu, Palette, Leaf, HeartPulse, Briefcase, Book, Users, ChevronDown, ChevronUp } from 'lucide-react';
import ScholarshipCard from '../components/ScholarshipCard';
import { useApp } from '../contexts/AppContext';

// Modal Paywall
const PaywallModal = ({ onClose, onPay }: { onClose: () => void, onPay: () => void }) => (
  <div className="fixed inset-0 z-[60] flex items-center justify-center bg-black bg-opacity-70 backdrop-blur-sm p-4">
    <div className="bg-white rounded-2xl max-w-md w-full p-8 relative animate-fade-in-up">
      <div className="absolute -top-12 left-1/2 transform -translate-x-1/2 bg-yellow-400 p-4 rounded-full shadow-lg">
        <Lock size={32} className="text-white" />
      </div>

      <div className="text-center mt-6">
        <h3 className="text-2xl font-bold text-gray-900 mb-2">Buka Fitur Premium</h3>
        <p className="text-gray-600 mb-6">
          Dapatkan rekomendasi beasiswa yang dipersonalisasi khusus berdasarkan IPK dan jurusan Anda. Tingkatkan peluang lolos hingga 80%!
        </p>

        <div className="bg-blue-50 p-4 rounded-lg mb-6 border border-blue-100">
          <div className="flex justify-between items-center mb-2">
            <span className="text-gray-600">Paket Personalisasi</span>
            <span className="text-gray-400 line-through">Rp 100.000</span>
          </div>
          <div className="flex justify-between items-center">
            <span className="font-bold text-primary">Harga Promo</span>
            <span className="text-2xl font-bold text-green-600">Rp 50.000</span>
          </div>
        </div>

        <button
          onClick={onPay}
          className="w-full bg-primary text-white font-bold py-3 rounded-xl hover:bg-blue-900 transition-colors shadow-lg mb-3"
        >
          Bayar Sekarang (Simulasi)
        </button>
        <button
          onClick={onClose}
          className="text-gray-400 text-sm hover:text-gray-600"
        >
          Nanti saja, terima kasih
        </button>
      </div>
    </div>
  </div>
);

const SearchPage: React.FC = () => {
  const { scholarships } = useApp();
  const [searchTerm, setSearchTerm] = useState('');
  const [showPaywall, setShowPaywall] = useState(false);
  const [isPremiumUnlocked, setIsPremiumUnlocked] = useState(false);
  const [personalizationResult, setPersonalizationResult] = useState<boolean>(false);
  const [showAllCategories, setShowAllCategories] = useState(false);

  // Filter logika sederhana untuk pencarian teks
  const filteredScholarships = scholarships.filter(s =>
    s.title.toLowerCase().includes(searchTerm.toLowerCase()) ||
    s.provider.toLowerCase().includes(searchTerm.toLowerCase())
  );

  const handlePersonalizationSubmit = (e: React.FormEvent) => {
    e.preventDefault();
    if (!isPremiumUnlocked) {
      setShowPaywall(true);
    } else {
      // Simulasi logika jika sudah premium
      setPersonalizationResult(true);
      alert("Filter personalisasi diterapkan! (Demo)");
    }
  };

  const handlePaymentSuccess = () => {
    // Simulasi proses pembayaran
    const confirm = window.confirm("Simulasi: Lanjutkan pembayaran?");
    if (confirm) {
      setIsPremiumUnlocked(true);
      setShowPaywall(false);
      setPersonalizationResult(true);
      alert("Pembayaran Berhasil! Fitur personalisasi aktif.");
    }
  };

  const categories = [
    { name: 'Health Science', icon: HeartPulse, color: 'red' },
    { name: 'Technology', icon: Cpu, color: 'blue' },
    { name: 'Environmental', icon: Leaf, color: 'green' },
    { name: 'Arts', icon: Palette, color: 'purple' },
    { name: 'Business', icon: Briefcase, color: 'orange' },
    { name: 'Education', icon: Book, color: 'yellow' },
    { name: 'Social Sciences', icon: Users, color: 'indigo' },
    { name: 'General', icon: Globe, color: 'teal' },
  ];

  const visibleCategories = showAllCategories ? categories : categories.slice(0, 4);

  return (
    <div className="min-h-screen bg-gray-50 pb-20">

      {/* Header Pencarian */}
      <div className="bg-primary pt-12 pb-24 px-4 sm:px-6 lg:px-8">
        <div className="max-w-4xl mx-auto text-center">
          <h1 className="text-3xl md:text-4xl font-bold text-white mb-6">Peluang Terbaik Menantimu</h1>
          <div className="relative">
            <input
              type="text"
              placeholder="Cari beasiswa (contoh: Bakti BCA, LPDP...)"
              className="w-full pl-12 pr-4 py-4 rounded-full shadow-lg focus:outline-none focus:ring-4 focus:ring-blue-500/30 text-gray-800"
              value={searchTerm}
              onChange={(e) => setSearchTerm(e.target.value)}
            />
            <SearchIcon className="absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400" />
          </div>
        </div>
      </div>

      {/* Konten Utama - Offset ke atas */}
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-16">

        {/* Box Personalisasi (Fitur Premium) */}
        <div className="bg-white rounded-xl shadow-xl p-8 mb-12 border border-gray-100 relative overflow-hidden">
          {!isPremiumUnlocked && (
            <div className="absolute top-0 right-0 bg-yellow-400 text-yellow-900 text-xs font-bold px-3 py-1 rounded-bl-lg z-10 flex items-center">
              <Star size={12} className="mr-1" /> PREMIUM
            </div>
          )}

          <div className="flex items-center mb-6">
            <div className="bg-blue-100 p-3 rounded-full mr-4 text-primary">
              <Filter size={24} />
            </div>
            <div>
              <h2 className="text-xl font-bold text-gray-900">Mulai Pencarian Personal</h2>
              <p className="text-gray-500 text-sm">Sesuaikan pencarianmu dengan mengisi jenjang, jurusan, dan IPK minimum.</p>
            </div>
          </div>

          <form onSubmit={handlePersonalizationSubmit} className="grid grid-cols-1 md:grid-cols-4 gap-4 items-end">
            <div>
              <label className="block text-sm font-medium text-gray-700 mb-1">Jenjang</label>
              <select className="w-full border-gray-300 rounded-md shadow-sm p-2 border bg-gray-50 focus:ring-primary focus:border-primary">
                <option>S1 (Sarjana)</option>
                <option>S2 (Magister)</option>
                <option>D3 (Diploma)</option>
              </select>
            </div>
            <div>
              <label className="block text-sm font-medium text-gray-700 mb-1">Jurusan</label>
              <input type="text" placeholder="Cth: Informatika" className="w-full border-gray-300 rounded-md shadow-sm p-2 border bg-gray-50 focus:ring-primary focus:border-primary" />
            </div>
            <div>
              <label className="block text-sm font-medium text-gray-700 mb-1">IPK Minimum</label>
              <input type="number" step="0.01" placeholder="3.00" className="w-full border-gray-300 rounded-md shadow-sm p-2 border bg-gray-50 focus:ring-primary focus:border-primary" />
            </div>
            <button type="submit" className="bg-primary text-white font-bold py-2 px-4 rounded-md hover:bg-blue-900 transition w-full h-[42px]">
              {isPremiumUnlocked ? 'Terapkan Filter' : 'Cari Beasiswa'}
            </button>
          </form>
        </div>

        {/* Modal Paywall */}
        {showPaywall && <PaywallModal onClose={() => setShowPaywall(false)} onPay={handlePaymentSuccess} />}

        {/* Top Scholarships Available */}
        <div className="mb-16">
          <div className="flex justify-between items-center mb-8">
            <h2 className="text-2xl font-bold text-gray-900">Top Scholarships Available</h2>
            <span className="text-sm text-gray-500">{filteredScholarships.length} Beasiswa Ditemukan</span>
          </div>

          {filteredScholarships.length > 0 ? (
            <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
              {filteredScholarships.map(item => (
                <ScholarshipCard key={item.id} data={item} />
              ))}
            </div>
          ) : (
            <div className="text-center py-12 bg-white rounded-lg border border-dashed border-gray-300">
              <p className="text-gray-500">Tidak ada beasiswa yang cocok dengan pencarian "{searchTerm}".</p>
            </div>
          )}
        </div>

        {/* Popular Categories */}
        <div className="mb-16">
          <h2 className="text-2xl font-bold text-gray-900 text-center mb-2">Popular Scholarship Categories</h2>
          <p className="text-gray-500 text-center mb-10">Browse scholarships by your field.</p>

          <div className="grid grid-cols-2 md:grid-cols-4 gap-6 transition-all duration-500 ease-in-out">
            {visibleCategories.map((cat) => (
              <div key={cat.name} className="bg-white p-6 rounded-xl shadow-sm hover:shadow-lg transition text-center cursor-pointer group animate-fade-in">
                <div className={`w-16 h-16 bg-${cat.color}-100 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-${cat.color}-200 transition`}>
                  <cat.icon className={`text-${cat.color}-600`} size={32} />
                </div>
                <h3 className="font-semibold text-gray-800">{cat.name}</h3>
              </div>
            ))}
          </div>

          <div className="text-center mt-8">
            <button
              onClick={() => setShowAllCategories(!showAllCategories)}
              className="bg-black text-white px-8 py-3 rounded-full font-medium hover:bg-gray-800 transition flex items-center mx-auto"
            >
              {showAllCategories ? (
                <>Show Less <ChevronUp size={18} className="ml-2" /></>
              ) : (
                <>View All Categories <ChevronDown size={18} className="ml-2" /></>
              )}
            </button>
          </div>
        </div>

      </div>
    </div>
  );
};

export default SearchPage;