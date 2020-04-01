<?php

use App\Country;
use App\State;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $countries =  factory(Country::class, 20)->create();
        $countries->each(
            function ($country) {
                factory(State::class, 35)->create(['country_id' => $country->id]);
            }
        );
    }
}
