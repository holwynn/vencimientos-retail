<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
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
            'level' => 4,
            'password' => bcrypt('admin1234')
        ]);
    }
}
