<x-dashboard-layout pageTitle="Home">

    {{-- Stats Row --}}
    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:20px;margin-bottom:32px;">

        @php
        $statsData = [
            ['label'=>'Active Services','value'=>$servicesCount,'change'=>'Live','up'=>true,'color'=>'#6366f1', 'url'=>route('dashboard.services'),
             'icon'=>'M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z'],
            ['label'=>'Platform Metrics','value'=>$statsCount,'change'=>'Active','up'=>true,'color'=>'#10b981', 'url'=>route('dashboard.stats'),
             'icon'=>'M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 8v1m0 0c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z'],
            ['label'=>'Contact Inquiries','value'=>$contactsCount,'change'=>'Inbox','up'=>true,'color'=>'#f59e0b', 'url'=>route('dashboard.contacts'),
             'icon'=>'M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z'],
            ['label'=>'Registered Admins','value'=>$usersCount,'change'=>'Secure','up'=>true,'color'=>'#ef4444', 'url'=>route('dashboard.users'),
             'icon'=>'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z'],
        ];
        @endphp

        @foreach($statsData as $s)
        <a href="{{ $s['url'] }}" style="text-decoration:none; display:block;">
            <div style="background:#fff;border-radius:16px;padding:24px;box-shadow:0 1px 6px rgba(0,0,0,.06);border:1px solid #f1f5f9;transition:all .2s;" onmouseover="this.style.transform='translateY(-4px)'; this.style.boxShadow='0 12px 24px rgba(0,0,0,0.08)';" onmouseout="this.style.transform='none'; this.style.boxShadow='0 1px 6px rgba(0,0,0,0.06)';">
                <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:16px;">
                    <div style="width:44px;height:44px;border-radius:12px;background:{{ $s['color'] }}18;display:flex;align-items:center;justify-content:center;">
                        <svg width="22" height="22" fill="none" viewBox="0 0 24 24" stroke="{{ $s['color'] }}" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="{{ $s['icon'] }}"/>
                        </svg>
                    </div>
                    <span style="font-size:12px;font-weight:600;padding:3px 9px;border-radius:20px;
                        background:{{ $s['up'] ? '#dcfce7' : '#fee2e2' }};
                        color:{{ $s['up'] ? '#16a34a' : '#dc2626' }};">
                        {{ $s['change'] }}
                    </span>
                </div>
                <div style="font-size:26px;font-weight:800;color:#0f172a;letter-spacing:-1px;">{{ $s['value'] }}</div>
                <div style="font-size:13px;color:#94a3b8;margin-top:4px;font-weight:500;">{{ $s['label'] }}</div>
            </div>
        </a>
        @endforeach
    </div>

    {{-- Welcome Card + Quick Actions --}}
    <div style="display:grid;grid-template-columns:1fr 340px;gap:20px;">

        {{-- Welcome card --}}
        <div style="background:linear-gradient(135deg,#6366f1,#8b5cf6,#a855f7);border-radius:20px;padding:36px;color:#fff;position:relative;overflow:hidden;">
            <div style="position:absolute;top:-30px;right:-30px;width:160px;height:160px;background:rgba(255,255,255,.08);border-radius:50%;"></div>
            <div style="position:absolute;bottom:-50px;right:40px;width:120px;height:120px;background:rgba(255,255,255,.05);border-radius:50%;"></div>
            <div style="font-size:13px;font-weight:600;opacity:.7;text-transform:uppercase;letter-spacing:1px;margin-bottom:10px;">Welcome back</div>
            <div style="font-size:28px;font-weight:800;letter-spacing:-.5px;margin-bottom:8px;">{{ auth()->user()->name }} 👋</div>
            <div style="font-size:14px;opacity:.75;max-width:340px;line-height:1.6;">
                Here's what's happening in your dashboard today. All systems are running smoothly.
            </div>
            <a href="{{ route('dashboard.services') }}"
               style="display:inline-flex;align-items:center;gap:8px;margin-top:24px;background:#fff;color:#6366f1;padding:10px 20px;border-radius:10px;font-size:13px;font-weight:700;text-decoration:none;transition:opacity .2s;">
                View Services →
            </a>
        </div>

        {{-- Quick actions --}}
        <div style="background:#fff;border-radius:20px;padding:24px;box-shadow:0 1px 6px rgba(0,0,0,.06);border:1px solid #f1f5f9;">
            <div style="font-size:15px;font-weight:700;color:#0f172a;margin-bottom:18px;">Quick Actions</div>
            @php
            $actions = [
                ['label'=>'Manage Services','href'=>route('dashboard.services'),'color'=>'#6366f1'],
                ['label'=>'Edit Profile','href'=>route('profile.edit'),'color'=>'#10b981'],
                ['label'=>'About Us','href'=>route('dashboard.about'),'color'=>'#f59e0b'],
                ['label'=>'Settings','href'=>route('dashboard.settings'),'color'=>'#ef4444'],
            ];
            @endphp
            @foreach($actions as $a)
            <a href="{{ $a['href'] }}"
               style="display:flex;align-items:center;gap:12px;padding:11px 14px;border-radius:10px;text-decoration:none;margin-bottom:6px;transition:background .2s;"
               onmouseover="this.style.background='#f8fafc'" onmouseout="this.style.background='transparent'">
                <div style="width:8px;height:8px;border-radius:50%;background:{{ $a['color'] }};flex-shrink:0;"></div>
                <span style="font-size:13px;font-weight:500;color:#334155;">{{ $a['label'] }}</span>
                <span style="margin-left:auto;color:#cbd5e1;font-size:16px;">›</span>
            </a>
            @endforeach
        </div>
    </div>

</x-dashboard-layout>
