<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;

class ReportController extends Controller
{
    public function month()
    {
        $minYear = 2017;
        $orders = Order::all();

        foreach ($orders as $order) {
            if ($minYear > substr($order->payed_at, 0, 4) && substr($order->payed_at, 0, 4) != '0000') {
                $minYear = substr($order->payed_at, 0, 4);
            }
        }

        $ordersAll = array();

        for ($i = $minYear; $i <= date('Y'); $i++) {
            for ($j = 1; $j <= 12; $j++) {
                if ($j < 10) {
                    $ordersAll += [$i . '-0' . $j => Order::where('payed_at', 'like', $i . '-0' . $j .'%')
                        ->where('email', '!=', 'Vodyanik.artur@gmail.com')
                        ->where('email', '!=', 'olga.silayeva@gmail.com')
                        ->where('email', '!=', 'olga.andreeva082@gmail.com')
                        ->where('email', '!=', 'gorba9@gmail.com')
                        ->where('email', '!=', 'stupakova@iteam.ru')
                        ->where('email', '!=', 'andreeva@iteam.ru')
                        ->where('email', '!=', 'silaeva@iteam.ru')
                        ->get()
                    ];
                } else {
                    $ordersAll += [$i . '-' . $j => Order::where('payed_at', 'like', $i . '-' . $j .'%')
                        ->where('email', '!=', 'Vodyanik.artur@gmail.com')
                        ->where('email', '!=', 'olga.silayeva@gmail.com')
                        ->where('email', '!=', 'olga.andreeva082@gmail.com')
                        ->where('email', '!=', 'gorba9@gmail.com')
                        ->where('email', '!=', 'stupakova@iteam.ru')
                        ->where('email', '!=', 'andreeva@iteam.ru')
                        ->where('email', '!=', 'silaeva@iteam.ru')
                        ->get()
                    ];
                }
            }
        }

//        dd($ordersAll['2017-04']);
//        $sum = 0;
//        foreach ($ordersAll['2017-04'] as $order) {
//            $sum += $order->sum;
//        }
//        dd($sum);
        return view('admin.report.month', ['orders' => array_reverse($ordersAll)]);
    }
}
