<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="keywords" content="{{ $siteSettings->meta_keyword ?? '' }}">
    <meta name="description" content="{{ $siteSettings->meta_description ?? '' }}">
    <title>{{ $title ?? $siteSettings->title ?? config('app.name', 'Laravel') }}</title>
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('apple-touch-icon.png') }}">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:300,400,500,600,700&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        :root {
            --theme-color-1: {{ $siteSettings->theme_color_1 ?? '#6366f1' }};
            --theme-color-2: {{ $siteSettings->theme_color_2 ?? '#8b5cf6' }};
        }
        * { font-family: 'Inter', sans-serif; }

        /* ── Sidebar ── */
        .sidebar {
            position: fixed; top: 0; left: 0; height: 100vh; width: 260px;
            background: linear-gradient(160deg, #0f172a 0%, #1e293b 100%);
            display: flex; flex-direction: column; z-index: 50;
            box-shadow: 4px 0 24px rgba(0,0,0,.25);
            transition: all .3s cubic-bezier(0.4, 0, 0.2, 1);
            overflow-x: hidden;
        }
        .sidebar-logo {
            display: flex; align-items: center; gap: 12px;
            padding: 24px 20px 20px; border-bottom: 1px solid rgba(255,255,255,.07);
            white-space: nowrap;
        }
        .sidebar-logo-icon {
            width: 40px; height: 40px; border-radius: 10px;
            background: linear-gradient(135deg, var(--theme-color-1), var(--theme-color-2));
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0;
        }
        .sidebar-logo-text { color: #f1f5f9; font-weight: 700; font-size: 17px; letter-spacing: -.3px; transition: opacity .2s; }
        .sidebar-logo-sub  { color: #64748b; font-size: 11px; font-weight: 500; margin-top: 2px; }

        /* Nav section */
        .nav-section { flex: 1; padding: 20px 12px; overflow-y: auto; overflow-x: hidden; }
        .nav-group-label {
            color: #475569; font-size: 10px; font-weight: 700; letter-spacing: 1px;
            text-transform: uppercase; padding: 0 12px; margin: 16px 0 6px;
            white-space: nowrap; transition: opacity .2s;
        }
        .nav-link {
            display: flex; align-items: center; gap: 12px;
            padding: 12px 14px; border-radius: 10px; margin-bottom: 4px;
            color: #94a3b8; text-decoration: none; font-size: 14px; font-weight: 500;
            transition: all .2s ease; position: relative; overflow: hidden;
            white-space: nowrap;
        }
        .nav-link:hover {
            background: rgba(255,255,255,.06); color: #e2e8f0;
        }
        .nav-link.active {
            background: linear-gradient(90deg, rgba(99,102,241,0.25), rgba(99,102,241,0.08));
            color: #a5b4fc; border: 1px solid rgba(99,102,241,.2);
        }
        .nav-link.active::before {
            content: ''; position: absolute; left: 0; top: 20%; height: 60%;
            width: 3px; background: var(--theme-color-1); border-radius: 0 3px 3px 0;
        }
        .nav-icon { width: 20px; height: 20px; flex-shrink: 0; }
        .nav-text { transition: opacity .2s; }
        .nav-badge {
            margin-left: auto; background: var(--theme-color-1); color: #fff;
            font-size: 10px; font-weight: 700; padding: 2px 7px; border-radius: 20px;
            transition: opacity .2s;
        }

        /* User panel at bottom */
        .sidebar-user {
            padding: 16px; border-top: 1px solid rgba(255,255,255,.07);
            white-space: nowrap;
        }
        .sidebar-user-inner {
            display: flex; align-items: center; gap: 12px;
            padding: 10px 8px; border-radius: 10px; cursor: pointer;
            transition: background .2s;
        }
        .sidebar-user-inner:hover { background: rgba(255,255,255,.06); }
        .avatar {
            width: 38px; height: 38px; border-radius: 10px; flex-shrink:0;
            background: linear-gradient(135deg, var(--theme-color-1), var(--theme-color-2));
            display: flex; align-items: center; justify-content: center;
            font-weight: 700; font-size: 15px; color: #fff;
        }
        .user-info { transition: opacity .2s; flex: 1; overflow: hidden; }
        .user-name  { color: #e2e8f0; font-size: 13px; font-weight: 600; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
        .user-email { color: #64748b; font-size: 11px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
        .logout-btn {
            background: none; border: none; cursor: pointer;
            color: #475569; transition: color .2s, opacity .2s; padding: 4px;
        }
        .logout-btn:hover { color: #ef4444; }

        /* ── Main content ── */
        .main-wrapper {
            margin-left: 260px; min-height: 100vh;
            background: #f1f5f9; display: flex; flex-direction: column;
            transition: margin-left .3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* Top bar */
        .topbar {
            background: #fff; border-bottom: 1px solid #e2e8f0;
            padding: 0 32px; height: 64px;
            display: flex; align-items: center; justify-content: space-between;
            position: sticky; top: 0; z-index: 40;
            box-shadow: 0 1px 8px rgba(0,0,0,.05);
        }
        .topbar-title { font-size: 18px; font-weight: 700; color: #0f172a; }
        .topbar-breadcrumb { font-size: 12px; color: #94a3b8; margin-top: 2px; }
        .topbar-right { display: flex; align-items: center; gap: 16px; }
        .topbar-icon-btn {
            width: 38px; height: 38px; border-radius: 10px; border: 1px solid #e2e8f0;
            background: #fff; display: flex; align-items: center; justify-content: center;
            cursor: pointer; transition: all .2s; color: #64748b;
        }
        .topbar-icon-btn:hover { background: #f8fafc; border-color: #cbd5e1; color: #0f172a; }

        /* Page content */
        .page-content { padding: 32px; flex: 1; }

        /* ── Sidebar Collapsed State (Desktop) ── */
        @media (min-width: 769px) {
            body.sidebar-collapsed .sidebar { width: 80px; }
            body.sidebar-collapsed .main-wrapper { margin-left: 80px; }
            body.sidebar-collapsed .sidebar-logo-text,
            body.sidebar-collapsed .sidebar-logo-sub,
            body.sidebar-collapsed .nav-group-label,
            body.sidebar-collapsed .nav-text,
            body.sidebar-collapsed .nav-badge,
            body.sidebar-collapsed .user-info,
            body.sidebar-collapsed .logout-btn { 
                opacity: 0; pointer-events: none; width: 0; margin: 0; padding: 0;
            }
            body.sidebar-collapsed .sidebar-logo { padding-left: 20px; }
            body.sidebar-collapsed .nav-link { justify-content: center; padding: 12px 0; gap: 0; }
            body.sidebar-collapsed .nav-icon { margin: 0; }
        }

        /* Responsive */
        .sidebar-overlay { display: none; }
        @media (max-width: 768px) {
            .sidebar { transform: translateX(-100%); }
            body.sidebar-open .sidebar { transform: translateX(0); width: 260px; }
            .sidebar-overlay { 
                display: block; position: fixed; inset: 0; background: rgba(0,0,0,.5); 
                z-index: 40; opacity: 0; pointer-events: none; transition: opacity .3s; 
            }
            body.sidebar-open .sidebar-overlay { opacity: 1; pointer-events: all; }
            .main-wrapper { margin-left: 0 !important; }
            .page-content { padding: 20px 16px; }
            .topbar { padding: 0 16px; }
        }
    </style>
</head>
<body class="antialiased">

<!-- Mobile overlay -->
<div class="sidebar-overlay" id="sidebarOverlay" onclick="toggleSidebar()"></div>

<!-- ═══════════════════════════════ SIDEBAR ═══════════════════════════════ -->
<aside class="sidebar" id="sidebar">

    <!-- Logo -->
    <div class="sidebar-logo">
        <div class="sidebar-logo-icon">
            @if($siteSettings->header_logo)
                <!-- <img src="{{ $siteSettings->header_logo }}" alt="Logo" style="width: 24px; height: 24px;"> -->
                  <img src="{{ asset('logo-white.png') }}" alt="FleetCoders Logo" class="w-8 h-8">
            @else
                <svg xmlns="http://www.w3.org/2000/svg" class="nav-icon" fill="none" viewBox="0 0 24 24" stroke="white" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                </svg>
            @endif
        </div>
        <div class="sidebar-logo-text-wrapper">
            <div class="sidebar-logo-text">{{ $siteSettings->title ?? config('app.name') }}</div>
            <!-- <div class="sidebar-logo-sub">{{ $siteSettings->subtitle ?? 'Management Console' }}</div> -->
        </div>
    </div>

    <!-- Navigation -->
    <nav class="nav-section">
        <div class="nav-group-label">Main</div>

        <a href="{{ route('dashboard') }}"
           class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <svg class="nav-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
            </svg>
            <span class="nav-text">Home</span>
        </a>

        <a href="{{ route('dashboard.services') }}"
           class="nav-link {{ request()->is('dashboard/services') ? 'active' : '' }}">
            <svg class="nav-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/>
            </svg>
            <span class="nav-text">Services</span>
        </a>

        <a href="{{ route('dashboard.stats') }}"
           class="nav-link {{ request()->is('dashboard/stats') ? 'active' : '' }}">
            <svg class="nav-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
            </svg>
            <span class="nav-text">Stats</span>
        </a>

        <a href="{{ route('dashboard.users') }}"
           class="nav-link {{ request()->is('dashboard/users') ? 'active' : '' }}">
            <svg class="nav-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
            </svg>
            <span class="nav-text">Users</span>
        </a>

        <div class="nav-group-label">General</div>

        <a href="{{ route('dashboard.contacts') }}"
           class="nav-link {{ request()->is('dashboard/contacts') ? 'active' : '' }}">
            <svg class="nav-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
            </svg>
            <span class="nav-text">Contacts</span>
        </a>

        <a href="{{ route('dashboard.about') }}"
           class="nav-link {{ request()->is('dashboard/about') ? 'active' : '' }}">
            <svg class="nav-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            <span class="nav-text">About</span>
        </a>

        <a href="{{ route('dashboard.settings') }}"
           class="nav-link {{ request()->is('dashboard/settings') ? 'active' : '' }}">
            <svg class="nav-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
            </svg>
            <span class="nav-text">Settings</span>
        </a>

        <div class="nav-group-label">Account</div>

        <a href="{{ route('profile.edit') }}"
           class="nav-link {{ request()->routeIs('profile.*') ? 'active' : '' }}">
            <svg class="nav-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
            </svg>
            <span class="nav-text">Profile</span>
        </a>
    </nav>

    <!-- User Panel -->
    <div class="sidebar-user">
        <div class="sidebar-user-inner">
            <div class="avatar">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</div>
            <div class="user-info">
                <div class="user-name">{{ auth()->user()->name }}</div>
                <div class="user-email">{{ auth()->user()->email }}</div>
            </div>
            <form method="POST" action="{{ route('logout') }}" class="logout-form">
                @csrf
                <button type="submit" class="logout-btn" title="Logout">
                    <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                    </svg>
                </button>
            </form>
        </div>
    </div>
</aside>

<!-- ═══════════════════════════════ MAIN ═══════════════════════════════ -->
<div class="main-wrapper">

    <!-- Top Bar -->
    <header class="topbar">
        <div class="flex items-center gap-3">
            <button class="topbar-icon-btn" onclick="toggleSidebar()">
                <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
            <div>
                <div class="topbar-title">{{ $pageTitle ?? 'Dashboard' }}</div>
                <div class="topbar-breadcrumb">{{ config('app.name') }} › {{ $pageTitle ?? 'Home' }}</div>
            </div>
        </div>
        <div class="topbar-right">
            <button class="topbar-icon-btn" title="Notifications">
                <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                </svg>
            </button>
            <div style="width:1px;height:24px;background:#e2e8f0;"></div>
            <div class="avatar" style="width:36px;height:36px;font-size:13px;border-radius:8px;">
                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
            </div>
        </div>
    </header>

    <!-- Page content -->
    <main class="page-content">
        {{ $slot }}
    </main>
</div>

<!-- ═══════════════════════════════ GLOBAL MODALS ═══════════════════════════════ -->
<div id="deleteModal" style="display:none; position:fixed; inset:0; background:rgba(15,23,42,0.6); backdrop-filter:blur(4px); z-index:100; align-items:center; justify-content:center; padding:20px;">
    <div style="background:#fff; width:100%; max-width:400px; border-radius:24px; padding:32px; box-shadow:0 20px 50px rgba(0,0,0,0.2); transform:translateY(20px); transition:all 0.3s ease; border:1px solid #f1f5f9;">
        <div style="width:56px; height:56px; background:#fee2e2; border-radius:18px; display:flex; align-items:center; justify-content:center; margin:0 auto 24px; color:#ef4444;">
            <svg width="28" height="28" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
            </svg>
        </div>
        <h3 id="deleteModalTitle" style="font-size:18px; font-weight:800; color:#0f172a; margin:0 0 8px; text-align:center;">Confirm Deletion</h3>
        <p id="deleteModalMessage" style="font-size:14px; color:#64748b; line-height:1.6; margin:0 0 32px; text-align:center;">Are you sure you want to remove this item? This action cannot be undone.</p>
        
        <div style="display:grid; grid-template-columns:1fr 1fr; gap:12px;">
            <button onclick="closeDeleteModal()" style="padding:12px; background:#f1f5f9; border:none; border-radius:12px; font-size:13px; font-weight:700; color:#475569; cursor:pointer; transition:background .2s;">
                Cancel
            </button>
            <button id="confirmDeleteBtn" style="padding:12px; background:#ef4444; border:none; border-radius:12px; font-size:13px; font-weight:700; color:#fff; cursor:pointer; box-shadow:0 4px 12px rgba(239,68,68,0.2); transition:transform .2s;">
                Delete Now
            </button>
        </div>
    </div>
</div>

<script>
    let activeDeleteFormId = null;

    function confirmDelete(formId, title = 'Confirm Deletion', message = 'Are you sure you want to remove this item? This action cannot be undone.') {
        activeDeleteFormId = formId;
        document.getElementById('deleteModalTitle').innerText = title;
        document.getElementById('deleteModalMessage').innerText = message;
        
        const modal = document.getElementById('deleteModal');
        modal.style.display = 'flex';
        setTimeout(() => {
            modal.querySelector('div').style.transform = 'translateY(0)';
        }, 10);
    }

    function closeDeleteModal() {
        const modal = document.getElementById('deleteModal');
        modal.querySelector('div').style.transform = 'translateY(20px)';
        setTimeout(() => {
            modal.style.display = 'none';
        }, 200);
        activeDeleteFormId = null;
    }

    document.getElementById('confirmDeleteBtn').onclick = function() {
        if (activeDeleteFormId) {
            document.getElementById(activeDeleteFormId).submit();
        }
    };

    // Close on escape
    window.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') closeDeleteModal();
    });
    function toggleSidebar() {
        if (window.innerWidth <= 768) {
            document.body.classList.toggle('sidebar-open');
        } else {
            document.body.classList.toggle('sidebar-collapsed');
        }
    }
</script>
</body>
</html>
