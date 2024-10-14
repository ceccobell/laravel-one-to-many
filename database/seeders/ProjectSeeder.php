<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Type;

// per lo slug aggiungo questo
use Illuminate\Support\Str;

use App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $types = Type::all();
        for($i = 0; $i<10; $i++ )   {
            $project = new Project();
            $project->name = $faker->sentence(4);
            $project->summary = $faker->paragraphs(3, true);

            $project->slug = Str::slug($project->name, '-');

            if ($types->isNotEmpty()) {
                $project->type_id = $types->random()->id;
            }

            $project->save();

        }
    }
}