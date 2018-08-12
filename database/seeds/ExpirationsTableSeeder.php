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
        $expirationDates = [];

        for ($i=0; $i < 17; $i++) { 
            $expirationDates[] = Carbon::now()->addDay(rand(1, 31));
        }

        for ($i=0; $i < 10; $i++) { 
            $expirationDates[] = Carbon::now()->subDay(rand(1, 31));
        }

        for ($i=0; $i < 12; $i++) { 
            $expirationDates[] = Carbon::now()->addDay(rand(3,7))->addMonth(rand(1, 6));
        }

        $productsCount = Product::count();

        foreach ($expirationDates as $expiration) {
            Product::find(rand(1, $productsCount))
                ->expirations()
                ->create([
                    'expiration' => $expiration,
                    'qty' => rand(10, 120),
                ]);
        }
    }
}
