<?php

namespace Database\Seeders;

use App\Models\LeadershipMessage;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class LeadershipMessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Default Admin User for Dashboard
        User::firstOrCreate(
            ['email' => 'admin@sunriseschool.com'],
            [
                'name' => 'Sunrise Admin',
                'password' => Hash::make('admin123'),
                'email_verified_at' => now(),
            ]
        );

        // Seed or update the 3 main leadership messages
        $leaders = [
            [
                'role' => 'chairman',
                'designation' => 'Hon. Chairman',
                'name' => 'Mr. Yogesh Bobade',
                'qualification' => 'Founder & Chairman',
                'photo_path' => '/storage/page-images/home/8amCH8FpswhV6t65rBBV8DMMAvVMRVKsivpP5Fmr.png',
                'message' => 'Education is the most powerful catalyst for positive transformation in society. At Sunrise English Medium School, our vision has always been to build an institution where high academic standards go hand in hand with strong moral integrity. We are dedicated to providing every child with an atmosphere of curiosity, dignity, and personal growth, empowering them to become compassionate and capable global citizens.',
                'email' => 'chairman@sunriseschool.com',
                'phone' => '+91 9767644720',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'role' => 'secretary',
                'designation' => 'Hon. Secretary',
                'name' => 'Mr. Secretary',
                'qualification' => 'Secretary - Sunrise Trust',
                'photo_path' => '/images/leadership/secretary.jpg',
                'message' => 'Our continuous endeavor is to provide dependable governance, student welfare, and continuous modern development. We ensure our children have access to the finest infrastructure, modern educational technology, and child-safe environments so that families have complete peace of mind and learners are empowered to excel.',
                'email' => 'secretary@sunriseschool.com',
                'phone' => '+91 9657100909',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'role' => 'director',
                'designation' => 'Academic Director',
                'name' => 'Mrs. Shahida Aslam Pathan',
                'qualification' => 'M.A., B.Ed. (Academic Director & Principal)',
                'photo_path' => '/images/leadership/director.jpeg',
                'message' => 'True education goes far beyond textbooks and examinations; it is about awakening curiosity, building resilient character, and cultivating a lifelong passion for learning. At Sunrise, our child-centric CBSE pedagogy and experiential learning approach ensure that every student is valued, supported, and encouraged to achieve their highest personal and academic best.',
                'email' => 'Hmsunrisegurukul@gmail.com',
                'phone' => '+91 9767644720',
                'sort_order' => 3,
                'is_active' => true,
            ],
        ];

        foreach ($leaders as $leaderData) {
            LeadershipMessage::updateOrCreate(
                ['role' => $leaderData['role']],
                $leaderData
            );
        }
    }
}
