<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\Service;
use App\Models\Stat;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        $siteSettings = Setting::first() ?? new Setting();
        $services = Service::orderBy('order')->get();
        $stats = Stat::orderBy('order')->get();

        return view('welcome', compact('siteSettings', 'services', 'stats'));
    }
}
