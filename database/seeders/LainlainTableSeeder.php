<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LainlainTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lainlains')->insert([
            'name'=>'Mukena',
            'harga'=>'2500'
        ]);
        DB::table('lainlains')->insert([
            'name'=>'Kostum Karnaval',
            'harga'=>'4000'
        ]);
        DB::table('lainlains')->insert([
            'name'=>'Sprei',
            'harga'=>'7000'
        ]);
        DB::table('lainlains')->insert([
            'name'=>'Sarung',
            'harga'=>'2500'
        ]);
        DB::table('lainlains')->insert([
            'name'=>'Gamis',
            'harga'=>'3000'
        ]);
    }
}
