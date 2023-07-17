<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AtasanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('atasans')->insert([
            'name'=>'Jaket Jeans',
            'harga'=>'5000'
        ]);

        DB::table('atasans')->insert([
            'name'=>'Jaket/Sweeter Flanel',
            'harga'=>'4500'
        ]);
        DB::table('atasans')->insert([
            'name'=>'Jaket Almamater',
            'harga'=>'4000'
        ]);
        DB::table('atasans')->insert([
            'name'=>'Kemeja',
            'harga'=>'2000'
        ]);
        DB::table('atasans')->insert([
            'name'=>'Kaos',
            'harga'=>'1000'
        ]);
        DB::table('atasans')->insert([
            'name'=>'Daleman',
            'harga'=>'4000'
        ]);
    }
}
