<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        \App\Models\User::factory()->create([
            'name' => 'Martin L',
            'role' => 'admin',
            'email' => 'admin@canell.be',
            'password' => 'password',
            'is_active' => '1',
            'company_id' => null,
        ]);
        \App\Models\User::factory()->create([
            'name' => 'Mathieu T',
            'role' => 'user',
            'email' => 'user@canell.be',
            'password' => 'password',
            'is_active' => '1',
            'company_id' => null,
        ]);

        \App\Models\Company::factory()->create([
            'name' => 'Canell',
            'desc_short' => 'Canell est une entreprise de développement web et de développement mobile.',
            'desc_long' => 'Canell est une entreprise de développement web et de développement mobile.',
            'url_img' => 'https://picsum.photos/50/50',
            'url_web' => 'http://www.canell.be',
            'url_fb' => 'https://www.facebook.com/canell',
            'url_tw' => 'https://twitter.com/canell',
            'url_ig' => 'https://www.instagram.com/canell',
            'url_yt' => 'https://www.youtube.com/canell',
            'user_id' => 1,
        ]);

        \App\Models\Company::factory()->create([
            'name' => 'Company 2',
            'desc_short' => 'Company 2 est une entreprise de développement web et de développement mobile.',
            'desc_long' => 'Company 2 est une entreprise de développement web et de développement mobile.',
            'url_img' => 'https://picsum.photos/50/50',
            'url_web' => 'http://www.company-2.be',
            'url_fb' => 'https://www.facebook.com/company-2',
            'url_tw' => 'https://twitter.com/company-2',
            'url_ig' => 'https://www.instagram.com/company-2',
            'url_yt' => 'https://www.youtube.com/company-2',
            'user_id' => 1,
        ]);

        \App\Models\User::factory(20)->create();
        \App\Models\Company::factory(20)->create();
        \App\Models\Task::factory(50)->create();
    }
}
