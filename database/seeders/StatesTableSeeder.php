<?php

namespace Database\Seeders;

use App\Models\Country;
use App\Models\State;
use Illuminate\Database\Seeder;

class StatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Get an instance of country
        $country = Country::where('name', 'CountryName1')->first();

        State::create([
            'name' => 'StateName1',
            'country_id' => $country->id,
        ]);
    }
}
