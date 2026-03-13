<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="mb-8">
        <h2 class="text-3xl font-black text-slate-900 tracking-tight mb-2">Welcome Back.</h2>
        <p class="text-slate-500 font-medium">Log in to your account to continue building.</p>
    </div>

    <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf

        <!-- Email Address -->
        <div class="space-y-2">
            <label for="email" class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Email Address</label>
            <input id="email" class="w-full bg-slate-50/50 border-2 border-slate-100 focus:border-indigo-600 rounded-2xl px-5 py-4 text-base font-bold transition-all outline-none" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="raju@company.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="space-y-2">
            <div class="flex justify-between items-center">
                <label for="password" class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Password</label>
                @if (Route::has('password.request'))
                    <a class="text-[10px] font-black text-indigo-600 uppercase tracking-[0.1em] hover:text-indigo-700 transition-colors" href="{{ route('password.request') }}">
                        {{ __('Forgot?') }}
                    </a>
                @endif
            </div>
            <input id="password" class="w-full bg-slate-50/50 border-2 border-slate-100 focus:border-indigo-600 rounded-2xl px-5 py-4 text-base font-bold transition-all outline-none"
                            type="password"
                            name="password"
                            required autocomplete="current-password" 
                            placeholder="••••••••" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center">
            <label for="remember_me" class="inline-flex items-center cursor-pointer group">
                <div class="relative">
                    <input id="remember_me" type="checkbox" class="sr-only" name="remember">
                    <div class="w-10 h-6 bg-slate-200 rounded-full shadow-inner transition-colors group-hover:bg-slate-300 peer-checked:bg-indigo-600"></div>
                    <div class="dot absolute left-1 top-1 bg-white w-4 h-4 rounded-full transition-transform peer-checked:translate-x-4 shadow-sm"></div>
                </div>
                <span class="ms-3 text-sm font-bold text-slate-600 group-hover:text-slate-900 transition-colors">{{ __('Stay logged in') }}</span>
            </label>
            <style>
                input:checked ~ .dot { transform: translateX(1rem); }
                input:checked ~ div:first-of-type { background-color: #4f46e5; }
            </style>
        </div>

        <div class="pt-4">
            <button type="submit" class="w-full btn-premium py-5 text-white font-black text-lg rounded-2xl shadow-xl shadow-indigo-200 hover:scale-[1.02] active:scale-95 transition-all">
                {{ __('Log in') }}
            </button>
        </div>

        <div class="mt-8 text-center border-t border-slate-100 pt-8">
            <p class="text-sm font-bold text-slate-500">
                Don't have an account? 
                <a href="{{ route('register') }}" class="text-indigo-600 hover:text-indigo-700 transition-colors">Create one now</a>
            </p>
        </div>
    </form>
</x-guest-layout>
