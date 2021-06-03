<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\State;

class StateController extends Controller
{
    /**
     * Recommend name of states
     * 
     * @param string $name name of state
     * 
     * @return object
     */
    public function suggestStates($name)
    {
        return State::where('state', 'like', '%'.$name.'%')->take(5)->get();
    }

    /**
     * Get state code
     * 
     * @param string $state name of state
     * 
     * @return string
     */
    public function getStateCode(String $state)
    {
        return State::where('state', $state)->first('state_code')->state_code;
    }
}
