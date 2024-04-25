<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;

class AddressDetailsController extends Controller
{
    public function getCountries() {
        return response()->json(Country::all(), 200);
    }

    public function getState($countryId) {
      if(!($countryId==NULL))
      {
        $states = State::where('country_id', $countryId)->get();

        return response()->json($states);
      }
 return  false;
    }

    public function getCity($stateId) {
        if(!($stateId==NULL)) {
            $cities = City::where('state_id', $stateId)->get();
            return response()->json($cities);
        }
      return  false;

    }
}
