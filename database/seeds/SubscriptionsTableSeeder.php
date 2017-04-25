<?php

use Illuminate\Database\Seeder;


class SubscriptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\Laravel\Cashier\Subscription::class)->times(100)->create();
    }
}
