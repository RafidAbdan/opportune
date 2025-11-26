import React from 'react';
import { useParams, useNavigate } from 'react-router-dom';
import { ArrowLeft, Calendar, User, Tag, Share2 } from 'lucide-react';
import { initialArticles } from '../data/mockData';

const ArticleDetail: React.FC = () => {
    const { id } = useParams<{ id: string }>();
    const navigate = useNavigate();

    const article = initialArticles.find(a => a.id === id);

    if (!article) {
        return (
            <div className="min-h-screen flex flex-col items-center justify-center bg-gray-50">
                <h2 className="text-2xl font-bold text-gray-900 mb-4">Artikel Tidak Ditemukan</h2>
                <button
                    onClick={() => navigate('/articles')}
                    className="text-primary hover:underline flex items-center"
                >
                    <ArrowLeft size={16} className="mr-2" /> Kembali ke Artikel
                </button>
            </div>
        );
    }

    return (
        <div className="min-h-screen bg-white pt-20 pb-12">
            <article className="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">

                <button
                    onClick={() => navigate('/articles')}
                    className="mb-8 flex items-center text-gray-500 hover:text-primary transition group"
                >
                    <ArrowLeft size={20} className="mr-2 group-hover:-translate-x-1 transition-transform" />
                    Kembali ke Daftar Artikel
                </button>

                {/* Header */}
                <header className="mb-10">
                    <div className="flex items-center space-x-2 mb-4">
                        <span className="bg-blue-100 text-primary px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wide">
                            {article.category}
                        </span>
                    </div>
                    <h1 className="text-3xl sm:text-4xl md:text-5xl font-extrabold text-gray-900 mb-6 leading-tight">
                        {article.title}
                    </h1>

                    <div className="flex items-center justify-between border-b border-gray-100 pb-8">
                        <div className="flex items-center space-x-6">
                            <div className="flex items-center text-gray-500 text-sm">
                                <User size={16} className="mr-2" />
                                <span className="font-medium text-gray-900">{article.author}</span>
                            </div>
                            <div className="flex items-center text-gray-500 text-sm">
                                <Calendar size={16} className="mr-2" />
                                <span>{article.date}</span>
                            </div>
                        </div>
                        <button className="text-gray-400 hover:text-primary transition">
                            <Share2 size={20} />
                        </button>
                    </div>
                </header>

                {/* Featured Image */}
                <div className="mb-10 rounded-2xl overflow-hidden shadow-lg">
                    <img
                        src={article.image}
                        alt={article.title}
                        className="w-full h-auto object-cover"
                    />
                </div>

                {/* Content */}
                <div className="prose prose-lg prose-blue max-w-none text-gray-700">
                    <p className="lead text-xl text-gray-600 mb-8 font-light">
                        {article.excerpt}
                    </p>
                    <p>
                        {article.content}
                    </p>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    </p>
                    <h3>Poin Penting</h3>
                    <ul>
                        <li>Persiapkan dokumen jauh-jauh hari.</li>
                        <li>Riset mendalam tentang universitas tujuan.</li>
                        <li>Latihan wawancara dengan teman atau mentor.</li>
                    </ul>
                    <p>
                        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </p>
                </div>

            </article>
        </div>
    );
};

export default ArticleDetail;
