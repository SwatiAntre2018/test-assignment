<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\State;
use Illuminate\Database\Seeder;
class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Get an instance of state
        $state = State::where('name', 'StateName1')->first();

        City::create([
            'name' => 'CityName1',
            'state_id' => $state->id,
        ]);
    }
}
