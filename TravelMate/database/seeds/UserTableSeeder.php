<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = array(
		['user_name' => 'Nina Goedde'],
		['user_name' => 'Manuela Reker']);
		DB::table('user')->insert($users);
		
    }
}
