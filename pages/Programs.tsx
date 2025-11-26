import React from 'react';
import ScholarshipCard from '../components/ScholarshipCard';
import { useApp } from '../contexts/AppContext';

const Programs: React.FC = () => {
  const { scholarships } = useApp();

  return (
    <div className="min-h-screen bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
      <div className="max-w-7xl mx-auto">
        <div className="text-center mb-12">
          <h1 className="text-3xl font-bold text-gray-900">Program Beasiswa Tersedia</h1>
          <p className="mt-4 text-gray-600">Temukan daftar lengkap peluang pendidikan di sini.</p>
        </div>

        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
          {scholarships.map(s => (
            <ScholarshipCard key={s.id} data={s} />
          ))}
        </div>
      </div>
    </div>
  );
};

export default Programs;