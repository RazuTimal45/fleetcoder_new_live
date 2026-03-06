<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Setting::create([
            'title' => 'FleetCoders',
            'subtitle' => 'Premium Dashboard Solution',
            'meta_keyword' => 'laravel, dashboard, fleetcoders',
            'meta_description' => 'A powerful and dynamic management console.',
            'theme_color_1' => '#6366f1',
            'theme_color_2' => '#8b5cf6',
            'hero_title' => 'Welcome to FleetCoders',
            'hero_subtitle' => 'A premium dashboard solution for Laravel applications.',
            'about_title' => 'About FleetCoders',
            'about_subtitle' => 'A premium dashboard solution for Laravel applications.',
            'about_description' => 'A premium dashboard solution for Laravel applications.',
            'contact_title' => 'Contact FleetCoders',
            'contact_subtitle' => 'A premium dashboard solution for Laravel applications.',
            'contact_address' => 'Kumaripati, Lalitpur',
            'contact_email' => 'contact@fleetcoders.com',
        ]);
    }
}
