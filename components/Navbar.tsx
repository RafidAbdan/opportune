import React, { useState } from 'react';
import { Link, useNavigate, useLocation } from 'react-router-dom';
import { Menu, X, GraduationCap, LogOut, User } from 'lucide-react';
import { useApp } from '../contexts/AppContext';

const Navbar: React.FC = () => {
  const [isOpen, setIsOpen] = useState(false);
  const { auth, logout } = useApp();
  const navigate = useNavigate();
  const location = useLocation();

  const handleLogout = () => {
    logout();
    navigate('/login');
  };

  const isActive = (path: string) => location.pathname === path ? 'text-secondary font-bold' : 'text-white hover:text-secondary';

  return (
    <nav className="bg-primary shadow-lg sticky top-0 z-50">
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div className="flex justify-between h-16">
          
          {/* Logo */}
          <div className="flex items-center">
            <Link to="/" className="flex items-center space-x-2">
              <GraduationCap className="h-8 w-8 text-secondary" />
              <span className="text-2xl font-bold text-white tracking-wide">Oppurtune</span>
            </Link>
          </div>

          {/* Desktop Menu */}
          <div className="hidden md:flex items-center space-x-8">
            <Link to="/" className={isActive('/')}>Home</Link>
            <Link to="/search" className={isActive('/search')}>Cari Beasiswa</Link>
            <Link to="/programs" className={isActive('/programs')}>Program</Link>
            <Link to="/articles" className={isActive('/articles')}>Artikel & Tips</Link>
            <Link to="/about" className={isActive('/about')}>Tentang Kami</Link>
            
            {auth.isAuthenticated ? (
              <div className="flex items-center space-x-4 ml-4">
                {auth.isAdmin && (
                  <Link to="/admin" className="px-3 py-1 bg-red-600 text-white text-sm rounded hover:bg-red-700 transition">
                    Dashboard
                  </Link>
                )}
                <div className="flex items-center text-tertiary">
                  <User size={18} className="mr-1" />
                  <span className="text-sm font-medium">{auth.user?.name}</span>
                </div>
                <button onClick={handleLogout} className="text-white hover:text-red-300 transition" title="Keluar">
                  <LogOut size={20} />
                </button>
              </div>
            ) : (
              <Link 
                to="/login" 
                className="bg-secondary text-primary px-5 py-2 rounded-full font-bold hover:bg-white transition-colors duration-300"
              >
                Sign In
              </Link>
            )}
          </div>

          {/* Mobile Menu Button */}
          <div className="flex items-center md:hidden">
            <button onClick={() => setIsOpen(!isOpen)} className="text-white hover:text-secondary focus:outline-none">
              {isOpen ? <X size={28} /> : <Menu size={28} />}
            </button>
          </div>
        </div>
      </div>

      {/* Mobile Menu Dropdown */}
      {isOpen && (
        <div className="md:hidden bg-primary pb-4 px-4 shadow-xl border-t border-blue-900">
          <div className="flex flex-col space-y-3 mt-4">
            <Link to="/" onClick={() => setIsOpen(false)} className="text-white block px-3 py-2 rounded hover:bg-blue-900">Home</Link>
            <Link to="/search" onClick={() => setIsOpen(false)} className="text-white block px-3 py-2 rounded hover:bg-blue-900">Cari Beasiswa</Link>
            <Link to="/programs" onClick={() => setIsOpen(false)} className="text-white block px-3 py-2 rounded hover:bg-blue-900">Program</Link>
            <Link to="/articles" onClick={() => setIsOpen(false)} className="text-white block px-3 py-2 rounded hover:bg-blue-900">Artikel & Tips</Link>
            <Link to="/about" onClick={() => setIsOpen(false)} className="text-white block px-3 py-2 rounded hover:bg-blue-900">Tentang Kami</Link>
            
            {auth.isAuthenticated ? (
              <div className="pt-4 border-t border-blue-800">
                <p className="text-tertiary mb-2 text-sm">Masuk sebagai: {auth.user?.name}</p>
                {auth.isAdmin && (
                  <Link to="/admin" onClick={() => setIsOpen(false)} className="block text-red-300 mb-2 font-bold">Admin Dashboard</Link>
                )}
                <button onClick={handleLogout} className="text-white bg-red-600 px-4 py-2 rounded w-full text-left flex items-center">
                  <LogOut size={16} className="mr-2" /> Keluar
                </button>
              </div>
            ) : (
              <Link 
                to="/login" 
                onClick={() => setIsOpen(false)}
                className="bg-secondary text-primary text-center px-5 py-3 rounded-md font-bold hover:bg-white mt-4 block"
              >
                Sign In / Sign Up
              </Link>
            )}
          </div>
        </div>
      )}
    </nav>
  );
};

export default Navbar;