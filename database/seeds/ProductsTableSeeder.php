<?php

use App\User;
use App\Product;
use App\Expiration;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

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
            'name' => 'Admin McAdmin',
            'email' => 'admin@walmart.com',
            'password' => bcrypt('admin1234')
        ]);

        $user->products()->create([
            'name' => 'Chocolate Con Leche Cofler 55 Gr',
            'upc' => '0779058010348',
            'img' => 'https://walmartar.vteximg.com.br/arquivos/ids/179870-292-292/0779058010348-1.jpg?v=635841451226700000',
        ]);

        $user->products()->create([
            'name' => 'Manteca La Serenisima 200 Gr',
            'upc' => '0779394005400',
            'img' => 'https://walmartar.vteximg.com.br/arquivos/ids/835917-1000-1000/Manteca-La-Serenisima-200-Gr-29130.jpg?v=636687441096870000',
        ]);

        $user->products()->create([
            'name' => 'Tortillas Queso Doritos 250 Gr',
            'upc' => '0779031000679',
            'img' => 'https://walmartar.vteximg.com.br/arquivos/ids/817264-292-292/Tortillas-Queso-Doritos-250-Gr-1-34618.jpg?v=636482709216370000',
        ]);

        foreach (Product::all() as $product) {
            $product->expirations()->create([
                'qty' => 10,
                'expiration' => Carbon::now()
            ]);
        }
    }
}
