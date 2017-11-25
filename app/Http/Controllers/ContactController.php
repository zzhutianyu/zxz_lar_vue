<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request) {
        $data = $request->only('name', 'phone', 'email');
        $data['messageLines'] = explode("\n", $request->input('message'));

//        $data['name'] = 'test';
//        $data['phone'] = 'phone';
//        $data['email'] = 'email';
//        $data['messageLines'] = explode("\n", "as;lg\nasd;fl\n");
        Mail::to('704735206@qq.com')->send(new Contact($data));
    }
}
