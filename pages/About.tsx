import React from 'react';
import { Mail, MapPin, Phone, Award, Users, Target } from 'lucide-react';
import { teamMembers } from '../data/mockData';

const About: React.FC = () => {
    return (
        <div className="min-h-screen bg-white">
            {/* Hero Section */}
            <div className="relative bg-primary py-20 sm:py-32">
                <div className="absolute inset-0 overflow-hidden">
                    <img
                        src="https://images.unsplash.com/photo-1521737604893-d14cc237f11d?auto=format&fit=crop&q=80&w=2000"
                        alt="About Hero"
                        className="w-full h-full object-cover opacity-20"
                    />
                </div>
                <div className="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                    <h1 className="text-4xl font-extrabold tracking-tight text-white sm:text-5xl lg:text-6xl">
                        Tentang Oppurtune
                    </h1>
                    <p className="mt-6 text-xl text-blue-100 max-w-3xl mx-auto">
                        Membuka pintu peluang pendidikan bagi putra-putri terbaik bangsa. Kami percaya pendidikan adalah hak setiap orang.
                    </p>
                </div>
            </div>

            {/* Mission & Vision */}
            <div className="py-16 bg-gray-50">
                <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div className="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
                        <div className="bg-white p-8 rounded-xl shadow-sm hover:shadow-md transition">
                            <div className="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4 text-primary">
                                <Target size={24} />
                            </div>
                            <h3 className="text-xl font-bold text-gray-900 mb-2">Misi Kami</h3>
                            <p className="text-gray-600">
                                Menyediakan akses informasi beasiswa yang transparan, akurat, dan mudah diakses oleh semua kalangan.
                            </p>
                        </div>
                        <div className="bg-white p-8 rounded-xl shadow-sm hover:shadow-md transition">
                            <div className="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4 text-primary">
                                <Users size={24} />
                            </div>
                            <h3 className="text-xl font-bold text-gray-900 mb-2">Komunitas</h3>
                            <p className="text-gray-600">
                                Membangun komunitas pencari beasiswa yang saling mendukung dan berbagi informasi positif.
                            </p>
                        </div>
                        <div className="bg-white p-8 rounded-xl shadow-sm hover:shadow-md transition">
                            <div className="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4 text-primary">
                                <Award size={24} />
                            </div>
                            <h3 className="text-xl font-bold text-gray-900 mb-2">Keunggulan</h3>
                            <p className="text-gray-600">
                                Platform terintegrasi dengan fitur personalisasi cerdas untuk mencocokkan profil dengan beasiswa.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            {/* Team Section */}
            <div className="py-16 bg-white">
                <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div className="text-center mb-12">
                        <h2 className="text-3xl font-bold text-gray-900">Tim Kami</h2>
                        <p className="mt-4 text-gray-600">Orang-orang hebat di balik Oppurtune.</p>
                    </div>
                    <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                        {teamMembers.map((member) => (
                            <div key={member.id} className="bg-gray-50 rounded-xl overflow-hidden shadow-sm hover:shadow-md transition group">
                                <div className="aspect-w-3 aspect-h-3">
                                    <img
                                        src={member.image}
                                        alt={member.name}
                                        className="w-full h-64 object-cover object-center group-hover:scale-105 transition duration-300"
                                    />
                                </div>
                                <div className="p-6">
                                    <h3 className="text-lg font-bold text-gray-900">{member.name}</h3>
                                    <p className="text-primary font-medium mb-2">{member.role}</p>
                                    <p className="text-gray-600 text-sm">{member.bio}</p>
                                </div>
                            </div>
                        ))}
                    </div>
                </div>
            </div>

            {/* Contact Section */}
            <div className="py-16 bg-gray-50">
                <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div className="grid grid-cols-1 lg:grid-cols-2 gap-12">
                        <div>
                            <h2 className="text-3xl font-bold text-gray-900 mb-6">Hubungi Kami</h2>
                            <p className="text-gray-600 mb-8">
                                Punya pertanyaan atau saran? Jangan ragu untuk menghubungi kami. Tim kami siap membantu Anda.
                            </p>

                            <div className="space-y-4">
                                <div className="flex items-start">
                                    <MapPin className="text-primary mt-1 mr-4" />
                                    <div>
                                        <h4 className="font-bold text-gray-900">Alamat</h4>
                                        <p className="text-gray-600">Jl. Pendidikan No. 123, Jakarta Selatan, Indonesia</p>
                                    </div>
                                </div>
                                <div className="flex items-start">
                                    <Phone className="text-primary mt-1 mr-4" />
                                    <div>
                                        <h4 className="font-bold text-gray-900">Telepon</h4>
                                        <p className="text-gray-600">+62 21 555 0123</p>
                                    </div>
                                </div>
                                <div className="flex items-start">
                                    <Mail className="text-primary mt-1 mr-4" />
                                    <div>
                                        <h4 className="font-bold text-gray-900">Email</h4>
                                        <p className="text-gray-600">info@oppurtune.com</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div className="bg-white p-8 rounded-xl shadow-lg">
                            <form className="space-y-6">
                                <div>
                                    <label htmlFor="name" className="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                                    <input type="text" id="name" className="mt-1 block w-full border-gray-300 rounded-md shadow-sm p-3 border focus:ring-primary focus:border-primary" placeholder="Nama Anda" />
                                </div>
                                <div>
                                    <label htmlFor="email" className="block text-sm font-medium text-gray-700">Email</label>
                                    <input type="email" id="email" className="mt-1 block w-full border-gray-300 rounded-md shadow-sm p-3 border focus:ring-primary focus:border-primary" placeholder="email@contoh.com" />
                                </div>
                                <div>
                                    <label htmlFor="message" className="block text-sm font-medium text-gray-700">Pesan</label>
                                    <textarea id="message" rows={4} className="mt-1 block w-full border-gray-300 rounded-md shadow-sm p-3 border focus:ring-primary focus:border-primary" placeholder="Tulis pesan Anda di sini..."></textarea>
                                </div>
                                <button type="button" className="w-full bg-primary text-white font-bold py-3 rounded-lg hover:bg-blue-900 transition shadow-md">
                                    Kirim Pesan
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
};

export default About;
