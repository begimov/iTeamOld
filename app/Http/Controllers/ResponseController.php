<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
#use \Illuminate\Support\Facades\Auth;

use App\Models\Response;
//use DB;

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
            $vid1 = Response::find(197);
            $vid2 = Response::find(198);

			$responses = Response::with(['author','learn'])->where('public','>',0)->orderBy('author_avatar','desc')->paginate(50);
			$learn_title = true;
			return view('c.company.response.index',compact('responses','learn_title', 'vid1', 'vid2'));
	}
    public function show(Request $request, $id)
    {
			$response = Response::with(['author','learn'])->where('public','>',-1)->findOrFail($id);
			return view('c.company.response.show',compact('response'));
	}
	
    public function showByLearnId($learn_id = 0)
    {
			$responses = Response::with(['author','learn'])->where('learn_id','=',$learn_id)->get();
			$learn_title = false;
			return view('c.company.response.loop',compact('responses','learn_title'));
	}

}