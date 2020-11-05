<?php

namespace Database\Seeders;

use Carbon\Carbon;
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

        for ($i = 0; $i < 5; $i++){
            $somatotype = ["小型", "中型", "大型", "超大型", "人形"];
            $random_datetime = Carbon::now(8)->subMinutes(rand(1, 55));

            DB::table('somatotypes')->insert([
                'somatotype' => $somatotype[$i],
                'avg_height' => rand(20, 180),
                'avg_weight' => rand(4, 50),
                'created_at' => $random_datetime,
                'updated_at' => $random_datetime
            ]);
        }

    }
}
