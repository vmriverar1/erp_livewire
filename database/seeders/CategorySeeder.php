<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            "name"=>"CURSOS",
            "image" => "https://dummyimage.com/600x400/000/fff"
        ]);

        Category::create([
            "name"=>"TENIS",
            "image" => "https://dummyimage.com/600x400/000/fff"
        ]);

        Category::create([
            "name"=>"CELULARES",
            "image" => "https://dummyimage.com/600x400/000/fff"
        ]);

        Category::create([
            "name"=>"COMPUTADORAS",
            "image" => "https://dummyimage.com/600x400/000/fff"
        ]);
    }
}
