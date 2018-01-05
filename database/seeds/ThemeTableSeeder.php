<?php

use Illuminate\Database\Seeder;

class ThemeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = ['Cadastre',
            'Climat',
            'Agriculture',
            'Accessibilité',
            'Accidents de la route',
            'Bruit',
            'Cyclisme',
            'Culture',
            'Antennes tél mobile',
            'Géodésie',
            'Géothermie',
            'Hybride',
            'LULC',
            'Images sat & Aériennes',
            'Santé',
            'Services écosystémiques',
            'Energies Renouvelables',
            'npa et localites',
            'Hydrologie',
            'Urbanisme',
            'Logistique & Transport',
            'Parcs et réserves',
            'Tourisme',
            'Marketing',
            'Planification urbain',
            'Forêt',
            'Biologie',
            'Télécoms',
            'Administrative',
            'Topographie',
            'Utilisation des sols',
            'Géologie',
            'Changement Climatique',
            'météorologie',
            'économie',
            'Infrastructure',
            'Maladies des tiques',
            'Autres'
        ];
        for ($i=0; $i < count($names); $i++) {

        $Theme = new App\Theme();
        $Theme->name=$names[$i];
        $Theme->save();

        }    }
}
