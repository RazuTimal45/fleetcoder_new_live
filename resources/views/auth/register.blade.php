<x-guest-layout>
    <div class="mb-8">
        <h2 class="text-3xl font-black text-slate-900 tracking-tight mb-2">Join the Elite.</h2>
        <p class="text-slate-500 font-medium">Create your account to start your journey with us.</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-6">
        @csrf

        <!-- Name -->
        <div class="space-y-2">
            <label for="name" class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Full Name</label>
            <input id="name" class="w-full bg-slate-50/50 border-2 border-slate-100 focus:border-indigo-600 rounded-2xl px-5 py-4 text-base font-bold transition-all outline-none" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Raju Timalsina" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="space-y-2">
            <label for="email" class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Work Email</label>
            <input id="email" class="w-full bg-slate-50/50 border-2 border-slate-100 focus:border-indigo-600 rounded-2xl px-5 py-4 text-base font-bold transition-all outline-none" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="raju@company.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="space-y-2">
            <label for="password" class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Choose Password</label>
            <input id="password" class="w-full bg-slate-50/50 border-2 border-slate-100 focus:border-indigo-600 rounded-2xl px-5 py-4 text-base font-bold transition-all outline-none"
                            type="password"
                            name="password"
                            required autocomplete="new-password"
                            placeholder="••••••••" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="space-y-2">
            <label for="password_confirmation" class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Confirm Password</label>
            <input id="password_confirmation" class="w-full bg-slate-50/50 border-2 border-slate-100 focus:border-indigo-600 rounded-2xl px-5 py-4 text-base font-bold transition-all outline-none"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password"
                            placeholder="••••••••" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="pt-4">
            <button type="submit" class="w-full btn-premium py-5 text-white font-black text-lg rounded-2xl shadow-xl shadow-indigo-200 hover:scale-[1.02] active:scale-95 transition-all">
                {{ __('Register Account') }}
            </button>
        </div>

        <div class="mt-8 text-center border-t border-slate-100 pt-8">
            <p class="text-sm font-bold text-slate-500">
                Already have an account? 
                <a href="{{ route('login') }}" class="text-indigo-600 hover:text-indigo-700 transition-colors">Log in instead</a>
            </p>
        </div>
    </form>
</x-guest-layout>
