<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Controllers\UploadController;

use App\Http\Requests\Admin\UserRequest;
use App\Http\Requests\Admin\UserCreateRequest;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\Order;
use App\Models\User;
use DB;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
		$user_m = new User;

		$status = $request->status ? $request->status : false;
		$search = $request->search ? $request->search : false;
		$daterange = $request->daterange ? $request->daterange : false;
		$order_by = $request->order_by ? $request->order_by : 'id';
		$sort_by = $request->sort_by ? $request->sort_by : 'desc';
		
		$users = $user_m->with('orders');
		
		if($search!==false){
			$users = $users->where(function ($query) use ($search) {
                $query->where('email','LIKE','%'.$search.'%')
                      ->orWhere('name','LIKE','%'.$search.'%')
                      ->orWhere('lastname','LIKE','%'.$search.'%')
                      ->orWhere('phone','LIKE','%'.$search.'%')
                      ->orWhere('company_name','LIKE','%'.$search.'%');
            });
		}
		
		if($daterange!==false){
			$dateranges = explode('-',$daterange);
			$startdate = isset($dateranges[0]) ? date("Y-m-d H:i:s",strtotime(trim($dateranges[0]))) : date("Y-m-d H:i:s",time()-(24*60*60-1));
			$enddate = isset($dateranges[1]) ? date("Y-m-d H:i:s",strtotime(trim($dateranges[1]))+(24*60*60-1)) : date("Y-m-d H:i:s",time()+(24*60*60-1));

			$users = $users->where(function ($query) use ($startdate,$enddate) {
                $query->where('created_at','>',$startdate)
                      ->where('created_at','<',$enddate);
            });
		}
		
		$users = $users->orderBy($order_by, $sort_by);
		$users = $users->paginate(50);

		$links = $users->appends([
									'search' => $request->search, 
									'daterange' => $request->daterange, 
									'order_by' => $request->order_by, 
									'sort_by' => $request->sort_by
								])->render();
			
		$order_by = ['ID'=>'id','Дата регистрации'=>'created_at','Email'=>'email'];

		return view('admin.user.index', compact('users', 'links', 'order_by'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$user = new User;
		return view('admin.user.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserCreateRequest $request)
    {
		$upload = new UploadController;
		$user = new User;
		
		$fields = $request->all();

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

		if(!$fields['username']) {
			$parse_email = explode('@', $fields['email']);
			$fields['username'] = array_shift( $parse_email );
			
			$check_username = $user->where('username','LIKE',$fields['username'])->first();
			if($check_username) $fields['username'] .= '_'. substr( md5(time()), 2, 4);
			
		}
		$user->username = trim($fields['username']);
		
		$othres = ['email','firstname','lastname','about','contacts','company_name','entity_type','country','region','city','adress','role_id'];
		foreach($othres AS $o) if(isset($fields[$o]) && !empty($fields[$o])) $user->$o = $fields[$o];
		
		if(isset($fields['password'])) $user->password = bcrypt($fields['password']);
		
		$user->save();
		
		if($errors) return redirect()->back()->withInput()->with('error', $errors);
		if(!$user->id) return redirect()->back()->withInput()->with('error', 'Не удалось создать пользователя');
		return redirect()->route("admin.user.show",[$user->id])->with('status', 'Пользователь создан');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
		#$user = User::find($id->id);
		$user_m = new User;
		$user = $user_m->with('orders')->find($id->id);
		return view('admin.user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //dd(explode(':',__METHOD__)[2] . ' ' . $id);
		return redirect()->route("admin.user.show",[$id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    #public function update(Request $request, $id)
    public function update(UserRequest $request, $id)
    {
		
		#UploadController $upload, User $user_m
		$upload = new UploadController;
		$user_m = new User;
		
		$fields = $request->all();

		$user = $user_m->find($id->id);

		$errors = '';
		
		if($request->file('avatar')){
			$files = $upload->store($request, 'avatar');
			if($files['errors']) $errors = implode('<br>',$files['errors'][0]);
			if($files['files']) $user->avatar = $files['files'][0];
		}
		
		//$user->avatar = '/filemanager/userfiles/user'.$this->user->id . '/200/' . $files['files'][0];
		/*
		if($rAvatar = $request->file('avatar')) {
			
			#dd($rAvatar);
			$id = $this->user->id;
			
			$fileName = md5($rAvatar->getFileName()).'.'.$rAvatar->extension();
			$destinationPath = 'filemanager/userfiles/user'.$id;
			if($rAvatar->move($destinationPath, $fileName)){
				$user->avatar = '/' . $destinationPath . '/' . $fileName;
			}
		}
		*/
		
		if(isset($fields['phone'])) $user->phone = preg_replace('/[^0-9]/', '', $fields['phone']);
		if(isset($fields['visible']) && !empty($fields['visible'])) {
			$visibles = array_keys($fields['visible']);
			$user->visible = implode('&',$visibles);
		}		
		$user->username = trim($fields['username']);
		
		$othres = ['firstname','lastname','about','contacts','company_name','entity_type','country','region','city','adress','role_id'];
		foreach($othres AS $o) if(isset($fields[$o]) && !empty($fields[$o])) $user->$o = $fields[$o];
		/*
		$user->lastname = $fields['lastname'];
		$user->about = $fields['about'];
		$user->contacts = $fields['contacts'];
		$user->company = $fields['company'];
		$user->details = $fields['details'];
		$user->country = $fields['country'];
		$user->region = $fields['region'];
		$user->city = $fields['city'];
		$user->adress = $fields['adress'];
		*/
		
		if(isset($fields['password'])) $user->password = bcrypt($fields['password']);
		
		$user->save();
		
		$redirect = $request->input('_redirect') ? redirect($request->input('_redirect')) : redirect()->back();
		
		if($errors) return $redirect->with('status', 'Профиль обновлён')->with('error', $errors);
		return $redirect->with('status', 'Профиль обновлён');
		
	}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		$user_m = new User;
		$user = $user_m->find($id->id);
		if(!$user) return redirect()->back()->with('error', 'Пользователь не найден');
		else {
			DB::table('_deleted_users')->insert($user->toArray());
			$user->delete();
			
			//$order_m = new Order;
			//$order = $order_m->whereUserId($id->id)->delete();
			
			return redirect()->route("admin.user.index")->with('status', 'Пользователь удалён');
		}
    }
}
