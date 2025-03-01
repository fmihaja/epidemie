<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Region;

class RegionSeeder extends Seeder
{
    public function run(): void
    {
        $regionsJson = '[
            {
              "name": "Diana",
              "population": 889736,
              "latitude": -12.3,
              "longitude": 49.3
            },
            {
              "name": "Sava",
              "population": 1123013,
              "latitude": -13.7,
              "longitude": 50.2
            },
            {
              "name": "Itasy",
              "population": 897962,
              "latitude": -18.35,
              "longitude": 47.75
            },
            {
              "name": "Analamanga",
              "population": 3618128,
              "latitude": -18.9167,
              "longitude": 47.5167
            },
            {
              "name": "Vakinankaratra",
              "population": 2074358,
              "latitude": -19.87,
              "longitude": 47.03
            },
            {
              "name": "Bongolava",
              "population": 674474,
              "latitude": -18.31,
              "longitude": 46.88
            },
            {
              "name": "Sofia",
              "population": 1500227,
              "latitude": -14.0,
              "longitude": 47.15
            },
            {
              "name": "Boeny",
              "population": 931171,
              "latitude": -15.7167,
              "longitude": 46.3167
            },
            {
              "name": "Betsiboka",
              "population": 394561,
              "latitude": -16.37,
              "longitude": 47.28
            },
            {
              "name": "Melaky",
              "population": 309805,
              "latitude": -21.2167,
              "longitude": 44.1333
            },
            {
              "name": "Alaotra-Mangoro",
              "population": 1255514,
              "latitude": -17.0333,
              "longitude": 48.3833
            },
            {
              "name": "Atsinanana",
              "population": 1484403,
              "latitude": -18.15,
              "longitude": 49.4
            },
            {
              "name": "Analanjirofo",
              "population": 1152345,
              "latitude": -17.43,
              "longitude": 50.33
            },
            {
              "name": "Amoron\'i Mania",
              "population": 833919,
              "latitude": -20.33,
              "longitude": 47.03
            },
            {
              "name": "Matsiatra Ambony",
              "population": 1447296,
              "latitude": -21.45,
              "longitude": 47.0833
            },
            {
              "name": "Vatovavy",
              "population": 705675,
              "latitude": -21.1333,
              "longitude": 48.0167
            },
            {
              "name": "Atsimo-Atsinanana",
              "population": 1026674,
              "latitude": -22.8333,
              "longitude": 47.6333
            },
            {
              "name": "Ihorombe",
              "population": 418520,
              "latitude": -21.45,
              "longitude": 46.43
            },
            {
              "name": "Menabe",
              "population": 700577,
              "latitude": -20.2833,
              "longitude": 44.2833
            },
            {
              "name": "Atsimo-Andrefana",
              "population": 1799088,
              "latitude": -23.35,
              "longitude": 43.6667
            },
            {
              "name": "Androy",
              "population": 903376,
              "latitude": -25.35,
              "longitude": 46.45
            },
            {
              "name": "Anosy",
              "population": 809313,
              "latitude": -22.0167,
              "longitude": 47.0833
            },
            {
              "name": "Fitovinany",
              "population": 1435882,
              "latitude": -22.1333,
              "longitude": 48.3833
            }
          ]'; // Collez votre JSON ici

        $regions = json_decode($regionsJson, true);

        foreach ($regions as $region) {
            Region::create([
                'name' => $region['name'],
                'lat' => $region['latitude'],   // Correspond à "latitude" dans le JSON
                'long' => $region['longitude'], // Correspond à "longitude" dans le JSON
                'population' => $region['population']
            ]);
        }
    }
}