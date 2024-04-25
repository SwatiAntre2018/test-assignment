<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Country;
use App\Models\State;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $country = Country::where('name', 'CountryName1')->first();
        $state = State::where('country_id', $country->id)->first();
        $city = City::where('state_id', $state->id)->first();

        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'email' => 'admin1@gmail.com',
                'password' => md5('admin1234'),
                'date_of_birth' => '1990-05-16',
                'gender' => 'male',
                'state_id' => $state->id,
                'country_id' => $country->id,
                'city_id' => $city->id,
            ],
        ]);

    }
}
