<?php namespace App\Http\Controllers;

use App\Models\Learn;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mail;
use PDF;

class OrderController extends Controller
{
    /**
     * @var User
     */
    protected $user;

    /**
     * @var Order
     */
    protected $order;

    /**
     * OrderController constructor.
     * @param Order $order
     */
    public function __construct(Order $order)
    {
        $this->middleware('auth');

        $this->user = Auth::user();
        $this->order = $order;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $orders = Order::with('learn')
            ->where('email', $this->user->email)
            ->where('status', '>', -6)
            ->orderBy('status', 'asc')
            ->orderBy('date', 'desc')
            ->orderBy('pdate', 'desc')
            ->get();

        return view('c.company.order.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @param Learn $learn_m
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, Learn $learn_m)
    {
        $_redirect = $request->input('_redirect') ? $request->input('_redirect') : redirect()->back();

        $user = $this->user;
        $order = $this->order;

        $product_id = $request->input('product_id');
        $payment_type = $request->input('payment_type');

        $learn = $learn_m->find($product_id);

        if (!$learn) {
            return $_redirect->with('error', 'Продукт не найден');
        }

        if (!$user) {
            return redirect('/i/email')->with('error', 'Действие доступно после авторизации');
        }

        if (!$product_id) {
            return $_redirect->with('error', 'Не удалось определить ID продукта');
        }

        if (!$payment_type) {
            return $_redirect->with('error', 'Не удалось определить тип оплаты, попробуйте обновить страницу и начать заново');
        }

        $old_order = $order
            ->where('user_id', '=', $user->id)
            ->where('product_id', '=', $product_id)
            ->first();

        if ($old_order) {
            if ($old_order->status < 1) {
                $order = $old_order;
            } else {
                return redirect('/i/order/' . $old_order->id)->with('status', 'Продукт уже оплачен');
            }
        }

        $email = $request->input('email') ? $request->input('email') : $user->email;
        $name = $request->input('name') ? $request->input('name') : $user->name;
        $phone = $request->input('phone') ? $request->input('phone') : $user->phone;
        if ($phone) {
            $phone = preg_replace('/[^0-9]/', '', $phone);
        }
        $order->status = -4;

        $order->product_id = $product_id;
        $order->payment_type = $payment_type;

        $order->user_id = $user->id;
        $order->email = $email;
        $order->sum = $learn->price;
        $order->currency = $learn->currency ? $learn->currency : "RUB";
        $order->name = $name ? $name : '';
        $order->phone = $phone ? $phone : '';

        $insert = $order->save();

        return $insert
            ? redirect('i/order/' . $order->id . '#payModal')
            : $_redirect->with('error', 'Ошибка предзаказа');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Learn $learn_m)
    {
        $_redirect = $request->input('_redirect') ? $request->input('_redirect') : redirect()->back();

        $user = $this->user;
        $order = $this->order;

        $product_id = $request->input('product_id');
        $payment_type = $request->input('payment_type');

        $learn = $learn_m->find($product_id);

        if (!$learn) {
            return $_redirect->with('error', 'Продукт не найден');
        }

        if (!$user) {
            return redirect('/i/email')->with('error', 'Действие доступно после авторизации');
        }

        if (!$product_id) {
            return $_redirect->with('error', 'Не удалось определить ID продукта');
        }

        if (!$payment_type) {
            return $_redirect->with('error', 'Не удалось определить тип оплаты');
        }

        $old_order = $order
            ->where('user_id', '=', $user->id)
            ->where('product_id', '=', $product_id)
            ->first();

        if ($old_order) {
            if ($old_order->status < 1) {
                $order = $old_order;
            } else {
                return redirect('/i/order/' . $old_order->id)->with('status', 'Продукт уже оплачен');
            }
        }

        $email = $request->input('email') ? $request->input('email') : $user->email;
        $name = $request->input('name') ? $request->input('name') : $user->name;
        $phone = $request->input('phone') ? $request->input('phone') : $user->phone;

        if ($phone) {
            $phone = preg_replace('/[^0-9]/', '', $phone);
        }

        $order->status = -4;

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

        return $insert
            ? redirect('i/order/' . $order->id . '#payModal')
            : $_redirect->with('error', 'Ошибка предзаказа');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function show(Request $request, $id)
    {
        $user = $this->user;
        $order = Order::with(['learn', 'user'])
            ->where('email', $user->email)
            ->findOrFail($id);

        return view('c.company.order.show', compact('order', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $order = $this->order->with('learn')->findOrFail($id);
        $_redirect = $request->input('_redirect') ? $request->input('_redirect') : redirect()->back();
        $user = $this->user;

        if (!$order) {
            return $_redirect->with('error', 'Ошибка заказа');
        }

        $status = 0;
        $attach = '';

        if ($request->input('payment_type')) {
            $order->payment_type = $request->input('payment_type');
        }

        $name = $request->input('name') ? $request->input('name') : ($order->name ? $order->name : $user->name);
        $phone = $request->input('phone') ? $request->input('phone') : ($order->phone ? $order->phone : $user->phone);
        if ($phone) {
            $phone = preg_replace('/[^0-9]/', '', $phone);
        }

        if ($order->payment_type === 'invoicing') {
            if ($request->input('company_name')) {
                $order->company_name = $request->input('company_name');
            }

            if ($request->input('entity_type')) {
                $order->entity_type = $request->input('entity_type');
            }

            if ($request->input('email')) {
                $order->email = $request->input('email');
            }

            if (!$order->company_name || !$order->entity_type) {
                $order->company_name = $user->company_name;
                $order->entity_type = $user->entity_type;

                if (!$order->company_name || !$order->entity_type) {
                    return $_redirect->with('error', 'Поля обязательны');
                }
            } elseif (!$user->company_name || !$user->entity_type) {
                if (!$user->company_name) {
                    $user->company_name = $order->company_name;
                }

                if (!$user->entity_type) {
                    $user->entity_type = $order->entity_type;
                }

                $user->save();
            }

            $userPath = 'filemanager/userfiles/user' . $user->id;
            $invoicePath = $userPath . '/invoice';
            @mkdir($userPath);
            @mkdir($invoicePath);

            $filename = md5($order->email . $order->id); // название файла
            $filename .= '.pdf'; // + расширение файла

            if (file_exists($invoicePath . '/' . $filename)) {
                unlink($invoicePath . '/' . $filename);
            }

            $data = [
                'inv_id' => $order->id,
                'client' => $order->entity_type . ' "' . $order->company_name . '"',
                'date' => $order->created_at,
                'sum' => $order->sum,
                'sum_number_format' => number_format($order->sum, 2, ',', ''),
                'title' => $order->learn->title,
            ];

            PDF::loadView('pdf.order', compact('data'))->save($invoicePath . '/' . $filename);

            $attach = (file_exists($invoicePath . '/' . $filename)) ? $invoicePath . '/' . $filename : '';

            $status = -3;
        }

        if (!$user->name || !$user->phone) {
            if (!$user->name) {
                $user->name = $name;
            }
            if (!$user->phone) {
                $user->phone = $phone;
            }
            $user->save();
        }

        $order->name = $name;
        $order->phone = $phone;
        $order->status = $status;

        $order->save();

        $message = 'Заказ принят в обработку';

        Mail::raw('https://iteam.ru/~/order', function ($m) {
            $m->to(config('payments.email'))->subject('Заказ');
        });

        $user->attach = $attach;

        Mail::send(
            'emails.auth.template',
            [
                'title' => 'Заказ # ' . $order->id,
                'text' => $message . '<br><a href="https://iteam.ru/i/order/' . $order->id . '">Статус заказа</a>',
            ],
            function ($m) use ($user) {
                $m->to($user->email, $user->username)->subject('iTeam: статус заказа');

                if ($user->attach) {
                    $m->attach($user->attach);
                }
            }
        );

        return redirect()->back()->with('status', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ord = Order::find($id);

        if ($ord->test_id != 0 && !empty($ord->url_test)) {
            $ord->delete();
        } else {
            $order = Order::whereEmail($this->user->email)
                ->where('status', '>', -6)
                ->where('status', '<', 1)
                ->findOrFail($id);

            $order->status = -6;
            $order->admin_id = $this->user->id;
            $order->save();
        }

        return redirect()->route('orders.index')->with('status', 'Удалено успешно');
    }
}
