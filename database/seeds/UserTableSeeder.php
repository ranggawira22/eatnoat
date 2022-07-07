<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Giuseppe Rossi',
            'username' => 'grossi',
            'email' => 'rossi@gmail.com',
            'phone' => '085591452814',
            'password' => bcrypt('rossipass')
        ]);

        User::create([
            'name' => 'Mario Balotelli',
            'username' => 'mb459',
            'email' => 'mb459@gmail.com',
            'phone' => '081225128703',
            'password' => bcrypt('mb459pass')
        ]);
    }
}
