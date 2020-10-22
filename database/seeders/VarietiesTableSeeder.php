<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VarietiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('varieties')->insert([
            'name' => '麵包狗',
            'somatotype_id' => '6',
            'source' => '日本',
            'avg_life' => '80'
        ]);
    }
}
