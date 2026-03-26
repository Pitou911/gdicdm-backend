<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder {
    public function run(): void {
        DB::table('news')->insert([
            [
                'icon' => '🏛',
                'category' => 'Announcement',
                'title' => 'Government Bond Series 6 Subscription Now Open to Retail Investors',
                'date' => '15 January 2025',
                'featured' => true,
                'chip' => '⭐ Featured · Announcement',
                'excerpt' => 'The Ministry of Economy and Finance announces the opening of the subscription period for Government Bond Series 6. The 5-year bond carries a coupon of 5.50% per annum, denominated in Cambodian Riel.',
                'link_text' => 'Read Full Announcement →',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'icon' => '📊',
                'category' => 'Report',
                'title' => 'Q3 2024 Public Debt Bulletin Published',
                'date' => '20 October 2024',
                'featured' => false,
                'chip' => null,
                'excerpt' => null,
                'link_text' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'icon' => '🌏',
                'category' => 'Event',
                'title' => 'GDICDM at ADB Regional Debt Management Forum, Manila',
                'date' => '5 September 2024',
                'featured' => false,
                'chip' => null,
                'excerpt' => null,
                'link_text' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'icon' => '🤝',
                'category' => 'Announcement',
                'title' => 'MOU Signed with Japan International Cooperation Agency',
                'date' => '12 August 2024',
                'featured' => false,
                'chip' => null,
                'excerpt' => null,
                'link_text' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'icon' => '📈',
                'category' => 'Announcement',
                'title' => 'Government Bond Series 5 Fully Subscribed',
                'date' => '30 March 2024',
                'featured' => false,
                'chip' => null,
                'excerpt' => null,
                'link_text' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'icon' => '🎓',
                'category' => 'Event',
                'title' => 'Financial Literacy Workshop for Retail Investors — Phnom Penh',
                'date' => '15 February 2024',
                'featured' => false,
                'chip' => null,
                'excerpt' => null,
                'link_text' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'icon' => '📋',
                'category' => 'Press',
                'title' => 'MEF Issues Official Statement on 2024 Borrowing Plan',
                'date' => '8 January 2024',
                'featured' => false,
                'chip' => null,
                'excerpt' => null,
                'link_text' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}