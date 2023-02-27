<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cities')->delete();

        $cities = [
            ["name" => "Girne"],
            ["name" => "Lefkoşa"],
            ["name" => "Gazimağusa"],
            ["name" => "Güzelyurt"],
            ["name" => "İskele"],
            ["name" => "Lefke"]
        ];

        City::insert($cities);
    }
}
