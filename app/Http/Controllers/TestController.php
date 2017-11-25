<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function Test(){
        $ip = geoip("183.246.21.245");
        return dd($ip);
    }
}
