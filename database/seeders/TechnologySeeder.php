<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $technologies = [
            ['label' => 'HTML', 'color' => 'primary'],
            ['label' => 'CSS', 'color' => 'warning'],
            ['label' => 'ES6', 'color' => 'success'],
            ['label' => 'Bootstrap', 'color' => 'warning'],
            ['label' => 'SASS', 'color' => 'warning'],
            ['label' => 'Vue', 'color' => 'success'],
            ['label' => 'PHP', 'color' => 'primary'],
            ['label' => 'SQL', 'color' => 'secondary'],
            ['label' => 'Laravel', 'color' => 'danger']
        ];

        foreach ($technologies as $technology) {
            $new_techology = new Technology();
            $new_techology->label = $technology['label'];
            $new_techology->color = $technology['color'];
            $new_techology->save();
    }
}
