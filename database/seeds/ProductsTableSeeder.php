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
            [
                'name' => 'Arroz Con Leche Light Tregar 180 Gr',
                'upc' => '0779391300050',
                'img' => 'http://walmartar.vteximg.com.br/arquivos/ids/812044/Arroz-Con-Leche-Light-Tregar-180-Gr-1-12070.jpg?v=636391299181730000',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Agua Saborizada Pomelo Levite 600 Cc',
                'upc' => '0779806254013',
                'img' => 'http://walmartar.vteximg.com.br/arquivos/ids/831860/Agua-Saborizada-Manzana-Flip-Villa-Del-Sur-300-Cc-1876.jpg?v=636685713644170000',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Gaseosa Pomelo Zero Schweppes 600 Cc',
                'upc' => '0779089501007',
                'img' => 'http://walmartar.vteximg.com.br/arquivos/ids/828629/Gaseosa-Pomelo-Zero-Schweppes-600-Cc-1-33251.jpg?v=636685089434100000',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Medallones  S/Tacc Goodmark 20u',
                'upc' => '0779067005080',
                'img' => 'http://walmartar.vteximg.com.br/arquivos/ids/807116/Medallones--S-Tacc-Goodmark-20u-1-36471.jpg?v=636331376088770000',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Tapa Pascualina Hojaldre Great Value 400 Gr',
                'upc' => '0779186900093',
                'img' => 'http://walmartar.vteximg.com.br/arquivos/ids/836652/Tapa-Pascualina-Hojaldre-Great-Value-400-Gr-1-26563.jpg?v=636687452233170000',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Salchichas Great Value 6 Un',
                'upc' => '0779827024018',
                'img' => 'http://walmartar.vteximg.com.br/arquivos/ids/821063/Salchichas-Great-Value-6-Un-1-26679.jpg?v=636604389113870000',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Cerveza Clasica Lata Quilmes 354 Cc',
                'upc' => '0779279801101',
                'img' => 'http://walmartar.vteximg.com.br/arquivos/ids/833224/Leche-Entera-Uat-B9-La-Serenisima-1lt-268.jpg?v=636685821202300000',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Gaseosa Sabor Liviano Coca-Cola 600ml',
                'upc' => '0779089500697',
                'img' => 'http://walmartar.vteximg.com.br/arquivos/ids/819825/Gaseosa-Sabor-Liviano-Coca-Cola-600ml-2-1496.jpg?v=636554169276100000',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Cerveza Rubia En Lata Brahma 473 Cc',
                'upc' => '0779279800588',
                'img' => 'http://walmartar.vteximg.com.br/arquivos/ids/833217/Pollo-Fresco-X-3-Kg-187.jpg?v=636685821171270000',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Gaseosa Lima Limón 7up 1,5 Lt',
                'upc' => '0779181342152',
                'img' => 'http://walmartar.vteximg.com.br/arquivos/ids/834293/Gaseosa-Lima-Limon-7up-15-Lt-1-876.jpg?v=636685828523700000',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
