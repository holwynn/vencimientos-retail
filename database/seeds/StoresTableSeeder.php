<?php

use App\Store;
use Illuminate\Database\Seeder;

class StoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Store::create([
            'name' => 'Walmart',
            'website' => 'https://walmart.com.ar',
            'email' => 'admin@walmart.com',
            'phone' => '+54 4821-9293',
            'address' => 'Av. Leopoldo Garcia 221'
        ]);
    }
}
