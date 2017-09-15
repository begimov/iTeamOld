<?php

namespace App\Http\Controllers\emailTest;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
//use DB;
use PDF;
use Mail;
use Illuminate\Http\Response;

class EmailSendController extends Controller
{
    public function sendMail(Request $request)
    {

        $mail['title'] = "Форма-опрос от пользователя - " . $request['email'];
        $mail['phone'] = $request['phone'];
        $mail['date'] = date("d-M-Y   H:i:s");
        $mail['request'] = $request['q'];


        Mail::send('emails.auth.formTest', $mail, function ($m) {

            $m->from('fff@gggg', 'Your Application');

            $m->to('taktreba2017@gmail.com', 'LEO')->subject('ФОРМА-ОПРОС ПОЛЬЗОВАТЕЛЯ');
            $m->to('info@iteam.ru', 'LEO')->subject('ФОРМА-ОПРОС ПОЛЬЗОВАТЕЛЯ');
            $m->to('kornilin@iteam.ru', 'LEO')->subject('ФОРМА-ОПРОС ПОЛЬЗОВАТЕЛЯ');
        });
        return redirect('');
    }
}