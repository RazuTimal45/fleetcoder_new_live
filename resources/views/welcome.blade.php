<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $siteSettings->title ?? 'FleetCoders' }} | Elite IT Solutions & Innovation</title>
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
                padding-top: 100px;
                padding-bottom: 100px;
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
    </style>
</head>
<body class="antialiased text-slate-900 overflow-x-hidden">
    <!-- Navigation -->
    <nav id="navbar" class="fixed w-full top-0 z-50 transition-all duration-500 py-8">
        <div class="max-w-7xl mx-auto px-6 lg:px-10">
            <div class="flex justify-between items-center">
                <div class="flex items-center gap-4 group cursor-pointer">
                    <div class="w-12 h-12 bg-gradient-premium rounded-2xl flex items-center justify-center shadow-xl shadow-indigo-200 group-hover:scale-110 transition-transform">
                        <img src="{{ asset('logo-white.png') }}" alt="FleetCoders Logo" class="w-8 h-8">
                    </div>
                    <span class="text-3xl font-black tracking-tighter text-slate-900">{{ $siteSettings->title ?? 'FleetCoders' }}</span>
                </div>
                
                <div class="hidden md:flex items-center space-x-12">
                    <a href="#home" class="text-sm font-black text-slate-600 hover:text-indigo-600 transition-colors uppercase tracking-[0.2em]">Home</a>
                    <a href="#services" class="text-sm font-black text-slate-600 hover:text-indigo-600 transition-colors uppercase tracking-[0.2em]">Capabilities</a>
                    <a href="#about" class="text-sm font-black text-slate-600 hover:text-indigo-600 transition-colors uppercase tracking-[0.2em]">Our DNA</a>
                    <a href="#contact" class="px-10 py-4 bg-gradient-premium text-white rounded-2xl text-[10px] font-black uppercase tracking-[0.3em] shadow-2xl shadow-indigo-200 hover:scale-110 active:scale-95 transition-all">Launch Project</a>
                </div>

                <div class="md:hidden">
                    <button id="mobile-menu-btn" class="text-slate-900 p-2">
                        <svg class="w-9 h-9" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 8h16M4 16h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden absolute top-full left-0 w-full bg-white/95 backdrop-blur-xl shadow-2xl p-10 transition-all duration-300">
            <div class="flex flex-col space-y-8 text-center">
                <a href="#home" class="text-2xl font-black text-slate-900">Home</a>
                <a href="#services" class="text-2xl font-black text-slate-900">Capabilities</a>
                <a href="#about" class="text-2xl font-black text-slate-900">About Our DNA</a>
                <a href="#contact" class="w-full py-6 bg-gradient-premium text-white font-black rounded-3xl text-xl shadow-2xl shadow-indigo-100">Get in Touch</a>
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
                <section id="home" data-id="home" class="relative min-h-screen flex items-center pt-32 overflow-hidden bg-slate-50">
                    <div class="absolute top-0 right-0 w-2/3 h-full bg-gradient-to-l from-indigo-50/70 to-transparent -z-0"></div>
                    <div class="absolute -top-32 -left-32 w-[600px] h-[600px] bg-indigo-100/40 rounded-full blur-[160px] -z-0"></div>

                    <div class="max-w-7xl mx-auto px-6 lg:px-10 relative z-10 w-full">
                        <div class="flex flex-col lg:flex-row items-center gap-24 xl:gap-32">
                            <div class="lg:w-3/5 reveal">
                                <div class="inline-flex items-center gap-4 px-6 py-3 rounded-full bg-white shadow-sm border border-slate-100 mb-12">
                                    <span class="relative flex h-3 w-3">
                                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-indigo-400 opacity-75"></span>
                                        <span class="relative inline-flex rounded-full h-3 w-3 bg-indigo-600"></span>
                                    </span>
                                    <span class="text-xs font-black text-indigo-700 uppercase tracking-[0.2em] leading-none">Engineering Global Icons</span>
                                </div>
                                <h1 class="text-7xl md:text-9xl font-black text-slate-900 leading-[0.9] mb-12 tracking-tighter">
                                    @php
                                        $heroTitle = $siteSettings->hero_title ?? 'Innovate Without Limits.';
                                        $titleParts = explode(' ', $heroTitle);
                                        $lastWord = array_pop($titleParts);
                                        $firstPart = implode(' ', $titleParts);
                                    @endphp
                                    {{ $firstPart }} <br> <span class="text-gradient underline decoration-indigo-100 underline-offset-8">{{ $lastWord }}</span>
                                </h1>
                                <p class="text-2xl text-slate-500 font-medium mb-16 leading-relaxed max-w-2xl">
                                    {{ $siteSettings->hero_subtitle ?? 'Elite technical craftsmanship meets visionary design. We build the architectures that define the next decade of digital excellence.' }}
                                </p>
                                <div class="flex flex-wrap gap-8 items-center">
                                    <a href="#contact" class="btn-premium px-16 py-8 text-white text-2xl font-black rounded-[2.5rem] shadow-2xl shadow-indigo-200">Start Building →</a>
                                    <a href="#services" class="flex items-center gap-4 text-xl font-black text-slate-900 hover:text-indigo-600 transition-all group">
                                        Our Capabilities 
                                        <svg class="w-7 h-7 group-hover:translate-x-3 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                            <div class="lg:w-2/5 relative reveal" style="transition-delay: 0.2s">
                                <div class="relative z-10 rounded-[4.5rem] overflow-hidden shadow-[0_60px_120px_-20px_rgba(0,0,0,0.2)] border-[18px] border-white floating">
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
                <div id="stats" data-id="stats" class="bg-gradient-premium py-24 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-full h-full opacity-10 blur-3xl scale-150 rotate-12 bg-white/20 -z-0"></div>
                    <div class="max-w-7xl mx-auto px-6 lg:px-10 relative z-10">
                        <div class="grid grid-cols-2 lg:grid-cols-4 gap-16 text-center reveal">
                            @foreach($stats as $stat)
                            <div class="space-y-4">
                                <div class="text-6xl font-black text-white tracking-tighter tabular-nums">{{ $stat->number }}</div>
                                <div class="text-[10px] font-black text-indigo-100 uppercase tracking-[0.4em] opacity-80">{{ $stat->label }}</div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif

            @if($sectionId === 'services')
                <!-- Services Section -->
                <section id="services" data-id="services" class="relative section-padding bg-white">
                    <div class="max-w-7xl mx-auto px-6 lg:px-10">
                        <div class="text-center mb-32 reveal">
                            <h2 class="text-[10px] font-black text-indigo-600 uppercase tracking-[0.5em] mb-8">Technical Mastery</h2>
                            <h3 class="text-6xl md:text-8xl font-black text-slate-900 mb-10 tracking-tighter">Elite Capabilities.</h3>
                            <p class="text-2xl text-slate-400 max-w-3xl mx-auto font-medium leading-relaxed">We don't Just provide services; we engineer unfair advantages for our partners.</p>
                        </div>
                        
                        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-12">
                            @foreach($services as $index => $s)
                            <div class="glass p-16 rounded-[4.5rem] hover:scale-105 hover:ring-2 hover:ring-indigo-600 transition-all duration-700 reveal group" style="transition-delay: {{ $index * 0.1 }}s">
                                <div class="w-20 h-20 bg-slate-50 rounded-3xl flex items-center justify-center text-indigo-600 mb-12 shadow-inner transition-all duration-500 font-black text-3xl">
                                    {{ $s->icon ?? str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                                </div>
                                <h4 class="text-3xl font-black text-slate-900 mb-6 tracking-tight transition-colors">{{ $s->title }}</h4>
                                <p class="text-slate-500 text-lg leading-relaxed font-semibold mb-10 opacity-70 group-hover:opacity-100 transition-opacity">{{ $s->description }}</p>
                                <a href="#contact" class="inline-flex items-center gap-3 text-indigo-600 font-black text-xs uppercase tracking-[0.3em] group-hover:gap-5 transition-all">
                                    Deep Dive <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M17 8l4 4m0 0l-4 4m4-4H3" /></svg>
                                </a>
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
                    <div class="max-w-7xl mx-auto px-6 lg:px-10 relative z-10 text-white">
                        <div class="flex flex-col lg:flex-row items-center gap-32">
                            <div class="lg:w-1/2 reveal">
                                <div class="relative group">
                                    <img src="{{ $siteSettings->about_image ?? '/assets/images/coding.png' }}" alt="Collaborative Innovation" class="rounded-[5rem] shadow-[0_50px_100px_rgba(0,0,0,0.5)] w-full object-cover aspect-[4/3] relative z-10 transition-transform duration-1000 group-hover:scale-105 border-[12px] border-white/5">
                                    <div class="absolute -top-16 -left-16 w-full h-full border-4 border-white/10 rounded-[5rem] -z-0"></div>
                                    <div class="absolute -bottom-12 -right-12 glass backdrop-blur-3xl p-12 rounded-[3.5rem] z-20 shadow-2xl border-white/10">
                                        <div class="flex items-center gap-8">
                                            <div class="w-24 h-24 bg-gradient-premium rounded-3xl flex items-center justify-center text-white font-black text-5xl">3+</div>
                                            <div class="pr-8">
                                                <div class="text-slate-900 font-black text-2xl mb-2">Power Years</div>
                                                <div class="text-slate-500 font-black text-[10px] uppercase tracking-[0.3em] opacity-60">Elite Engineering</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="lg:w-1/2 reveal" style="transition-delay: 0.2s">
                                <div class="text-[10px] font-black text-indigo-400 uppercase tracking-[0.5em] mb-10">Our Genetic Code</div>
                                <h3 class="text-6xl md:text-8xl font-black text-white mb-12 leading-[0.9] tracking-tighter">
                                    {{ $siteSettings->about_title ?? 'Built for the' }} <br> <span class="text-indigo-400 italic">{{ $siteSettings->about_subtitle ?? 'Visionaries.' }}</span>
                                </h3>
                                <p class="text-2xl text-slate-400 mb-16 font-medium leading-relaxed opacity-80">
                                    {{ $siteSettings->about_description ?? "We don't just ship code; we build intellectual assets. Our philosophy is rooted in technical extreme transparency and radical innovation." }}
                                </p>
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-12 mb-20">
                                    @foreach(['Architectural Rigor', 'Zero-Trust Security', 'Extreme Scalability', 'Global Performance'] as $item)
                                    <div class="flex items-center gap-6 group">
                                        <div class="w-12 h-12 rounded-full bg-white/5 flex items-center justify-center text-indigo-400 group-hover:bg-indigo-500 group-hover:text-white transition-all shadow-xl">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M5 13l4 4L19 7" /></svg>
                                        </div>
                                        <span class="text-white font-black text-xl tracking-tight opacity-90">{{ $item }}</span>
                                    </div>
                                    @endforeach
                                </div>
                                <a href="#contact" class="px-16 py-7 bg-white text-slate-900 font-black text-xl rounded-full hover:scale-110 transition-all shadow-2xl shadow-indigo-900/50">Our Full Heritage</a>
                            </div>
                        </div>
                    </div>
                </section>
            @endif

            @if($sectionId === 'contact')
                <!-- Contact Section -->
                <section id="contact" data-id="contact" class="section-padding bg-slate-50 relative overflow-hidden">
                    <div class="absolute -bottom-48 -right-48 w-[600px] h-[600px] bg-indigo-100/30 rounded-full blur-[140px] -z-0"></div>
                    <div class="max-w-7xl mx-auto px-6 lg:px-10">
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-32 items-start">
                            <div class="reveal">
                                <h3 class="text-[10px] font-black text-indigo-600 uppercase tracking-[0.5em] mb-10">Get In Touch</h3>
                                <h2 class="text-7xl font-black text-slate-900 mb-12 leading-[0.85] tracking-tighter">
                                    {{ $siteSettings->contact_title ?? 'Draft Your' }} <br> 
                                    <span class="text-gradient underline decoration-indigo-100 underline-offset-[12px]">{{ $siteSettings->contact_subtitle ?? 'Iconic Project.' }}</span>
                                </h2>
                                <p class="text-2xl text-slate-400 mb-20 font-medium leading-relaxed max-w-lg">Ready to engineer something legendary? Our team is standing by to translate your vision into robust reality.</p>

                                <div class="space-y-16">
                                    @foreach([
                                        ['title' => 'HQ Location', 'info' => $siteSettings->contact_address ?? '123 Innovation Drive, Silicon Valley', 'icon' => 'M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z'],
                                        ['title' => 'Channel', 'info' => $siteSettings->contact_email ?? ('hello@' . strtolower(str_replace(' ', '', $siteSettings->title ?? 'fleetcoders')) . '.com'), 'icon' => 'M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z']
                                    ] as $item)
                                    <div class="flex items-start gap-12 group">
                                        <div class="w-20 h-20 rounded-[2.5rem] bg-white shadow-2xl flex items-center justify-center text-indigo-600 flex-shrink-0 group-hover:scale-110 transition-transform duration-500 border border-slate-100">
                                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="{{ $item['icon'] }}" /></svg>
                                        </div>
                                        <div class="pt-2">
                                            <h4 class="text-slate-900 font-black text-3xl mb-2">{{ $item['title'] }}</h4>
                                            <p class="text-slate-500 font-bold text-xl leading-tight opacity-70">{{ $item['info'] }}</p>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="reveal" style="transition-delay: 0.2s">
                                <div class="glass p-16 md:p-24 rounded-[5rem] shadow-[0_80px_150px_-30px_rgba(99,102,241,0.2)] border-white relative overflow-hidden">
                                    <div class="absolute top-0 right-0 w-60 h-60 bg-indigo-50/50 rounded-bl-[15rem] -z-0"></div>
                                    <h4 class="text-5xl font-black text-slate-900 mb-20 relative z-10 tracking-tighter">Draft Inquiry.</h4>

                                    <form id="contact-form" action="{{ route('contacts.store') }}" method="POST" class="space-y-16 relative z-10">
                                        @csrf
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-16">
                                            <div class="space-y-6">
                                                <label class="text-[10px] font-black text-slate-400 uppercase tracking-[0.4em]">Full Name</label>
                                                <input type="text" name="name" placeholder="Raju Timalsina" required class="w-full bg-transparent border-b-4 border-slate-100 focus:border-indigo-600 px-0 py-6 text-2xl font-black transition-all outline-none">
                                            </div>
                                            <div class="space-y-6">
                                                <label class="text-[10px] font-black text-slate-400 uppercase tracking-[0.4em]">Work Email</label>
                                                <input type="email" name="email" placeholder="raju@company.com" required class="w-full bg-transparent border-b-4 border-slate-100 focus:border-indigo-600 px-0 py-6 text-2xl font-black transition-all outline-none">
                                            </div>
                                        </div>
                                        <div class="space-y-6">
                                            <label class="text-[10px] font-black text-slate-400 uppercase tracking-[0.4em]">The Vision</label>
                                            <textarea name="message" rows="3" placeholder="Describe your challenge..." required class="w-full bg-transparent border-b-4 border-slate-100 focus:border-indigo-600 px-0 py-6 text-2xl font-black transition-all outline-none resize-none"></textarea>
                                        </div>
                                        <button type="submit" class="w-full py-10 bg-gradient-premium text-white font-black text-3xl rounded-[2rem] shadow-2xl shadow-indigo-300 hover:scale-[1.03] active:scale-95 transition-all">Broadcast Inquiry →</button>
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
            <button onclick="saveNewOrder()" class="btn-premium px-10 py-5 text-white font-black rounded-full shadow-2xl flex items-center gap-3">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
    <footer class="bg-gradient-dark text-slate-400 pt-40 pb-20">
        <div class="max-w-7xl mx-auto px-6 lg:px-10">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-24 mb-40">
                <div class="space-y-12">
                    <div class="flex items-center gap-5">
                        <div class="w-14 h-14 bg-indigo-600 rounded-3xl flex items-center justify-center shadow-2xl shadow-indigo-500/30">
                            <img src="{{ asset('logo-white.png') }}" alt="FleetCoders Logo" class="w-8 h-8">
                        </div>
                        <span class="text-4xl font-black text-white tracking-tighter">{{ $siteSettings->title ?? 'FleetCoders' }}</span>
                    </div>
                    <p class="text-2xl font-medium leading-relaxed opacity-60">Architecting elite digital environments for the global innovators of tomorrow.</p>
                </div>
                <div>
                    <h4 class="text-white font-black text-2xl mb-12 tracking-tight">Expertise</h4>
                    <ul class="space-y-6 font-bold text-xl">
                        @foreach($services->take(4) as $service)
                        <li><a href="#services" class="hover:text-indigo-400 transition-colors">{{ $service->title }}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div>
                    <h4 class="text-white font-black text-2xl mb-12 tracking-tight">The Edge</h4>
                    <p class="mb-12 font-medium italic opacity-60 text-lg">"Excellence is not an act, but a habit of the code."</p>
                    <div class="relative">
                        <input type="email" placeholder="Connect for insights" class="w-full bg-white/5 border-none rounded-2xl px-8 py-6 text-lg font-black text-white focus:ring-4 focus:ring-indigo-600/50 transition-all placeholder:text-slate-600">
                        <button class="absolute top-2 right-2 bottom-2 bg-indigo-600 text-white px-8 rounded-xl font-black hover:bg-indigo-500 transition shadow-2xl text-xs uppercase tracking-widest">Join</button>
                    </div>
                </div>
            </div>
            
            <div class="pt-16 border-t border-white/5 flex flex-col md:flex-row justify-between items-center gap-10 text-sm font-black uppercase tracking-[0.2em] opacity-40">
                <p>&copy; {{ date('Y') }} {{ $siteSettings->title ?? 'FleetCoders' }}. Architecting Excellence.</p>
                <div class="flex gap-16">
                    <a href="#" class="hover:text-white transition-colors">Privacy DNA</a>
                    <a href="#" class="hover:text-white transition-colors">Terms of Scale</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Success Modal -->
    <div id="successModal" class="fixed inset-0 z-[100] flex items-center justify-center p-6 hidden">
        <div class="absolute inset-0 bg-slate-900/60 backdrop-blur-xl" onclick="closeSuccessModal()"></div>
        <div class="glass max-w-xl w-full rounded-[4rem] p-20 text-center relative z-10 shadow-[0_100px_200px_rgba(0,0,0,0.4)] border-white/20 transform transition-all duration-700 scale-90 opacity-0" id="modalContent">
            <div class="w-32 h-32 bg-gradient-premium rounded-[2.5rem] flex items-center justify-center text-white mx-auto mb-12 shadow-2xl shadow-indigo-500/50">
                <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                </svg>
            </div>
            <h4 class="text-5xl font-black text-slate-900 mb-6 tracking-tighter">Transmission Received.</h4>
            <p class="text-xl text-slate-500 font-bold leading-relaxed mb-12 opacity-80">
                {{ session('contact_success') }}
            </p>
            <button onclick="closeSuccessModal()" class="w-full py-8 bg-slate-900 text-white font-black text-xl rounded-3xl hover:bg-indigo-600 transition-colors shadow-2xl">Acknowledge</button>
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

        // Form logic removed for backend handling
    </script>
</body>
</html>