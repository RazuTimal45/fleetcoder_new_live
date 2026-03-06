<x-dashboard-layout pageTitle="Administrative Users">

    <div style="background:#fff; border-radius:24px; padding:32px; box-shadow:0 1px 6px rgba(0,0,0,0.05); border:1px solid #f1f5f9;">
        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:32px;">
            <div>
                <h3 style="font-size:18px; font-weight:800; color:#0f172a; margin:0;">System Administrators</h3>
                <p style="font-size:13px; color:#94a3b8; margin:4px 0 0;">{{ $users->count() }} accounts with dashboard access</p>
            </div>
            {{-- In a real app, we'd have a Create User button here --}}
            <div style="padding:10px 20px; background:#f8fafc; border-radius:12px; font-size:12px; font-weight:700; color:#64748b;">
                Internal Access Only
            </div>
        </div>

        <div style="overflow-x:auto;">
            <table style="width:100%; border-collapse:separate; border-spacing:0 8px;">
                <thead>
                    <tr style="text-align:left;">
                        <th style="padding:12px 20px; font-size:11px; font-weight:700; color:#94a3b8; text-transform:uppercase; letter-spacing:1px;">Administrator</th>
                        <th style="padding:12px 20px; font-size:11px; font-weight:700; color:#94a3b8; text-transform:uppercase; letter-spacing:1px;">Email Hash</th>
                        <th style="padding:12px 20px; font-size:11px; font-weight:700; color:#94a3b8; text-transform:uppercase; letter-spacing:1px;">Joined</th>
                        <th style="padding:12px 20px; font-size:11px; font-weight:700; color:#94a3b8; text-transform:uppercase; letter-spacing:1px;">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr style="background:#f8fafc; transition:transform .2s;">
                        <td style="padding:16px 20px; border-radius:16px 0 0 16px;">
                            <div style="display:flex; align-items:center; gap:12px;">
                                <div style="width:36px; height:36px; background:linear-gradient(135deg,#6366f1,#8b5cf6); border-radius:10px; display:flex; align-items:center; justify-content:center; color:#fff; font-weight:800; font-size:14px;">
                                    {{ substr($user->name, 0, 1) }}
                                </div>
                                <div>
                                    <div style="font-size:14px; font-weight:700; color:#1e293b;">{{ $user->name }}</div>
                                    <div style="font-size:12px; color:#94a3b8;">System Admin</div>
                                </div>
                            </div>
                        </td>
                        <td style="padding:16px 20px; font-size:13px; color:#64748b; font-family:monospace;">
                            {{ $user->email }}
                        </td>
                        <td style="padding:16px 20px; font-size:13px; color:#64748b;">
                            {{ $user->created_at->format('M d, Y') }}
                        </td>
                        <td style="padding:16px 20px; border-radius:0 16px 16px 0;">
                            <span style="display:inline-flex; align-items:center; gap:6px; padding:4px 10px; background:#dcfce7; color:#16a34a; border-radius:20px; font-size:11px; font-weight:700; text-transform:uppercase;">
                                <span style="width:6px; height:6px; background:#16a34a; border-radius:50%;"></span>
                                Active
                            </span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</x-dashboard-layout>
