<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function update(Request $request)
    {
        $setting = \App\Models\Setting::firstOrCreate(['id' => 1]);
        
        $data = $request->validate([
            'title' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'meta_keyword' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'theme_color_1' => 'nullable|string|max:7',
            'theme_color_2' => 'nullable|string|max:7',
            'hero_title' => 'nullable|string|max:255',
            'hero_subtitle' => 'nullable|string',
            'about_title' => 'nullable|string|max:255',
            'about_subtitle' => 'nullable|string|max:255',
            'about_description' => 'nullable|string',
            'contact_title' => 'nullable|string|max:255',
            'contact_subtitle' => 'nullable|string|max:255',
            'contact_address' => 'nullable|string|max:255',
            'contact_email' => 'nullable|email|max:255',
            'is_editable' => 'nullable|boolean',
        ]);

        $data['is_editable'] = $request->has('is_editable');

        $setting->update($data);

        return back()->with('status', 'settings-updated');
    }

    public function updateOrder(Request $request)
    {
        $setting = Setting::first();
        if (!$setting) return response()->json(['error' => 'No settings found'], 404);

        $request->validate([
            'order' => 'required|array'
        ]);

        $setting->update(['section_order' => $request->order]);

        return response()->json(['success' => true]);
    }

    public function about()
    {
        return view('dashboard.about');
    }
}
