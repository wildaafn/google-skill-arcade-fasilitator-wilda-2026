<?php

namespace Database\Seeders;

use App\Models\MutualProfile;
use Illuminate\Database\Seeder;

class MutualProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin Instagram
        MutualProfile::create([
            'type' => 'Instagram',
            'username' => '@m_wildaafn',
            'link' => 'https://www.instagram.com/m_wildaafn',
            'is_verified' => true
        ]);

        // Admin LinkedIn
        MutualProfile::create([
            'type' => 'LinkedIn',
            'username' => 'WILDA ARIFFATUL FAISALNUR',
            'link' => 'https://www.linkedin.com/in/wildaafn/',
            'is_verified' => true
        ]);

        // Admin GitHub
        MutualProfile::create([
            'type' => 'GitHub',
            'username' => '@wildaafn',
            'link' => 'https://github.com/wildaafn',
            'is_verified' => true
        ]);
    }
}
