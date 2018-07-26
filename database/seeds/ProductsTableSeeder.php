<?php

use Illuminate\Database\Seeder;
use App\User;
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
        $user = User::create([
            'name' => 'Ariel Holowinski',
            'email' => 'ariel@walmart.com',
            'password' => bcrypt('asd123')
        ]);

        $upc = 1;
        $user->products()->create([
            'name' => 'Manteca Illolay x 200gr',
            'upc' => $upc,
            'qty' => rand(1, 50),
            'expiration' => '2018-02-12',
        ]);

        $user->products()->create([
            'name' => 'Coca-Cola 2lt',
            'upc' => $upc + 1,
            'qty' => rand(1, 50),
            'expiration' => '2018-02-12',
        ]);

        $user->products()->create([
            'name' => 'Coca-Cola 2lt',
            'upc' => $upc + 2,
            'qty' => rand(1, 50),
            'expiration' => '2018-02-12',
        ]);
    }
}
