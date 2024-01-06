<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    //
    public function send_basic_mail()
    {
        $data = array('name' => 'wanaboy');

        mail::send(['text' => 'mail'], $data, function ($message) {

            $message->to('wahnah432@gmail.com', 'wanaboy')->subject('test mail message');
            $message->from('wanamuz05@gmail.com', 'wana chilila');

        });

        echo "email is sent";
        
    }
}
