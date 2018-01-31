<?php namespace App\Http\Controllers\Learn;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Order;
use App\Models\Learn;

use App\Http\Controllers\UploadController;
use App\MarkResource;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Validator;
use App\Review;
use App\Models\Response;
//use DB;

class LearnController extends Controller
{
    protected $learn_m;
    protected $user;

    public function __construct(Learn $learn_m)
    {
		$this->learn_m = $learn_m;
        $this->user = Auth::user();
    }
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Order $order_m, Request $request, $link = '/')
    {
        if ($link === 'course') return $this->newCourseIndex();
        
        if ($link === 'webinar') return $this->newWebinarIndex();
        
		if(!$link || $link === '/') return $this->indexHome();

		$links = explode('/',$link);
		$wid = array_pop($links);
		$path = implode('/',$links);
		$path = ($path) ? '/' . $path . '/' : '/';

		$table = $this->learn_m->getTable();


		$page = $this->learn_m
					->where($table.'.wid','=',$wid)
					->where($table.'.path','=',$path)
					->where($table.'.public','>',-1)
					->first();

		if($page)
		{

			$path_ids = explode('.',$page->path_ids);
			$crumbs = $this->learn_m
								->whereIn('id',$path_ids)
								->get();

			$childrens = $this->learn_m
								->where($table.'.path','LIKE',$path.$wid.'/')
								->where($table.'.title','NOT LIKE','')
								->where($table.'.public','>',0)
                                ->orderBy($table.'.order', 'asc')
								->orderBy($table.'.updated_at', 'desc')
								->paginate(50);

			$user = $this->user;
			$order = null;

			if($user) {
				$order = $order_m->whereProductId($page->id)->whereUserId($user->id)->where('status','>',-5)->first();
			}
            $marks = MarkResource::where('type_resource', 3)->where('id_resource', $page->id)->get();
			if($childrens->total()) return view('c.learn.index', compact('page', 'childrens', 'crumbs', 'user', 'marks'));

			$view = 'c.learn.show';
			if($page->pack && view()->exists($view . '_' . $page->pack)) {
				$view = $view . '_' . $page->pack;
			}

			return view($view, compact('page', 'crumbs', 'order', 'user', 'marks'));
		}
		else
		{
			abort(404);
		}

	}

    /**
     * Display a Learn Main Page.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexHome()
    {
		$table = $this->learn_m->getTable();

		$page = $this->learn_m
					->where($table.'.wid','=','')
					->where($table.'.path','=','')
					->first();

		if($page)
		{
			$childrens = $this->learn_m
								->where($table.'.path','LIKE','/')
								->where($table.'.title','NOT LIKE','')
								->orderBy($table.'.created_at', 'desc')
								->paginate(20);

			$user = $this->user;
			$order = [];
            $marks = MarkResource::where('type_resource', 3)->where('id_resource', $page->id)->get();

			return view('c.learn.home', compact('page', 'childrens', 'user', 'marks'));
		}
		else
		{
			abort(404);
		}

    }

    public function sendQuestion(Request $request)
    {
        Mail::send('emails.sendQuestion', ['data' => $request], function ($m) {
            $m->to('info@iteam.ru', 'Iteam')->subject('Вопросы по мастер классу');
        });
        return \redirect()->back();
    }

    public function sendReview(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'message' => 'required|min:10',
            'name' => 'required|min:3'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

//        $review = new Review();
//        $review->fill($request->all());
//        $review->save();
        $response = new Response();
        $response->author_name = $request->name;
        $response->company_info = $request->company;
        $response->author_info = $request->position;
        $response->text = $request->message;
        $response->public = 0;
        $response->save();

        $learns = Learn::where('public', 1)->get()->random(3);

        $mklass = '';
        foreach ($learns as $learn) {
            $mklass .= "<div class='col-md-4'><img src='" . $learn->img . "' alt='' style='width: 100%'><a href='" . url('learn' . $learn->path . $learn->wid) . "' style='text-align: center;' target=\"_blank\">" . $learn->title . "</a></div>";
        }

        return $mklass;
    }

    public function test(UploadController $upl)
    {
		dd($upl->ret());
	}

    public function verstka()
    {
        return view('c.learn.ebna-verstka');
	}

    public function example1()
    {
        return view('c.learn.example-1');
	}

    public function example2()
    {
        return view('c.learn.example-2');
    }
    protected function newWebinarIndex()
    {
        return view("c.learn.webinar");
    }
    protected function newCourseIndex()
    {
        return view("c.learn.course");
    }

}
