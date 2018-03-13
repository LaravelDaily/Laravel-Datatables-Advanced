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
        factory(App\Customer::class, 200)->create()
            ->each(function ($customer) {
                for($i = 0; $i < 15; $i++) {
                    factory(App\Purchase::class)->create(['customer_id' => $customer->id]);
                }
            });
    }
}
