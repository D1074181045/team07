<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VarietiesTableSeeder extends Seeder
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

    public function generateRandomSource() {
        $positions = ['台灣', '日本', '美國', '英國', '加拿大', '菲律賓','中國'];
        return $positions[rand(0, count($positions)-1)];

    }


    public function run()
    {
        //

        for ($i=0; $i<30; $i++) {
            $name = $this->generateRandomName();
            $source = $this->generateRandomSource();

            $random_datetime = Carbon::now(8)->subMinutes(rand(1, 55));;
            DB::table('varieties')->insert([
                'name' => $name,
                'somatotype_id' => rand(1, 7),
                'source' => $source,
                'avg_life' => rand(1, 80),
                'created_at' => $random_datetime,
                'updated_at' => $random_datetime
            ]);
        }

    }
}
