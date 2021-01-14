<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\{Project, ProjectArticle, ProjectUser};

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 3; $i++) {
            Project::create([
                'title' => 'Project '.$i,
                'description' => 'cool description',
            ]);
        }        
    }
}
