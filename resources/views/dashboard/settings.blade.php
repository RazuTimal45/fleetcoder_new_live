<x-dashboard-layout pageTitle="System Settings">

    <div style="display:grid;grid-template-columns:240px 1fr;gap:24px;align-items:flex-start;">

        {{-- Settings Sidebar --}}
        <div style="background:#fff;border-radius:18px;padding:16px;box-shadow:0 1px 6px rgba(0,0,0,.06);border:1px solid #f1f5f9;">
            @php
            $settingsTabs = [
                ['id'=>'general','label'=>'Branding','icon'=>'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4'],
                ['id'=>'hero','label'=>'Hero Section','icon'=>'M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z'],
                ['id'=>'meta','label'=>'Metadata','icon'=>'M7 7h.01M7 11h.01M7 15h.01M10 7h10M10 11h10M10 15h10'],
                ['id'=>'appearance','label'=>'Appearance','icon'=>'M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01'],
                ['id'=>'contact','label'=>'Contact Info','icon'=>'M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z'],
                ['id'=>'security','label'=>'Account Security','icon'=>'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z'],
            ];
            @endphp
            @foreach($settingsTabs as $t)
            <button onclick="showTab('{{ $t['id'] }}')" id="tab-{{ $t['id'] }}"
                style="display:flex;align-items:center;gap:10px;width:100%;padding:10px 14px;border-radius:10px;border:none;background:{{ $loop->first ? 'rgba(99,102,241,0.1)' : 'transparent' }};color:{{ $loop->first ? '#6366f1' : '#64748b' }};font-size:13px;font-weight:600;cursor:pointer;text-align:left;margin-bottom:2px;transition:all .2s;">
                <svg width="17" height="17" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="{{ $t['icon'] }}"/>
                </svg>
                {{ $t['label'] }}
            </button>
            @endforeach
        </div>

        {{-- Settings Panel --}}
        <form action="{{ route('dashboard.settings.update') }}" method="POST">
            @csrf
            
            @if (session('status') === 'settings-updated')
                <div style="background:#d1fae5; color:#065f46; padding:12px 16px; border-radius:12px; margin-bottom:24px; font-size:13px; font-weight:600; border:1px solid #10b98130;">
                    ✓ Settings saved successfully!
                </div>
            @endif

            {{-- Branding --}}
            <div id="panel-general" style="background:#fff;border-radius:18px;padding:32px;box-shadow:0 1px 6px rgba(0,0,0,.06);border:1px solid #f1f5f9;">
                <h3 style="font-size:17px;font-weight:800;color:#0f172a;margin:0 0 6px;">Branding</h3>
                <p style="font-size:13px;color:#94a3b8;margin:0 0 28px;">Global application identity</p>

                <div style="margin-bottom:20px;">
                    <label style="display:block;font-size:13px;font-weight:600;color:#374151;margin-bottom:6px;">Website Title</label>
                    <input type="text" name="title" value="{{ $siteSettings->title }}"
                           style="width:100%;padding:10px 14px;border:1px solid #e2e8f0;border-radius:10px;font-size:14px;color:#0f172a;outline:none;transition:border .2s;box-sizing:border-box;">
                </div>

                <div style="margin-bottom:28px;">
                    <label style="display:block;font-size:13px;font-weight:600;color:#374151;margin-bottom:6px;">Tagline / Subtitle</label>
                    <input type="text" name="subtitle" value="{{ $siteSettings->subtitle }}"
                           style="width:100%;padding:10px 14px;border:1px solid #e2e8f0;border-radius:10px;font-size:14px;color:#0f172a;outline:none;transition:border .2s;box-sizing:border-box;">
                </div>

                <button type="submit" style="background:#6366f1;color:#fff;border:none;padding:11px 24px;border-radius:10px;font-size:13px;font-weight:700;cursor:pointer;">
                    Save Branding
                </button>
            </div>

            {{-- Hero Section --}}
            <div id="panel-hero" style="display:none;background:#fff;border-radius:18px;padding:32px;box-shadow:0 1px 6px rgba(0,0,0,.06);border:1px solid #f1f5f9;">
                <h3 style="font-size:17px;font-weight:800;color:#0f172a;margin:0 0 6px;">Hero Section</h3>
                <p style="font-size:13px;color:#94a3b8;margin:0 0 28px;">Main landing page header content</p>

                <div style="margin-bottom:20px;">
                    <label style="display:block;font-size:13px;font-weight:600;color:#374151;margin-bottom:6px;">Hero Title</label>
                    <input type="text" name="hero_title" value="{{ $siteSettings->hero_title }}"
                           style="width:100%;padding:10px 14px;border:1px solid #e2e8f0;border-radius:10px;font-size:14px;color:#0f172a;outline:none;transition:border .2s;box-sizing:border-box;">
                </div>

                <div style="margin-bottom:28px;">
                    <label style="display:block;font-size:13px;font-weight:600;color:#374151;margin-bottom:6px;">Hero Subtitle</label>
                    <textarea name="hero_subtitle" style="width:100%;padding:10px 14px;border:1px solid #e2e8f0;border-radius:10px;font-size:14px;color:#0f172a;outline:none;height:100px;box-sizing:border-box;">{{ $siteSettings->hero_subtitle }}</textarea>
                </div>

                <button type="submit" style="background:#6366f1;color:#fff;border:none;padding:11px 24px;border-radius:10px;font-size:13px;font-weight:700;cursor:pointer;">
                    Save Hero Content
                </button>
            </div>

            {{-- Metadata --}}
            <div id="panel-meta" style="display:none;background:#fff;border-radius:18px;padding:32px;box-shadow:0 1px 6px rgba(0,0,0,.06);border:1px solid #f1f5f9;">
                <h3 style="font-size:17px;font-weight:800;color:#0f172a;margin:0 0 6px;">SEO Metadata</h3>
                <p style="font-size:13px;color:#94a3b8;margin:0 0 28px;">Control how search engines see your site</p>

                <div style="margin-bottom:20px;">
                    <label style="display:block;font-size:13px;font-weight:600;color:#374151;margin-bottom:6px;">Meta Keywords</label>
                    <textarea name="meta_keyword" style="width:100%;padding:10px 14px;border:1px solid #e2e8f0;border-radius:10px;font-size:14px;color:#0f172a;outline:none;height:80px;box-sizing:border-box;">{{ $siteSettings->meta_keyword }}</textarea>
                </div>

                <div style="margin-bottom:28px;">
                    <label style="display:block;font-size:13px;font-weight:600;color:#374151;margin-bottom:6px;">Meta Description</label>
                    <textarea name="meta_description" style="width:100%;padding:10px 14px;border:1px solid #e2e8f0;border-radius:10px;font-size:14px;color:#0f172a;outline:none;height:100px;box-sizing:border-box;">{{ $siteSettings->meta_description }}</textarea>
                </div>

                <button type="submit" style="background:#6366f1;color:#fff;border:none;padding:11px 24px;border-radius:10px;font-size:13px;font-weight:700;cursor:pointer;">
                    Update SEO Info
                </button>
            </div>

            {{-- Appearance --}}
            <div id="panel-appearance" style="display:none;background:#fff;border-radius:18px;padding:32px;box-shadow:0 1px 6px rgba(0,0,0,.06);border:1px solid #f1f5f9;">
                <h3 style="font-size:17px;font-weight:800;color:#0f172a;margin:0 0 6px;">Theme Customization</h3>
                <p style="font-size:13px;color:#94a3b8;margin:0 0 28px;">Choose your brand colors</p>

                <div style="display:grid;grid-template-columns:1fr 1fr;gap:20px;margin-bottom:28px;">
                    <div>
                        <label style="display:block;font-size:13px;font-weight:600;color:#374151;margin-bottom:6px;">Primary Theme Color</label>
                        <div style="display:flex;gap:8px;">
                            <input type="color" name="theme_color_1" value="{{ $siteSettings->theme_color_1 }}" style="width:44px;height:44px;padding:0;border:1px solid #e2e8f0;border-radius:8px;cursor:pointer;">
                            <input type="text" value="{{ $siteSettings->theme_color_1 }}" readonly style="flex:1;padding:0 12px;background:#f8fafc;border:1px solid #e2e8f0;border-radius:8px;font-size:12px;color:#64748b;">
                        </div>
                    </div>
                    <div>
                        <label style="display:block;font-size:13px;font-weight:600;color:#374151;margin-bottom:6px;">Secondary Gradient Color</label>
                        <div style="display:flex;gap:8px;">
                            <input type="color" name="theme_color_2" value="{{ $siteSettings->theme_color_2 }}" style="width:44px;height:44px;padding:0;border:1px solid #e2e8f0;border-radius:8px;cursor:pointer;">
                            <input type="text" value="{{ $siteSettings->theme_color_2 }}" readonly style="flex:1;padding:0 12px;background:#f8fafc;border:1px solid #e2e8f0;border-radius:8px;font-size:12px;color:#64748b;">
                        </div>
                    </div>
                </div>

                <button type="submit" style="background:#6366f1;color:#fff;border:none;padding:11px 24px;border-radius:10px;font-size:13px;font-weight:700;cursor:pointer;">
                    Apply Theme
                </button>
            </div>

            {{-- Contact Info --}}
            <div id="panel-contact" style="display:none;background:#fff;border-radius:18px;padding:32px;box-shadow:0 1px 6px rgba(0,0,0,.06);border:1px solid #f1f5f9;">
                <h3 style="font-size:17px;font-weight:800;color:#0f172a;margin:0 0 6px;">Contact Information</h3>
                <p style="font-size:13px;color:#94a3b8;margin:0 0 28px;">Address, Email and Titles</p>

                <div style="display:grid;grid-template-columns:1fr 1fr;gap:20px;margin-bottom:20px;">
                    <div>
                        <label style="display:block;font-size:13px;font-weight:600;color:#374151;margin-bottom:6px;">Contact Title</label>
                        <input type="text" name="contact_title" value="{{ $siteSettings->contact_title }}" style="width:100%;padding:10px 14px;border:1px solid #e2e8f0;border-radius:10px;">
                    </div>
                    <div>
                        <label style="display:block;font-size:13px;font-weight:600;color:#374151;margin-bottom:6px;">Contact Subtitle</label>
                        <input type="text" name="contact_subtitle" value="{{ $siteSettings->contact_subtitle }}" style="width:100%;padding:10px 14px;border:1px solid #e2e8f0;border-radius:10px;">
                    </div>
                </div>

                <div style="margin-bottom:20px;">
                    <label style="display:block;font-size:13px;font-weight:600;color:#374151;margin-bottom:6px;">Address</label>
                    <input type="text" name="contact_address" value="{{ $siteSettings->contact_address }}" style="width:100%;padding:10px 14px;border:1px solid #e2e8f0;border-radius:10px;">
                </div>

                <div style="margin-bottom:28px;">
                    <label style="display:block;font-size:13px;font-weight:600;color:#374151;margin-bottom:6px;">Email</label>
                    <input type="email" name="contact_email" value="{{ $siteSettings->contact_email }}" style="width:100%;padding:10px 14px;border:1px solid #e2e8f0;border-radius:10px;">
                </div>

                <button type="submit" style="background:#6366f1;color:#fff;border:none;padding:11px 24px;border-radius:10px;font-size:13px;font-weight:700;cursor:pointer;">
                    Save Contact Info
                </button>
            </div>

            {{-- Security Placeholder --}}
            <div id="panel-security" style="display:none;background:#fff;border-radius:18px;padding:32px;box-shadow:0 1px 6px rgba(0,0,0,.06);border:1px solid #f1f5f9;">
                <h3 style="font-size:17px;font-weight:800;color:#0f172a;margin:0 0 6px;">Account Security</h3>
                <p style="font-size:13px;color:#94a3b8;margin:0 0 28px;">Password and Session management is handled on the Profile page.</p>
                <a href="{{ route('profile.edit') }}" style="display:inline-block;background:#6366f1;color:#fff;padding:11px 24px;border-radius:10px;font-size:13px;font-weight:700;text-decoration:none;">Go to Profile Settings</a>
            </div>
        </form>
    </div>

    <script>
        function showTab(id) {
            ['general','hero','meta','appearance','contact','security'].forEach(t => {
                const el = document.getElementById('panel-'+t);
                if (el) el.style.display = t===id ? 'block' : 'none';
                
                const btn = document.getElementById('tab-'+t);
                if (btn) {
                    btn.style.background = t===id ? 'rgba(99,102,241,0.1)' : 'transparent';
                    btn.style.color = t===id ? '#6366f1' : '#64748b';
                }
            });
        }
    </script>
</x-dashboard-layout>
