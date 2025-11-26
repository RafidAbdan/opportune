import React from 'react';
import { Scholarship } from '../types';
import { Calendar, Award, BookOpen } from 'lucide-react';
import { Link } from 'react-router-dom';

interface Props {
  data: Scholarship;
}

const ScholarshipCard: React.FC<Props> = ({ data }) => {
  return (
    <div className="bg-white rounded-xl shadow-md hover:shadow-xl transition-shadow duration-300 overflow-hidden flex flex-col h-full border border-gray-100">
      {/* Gambar Header */}
      <div className="h-48 overflow-hidden relative group">
        <img
          src={data.image}
          alt={data.title}
          className="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500"
        />
        <div className="absolute top-4 right-4 bg-primary text-white text-xs font-bold px-3 py-1 rounded-full shadow-md">
          {data.category}
        </div>
      </div>

      {/* Konten */}
      <div className="p-6 flex-grow flex flex-col">
        <div className="mb-4">
          <p className="text-sm text-blue-600 font-semibold mb-1">{data.provider}</p>
          <h3 className="text-xl font-bold text-gray-800 leading-tight mb-2 line-clamp-2">{data.title}</h3>
          <p className="text-gray-600 text-sm line-clamp-3 mb-4 flex-grow">
            {data.description}
          </p>
        </div>

        {/* Info Tambahan */}
        <div className="flex items-center justify-between text-xs text-gray-500 border-t pt-4 mt-auto">
          <div className="flex items-center" title="Jenjang">
            <Award size={14} className="mr-1 text-primary" />
            <span>{data.degree}</span>
          </div>
          <div className="flex items-center" title="Batas Waktu">
            <Calendar size={14} className="mr-1 text-red-500" />
            <span>{new Date(data.deadline).toLocaleDateString('id-ID')}</span>
          </div>
        </div>

        <Link
          to={`/programs/${data.id}`}
          className="mt-4 block w-full text-center bg-transparent border-2 border-primary text-primary hover:bg-primary hover:text-white font-semibold py-2 rounded-lg transition-colors duration-300"
        >
          Lihat Detail
        </Link>
      </div>
    </div>
  );
};

export default ScholarshipCard;