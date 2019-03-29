<?php

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
        //
        factory('App\User',20)->create();
        DB::table('users')->insert([
            'user_firstname'=>'Lore',
            'user_lastname'=>'Vanhooren',
            'email'=>'vanhooren.lore@hotmail.com',
            'address_id'=>1,
            'password'=>bcrypt(123456),
            'remember_token'=>str_random(10)
        ]);
    }
}
