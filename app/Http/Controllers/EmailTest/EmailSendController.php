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
use Validator;


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

    public function sendComm(Request $request)
    {

        $messages = array(
            'required' => 'Для отправки комментария, нужно обязательно вставить свое фото',
            'image' => 'Загруженный файл должен быть изображением в формате jpeg, png, bmp, gif или svg.',
        );

        $validator = Validator::make($request->all(), [
            'image' => 'required|image',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator);
        }


        $mail['commend'] = $request['commend'];
        $mail['userName'] = $request['userName'];
        $mail['organization'] = $request['organization'];
        $mail['position'] = $request['position'];
        $mail['date'] = date("d-M-Y   H:i:s");
        $image_name = '';


        if (isset($request['image'])) {
            $image_name = $request->image->getClientOriginalName();
            $destinationPath = 'filemanager/userfiles/user0/upload/imageForCommend';

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $file->move($destinationPath, $image_name);
            }
            $destinationPath .= '/' . $image_name;

            Mail::send('emails.auth.formCommend', $mail, function ($m) use ($destinationPath) {
                $m->from('fff@gggg', 'Your Application');
                $m->attach($destinationPath);
                $m->to('info@iteam.ru', 'iteam')->subject('КОММЕНТАРИЙ ПОЛЬЗОВАТЕЛЯ');

            });
            return redirect('SendComment/materiali');
        } else {
            Mail::send('emails.auth.formCommend', $mail, function ($m) {
                $m->from('fff@gggg', 'Your Application');
                $m->to('info@iteam.ru', 'iteam')->subject('КОММЕНТАРИЙ ПОЛЬЗОВАТЕЛЯ');
            });
            return redirect('SendComment/materiali');
        }
    }
    
    public function requestCall(Request $request)
    {

        $mail['name'] = $request['name'];
        $mail['email'] = $request['email'];
        $mail['phone'] = $request['phone'];

        Mail::send('emails.auth.formCall', $mail, function ($m) {
            $m->from('fff@gggg', 'Your Application');
            $m->to('info@iteam.ru', 'iteam')->subject('НГ2018 Запрос на звонок');
        });
        return redirect('promo/2018/#contact');

    }
}