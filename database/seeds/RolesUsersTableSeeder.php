<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class RolesUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker=Faker::create();
        foreach(range(1,20) as $index){
            DB::table('role_user')->insert([
                'user_id'=>$faker->unique()->numberBetween($min=1,$max=20),
                'role_id'=>rand(1,2)
            ]);

        }
        DB::table('role_user')->insert([
            'user_id'=>21,
            'role_id'=>1
        ]);
    }
}
