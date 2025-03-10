<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BusinessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('businesses')->insert([
            [
                'business_name' => 'Tech Solutions Ltd.',
                'contact_info' => 'Phone: 123-456-7890, Email: contact@techsolutions.com',
                'description' => 'We provide cutting-edge tech solutions for businesses of all sizes.',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'business_name' => 'Creative Designs Co.',
                'contact_info' => 'Phone: 987-654-3210, Email: support@creativedesigns.com',
                'description' => 'Specializing in graphic and web design for small businesses.',
                'status' => 'inactive',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'business_name' => 'Quick Mart',
                'contact_info' => 'Phone: 555-123-4567, Email: info@quickmart.com',
                'description' => 'Your go-to convenience store for all your daily needs.',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
