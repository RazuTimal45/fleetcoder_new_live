<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'FleetCoders') }} | Authentication</title>

        <!-- Scripts -->
        <script src="https://cdn.tailwindcss.com"></script>
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

        <style>
            body {
                font-family: 'Plus Jakarta Sans', sans-serif;
                background-color: #f8fafc;
            }

            .glass {
                background: rgba(255, 255, 255, 0.8);
                backdrop-filter: blur(16px);
                -webkit-backdrop-filter: blur(16px);
                border: 1px solid rgba(255, 255, 255, 0.5);
            }

            .bg-gradient-premium {
                background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
            }

            .text-gradient {
                background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
            }

            .btn-premium {
                background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
                transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            }

            .btn-premium:hover {
                transform: translateY(-2px);
                box-shadow: 0 10px 20px rgba(99, 102, 241, 0.2);
            }
        </style>
    </head>
    <body class="antialiased text-slate-900 overflow-x-hidden">
        <div class="min-h-screen relative flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 bg-slate-50">
            <!-- Background Orbs -->
            <div class="absolute top-0 right-0 w-full h-full bg-gradient-to-br from-indigo-50/50 to-purple-50/50 -z-0"></div>
            <div class="absolute -top-24 -left-24 w-96 h-96 bg-indigo-100/40 rounded-full blur-[100px] -z-0"></div>
            <div class="absolute -bottom-24 -right-24 w-96 h-96 bg-purple-100/40 rounded-full blur-[100px] -z-0"></div>

            <div class="max-w-md w-full relative z-10">
                <div class="text-center mb-10">
                    <a href="/" class="inline-flex items-center gap-3 group">
                        <div class="w-12 h-12 bg-gradient-premium rounded-2xl flex items-center justify-center shadow-xl shadow-indigo-200 group-hover:scale-110 transition-transform">
                            <img src="{{ asset('logo-white.png') }}" alt="FleetCoders Logo" class="w-8 h-8">
                        </div>
                        <span class="text-2xl font-black tracking-tighter text-slate-900">{{ config('app.name', 'FleetCoders') }}</span>
                    </a>
                </div>

                <div class="glass p-8 sm:p-10 rounded-[2.5rem] shadow-[0_40px_80px_-20px_rgba(0,0,0,0.1)] border-white">
                    {{ $slot }}
                </div>

                <div class="mt-8 text-center">
                    <p class="text-slate-500 text-sm font-medium">
                        &copy; {{ date('Y') }} {{ config('app.name', 'FleetCoders') }}. Engineering Excellence.
                    </p>
                </div>
            </div>
        </div>
    </body>
</html>
