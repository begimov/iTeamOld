<?php namespace App\Http\Controllers\Walletone;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Learn;
use Log;
use App\Models\Order;
use App\Services\APIs\GetResponseAPI3;

class WalletoneController extends Controller
{
    protected $gr;

    public function __construct(GetResponseAPI3 $gr)
    {
		$this->gr = $gr;
    }
    
    public function proccessIncomingTransaction(Request $request)
    {
        if(!$this->allParametersExist($request)) {
            $this->printResponse("Retry", "Отсутствует обязательный параметр");
        }
        
        if (explode('=', $request->WMI_PAYMENT_NO)[0] = 'NA') {
            $this->proccessNonAuthPayment($request);
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
    
    protected function proccessNonAuthPayment($request)
    {
        if ($this->isSignatureCorrect($request)) {
            if (strtoupper($request->WMI_ORDER_STATE) == 'ACCEPTED') {
                $this->updateNonAuthOrderState($request);
                Log::info('proccessNonAuthPayment: '.'OK');
                $this->printResponse('OK', "Заказ #" . $request->WMI_PAYMENT_NO . " оплачен!");
            } else {
                Log::info('proccessNonAuthPayment: '.'INVALID STATE');
                $this->printResponse("Retry", "Неверное состояние ". $request->WMI_ORDER_STATE);
            }
        } else {
            Log::info('proccessNonAuthPayment: '.'INVALID SIGNATURE');
            $this->printResponse("Retry", "Неверная подпись " . $request->WMI_SIGNATURE);
        }
    }
    
    protected function updateNonAuthOrderState($request) {
        $params = explode('=', $request->WMI_PAYMENT_NO);
		$tempResult = (array) $this->gr->getContacts(array(
        	'query' => array(
        		'email' => $params[1],
        		'campaignId' => $params[2]
        	),
        	'additionalFlags' => 'exactMatch'
        ));
        $contactId = $tempResult[0]->contactId;
        $this->gr->updateContact($contactId . '/custom-fields', array(
        	'customFieldValues' => array(
        		array(
			        'customFieldId' => '5psIM',
			        'value' => array('paid'),
			    )
        	)
        ));
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
