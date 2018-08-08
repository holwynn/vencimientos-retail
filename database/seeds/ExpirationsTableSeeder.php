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
        Product::first()->expirations()->create([
            'expiration' => Carbon::now(),
            'qty' => 10
        ]);
    }
}
