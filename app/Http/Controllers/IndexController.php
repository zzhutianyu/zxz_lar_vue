<?php

namespace App\Http\Controllers;

use App\Model\Visits;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(Request $request) {
        $ip = geoip($request->ip());
        $visit = new Visits;
        $visit->ip = $ip->ip;
        $visit->iso_code = $ip->iso_code;
        $visit->country = $ip->country;
        $visit->city = $ip->city;
        $visit->state = $ip->state;
        $visit->state_name = $ip->state_name;
        $visit->lat = $ip->lat;
        $visit->lon = $ip->lon;
        $visit->timezone = $ip->timezone;
        $visit->continent = $ip->continent;
        $visit->save();
        return view('welcome');
    }
}
