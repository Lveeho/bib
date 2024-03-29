<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    protected $toTruncate=['users','roles','books','addresses','rentals','authors','barcodes','role_user'];

    public function run()
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        foreach($this->toTruncate as $table){
            DB::table($table)->truncate();
        }

        $this->call(UsersTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(BooksTableSeeder::class);
        $this->call(AddressesTableSeeder::class);
        $this->call(RentalsTableSeeder::class);
        $this->call(AuthorsTableSeeder::class);
        $this->call(BarcodesTableSeeder::class);
        $this->call(RolesUsersTableSeeder::class);
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
