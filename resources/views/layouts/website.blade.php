<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="keywords" content="{{ $siteSettings->meta_keyword ?? '' }}">
    <meta name="description" content="{{ $siteSettings->meta_description ?? '' }}">

    <title>{{ $siteSettings->title ?? config('app.name', 'Laravel') }} | IT Solutions</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root {
            --theme-color-1: {{ $siteSettings->theme_color_1 ?? '#6366f1' }};
            --theme-color-2: {{ $siteSettings->theme_color_2 ?? '#8b5cf6' }};
        }

        body {
            font-family: 'Inter', sans-serif;
            scroll-behavior: smooth;
        }

        .text-brand-gradient {
            background: linear-gradient(135deg, var(--theme-color-1), var(--theme-color-2));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .bg-gradient-brand {
            background: linear-gradient(135deg, var(--theme-color-1), var(--theme-color-2));
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--theme-color-1), var(--theme-color-2));
            color: white;
            padding: 14px 36px;
            border-radius: 50px;
            font-weight: 800;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            display: inline-block;
            text-decoration: none;
            letter-spacing: -0.01em;
        }

        .btn-primary:hover {
            transform: translateY(-4px) scale(1.02);
            box-shadow: 0 20px 40px rgba(99, 102, 241, 0.2);
            filter: brightness(1.1);
        }

        /* Glassmorphism Header */
        header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        }

        header.scrolled {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(20px);
            padding: 10px 0;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.03);
            border-bottom: 1px solid rgba(255, 255, 255, 0.3);
        }

        .nav-link {
            color: #1e293b;
            font-weight: 500;
            transition: color 0.3s;
            text-decoration: none;
            margin: 0 15px;
        }

        .nav-link:hover {
            color: var(--theme-color-1);
        }

        /* Footer */
        footer {
            background: #0f172a;
            color: #94a3b8;
            padding: 80px 0 40px;
        }

        .footer-logo {
            font-size: 24px;
            font-weight: 800;
            color: #fff;
            margin-bottom: 20px;
        }

        .footer-link {
            color: #94a3b8;
            text-decoration: none;
            transition: color 0.3s;
            display: block;
            margin-bottom: 10px;
        }

        .footer-link:hover {
            color: #fff;
        }

        .section-title {
            font-size: 36px;
            font-weight: 800;
            color: #0f172a;
            margin-bottom: 20px;
            text-align: center;
        }

        .section-subtitle {
            font-size: 16px;
            color: #64748b;
            text-align: center;
            max-width: 600px;
            margin: 0 auto 50px;
        }
    </style>
</head>
<body class="antialiased">
    <!-- Header -->
    <header id="main-header">
        <div class="container mx-auto px-6 py-6 flex justify-between items-center transition-all duration-300">
            <a href="/" class="flex items-center gap-3 group">
                <div class="w-12 h-12 bg-gradient-brand rounded-2xl flex items-center justify-center shadow-xl group-hover:scale-110 transition-transform">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
                <span class="text-2xl font-black text-[#0f172a] tracking-tight group-hover:text-indigo-600 transition-colors">
                    {{ $siteSettings->title ?? config('app.name') }}
                </span>
            </a>

            <nav class="hidden md:flex items-center gap-2">
                <a href="#about" class="px-5 py-2 text-slate-600 font-bold hover:text-indigo-600 transition-colors">About</a>
                <a href="#services" class="px-5 py-2 text-slate-600 font-bold hover:text-indigo-600 transition-colors">Services</a>
                <a href="#contact" class="px-5 py-2 text-slate-600 font-bold hover:text-indigo-600 transition-colors">Contact</a>
                <div class="h-6 w-px bg-slate-200 mx-4"></div>
                @auth
                    <a href="{{ url('/dashboard') }}" class="btn-primary">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full border-2 border-indigo-500 text-indigo-600 font-bold hover:bg-indigo-50 transition-colors text-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M18 12H9m0 0l3-3m-3 3l3 3" />
                        </svg>
                        Admin Login
                    </a>
                    <a href="{{ route('register') }}" class="btn-primary ml-2 shadow-lg shadow-indigo-100">Get Started</a>
                @endauth
            </nav>

            <button class="md:hidden text-[#0f172a] p-2 hover:bg-slate-50 rounded-xl transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
            </button>
        </div>
    </header>

    <main>
        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer class="bg-[#0f172a] text-slate-400 py-24 border-t border-slate-800">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-16 mb-20">
                <div class="space-y-8">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-indigo-600 rounded-xl flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                        <span class="text-2xl font-black text-white tracking-tight">
                            {{ $siteSettings->title ?? config('app.name') }}
                        </span>
                    </div>
                    <p class="text-lg leading-relaxed font-medium">
                        {{ $siteSettings->meta_description ?? 'Revolutionizing industries through exceptional technical innovation and visionary digital architecture.' }}
                    </p>
                    <div class="flex gap-4">
                        @foreach(['facebook', 'twitter', 'linkedin', 'github'] as $social)
                        <a href="#" class="w-12 h-12 rounded-2xl bg-slate-800/50 flex items-center justify-center hover:bg-indigo-600 hover:text-white transition-all">
                            <span class="sr-only">{{ $social }}</span>
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                                <path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm-2 16h-2v-6h2v6zm-1-6.891c-.607 0-1.1-.493-1.1-1.1s.493-1.1 1.1-1.1 1.1.493 1.1 1.1-.493 1.1-1.1 1.1zm9 6.891h-2v-3.446c0-1.902-2.236-1.755-2.236 0v3.446h-2v-6h2v1.02c.379-.705 1.089-1.213 1.884-1.213 1.3 0 2.352 1.052 2.352 2.352v3.841z"/>
                            </svg>
                        </a>
                        @endforeach
                    </div>
                </div>
                <div>
                    <h4 class="text-white font-black text-xl mb-10">Ecosystem</h4>
                    <ul class="space-y-4 font-bold">
                        <li><a href="#about" class="hover:text-indigo-400 transition-colors">Our Vision</a></li>
                        <li><a href="#services" class="hover:text-indigo-400 transition-colors">Global Services</a></li>
                        <li><a href="#" class="hover:text-indigo-400 transition-colors">Tech Stack</a></li>
                        <li><a href="#" class="hover:text-indigo-400 transition-colors">Security</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-white font-black text-xl mb-10">Company</h4>
                    <ul class="space-y-4 font-bold">
                        <li><a href="#blog" class="hover:text-indigo-400 transition-colors">Insights</a></li>
                        <li><a href="#" class="hover:text-indigo-400 transition-colors">Careers</a></li>
                        <li><a href="#" class="hover:text-indigo-400 transition-colors">Brand Assets</a></li>
                        <li><a href="#" class="hover:text-indigo-400 transition-colors">Partners</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-white font-black text-xl mb-10">Inspiration</h4>
                    <p class="mb-8 font-medium italic">"The best way to predict the future is to create it."</p>
                    <div class="relative group">
                        <input type="email" placeholder="Join our network" class="w-full bg-slate-800/50 border-none rounded-2xl px-6 py-5 text-base font-bold text-white focus:ring-2 focus:ring-indigo-600 transition-all placeholder:text-slate-500">
                        <button class="absolute right-2 top-2 bottom-2 bg-indigo-600 text-white px-6 rounded-xl font-black hover:bg-indigo-500 transition shadow-lg">Join</button>
                    </div>
                </div>
            </div>
            <div class="pt-10 border-t border-slate-800 flex flex-col md:flex-row justify-between items-center gap-6">
                <div class="text-sm font-bold opacity-60">
                    &copy; {{ date('Y') }} {{ $siteSettings->title ?? config('app.name') }}. Architected with passion.
                </div>
                <div class="flex gap-8 text-sm font-bold opacity-60">
                    <a href="#" class="hover:text-white transition-colors">Privacy Policy</a>
                    <a href="#" class="hover:text-white transition-colors">Terms of Service</a>
                </div>
            </div>
        </div>
    </footer>

    <script>
        window.addEventListener('scroll', function() {
            const header = document.getElementById('main-header');
            if (window.scrollY > 50) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });
    </script>
</body>
</html>
