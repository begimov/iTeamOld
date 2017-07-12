<?php namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Order;

class AdminController extends Controller {

    /**
     * The UserRepository instance.
     *
     * @var App\Repositories\UserRepository
     */
    protected $user;

    /**
     * Create a new AdminController instance.
     *
     * @param  App\Repositories\UserRepository $user_gestion
     * @return void
     */
    public function __construct()
    {
    }

	/**
	 *
     * @return Response
	 */
	public function index()
	{
		$user = Auth::user();
		$route = ($user->role_id > 1) ? 'admin.article.index' : 'admin.order.index';
		return redirect()->route($route);
	}
	
	/**
	 * Show the media panel.
	 *
     * @return Response
	 */
	public function filemanager()
	{
		$url = config('files.url') . '?langCode=' . config('app.locale');
		
		return view('admin.filemanager', compact('url'));

	}
	

	public function test()
	{
		/*
		$ords = Order::with('user')->where('status','>',-6)->get();
		foreach($ords AS $o){
			$save = false;
			if(!$o->name && @$o->user->name) {
				$o->name = $o->user->name;
				$save = true;
			}
			if(!$o->phone && @$o->user->phone) {
				$o->phone = $o->user->phone;
				$save = true;
			}
			if($save) $o->save();
		}
		*/
		return 'ok';

	}

}