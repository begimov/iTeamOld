<?php namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Response;

class ResponseController extends Controller
{
    protected $user;

    public function __construct()
    {
        $this->user = Auth::user();
    }
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
			$responses = Response::with(['author','learn'])->where('public','>',0)->orderBy('published_at','desc')->paginate(50);
			$learn_title = true;
			return view('site.company.response.index',compact('responses','learn_title'));
	}
    public function show(Request $request, $id)
    {
			$page = Response::with(['author','learn'])->where('public','>',-1)->findOrFail($id);
			return view('site.product.response',compact('page'));
	}
	
    public function showByLearnId($learn_id = 0)
    {
			$responses = Response::with(['author','learn'])->where('learn_id','=',$learn_id)->get();
			$learn_title = false;
			return view('site.company.response.loop',compact('responses','learn_title'));
	}

}