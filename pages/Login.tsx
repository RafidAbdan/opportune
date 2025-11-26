import React, { useState } from 'react';
import { useNavigate, Link } from 'react-router-dom';
import { useApp } from '../contexts/AppContext';
import { GraduationCap } from 'lucide-react';

const Login: React.FC = () => {
  const [email, setEmail] = useState('');
  const [password, setPassword] = useState('');
  const [error, setError] = useState('');
  const { login } = useApp();
  const navigate = useNavigate();

  const handleSubmit = (e: React.FormEvent) => {
    e.preventDefault();
    const success = login(email, password);
    if (success) {
      if (email === 'admin@admin.com') {
        navigate('/admin');
      } else {
        navigate('/');
      }
    } else {
      setError('Email atau password salah. (Coba: admin@admin.com / admin123)');
    }
  };

  return (
    <div className="min-h-screen flex flex-col items-center justify-center bg-gray-50 px-4">
      <div className="bg-white p-8 rounded-2xl shadow-xl w-full max-w-md border border-gray-100">
        <div className="text-center mb-8">
          <Link to="/" className="inline-flex items-center justify-center space-x-2 text-primary mb-4">
            <GraduationCap size={40} />
            <span className="text-3xl font-bold">Oppurtune</span>
          </Link>
          <h2 className="text-xl font-semibold text-gray-700">Selamat Datang Kembali</h2>
          <p className="text-gray-500 text-sm mt-2">Masuk untuk mengakses fitur penuh.</p>
        </div>

        {error && (
          <div className="bg-red-100 text-red-600 text-sm p-3 rounded-lg mb-4 text-center">
            {error}
          </div>
        )}

        <form onSubmit={handleSubmit} className="space-y-5">
          <div>
            <label className="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
            <input
              type="email"
              required
              className="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition"
              placeholder="nama@email.com"
              value={email}
              onChange={(e) => setEmail(e.target.value)}
            />
          </div>
          <div>
            <label className="block text-sm font-medium text-gray-700 mb-1">Password</label>
            <input
              type="password"
              required
              className="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition"
              placeholder="••••••••"
              value={password}
              onChange={(e) => setPassword(e.target.value)}
            />
          </div>

          <div className="flex items-center justify-between text-sm">
            <label className="flex items-center text-gray-600">
              <input type="checkbox" className="mr-2 rounded text-primary focus:ring-primary" />
              Ingat Saya
            </label>
            <a href="#" className="text-primary font-semibold hover:underline">Lupa Password?</a>
          </div>

          <button
            type="submit"
            className="w-full bg-primary text-white font-bold py-3 rounded-lg hover:bg-blue-900 transition shadow-lg"
          >
            Masuk
          </button>
        </form>

        <div className="mt-8 text-center text-sm text-gray-500">
          Belum punya akun? <a href="#" className="text-primary font-bold hover:underline">Daftar Sekarang</a>
        </div>

        <div className="mt-6 p-4 bg-blue-50 rounded text-xs text-gray-600">
          <p><strong>Demo Credentials:</strong></p>
          <p>User: budi@example.com / user123</p>
          <p>Admin: admin@admin.com / admin123</p>
          <p>Executive: admin_executive@executive1.com / executive123</p>
        </div>
      </div>
    </div>
  );
};

export default Login;