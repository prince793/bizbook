<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'name'        => 'Business Consultation',
                'description' => 'One-on-one consultation to help you plan and grow your business effectively.',
                'duration'    => '60 mins',
                'price'       => 1500.00,
                'icon'        => '💼',
                'is_active'   => true,
            ],
            [
                'name'        => 'Web Development',
                'description' => 'Custom website design and development tailored to your business needs.',
                'duration'    => '2-4 weeks',
                'price'       => 15000.00,
                'icon'        => '🌐',
                'is_active'   => true,
            ],
            [
                'name'        => 'Digital Marketing',
                'description' => 'Social media management, SEO, and online advertising to grow your brand.',
                'duration'    => '30 mins',
                'price'       => 3000.00,
                'icon'        => '📱',
                'is_active'   => true,
            ],
            [
                'name'        => 'Graphic Design',
                'description' => 'Professional logo, branding, and marketing material design services.',
                'duration'    => '3-5 days',
                'price'       => 2500.00,
                'icon'        => '🎨',
                'is_active'   => true,
            ],
            [
                'name'        => 'IT Support',
                'description' => 'Technical support, troubleshooting, and maintenance for your systems.',
                'duration'    => '45 mins',
                'price'       => 800.00,
                'icon'        => '🖥️',
                'is_active'   => true,
            ],
            [
                'name'        => 'Photography',
                'description' => 'Professional photography for events, products, and corporate needs.',
                'duration'    => '2-3 hours',
                'price'       => 5000.00,
                'icon'        => '📷',
                'is_active'   => true,
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}