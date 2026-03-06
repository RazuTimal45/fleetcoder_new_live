<?php

namespace Database\Seeders;

use App\Models\Setting;
use App\Models\Service;
use App\Models\Stat;
use Illuminate\Database\Seeder;

class InitialLandingPageSeeder extends Seeder
{
    public function run(): void
    {
        // Update or Create Settings
        Setting::updateOrCreate(['id' => 1], [
            'title' => 'FleetCoders',
            'subtitle' => 'Elite technical craftsmanship meets visionary design. We build the architectures that define the next decade of digital excellence.',
            'hero_title' => 'Innovate Without Limits.',
            'hero_subtitle' => 'Elite technical craftsmanship meets visionary design. We build the architectures that define the next decade of digital excellence.',
            'about_title' => 'Architecture Built on',
            'about_subtitle' => 'Vision.',
            'about_description' => "We don't Just build applications; we engineer the future. Our team combines deep technical rigor with a design-first mindset to deliver solutions that are not just functional, but legendary.",
            'contact_title' => 'Draft Your',
            'contact_subtitle' => 'Iconic Project.',
            'contact_address' => 'Kumaripati, Lalitpur',
            'contact_email' => 'hello@fleetcoders.com',
        ]);

        // Services
        $services = [
            ['title' => 'Infrastructure Ops', 'description' => 'Enterprise-scale monitoring, high-availability optimization, and zero-trust security audits.', 'icon' => '01'],
            ['title' => 'System Engineering', 'description' => 'Custom backend architectures and full-stack ecosystems built with performant, modern stacks.', 'icon' => '02'],
            ['title' => 'CMS Integration', 'description' => 'Flexible, secure, and head-less capable content management systems for modern media.', 'icon' => '03'],
            ['title' => 'Edge Web Apps', 'description' => 'Progressive web applications optimized for speed, SEO, and extreme user conversion.', 'icon' => '04'],
            ['title' => 'Identity & Trust', 'description' => 'Robust cryptographic security and identity management for sensitive data protection.', 'icon' => '05'],
            ['title' => 'CTO Advisory', 'description' => 'Strategic technology roadmaps and architectural guidance for rapid scale-ups.', 'icon' => '06'],
        ];

        foreach ($services as $index => $service) {
            Service::updateOrCreate(['title' => $service['title']], [
                'description' => $service['description'],
                'icon' => $service['icon'],
                'order' => $index,
            ]);
        }

        // Stats
        $stats = [
            ['number' => '500+', 'label' => 'Solutions Built'],
            ['number' => '99.9%', 'label' => 'Uptime Promise'],
            ['number' => '10+', 'label' => 'Decades Combined'],
            ['number' => '24/7', 'label' => 'Engineering Ops'],
        ];

        foreach ($stats as $index => $stat) {
            Stat::updateOrCreate(['label' => $stat['label']], [
                'number' => $stat['number'],
                'order' => $index,
            ]);
        }
    }
}
