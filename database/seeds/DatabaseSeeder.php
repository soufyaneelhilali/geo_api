<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(ThemeTableSeeder::class);
        $this->call(PassPOrtTableSeeder::class);
        $this->call(LayersTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(MapTableSeeder::class);
        $this->call(LayersTableSeeder::class);
        $this->call(RealtimeCategoriesTableSeeder::class);
        $this->call(QuestsTableSeeder::class);
    }
}
