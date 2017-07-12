<?php namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Wish;

class WishController extends Controller
{
    protected $user;

    public function __construct()
    {
        $this->user = Auth::user();
    }
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Wish
     */

    public function index(Request $request)
    {
		$resp_m = new Wish;
		$year = date('m')>11 ? date("Y", strtotime("+1 year", time())) : date("Y");
		$archive = false;
		$wishes = $resp_m->with('author')->where('year','=',$year)->where('public','>',0)->orderBy('published_at','desc')->paginate(50);

		return view('c.spec.wish.index',compact('wishes','year','archive'));
	}
	
    public function show(Request $request, $year)
    {
		$resp_m = new Wish;
		$wishes = $resp_m->with('author')->where('year','=',$year)->where('public','>',0)->orderBy('published_at','desc')->paginate(50);
		$archive = true;
		
		return view('c.spec.wish.index',compact('wishes','year','archive'));#->flash('status', 'ok');
	}
	
    public function create(Request $request)
    {
		if($request->session()->has('ok')) {
			$year = date('m')>11 ? date("Y", strtotime("+1 year", time())) : date("Y");
			return view('c.spec.wish.create',compact('year'));
		}
		return redirect()->route('wish.index');
		
	}
	
    public function store(Request $request)
    {
		if(!$this->user) return redirect('i/email?_redirect=/spec/wish')->with('error','Необходима авторизация');
		
		$email = $request->input('email') ? $request->input('email') : false;
		$name = $request->input('name') ? $request->input('name') : false;
		$text = $request->input('text') ? $request->input('text') : false;
		
		if(!$email) return redirect()->back()->with('error','Не указан Email');
		if(!$name) return redirect()->back()->with('error','Не указано имя');
		if(!$text) return redirect()->back()->with('error','Не заполнено поле пожелания');
		
		$year = date('m')>11 ? date("Y", strtotime("+1 year", time())) : date("Y");
		$resp_m = new Wish;
		$wish = $resp_m->where('year','=',$year)->where('author_email','=',$email)->first();
		
		if($wish) return redirect()->back()->with('error','Вы уже отправляли желание на '.$year.' год');
		
		if(!$this->user->firstname) {
			$this->user->firstname = $name;
			$this->user->save();
		}
		
		$resp_m->author_id = $this->user->id;
		$resp_m->author_email = $email;
		$resp_m->author_name = $name;
		$resp_m->text = $text;
		$resp_m->public = 0;
		$resp_m->year = $year;
		$resp_m->title = 'Я желаю, чтобы в Новом '.$year.' году';
		$resp_m->save();
		
		return redirect()->route('wish.create')->with('ok', true);
	}

}