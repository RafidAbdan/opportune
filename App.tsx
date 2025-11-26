import React from 'react';
import { Routes, Route, useLocation } from 'react-router-dom';
import Navbar from './components/Navbar';
import Footer from './components/Footer';
import Home from './pages/Home';
import SearchPage from './pages/Search';
import Programs from './pages/Programs';
import Login from './pages/Login';
import AdminDashboard from './pages/AdminDashboard';
import About from './pages/About';
import Articles from './pages/Articles';
import ArticleDetail from './pages/ArticleDetail';
import ScholarshipDetail from './pages/ScholarshipDetail';
import { AppProvider, useApp } from './contexts/AppContext';

// Wrapper untuk Protected Route
const ProtectedAdminRoute = ({ children }: { children: React.ReactNode }) => {
  const { auth } = useApp();
  if (!auth.isAuthenticated || !auth.isAdmin) {
    return <div className="min-h-screen flex items-center justify-center text-red-600 font-bold">Akses Ditolak. Login sebagai Admin.</div>;
  }
  return <>{children}</>;
};

const Layout = () => {
  const location = useLocation();
  // Sembunyikan Navbar/Footer di halaman login dan admin
  const isSpecialPage = location.pathname === '/login' || location.pathname === '/admin';

  return (
    <>
      {!isSpecialPage && <Navbar />}
      <Routes>
        <Route path="/" element={<Home />} />
        <Route path="/search" element={<SearchPage />} />
        <Route path="/programs" element={<Programs />} />
        <Route path="/programs/:id" element={<ScholarshipDetail />} />
        <Route path="/articles" element={<Articles />} />
        <Route path="/articles/:id" element={<ArticleDetail />} />
        <Route path="/about" element={<About />} />
        <Route path="/login" element={<Login />} />
        <Route
          path="/admin"
          element={
            <ProtectedAdminRoute>
              <AdminDashboard />
            </ProtectedAdminRoute>
          }
        />
      </Routes>
      {!isSpecialPage && <Footer />}
    </>
  );
};

const App: React.FC = () => {
  return (
    <AppProvider>
      <Layout />
    </AppProvider>
  );
};

export default App;