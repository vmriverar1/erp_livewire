<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\ProductSeeder;
use Database\Seeders\CategorySeeder;
use Database\Seeders\DenominationSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(DenominationSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(ProductSeeder::class);

        \App\Models\User::factory()->create([
            'name' => 'Carlos Alberto',
            'phone' => '999999999',
            'profile' => 'ADMIN',
            'status' => 'ACTIVE',
            'image' => 'https://dummyimage.com/600x400/000/fff',
            'password' => bcrypt('123456')
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Amalia Rivera',
            'phone' => '999999999',
            'profile' => 'EMPLOYEE',
            'status' => 'ACTIVE',
            'image' => 'https://dummyimage.com/600x400/000/fff',
            'password' => bcrypt('123456')
        ]);
    }
}
