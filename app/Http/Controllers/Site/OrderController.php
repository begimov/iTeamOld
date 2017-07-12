<?php namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\OrderRequest;

use App\Models\Learn;
use App\Models\Order;
use App\Models\User;

use PDF;
use Mail;
#use DB;

class OrderController extends Controller
{
    protected $user;
    protected $order_m;
    protected $support_email = 'slava@trunov.me';

    public function __construct(Order $order_m)
    {
        $this->user = Auth::user();
        $this->order_m = $order_m;
		$this->middleware('auth');
    }

	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
		
		$orders = $this->order_m->with('learn')->whereEmail($this->user->email)->where('status','>',-6)->orderBy('status','asc')->orderBy('date','desc')->orderBy('pdate','desc')->get();
		#dd($orders);
		return view('c.company.order.index', compact('orders'));
		
		
	}
   /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, Learn $learn_m)
    {
		
		$_redirect = $request->input('_redirect') ? $request->input('_redirect') : redirect()->back();
		
		$user = $this->user;
		$order = $this->order_m;
		
		$product_id = $request->input('product_id');
		$payment_type = $request->input('payment_type');
		
		#if($product_id) 
			$learn = $learn_m->find($product_id);
		
		if(!$learn) return $_redirect->with('error','Продукт не найден');
		if(!$user) return redirect('/i/email')->with('error','Действие доступно после авторизации');
		if(!$product_id) return $_redirect->with('error','Не удалось определить ID продукта');
		if(!$payment_type) return $_redirect->with('error','Не удалось определить тип оплаты, попробуйте обновить страницу и начать заново');
		
		$old_order = $order->where('user_id','=',$user->id)->where('product_id','=',$product_id)->first();
		if($old_order){
			if($old_order->status < 1) $order = $old_order;
			else return redirect('/i/order/'.$old_order->id)->with('status','Продукт уже оплачен');
		}
		
		$email = $request->input('email') ? $request->input('email') : $user->email;
		$company_name = $request->input('company_name');
		$entity_type = $request->input('entity_type');
		$name = $request->input('name') ? $request->input('name') : $user->name;
		$phone = $request->input('phone') ? $request->input('phone') : $user->phone;
		if($phone) $phone = preg_replace('/[^0-9]/', '', $phone);
		$order->status = -4;
		$insert = 0;

		$order->product_id = $product_id;
		$order->payment_type = $payment_type;
		
		$order->user_id = $user->id;
		$order->email = $email;
		$order->sum = $learn->price;
		$order->currency = $learn->currency ? $learn->currency : "RUB";
		$order->name = $name ? $name : '';
		$order->phone = $phone ? $phone : '';
		
		$insert = $order->save();
		return ($insert) ? redirect('i/order/' . $order->id . '#payModal') : $_redirect->with('error','Ошибка предзаказа');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(/*Order*/Request $request, Learn $learn_m)
    {

		$_redirect = $request->input('_redirect') ? $request->input('_redirect') : redirect()->back();
		
		$user = $this->user;
		$order = $this->order_m;
		
		$product_id = $request->input('product_id');
		$payment_type = $request->input('payment_type');
		
		#if($product_id) 
			$learn = $learn_m->find($product_id);
		
		if(!$learn) return $_redirect->with('error','Продукт не найден');
		if(!$user) return redirect('/i/email')->with('error','Действие доступно после авторизации');
		if(!$product_id) return $_redirect->with('error','Не удалось определить ID продукта');
		if(!$payment_type) return $_redirect->with('error','Не удалось определить тип оплаты');
		
		$old_order = $order->where('user_id','=',$user->id)->where('product_id','=',$product_id)->first();
		if($old_order){
			if($old_order->status < 1) $order = $old_order;
			else return redirect('/i/order/'.$old_order->id)->with('status','Продукт уже оплачен');
		}
		
		$email = $request->input('email') ? $request->input('email') : $user->email;
		$company_name = $request->input('company_name');
		$entity_type = $request->input('entity_type');
		$name = $request->input('name') ? $request->input('name') : $user->name;
		$phone = $request->input('phone') ? $request->input('phone') : $user->phone;
		if($phone) $phone = preg_replace('/[^0-9]/', '', $phone);
		
		$order->status = -4;
		$insert = 0;
		
		$order->product_id = $product_id;
		$order->payment_type = $payment_type;
		
		$order->user_id = $user->id;
		$order->email = $email;
		$order->name = $name;
		$order->phone = $phone;
		$order->sum = $learn->price;
		$order->currency = $learn->currency ? $learn->currency : "RUB";
		$order->name = $name ? $name : '';
		$order->phone = $phone ? $phone : '';
		
		$insert = $order->save();
		return ($insert) ? redirect('i/order/' . $order->id . '#payModal') : $_redirect->with('error','Ошибка предзаказа');
		
    }
	

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {

		#$order = ($this->user->id===1) ? $this->order_m->with(['learn','user'])->findOrFail($id) : $this->order_m->with(['learn','user'])->whereEmail($this->user->email)->findOrFail($id);
		$order = $this->order_m->with(['learn','user'])->whereEmail($this->user->email)->findOrFail($id);
		$user = $this->user;
		return view('c.company.order.show', compact('order','user'));//->withCookie('howpay','sberbank',5);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(/*Order*/Request $request, $id)
    {
		
		$order = $this->order_m->with('learn')->findOrFail($id);
		$_redirect = $request->input('_redirect') ? $request->input('_redirect') : redirect()->back();
		$user = $this->user;
		
		if(!$order) return $_redirect->with('error','Ошибка заказа');
		
		$status = 0;
		$attach= '';
		
		if($request->input('payment_type')) $order->payment_type = $request->input('payment_type');
		
		$name = $request->input('name') ? $request->input('name') : ($order->name ? $order->name : $user->name);
		$phone = $request->input('phone') ? $request->input('phone') : ($order->phone ? $order->phone : $user->phone);
		if($phone) $phone = preg_replace('/[^0-9]/', '', $phone);
		
		if($order->payment_type==='invoicing'){
			
			if($request->input('company_name')) $order->company_name = $request->input('company_name');
			if($request->input('entity_type')) $order->entity_type = $request->input('entity_type');
			if($request->input('email')) $order->email = $request->input('email');
			
			if(!$order->company_name || !$order->entity_type){
				$order->company_name = $user->company_name;
				$order->entity_type = $user->entity_type;
				
				if(!$order->company_name || !$order->entity_type) return $_redirect->with('error','Поля обязательны');
				
			}
			elseif(!$user->company_name || !$user->entity_type){
				if(!$user->company_name) $user->company_name = $order->company_name;
				if(!$user->entity_type) $user->entity_type = $order->entity_type;
				$user->save();
			}
			
			$userPath = 'filemanager/userfiles/user'.$user->id;
			$invoicePath = $userPath . '/invoice';
			@mkdir($userPath);
			@mkdir($invoicePath);
			
			$filename = md5($order->email.$order->id); // название файла
			$filename .= ".pdf"; // + расширение файла
			
			//$attach = (file_exists($invoicePath.'/'.$filename)) ? $invoicePath.'/'.$filename : '';
				if(file_exists($invoicePath.'/'.$filename)) unlink($invoicePath.'/'.$filename);
			#if(!$attach) {
				
				$data = ['inv_id' => $order->id,
						'client' => $order->entity_type . ' "' . $order->company_name . '"',
						'date' => $order->created_at,
						'sum' => $order->sum,
						'sum_number_format' => number_format($order->sum,2,',',''),
						'title' => $order->learn->title];

				PDF::loadView('pdf.order', compact('data'))->save($invoicePath.'/'.$filename);

				$attach = (file_exists($invoicePath.'/'.$filename)) ? $invoicePath.'/'.$filename : '';
				
			#}

			$status = -3;
			
			
		}
		
		if(!$user->name || !$user->phone){
			if(!$user->name) $user->name = $name;
			if(!$user->phone) $user->phone = $phone;
			$user->save();
		}
		
		$order->name = $name;
		$order->phone = $phone;
		$order->status = $status;
		
		$update = $order->save();
		#$update = $order->update(['status' => $status]);
		
		$message = 'Заказ принят в обработку';
		
		Mail::raw('https://iteam.ru/~/order', function($m){$m->to( config('payments.email') )->subject('Заказ');});
		
		$user->attach = $attach;
		
		$send = Mail::send('emails.auth.template', ['title' => 'Заказ # ' . $order->id, 'text' => $message . '<br><a href="https://iteam.ru/i/order/'.$order->id.'">Статус заказа</a>'], function ($m) use ($user) {
			$m->to($user->email, $user->username)->subject('iTeam: статус заказа');
			if($user->attach) $m->attach($user->attach);
		});
		
		return redirect()->back()->with('status',$message);
		
    }

	
	protected function _report($request = 'Пусто')
    {
		$msg = (is_array($request)) ? var_export($request,1) : $request;
		//Mail::raw($msg, function($m){$m->to( $this->support_email )->subject('ITEAM PAY REPORT');});
		Mail::send('emails.auth.template', ['title' => 'ITEAM ORDER REPORT', 'text' => $msg ], function ($m) {
			$m->to( $this->support_email )->subject('ITEAM ORDER REPORT');
		});
	}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		$order = $this->order_m->whereEmail($this->user->email)->where('status','>',-6)->where('status','<',1)->findOrFail($id);
		$order->status = -6;
		$order->admin_id = $this->user->id;
		$order->save();
		return redirect()->route('orders.index')->with('status','Удалено успешно');
    }
	
}