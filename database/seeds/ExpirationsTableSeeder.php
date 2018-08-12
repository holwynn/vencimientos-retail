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
        $today = Carbon::now();
        $expirationDates = [];

        for ($i=0; $i < 17; $i++) { 
            $expirationDates[] = $today->addDay(rand(1, 31));
        }

        for ($i=0; $i < 10; $i++) { 
            $expirationDates[] = $today->subDay(rand(1, 31));
        }

        for ($i=0; $i < 12; $i++) { 
            $expirationDates[] = $today->addDay(rand(3,7))->addMonth(rand(1, 6));
        }

        $product = Product::first();

        foreach ($expirationDates as $expiration) {
            $product->expirations()->create([
                'expiration' => $expiration,
                'qty' => rand(10, 120),
            ]);
        }
    }
}
