<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Disease;

class DiseaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $diseasesJson = <<<JSON
        [
            {
                "name": "Peste bubonique",
                "pathogene": "Yersinia pestis",
                "description": "Fièvre, frissons, maux de tête et gonflement douloureux des ganglions (bubons).",
                "transmissions": "Piqûre de puces infectées, contact avec des rongeurs",
                "incubation": 2
            },
            {
                "name": "Choléra",
                "pathogene": "Vibrio cholerae",
                "description": "Diarrhée aqueuse, vomissements, déshydratation sévère et crampes musculaires.",
                "transmissions": "Ingestion d'eau ou d'aliments contaminés",
                "incubation": 1
            },
            {
                "name": "Paludisme",
                "pathogene": "Plasmodium spp.",
                "description": "Fièvre, frissons, sueurs, maux de tête, nausées et douleurs musculaires.",
                "transmissions": "Piqûre de moustique",
                "incubation": 7
            },
            {
                "name": "Dengue",
                "pathogene": "Dengue virus",
                "description": "Fièvre élevée, douleurs musculaires et articulaires, éruption cutanée et maux de tête.",
                "transmissions": "Piqûre de moustique Aedes",
                "incubation": 4
            },
            {
                "name": "Chikungunya",
                "pathogene": "Chikungunya virus",
                "description": "Fièvre, douleurs articulaires intenses, éruption cutanée et fatigue.",
                "transmissions": "Piqûre de moustique Aedes",
                "incubation": 3
            },
            {
                "name": "Fièvre typhoïde",
                "pathogene": "Salmonella typhi",
                "description": "Fièvre prolongée, maux de tête, douleurs abdominales, constipation ou diarrhée et fatigue.",
                "transmissions": "Ingestion d'eau ou d'aliments contaminés",
                "incubation": 6
            },
            {
                "name": "Leptospirose",
                "pathogene": "Leptospira interrogans",
                "description": "Fièvre, maux de tête, frissons, douleurs musculaires, vomissements et rougeur des yeux.",
                "transmissions": "Contact avec l'eau contaminée ou les fluides d'animaux",
                "incubation": 5
            },
            {
                "name": "Tuberculose",
                "pathogene": "Mycobacterium tuberculosis",
                "description": "Toux persistante, fièvre, sueurs nocturnes, perte de poids et fatigue.",
                "transmissions": "Inhalation de gouttelettes respiratoires",
                "incubation": 30
            },
            {
                "name": "Virus Zika",
                "pathogene": "Zika virus",
                "description": "Fièvre légère, éruption cutanée, conjonctivite, douleurs articulaires et musculaires.",
                "transmissions": "Piqûre de moustique Aedes, transmission sexuelle",
                "incubation": 3
            },
            {
                "name": "Fièvre de la Vallée du Rift",
                "pathogene": "Rift Valley fever virus",
                "description": "Fièvre, maux de tête, douleurs musculaires, vision floue et parfois saignements.",
                "transmissions": "Piqûre de moustique, contact avec animaux infectés",
                "incubation": 4
            },
            {
                "name": "COVID-19",
                "pathogene": "SARS-CoV-2",
                "description": "Fièvre, toux, fatigue, difficultés respiratoires, perte de goût ou d'odorat.",
                "transmissions": "Gouttelettes respiratoires, contact direct, surfaces contaminées",
                "incubation": 5
            }

        ]
        JSON;

        $diseases = json_decode($diseasesJson, true);

        foreach ($diseases as $disease) {
            Disease::create([
                'name'          => $disease['name'],
                'pathogene'     => $disease['pathogene'],
                'description'   => $disease['description'],
                'transmissions' => $disease['transmissions'],
                'incubation'    => $disease['incubation']
            ]);
        }
    }
}
