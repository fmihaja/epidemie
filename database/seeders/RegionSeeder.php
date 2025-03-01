<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Region;

class RegionSeeder extends Seeder
{
    public function run(): void
    {
        $regionsJson = <<<JSON
        [
            {
                "name": "Diana",
                "population": 889736,
                "lat": -12.3,
                "long": 49.3
            },
            {
                "name": "Sava",
                "population": 1123013,
                "lat": -13.7,
                "long": 50.2
            },
            {
                "name": "Itasy",
                "population": 897962,
                "lat": -18.35,
                "long": 47.75
            },
            {
                "name": "Analamanga",
                "population": 3618128,
                "lat": -18.9167,
                "long": 47.5167
            },
            {
                "name": "Vakinankaratra",
                "population": 2074358,
                "lat": -19.87,
                "long": 47.03
            },
            {
                "name": "Bongolava",
                "population": 674474,
                "lat": -18.31,
                "long": 46.88
            },
            {
                "name": "Sofia",
                "population": 1500227,
                "lat": -14.0,
                "long": 47.15
            },
            {
                "name": "Boeny",
                "population": 931171,
                "lat": -15.7167,
                "long": 46.3167
            },
            {
                "name": "Betsiboka",
                "population": 394561,
                "lat": -16.37,
                "long": 47.28
            },
            {
                "name": "Melaky",
                "population": 309805,
                "lat": -21.2167,
                "long": 44.1333
            },
            {
                "name": "Alaotra-Mangoro",
                "population": 1255514,
                "lat": -17.0333,
                "long": 48.3833
            },
            {
                "name": "Atsinanana",
                "population": 1484403,
                "lat": -18.15,
                "long": 49.4
            },
            {
                "name": "Analanjirofo",
                "population": 1152345,
                "lat": -17.43,
                "long": 50.33
            },
            {
                "name": "Amoron'i Mania",
                "population": 833919,
                "lat": -20.33,
                "long": 47.03
            },
            {
                "name": "Matsiatra Ambony",
                "population": 1447296,
                "lat": -21.45,
                "long": 47.0833
            },
            {
                "name": "Vatovavy",
                "population": 705675,
                "lat": -21.1333,
                "long": 48.0167
            },
            {
                "name": "Atsimo-Atsinanana",
                "population": 1026674,
                "lat": -22.8333,
                "long": 47.6333
            },
            {
                "name": "Ihorombe",
                "population": 418520,
                "lat": -21.45,
                "long": 46.43
            },
            {
                "name": "Menabe",
                "population": 700577,
                "lat": -20.2833,
                "long": 44.2833
            },
            {
                "name": "Atsimo-Andrefana",
                "population": 1799088,
                "lat": -23.35,
                "long": 43.6667
            },
            {
                "name": "Androy",
                "population": 903376,
                "lat": -25.35,
                "long": 46.45
            },
            {
                "name": "Anosy",
                "population": 809313,
                "lat": -22.0167,
                "long": 47.0833
            },
            {
                "name": "Fitovinany",
                "population": 1435882,
                "lat": -22.1333,
                "long": 48.3833
            }
        ]

        JSON;

        $regions = json_decode($regionsJson, true);

        foreach ($regions as $region) {
            Region::create([
                'name' => $region['name'],
                'lat' => $region['lat'],
                'long' => $region['long'],
                'population' => $region['population']
            ]);
        }
    }
}