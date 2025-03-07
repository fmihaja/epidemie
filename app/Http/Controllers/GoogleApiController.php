<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Disease;


class GoogleApiController extends Controller
{
    public function getData(Request $request)
    {
        $url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent?key=votre_api_key";
        $diseases = Disease::all()->map(function ($disease) {
            return [
                'id' => $disease->id,
                'name' => $disease->name,
                'pathogene' => $disease->pathogene,
                'description' => $disease->description,
                'transmissions' => $disease->transmissions,
                'incubation' => $disease->incubation
            ];
        })->toArray();
        $message = $request->input('message', 'Date aujourd\'hui'); 
        $prompt = "Voici une base de données de maladies avec leurs caractéristiques : " . json_encode($diseases) . ".
        Basé sur les symptômes suivants : '$message', analyse et identifie la maladie la plus probable.
        Retourne uniquement un objet JSON avec :
        - `id`: Identifiant de la maladie,
        - `name`: Nom de la maladie,
        - `pathogene`: Agent pathogène responsable,
        - `description`: Symptômes et caractéristiques de la maladie,
        - `transmissions`: Mode de transmission (direct, indirect...),
        - `incubation`: Durée d'incubation en jours.

        Exemple de réponse attendue :
        {
            \"id\": 11,
            \"name\": \"paludisme\",
            \"pathogene\": \"Anopheles femelles\",
            \"description\": \"Il provoque fièvre, frissons, sueurs, anémie et peut être mortel sans traitement rapide.\",
            \"transmissions\": \"indirect\",
            \"incubation\": 14
        }

        Ne retourne rien d'autre que cet objet JSON.";
        $payload = [
            "contents" => [
                [
                    "parts" => [
                        ["text" => $prompt] // Texte à envoyer à l'IA
                    ]
                ]
            ],
            "generationConfig" => [
                "response_mime_type" => "application/json"
            ]
        ];

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->post($url, $payload);

        if ($response->successful()) {
            $data = json_decode($response, true);
            $text = $data['candidates'][0]['content']['parts'][0]['text'];
            return $text;
        } else {
            dd($response->status(), $response->json()); // Debug pour voir l'erreur
        }
    }
}
