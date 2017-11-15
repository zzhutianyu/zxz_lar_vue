<?php

namespace App\Http\Controllers;

use App\Model\BlogRoll;
use Illuminate\Http\Request;

class RollController extends Controller
{
    public function create(Request $request) {
        $roll = new BlogRoll;
        $roll->name = $request->input('name');
        $roll->url = $request->input('url');
        $roll->save();
        return RJM('', '200', 'success');
    }

    public function rolls() {
        $roll = BlogRoll::take(5)->get();
        return $roll;
    }
}
