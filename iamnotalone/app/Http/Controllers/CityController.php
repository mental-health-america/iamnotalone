<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;

class CityController extends Controller
{
    /**
     * Recommend name of cities
     * 
     * @param string $name name of city
     * 
     * @return object
     */
    public function suggestCities($name)
    {
        return City::where('city', 'like', '%'.$name.'%')->take(5)->get();
    }

    /**
     * get city id
     * 
     * @param string $city name of city
     * @param string $stateCode state code
     * 
     * @return integer
     */
    public function getCityID($city, $stateCode)
    {
        $city = City::where('city', $city)->where('state_code', $stateCode)->first('id');
        if ($city) {
            return $city->id;
        } else {
            return false;
        }
        
    }
}
