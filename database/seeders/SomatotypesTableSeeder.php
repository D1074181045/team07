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


    public function generateRandomString($length = 10) {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    public function generateRandomName() {
        $first_name = $this->generateRandomString(rand(2, 7));
        $first_name = strtolower($first_name);
        $first_name = ucfirst($first_name);
        $last_name = $this->generateRandomString(rand(2, 8));
        $last_name = strtolower($last_name);
        $last_name = ucfirst($last_name);
        $name = $first_name . " ". $last_name;
        return $name;
    }

    public function run()
    {
        //
        $somatotype = ["超小型", "小型", "中型", "大型", "超大型", "人形", "Vtuber"];

        for ($i = 0; $i < count($somatotype); $i++){
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
