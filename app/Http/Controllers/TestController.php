<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function Test(){
        $data = array(
            'a' => '1',
            'b' => '2'
        );
        return RJM($data, 200);
    }
}
