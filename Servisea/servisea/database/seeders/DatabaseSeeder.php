<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

            $category = [
            ['CATEGORY_NAME' => 'Graphics & Design',     'CATEGORY_DESCRIPTION' => 'Illustration / Cartooning / Painting / Sculpting'],
            ['CATEGORY_NAME' => 'Digital Marketing',     'CATEGORY_DESCRIPTION' => 'Marketing / Advertising / Sales / PR / Internet marketing'],
            ['CATEGORY_NAME' => 'Writing & Translation', 'CATEGORY_DESCRIPTION' => 'Content Writing / Presentations / Multimedia'],
            ['CATEGORY_NAME' => 'Video & Animation',     'CATEGORY_DESCRIPTION' => 'Videography / Photography / Video editing / Photo editing'],
            ['CATEGORY_NAME' => 'Business',              'CATEGORY_DESCRIPTION' => 'Enterprise resource planning (ERP)/ Virtual Assistant / Business consultations'],
            ['CATEGORY_NAME' => 'Music & Audio',         'CATEGORY_DESCRIPTION' => 'Audio Editing / Voice Acting / Audiobook Production'],
            ['CATEGORY_NAME' => 'Programming & Tech',    'CATEGORY_DESCRIPTION' => 'Web Design / Web Development / Mobile Development / Networking / Hardware / Engineering / CAD / Architecture']
            ];

        $user = [
            ['USERNAME' => 'Jean',  'USER_EMAIL' => 'Jean@gmail.com',   'USER_PASSWORD' => Hash::make('Jean1234'),  'ACCOUNT_STATUS' => '1',    'USER_ROLE' => '1'],
            ['USERNAME' => 'Jean1', 'USER_EMAIL' => 'Jean1@gmail.com',  'USER_PASSWORD' =>Hash::make('Jean1234'),   'ACCOUNT_STATUS' => '1',    'USER_ROLE' => '1'],
        ];


        Category::insert($category);
        User::insert($user);


    }

    }

