<?php

use Illuminate\Database\Seeder;

class MapTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      for ($i=1; $i < 60; $i++) { 
        $map = new App\Map();
        $map->name='provinces_casa_stat'.$i;
        $map->user_id=1;
        $map->theme_id=1;
        $map->description='description'.$i;
        $map->img_src='img source'.$i;
        $map->attributs='{}';
        if ($i%2 == 0) {
            $map->approve = 'TRUE';
            $map->share = 'TRUE';
        }else{
            $map->approve = 'FALSE';
            $map->share = 'FALSE'    ;
        }
        $map->save();
      }
    }
}
