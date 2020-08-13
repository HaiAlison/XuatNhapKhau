<?php

use Illuminate\Database\Seeder;

class createAccountUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        App\User::create([
            'isAdmin' => '0',
        	'firstname' => 	'Hai',
        	'lastname' => 'Mai',
        	'middlename' => 'Thanh',
        	'email' => 'maithanhhai9x@gmail.com',
        	'password' => bcrypt('anhnene1'),

        ]);
    }
}
