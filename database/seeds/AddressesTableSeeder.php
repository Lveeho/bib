<?php

use Illuminate\Database\Seeder;

class AddressesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory('App\Address',20)->create();
        DB::table('addresses')->insert([
            'street'=>'Petunialaan',
            'nr'=>'18',
            'postalcode'=>8430,
            'country'=>'Belgium'
            ]);
    }
}
