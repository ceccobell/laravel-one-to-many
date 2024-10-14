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

        foreach ($types as $type) {
            
            $type= new Type();
            $type->name =$type;
            $type->slug = Str::slug($type,'-');

            $type->save();

        }
    }
}