<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SomatotypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('somatotypes')->insert([
            'somatotype' => '人型',
            'avg_height' => '156',
            'avg_weight' => '45'
        ]);
    }
}
