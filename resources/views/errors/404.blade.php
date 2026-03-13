<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Page Not Found | {{ $siteSettings->title ?? 'FleetCoders' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #0f172a;
            color: #ffffff;
            overflow: hidden;
        }

        .text-gradient {
            background: linear-gradient(135deg, {{ $siteSettings->theme_color_1 ?? '#4f46e5' }} 0%, {{ $siteSettings->theme_color_2 ?? '#7c3aed' }} 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .bg-gradient-premium {
            background: linear-gradient(135deg, {{ $siteSettings->theme_color_1 ?? '#4f46e5' }} 0%, {{ $siteSettings->theme_color_2 ?? '#7c3aed' }} 100%);
        }

        .glass {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
            border: 1px solid rgba(255, 255, 255, 0.05);
        }

        .floating {
            animation: floating 6s ease-in-out infinite;
        }

        @keyframes floating {
            0% { transform: translateY(0px) rotate(0deg); }
            33% { transform: translateY(-20px) rotate(2deg); }
            66% { transform: translateY(10px) rotate(-1deg); }
            100% { transform: translateY(0px) rotate(0deg); }
        }

        .glow {
            box-shadow: 0 0 80px rgba(79, 70, 229, 0.15);
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center relative px-6">
    <!-- Animated background elements -->
    <div class="absolute -top-32 -left-32 w-[600px] h-[600px] bg-indigo-600/10 rounded-full blur-[160px] -z-0"></div>
    <div class="absolute -bottom-32 -right-32 w-[600px] h-[600px] bg-purple-600/10 rounded-full blur-[160px] -z-0"></div>
    
    <div class="max-w-4xl w-full text-center relative z-10">
        <!-- Brand Logo -->
        <div class="flex justify-center mb-12">
            <div class="w-20 h-20 bg-gradient-premium rounded-3xl flex items-center justify-center shadow-2xl shadow-indigo-500/20 floating">
                 <img src="{{ asset('logo-white.png') }}" alt="{{ $siteSettings->title ?? 'FleetCoders' }} Logo" class="w-12 h-12">
            </div>
        </div>

        <div class="glass rounded-[4rem] p-12 md:p-24 shadow-2xl glow relative overflow-hidden">
            <!-- Animated background accent -->
            <div class="absolute top-0 right-0 w-64 h-64 bg-indigo-500/5 rounded-bl-[15rem] -z-0"></div>
            
            <h1 class="text-9xl md:text-[12rem] font-black text-white/5 leading-none mb-4 absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 select-none pointer-events-none">404</h1>
            
            <div class="relative z-10">
                <h2 class="text-5xl md:text-7xl font-black text-white mb-8 tracking-tighter leading-[0.9]">
                    Lost in the <br> <span class="text-gradient italic">Architecture.</span>
                </h2>
                
                <p class="text-xl md:text-2xl text-slate-400 font-medium mb-12 leading-relaxed max-w-xl mx-auto opacity-80">
                    The node you're attempting to access doesn't exist in our current deployment. Visionaries sometimes stray, but we'll guide you back.
                </p>

                <div class="flex flex-col sm:flex-row gap-6 justify-center">
                    <a href="/" class="bg-gradient-premium text-white px-10 py-5 rounded-2xl font-black text-lg shadow-2xl shadow-indigo-500/20 hover:scale-105 active:scale-95 transition-all">
                        Return to Origin
                    </a>
                    <button onclick="window.history.back()" class="bg-white/5 hover:bg-white/10 text-white px-10 py-5 rounded-2xl font-black text-lg transition-all border border-white/10">
                        Go Back
                    </button>
                </div>
            </div>
        </div>

        <div class="mt-12 text-slate-500 text-sm font-black uppercase tracking-[0.3em] opacity-40">
            &copy; {{ date('Y') }} {{ $siteSettings->title ?? 'FleetCoders' }}. Status Code: Unknown Location.
        </div>
    </div>
</body>
</html>
