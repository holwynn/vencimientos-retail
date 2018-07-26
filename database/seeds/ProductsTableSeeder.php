<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $upc = 1;

        Product::create([
            'name' => 'Manteca Illolay x 200gr',
            'upc' => $upc,
            'qty' => rand(1, 50),
            'expiration' => '2018-02-12',
        ]);

        Product::create([
            'name' => 'Coca-Cola 2lt',
            'upc' => $upc + 1,
            'qty' => rand(1, 50),
            'expiration' => '2018-02-12',
        ]);

        Product::create([
            'name' => 'Coca-Cola 2lt',
            'upc' => $upc + 2,
            'qty' => rand(1, 50),
            'expiration' => '2018-02-12',
        ]);
    }
}
