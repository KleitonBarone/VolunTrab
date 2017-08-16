<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        DB::table('instituicaos')->insert([
            'name' => 'Kleiton',
            'email' => 'kleitonbarone@gmail.com',
            'password' => Hash::make('123456'),
        ]);
    }
}
