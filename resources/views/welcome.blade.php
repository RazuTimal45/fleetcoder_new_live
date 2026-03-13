<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $siteSettings->title ?? 'FleetCoders' }} | Elite IT Solutions &amp; Innovation</title>
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('apple-touch-icon.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #ffffff;
        }

        .glass {
            background: rgba(255, 255, 255, 0.75);
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
            border: 1px solid rgba(255, 255, 255, 0.4);
        }

        .text-gradient {
            background: linear-gradient(135deg, {{ $siteSettings->theme_color_1 ?? '#4f46e5' }} 0%, {{ $siteSettings->theme_color_2 ?? '#7c3aed' }} 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .bg-gradient-premium {
            background: linear-gradient(135deg, {{ $siteSettings->theme_color_1 ?? '#4f46e5' }} 0%, {{ $siteSettings->theme_color_2 ?? '#7c3aed' }} 100%);
        }

        .bg-gradient-dark {
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
        }

        .btn-premium {
            background: linear-gradient(135deg, {{ $siteSettings->theme_color_1 ?? '#6366f1' }} 0%, {{ $siteSettings->theme_color_2 ?? '#8b5cf6' }} 100%);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .btn-premium:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 40px rgba(99, 102, 241, 0.3);
        }

        .reveal {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.8s cubic-bezier(0.22, 1, 0.36, 1);
        }

        .reveal.active {
            opacity: 1;
            transform: translateY(0);
        }

        .section-padding {
            padding-top: 140px;
            padding-bottom: 140px;
        }

        @media (max-width: 768px) {
            .section-padding {
                padding-top: 80px;
                padding-bottom: 80px;
            }
        }

        .floating {
            animation: floating 4s ease-in-out infinite;
        }

        @keyframes floating {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-15px); }
            100% { transform: translateY(0px); }
        }
        
        nav.scrolled {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(12px);
            padding: 14px 0;
            box-shadow: 0 4px 40px rgba(0, 0, 0, 0.08);
        }

        /* ── Mobile-first font & spacing overrides (≤ 640px) ── */
        @media (max-width: 640px) {

            /* Hero */
            .hero-badge-text { font-size: 10px; letter-spacing: 0.15em; }
            .hero-cta-primary { padding: 14px 28px; font-size: 1rem; border-radius: 1.25rem; }
            .hero-cta-secondary { font-size: 0.95rem; }

            /* Stats */
            .stat-number { font-size: 2.25rem; }
            .stat-label  { font-size: 9px; }

            /* Services */
            .service-card-new { transition: all 0.5s cubic-bezier(0.25, 1, 0.5, 1); }
            .service-card-new:hover { transform: translateY(-16px); }
            .service-icon-new { box-shadow: 0 10px 30px -10px rgba(99, 102, 241, 0.5); }
            .service-card-new h4 { font-size: 1.5rem; }
            .service-card-new p  { font-size: 0.95rem; }

            /* About */
            .about-badge { font-size: 9px; }
            .about-badge-card .badge-num  { font-size: 1.5rem; }
            .about-badge-card .badge-label { font-size: 1rem; }
            .about-cta { padding: 14px 28px; font-size: 1rem; }

            /* Contact */
            .contact-card { padding: 28px 20px; border-radius: 2rem; }
            .contact-card h4 { font-size: 1.5rem; }
            .contact-card input,
            .contact-card textarea { font-size: 1rem; padding-top: 14px; padding-bottom: 14px; }
            .contact-submit { font-size: 1rem; padding-top: 16px; padding-bottom: 16px; border-radius: 1rem; }
            .contact-info h4 { font-size: 1.1rem; }
            .contact-info p  { font-size: 0.9rem; }

            /* Footer */
            .footer-brand-name { font-size: 1.5rem; }
            .footer-body       { font-size: 1rem; }
            .footer-heading    { font-size: 1.1rem; }
            .footer-list       { font-size: 0.95rem; }
        }

        /* ── Tablet (641px – 767px) ── */
        @media (min-width: 641px) and (max-width: 767px) {
            .service-card-new { padding: 0; }
            .contact-card { padding: 36px 28px; border-radius: 2.5rem; }
        }
    </style>
</head>
<body class="antialiased text-slate-900 overflow-x-hidden">
    <!-- Navigation -->
    <nav id="navbar" class="fixed w-full top-0 z-50 transition-all duration-500 py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-10">
            <div class="flex justify-between items-center">
                <div class="flex items-center gap-3 sm:gap-4 group cursor-pointer">
                    <div class="w-10 h-10 sm:w-12 sm:h-12 bg-gradient-premium rounded-2xl flex items-center justify-center shadow-xl shadow-indigo-200 group-hover:scale-110 transition-transform">
                        <img src="{{ asset('logo-white.png') }}" alt="FleetCoders Logo" class="w-6 h-6 sm:w-8 sm:h-8">
                    </div>
                    <span class="text-xl sm:text-2xl md:text-3xl font-black tracking-tighter text-slate-900">{{ $siteSettings->title ?? 'FleetCoders' }}</span>
                </div>
                
                <div class="hidden md:flex items-center space-x-8 lg:space-x-12">
                    <a href="#home"     class="text-sm font-black text-slate-600 hover:text-indigo-600 transition-colors uppercase tracking-[0.2em]">Home</a>
                    <a href="#services" class="text-sm font-black text-slate-600 hover:text-indigo-600 transition-colors uppercase tracking-[0.2em]">Capabilities</a>
                    <a href="#about"    class="text-sm font-black text-slate-600 hover:text-indigo-600 transition-colors uppercase tracking-[0.2em]">Our DNA</a>
                    <a href="#contact"  class="px-6 lg:px-10 py-3 lg:py-4 bg-gradient-premium text-white rounded-2xl text-[10px] font-black uppercase tracking-[0.3em] shadow-2xl shadow-indigo-200 hover:scale-110 active:scale-95 transition-all">Launch Project</a>
                </div>

                <div class="md:hidden">
                    <button id="mobile-menu-btn" class="text-slate-900 p-2">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 8h16M4 16h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden absolute top-full left-0 w-full bg-white/95 backdrop-blur-xl shadow-2xl px-6 py-8 transition-all duration-300">
            <div class="flex flex-col space-y-5 text-center">
                <a href="#home"     class="text-lg font-black text-slate-900 py-2 border-b border-slate-100">Home</a>
                <a href="#services" class="text-lg font-black text-slate-900 py-2 border-b border-slate-100">Capabilities</a>
                <a href="#about"    class="text-lg font-black text-slate-900 py-2 border-b border-slate-100">About Our DNA</a>
                <a href="#contact"  class="w-full py-4 bg-gradient-premium text-white font-black rounded-2xl text-base shadow-xl shadow-indigo-100">Get in Touch</a>
            </div>
        </div>
    </nav>

    @php
        $defaultOrder = ['home', 'stats', 'services', 'about', 'contact'];
        $sectionOrder = $siteSettings->section_order ?? $defaultOrder;
        
        // Ensure all sections are present even if not in DB order
        foreach($defaultOrder as $def) {
            if(!in_array($def, $sectionOrder)) $sectionOrder[] = $def;
        }
    @endphp

    <div id="draggable-container">
        @foreach($sectionOrder as $sectionId)
            @if($sectionId === 'home')
                <!-- Hero Section -->
                <section id="home" data-id="home" class="relative min-h-screen flex items-center pt-28 sm:pt-32 overflow-hidden bg-slate-50">
                    <div class="absolute top-0 right-0 w-2/3 h-full bg-gradient-to-l from-indigo-50/70 to-transparent -z-0"></div>
                    <div class="absolute -top-32 -left-32 w-[600px] h-[600px] bg-indigo-100/40 rounded-full blur-[160px] -z-0"></div>

                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-10 relative z-10 w-full">
                        <div class="flex flex-col lg:flex-row items-center gap-12 sm:gap-16 lg:gap-24 xl:gap-32">
                            <div class="lg:w-3/5 reveal w-full">
                                <!-- Badge -->
                                <div class="inline-flex items-center gap-3 sm:gap-4 px-4 sm:px-6 py-2 sm:py-3 rounded-full bg-white shadow-sm border border-slate-100 mb-8 sm:mb-12">
                                    <span class="relative flex h-2.5 w-2.5 sm:h-3 sm:w-3">
                                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-indigo-400 opacity-75"></span>
                                        <span class="relative inline-flex rounded-full h-2.5 w-2.5 sm:h-3 sm:w-3 bg-indigo-600"></span>
                                    </span>
                                    <span class="hero-badge-text text-[10px] font-black text-indigo-700 uppercase tracking-[0.2em] leading-none">Engineering Global Icons</span>
                                </div>

                                <!-- Hero Heading — fluid scale -->
                                <h1 class="text-[2.75rem] sm:text-6xl md:text-7xl lg:text-8xl xl:text-9xl font-black text-slate-900 leading-[0.9] mb-8 sm:mb-12 tracking-tighter">
                                    @php
                                        $heroTitle  = $siteSettings->hero_title ?? 'Innovate Without Limits.';
                                        $titleParts = explode(' ', $heroTitle);
                                        $lastWord   = array_pop($titleParts);
                                        $firstPart  = implode(' ', $titleParts);
                                    @endphp
                                    {{ $firstPart }} <br> <span class="text-gradient underline decoration-indigo-100 underline-offset-8">{{ $lastWord }}</span>
                                </h1>

                                <!-- Subtitle -->
                                <p class="text-base sm:text-lg md:text-xl lg:text-2xl text-slate-500 font-medium mb-10 sm:mb-16 leading-relaxed max-w-2xl">
                                    {{ $siteSettings->hero_subtitle ?? 'Elite technical craftsmanship meets visionary design. We build the architectures that define the next decade of digital excellence.' }}
                                </p>

                                <!-- CTAs -->
                                <div class="flex flex-wrap gap-5 sm:gap-8 items-center">
                                    <a href="#contact" class="hero-cta-primary btn-premium px-8 sm:px-14 lg:px-16 py-4 sm:py-6 lg:py-8 text-white text-base sm:text-xl lg:text-2xl font-black rounded-3xl sm:rounded-[2.5rem] shadow-2xl shadow-indigo-200">Start Building →</a>
                                    <a href="#services" class="hero-cta-secondary flex items-center gap-3 text-base sm:text-lg lg:text-xl font-black text-slate-900 hover:text-indigo-600 transition-all group">
                                        Our Capabilities 
                                        <svg class="w-5 h-5 sm:w-7 sm:h-7 group-hover:translate-x-3 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                        </svg>
                                    </a>
                                </div>
                            </div>

                            <div class="lg:w-2/5 relative reveal w-full max-w-sm sm:max-w-md lg:max-w-none mx-auto" style="transition-delay: 0.2s">
                                <div class="relative z-10 rounded-[3rem] sm:rounded-[4.5rem] overflow-hidden shadow-[0_60px_120px_-20px_rgba(0,0,0,0.2)] border-[10px] sm:border-[18px] border-white floating">
                                    <img src="{{ $siteSettings->hero_image ?? '/assets/images/hero.png' }}" alt="Engineering Innovation" class="w-full h-full object-cover aspect-[4/5] lg:aspect-square">
                                </div>
                                <div class="absolute -bottom-16 -right-16 w-80 h-80 bg-indigo-200 rounded-full blur-[120px] -z-0 opacity-40 animate-pulse"></div>
                            </div>
                        </div>
                    </div>
                </section>
            @endif

            @if($sectionId === 'stats')
                <!-- Stats Bar -->
                <div id="stats" data-id="stats" class="bg-gradient-premium py-12 sm:py-16 lg:py-24 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-full h-full opacity-10 blur-3xl scale-150 rotate-12 bg-white/20 -z-0"></div>
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-10 relative z-10">
                        <div class="grid grid-cols-2 lg:grid-cols-4 gap-8 sm:gap-12 lg:gap-16 text-center reveal">
                            @foreach($stats as $stat)
                            <div class="space-y-3 sm:space-y-4">
                                <div class="stat-number text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-black text-white tracking-tighter tabular-nums">{{ $stat->number }}</div>
                                <div class="stat-label text-[9px] sm:text-[10px] font-black text-indigo-100 uppercase tracking-[0.3em] sm:tracking-[0.4em] opacity-80">{{ $stat->label }}</div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif

            @if($sectionId === 'services')
                <!-- Services Section -->
                <section id="services" data-id="services" class="relative section-padding bg-white">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-10">
                        <div class="text-center mb-16 sm:mb-24 lg:mb-32 reveal">
                            <h2 class="text-[10px] font-black text-indigo-600 uppercase tracking-[0.4em] sm:tracking-[0.5em] mb-6 sm:mb-8">Technical Mastery</h2>
                            <h3 class="text-3xl sm:text-5xl md:text-6xl lg:text-8xl font-black text-slate-900 mb-6 sm:mb-10 tracking-tighter">Elite Capabilities.</h3>
                            <p class="text-base sm:text-lg lg:text-2xl text-slate-400 max-w-3xl mx-auto font-medium leading-relaxed">We don't just provide services; we engineer unfair advantages for our partners.</p>
                        </div>
                        
                        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 sm:gap-10 lg:gap-12">
                            @foreach($services as $index => $s)
                            <div class="service-card-new group relative reveal" style="transition-delay: {{ $index * 0.1 }}s">
                                <!-- Background Glow -->
                                <div class="absolute inset-0 bg-gradient-to-br from-indigo-500/10 to-purple-500/10 rounded-[3rem] blur-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-500 -z-10"></div>
                                
                                <div class="relative h-full glass p-8 sm:p-10 lg:p-12 rounded-[3rem] border border-white shadow-xl hover:shadow-2xl transition-all duration-500 flex flex-col items-start overflow-hidden">
                                    <!-- Top Right Accent -->
                                    <div class="absolute top-0 right-0 w-24 h-24 bg-gradient-to-bl from-indigo-50 opacity-50 rounded-bl-[4rem] group-hover:scale-125 transition-transform duration-700"></div>
                                    
                                    <!-- Icon / Number -->
                                    <div class="w-16 h-16 lg:w-20 lg:h-20 bg-gradient-premium rounded-2xl flex items-center justify-center text-white mb-10 shadow-lg shadow-indigo-200 group-hover:rotate-6 transition-transform duration-500">
                                        <div class="font-black text-2xl lg:text-3xl">
                                            @if(str_contains($s->icon ?? '', '<svg'))
                                                {!! $s->icon !!}
                                            @else
                                                {{ $s->icon ?? str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                                            @endif
                                        </div>
                                    </div>
                                    
                                    <h4 class="text-2xl lg:text-3xl font-black text-slate-900 mb-5 tracking-tight group-hover:text-indigo-600 transition-colors">{{ $s->title }}</h4>
                                    
                                    <p class="text-slate-500 text-base lg:text-lg leading-relaxed font-semibold mb-10 flex-grow opacity-80 group-hover:opacity-100 transition-opacity">
                                        {{ $s->description }}
                                    </p>
                                    
                                    <a href="#contact" class="inline-flex items-center gap-3 text-indigo-600 font-black text-xs tracking-[0.2em] uppercase group-hover:gap-5 transition-all">
                                        Precision Engineering 
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </section>
            @endif

            @if($sectionId === 'about')
                <!-- About Section -->
                <section id="about" data-id="about" class="section-padding bg-gradient-dark relative overflow-hidden">
                    <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/carbon-fibre.png')] -z-0"></div>
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-10 relative z-10 text-white">
                        <div class="flex flex-col lg:flex-row items-center gap-12 sm:gap-20 lg:gap-32">
                            <div class="lg:w-1/2 reveal w-full">
                                <div class="relative group">
                                    <img src="{{ $siteSettings->about_image ?? '/assets/images/coding.png' }}" alt="Collaborative Innovation" class="rounded-[3rem] sm:rounded-[4rem] lg:rounded-[5rem] shadow-[0_50px_100px_rgba(0,0,0,0.5)] w-full object-cover aspect-[4/3] relative z-10 transition-transform duration-1000 group-hover:scale-105 border-[8px] sm:border-[12px] border-white/5">
                                    <div class="absolute -top-10 sm:-top-16 -left-10 sm:-left-16 w-full h-full border-4 border-white/10 rounded-[3rem] sm:rounded-[5rem] -z-0"></div>
                                    <!-- Badge card -->
                                    <div class="about-badge-card absolute -bottom-8 sm:-bottom-12 -right-4 sm:-right-12 glass backdrop-blur-3xl p-5 sm:p-8 lg:p-12 rounded-[2rem] sm:rounded-[3.5rem] z-20 shadow-2xl border-white/10">
                                        <div class="flex items-center gap-4 sm:gap-8">
                                            <div class="badge-num w-14 h-14 sm:w-20 sm:h-20 lg:w-24 lg:h-24 bg-gradient-premium rounded-2xl sm:rounded-3xl flex items-center justify-center text-white font-black text-2xl sm:text-3xl lg:text-5xl">3+</div>
                                            <div class="pr-4 sm:pr-8">
                                                <div class="badge-label text-slate-900 font-black text-base sm:text-xl lg:text-2xl mb-1 sm:mb-2">Power Years</div>
                                                <div class="about-badge text-slate-500 font-black text-[9px] sm:text-[10px] uppercase tracking-[0.25em] sm:tracking-[0.3em] opacity-60">Elite Engineering</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="lg:w-1/2 reveal w-full mt-12 sm:mt-16 lg:mt-0" style="transition-delay: 0.2s">
                                <div class="about-badge text-[9px] sm:text-[10px] font-black text-indigo-400 uppercase tracking-[0.4em] sm:tracking-[0.5em] mb-6 sm:mb-10">Our Genetic Code</div>
                                <h3 class="text-3xl sm:text-5xl md:text-6xl lg:text-7xl xl:text-8xl font-black text-white mb-8 sm:mb-12 leading-[0.9] tracking-tighter">
                                    {{ $siteSettings->about_title ?? 'Built for the' }} <br> <span class="text-indigo-400 italic">{{ $siteSettings->about_subtitle ?? 'Visionaries.' }}</span>
                                </h3>
                                <p class="text-base sm:text-lg lg:text-2xl text-slate-400 mb-10 sm:mb-16 font-medium leading-relaxed opacity-80">
                                    {{ $siteSettings->about_description ?? "We don't just ship code; we build intellectual assets. Our philosophy is rooted in technical extreme transparency and radical innovation." }}
                                </p>
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 sm:gap-10 lg:gap-12 mb-10 sm:mb-16 lg:mb-20">
                                    @foreach(['Architectural Rigor', 'Zero-Trust Security', 'Extreme Scalability', 'Global Performance'] as $item)
                                    <div class="flex items-center gap-4 sm:gap-6 group">
                                        <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-full bg-white/5 flex items-center justify-center text-indigo-400 group-hover:bg-indigo-500 group-hover:text-white transition-all shadow-xl flex-shrink-0">
                                            <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M5 13l4 4L19 7" /></svg>
                                        </div>
                                        <span class="text-white font-black text-base sm:text-lg lg:text-xl tracking-tight opacity-90">{{ $item }}</span>
                                    </div>
                                    @endforeach
                                </div>
                                <a href="#contact" class="about-cta inline-block px-8 sm:px-14 lg:px-16 py-4 sm:py-6 lg:py-7 bg-white text-slate-900 font-black text-base sm:text-lg lg:text-xl rounded-full hover:scale-110 transition-all shadow-2xl shadow-indigo-900/50">Our Full Heritage</a>
                            </div>
                        </div>
                    </div>
                </section>
            @endif

            @if($sectionId === 'contact')
                <!-- Contact Section -->
                <section id="contact" data-id="contact" class="section-padding bg-slate-50 relative overflow-hidden">
                    <div class="absolute -bottom-48 -right-48 w-[600px] h-[600px] bg-indigo-100/30 rounded-full blur-[140px] -z-0"></div>
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-10">
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 sm:gap-24 lg:gap-32 items-start">
                            <!-- Contact Info -->
                            <div class="reveal contact-info">
                                <h3 class="text-[10px] font-black text-indigo-600 uppercase tracking-[0.4em] sm:tracking-[0.5em] mb-6 sm:mb-10">Get In Touch</h3>
                                <h2 class="text-3xl sm:text-5xl md:text-6xl lg:text-7xl font-black text-slate-900 mb-8 sm:mb-12 leading-[0.85] tracking-tighter">
                                    {{ $siteSettings->contact_title ?? 'Draft Your' }} <br> 
                                    <span class="text-gradient underline decoration-indigo-100 underline-offset-[10px] sm:underline-offset-[12px]">{{ $siteSettings->contact_subtitle ?? 'Iconic Project.' }}</span>
                                </h2>
                                <p class="text-base sm:text-lg lg:text-2xl text-slate-400 mb-12 sm:mb-20 font-medium leading-relaxed max-w-lg">Ready to engineer something legendary? Our team is standing by to translate your vision into robust reality.</p>

                                <div class="space-y-8 sm:space-y-14 lg:space-y-16">
                                    @foreach([
                                        ['title' => 'HQ Location', 'info' => $siteSettings->contact_address ?? '123 Innovation Drive, Silicon Valley', 'icon' => 'M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z'],
                                        ['title' => 'Channel', 'info' => $siteSettings->contact_email ?? ('hello@' . strtolower(str_replace(' ', '', $siteSettings->title ?? 'fleetcoders')) . '.com'), 'icon' => 'M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z']
                                    ] as $item)
                                    <div class="flex items-start gap-6 sm:gap-10 lg:gap-12 group">
                                        <div class="w-14 h-14 sm:w-16 sm:h-16 lg:w-20 lg:h-20 rounded-[1.5rem] sm:rounded-[2rem] lg:rounded-[2.5rem] bg-white shadow-2xl flex items-center justify-center text-indigo-600 flex-shrink-0 group-hover:scale-110 transition-transform duration-500 border border-slate-100">
                                            <svg class="w-6 h-6 sm:w-7 sm:h-7 lg:w-8 lg:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="{{ $item['icon'] }}" /></svg>
                                        </div>
                                        <div class="pt-1 sm:pt-2">
                                            <h4 class="text-slate-900 font-black text-lg sm:text-2xl lg:text-3xl mb-1 sm:mb-2">{{ $item['title'] }}</h4>
                                            <p class="text-slate-500 font-bold text-sm sm:text-base lg:text-xl leading-tight opacity-70">{{ $item['info'] }}</p>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>

                            <!-- Contact Form -->
                            <div class="reveal" style="transition-delay: 0.2s">
                                <div class="contact-card glass p-8 sm:p-14 lg:p-16 md:p-24 rounded-[3rem] sm:rounded-[4rem] lg:rounded-[5rem] shadow-[0_80px_150px_-30px_rgba(99,102,241,0.2)] border-white relative overflow-hidden">
                                    <div class="absolute top-0 right-0 w-60 h-60 bg-indigo-50/50 rounded-bl-[15rem] -z-0"></div>
                                    <h4 class="text-2xl sm:text-3xl lg:text-5xl font-black text-slate-900 mb-10 sm:mb-16 lg:mb-20 relative z-10 tracking-tighter">Draft Inquiry.</h4>

                                    <form id="contact-form" action="{{ route('contacts.store') }}" method="POST" class="space-y-8 sm:space-y-12 lg:space-y-16 relative z-10">
                                        @csrf
                                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-8 sm:gap-12 lg:gap-16">
                                            <div class="space-y-4 sm:space-y-6">
                                                <label class="text-[10px] font-black text-slate-400 uppercase tracking-[0.35em] sm:tracking-[0.4em]">Full Name</label>
                                                <input type="text" name="name" placeholder="Raju Timalsina" required class="w-full bg-transparent border-b-4 border-slate-100 focus:border-indigo-600 px-0 py-3 sm:py-5 lg:py-6 text-base sm:text-xl lg:text-2xl font-black transition-all outline-none">
                                            </div>
                                            <div class="space-y-4 sm:space-y-6">
                                                <label class="text-[10px] font-black text-slate-400 uppercase tracking-[0.35em] sm:tracking-[0.4em]">Work Email</label>
                                                <input type="email" name="email" placeholder="raju@company.com" required class="w-full bg-transparent border-b-4 border-slate-100 focus:border-indigo-600 px-0 py-3 sm:py-5 lg:py-6 text-base sm:text-xl lg:text-2xl font-black transition-all outline-none">
                                            </div>
                                        </div>
                                        <div class="space-y-4 sm:space-y-6">
                                            <label class="text-[10px] font-black text-slate-400 uppercase tracking-[0.35em] sm:tracking-[0.4em]">The Vision</label>
                                            <textarea name="message" rows="3" placeholder="Describe your challenge..." required class="w-full bg-transparent border-b-4 border-slate-100 focus:border-indigo-600 px-0 py-3 sm:py-5 lg:py-6 text-base sm:text-xl lg:text-2xl font-black transition-all outline-none resize-none"></textarea>
                                        </div>
                                        <button type="submit" class="contact-submit w-full py-5 sm:py-7 lg:py-10 bg-gradient-premium text-white font-black text-base sm:text-xl lg:text-3xl rounded-2xl sm:rounded-[1.5rem] lg:rounded-[2rem] shadow-2xl shadow-indigo-300 hover:scale-[1.03] active:scale-95 transition-all">Broadcast Inquiry →</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            @endif
        @endforeach
    </div>

    @if($siteSettings->is_editable)
        <div id="save-order-container" class="fixed bottom-10 left-1/2 -translate-x-1/2 z-[100] hidden">
            <button onclick="saveNewOrder()" class="btn-premium px-8 sm:px-10 py-4 sm:py-5 text-white font-black rounded-full shadow-2xl flex items-center gap-3 text-sm sm:text-base">
                <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                </svg>
                Save New Order
            </button>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var el = document.getElementById('draggable-container');
                var sortable = Sortable.create(el, {
                    animation: 250,
                    ghostClass: 'opacity-50',
                    onEnd: function() {
                        document.getElementById('save-order-container').classList.remove('hidden');
                    }
                });

                window.saveNewOrder = function() {
                    let order = [];
                    el.querySelectorAll('[data-id]').forEach(sec => {
                        order.push(sec.getAttribute('data-id'));
                    });

                    fetch('{{ route("dashboard.settings.updateOrder") }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({ order: order })
                    })
                    .then(res => res.json())
                    .then(data => {
                        if(data.success) {
                            alert('Site layout order saved successfully!');
                            location.reload();
                        }
                    });
                }
            });
        </script>
        <style>
            #draggable-container > * {
                cursor: move;
                position: relative;
            }
            #draggable-container > *:hover::after {
                content: 'Drag to reorder';
                position: absolute;
                top: 20px;
                left: 50%;
                transform: translateX(-50%);
                background: rgba(99, 102, 241, 0.9);
                color: white;
                padding: 4px 12px;
                border-radius: 20px;
                font-size: 10px;
                font-weight: 800;
                text-transform: uppercase;
                letter-spacing: 1px;
                z-index: 50;
            }
        </style>
    @endif

    <!-- Footer -->
    <footer class="bg-gradient-dark text-slate-400 pt-20 sm:pt-28 lg:pt-40 pb-12 sm:pb-16 lg:pb-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-10">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-12 sm:gap-16 lg:gap-24 mb-16 sm:mb-24 lg:mb-40">
                <div class="space-y-6 sm:space-y-8 lg:space-y-12">
                    <div class="flex items-center gap-3 sm:gap-5">
                        <div class="w-11 h-11 sm:w-14 sm:h-14 bg-gradient-premium rounded-2xl sm:rounded-3xl flex items-center justify-center shadow-2xl shadow-indigo-500/30">
                            <img src="{{ asset('logo-white.png') }}" alt="FleetCoders Logo" class="w-6 h-6 sm:w-8 sm:h-8">
                        </div>
                        <span class="footer-brand-name text-2xl sm:text-3xl lg:text-4xl font-black text-white tracking-tighter">{{ $siteSettings->title ?? 'FleetCoders' }}</span>
                    </div>
                    <p class="footer-body text-base sm:text-lg lg:text-2xl font-medium leading-relaxed opacity-60">Architecting elite digital environments for the global innovators of tomorrow.</p>
                </div>
                <div>
                    <h4 class="footer-heading text-white font-black text-lg sm:text-xl lg:text-2xl mb-7 sm:mb-10 lg:mb-12 tracking-tight">Expertise</h4>
                    <ul class="footer-list space-y-4 sm:space-y-5 lg:space-y-6 font-bold text-base sm:text-lg lg:text-xl">
                        @foreach($services->take(4) as $service)
                        <li><a href="#services" class="hover:text-indigo-400 transition-colors">{{ $service->title }}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="sm:col-span-2 lg:col-span-1">
                    <h4 class="footer-heading text-white font-black text-lg sm:text-xl lg:text-2xl mb-7 sm:mb-10 lg:mb-12 tracking-tight">The Edge</h4>
                    <p class="mb-8 sm:mb-10 lg:mb-12 font-medium italic opacity-60 text-base sm:text-base lg:text-lg">"Excellence is not an act, but a habit of the code."</p>
                    <div class="relative">
                        <input type="email" placeholder="Connect for insights" class="w-full bg-white/5 border-none rounded-2xl px-5 sm:px-8 py-4 sm:py-6 text-sm sm:text-base lg:text-lg font-black text-white focus:ring-4 focus:ring-indigo-600/50 transition-all placeholder:text-slate-600">
                        <button class="absolute top-2 right-2 bottom-2 bg-indigo-600 text-white px-5 sm:px-8 rounded-xl font-black hover:bg-indigo-500 transition shadow-2xl text-xs uppercase tracking-widest">Join</button>
                    </div>
                </div>
            </div>
            
            <div class="pt-10 sm:pt-14 lg:pt-16 border-t border-white/5 flex flex-col sm:flex-row justify-between items-center gap-6 sm:gap-8 lg:gap-10 text-xs sm:text-sm font-black uppercase tracking-[0.15em] sm:tracking-[0.2em] opacity-40">
                <p>&copy; {{ date('Y') }} {{ $siteSettings->title ?? 'FleetCoders' }}. Architecting Excellence.</p>
                <div class="flex gap-8 sm:gap-12 lg:gap-16">
                    <a href="#" class="hover:text-white transition-colors">Privacy DNA</a>
                    <a href="#" class="hover:text-white transition-colors">Terms of Scale</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Success Modal -->
    <div id="successModal" class="fixed inset-0 z-[100] flex items-center justify-center p-4 sm:p-6 hidden">
        <div class="absolute inset-0 bg-slate-900/60 backdrop-blur-xl" onclick="closeSuccessModal()"></div>
        <div class="glass max-w-xl w-full rounded-[3rem] sm:rounded-[4rem] p-10 sm:p-16 lg:p-20 text-center relative z-10 shadow-[0_100px_200px_rgba(0,0,0,0.4)] border-white/20 transform transition-all duration-700 scale-90 opacity-0" id="modalContent">
            <div class="w-20 h-20 sm:w-28 sm:h-28 lg:w-32 lg:h-32 bg-gradient-premium rounded-[2rem] sm:rounded-[2.5rem] flex items-center justify-center text-white mx-auto mb-8 sm:mb-12 shadow-2xl shadow-indigo-500/50">
                <svg class="w-10 h-10 sm:w-14 sm:h-14 lg:w-16 lg:h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                </svg>
            </div>
            <h4 class="text-2xl sm:text-4xl lg:text-5xl font-black text-slate-900 mb-4 sm:mb-6 tracking-tighter">Transmission Received.</h4>
            <p class="text-base sm:text-lg lg:text-xl text-slate-500 font-bold leading-relaxed mb-8 sm:mb-12 opacity-80">
                {{ session('contact_success') }}
            </p>
            <button onclick="closeSuccessModal()" class="w-full py-5 sm:py-6 lg:py-8 bg-slate-900 text-white font-black text-base sm:text-lg lg:text-xl rounded-2xl sm:rounded-3xl hover:bg-indigo-600 transition-colors shadow-2xl">Acknowledge</button>
        </div>
    </div>

    <script>
        function openSuccessModal() {
            const modal = document.getElementById('successModal');
            const content = document.getElementById('modalContent');
            modal.classList.remove('hidden');
            setTimeout(() => {
                content.classList.remove('scale-90', 'opacity-0');
                content.classList.add('scale-100', 'opacity-100');
            }, 50);
        }

        function closeSuccessModal() {
            const content = document.getElementById('modalContent');
            const modal = document.getElementById('successModal');
            content.classList.remove('scale-100', 'opacity-100');
            content.classList.add('scale-90', 'opacity-0');
            setTimeout(() => {
                modal.classList.add('hidden');
            }, 500);
        }

        @if(session('contact_success'))
            window.addEventListener('load', openSuccessModal);
        @endif

        const nav = document.getElementById('navbar');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                nav.classList.add('scrolled');
                nav.style.padding = '14px 0';
            } else {
                nav.classList.remove('scrolled');
                nav.style.padding = '32px 0';
            }
        });

        const revealCallback = (entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('active');
                    observer.unobserve(entry.target);
                }
            });
        };

        const revealObserver = new IntersectionObserver(revealCallback, {
            threshold: 0.1,
            rootMargin: '0px 0px -100px 0px'
        });

        document.querySelectorAll('.reveal').forEach(el => revealObserver.observe(el));

        const menuBtn = document.getElementById('mobile-menu-btn');
        const menu = document.getElementById('mobile-menu');
        menuBtn.addEventListener('click', () => {
            menu.classList.toggle('hidden');
        });

        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const targetId = this.getAttribute('href').slice(1);
                const target = document.getElementById(targetId);
                if (target) {
                    window.scrollTo({
                        top: target.offsetTop - 100,
                        behavior: 'smooth'
                    });
                    menu.classList.add('hidden');
                }
            });
        });
    </script>
</body>
</html>