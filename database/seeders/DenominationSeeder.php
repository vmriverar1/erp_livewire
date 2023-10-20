<?php

namespace Database\Seeders;

use App\Models\Denomination;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DenominationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Denomination::create([
            'type'=> 'BILLETE',
            'value'=> '1000',
            'image'=> 'https://dummyimage.com/600x400/000/fff'
        ]);

        Denomination::create([
            'type'=> 'BILLETE',
            'value'=> '500',
            'image'=> 'https://dummyimage.com/600x400/000/fff'
        ]);

        Denomination::create([
            'type'=> 'BILLETE',
            'value'=> '200',
            'image'=> 'https://dummyimage.com/600x400/000/fff'
        ]);

        Denomination::create([
            'type'=> 'BILLETE',
            'value'=> '100',
            'image'=> 'https://dummyimage.com/600x400/000/fff'
        ]);

        Denomination::create([
            'type'=> 'BILLETE',
            'value'=> '50',
            'image'=> 'https://dummyimage.com/600x400/000/fff'
        ]);

        Denomination::create([
            'type'=> 'BILLETE',
            'value'=> '20',
            'image'=> 'https://dummyimage.com/600x400/000/fff'
        ]);

        Denomination::create([
            'type'=> 'BILLETE',
            'value'=> '10',
            'image'=> 'https://dummyimage.com/600x400/000/fff'
        ]);

        Denomination::create([
            'type'=> 'MONEDA',
            'value'=> '5',
            'image'=> 'https://dummyimage.com/600x400/000/fff'
        ]);

        Denomination::create([
            'type'=> 'MONEDA',
            'value'=> '2',
            'image'=> 'https://dummyimage.com/600x400/000/fff'
        ]);

        Denomination::create([
            'type'=> 'MONEDA',
            'value'=> '1',
            'image'=> 'https://dummyimage.com/600x400/000/fff'
        ]);

        Denomination::create([
            'type'=> 'OTRO',
            'value'=> '0',
            'image'=> 'https://dummyimage.com/600x400/000/fff'
        ]);
    }
}
