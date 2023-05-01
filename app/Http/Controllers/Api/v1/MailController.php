<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendCode(){
        Mail::send(['text' => 'mail'], ['name', 'Mobile History VN'], function ($message){
            $message->to('angelina.zhilyakova.2002@gmail.com', 'Chto-to')->subject('Test email');
            $message->from('angelina.zhilyakova.2002@gmail.com', 'Choto-to ezho');
        });
    }
}
