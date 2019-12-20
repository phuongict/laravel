<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $user = App\User::create([
            'name' => 'Phạm Phương',
            'email' => 'phamphuongict@gmail.com',
            'password' => Hash::make('phuongdaik@'),
            'blocked' => 0,
           'created_at' => date('Y-m-d H:i:s'),
           'updated_at' => date('Y-m-d H:i:s')
        ]);
       $user->roles()->attach(1);
    }
}
