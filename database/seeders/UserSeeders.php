<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'id' => '1',
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('11'),
            'alamat' => 'Winongan',
            'role' => 'admin',
            'phone' => '085055',
        ]);

        DB::table('users')->insert([
            'id' => '2',
            'name' => 'user1',
            'email' => 'user1@gmail.com',
            'password' => Hash::make('11'),
            'alamat' => 'Bangil',
            'role' => 'user',
            'phone' => '111111',
        ]);

        DB::table('users')->insert([
            'id' => '3',
            'name' => 'user2',
            'email' => 'user2@gmail.com',
            'password' => Hash::make('11'),
            'alamat' => 'Pasuruan',
            'role' => 'user',
            'phone' => '222222',
        ]);

        DB::table('pakets')->insert([
            'namapaket' => 'kilo',
            'harga' => '10000',
        ]);


        DB::table('pakets')->insert([
            'namapaket' => 'celana pendek',
            'harga' => '2000',
        ]);

        DB::table('pakets')->insert([
            'namapaket' => 'jaket',
            'harga' => '3500',
        ]);
        
        DB::table('pakets')->insert([
            'namapaket'=>'Kemeja',
            'harga'=>'2000'
        ]);
        DB::table('pakets')->insert([
            'namapaket'=>'Kaos',
            'harga'=>'1000'
        ]);
        DB::table('pakets')->insert([
            'namapaket'=>'Daleman',
            'harga'=>'4000'
        ]);
        DB::table('pakets')->insert([
            'namapaket'=>'Celana Panjang',
            'harga'=>'5000'
        ]);
        DB::table('pakets')->insert([
            'namapaket'=>'Celana Pendek',
            'harga'=>'3000'
        ]);
        
        DB::table('pakets')->insert([
            'namapaket'=>'Sprei',
            'harga'=>'7000'
        ]);
        DB::table('pakets')->insert([
            'namapaket'=>'Sarung',
            'harga'=>'2500'
        ]);
        DB::table('pakets')->insert([
            'namapaket'=>'Gamis',
            'harga'=>'3000'
        ]);

    }
}
