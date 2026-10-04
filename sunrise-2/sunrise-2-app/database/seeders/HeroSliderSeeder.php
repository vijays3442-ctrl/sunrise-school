<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HeroSlider;

class HeroSliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        HeroSlider::truncate();

        $sliders = [
            [
                'title' => 'The Best Educational Start For Your Child',
                'subtitle' => 'State-of-the-art campus, experiential learning, and holistic CBSE & LEAD curriculum nurturing future global leaders.',
                'image_path' => '/images/sliders/carousel-1.jpg',
                'button_text' => 'Admissions Open 2026-27',
                'button_link' => '/admissions',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Inspiring Young Minds, Building Brighter Futures',
                'subtitle' => 'Interactive digital smart classes, expansive sports facilities, and caring faculty dedicated to every child\'s growth.',
                'image_path' => '/images/sliders/carousel-2.jpg',
                'button_text' => 'Explore Our Classes',
                'button_link' => '#classes',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'From Learning Answers To Learning How To Think',
                'subtitle' => 'Sunrise English Medium School & Gurukul — Fostering conceptual clarity, analytical thinking, and lifelong moral character.',
                'image_path' => '/images/sliders/1790056274_whatsapp-image-2026-09-11-at-122705-pm.jpeg',
                'button_text' => 'About Our School',
                'button_link' => '/about',
                'sort_order' => 3,
                'is_active' => true,
            ],
        ];

        foreach ($sliders as $data) {
            HeroSlider::create($data);
        }
    }
}
