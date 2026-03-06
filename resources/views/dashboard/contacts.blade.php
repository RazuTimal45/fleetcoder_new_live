<x-dashboard-layout pageTitle="Inquiries">

    <div style="background:#fff; border-radius:24px; padding:32px; box-shadow:0 1px 6px rgba(0,0,0,0.05); border:1px solid #f1f5f9;">
        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:32px;">
            <div>
                <h3 style="font-size:18px; font-weight:800; color:#0f172a; margin:0;">Landing Page Leads</h3>
                <p style="font-size:13px; color:#94a3b8; margin:4px 0 0;">{{ $contacts->count() }} messages received from the website</p>
            </div>
        </div>

        @if($contacts->isEmpty())
            <div style="text-align:center; padding:64px 0; color:#94a3b8;">
                <svg width="48" height="48" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1" style="margin-bottom:16px; opacity:.3;"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
                <p style="font-size:15px; font-weight:600;">The inbox is waiting for its first arrival.</p>
            </div>
        @else
            <div style="display:grid; gap:16px;">
                @foreach($contacts as $c)
                <div style="background:#f8fafc; border:1px solid #f1f5f9; border-radius:18px; padding:24px; transition:transform .2s;">
                    <div style="display:flex; justify-content:space-between; align-items:flex-start; margin-bottom:16px;">
                        <div style="display:flex; gap:16px;">
                            <div style="width:48px; height:48px; background:#fff; border-radius:14px; border:1px solid #e2e8f0; display:flex; align-items:center; justify-content:center; color:#6366f1;">
                                <svg width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                            </div>
                            <div>
                                <h4 style="font-size:16px; font-weight:800; color:#0f172a; margin:0;">{{ $c->name }}</h4>
                                <p style="font-size:13px; color:#64748b; margin:2px 0 0;">{{ $c->email }}</p>
                            </div>
                        </div>
                        <div style="text-align:right;">
                            <div style="font-size:12px; font-weight:700; color:#94a3b8; text-transform:uppercase; letter-spacing:1px;">Received</div>
                            <div style="font-size:13px; color:#475569; font-weight:600;">{{ $c->created_at->diffForHumans() }}</div>
                        </div>
                    </div>

                    <div style="background:#fff; border-radius:12px; padding:16px; border:1px solid #eef2ff;">
                        @if($c->subject)
                            <div style="font-size:12px; font-weight:800; color:#6366f1; margin-bottom:4px; text-transform:uppercase; letter-spacing:0.5px;">{{ $c->subject }}</div>
                        @endif
                        <p style="font-size:14px; color:#334155; line-height:1.6; margin:0;">{{ $c->message }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        @endif
    </div>

</x-dashboard-layout>
