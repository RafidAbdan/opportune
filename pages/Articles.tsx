import React, { useState } from 'react';
import { Link } from 'react-router-dom';
import { Calendar, User, Tag, ArrowRight, Search } from 'lucide-react';
import { initialArticles } from '../data/mockData';

const Articles: React.FC = () => {
    const [searchTerm, setSearchTerm] = useState('');
    const [selectedCategory, setSelectedCategory] = useState<string | null>(null);

    // Extract unique categories
    const categories = Array.from(new Set(initialArticles.map(a => a.category)));

    // Filter articles
    const filteredArticles = initialArticles.filter(article => {
        const matchesSearch = article.title.toLowerCase().includes(searchTerm.toLowerCase()) ||
            article.excerpt.toLowerCase().includes(searchTerm.toLowerCase());
        const matchesCategory = selectedCategory ? article.category === selectedCategory : true;
        return matchesSearch && matchesCategory;
    });

    return (
        <div className="min-h-screen bg-gray-50 pt-20 pb-12">
            <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

                {/* Header */}
                <div className="text-center mb-12">
                    <h1 className="text-3xl font-bold text-gray-900 sm:text-4xl">Artikel & Tips Beasiswa</h1>
                    <p className="mt-4 text-xl text-gray-600 max-w-2xl mx-auto">
                        Panduan lengkap, tips wawancara, dan cerita inspiratif dari para awardee untuk membantumu meraih impian.
                    </p>
                </div>

                <div className="grid grid-cols-1 lg:grid-cols-4 gap-8">

                    {/* Main Content - Article Grid */}
                    <div className="lg:col-span-3">
                        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            {filteredArticles.length > 0 ? (
                                filteredArticles.map(article => (
                                    <div key={article.id} className="bg-white rounded-xl shadow-sm overflow-hidden hover:shadow-md transition flex flex-col h-full">
                                        <div className="relative h-48">
                                            <img
                                                src={article.image}
                                                alt={article.title}
                                                className="w-full h-full object-cover"
                                            />
                                            <div className="absolute top-4 left-4 bg-white/90 backdrop-blur-sm px-3 py-1 rounded-full text-xs font-bold text-primary shadow-sm">
                                                {article.category}
                                            </div>
                                        </div>
                                        <div className="p-6 flex-1 flex flex-col">
                                            <div className="flex items-center text-xs text-gray-500 mb-3 space-x-4">
                                                <div className="flex items-center">
                                                    <Calendar size={14} className="mr-1" />
                                                    {article.date}
                                                </div>
                                                <div className="flex items-center">
                                                    <User size={14} className="mr-1" />
                                                    {article.author}
                                                </div>
                                            </div>
                                            <h3 className="text-xl font-bold text-gray-900 mb-3 line-clamp-2 hover:text-primary transition">
                                                <Link to={`/articles/${article.id}`}>{article.title}</Link>
                                            </h3>
                                            <p className="text-gray-600 text-sm mb-4 line-clamp-3 flex-1">
                                                {article.excerpt}
                                            </p>
                                            <Link
                                                to={`/articles/${article.id}`}
                                                className="inline-flex items-center text-primary font-semibold hover:text-blue-800 transition mt-auto"
                                            >
                                                Baca Selengkapnya <ArrowRight size={16} className="ml-2" />
                                            </Link>
                                        </div>
                                    </div>
                                ))
                            ) : (
                                <div className="col-span-full text-center py-12 bg-white rounded-xl border border-dashed border-gray-300">
                                    <p className="text-gray-500">Tidak ada artikel yang ditemukan.</p>
                                </div>
                            )}
                        </div>
                    </div>

                    {/* Sidebar */}
                    <div className="lg:col-span-1 space-y-8">

                        {/* Search Widget */}
                        <div className="bg-white p-6 rounded-xl shadow-sm">
                            <h3 className="font-bold text-gray-900 mb-4">Cari Artikel</h3>
                            <div className="relative">
                                <input
                                    type="text"
                                    placeholder="Kata kunci..."
                                    className="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-primary focus:border-primary"
                                    value={searchTerm}
                                    onChange={(e) => setSearchTerm(e.target.value)}
                                />
                                <Search className="absolute left-3 top-2.5 text-gray-400" size={18} />
                            </div>
                        </div>

                        {/* Categories Widget */}
                        <div className="bg-white p-6 rounded-xl shadow-sm">
                            <h3 className="font-bold text-gray-900 mb-4">Kategori</h3>
                            <ul className="space-y-2">
                                <li>
                                    <button
                                        onClick={() => setSelectedCategory(null)}
                                        className={`w-full text-left px-3 py-2 rounded-lg transition flex items-center justify-between ${selectedCategory === null ? 'bg-blue-50 text-primary font-medium' : 'text-gray-600 hover:bg-gray-50'}`}
                                    >
                                        <span>Semua Kategori</span>
                                        <span className="bg-gray-100 text-gray-500 text-xs px-2 py-0.5 rounded-full">{initialArticles.length}</span>
                                    </button>
                                </li>
                                {categories.map(cat => (
                                    <li key={cat}>
                                        <button
                                            onClick={() => setSelectedCategory(cat)}
                                            className={`w-full text-left px-3 py-2 rounded-lg transition flex items-center justify-between ${selectedCategory === cat ? 'bg-blue-50 text-primary font-medium' : 'text-gray-600 hover:bg-gray-50'}`}
                                        >
                                            <span>{cat}</span>
                                            <span className="bg-gray-100 text-gray-500 text-xs px-2 py-0.5 rounded-full">
                                                {initialArticles.filter(a => a.category === cat).length}
                                            </span>
                                        </button>
                                    </li>
                                ))}
                            </ul>
                        </div>

                        {/* Newsletter Widget (Dummy) */}
                        <div className="bg-primary p-6 rounded-xl shadow-lg text-white">
                            <h3 className="font-bold text-lg mb-2">Newsletter</h3>
                            <p className="text-blue-100 text-sm mb-4">Dapatkan info beasiswa terbaru langsung di inboxmu.</p>
                            <input
                                type="email"
                                placeholder="Email kamu"
                                className="w-full px-4 py-2 rounded-lg text-gray-900 mb-2 focus:outline-none"
                            />
                            <button className="w-full bg-blue-800 hover:bg-blue-900 text-white font-bold py-2 rounded-lg transition">
                                Langganan
                            </button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    );
};

export default Articles;
