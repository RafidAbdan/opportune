import React, { createContext, useContext, useState, useEffect, ReactNode } from 'react';
import { Scholarship, User, AuthState } from '../types';
import { initialScholarships, initialUsers } from '../data/mockData';

interface AppContextType {
  // Auth State
  auth: AuthState;
  login: (email: string, pass: string) => boolean;
  logout: () => void;
  verifyExecutive: (email: string, pass: string) => boolean;

  // Data State
  scholarships: Scholarship[];
  users: User[];
  addScholarship: (data: Scholarship) => void;
  deleteScholarship: (id: string) => void;
  updateScholarship: (id: string, data: Scholarship) => void;
}

const AppContext = createContext<AppContextType | undefined>(undefined);

export const AppProvider = ({ children }: { children: ReactNode }) => {
  // --- State Inisialisasi ---
  const [auth, setAuth] = useState<AuthState>(() => {
    const saved = localStorage.getItem('opp_auth');
    return saved ? JSON.parse(saved) : { user: null, isAuthenticated: false, isAdmin: false, isExecutive: false };
  });

  const [scholarships, setScholarships] = useState<Scholarship[]>(() => {
    const saved = localStorage.getItem('opp_scholarships');
    return saved ? JSON.parse(saved) : initialScholarships;
  });

  const [users] = useState<User[]>(initialUsers); // Read-only untuk demo ini kecuali admin

  // --- Effects ---
  useEffect(() => {
    localStorage.setItem('opp_auth', JSON.stringify(auth));
  }, [auth]);

  useEffect(() => {
    localStorage.setItem('opp_scholarships', JSON.stringify(scholarships));
  }, [scholarships]);

  // --- Auth Logic ---
  const login = (email: string, pass: string): boolean => {
    // Hardcoded Admin
    if (email === 'admin@admin.com' && pass === 'admin123') {
      setAuth({
        user: { id: 'admin', name: 'Super Admin', email, role: 'admin' },
        isAuthenticated: true,
        isAdmin: true,
        isExecutive: false
      });
      return true;
    }

    // Cek User Biasa
    const foundUser = users.find(u => u.email === email && u.password === pass);
    if (foundUser) {
      setAuth({
        user: foundUser,
        isAuthenticated: true,
        isAdmin: false,
        isExecutive: false
      });
      return true;
    }

    return false;
  };

  const logout = () => {
    setAuth({ user: null, isAuthenticated: false, isAdmin: false, isExecutive: false });
    // Hapus sesi executive juga saat logout
  };

  const verifyExecutive = (email: string, pass: string): boolean => {
    if (email === 'admin_executive@executive1.com' && pass === 'executive123') {
      setAuth(prev => ({ ...prev, isExecutive: true }));
      return true;
    }
    return false;
  };

  // --- Data CRUD Logic ---
  const addScholarship = (data: Scholarship) => {
    setScholarships(prev => [...prev, data]);
  };

  const deleteScholarship = (id: string) => {
    setScholarships(prev => prev.filter(s => s.id !== id));
  };

  const updateScholarship = (id: string, data: Scholarship) => {
    setScholarships(prev => prev.map(s => s.id === id ? data : s));
  };

  return (
    <AppContext.Provider value={{
      auth, login, logout, verifyExecutive,
      scholarships, users, addScholarship, deleteScholarship, updateScholarship
    }}>
      {children}
    </AppContext.Provider>
  );
};

export const useApp = () => {
  const context = useContext(AppContext);
  if (!context) throw new Error('useApp must be used within AppProvider');
  return context;
};