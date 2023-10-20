<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name'=> 'LARAVEL Y LIVEWIRE',
            'barcode'=> '32424224242',
            'cost'=> 200,
            'price'=> 350,
            'stock'=> 1000,
            'alert'=> 10,
            'category_id'=> 1,
            'image'=> 'https://dummyimage.com/600x400/000/fff',
        ]);

        Product::create([
            'name'=> 'RUNNING BIKE',
            'barcode'=> '3452523444X',
            'cost'=> 200,
            'price'=> 350,
            'stock'=> 1000,
            'alert'=> 10,
            'category_id'=> 2,
            'image'=> 'https://dummyimage.com/600x400/000/fff',
        ]);

        Product::create([
            'name'=> 'IPHONE 11',
            'barcode'=> 'G23424SDASDA2',
            'cost'=> 200,
            'price'=> 350,
            'stock'=> 1000,
            'alert'=> 10,
            'category_id'=> 3,
            'image'=> 'https://dummyimage.com/600x400/000/fff',
        ]);
        
    }
}
