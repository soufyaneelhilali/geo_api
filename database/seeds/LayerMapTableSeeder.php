<?php

use Illuminate\Database\Seeder;

class LayerMapTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $maps = \App\Map::all();
        $layers = \App\Layer::all();

        foreach ($maps as $map) {
            # code...
            foreach ($layers as $layer)
            {
                $map->layers()->save($layer);

            }
        $map->save();
        }

    }
}
