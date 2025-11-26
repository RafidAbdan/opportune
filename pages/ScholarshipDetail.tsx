import React from 'react';
import { useParams, useNavigate } from 'react-router-dom';
import { ArrowLeft, Calendar, Award, BookOpen, Globe, CheckCircle, ExternalLink } from 'lucide-react';
import { useApp } from '../contexts/AppContext';

const ScholarshipDetail: React.FC = () => {
    const { id } = useParams<{ id: string }>();
    const navigate = useNavigate();
    const { scholarships } = useApp();

    const scholarship = scholarships.find(s => s.id === id);

    if (!scholarship) {
        return (
            <div className="min-h-screen flex flex-col items-center justify-center bg-gray-50">
                <h2 className="text-2xl font-bold text-gray-900 mb-4">Beasiswa Tidak Ditemukan</h2>
                <button
                    onClick={() => navigate('/programs')}
                    className="text-primary hover:underline flex items-center"
                >
                    <ArrowLeft size={16} className="mr-2" /> Kembali ke Program
                </button>
            </div>
        );
    }

    return (
        <div className="min-h-screen bg-gray-50 pt-20 pb-12">
            <div className="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

                <button
                    onClick={() => navigate(-1)}
                    className="mb-6 flex items-center text-gray-600 hover:text-primary transition"
                >
                    <ArrowLeft size={20} className="mr-2" /> Kembali
                </button>

                <div className="bg-white rounded-2xl shadow-xl overflow-hidden">
                    {/* Hero Image */}
                    <div className="relative h-64 sm:h-80">
                        <img
                            src={scholarship.image}
                            alt={scholarship.title}
                            className="w-full h-full object-cover"
                        />
                        <div className="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent flex items-end">
                            <div className="p-8 text-white">
                                <div className="flex items-center space-x-2 mb-2">
                                    <span className="bg-blue-600 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wide">
                                        {scholarship.category}
                                    </span>
                                    <span className="bg-white/20 backdrop-blur-sm px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wide">
                                        {scholarship.field}
                                    </span>
                                </div>
                                <h1 className="text-3xl sm:text-4xl font-bold mb-2">{scholarship.title}</h1>
                                <p className="text-lg text-blue-100 flex items-center">
                                    <Globe size={18} className="mr-2" /> {scholarship.provider}
                                </p>
                            </div>
                        </div>
                    </div>

                    <div className="p-8">
                        {/* Key Info Grid */}
                        <div className="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-8 border-b border-gray-100 pb-8">
                            <div className="flex items-start">
                                <div className="bg-blue-50 p-3 rounded-lg text-primary mr-4">
                                    <Calendar size={24} />
                                </div>
                                <div>
                                    <p className="text-sm text-gray-500">Deadline</p>
                                    <p className="font-bold text-gray-900">{scholarship.deadline}</p>
                                </div>
                            </div>
                            <div className="flex items-start">
                                <div className="bg-blue-50 p-3 rounded-lg text-primary mr-4">
                                    <Award size={24} />
                                </div>
                                <div>
                                    <p className="text-sm text-gray-500">Jenjang</p>
                                    <p className="font-bold text-gray-900">{scholarship.degree}</p>
                                </div>
                            </div>
                            <div className="flex items-start">
                                <div className="bg-blue-50 p-3 rounded-lg text-primary mr-4">
                                    <BookOpen size={24} />
                                </div>
                                <div>
                                    <p className="text-sm text-gray-500">Tipe Pendanaan</p>
                                    <p className="font-bold text-gray-900">Full Funded</p>
                                </div>
                            </div>
                        </div>

                        {/* Description */}
                        <div className="mb-8">
                            <h2 className="text-2xl font-bold text-gray-900 mb-4">Tentang Beasiswa</h2>
                            <p className="text-gray-600 leading-relaxed text-lg">
                                {scholarship.description}
                            </p>
                            <p className="text-gray-600 leading-relaxed mt-4">
                                Program ini dirancang untuk memberikan kesempatan kepada individu berbakat yang memiliki potensi kepemimpinan yang kuat dan prestasi akademik yang unggul. Penerima beasiswa akan mendapatkan akses ke jaringan alumni global dan berbagai peluang pengembangan diri.
                            </p>
                        </div>

                        {/* Requirements (Dummy) */}
                        <div className="mb-8">
                            <h2 className="text-2xl font-bold text-gray-900 mb-4">Persyaratan Pendaftaran</h2>
                            <ul className="space-y-3">
                                {[
                                    "Warga Negara Indonesia (WNI)",
                                    "Usia maksimal 35 tahun pada saat mendaftar",
                                    "IPK minimal 3.00 (skala 4.00)",
                                    "Memiliki sertifikat kemampuan bahasa Inggris (TOEFL/IELTS)",
                                    "Sehat jasmani dan rohani",
                                    "Tidak sedang menerima beasiswa lain"
                                ].map((req, index) => (
                                    <li key={index} className="flex items-start">
                                        <CheckCircle size={20} className="text-green-500 mr-3 mt-0.5 flex-shrink-0" />
                                        <span className="text-gray-700">{req}</span>
                                    </li>
                                ))}
                            </ul>
                        </div>

                        {/* Action Buttons */}
                        <div className="flex flex-col sm:flex-row gap-4 pt-4 border-t border-gray-100">
                            <button className="flex-1 bg-primary text-white font-bold py-4 rounded-xl hover:bg-blue-900 transition shadow-lg flex items-center justify-center">
                                Daftar Sekarang <ExternalLink size={20} className="ml-2" />
                            </button>
                            <button className="flex-1 bg-white border-2 border-gray-200 text-gray-700 font-bold py-4 rounded-xl hover:bg-gray-50 transition flex items-center justify-center">
                                Simpan ke Favorit
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
};

export default ScholarshipDetail;
