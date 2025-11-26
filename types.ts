// Definisi Tipe Data untuk Aplikasi

export interface Scholarship {
  id: string;
  title: string;
  provider: string;
  category: 'Nasional' | 'Internasional';
  deadline: string;
  degree: string; // S1, S2, D3, dll
  description: string;
  image: string;
  field: 'Teknologi' | 'Kesehatan' | 'Seni' | 'Lingkungan' | 'Bisnis' | 'Pendidikan' | 'Sosial' | 'Umum';
}

export interface Article {
  id: string;
  title: string;
  excerpt: string;
  content: string;
  image: string;
  date: string;
  category: string;
  author: string;
}

export interface TeamMember {
  id: string;
  name: string;
  role: string;
  bio: string;
  image: string;
}

export interface User {
  id: string;
  name: string;
  email: string;
  password?: string; // Disimpan untuk simulasi, jangan lakukan ini di production!
  role: 'user' | 'admin' | 'executive';
}

export interface AuthState {
  user: User | null;
  isAuthenticated: boolean;
  isAdmin: boolean;
  isExecutive: boolean; // Untuk akses data sensitif
}

export interface PersonalizationCriteria {
  gpa: number;
  educationLevel: string;
  major: string;
}