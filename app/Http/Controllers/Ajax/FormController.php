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

		// dd($request->all());
// dd($this->gr->getCampaigns());
		$grResponse = $this->gr->addContact(array(
			'name'              => $request->name,
			'email'             => $request->email,
			'dayOfCycle'        => 0,
			'campaign'          => array('campaignId' => $request->campaign_token),
		));
		
		if ($grResponse->httpStatus === 202 || ($grResponse->httpStatus === 409 && $grResponse->code === 1008)) {
			return response()->json([
				'status' => 'ok',
				'url' => 'http://iteam.ru/promo/subscribe/book_offer/'
				]);
		} else {
			return response()->json([
				'status' => 'error',
				'msg' => 'Ошибка, пожалуйста попробуйте еще раз'
				]);
		}
	}
	
}