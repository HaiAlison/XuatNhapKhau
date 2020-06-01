<?php

use Illuminate\Database\Seeder;

class createAdminAccount extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        App\Admin::create([
        	'firstname' => 	'Hai',
        	'lastname' => 'Mai',
        	'middlename' => 'Thanh',
        	'email' => 'admin@gmail.com',
        	'password' => Hash::make('anhnene1')

        ]);
    }
}
