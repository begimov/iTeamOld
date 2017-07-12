<?php namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

use App\Http\Requests\OrderRequest;

use App\Models\Learn;
use App\Models\Order;
use App\Models\User;

use PDF;
use Mail;
use DB;

class O2 extends Controller
{
    #protected $user;
    #protected $order_m;
    protected $fakeInvId;

    public function __construct(Order $order_m) {
        #$this->user = Auth::user();
        #$this->order_m = $order_m;
		//$this->middleware('auth');
		$this->fakeInvId = time();
    }
    public function _YaKassa(Request $request, $id) {
		if(method_exists($this, $id.'YaKassa')) return $this->{$id.'YaKassa'}($request);
		return redirect()->route('home');
	}
    public function checkYaKassa(Request $request) {
			Log::info('checkOrder/');
//		$result_code = (!$this->checkMD5($request->input())) ? 1 : 0;
		$result_code = 0;
		# TODO check invoiceId preorder
			Log::info($request->input('invoiceId') .'/'. $result_code);
		return $this->XMLResponse('checkOrder', $request->input('invoiceId'), $result_code);
	}
    public function avisoYaKassa(Request $request) {
        Log::info('AVISO', $request->all());
		Log::info('paymentAviso/');
		$order = Order::find($request->orderNumber);
		$order->status = 1;
		$order->payment_sum = $request->shopSumAmount;
		$order->payed_at = $request->paymentDatetime; //Carbon::parse();
		$order->save();
//		$result_code = (!$this->checkMD5($request->input())) ? 1 : 0;
		$result_code = 0;
		# TODO check invoiceId order
        Log::info($request->input('invoiceId') .'/'. $result_code);

//        \Mail::send('emails.order', array("key" => $request), function ($message) {
//            $message->to('info@iteam.ru')->subject('Покупка');
//        });

		return $this->XMLResponse('paymentAviso', $request->input('invoiceId'), $result_code);
	}
    public function successYaKassa(Request $request) {
		#?orderSumAmount=1.00&cdd_exp_date=1122&shopArticleId=292526&paymentPayerCode=4100322062290&paymentDatetime=2017-02-06T23%3A34%3A31.979%2B03%3A00&cdd_rrn=569266155035&external_id=deposit&paymentType=AC&requestDatetime=2017-02-06T23%3A34%3A32.241%2B03%3A00&depositNumber=di47FY9Ic_l01vTPif9cZp_U-sEZ.001f.201702&cps_user_country_code=PL&orderCreatedDatetime=2017-02-06T23%3A34%3A31.037%2B03%3A00&sk=ue6d6df3efc408069ab93b75a974f80ac&action=PaymentSuccess&shopId=57383&scid=542342&rebillingOn=false&orderSumBankPaycash=1003&cps_region_id=2&orderSumCurrencyPaycash=10643&merchant_order_id=888_060217233328_00000_57383&unilabel=202af158-0009-5000-8000-00001c679690&cdd_pan_mask=444444%7C4448&customerNumber=888&yandexPaymentId=2570070490125&shopDefaultUrl=https%3A%2F%2Fiteam.ru%2Fpay%2Fya%2Fform&invoiceId=2000001032431
		return redirect('i/order');
		#dd($request->input());
	}
    public function failYaKassa(Request $request) {
		#?yandexPaymentId=2570070490437&cps_shopPaymentType=AB&shopDefaultUrl=https%3A%2F%2Fiteam.ru%2Fpay%2Fya%2Fform&shopId=57383&customerNumber=888&scid=542342
		return 'fail';
		#dd($request->input());
	}
    public function NOformYaKassa(Request $request) {
		// shopDefaultUrl=https%3A%2F%2Fiteam.ru%2Fpay%2Fya%2Fform&shopId=57383&customerNumber=888&scid=542342
		return '
			<form action="'.config('payments.yakassa_action').'" method="post" target="_blank">
			<!-- Обязательные поля -->
			<input name="shopId" value="'.config('payments.yakassa_shopid').'" type="hidden"/>
			<input name="scid" value="'.config('payments.yakassa_scid').'" type="hidden"/>
			<input name="customerNumber" value="'.$this->fakeInvId.'" type="hidden"/>
			<input name="sum" value="1"/>
			<br>Способ оплаты:<br>
				<input name="paymentType" value="" type="radio">Яндекс...<br>
				<input name="paymentType" value="PC" type="radio">Яндекс.Деньги<br>
				<input name="paymentType" value="AC" type="radio">Банковская карта<br>
				<input name="paymentType" value="GP" type="radio">Наличные (через кассы и терминалы)<br>
				<input name="paymentType" value="AB" type="radio">Альфа-Клик<br>
				<input name="paymentType" value="PB" type="radio">Интернет-банк Промсвязьбанка<br>
				<input name="paymentType" value="QW" type="radio">QIWI Wallet<br>
				
				<!--input name="paymentType" value="WM" type="radio">WebMoney<br???-->
				<!--input name="paymentType" value="SB" type="radio">Сбербанк Онлайн<br-->
				<!--input name="paymentType" value="MC" type="radio">Баланс телефона<br-->
				<!--input name="paymentType" value="EP" type="radio">ЕРИП (Беларусь)<br-->
				<!--input name="paymentType" value="MP" type="radio">Мобильный терминал (mPOS)<br-->
				<!--input name="paymentType" value="MA" type="radio">MasterPass<br-->
				<!--input name="paymentType" value="KV" type="radio">КупиВкредит<br-->
				<!--input name="paymentType" value="QP" type="radio">Куппи.ру<br-->
			<br>
			<!-- Необязательные поля -->
			<!--input name="orderNumber" value="55555" type="hidden"/-->
			<input name="shopDefaultUrl" value="https://iteam.ru/pay/ya/form" type="hidden"/>
			<!--input name="cps_phone" value="79991234567" type="hidden"/-->
			<!--input name="cps_email" value="go@xyii.net"/-->

			<input type="submit" value="Заплатить"/>
			</form>
		';
	}
	
	/*
	 * Проверяем MD5-хэш параметров платежной формы
	 */
	private function checkMD5($request) {
			Log::info('md5/' . @$request['md5']);
		$str = $request['action'] . ";" 
				. $request['orderSumAmount'] . ";" 
				. $request['orderSumCurrencyPaycash'] . ";" 
				. $request['orderSumBankPaycash'] . ";" 
				. $request['shopId'] . ";" 
				. $request['invoiceId'] . ";" 
				. $request['customerNumber'] . ";" 
				. config('payments.yakassa_shoppassword');
		return (strtoupper(md5($str)) != strtoupper($request['md5'])) ? false : true;
	}
	/*
	 * Строим и отправляем ответ XML для Я.Кассы
	 *
	 * Значения кодов в ответе:
	 * 0 	- Успешно (Магазин дал согласие и готов принять перевод.)
	 * 1 	- Ошибка авторизации (Несовпадение значения параметра md5 с результатом расчета хэш-функции. Окончательная ошибка.)
	 * 100 	- Отказ в приеме перевода (Отказ в приеме перевода с заданными параметрами. Окончательная ошибка. *checkOrder)
	 * 200 	- Ошибка разбора запроса (Магазин не в состоянии разобрать запрос. Окончательная ошибка.)
	 *
	 */
	private function XMLResponse($functionName = 'checkOrder', $invoiceId = 0, $result_code = 200, $message = null) {
		$performedDatetime = date('c'); #...formatDate(new DateTime()) >> 2011-05-04T20:38:00.000+04:00
		$response = '<?xml version="1.0" encoding="UTF-8"?><' 
					. $functionName 
					. 'Response performedDatetime="' 
					. $performedDatetime 
					. '" code="' 
					. $result_code 
					. '" ' 
					. ($message != null ? 'message="' . $message . '"' : "") 
					. ' invoiceId="' 
					. $invoiceId 
					. '" shopId="' 
					. config('payments.yakassa_shopid') 
					. '"/>';
		return response($response, 200)->header('Content-Type', 'application/xml');
	}
}