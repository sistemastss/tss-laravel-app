<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    //
    public function index(Request $request) {

        $data = $request->all();

        $mailTo = $data['mailTo'];

        $mailData = $data['mailData'];

        switch ($mailTo) {
            case 'analistaEspToFreelance':

                $view = 'mailAnalistaEspToFreelance';
                $subject = 'Asignacion de actividad';
                Mail::send(new SendMail(
                    $view, $subject, $mailData
                ));
                break;

            case 'analistaEspToCliente':

                $nombreCliente = $mailData['personaDestino'];
                $view = 'mailAnalistasEspToCliente';
                $subject = "Servicio creado por el cliente {$nombreCliente}";

                Mail::send(new SendMail(
                    $view, $subject, $mailData
                ));

                break;

            case 'directorOperacionesToCliente':

                $centroCosto = $mailData['centroCostoId'];
                $view = 'mailDirectorOperacionesToCliente';
                $subject = "Finalización al servicio con centro de costo {$centroCosto}";

                Mail::send(new SendMail(
                    $view, $subject, $mailData
                ));


                break;

            case 'directorOperacionesToFacturacion':

                $centroCosto = $mailData['centroCostoId'];
                $view = 'mailDirectorOperacionesToFacturacion';
                $subject = "Seguimiento al servicio con centro costo {$centroCosto}";

                Mail::send(new SendMail(
                    $view, $subject, $mailData
                ));

                break;

            case 'freelanceToAnalistaEsp':

                $centroCosto = $mailData['centroCostoId'];
                $view = 'mailFreelanceToAnalistaEsp';
                $subject = "Seguimiento al servicio con centro costo {$centroCosto}";

                Mail::send(new SendMail(
                    $view, $subject, $mailData
                ));

                break;

            default:
                return;
        }
    }

    public function sendMail(Request $request) {
        $data = $request->all();


        $mailTo = $data['mailTo'];

        Mail::to($mailTo)->send(new SendMail(
            'mailFreelanceToAnalistaEsp', 'Mesaje de prueba', $data
        ));

    }

    public function seeMail() {
        return view('mailFreelanceToAnalistaEsp');
    }
}