<?php

use Illuminate\Database\Seeder;

class QuestsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('quests')->delete();
        
        \DB::table('quests')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'En quete oualidida',
                'agents' => '[{"id":1,"name":"MSAHAL","LASTNAME":"YASSER"}]',
                'created_at' => '2017-07-07 12:00:00',
                'updated_at' => '2017-07-07 12:00:00',
            ),
            1 => 
            array (
                'id' => 4,
                'title' => 'En quete El Jdida',
                'agents' => '[{"id":1,"name":"MSAHAL","LASTNAME":"YASSER"}]',
                'created_at' => '2017-07-07 12:00:00',
                'updated_at' => '2017-07-07 12:00:00',
            ),
        ));
        
        
    }
}