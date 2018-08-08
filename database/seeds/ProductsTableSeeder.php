<?php

use App\Product;
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
        Product::insert([
            [
                'name' => 'Chocolate Con Leche Cofler 55 Gr',
                'upc' => '0779058010348',
                'img' => 'https://walmartar.vteximg.com.br/arquivos/ids/179870-292-292/0779058010348-1.jpg?v=635841451226700000',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Manteca La Serenisima 200 Gr',
                'upc' => '0779394005400',
                'img' => 'https://walmartar.vteximg.com.br/arquivos/ids/835917-1000-1000/Manteca-La-Serenisima-200-Gr-29130.jpg?v=636687441096870000',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Tortillas Queso Doritos 250 Gr',
                'upc' => '0779031000679',
                'img' => 'https://walmartar.vteximg.com.br/arquivos/ids/817264-292-292/Tortillas-Queso-Doritos-250-Gr-1-34618.jpg?v=636482709216370000',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Snack Mega Queso 3d 165 Gr',
                'upc' => '0779031000710',
                'img' => 'http://walmartar.vteximg.com.br/arquivos/ids/805227/Snack-Mega-Queso-3d-165-Gr-snack-Mega-Queso-3d-165-Gr-1-34994.jpg?v=636298435988130000',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Leche Desc Utl Sachet La Serenisima 1 Lt',
                'upc' => '0779394049100',
                'img' => 'http://walmartar.vteximg.com.br/arquivos/ids/836569/Leche-Desc-Utl-Sachet-La-Serenisima-1-Lt-1-23336.jpg?v=636687448875030000',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
