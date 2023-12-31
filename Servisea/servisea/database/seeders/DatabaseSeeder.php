<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Freelancer;
use App\Models\Gig;
use App\Models\Package;
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
            ['USERNAME' => 'Jean1', 'USER_EMAIL' => 'Jean1@gmail.com',  'USER_PASSWORD' => Hash::make('Jean1234'),   'ACCOUNT_STATUS' => '1',    'USER_ROLE' => '2'],
            ['USERNAME' => 'Jean2', 'USER_EMAIL' => 'Jean2@gmail.com',  'USER_PASSWORD' => Hash::make('Jean1234'),   'ACCOUNT_STATUS' => '1',    'USER_ROLE' => '3'],
        ];

        $admin = [
            ['ADMIN_USERNAME'=> 'Dev01', 'ADMIN_EMAIL'=> 'dev01@gmail.com', 'ADMIN_PASSWORD'=> Hash::make('dev01234'), 'ADMIN_STATUS'=> 1, 'ADMIN_LEVEL'=> 1,],
        ];

        $employee = [
            ['USER_ID'=> 3, 'DEPARTMENT_ID'=> 1, 'EMP_LEVEL'=> 1, 'EMP_SINCE'=> now(),'EMP_SALARY'=> 5000.00 , 'created_at'=> now(), 'updated_at'=> now()],
        ];

        $freelancer= [
            ['USER_ID' => 2,  'F_LEVEL' => 1,   'F_DESCRIPTION' =>'Description of Freelancer',  'F_SINCE' => now(), 'F_LANGUAGE' => 'EN'],
        ];

        $gig= [
            ['CATEGORY_ID'=>1,  'FREELANCER_ID' => 1,   'GIG_NAME' =>'Name of gig',  'GIG_DESCRIPTION' => 'Description of Gig',    'GIG_REQUIREMENTS' => 'Requirements of Gig' , 'GIG_STATUS' => 'COMPLETED'],
        ];

        $package= [
            ['PACKAGE_NAME'=>1,  'PRICE' => 1.00,   'GIG_ID' =>1,  'PACKAGE_DESCRIPTION' => 'Description of Package', 'DELIVERY_DAYS' => 2 ,'REVISION' => 'Unlimited' , 'PACKAGE_STATUS' => 'BASIC'],
        ];


        Category::insert($category);
        User::insert($user);
        Freelancer::insert($freelancer);
        Gig::insert($gig);
        Package::insert($package);


    }

    }

