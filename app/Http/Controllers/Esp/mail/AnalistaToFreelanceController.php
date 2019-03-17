<?php

namespace App\Http\Controllers\Esp\mail;

use \Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\SendMail;

class AnalistaToFreelanceController extends Controller
{
    //
    const message = [
      'sa' => 'algo'
    ];

    public function sendEmail(Request $request) {
        $view = 'mailAnalistaEspToFreelance';
        $subject = 'Asignacion de actividad';
        $mailData = '';
        Mail::send(new SendMail(
            $view, $subject, $mailData
        ));

        self::message['sa'];
    }
}
