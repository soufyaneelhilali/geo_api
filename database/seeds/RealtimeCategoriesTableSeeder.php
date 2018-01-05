<?php

use Illuminate\Database\Seeder;

class RealtimeCategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('realtime_categories')->delete();
        
        \DB::table('realtime_categories')->insert(array (
            0 => 
            array (
                'id' => 3,
                'name' => 'Bus',
                'description' => 'Tracking des bus de la ville de casablanca',
                'icon' => 'realtime/bus.png',
                'image' => 'realtime/images/bus.png',
                'created_at' => '2017-06-13 01:09:37',
                'updated_at' => '2017-06-13 01:09:59',
            ),
        ));
        
        
    }
}