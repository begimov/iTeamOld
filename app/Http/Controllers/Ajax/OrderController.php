<?php
namespace App\Http\Controllers\Ajax;

use Illuminate\Http\Request;
#use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
#use App\Http\Requests\ProfileRequest;
use App\Http\Requests\OrderRequest;

use App\Models\Learn;
use App\Models\Order;
use App\Models\User;

use Mail;
#use DB;

class OrderController extends Controller
{
    protected $user;
    protected $order_m;

    public function __construct(Order $order_m)
    {
        $this->user = Auth::user();
        $this->order_m = $order_m;
		
		$this->middleware('auth');
		$this->middleware('ajax');
    }

	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
		
		return response()->json('indexAjax');
		
	}
   /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
		/*
		if($request->input()) dd($request->input());
		return redirect('/i/order')->with('error','Не определены параметры заказа');
		#return redirect()->back()->with('error','Не определены параметры заказа');
		*/
		return response()->json('createAjax');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Learn $learn_m, Request $request)
    {
		
		$user = $this->user;
		$order = $this->order_m;
		$payment_type = $request->input('payment_type');
		$product_id = $request->input('product_id');
		$email = $request->input('email');
		$company_name = $request->input('company_name');
		$entity_type = $request->input('entity_type');
		$name = $request->input('name');
		$phone = $request->input('phone');
		if($phone) $phone = preg_replace('/[^0-9]/', '', $phone);
		$status = -4;
		$insert = 0;
		
		if($payment_type==='invoicing' && (!$company_name || $entity_type)){
			return response()->json(0);
		}
		
		if($learn_m && $user){
			$order->user_id = $user->id;
			$order->email = $email ? $email : $user->email;
			$order->phone = $phone ? $phone : $user->phone;
			$order->name = $name ? $name : $user->name;
			$order->sum = $learn_m->price ? $learn_m->price : -9;
			$order->currency = $learn_m->currency ? $learn_m->currency : "RUB";
			
			if(!$user->name || $user->phone){
				if(!$user->name) $user->name = $name;
				if(!$user->phone) $user->phone = $phone;
				$user->save();
			}
			
			if($payment_type==='invoicing' && (!$user->company_name || $user->entity_type)){
				if(!$user->company_name) $user->company_name = $company_name;
				if(!$user->entity_type) $user->entity_type = $entity_type;
				$user->save();
			}
			
			$insert = $order->save();
		}
		
		return response()->json('storeAjax ' . $insert);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {

		return response()->json('showAjax ' . $id);
		//dd($request->cookie('howpay'));
		
		#$order = $this->order_m->with('learn')->findOrFail($id);
		//dd($order);
		#$user = $this->user;
		#return view('c.order', compact('order','user'));//->withCookie('howpay','sberbank',5);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		return response()->json('editAjax ' . $id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
		$order = $this->order_m->where('status','>',-6)->findOrFail($id);
		$payment_type = $request->input('payment_type');
		
		if($request->input('_step') && $payment_type) {
			$status = 0;
			switch ($payment_type) {
				case 'invoicing':
					$status = -3;
					break;
				case 'ya_ac':
					$status = -2;
					break;
				case 'ya_pc':
					$status = -2;
					break;
				default:
					$status = 0;
					break;
			}
		}
		else {
			$status = -4;
			$payment_type = null;
		}
		
		if($status == -2) {
			$email = $request->input('email') ? $request->input('email') : $order->email;
			$name = $request->input('name') ? $request->input('name') : ($order->name ? $order->name : $user->name);
			$phone = $request->input('phone') ? $request->input('phone') : ($order->phone ? $order->phone : $user->phone);
			$update = $order->update(['payment_type' => $request->input('payment_type'), 'status' => $status, 'email' => $email, 'name' => $name, 'phone' => $phone]);
		}
		else {
			$update = $order->update(['payment_type' => $request->input('payment_type'), 'status' => $status]);
		}
		return response()->json($update);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		
		return response()->json('destroyAjax ' . $id);
		
		/*
		$order = $this->order_m->whereEmail($this->user->email)->where('status','>',-3)->where('status','<',1)->findOrFail($id);
		$order->status = -3;
		//$order->updater = $this->user->id;
		$order->save();
		return redirect()->route('orders.index')->with('status','Удалено успешно');
		*/
    }
	
}