<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BawahanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bawahan')->insert([
            'name'=>'Cln Jeans Panjang',
            'harga'=>'5000'
        ]);
        DB::table('bawahan')->insert([
            'name'=>'Cln Jeans Pendek',
            'harga'=>'3000'
        ]);
        DB::table('bawahan')->insert([
            'name'=>'Cln Kain Panjang',
            'harga'=>'3000'
        ]);
        DB::table('bawahan')->insert([
            'name'=>'Cln Kain Pendek',
            'harga'=>'2000'
        ]);
        DB::table('bawahan')->insert([
            'name'=>'Cln Training Panjang',
            'harga'=>'2500'
        ]);
        DB::table('bawahan')->insert([
            'name'=>'Cln Training Pendek',
            'harga'=>'2000'
        ]);
        DB::table('bawahan')->insert([
            'name'=>'Sempak',
            'harga'=>'7000'
        ]);
        
    }
}
