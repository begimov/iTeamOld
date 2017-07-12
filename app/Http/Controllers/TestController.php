<?php

namespace App\Http\Controllers;

use App\Test;
use App\TestAnswer;
use App\TestQuestion;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Articles;
use App\Models\News;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;

class TestController extends Controller
{

    public function index(Request $request, $link = '/')
    {
        if(!$link || $link === '/') {
            $pack = 'iteam.test.index';
            $crumbs = [];
            $page = News::where('wid','=','')
                ->where('path','=','');
            $childrens = News::where('path','LIKE','/')
                ->where('title','NOT LIKE','')
                ->where('public','>',0)
                ->orderBy('created_at', 'desc')
                ->paginate(20);
        }
        else {
            $links = explode('/',$link);
            $wid = array_pop($links);
            $path = implode('/',$links);
            $path = ($path) ? '/' . $path . '/' : '/';
            $crumbs = [['wid'=>'news','path'=>'','title'=>'Новости']];
            $page = News::where('wid','=',$wid)->where('path','=',$path);
            $childrens = [];
            if(!$childrens) {
                $pack = 'iteam.news.show';
                $page = $page->where('public','>',-1);
            } else {
                $pack = 'iteam.news.index';
                $page = $page->where('public','>',0);
            }
        }
        $page = $page->first();
        if($page) {
            $user = Auth::user();
            $tests = Test::all();
            return view($pack, compact('childrens', 'crumbs', 'user', 'tests'));
        }
        else {
            abort(404);
        }
    }

    public function showForm($id)
    {
        $order_test = Order::where('url_test', $id)->first();
        if (count($order_test) == 0) {
            $test = Test::find($id);
            $test_questions = TestQuestion::where('test_id', $id)->get();
//            $order = Order::where('test_id', $id)->where('status', '!=', 1)->first();
            $order = Order::where('test_id', $id)
                ->where('status', '!=', 1)
                ->first();
        } else {
            $test = Test::find($order_test->test_id);
            $test_questions = TestQuestion::where('test_id', $test->id)->get();
            $order = $order_test;
        }

        if (count($order_test) != 0) {
            $corporation = true;
            switch ($test->test_type_id) {
                case 1:
                    return view('iteam.test.single.test1form', [
                        'test' => $test,
                        'order' => $order,
                        'corporation' => $corporation,
                        'test_questions' => $test_questions
                    ]);
                case 2:
                    return view('iteam.test.single.test2', [

                    ]);
                case 3:
                    return view('iteam.test.single.test3', [

                    ]);
            }
        } else {
            $corporation = false;
            $t5 = TestAnswer::where('test_id', $id)->where('rating', '>', 80)->get();
            $t4 = TestAnswer::where('test_id', $id)->where('rating', '>', 60)->where('rating', '<=', 80)->get();
            $t3 = TestAnswer::where('test_id', $id)->where('rating', '>', 40)->where('rating', '<=', 60)->get();
            $t2 = TestAnswer::where('test_id', $id)->where('rating', '<=', 40)->get();
//            dump(count($t5), count($t4), count($t3), count($t2));
            $t = [
                't5' => count($t5),
                't4' => count($t4),
                't3' => count($t3),
                't2' => count($t2),
            ];
            $sumt =count($t5) + count($t4) + count($t3) + count($t2);
//            dd($t['t5']);
            switch ($test->test_type_id) {
                case 1:
                    return view('iteam.test.single.test1form', [
                        'test' => $test,
                        'order' => $order,
                        'corporation' => $corporation,
                        'test_questions' => $test_questions,
                        'result' => $t,
                        'sum' => $sumt
                    ]);
                case 2:
                    return view('iteam.test.single.test2', [

                    ]);
                case 3:
                    return view('iteam.test.single.test3', [

                    ]);
            }
        }
    }

    public function show($id)
    {
//        $order_test = Order::where('url_test', $id)->where('status', '!=', 1)->first();
        $order_test = Order::where('url_test', $id)->first();
        if (count($order_test) == 0) {
            $test = Test::find($id);
            $test_questions = TestQuestion::where('test_id', $id)->get();
//            $order = Order::where('test_id', $id)->where('status', '!=', 1)->first();
            $order = Order::where('test_id', $id)
                            ->where('status', '!=', 1)
                            ->first();
        } else {
            $test = Test::find($order_test->test_id);
            $test_questions = TestQuestion::where('test_id', $test->id)->get();
            $order = $order_test;
        }

        if (count($order_test) != 0) {
            $corporation = true;
            switch ($test->test_type_id) {
                case 1:
                    return view('iteam.test.single.test1', [
                        'test' => $test,
                        'order' => $order,
                        'corporation' => $corporation,
                        'test_questions' => $test_questions
                    ]);
                case 2:
                    return view('iteam.test.single.test2', [

                    ]);
                case 3:
                    return view('iteam.test.single.test3', [

                    ]);
            }
        } else {
            $corporation = false;
            $t5 = TestAnswer::where('test_id', $id)->where('rating', '>', 80)->get();
            $t4 = TestAnswer::where('test_id', $id)->where('rating', '>', 60)->where('rating', '<=', 80)->get();
            $t3 = TestAnswer::where('test_id', $id)->where('rating', '>', 40)->where('rating', '<=', 60)->get();
            $t2 = TestAnswer::where('test_id', $id)->where('rating', '<=', 40)->get();
//            dump(count($t5), count($t4), count($t3), count($t2));
            $t = [
                't5' => count($t5),
                't4' => count($t4),
                't3' => count($t3),
                't2' => count($t2),
            ];
            $sumt =count($t5) + count($t4) + count($t3) + count($t2);
//            dd($t['t5']);
            switch ($test->test_type_id) {
                case 1:
                    return view('iteam.test.single.test1', [
                        'test' => $test,
                        'order' => $order,
                        'corporation' => $corporation,
                        'test_questions' => $test_questions,
                        'result' => $t,
                        'sum' => $sumt
                    ]);
                case 2:
                    return view('iteam.test.single.test2', [

                    ]);
                case 3:
                    return view('iteam.test.single.test3', [

                    ]);
            }
        }
    }

    public function orderTest(Request $request, $id)
    {
        $user = Auth::user();
        $testOrder = Order::where('user_id', $user->id)
            ->where('test_id', $id)
            ->where('status', '!=', '1')
            ->first();
        $ms = Order::where('user_id', $user->id)
                      ->where('test_id', '!=', 0)
                      ->get();
        $max = 10000;
        foreach ($ms as $m) {
//            \Log::info(['$m->parant_id' => $m->parant_id]);
            if ($m->product_id > $max) {
                $max = $m->product_id;
            }
        }
        \Log::info(['MAX' => $max]);
        $count = count($testOrder);
        if ($count == 0) {
            $order = new Order();
            $test = Test::find($id);
            $order->product_id = $max + 1;
            $order->url_test = "test" . str_random(32);
            $order->user_id = $user->id;
            $order->email = $user->email;
            $order->status = -4;
            $order->test_id = $id;
            $order->payment_type = $request->payment_type;
            $order->sum = $test->price;
            $order->save();
            switch ($request->payment_type) {
                case 'ya_ka':
                    $payment_type = 'pay_screen_ya_ka';
                    break;
                case 'sberbank':
                    $payment_type = 'pay_screen_sberbank';
                    break;
                case 'invoicing':
                    $payment_type = 'pay_screen_invoicing';
                    break;
                case 'transfer':
                    $payment_type = 'pay_screen_transfer';
                    break;
                case 'paypal':
                    $payment_type = 'pay_screen_paypal';
                    break;
            }
            return \Response::json(['payment_type' => $payment_type]);
        } else {
            $testOrder->payment_type = $request->payment_type;
            $testOrder->save();
            switch ($request->payment_type) {
                case 'ya_ka':
                    $payment_type = 'pay_screen_ya_ka';
                    break;
                case 'sberbank':
                    $payment_type = 'pay_screen_sberbank';
                    break;
                case 'invoicing':
                    $payment_type = 'pay_screen_invoicing';
                    break;
                case 'transfer':
                    $payment_type = 'pay_screen_transfer';
                    break;
                case 'paypal':
                    $payment_type = 'pay_screen_paypal';
                    break;
            }
            return \Response::json(['payment_type' => $payment_type]);
        }
    }

    public function saveResultCorporationTest(Request $request, $id)
    {
        $t = TestAnswer::where('test_order_id', $request->test_order_id)
                        ->where('user_id', Auth::user()->id)
                        ->get();
        if (count($t) == 0) {
            $testQuestions = TestQuestion::where('test_id', $id)->get();
            $sumWeight = 0;
            foreach ($testQuestions as $testQuestion) {
                $sumWeight += $testQuestion->weight;
            }
            $sum = 0;
            for ($i = 1; $i <= count($request->request); $i++) {
                $sum += $request->request->get($i);
            }
            $result = (100 * $sum) / ($sumWeight * 4);

            $testAnswer = new TestAnswer();
            $testAnswer->test_order_id = $request->test_order_id;
            $testAnswer->user_id = Auth::user()->id;
            $testAnswer->rating = $result;
            $testAnswer->save();
            return \Response::json('<p style="color: green; font-size: 22px; margin-top: 40px"><strong>Ваш результат успешно сохранен!</strong></p>');
        } else {
            return \Response::json('<p style="color: red; font-size: 22px; margin-top: 40px"><strong>Вы уже проходили тест!</strong></p>');
        }
    }

    public function resultTest(Request $request, $id)
    {
        $testQuestions = TestQuestion::where('test_id', $id)->get();
        $sumWeight = 0;
        foreach ($testQuestions as $testQuestion) {
            $sumWeight += $testQuestion->weight;
        }
        $sum = 0;
        for ($i = 1; $i <= count($request->request); $i++) {
            $sum += $request->request->get($i);
        }
        $result = (100 * $sum) / ($sumWeight * 4);

        $rating = "";
        $condition = "";
        $test = Test::find($id);
//        dd(unserialize($test->condition));
        if ($result < 40) {
            $rating = "Неудовлетворительно";
            $condition = unserialize($test->condition)[0];
        } elseif ($result < 60 && $result >= 40) {
            $rating = "Удовлетворительно";
            $condition = unserialize($test->condition)[1];
        } elseif ($result < 80 && $result >= 60) {
            $rating = "Хорошо";
            $condition = unserialize($test->condition)[2];
        } elseif ($result <= 100 && $result >= 80) {
            $rating = "Отлично";
            $condition = unserialize($test->condition)[3];
        }

        $stringResult = "<p> Уровень развития системы управления процессами вашей компании получает оценку <b style='color: #AD0011'>" . $rating . "</b> , что составляет <b style='color: #AD0011'>" . round($result, 0) . "%</b> максимального показателя.</p>";
        $testAnswer = new TestAnswer();
        $testAnswer->rating = round($result, 0);
        $testAnswer->test_id = $id;
        $testAnswer->save();
        return view('iteam.test.single.test1result', [
            'result' => $stringResult . $condition,
            'test' => Test::find($id)
        ]);
    }
}
