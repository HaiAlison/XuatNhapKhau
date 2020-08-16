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
        	'password' => Hash::make('anhnene1'),
        ]);
        App\User::create([
            'isAdmin' => '1',
            'firstname' =>  'Hai Admin',
            'lastname' => 'Mai',
            'middlename' => 'Thanh',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('anhnene2'),
        ]);
    }
}
