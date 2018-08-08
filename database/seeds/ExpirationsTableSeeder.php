<?php

use App\Product;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ExpirationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (Product::all() as $product) {
            $product->expirations()->create([
                'qty' => 10,
                'expiration' => Carbon::now()
            ]);
        }
    }
}
