<?php

use Illuminate\Database\Seeder;


class ThreadsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\Cmgmyr\Messenger\Models\Thread::class)->times(100)->create();
    }
}
