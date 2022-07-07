<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Admin;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'name' => 'admin01',
            'username' => 'admin01',
            'email' => 'admin01@gmail.com',
            'password' => bcrypt('admin01pass')
        ]);
    }
}
