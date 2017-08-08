<?php namespace App\Http\Controllers\Admin;

# контроллер заказов в админке

use App\Http\Controllers\Controller;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;

use App\Http\Requests\OrderRequest;
use App\Http\Requests;

use App\Models\Learn;
use App\Models\Order;
use App\Models\User;
use App\Test;

//use DB;
use PDF;
use Mail;

class OrderController extends Controller
{

    protected $auth;
    protected $user;

    protected $support_email = "slava@trunov.me";
    protected $report = true;

    /**
     * Create a new ProfileController instance.
     *
     * @param  Illuminate\Contracts\Auth\Guard $auth
     * @return void
     */
    public function __construct()
    {
        $this->auth = Auth();
        $this->user = $this->auth->user();

        $this->support_email = config('payments.email');

        #if($this->user) {
        #$this->order = $order->payed($this->user->id);
        #}
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $status = (null !== $request->status && $request->status !== "") ? $request->status : false;

        $search = $request->search ? $request->search : false;

        $title = $request->title ? $request->title : false;
        $payment_type = $request->payment_type ? $request->payment_type : false;

        $daterange = $request->daterange ? $request->daterange : false;
        $order_by = $request->order_by ? $request->order_by : 'updated_at'; // 07.04.2017 $order_by = $request->order_by ? $request->order_by : 'id';
        $sort_by = $request->sort_by ? $request->sort_by : 'desc';

        $take = $request->take ? (int)$request->take : 50;

        $orders = Order::with(['learn', 'user']);

        if ($title !== false) {
            $learns = Learn::where('title', 'LIKE', '%' . $title . '%')->select('id')->pluck('id')->toArray();
            $orders = $orders->whereIn('product_id', $learns);
        }

        if ($status !== false) {
            $orders = $orders->whereIn('status', $status);
        } else {
            $orders = $orders->where('status', '>', -6);
        }

        if ($search !== false) {
            $orders = $orders->where(function ($query) use ($search) {
                $query->where('email', 'LIKE', '%' . $search . '%')
                    ->orWhere('company_name', 'LIKE', '%' . $search . '%');
            });
        }

        if ($payment_type !== false) {
            $orders = $orders->where('payment_type', '=', $payment_type);
        }

        if ($daterange !== false) {
            $dateranges = explode('-', $daterange);
            $startdate = isset($dateranges[0]) ? date("Y-m-d H:i:s", strtotime(trim($dateranges[0]))) : date("Y-m-d H:i:s", time() - (24 * 60 * 60 - 1));
            $enddate = isset($dateranges[1]) ? date("Y-m-d H:i:s", strtotime(trim($dateranges[1])) + (24 * 60 * 60 - 1)) : date("Y-m-d H:i:s", time() + (24 * 60 * 60 - 1));

            $orders = $orders->where(function ($query) use ($startdate, $enddate) {
                $query->where('created_at', '>', $startdate)
                    ->where('created_at', '<', $enddate);
            });
        }

        $orders = $orders->orderBy($order_by, $sort_by);
        $orders = $orders->paginate($take);

        $links = $orders->appends([
            'status' => $request->status,
            'search' => $request->search,
            'title' => $request->title,
            'payment_type' => $request->payment_type,
            'take' => $request->take,
            'daterange' => $request->daterange,
            'order_by' => $request->order_by,
            'sort_by' => $request->sort_by
        ])->render();

        $order_by = ['ID' => 'id', 'Дата' => 'updated_at', 'Email' => 'email']; // 07.04.2017 $order_by = ['ID'=>'id','Дата'=>'created_at','Email'=>'email'];
        $statuses = range(-6, 2);
        $payment_types = ['ya_ac', 'ya_pc', 'sberbank', 'invoicing', 'transfer', 'paypal'];


        return view('admin.order.index', compact('orders', 'links', 'order_by', 'statuses', 'payment_types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $order = new Order;
        $learns = Learn::where('public', '>=', 0)->where('price', '>', 0)->whereNotIn('path', ['', '/'])->select('id', 'wid', 'path', 'title', 'price')->get();

        $statuses = range(-4, 0);
        $payment_types = ['sberbank', 'invoicing', 'transfer', 'paypal', 'gift'];

        return view('admin.order.create', compact('order', 'learns', 'statuses', 'payment_types'));
    }

    public function createOrderTest()
    {
        $order = new Order;
        $tests = Test::all();
        $statuses = range(-4, 0);
        $payment_types = ['sberbank', 'invoicing', 'transfer', 'paypal'];

        return view('admin.order.create-test', compact('order', 'tests', 'statuses', 'payment_types'));
    }

    public function storeOrderTest(Request $request)
    {
        $user = User::find($request->user_id);
        $testOrder = Order::where('user_id', $user->id)
            ->where('test_id', $request->product_id)
            ->where('status', '!=', '1')
            ->first();
        $ms = Order::where('user_id', $user->id)
            ->where('test_id', '!=', 0)
            ->get();
        $max = 10000;
        foreach ($ms as $m) {
            if ($m->product_id > $max) {
                $max = $m->product_id;
            }
        }
        \Log::info(['MAX' => $max]);
        $count = count($testOrder);
        if ($count == 0) {
            $order = new Order();
            $test = Test::find($request->product_id);
            $order->product_id = $max + 1;
            $order->url_test = "test" . str_random(32);
            $order->user_id = $user->id;
            $order->email = $user->email;
            $order->status = -4;
            $order->test_id = $request->product_id;
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
            return redirect()->back();
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
            return redirect()->back();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderRequest $request)
    {
        $order = new Order;
        $product_id = $request->input('product_id');
        $learn = Learn::where('id', '=', $product_id)->first();
        if (!$product_id || !$learn) return redirect()->back()->with('error', 'Не найден продукт');

        $email = $request->input('email');
        if (!$email) return redirect()->back()->with('error', 'Не определён Email');

        $real_order = $order->whereProductId($product_id)->whereEmail($email)->select('id')->first();
        if ($real_order && $real_order->id) {
            return redirect()->route('admin.order.edit', ['id' => $real_order->id])->with('error', 'Такой заказ уже существует, Вы были перенаправлены на его редактирование, будьте внимательны.');
        }

        $user_id = $request->input('user_id');
        $user = User::where('id', '=', $user_id)->first();
        if (!$user_id || !$user) return redirect()->back()->with('error', 'Не найден пользователь. Сначала зарегистрируйте пользователя');
        if ($user->email !== $email) return redirect()->back()->with('error', 'Email пользователя не совпадает с электронным адресом в заказе. Зарегистрируйте нового пользователя или воспользуйтесь корректным Email');

        $statuses = range(-4, 0);
        $status = $request->input('status');
        if (!$status) return redirect()->back()->with('error', 'Не определён Статус оплаты');
        if (!in_array($status, $statuses)) return redirect()->back()->with('error', 'Статус оплаты не существует или возможен только для существующих заказов');

        $payment_types = ['ya_ac', 'ya_pc', 'sberbank', 'invoicing', 'transfer', 'paypal', 'gift'];
        $payment_type = $request->input('payment_type');
        if (!$payment_type) return redirect()->back()->with('error', 'Не определён Тип оплаты');
        if (!in_array($payment_type, $payment_types)) return redirect()->back()->with('error', 'Тип оплаты не существует или невозможен при создании администратором');

        $name = $request->input('name');
        if (!$name) {
            if ($user->firstname) $name = $user->firstname;
            else return redirect()->back()->with('error', 'Не указано имя пользователя');
        } else {
            $order->name = $name;
        }


        $phone = $request->input('phone');
        if (!$phone) {
            if ($user->phone) $name = $user->phone;
            else return redirect()->back()->with('error', 'Не указан телефон пользователя');
        } else {
            $order->phone = $phone;
        }


        $entity_type = $request->input('entity_type');
        $company_name = $request->input('company_name');


        if ($payment_type === "invoicing" && (!$entity_type || !$company_name)) {
            $company_error = '';
            if (!$entity_type) $company_error .= 'Не указано ОПФ (форма собственности) компании. ';
            if (!$company_name) $company_error .= 'Не указано название компании';
            return redirect()->back()->with('error', $company_error);
        } else {
            $order->entity_type = $request->input('entity_type');
            $order->company_name = $request->input('company_name');
        }

        if ($request->all()) {
            foreach ($order->getFillable() AS $field) {
                if (null !== $request->$field) {
                    if ($field === 'created_at') $request->$field = date('Y-m-d H:i:s', strtotime($request->$field));
                    $order->$field = $request->$field;
                }
            }

            if ($order->status > 0) {
                $order->payed_at = date('Y-m-d H:i:s');
            }


            $order->sum = $learn->price;
            $order->currency = $learn->currency ? $learn->currency : "RUB";
            $order->admin_id = $this->user->id;
            $save = $order->save();

            if ($save) {

//                if ($order->payment_type === 'invoicing') {

                $documentRoot = $_SERVER['DOCUMENT_ROOT'];
                $userPath = 'filemanager/userfiles/user' . $order->user_id;
                $invoicePath = $userPath . '/invoice';
                @mkdir($userPath);
                @mkdir($invoicePath);

                $filename = md5($order->email . $order->id); // название файла
                $filename .= ".pdf"; // + расширение файла

                $attach = (file_exists($invoicePath . '/' . $filename)) ? $invoicePath . '/' . $filename : '';
                if (!$attach) {

                    $data = ['inv_id' => $order->id,
                        'client' => $order->entity_type . ' "' . $order->company_name . '"',
                        'date' => $order->created_at,
                        'sum' => $order->sum,
                        'sum_number_format' => number_format($order->sum, 2, ',', ''),
                        'title' => $learn->title];


                    PDF::loadView('pdf.order', compact('data'))->save($invoicePath . '/' . $filename);
                    $attach = (file_exists($invoicePath . '/' . $filename)) ? $invoicePath . '/' . $filename : '';

                }
//                }

                $message = 'Создан новый заказ';
                $user->attach = $attach;
                $send = Mail::send('emails.auth.template', ['title' => 'Заказ # ' . $order->id, 'text' => $message . '<br><a href="https://iteam.ru/i/order/' . $order->id . '">Смотреть заказ</a>'], function ($m) use ($user) {
                    $m->to($user->email, $user->username)->subject('iTeam: статус заказа');
                    if ($user->attach) $m->attach($user->attach);
                });

//                return redirect()->route('admin.order.edit', ['id' => $order->id])->with('status', 'Создано успешно'); // редирект на редактирование
                return redirect()->route('admin.order.index')->with('status', $message); // редирект на страницу заказов

            }

        }

        return redirect()->back()->with('error', 'Неизвестная ошибка');#->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        //
        return redirect()->route('admin.order.edit', ['id' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::with(['user', 'learn'])->findOrFail($id);

        if (!$order->entity_type && $order->user->entity_type) $order->entity_type = $order->user->entity_type;
        if (!$order->company_name && $order->user->company_name) $order->company_name = $order->user->company_name;
        if (!$order->name && $order->user->firstname) $order->name = $order->user->firstname;
        if (!$order->phone && $order->user->phone) $order->phone = $order->user->phone;

        $learns = Learn::where('public', '>', 0)->where('price', '>', 0)->whereNotIn('path', ['', '/'])->select('id', 'wid', 'path', 'title', 'price')->get();
        $statuses = range(-6, 2);
        $payment_types = ['ya_ac', 'ya_pc', 'sberbank', 'invoicing', 'transfer', 'paypal', 'gift'];

        return view('admin.order.edit', compact('order', 'learns', 'statuses', 'payment_types'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //$order_m = new Order;
        $order = Order::with(['learn', 'user'])->findOrFail($id);

        $order->fact_sum = $request->fact_sum;
        $order->description = $request->description;

        $_redirect = $request->input('_redirect') ? $request->input('_redirect') : redirect()->back();

        $user = $order->user;

        if (!$order) return $_redirect->with('error', 'Ошибка заказа');

        $attach = '';
        $change_attach = false;
        $change_status = false;

        if (null !== $request->input('status')) {
            $status = (int)$request->input('status');
            $statuses = range(-6, 2);
            if (!in_array($status, $statuses)) return redirect()->back()->with('error', 'Статус оплаты не существует или возможен только для существующих заказов');
            if ($status !== $order->status) {
                $order->status = $status;
                $change_status = true;
                if ($order->status > 0) {
                    $order->payed_at = date('Y-m-d H:i:s');
                }
            }
        }

        if (null !== $request->input('user_id')) {

            if (null !== $request->input('product_id')) {
                $product_id = (int)$request->input('product_id');
                if ($product_id !== $order->product_id) {
                    $learn = Learn::where('id', '=', $product_id)->first();
                    if (!$learn) return redirect()->back()->with('error', 'Не найден продукт');

                    $real_order = $order->whereProductId($product_id)->whereEmail($order->email)->select('id')->first();
                    if ($real_order && $real_order->id) {
                        return redirect()->route('admin.order.edit', ['id' => $real_order->id])->with('error', 'Такой заказ уже существует, Вы были перенаправлены на его редактирование, будьте внимательны.');
                    }

                    $order->product_id = $product_id;
                    $order->sum = $learn->price;
                    $change_attach = true;
                }
            }

            if (null !== $request->input('payment_type')) {
                $payment_type = $request->input('payment_type');
                $payment_types = ['ya_ac', 'ya_pc', 'sberbank', 'invoicing', 'transfer', 'paypal', 'gift'];
                if (!in_array($payment_type, $payment_types)) return redirect()->back()->with('error', 'Тип оплаты не существует или невозможен при создании администратором');
                if ($payment_type !== $order->payment_type) {
                    $order->payment_type = $payment_type;
                }
            }

            if (null !== $request->input('name')) {
                $name = $request->input('name');
                if ($name !== $order->name) {
                    $order->name = $name;
                }
            }
            if (!$order->name && $order->user->firstname) $order->name = $order->user->firstname;
            $name = $order->name;

            if (null !== $request->input('phone')) {
                $phone = $request->input('phone');
                if ($phone !== $order->phone) {
                    $order->phone = $phone;
                }
            }
            if (!$order->phone && $order->user->phone) $order->phone = $order->user->phone;
            $phone = $order->phone;

            if (!$name || !$phone) {
                $user_error = '';
                if (!$name) $user_error .= 'Не указано имя. ';
                if (!$phone) $user_error .= 'Не указан телефон';
                return redirect()->back()->with('error', $user_error);
            }

        }

        if ($order->payment_type === 'invoicing') {

            if (null !== $request->input('entity_type')) {
                $entity_type = $request->input('entity_type');
                if ($entity_type !== $order->entity_type) {
                    $order->entity_type = $entity_type;
                    $change_attach = true;
                }
            }
            if (!$order->entity_type && $order->user->entity_type) $order->entity_type = $order->user->entity_type;
            $entity_type = $order->entity_type;

            if (null !== $request->input('company_name')) {
                $company_name = $request->input('company_name');
                if ($company_name !== $order->company_name) {
                    $order->company_name = $company_name;
                    $change_attach = true;
                }
            }
            if (!$order->company_name && $order->user->company_name) $order->company_name = $order->user->company_name;
            $company_name = $order->company_name;

            if (!$entity_type || !$company_name) {
                $company_error = '';
                if (!$entity_type) $company_error .= 'Не указано ОПФ (форма собственности) компании. ';
                if (!$company_name) $company_error .= 'Не указано название компании';
                return redirect()->back()->with('error', $company_error);
            }


            $documentRoot = $_SERVER['DOCUMENT_ROOT'];
            $userPath = 'filemanager/userfiles/user' . $order->user->id;
            $invoicePath = $userPath . '/invoice';
            @mkdir($userPath);
            @mkdir($invoicePath);

            $filename = md5($order->email . $order->id); // название файла
            $filename .= ".pdf"; // + расширение файла

            $attach = (file_exists($invoicePath . '/' . $filename)) ? $invoicePath . '/' . $filename : '';

            if (!$attach || $change_attach) {

                $data = ['inv_id' => $order->id,
                    'client' => $order->entity_type . ' "' . $order->company_name . '"',
                    'date' => $order->created_at,
                    'sum' => $order->sum,
                    'sum_number_format' => number_format($order->sum, 2, ',', ''),
                    'title' => $order->learn->title];

                if ($attach) unlink($invoicePath . '/' . $filename);
                PDF::loadView('pdf.order', compact('data'))->save($invoicePath . '/' . $filename);

                $attach = (file_exists($invoicePath . '/' . $filename)) ? $invoicePath . '/' . $filename : '';

            }
        }

        $order->admin_id = $this->user->id;
        $update = $order->save();

        $message = 'Заказ обновлён';

        if ($change_status) {
            $message = 'Изменён статус заказа';
            $user->attach = $attach;

            $send = Mail::send('emails.auth.template', ['title' => 'Заказ # ' . $order->id, 'text' => $message . '<br><a href="https://iteam.ru/i/order/' . $order->id . '">Смотреть заказ</a>'], function ($m) use ($user) {
                $m->to($user->email, $user->username)->subject('iTeam: статус заказа');
                if ($user->attach) $m->attach($user->attach);
            });
        }

//		return redirect()->back()->with('status',$message);
        return redirect()->route('admin.order.index')->with('status', $message);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order_m = new Order;
        $order = $order_m->where('status', '>', -6)->findOrFail($id);
        $order->status = -6;
        $order->admin_id = $this->user->id;
        $order->save();
        return redirect()->route('admin.order.index')->with('status', 'Удалено успешно');
    }


    public function checkEmail(Request $request, $email = '')
    {
        $out = [];
        if ($email) {
            $users = User::where('email', 'LIKE', $email . '%')->select('id', 'email', 'firstname', 'phone', 'entity_type', 'company_name')->take(5)->get();
            if ($users) {
                $out["query"] = "Unit";
                foreach ($users AS $user) {
                    #$out["suggestions"][] = $user->email;
                    $out["suggestions"][] = ["value" => $user->email, "data" => ["id" => $user->id, "name" => $user->firstname, "phone" => $user->phone, "entity_type" => $user->entity_type, "company_name" => $user->company_name]];
                }
            }
        }

        return response()->json($out);
    }


    protected function _report($request = '')
    {
        $msg = (is_array($request)) ? var_export($request, 1) : $request;
        Mail::send('emails.auth.template', ['title' => 'ITEAM ORDER REPORT', 'text' => $msg], function ($m) {
            $m->to($this->support_email)->subject('ITEAM ORDER REPORT');
        });
    }

    protected function _payUserReport($user_id = 0, $order_id = 0)
    {
        $user = User::find($user_id);

        $send = Mail::send('emails.auth.template', ['title' => 'Оплата подтверждена', 'text' => '<a href="https://iteam.ru/i/order/' . $order_id . '">Перейти к материалам</a>'], function ($m) use ($user) {
            $m->to($user->email, $user->username)->subject('iTeam: об оплате заказа');
        });
    }

    public function getCheck(Request $request, $id)
    {
        $method = 'get_' . $id;

        if (method_exists(get_class($this), $method)) {
            return $this->$method($request);
        } else {

            $res = '. Запрос: ';
            foreach ($request->all() AS $key => $value) $res .= $key . ': ' . $value . '; ';
            $msg = "Неизвестный метод " . $method . $res;
            $this->_report($msg);

        }
        die($id);
    }


    public function postCheck(Request $request, $id)
    {
        $method = 'post_' . $id;

        if (method_exists(get_class($this), $method)) {
            return $this->$method($request->all());
        } else {

            $res = '. Запрос: ';
            foreach ($request->all() AS $key => $value) $res .= $key . ': ' . $value . '; ';
            $msg = "Неизвестный метод " . $method . $res;
            $this->_report($msg);

        }
        die($id);
    }

    protected function post_ya($request)
    {


        if ($request) {

            $err = 1;
            $string = $request['notification_type']
                . '&' . $request['operation_id']
                . '&' . $request['amount']
                . '&' . $request['currency']
                . '&' . $request['datetime']
                . '&' . $request['sender']
                . '&' . $request['codepro']
                . '&' . config('payments.yamoney_secret')
                . '&' . $request['label'];

            if (sha1($string) === $request['sha1_hash']) {


                if (!$order = Order::find(@$request['label'])) {
                    $this->_report('Заказ не найден... ' . @$request['label'] . '<hr><pre>' . var_export(@$request, 1) . '</pre>');
                } else {

                    $order->sum = $request["withdraw_amount"];
                    $order->payment_sum = $request["amount"];

                    $order->payed_at = date("y-m-d H:i:s");
                    $order->text = 'Оплачен через Yandex ' . $order->payed_at . ' --' . @$request['notification_type'];
                    $order->status = 1;

                    if ($order->save()) {
                        $err = 0;

                        #ПИСЬМО КЛИЕНТУ: Поступила оплата
                        $this->_payUserReport($order->user_id, $order->id);

                        $msg = "YA Заказ № " . @$order->id . " оплачен";
                        $this->_report($msg);
                    } else {
                        $msg = "Заказ не записался! " . @$order->id;
                        $this->_report($msg);
                    }

                }

            } else {

                $msg = "YANDEX HASH ERROR";
                $this->_report($msg);

            }


            if (!$err) {
                header('HTTP/1.0 200 OK');
                header("Status: 200 OK");
                die();
            } else {
                header('HTTP/1.0 404 Not Found');
                header("Status: 404 Not Found");
                die();
            }

        } else {
            $msg = "YANDEX NO REQUEST";
            $this->_report($msg);
            die($msg);
        }
    }

    public function demo(Request $request, $id)
    {
        header('HTTP/1.0 200 OK');
        header("Status: 200 OK");
        die();
    }

    public function excelDate(Request $request)
    {
        \Excel::create('Отчет ' . $request->from . '-' . $request->before, function ($excel) use ($request) {
            $excel->sheet('Отчет', function ($sheet) use ($request) {
                $date = new Carbon($request->before);
                $date = $date->addHour(23)->addMinute(59)->addSecond(59);
                $orders = Order::select('product_id', 'user_id', 'sum', 'fact_sum', 'name', 'email', 'phone', 'company_name', 'payed_at', 'status', 'payment_type')
                    ->with('user')
                    ->where('product_id', '<', 10000)
                    ->where('payed_at', '>=', $request->from)
                    ->where('payed_at', '<=', $date->toDateTimeString())
                    ->where('status', '>=', -5)
                    ->where('email', '!=', 'Vodyanik.artur@gmail.com')
                    ->where('email', '!=', 'olga.silayeva@gmail.com')
                    ->where('email', '!=', 'olga.andreeva082@gmail.com')
                    ->where('email', '!=', 'gorba9@gmail.com')
                    ->where('email', '!=', 'stupakova@iteam.ru')
                    ->where('email', '!=', 'andreeva@iteam.ru')
                    ->where('email', '!=', 'silaeva@iteam.ru')
                    ->orderBy('payed_at')
                    ->get();

                $sheet->freezeFirstRow();
                $sheet->appendRow(1, array('Название продукта', 'Цена', 'Фактическая цена', 'Статус заказа', 'способ оплаты', 'Имя заказчика', 'Еmail', 'Телефон', 'Название компании', 'Дата и время покупки'));
                $sumAll = 0;
                $sumFactAll = 0;
                $statuses = [
                    -4 => 'Не оплачен',
                    -3 => 'Счет отправляется',
                    -2 => 'Попытка оплаты онлайн',
                    -1 => 'Ожидает ответа платежной системы',
                    0 => 'Ждет оплаты',
                    1 => 'Оплачен',
                    2 => 'Подтвержден'
                ];
                foreach ($orders as $key => $order) {
                    if ($order->product_id >= 10000) {
                        continue;
                    } else {
                        $sheet->appendRow($key + 2, array(
                            $order->learn->title,
                            $order->sum,
                            $order->fact_sum == 0 ? $order->sum : $order->fact_sum,
                            isset($statuses[$order->status]) ? $statuses[$order->status] : '',
                            $order->payment_type,
                            !empty($order->name) ? $order->name : $order->user->firstname . ' ' . $order->user->lastname,
                            $order->email,
                            $order->phone,
                            $order->company_name,
                            $order->payed_at,
                        ));
                        $sumAll += $order->sum;
                        $sumFactAll += $order->fact_sum == 0 ? $order->sum : $order->fact_sum;
                    }
                }

                $sheet->appendRow(count($orders) + 3, array(
                    '',
                    $sumAll,
                    $sumFactAll,
                    '',
                    '',
                    '',
                    '',
                    '',
                ));
            });
        })->download('xlsx');
    }

}
