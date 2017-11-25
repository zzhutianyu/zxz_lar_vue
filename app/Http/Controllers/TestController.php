<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function Test(){
        $user = new User();
        $user->name = "zhutianyu";
        $user->email = "704735206@qq.com";
        $user->password = bcrypt("sqqsqq520");
        $user->save();
        return dd($user);
    }
}
