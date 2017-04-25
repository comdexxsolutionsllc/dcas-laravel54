<?php

use Illuminate\Database\Seeder;


class ClicksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Click::class)->times(100)->create();
    }
}
