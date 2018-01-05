<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $names = ['Cadastre',
            'Centrales nucléaires',
            'Accessibilité',
            'Accidents de la route',
            'Antennes tél. mobile',
            'Bruit',
            'Climat & agriculture',
            'Connexion internet',
            'Culture',
            'Forêt',
            'Images sat. & aériennes',
            'Impact du trafic & const.',
            'Maladies des tiques',
            'Parcs et réserves',
            'Réservoirs aquifères',
            'Rollers',
            'agriculture',
            'Casablanca administrative',
            'Topographie',
            'Trafic',
            'Tremblements de terre',
            'VTT',
            'Géologie',
            'Changement climatique',
            'météorologie',
            'économie',
            'Végétation',
            'Infrastructure urbaine',
            'itinéraires touristiques',
            'localisation',
            'réseaux assainissement',
            'voirie',
            'prévention des catastrophe',
            'transports urbain',
            'optimisation d\' itinéraire',
            'Bassin versan',
            'aménagement',
            'cartographie',
            'prospection minière',
            'études des population',
            'Zoologie',
            'Réseau téléphonique',
            'Autres'
        ];
        //
        for ($i=1; $i < 42; $i++) { 

        $category = new \App\Category();
        $category->name=$names[$i];
        $category->save();

        }

    }
}
