<?php namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Site\UploadController;
#use UploadController;

use App\Http\Requests\ProfileRequest;

use App\Models\Order;
use App\Models\User;

class ProfileController extends Controller
{
    protected $user;

    public function __construct()
    {
        $this->user = Auth::user();
		$this->middleware('auth', ['except' => ['index']]);
    }

	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
		
		#return redirect('/learn')->with('status','bla bla bla bla bla bla bla ');
		/*
		if(1)
		{
			
			return 'view';#view('c.learn', compact('page', 'childrens', 'crumbs', 'user'));			
		}
		else
		{
			abort(404);
		}
		*/
		
		if($this->user && $this->user->id){

			#dd($this->user);
			#$content = '/i/#' . $this->user->username;
			
			$user = $this->user;
			
			$order_m = new Order;
			#$orders = [];
			$orders = $order_m->with('learn')->whereEmail($this->user->email)->orderBy('status','asc')->get();
			//dd($orders);
			return view('c.profile', compact('user','orders'));			
		
		}
		else {
			#dd($request);
			return redirect('auth/login');#$this->showLoginForm();
		}
		
	}

    public function postProfile(UploadController $upload, ProfileRequest $request, User $user_m)
    {
		$fields = $request->all();

		$user = $user_m->find($this->user->id);

		$errors = '';
		
		if($request->file('avatar')){
			$files = $upload->store($request, 'avatar');
			if($files['errors']) $errors = implode('<br>',$files['errors'][0]);
			if($files['files']) $user->avatar = $files['files'][0];
		}
		
		
		if(isset($fields['phone'])) $user->phone = preg_replace('/[^0-9]/', '', $fields['phone']);
		if(isset($fields['visible']) && !empty($fields['visible'])) {
			$visibles = array_keys($fields['visible']);
			$user->visible = implode('&',$visibles);
		}		
		$user->username = trim($fields['username']);
		
		$othres = ['firstname','lastname','about','contacts','company_name','entity_type','country','region','city','adress'];
		foreach($othres AS $o) if(isset($fields[$o]) && !empty($fields[$o])) $user->$o = $fields[$o];

		
		if(isset($fields['password'])) $user->password = bcrypt($fields['password']);
		
		$user->save();
		
		$redirect = $request->input('_redirect') ? redirect($request->input('_redirect')) : redirect()->back();
		
		if($errors) return $redirect->with('status', 'Профиль обновлён')->with('error', $errors);
		return $redirect->with('status', 'Профиль обновлён');
		
	}
	
}