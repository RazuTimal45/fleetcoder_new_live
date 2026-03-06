<x-dashboard-layout pageTitle="Profile Settings">

    {{-- Profile Header Banner --}}
    <div style="background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%); border-radius: 20px; padding: 40px; color: #fff; margin-bottom: 32px; position: relative; overflow: hidden; box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);">
        <div style="position: absolute; top: -20px; right: -20px; width: 150px; height: 150px; background: rgba(255,255,255,0.1); border-radius: 50%;"></div>
        <div style="position: relative; display: flex; align-items: center; gap: 24px;">
            <div style="width: 100px; height: 100px; background: #fff; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 40px; font-weight: 800; color: #6366f1; border: 4px solid rgba(255,255,255,0.3);">
                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
            </div>
            <div>
                <h1 style="font-size: 32px; font-weight: 800; margin: 0;">{{ auth()->user()->name }}</h1>
                <p style="font-size: 16px; opacity: 0.9; margin: 4px 0 0;">{{ auth()->user()->email }}</p>
                <div style="display: flex; gap: 8px; margin-top: 12px;">
                    <span style="background: rgba(255,255,255,0.2); padding: 4px 12px; border-radius: 20px; font-size: 12px; font-weight: 600;">Member since {{ auth()->user()->created_at->format('M Y') }}</span>
                    <span style="background: rgba(255,255,255,0.2); padding: 4px 12px; border-radius: 20px; font-size: 12px; font-weight: 600;">Verified User</span>
                </div>
            </div>
        </div>
    </div>

    {{-- 2-Column Grid --}}
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(450px, 1fr)); gap: 32px;">

        {{-- Left Column: Profile Info --}}
        <div style="display: flex; flex-direction: column; gap: 32px;">
            <div style="background:#fff; border-radius:18px; padding:40px; box-shadow:0 1px 6px rgba(0,0,0,.06); border:1px solid #f1f5f9; height: 100%;">
                <div style="display:flex; align-items:center; gap:16px; margin-bottom:32px;">
                    <div style="width:48px; height:48px; background:#ede9fe; border-radius:14px; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                        <svg width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="#6366f1" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 style="font-size:18px; font-weight:800; color:#0f172a; margin:0;">Account Details</h3>
                        <p style="font-size:14px; color:#94a3b8; margin:4px 0 0;">Update your public profile information</p>
                    </div>
                </div>
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        {{-- Right Column: Security & Delete --}}
        <div style="display: flex; flex-direction: column; gap: 32px;">
            {{-- Update Password --}}
            <div style="background:#fff; border-radius:18px; padding:40px; box-shadow:0 1px 6px rgba(0,0,0,.06); border:1px solid #f1f5f9;">
                <div style="display:flex; align-items:center; gap:16px; margin-bottom:32px;">
                    <div style="width:48px; height:48px; background:#d1fae5; border-radius:14px; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                        <svg width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="#10b981" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 style="font-size:18px; font-weight:800; color:#0f172a; margin:0;">Password & Security</h3>
                        <p style="font-size:14px; color:#94a3b8; margin:4px 0 0;">Manage your authentication settings</p>
                    </div>
                </div>
                @include('profile.partials.update-password-form')
            </div>

            {{-- Danger Zone --}}
            <div style="background:#fff; border-radius:18px; padding:40px; box-shadow:0 1px 6px rgba(0,0,0,.06); border:1px solid #fecaca;">
                <div style="display:flex; align-items:center; gap:16px; margin-bottom:32px;">
                    <div style="width:48px; height:48px; background:#fee2e2; border-radius:14px; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                        <svg width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="#ef4444" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                        </svg>
                    </div>
                    <div>
                        <h3 style="font-size:18px; font-weight:800; color:#dc2626; margin:0;">Danger Zone</h3>
                        <p style="font-size:14px; color:#94a3b8; margin:4px 0 0;">Irreversible actions for your account</p>
                    </div>
                </div>
                @include('profile.partials.delete-user-form')
            </div>
        </div>

    </div>

</x-dashboard-layout>
