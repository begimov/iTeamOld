<?php namespace App\Http\Controllers\Walletone;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Learn;
use Log;
use App\Models\Order;

class WalletoneController extends Controller
{
    public function proccessIncomingTransaction(Request $request)
    {
        if(!$this->allParametersExist($request)) {
            $this->printResponse("Retry", "Отсутствует обязательный параметр");
        }
        
        if ($this->isSignatureCorrect($request)) {
            if (strtoupper($request->WMI_ORDER_STATE) == 'ACCEPTED') {
                $this->updatePayedOrder($request);
                $this->printResponse('OK', "Заказ #" . $request->WMI_PAYMENT_NO . " оплачен!");
            } else {
                $this->printResponse("Retry", "Неверное состояние ". $request->WMI_ORDER_STATE);
            }
        } else {
            $this->printResponse("Retry", "Неверная подпись " . $request->WMI_SIGNATURE);
        }
    }

    protected function allParametersExist($request)
    {
        return isset($request->WMI_SIGNATURE, $request->WMI_PAYMENT_NO, $request->WMI_ORDER_STATE);
    }

    protected function isSignatureCorrect($request)
    {
        $params = array_filter($request->all(), function ($key) {
            return $key !== "WMI_SIGNATURE";
        }, ARRAY_FILTER_USE_KEY);

        uksort($params, "strcasecmp");

        $values = array_reduce($params, function ($result, $elem) {
            return $result . $elem;
        }, "");

        $signature = base64_encode(pack("H*", md5($values . config('payments.walletone_key'))));
        return $signature == $request->WMI_SIGNATURE;
    }

    protected function updatePayedOrder($request)
    {
        $order = Order::find($request->WMI_PAYMENT_NO);
        $order->status = 1;
        $order->payment_sum = $request->WMI_PAYMENT_AMOUNT;
        $order->payed_at = $request->WMI_CREATE_DATE;
        $order->save();
    }

    protected function printResponse($result, $description = '')
    {
        print "WMI_RESULT=" . strtoupper($result) . "&";
        print "WMI_DESCRIPTION=" . urlencode($description);
        exit();
    }
}
