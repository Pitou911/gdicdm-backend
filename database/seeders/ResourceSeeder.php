<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResourceSeeder extends Seeder {
    public function run(): void {
        DB::table('resources')->insert([
            ['type' => '📄 PDF Guide',   'title' => 'Introduction to Government Bonds for Retail Investors', 'meta' => 'Beginner',       'link_text' => '⬇ Download', 'created_at' => now(), 'updated_at' => now()],
            ['type' => '🎬 Video',       'title' => 'What is Public Debt? — Explained Simply in Khmer',      'meta' => '12 min',         'link_text' => '▶ Watch',    'created_at' => now(), 'updated_at' => now()],
            ['type' => '🖼 Infographic', 'title' => 'Cambodia\'s Debt Portfolio — Visual Overview 2024',     'meta' => 'Infographic',    'link_text' => '🔍 View',    'created_at' => now(), 'updated_at' => now()],
            ['type' => '📄 PDF Guide',   'title' => 'How to Buy Government Bonds — Step by Step',            'meta' => 'Investor Guide', 'link_text' => '⬇ Download', 'created_at' => now(), 'updated_at' => now()],
            ['type' => '🔗 External',    'title' => 'ADB Cambodia Country Page — Economic Overview',         'meta' => 'ADB',            'link_text' => '↗ Open',     'created_at' => now(), 'updated_at' => now()],
            ['type' => '🎬 Video',       'title' => 'Understanding Treasury Bills — Short-term Investments', 'meta' => '8 min',          'link_text' => '▶ Watch',    'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}