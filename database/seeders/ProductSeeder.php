<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::create([
            'name' => 'Brownies Original',
            'description' => 'Brownies coklat klasik yang lembut.',
            'price' => 25000,
            'image' => 'brownies1.jpg',
            'stock' => 20
        ]);

        Product::create([
            'name' => 'Brownies Keju',
            'description' => 'Brownies dengan topping keju melimpah.',
            'price' => 30000,
            'image' => 'brownies2.jpg',
            'stock' => 15
        ]);

        Product::create([
            'name' => 'Brownies Almond',
            'description' => 'Brownies premium dengan taburan almond.',
            'price' => 35000,
            'image' => 'brownies3.jpg',
            'stock' => 10
        ]);
    }
}