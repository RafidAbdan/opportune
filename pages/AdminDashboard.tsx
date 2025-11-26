import React, { useState } from 'react';
import { useApp } from '../contexts/AppContext';
import { Trash2, Edit, Plus, Eye, EyeOff, Lock, User as UserIcon, Book } from 'lucide-react';
import { Scholarship } from '../types';

// Modal Autentikasi Eksekutif
const ExecutiveAuthModal = ({ onClose, onSuccess }: { onClose: () => void, onSuccess: () => void }) => {
  const { verifyExecutive } = useApp();
  const [email, setEmail] = useState('');
  const [pass, setPass] = useState('');
  const [error, setError] = useState('');

  const handleSubmit = (e: React.FormEvent) => {
    e.preventDefault();
    if (verifyExecutive(email, pass)) {
      onSuccess();
    } else {
      setError('Kredensial eksekutif salah.');
    }
  };

  return (
    <div className="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-80 backdrop-blur-sm">
      <div className="bg-white p-8 rounded-lg max-w-sm w-full shadow-2xl border border-red-500">
        <div className="flex justify-center mb-4">
          <div className="bg-red-100 p-3 rounded-full">
            <Lock className="text-red-600" size={32} />
          </div>
        </div>
        <h3 className="text-xl font-bold text-center text-gray-900 mb-1">Akses Terbatas</h3>
        <p className="text-center text-gray-500 text-sm mb-6">Masukkan kredensial eksekutif untuk melihat data sensitif.</p>
        
        {error && <div className="bg-red-100 text-red-700 p-2 rounded mb-4 text-sm text-center">{error}</div>}
        
        <form onSubmit={handleSubmit} className="space-y-4">
          <div>
            <label className="block text-xs font-bold text-gray-700 uppercase mb-1">Email Eksekutif</label>
            <input type="email" required value={email} onChange={e => setEmail(e.target.value)} className="w-full border rounded p-2" placeholder="admin_executive@..." />
          </div>
          <div>
            <label className="block text-xs font-bold text-gray-700 uppercase mb-1">Password</label>
            <input type="password" required value={pass} onChange={e => setPass(e.target.value)} className="w-full border rounded p-2" />
          </div>
          <div className="flex gap-2 pt-2">
            <button type="button" onClick={onClose} className="flex-1 bg-gray-200 text-gray-800 py-2 rounded font-medium hover:bg-gray-300">Batal</button>
            <button type="submit" className="flex-1 bg-red-600 text-white py-2 rounded font-medium hover:bg-red-700">Verifikasi</button>
          </div>
        </form>
      </div>
    </div>
  );
};

const AdminDashboard: React.FC = () => {
  const { scholarships, users, addScholarship, deleteScholarship, auth } = useApp();
  const [activeTab, setActiveTab] = useState<'scholarships' | 'users'>('scholarships');
  const [showExecutiveModal, setShowExecutiveModal] = useState(false);
  const [isDataRevealed, setIsDataRevealed] = useState(false);
  
  // State form beasiswa (sederhana)
  const [newScholarship, setNewScholarship] = useState<Partial<Scholarship>>({
    category: 'Nasional', field: 'Umum'
  });
  const [isFormOpen, setIsFormOpen] = useState(false);

  const handleAddScholarship = (e: React.FormEvent) => {
    e.preventDefault();
    if (newScholarship.title && newScholarship.provider) {
      addScholarship({
        ...newScholarship,
        id: Date.now().toString(),
        image: 'https://images.unsplash.com/photo-1523050854058-8df90110c9f1?auto=format&fit=crop&q=80&w=800', // Default image
        deadline: newScholarship.deadline || new Date().toISOString()
      } as Scholarship);
      setIsFormOpen(false);
      setNewScholarship({ category: 'Nasional', field: 'Umum' });
      alert("Beasiswa berhasil ditambahkan!");
    }
  };

  return (
    <div className="flex h-screen bg-gray-100">
      
      {/* Sidebar Sederhana */}
      <div className="w-64 bg-primary text-white flex flex-col">
        <div className="p-6 font-bold text-xl border-b border-blue-800">Admin Panel</div>
        <nav className="flex-1 p-4 space-y-2">
          <button 
            onClick={() => setActiveTab('scholarships')}
            className={`w-full flex items-center px-4 py-3 rounded transition ${activeTab === 'scholarships' ? 'bg-secondary text-primary font-bold' : 'hover:bg-blue-800'}`}
          >
            <Book size={20} className="mr-3" /> Manajemen Beasiswa
          </button>
          <button 
            onClick={() => setActiveTab('users')}
            className={`w-full flex items-center px-4 py-3 rounded transition ${activeTab === 'users' ? 'bg-secondary text-primary font-bold' : 'hover:bg-blue-800'}`}
          >
            <UserIcon size={20} className="mr-3" /> Data Pengguna
          </button>
        </nav>
      </div>

      {/* Konten Utama */}
      <div className="flex-1 overflow-auto p-8">
        
        {/* Header Content */}
        <div className="flex justify-between items-center mb-8">
          <h1 className="text-3xl font-bold text-gray-800">
            {activeTab === 'scholarships' ? 'Daftar Beasiswa' : 'Pengguna Terdaftar'}
          </h1>
          {activeTab === 'scholarships' && (
            <button onClick={() => setIsFormOpen(true)} className="bg-green-600 text-white px-4 py-2 rounded-lg flex items-center hover:bg-green-700">
              <Plus size={20} className="mr-2" /> Tambah Beasiswa
            </button>
          )}
        </div>

        {/* Tab Beasiswa */}
        {activeTab === 'scholarships' && (
          <div className="bg-white rounded-lg shadow overflow-hidden">
             {isFormOpen && (
               <div className="p-4 bg-blue-50 border-b border-blue-100">
                 <h3 className="font-bold mb-4">Tambah Beasiswa Baru</h3>
                 <form onSubmit={handleAddScholarship} className="grid grid-cols-2 gap-4">
                   <input className="border p-2 rounded" placeholder="Judul Beasiswa" onChange={e => setNewScholarship({...newScholarship, title: e.target.value})} required />
                   <input className="border p-2 rounded" placeholder="Penyedia" onChange={e => setNewScholarship({...newScholarship, provider: e.target.value})} required />
                   <textarea className="border p-2 rounded col-span-2" placeholder="Deskripsi" onChange={e => setNewScholarship({...newScholarship, description: e.target.value})} />
                   <div className="flex gap-2 col-span-2 mt-2">
                     <button type="button" onClick={() => setIsFormOpen(false)} className="bg-gray-300 px-4 py-2 rounded text-gray-800">Batal</button>
                     <button type="submit" className="bg-primary text-white px-4 py-2 rounded">Simpan</button>
                   </div>
                 </form>
               </div>
             )}
             <table className="min-w-full divide-y divide-gray-200">
              <thead className="bg-gray-50">
                <tr>
                  <th className="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Judul</th>
                  <th className="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Penyedia</th>
                  <th className="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kategori</th>
                  <th className="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                </tr>
              </thead>
              <tbody className="bg-white divide-y divide-gray-200">
                {scholarships.map(s => (
                  <tr key={s.id}>
                    <td className="px-6 py-4 whitespace-nowrap font-medium text-gray-900">{s.title}</td>
                    <td className="px-6 py-4 whitespace-nowrap text-gray-500">{s.provider}</td>
                    <td className="px-6 py-4 whitespace-nowrap text-gray-500">
                      <span className={`px-2 inline-flex text-xs leading-5 font-semibold rounded-full ${s.category === 'Nasional' ? 'bg-green-100 text-green-800' : 'bg-blue-100 text-blue-800'}`}>
                        {s.category}
                      </span>
                    </td>
                    <td className="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                      <button className="text-indigo-600 hover:text-indigo-900 mr-4"><Edit size={18} /></button>
                      <button onClick={() => deleteScholarship(s.id)} className="text-red-600 hover:text-red-900"><Trash2 size={18} /></button>
                    </td>
                  </tr>
                ))}
              </tbody>
            </table>
          </div>
        )}

        {/* Tab Users (Dengan Keamanan Eksekutif) */}
        {activeTab === 'users' && (
          <div className="bg-white rounded-lg shadow p-6">
            {!isDataRevealed && !auth.isExecutive ? (
              <div className="text-center py-12">
                <div className="bg-red-50 inline-block p-4 rounded-full mb-4">
                  <Lock size={48} className="text-red-500" />
                </div>
                <h3 className="text-xl font-bold text-gray-800 mb-2">Data Sensitif Terkunci</h3>
                <p className="text-gray-500 mb-6 max-w-md mx-auto">
                  Untuk melindungi privasi pengguna, Anda harus masuk sebagai Eksekutif untuk melihat daftar lengkap dan detail akun.
                </p>
                <button 
                  onClick={() => setShowExecutiveModal(true)}
                  className="bg-red-600 text-white px-6 py-3 rounded-lg font-bold hover:bg-red-700 transition shadow-lg"
                >
                  Buka Kunci Data (Executive Login)
                </button>
              </div>
            ) : (
              <div>
                <div className="flex justify-between mb-4">
                   <h3 className="text-lg font-semibold text-gray-700">Daftar Pengguna (Mode Terbuka)</h3>
                   <button onClick={() => setIsDataRevealed(false)} className="text-sm text-red-500 underline">Kunci Kembali</button>
                </div>
                <table className="min-w-full divide-y divide-gray-200 border">
                  <thead className="bg-red-50">
                    <tr>
                      <th className="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                      <th className="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                      <th className="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Password (Simulasi)</th>
                      <th className="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Role</th>
                    </tr>
                  </thead>
                  <tbody className="bg-white divide-y divide-gray-200">
                    {users.map(u => (
                      <tr key={u.id}>
                        <td className="px-6 py-4 whitespace-nowrap text-gray-900">{u.name}</td>
                        <td className="px-6 py-4 whitespace-nowrap text-gray-500">{u.email}</td>
                        <td className="px-6 py-4 whitespace-nowrap text-gray-500 font-mono bg-gray-50">{u.password}</td>
                        <td className="px-6 py-4 whitespace-nowrap text-gray-500">{u.role}</td>
                      </tr>
                    ))}
                  </tbody>
                </table>
              </div>
            )}
          </div>
        )}

        {/* Modal Eksekutif */}
        {showExecutiveModal && (
          <ExecutiveAuthModal 
            onClose={() => setShowExecutiveModal(false)} 
            onSuccess={() => {
              setIsDataRevealed(true);
              setShowExecutiveModal(false);
            }} 
          />
        )}

      </div>
    </div>
  );
};

export default AdminDashboard;