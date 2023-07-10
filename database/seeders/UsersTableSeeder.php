<?php

namespace Database\Seeders;

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
        \App\Models\User::insert([
            [
              'id'  			=> 1,
              'name'  			=> 'Naila - Admin',
              'username'		=> 'naila_admin',
              'email' 			=> 'naila_admin@gmail.com',
              'password'		=> bcrypt('naila123'),
              'gambar'			=> NULL,
              'level'			=> 'admin',
              'remember_token'	=> NULL,
              'created_at'      => \Carbon\Carbon::now(),
              'updated_at'      => \Carbon\Carbon::now()
            ],
            [
                'id'  			=> 2,
                'name'  		=> 'Nelsy Nelly',
                'username'		=> 'nelsy_nelly',
                'email' 		=> 'nelsy_admin@gmail.com',
                'password'		=> bcrypt('nelsy123'),
                'gambar'		=> NULL,
                'level'			=> 'admin',
                'remember_token'=> NULL,
                'created_at'    => \Carbon\Carbon::now(),
                'updated_at'    => \Carbon\Carbon::now()
            ],
            [
              'id'  			=> 3,
              'name'  		=> 'Bella',
              'username'		=> 'Bella',
              'email' 		=> 'bella_admin@gmail.com',
              'password'		=> bcrypt('bella123'),
              'gambar'		=> NULL,
              'level'			=> 'admin',
              'remember_token'=> NULL,
              'created_at'    => \Carbon\Carbon::now(),
              'updated_at'    => \Carbon\Carbon::now()
            ]
        ]);
    }
}