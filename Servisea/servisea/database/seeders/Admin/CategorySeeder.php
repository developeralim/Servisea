<?php

namespace Database\Seeders\Admin;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Category::table('category')->insert(
        //     ['CATEGORY_NAME' => 'Graphics & Design',     'CATEGORY_DESCRIPTION' => 'Illustration / Cartooning / Painting / Sculpting'],
        //     ['CATEGORY_NAME' => 'Digital Marketing',     'CATEGORY_DESCRIPTION' => 'Marketing / Advertising / Sales / PR / Internet marketing'],
        //     ['CATEGORY_NAME' => 'Writing & Translation', 'CATEGORY_DESCRIPTION' => 'Content Writing / Presentations / Multimedia'],
        //     ['CATEGORY_NAME' => 'Video & Animation',     'CATEGORY_DESCRIPTION' => 'Videography / Photography / Video editing / Photo editing'],
        //     ['CATEGORY_NAME' => 'Business',              'CATEGORY_DESCRIPTION' => 'Enterprise resource planning (ERP)/ Virtual Assistant / Business consultations'],
        //     ['CATEGORY_NAME' => 'Music & Audio',         'CATEGORY_DESCRIPTION' => 'Audio Editing / Voice Acting / Audiobook Production'],
        //     ['CATEGORY_NAME' => 'Programming & Tech',    'CATEGORY_DESCRIPTION' => 'Web Design / Web Development / Mobile Development / Networking / Hardware / Engineering / CAD / Architecture'],
        // );
    }
}
