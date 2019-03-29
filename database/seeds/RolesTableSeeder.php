<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('roles')->insert(['name'=>'admin']);
        DB::table('roles')->insert(['name'=>'ontlener']);

    }
}
