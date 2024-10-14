<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type;

use Illuminate\Support\Str;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            'HTML',
            'CSS',
            'JS',
            'Laravel',
            'PHP',
            'Vite',
            'Vue'
        ];

        foreach ($types as $typeName) {
            
            $type= new Type();
            $type->name = $typeName;
            $type->slug = Str::slug($typeName,'-');

            $type->save();

        }
    }
}