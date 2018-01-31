<?php
namespace App\Http\Controllers\Ajax;

use Illuminate\Http\Request;
use App\Services\APIs\GetResponseAPI3;
use App\Http\Controllers\Controller;

class FormController extends Controller
{
    protected $gr;

    public function __construct(GetResponseAPI3 $gr)
    {
		$this->gr = $gr;
    }

	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$this->validate($request, [
			'name' => 'required|string|max:255',
			'email' => 'required|email|max:255',
			'campaign_token' => 'required|max:255',
		]);

		$grResponse = $this->gr->addContact(array(
			'name'              => $request->name,
			'email'             => $request->email,
			'dayOfCycle'        => 0,
			'campaign'          => array('campaignId' => $request->campaign_token),
			'customFieldValues' => array(
			    array(
			        'customFieldId' => 'VvNs',
			        'value' => array($request->phone),
			    ),
			),
		));
//var_dump(get_object_vars($grResponse));
		if (!isset($grResponse->httpStatus) || ($grResponse->httpStatus === 409 && $grResponse->code === 1008)) {
			return response()->json([
				'status' => 'ok',
				'msg' => 'Регистрация прошла успешно'
				], 200, ['Access-Control-Allow-Origin' => 'http://localhost:8080']);
		} else {
			return response()->json([
				'status' => 'error',
				'msg' => 'Ошибка, пожалуйста проверьте правильность введенных данных и попробуйте еще раз'
				], 200, ['Access-Control-Allow-Origin' => 'http://localhost:8080']);
		}
	}
	
	public function storePayment(Request $request)
    {
        $paymentFormData = array_filter($request->all(), function($fieldName) {
            return explode("_", $fieldName)[0] === 'WMI' && $fieldName !== 'WMI_SIGNATURE';
        }, ARRAY_FILTER_USE_KEY);
        
        //dd($request->all(), $paymentFormData, generateWalletOneSignature($paymentFormData));

		$this->validate($request, [
			'name' => 'required|string|max:255',
			'email' => 'required|email|max:255',
			'campaign_token' => 'required|max:255',
			'orderid' => 'required|max:255',
		]);
		
		$grResponse = $this->gr->addContact(array(
			'name'              => $request->name,
			'email'             => $request->email,
			'dayOfCycle'        => 0,
			'campaign'          => array('campaignId' => $request->campaign_token),
			'customFieldValues' => array(
			    array(
			        'customFieldId' => '5pHAi',
			        'value' => array($request->orderid),
			    ),
			    array(
			        'customFieldId' => '5psIM',
			        'value' => array('unpaid'),
			    ),
			),
		));
		
		if (!isset($grResponse->httpStatus) || ($grResponse->httpStatus === 409 && $grResponse->code === 1008)) {
			return response()->json([
				'status' => 'ok',
				'WMI_SIGNATURE' => generateWalletOneSignature($paymentFormData)
				], 200, ['Access-Control-Allow-Origin' => 'http://localhost:8080']);
		} else {
			return response()->json([
				'status' => 'error',
				'msg' => 'Ошибка, пожалуйста проверьте правильность введенных данных и попробуйте еще раз'
				], 200, ['Access-Control-Allow-Origin' => 'http://localhost:8080']);
		}
	}
	
}