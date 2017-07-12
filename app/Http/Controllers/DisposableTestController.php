<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class DisposableTestController extends Controller
{
    public function index($name)
    {
        return view('iteam.test.disposable.'.$name);
    }

    public function system(Request $request)
    {
        $count = 0;
        $true_answer = [];
        //1
        if ($request->q1v1 == '' && $request->q1v2 == '' && $request->q1v3 == 'on' && $request->q1v4 == '' && $request->q1v5 == '') {
            $count++;
            $true_answer += ["1" => 1];
        }
        //2
        if ($request->q2v1 == '' && $request->q2v2 == '' && $request->q2v3 == 'on' && $request->q2v4 == '' && $request->q2v5 == '') {
            $count++;
            $true_answer += ["2" => 2];
        }
        //3
        if ($request->q3v1 == 'on' && $request->q3v2 == 'on' && $request->q3v3 == 'on' && $request->q3v4 == 'on' && $request->q3v5 == '') {
            $count++;
            $true_answer += ["3" => 3];
        }
        //4
        if ($request->q4v1 == 'on' && $request->q4v2 == 'on' && $request->q4v3 == 'on' && $request->q4v4 == '' && $request->q4v5 == 'on') {
            $count++;
            $true_answer += ["4" => 4];
        }
        //5
        if ($request->q5v1 == 'on' && $request->q5v2 == 'on' && $request->q5v3 == '' && $request->q5v4 == '' && $request->q5v5 == 'on') {
            $count++;
            $true_answer += ["5" => 5];
        }
        //6
        if ($request->q6v1 == '' && $request->q6v2 == '' && $request->q6v3 == '' && $request->q6v4 == 'on' && $request->q6v5 == '') {
            $count++;
            $true_answer += ["6" => 6];
        }
        //7
        if ($request->q7v1 == '' && $request->q7v2 == '' && $request->q7v3 == '' && $request->q7v4 == 'on' && $request->q7v5 == '') {
            $count++;
            $true_answer += ["7" => 7];
        }
        //8
        if ($request->q8v1 == 'on' && $request->q8v2 == 'on' && $request->q8v3 == 'on' && $request->q8v4 == 'on' && $request->q8v5 == '') {
            $count++;
            $true_answer += ["8" => 8];
        }
        //9
        if ($request->q9v1 == '' && $request->q9v2 == '' && $request->q9v3 == '' && $request->q9v4 == 'on' && $request->q9v5 == 'on') {
            $count++;
            $true_answer += ["9" => 9];
        }
        //10
        if ($request->q10v1 == 'on' && $request->q10v2 == 'on' && $request->q10v3 == 'on' && $request->q10v4 == 'on' && $request->q10v5 == '') {
            $count++;
            $true_answer += ["10" => 10];
        }

        if($count >= 8) {
            return \Response::json(['text' => '<p>Ваш результат ' . $count . ' балов.</p>
                    <p>Поздравляем, Вы успешно выполнили задания!</p>
                    <p>Сертификат участника мастер-класса будет направлен Вам электронной почтой после заполнения формы, а также автоматически загрузиться на ваш компьютер</p>',
                'true_answer' => $true_answer]);
        } else {
            return \Response::json(['text' => '<p>Ваш результат ' . $count . ' балов.</p>
                    <p>К сожалению этого недостаточно для получения сертификата.</p>
                    <p>Хотите пройти тесть повторно? <a href="https://iteam.ru/master-test/view/system">ПРОЙТИ ТЕСТ ПОВТОРНО</a></p>',
                                    'true_answer' => $true_answer]);
        }
    }

    public function engine(Request $request)
    {
        $count = 0;
        $true_answer = [];
        //1
        if ($request->q1v1 == 'on' && $request->q1v2 == 'on' && $request->q1v3 == 'on' && $request->q1v4 == 'on' && $request->q1v5 == 'on') {
            $count++;
            $true_answer += ["1" => 1];
        }
        //2
        if ($request->q2v1 == 'on' && $request->q2v2 == 'on' && $request->q2v3 == 'on' && $request->q2v4 == 'on' && $request->q2v5 == 'on') {
            $count++;
            $true_answer += ["2" => 2];
        }
        //3
        if ($request->q3v1 == 'on' && $request->q3v2 == 'on' && $request->q3v3 == 'on' && $request->q3v4 == 'on' && $request->q3v5 == '') {
            $count++;
            $true_answer += ["3" => 3];
        }
        //4
        if ($request->q4v1 == 'on' && $request->q4v2 == 'on' && $request->q4v3 == 'on' && $request->q4v4 == 'on' && $request->q4v5 == 'on') {
            $count++;
            $true_answer += ["4" => 4];
        }
        //5
        if ($request->q5v1 == 'on' && $request->q5v2 == 'on' && $request->q5v3 == 'on' && $request->q5v4 == 'on' && $request->q5v5 == 'on') {
            $count++;
            $true_answer += ["5" => 5];
        }
        //6
        if ($request->q6v1 == 'on' && $request->q6v2 == 'on' && $request->q6v3 == 'on' && $request->q6v4 == 'on' && $request->q6v5 == '') {
            $count++;
            $true_answer += ["6" => 6];
        }
        //7
        if ($request->q7v1 == 'on' && $request->q7v2 == 'on' && $request->q7v3 == 'on' && $request->q7v4 == 'on' && $request->q7v5 == '') {
            $count++;
            $true_answer += ["7" => 7];
        }
        //8
        if ($request->q8v1 == 'on' && $request->q8v2 == 'on' && $request->q8v3 == 'on' && $request->q8v4 == 'on' && $request->q8v5 == '') {
            $count++;
            $true_answer += ["8" => 8];
        }
        //9
        if ($request->q9v1 == 'on' && $request->q9v2 == 'on' && $request->q9v3 == 'on' && $request->q9v4 == 'on' && $request->q9v5 == '') {
            $count++;
            $true_answer += ["9" => 9];
        }
        //10
        if ($request->q10v1 == '' && $request->q10v2 == '' && $request->q10v3 == 'on' && $request->q10v4 == '' && $request->q10v5 == '') {
            $count++;
            $true_answer += ["10" => 10];
        }

        if($count >= 8) {
            return \Response::json(['text' => '<p>Ваш результат ' . $count . ' балов.</p>
                    <p>Поздравляем, Вы успешно выполнили задания!</p>
                    <p>Сертификат участника мастер-класса будет направлен Вам электронной почтой после заполнения формы, а также автоматически загрузиться на ваш компьютер</p>
                    <a href="https://iteam.ru/learn/webinar/inzhenernyj-podhod-k-sozdaniju-sistemy-upravlenija-protsessa" class="btn" style="font-size: 20px">
                        Вернутся к материалам мастер-класса
                    </a>',
                                    'true_answer' => $true_answer]);
        } else {
            return \Response::json(['text' => '<p>Ваш результат ' . $count . ' балов.</p>
                    <p>К сожалению этого недостаточно для получения сертификата.</p>
                    <p>Хотите пройти тесть повторно? <a href="https://iteam.ru/master-test/view/engine">ПРОЙТИ ТЕСТ ПОВТОРНО</a></p>
                    <a href="https://iteam.ru/learn/webinar/inzhenernyj-podhod-k-sozdaniju-sistemy-upravlenija-protsessa" class="btn" style="font-size: 20px">
                        Вернутся к материалам мастер-класса
                    </a>',
                                    'true_answer' => $true_answer]);
        }
    }

    public function getCertificate(Request $request, $name)
    {
        $user = \Auth::user()->getAttributes();
//        dd($user["email"]);
        $email = $user["email"];
        $fio = $request->name;
        $pdf = \PDF::loadView('pdf.certificate-' . $name, ["name" => $request->name, "date" => date("d.m.y")]);
        \Mail::send('emails.certificate', ['name' => $request->name], function($m) use ($pdf, $email, $fio) {
            $m->to($email, $fio)->subject("Сертификат Iteam");
            $m->attachData($pdf->download("certificate.pdf"), 'certificate.pdf');
        });
        $pdf = \PDF::loadView('pdf.certificate-' . $name, ["name" => $request->name, "date" => date("d.m.y")]);
        return $pdf->download('certificate.pdf');
    }

}
