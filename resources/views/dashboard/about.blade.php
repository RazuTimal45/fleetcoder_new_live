<x-dashboard-layout pageTitle="About Section Management">

    <div style="background:#fff; border-radius:24px; padding:40px; box-shadow:0 4px 20px rgba(0,0,0,0.05); border:1px solid #f1f5f9;">
        <h2 style="font-size:24px; font-weight:900; color:#0f172a; margin:0 0 8px;">Edit About Content</h2>
        <p style="font-size:14px; color:#64748b; margin:0 0 40px;">Manage the "Our DNA" section on the landing page.</p>

        <form action="{{ route('dashboard.settings.update') }}" method="POST">
            @csrf
            
            @if (session('status') === 'settings-updated')
                <div style="background:#d1fae5; color:#065f46; padding:12px 16px; border-radius:12px; margin-bottom:24px; font-size:13px; font-weight:600; border:1px solid #10b98130;">
                    ✓ About content updated!
                </div>
            @endif

            <div style="display:grid; grid-template-columns:1fr 1fr; gap:24px; margin-bottom:24px;">
                <div class="form-group">
                    <label style="display:block; font-size:13px; font-weight:700; color:#475569; margin-bottom:8px; text-transform:uppercase; letter-spacing:0.5px;">About Title</label>
                    <input type="text" name="about_title" value="{{ $siteSettings->about_title }}" 
                           style="width:100%; padding:12px 16px; border:1px solid #e2e8f0; border-radius:12px; font-size:15px; outline:none; transition:border .2s; box-sizing:border-box;">
                </div>
                <div class="form-group">
                    <label style="display:block; font-size:13px; font-weight:700; color:#475569; margin-bottom:8px; text-transform:uppercase; letter-spacing:0.5px;">About Subtitle (Accent)</label>
                    <input type="text" name="about_subtitle" value="{{ $siteSettings->about_subtitle }}" 
                           style="width:100%; padding:12px 16px; border:1px solid #e2e8f0; border-radius:12px; font-size:15px; outline:none; transition:border .2s; box-sizing:border-box;">
                </div>
            </div>

            <div style="margin-bottom:32px;">
                <label style="display:block; font-size:13px; font-weight:700; color:#475569; margin-bottom:8px; text-transform:uppercase; letter-spacing:0.5px;">Description Content</label>
                <textarea name="about_description" rows="6" 
                          style="width:100%; padding:12px 16px; border:1px solid #e2e8f0; border-radius:12px; font-size:15px; outline:none; transition:border .2s; box-sizing:border-box; resize:none;">{{ $siteSettings->about_description }}</textarea>
            </div>

            <button type="submit" 
                    style="background:linear-gradient(135deg,#6366f1,#8b5cf6); color:#fff; border:none; padding:14px 40px; border-radius:14px; font-size:14px; font-weight:800; cursor:pointer; box-shadow:0 8px 20px rgba(99,102,241,0.3); transition:transform .2s;">
                Save Changes
            </button>
        </form>
    </div>

</x-dashboard-layout>
