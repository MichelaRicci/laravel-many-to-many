<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class ProjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {

        for ($i=0; $i < 5 ; $i++) { 
            $project = new Project();
            $project->title = $faker->name();
            $project->content = $faker->paragraph();
            //$project->image = $faker->imageUrl(250, 250);
            $project->github = $faker->url();
            $project->slug = Str::slug($project->title, '-');
            
            $project->save();
        }
    }
}
