<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DocumentSeeder extends Seeder {
    public function run(): void {
        DB::table('documents')->insert([
            ['type' => '📄 Debt Bulletin', 'title' => 'Cambodia Public Debt Bulletin - Q3 2024',        'meta' => 'Sept 2024 · 2.4 MB', 'link_text' => '⬇ Download', 'created_at' => now(), 'updated_at' => now()],
            ['type' => '📄 Debt Bulletin', 'title' => 'Cambodia Public Debt Bulletin — Q2 2024',        'meta' => 'Jun 2024 · 2.2 MB',  'link_text' => '⬇ Download', 'created_at' => now(), 'updated_at' => now()],
            ['type' => '📄 Debt Bulletin', 'title' => 'Cambodia Public Debt Bulletin — Q1 2024',        'meta' => 'Mar 2024 · 2.1 MB',  'link_text' => '⬇ Download', 'created_at' => now(), 'updated_at' => now()],
            ['type' => '📄 Statistical',   'title' => 'Annual External Debt Statistics Report 2023',    'meta' => 'Dec 2023 · 4.1 MB',  'link_text' => '⬇ Download', 'created_at' => now(), 'updated_at' => now()],
            ['type' => '📄 Legal',         'title' => 'Law on Public Debt Management (2023 Amendment)', 'meta' => '2023 · 1.2 MB',      'link_text' => '⬇ Download', 'created_at' => now(), 'updated_at' => now()],
            ['type' => '📄 Bond Info',     'title' => 'Government Bond Series 6 — Prospectus 2025',     'meta' => 'Jan 2025 · 1.8 MB',  'link_text' => '⬇ Download', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}