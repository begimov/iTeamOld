<?php namespace App\Http\Controllers\Auth;

use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Foundation\Auth\ThrottlesLogins;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Requests\Auth\ConfirmRequest;

use App\Repositories\UserRepository;

use App\Models\User;
use App\Models\Role;

use App\Jobs\SendMail;

use Validator;
use Mail;
#use Socialite;

class AuthController extends Controller
{

	use AuthenticatesAndRegistersUsers, ThrottlesLogins;

	/**
	 * Create a new authentication controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest', ['except' => ['getLogout','getOldi','getProfile']]);
		$this->middleware('ajax', ['only' => ['postAuthAjax','postLoginAjax','postRegisterAjax']]);
	}


	public function getAuth()
	{
		return view('auth.auth');
	}
	public function checkAuth(Request $request, $email = '')
	{
		$out = [];
		if($email && strrpos($email,'@',2)){
			$users = User::where('email','LIKE',$email.'%')->select('email')->take(3)->get();
			if($users){
				$out["query"] = "Unit";
				foreach($users AS $user) $out["suggestions"][] = $user->email;
			}
		}
		return response()->json($out);
	}
	public function postAuth(Request $request)
	{

		$out = ['msg'=>'','error'=>true,'sendmail'=>false,'redirect'=>false];

		$email = $request->input('email') ? $request->input('email') : false;
		$out['redirect'] = $request->input('_redirect') ? $request->input('_redirect') : false;
		$password = $request->input('password') ? $request->input('password') : false;

		if($email){

			$user = User::where('email','LIKE',$email)->select('id', 'email', 'username', 'role_id', 'firstname', 'name', 'confirmed', 'password')->first();
			if($user){

				$uname = $user->firstname ? $user->firstname : ($user->name ? $user->name : $user->username);

				if($password) {

					if(!$this->validate(['email'=>$email, 'password'=>$password])) {

						$out['msg'] = 'Пароль неверный. Попробуйте войти через Email.';
						$out['redirect'] = false;
					}
					else {
						//$user = $auth->getLastAttempted();

						if($user->id) {

							$auth->login($user, true);
							#MAIL Выполнен вход

							if($request->session()->has('user_id'))	{
								$request->session()->forget('user_id');
							}
							$request->session()->put('user_id', $user->id);

							$role = Role::where('id', $user->role_id)->select('slug')->first();
							$request->session()->put('statut', $role->slug);

							if(!$user->confirmed) $user->confirmed = 1;
							$user->confirmation_code = null;
							$user->save();

							$out['error'] = false;

							$out['msg'] = 'Добро пожаловать, '.$uname.'!';
						}

					}

				}
				else {

					$user->confirmation_code = str_random(30);
					$user->save();
					$out['sendmail'] = Mail::send('emails.auth.template', ['title'=>'Быстрый вход','text'=>'Здравствуйте, '.$user->username.'! Чтобы прямо сейчас войти на iTeam, кликните по ссылке ниже:<br><center><a class="btn" href="'.route('email.get',['email'=>$user->email, 'confirm'=>$user->confirmation_code]) . ($out['redirect'] ? '?_redirect='.$out['redirect'] : '').'">Ссылка для входа</a></center><br><small>Ссылка действительна до '.date('H:i d.m.Y',time()+60*60).'</small>'], function ($m) use ($user) {
						$m->to($user->email, $user->username)->subject('Ссылка для входа на iTeam');
					});
					$out['error'] = false;

					$out['msg'] = 'Проверьте Ваш почтовый ящик: Вам отправлено письмо со ссылкой для входа';
				}
			}
			else {

				$user = new User;

				$name = $request->input('name') ? $request->input('name') : false;
				$phone = $request->input('phone') ? $request->input('phone') : false;
				$username = $request->input('login') ? $request->input('login') : false;

				if(!$username) {

					$parse_email = explode('@', $email);
					$username = array_shift( $parse_email );

					$check_username = $user->where('username','LIKE',$username)->first();
					if($check_username) $username .= '_'. substr( md5(time()), 2, 4);

				}

				if(!$password) {
					$password = substr( crypt( md5( time() . $username ) , time() ), 2, 6);
					$out['error'] = false;
				}
				else {

					if(strlen($password) < 6) {
						$out['msg'] = 'Пароль должен быть > 6 символов';
					}
					elseif(strlen($password) > 32) {
						$out['msg'] = 'Пароль должен быть < 32 символов';
					}
					elseif(preg_match('/^[a-zA-Z0-9_~!@#$%^&\*\.-]+$/', $password) > 32) {
						$out['msg'] = 'Пароль должен содержать только латинские буквы, цифры или символы _~!@#$%^&*.-';
					}
					else {
						$out['error'] = false;
					}
				}

				if(!$out['error']) {

					$user->email = $email;
					$user->username = $username;
					$user->password = bcrypt($password);

					if($name) $user->name = $name;
					if($phone) $user->phone = $phone;

					$role = Role::where('slug', 'user')->select('id')->first();
					$user->role_id = $role->id;
					$user->confirmation_code = str_random(30);
					$user->save();

					$out['sendmail'] = Mail::send('emails.auth.template', ['title'=>'Быстрая Регистрация','text'=>'Здравствуйте, '.$user->username.'! Чтобы прямо сейчас войти на iTeam, кликните по ссылке ниже:<br><center><a class="btn" href="'.url('auth/email/'.$user->email.'/'.$user->confirmation_code . ($out['redirect'] ? '?_redirect='.$out['redirect'] : '')).'">Ссылка для входа</a></center><br><small>Ссылка действительна до '.date('H:i d.m.Y',time()+60*60).'</small><br><hr><br>В дальнейшем Вы можете использовать <a href="'.url('i').'">вход по паролю</a>.<br>Ваш пароль: <b>'.$password.'</b><br>'], function ($m) use ($user) {
						$m->to($user->email, $user->username)->subject('Ссылка для входа на iTeam');
					});

					$out['msg'] = 'Проверьте Ваш почтовый ящик: Вам отправлено письмо со ссылкой для входа';

				}

			}

		}
		else {
			$out['msg'] = 'Укажите корректный Email';
		}

		$redirect = ($out['redirect']) ? redirect($out['redirect']) : redirect()->back();
		return ($out['error']) ? $redirect->with('error',$out['error'])->withInput() : (($out['msg']) ? $redirect->with('status',$out['msg']) : $redirect);
	}

	public function postAuthAjax(Request $request, Guard $auth)
	{
		if($request->ajax()) {

			$out = ['msg'=>'','error'=>true,'sendmail'=>false,'redirect'=>false];

			$email = $request->input('email') ? $request->input('email') : false;
			$out['redirect'] = $request->input('_redirect') ? $request->input('_redirect') : false;
			$password = $request->input('password') ? $request->input('password') : false;

			if($email){

				$user = User::where('email','LIKE',$email)->select('id', 'email', 'username', 'role_id', 'firstname', 'name', 'confirmed', 'password')->first();
				if($user){

					$uname = $user->firstname ? $user->firstname : ($user->name ? $user->name : $user->username);

					if($password) {

						if(!$auth->validate(['email'=>$email, 'password'=>$password])) {

							$out['msg'] = 'Пароль неверный. Попробуйте войти через Email.';
							$out['redirect'] = false;
						}
						else {

							if($user->id) {

								$auth->login($user, true);
								#MAIL Выполнен вход

								if($request->session()->has('user_id'))	{
									$request->session()->forget('user_id');
								}
								$request->session()->put('user_id', $user->id);

								$role = Role::where('id', $user->role_id)->select('slug')->first();
								$request->session()->put('statut', $role->slug);

								if(!$user->confirmed) $user->confirmed = 1;
								$user->confirmation_code = null;
								$user->save();

								$out['error'] = false;
							}

						}

					}
					else {

						$user->confirmation_code = str_random(30);
						$user->save();
						$out['sendmail'] = Mail::send('emails.auth.template', ['title'=>'Быстрый вход','text'=>'Здравствуйте, '.$user->username.'! Чтобы прямо сейчас войти на iTeam, кликните по ссылке ниже:<br><center><a class="btn" href="'.route('email.get',['email'=>$user->email, 'confirm'=>$user->confirmation_code]) . ($out['redirect'] ? '?_redirect='.$out['redirect'] : '').'">Ссылка для входа</a></center><br><small>Ссылка действительна до '.date('H:i d.m.Y',time()+60*60).'</small>'], function ($m) use ($user) {
							$m->to($user->email, $user->username)->subject('Ссылка для входа на iTeam');
						});
						$out['error'] = false;
						$out['msg'] = 'Вам на Email направлено письмо со ссылкой для авторизованного входа на сайт. В личном кабинете Вы можете установить новый пароль';
					    $out['redirect'] = false;
					}
				}
				else {

					$user = new User;

					$name = $request->input('name') ? $request->input('name') : false;
					$phone = $request->input('phone') ? $request->input('phone') : false;
					$username = $request->input('login') ? $request->input('login') : false;

					if(!$username) {

						$parse_email = explode('@', $email);
						$username = array_shift( $parse_email );

						$check_username = $user->where('username','LIKE',$username)->first();
						if($check_username) $username .= '_'. substr( md5(time()), 2, 4);

					}

					if(!$password) {
						$password = substr( crypt( md5( time() . $username ) , time() ), 2, 6);
						$out['error'] = false;
					}
					else {

						if(strlen($password) < 6) {
							$out['msg'] = 'Пароль должен быть > 6 символов';
						}
						elseif(strlen($password) > 32) {
							$out['msg'] = 'Пароль должен быть < 32 символов';
						}
						elseif(preg_match('/^[a-zA-Z0-9_~!@#$%^&\*\.-]+$/', $password) > 32) {
							$out['msg'] = 'Пароль должен содержать только латинские буквы, цифры или символы _~!@#$%^&*.-';
						}
						else {
							$out['error'] = false;
						}
					}

					if(!$out['error']) {

						$user->email = $email;
						$user->username = $username;
						$user->password = bcrypt($password);

						if($name) $user->name = $name;
						if($phone) $user->phone = $phone;

						$role = Role::where('slug', 'user')->select('id')->first();
						$user->role_id = $role->id;
						$user->confirmation_code = str_random(30);
						$user->save();

						$out['sendmail'] = Mail::send('emails.auth.template', ['title'=>'Быстрая регистрация','text'=>'Здравствуйте, '.$user->username.'! Чтобы прямо сейчас войти на iTeam, кликните по ссылке ниже:<br><center><a class="btn" href="'.url('auth/email/'.$user->email.'/'.$user->confirmation_code . ($out['redirect'] ? '?_redirect='.$out['redirect'] : '')).'">Ссылка для входа</a></center><br><small>Ссылка действительна до '.date('H:i d.m.Y',time()+60*60).'</small><br><hr><br>В дальнейшем Вы можете использовать <a href="'.url('i').'">вход по паролю</a>.<br>Ваш пароль: <b>'.$password.'</b><br>'], function ($m) use ($user) {
							$m->to($user->email, $user->username)->subject('Ссылка для входа на iTeam');
						});

                        // Уведомление администратору
                        Mail::send('emails.auth.template', ['title'=> 'Зарегестрирован новый пользователь','text'=>'Пользователь , '.$user->username.' зарегестрирован на сайте. <small>Время регистрации '.date('H:i d.m.Y',time()+60*60).'</small>'], function ($message) {
                            $message->to('info@iteam.ru', 'Admin')->subject('Новый пользователь');
                        });

					}

				}

			}
			else {
				$out['msg'] = 'Укажите корректный Email';
			}

			return response()->json( $out );
//			return response()->with( 'status' , 'Вам на Email направлено письмо со ссылкой для авторизованного входа на сайт. В личном кабинете Вы можете установить новый пароль');
		}
		else return redirect()->route('home');
	}



	public function authEmail(Request $request, $email='', $confirm='')
	{
		$redirect = $request->input('_redirect') ? redirect($request->input('_redirect')) : false;
		if(Auth()->user()) return $redirect ? $redirect->with('status','Добро пожаловать!') : redirect()->route('profile')->with('status','Добро пожаловать!');

		if(!$email && $request->input('email')) $email = $request->input('email');
		elseif($email && !$request->input('email')) $request->email = $email;
		if(!$confirm && $request->input('confirm')) $confirm = $request->input('confirm');
		elseif($confirm && !$request->input('confirm')) $request->confirm = $confirm;

		if(!$redirect) $redirect = redirect()->route('email.get');//redirect()->back()

		if($email && $confirm) {

			$user = User::where('email','=',$email)->select('id','email','username','role_id','confirmed','confirmation_code','updated_at')->first();
			if(!$user) {

				$user = new User;

				$name = $request->input('name') ? $request->input('name') : false;
				$phone = $request->input('phone') ? $request->input('phone') : false;
				$username = $request->input('login') ? $request->input('login') : false;
				$password = $request->input('password') ? $request->input('password') : false;

				if(!$username) {
					$parse_email = explode('@', $email);
					$username = array_shift( $parse_email );

					$check_username = $user->where('username','LIKE',$username)->first();
					if($check_username) $username .= '_'. substr( md5(time()), 2, 4);

				}

				if(!$password) {
					$password = substr( crypt( md5( time() . $username ) , time() ), 2, 6);
				}

				$user->email = $email;
				$user->username = $username;
				$user->password = bcrypt($password);

				if($name) $user->name = $name;
				if($phone) $user->phone = $phone;

				$role = Role::where('slug', 'user')->select('id')->first();
				$user->role_id = $role->id;
				$user->confirmation_code = str_random(30);
				$user->save();

				$send = Mail::send('emails.auth.template', ['title'=>'Быстрая регистрация','text'=>'Здравствуйте, '.$user->username.'! Чтобы прямо сейчас войти на iTeam, кликните по ссылке ниже:<br><center><a class="btn" href="'.route('email.get',['email'=>$user->email, 'confirm'=>$user->confirmation_code]).'">Ссылка для входа</a></center><br><small>Ссылка действительна до '.date('H:i d.m.Y',time()+60*60).'</small><br><hr><br>В дальнейшем Вы можете использовать <a href="'.url('i').'">вход по паролю</a>.<br>Ваш пароль: <b>'.$password.'</b><br>'], function ($m) use ($user) {
					$m->to($user->email, $user->username)->subject('Ссылка для входа на iTeam');
				});

				return $redirect->with('status','Проверьте Ваш почтовый ящик: Вам отправлено письмо со ссылкой для входа');


			}
			elseif($user->confirmation_code === $confirm) {
				if((time()-strtotime($user->updated_at)) > 60*60) {
					$user->confirmation_code = str_random(30);
					$user->save();
					$send = Mail::send('emails.auth.template', ['title'=>'Быстрый вход','text'=>'Здравствуйте, '.$user->username.'! Чтобы прямо сейчас войти на iTeam, кликните по ссылке ниже:<br><center><a class="btn" href="'.route('email.get',['email'=>$user->email, 'confirm'=>$user->confirmation_code]).'">Ссылка для входа</a></center><br><small>Ссылка действительна до '.date('H:i d.m.Y',time()+60*60).'</small>'], function ($m) use ($user) {
								$m->to($user->email, $user->username)->subject('Ссылка для входа на iTeam');
							});
					return $redirect->with('error','Код подтверждения устарел. Проверьте Ваш почтовый ящик: Вам отправлено письмо с новой ссылкой для входа');
				}
				else {

					Auth()->login($user, true);
					#MAIL Выполнен вход

					if($request->session()->has('user_id'))	{
						$request->session()->forget('user_id');
					}
					$request->session()->put('user_id', $user->id);

					$role = Role::where('id', $user->role_id)->select('slug')->first();
					$request->session()->put('statut', $role->slug);

					if(!$user->confirmed) $user->confirmed = 1;
					$user->confirmation_code = null;
					$user->save();

					return $redirect->with('status','Добро пожаловать, '.$user->username);

				}
			}
			else {
				$user->confirmation_code = str_random(30);
				$save = $user->save();

				$send = Mail::send('emails.auth.template', ['title'=>'Быстрый вход','text'=>'Здравствуйте, '.$user->username.'! Чтобы прямо сейчас войти на iTeam, кликните по ссылке ниже:<br><center><a class="btn" href="'.route('email.get',['email'=>$user->email, 'confirm'=>$user->confirmation_code]).'">Ссылка для входа</a></center><br><small>Ссылка действительна до '.date('H:i d.m.Y',time()+60*60).'</small>'], function ($m) use ($user) {
							$m->to($user->email, $user->username)->subject('Ссылка для входа на iTeam');
						});
				return $redirect->with('error','Код подтверждения не совпадает. Проверьте Ваш почтовый ящик: Вам отправлено письмо с новой ссылкой для входа');
			}

		}

		return view('auth.byemail');

	}



	public function authEmailPost(Request $request, $email='', $confirm='')
	{

		$redirect = $request->input('_redirect') ? redirect($request->input('_redirect')) : false;
		if(Auth()->user()) return $redirect ? $redirect->with('status','Добро пожаловать!') : redirect()->route('profile')->with('status','Добро пожаловать!');

		if(!$email && $request->input('email')) $email = $request->input('email');
		elseif($email && !$request->input('email')) $request->email = $email;
		if(!$confirm && $request->input('confirm')) $confirm = $request->input('confirm');
		elseif($confirm && !$request->input('confirm')) $request->confirm = $confirm;

		if(!$redirect) $redirect = redirect()->route('email.get');//redirect()->back()

		$this->validate(	$request,
							[	'email' => 'required|email',
								'phone' => 'min:7',
								'username' => 'min:2|max:32|regex:/^[a-zA-Z0-9_\.-]+$/',
								'password' => 'min:6|max:32|regex:/^[a-zA-Z0-9_~!@#$%^&\*\.-]+$/',
							],
							[	'email.required' => 'Не указан Email',
								'email.email' => 'Введите корректный Email',
								'phone.min' => 'Телефон не может содержать менее 7 символов',
								'username.min' => 'Логин не может содержать менее 2 символов',
								'username.max' => 'Логин не может содержать более 32 символов',
								'username.regex' => 'Логин должен содержать только латинские буквы, цифры или символы _.-',
								'password.min' => 'Пароль не может содержать менее 6 символов',
								'password.max' => 'Пароль не может содержать более 32 символов',
								'password.regex' => 'Пароль должен содержать только латинские буквы, цифры или символы _~!@#$%^&*.-',
							]);
							#$validator = Validator::make($request->all(), ['email' => 'required|email',]);
							#if ($validator->fails()) {return redirect()->back()->withErrors($validator)->withInput();				}


		$user = User::where('email','=',$email)->select('id','email','username','role_id','confirmed','confirmation_code','updated_at')->first();
		if(!$user) {

			$user = new User;

			$name = $request->input('name') ? $request->input('name') : false;
			$phone = $request->input('phone') ? $request->input('phone') : false;
			$username = $request->input('login') ? $request->input('login') : false;
			$password = $request->input('password') ? $request->input('password') : false;

			if(!$username) {
				$parse_email = explode('@', $email);
				$username = array_shift( $parse_email );

				$check_username = $user->where('username','LIKE',$username)->first();
				if($check_username) $username .= '_'. substr( md5(time()), 2, 4);

			}

			if(!$password) {
				$password = substr( crypt( md5( time() . $username ) , time() ), 2, 6);
			}

			$user->email = $email;
			$user->username = $username;
			$user->password = bcrypt($password);

			if($name) $user->name = $name;
			if($phone) $user->phone = $phone;

			$role = Role::where('slug', 'user')->select('id')->first();
			$user->role_id = $role->id;
			$user->confirmation_code = str_random(30);
			$user->save();

			$send = Mail::send('emails.auth.template', ['title'=>'Быстрая регистрация','text'=>'Здравствуйте, '.$user->username.'! Чтобы прямо сейчас войти на iTeam, кликните по ссылке ниже:<br><center><a class="btn" href="'.route('email.get',['email'=>$user->email, 'confirm'=>$user->confirmation_code]).'">Ссылка для входа</a></center><br><small>Ссылка действительна до '.date('H:i d.m.Y',time()+60*60).'</small><br><hr><br>В дальнейшем Вы можете использовать <a href="'.url('i').'">вход по паролю</a>.<br>Ваш пароль: <b>'.$password.'</b><br>'], function ($m) use ($user) {
				$m->to($user->email, $user->username)->subject('Ссылка для входа на iTeam');
			});

			return $redirect->with('status','Проверьте Ваш почтовый ящик: Вам отправлено письмо со ссылкой для входа');


		}
		elseif($user->confirmation_code === $confirm) {

			if((time()-strtotime($user->updated_at)) > 60*60) {

				$user->confirmation_code = str_random(30);
				$user->save();
				$send = Mail::send('emails.auth.template', ['title'=>'Быстрый вход','text'=>'Здравствуйте, '.$user->username.'! Чтобы прямо сейчас войти на iTeam, кликните по ссылке ниже:<br><center><a class="btn" href="'.route('email.get',['email'=>$user->email, 'confirm'=>$user->confirmation_code]).'">Ссылка для входа</a></center><br><small>Ссылка действительна до '.date('H:i d.m.Y',time()+60*60).'</small>'], function ($m) use ($user) {
							$m->to($user->email, $user->username)->subject('Ссылка для входа на iTeam');
						});
				return $redirect->with('error','Код подтверждения устарел. Проверьте Ваш почтовый ящик: Вам отправлено письмо с новой ссылкой для входа');

			}
			else {

				$auth->login($user, true);
				#MAIL Выполнен вход

				if($request->session()->has('user_id'))	{
					$request->session()->forget('user_id');
				}
				$request->session()->put('user_id', $user->id);

				$role = Role::where('id', $user->role_id)->select('slug')->first();
				$request->session()->put('statut', $role->slug);

				if(!$user->confirmed) $user->confirmed = 1;
				$user->confirmation_code = null;
				$user->save();

				return $redirect->with('status','Добро пожаловать, '.$user->username);

			}
		}
		else {
			$user->confirmation_code = str_random(30);
			$save = $user->save();

			$send = Mail::send('emails.auth.template', ['title'=>'Быстрый вход','text'=>'Здравствуйте, '.$user->username.'! Чтобы прямо сейчас войти на iTeam, кликните по ссылке ниже:<br><center><a class="btn" href="'.route('email.get',['email'=>$user->email, 'confirm'=>$user->confirmation_code]).'">Ссылка для входа</a></center><br><small>Ссылка действительна до '.date('H:i d.m.Y',time()+60*60).'</small>'], function ($m) use ($user) {
						$m->to($user->email, $user->username)->subject('Ссылка для входа на iTeam');
					});

			if($confirm) return $redirect->with('error','Код подтверждения не совпадает. Проверьте Ваш почтовый ящик: Вам отправлено письмо с новой ссылкой для входа');
			return $redirect->with('status','Проверьте Ваш почтовый ящик: Вам отправлено письмо со ссылкой для входа');
		}

	}



	public function getLogout()
	{
		Auth()->logout();
		return redirect()->back()->with('status', 'До встречи');
	}

    public function getProfile(Request $request, Guard $auth)
    {
        if(($user = $auth->user()) && $user->id){
			//$redirect = (@$request->input('redirect')) ? $request->input('redirect') : '';
			//return redirect('/i' . $redirect);

			#return redirect('/i' . $user->username);
			return '/i/#' . $user->username;

		}
		else return $this->showLoginForm();
    }

	/**
	 * Handle a login request to the application.
	 *
	 * @param  App\Http\Requests\LoginRequest  $request
	 * @param  Guard  $auth
	 * @return Response
	 */
	public function postLogin(
		LoginRequest $request,
		Guard $auth)
	{

//	    dd(\Session::get('key'));
		$logValue = $request->input('log');

		$_redirect = $request->input('_redirect');
        $_redirect = \Session::get('_redirect');
		$logAccess = filter_var($logValue, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        $throttles = in_array(
            ThrottlesLogins::class, class_uses_recursive(get_class($this))
        );

        if ($throttles && $this->hasTooManyLoginAttempts($request)) {
			return redirect($_redirect ? $_redirect : '/auth/login')
				->with('error', trans('front/login.maxattempt'))
				->withInput($request->only('log'));
        }


		$user_id = 0;
		if($request->session()->has('olduser_email'))	{

			$user_m = new User;
			//$check_user = $user_m->whereEmail($request->input('log'))->first();
			$check_user = $user_m->whereEmail($request->session()->get('olduser_email'))->first();

			if($check_user && ( $check_user->old_password === md5(  md5($request->input('password') ) . $check_user->salt ) ) ) {
				$user = $check_user;
				$user_id = $user->id;

				$request->session()->forget('olduser_email');

				$user->password = bcrypt($request->input('password'));
				$user->customer_type = 'UPD';
				$user->visited_at = date('Y-m-d H:i:s');
				#
				$user->save();
			}

		}

		if(!$user_id){

			$credentials = [
				$logAccess  => $logValue,
				'password'  => $request->input('password')
			];

			if(!$auth->validate($credentials)) {

				if ($throttles) {
					$this->incrementLoginAttempts($request);
				}

				return redirect($_redirect ? $_redirect : '/auth/login')
					->with('error', trans('front/login.credentials'))
					->withInput($request->only('log'));
			}

			$user = $auth->getLastAttempted();

		}

		//if($user->confirmed) {

		if($user->id) {
			if ($throttles) {

                $this->clearLoginAttempts($request);
            }

			// dd($auth->loginUsingId($user->id));
			$auth->login($user, $request->has('memory'));

			#MAIL Выполнен вход

			if($request->session()->has('user_id'))	{
				$request->session()->forget('user_id');
			}

			return redirect($_redirect ? $_redirect : '/i');
		}

		$request->session()->put('user_id', $user->id);

		return redirect($_redirect ? $_redirect : '/auth/login')->with('error', trans('front/verify.again'));
	}


	/**
	 * Handle a login request to the application.
	 *
	 * @param  App\Http\Requests\LoginRequest  $request
	 * @param  Guard  $auth
	 * @return Response
	 */
	public function postLoginAjax(LoginRequest $request, Guard $auth)
	{
					/*

					if($request->ajax()) {
						return response()->json([
							'view' => view('back.posts.table', compact('posts'))->render(),
							'links' => e($links)
						]);
					}

					$post = $this->post->find($id);
					#$this->authorize('change', $post);
					$this->post->updateActive($request->all(), $id);
					return response()->json();
					*/

		if($request->ajax()){

			if($auth->user()) return response()->json('уже залогинен');
			#return response()->json($request->input('log'));

			$logValue = $request->input('log');
			$logAccess = filter_var($logValue, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

			$throttles = in_array(
				ThrottlesLogins::class, class_uses_recursive(get_class($this))
			);

			if ($throttles && $this->hasTooManyLoginAttempts($request)) {
				return response()->json(['error1', trans('front/login.maxattempt')]);
			}

			$credentials = [
				$logAccess  => $logValue,
				'password'  => $request->input('password')
			];

			if(!$auth->validate($credentials)) {
				if ($throttles) {
					$this->incrementLoginAttempts($request);
				}

				return response()->json(['error2', trans('front/login.credentials')]);
			}

			$user = $auth->getLastAttempted();

			if($user->confirmed) {
				if ($throttles) {
					$this->clearLoginAttempts($request);
				}

				$auth->login($user, $request->has('memory'));

				if($request->session()->has('user_id'))	{
					$request->session()->forget('user_id');
				}

				return response()->json('ok');
			}

			$request->session()->put('user_id', $user->id);

			return response()->json(['error3', trans('front/verify.again')]);

		}
		else abort(404);

	}


	/**
	 * Handle a registration request for the application.
	 *
	 * @param  App\Http\Requests\RegisterRequest  $request
	 * @param  App\Repositories\UserRepository $user_gestion
	 * @return Response
	 */
	public function postRegister(
		RegisterRequest $request,
		User $user_m,
		Guard $auth)
	{

		$_redirect = $request->input('_redirect');
		$_redirect = \Session::get('_redirect');
		$fields = $request->all();
		if(!$fields['username']) {
			$parse_email = explode('@', $fields['email']);
			$fields['username'] = array_shift( $parse_email );

			$check_username = $user_m->where('username','LIKE',$fields['username'])->first();
			if($check_username) $fields['username'] .= '_'. substr( md5(time()), 2, 4);

		}
		if(!$fields['password']) {
			$fields['password'] = substr( crypt( md5( time() . $fields['username'] ) , time() ), 2, 6);
		}

		$user = $user_m;

		$user->password = bcrypt($fields['password']);
		$user->confirmed = true;
			//$user->confirmation_code = str_random(30);
		$user->email = trim($fields['email']);
		$user->phone = preg_replace('/[^0-9]/', '', $fields['phone']);
		$user->firstname = trim($fields['firstname']);
		$user->username = trim($fields['username']);
		#$user->subscribed = $fields['subscribed'];

		$role = new Role();
		$role_user = $role->where('slug', 'user')->first();
		$user->role_id = $role_user->id;

		$user->save();

		$send = Mail::send('emails.auth.welcome', ['title' => 'Добро пожаловать, ' . $user->username, 'log' => $user->username, 'email' => $user->email, 'password' => $fields['password'], 'unsubscribe' => @$fields['subscribed'], 'confirmation_code' => $user->confirmation_code], function ($m) use ($user) {
			$m->to($user->email, $user->username)->subject('Спасибо за регистрацию, ' . $user->username);
		});

		$auth->login($user);

		if($request->session()->has('user_id'))	{
			$request->session()->forget('user_id');
		}
		$request->session()->put('user_id', $user->id);

		/*
		if($send->getReasonPhrase()==="OK") {
			return redirect()->back()->with('status', trans('front/verify.message'));
		}
		else {

		}
		*/

		#$this->dispatch(new SendMail($user));

			/*
			$Mailchimp = new Mailchimp();
			$Mailchimp->subscribe($user->email, $user->firstname, '');
			*/

		#return redirect()->route('profile')->with('status', trans('front/verify.message'));
		return redirect($_redirect ? $_redirect : '/i')->with('status', trans('front/verify.message'));
	}

	/**
	 * Handle a registration request for the application.
	 *
	 * @param  App\Http\Requests\RegisterRequest  $request
	 * @param  App\Repositories\UserRepository $user_gestion
	 * @return Response
	 */
	public function postRegisterAjax(
		RegisterRequest $request,
		User $user_m,
		UserRepository $user_gestion)
	{

		$fields = $request->all();
		if(!$fields['username']) {
			$parse_email = explode('@', $fields['email']);
			$fields['username'] = array_shift( $parse_email );
		}
		if(!$fields['password']) {
			$fields['password'] = substr( crypt( md5( time() . $fields['username'] ) , time() ), 2, 6);
		}
		//dd($fields);

		/*
		$user = $user_gestion->store(
			$fields,
			$confirmation_code = str_random(30)
		);
		*/
		$user = $user_m;

		$user->password = bcrypt($fields['password']);
		//$user->confirmed = true;
		$user->confirmation_code = str_random(30);
		$user->email = trim($fields['email']);
		$user->phone = preg_replace('/[^0-9]/', '', $fields['phone']);
		$user->firstname = trim($fields['firstname']);
		$user->username = trim($fields['username']);
		//$user->subscribed = $fields['subscribed'];

		$role = new Role();
		$role_user = $role->where('slug', 'user')->first();
		$user->role_id = $role_user->id;

		$user->save();

		$this->dispatch(new SendMail($user));

		return redirect()->route('home')->with('status', trans('front/verify.message'));
	}

	/**
	 * Handle a confirmation request.
	 *
	 * @return Response
	 */

	public function postConfirm(ConfirmRequest $request, User $user_m)
	{
		$user = $user_m->whereEmail($request->email)->firstOrFail();
		$user->confirmation_code = str_random(30);
		$user->save();
		$this->dispatch(new SendMail($user));

		return redirect('/auth/login')->with('status', trans('front/verify.resend'));

	}

	/**
	 * Handle a confirmation request.
	 *
	 * @param  App\Repositories\UserRepository $user_gestion
	 * @param  string  $confirmation_code
	 * @return Response
	 */
	public function getConfirm(User $user_m, Guard $auth, $confirmation_code = '')
	{
		if($confirmation_code) {

			$user = $user_m->whereConfirmationCode($confirmation_code)->first();
			if($user){

				$user->confirmed = true;
				$user->confirmation_code = null;
				$user->save();

				$auth->login($user, 1);
				if($auth->user()) return redirect()->route('profile')->with('status', trans('front/verify.success'));
				return redirect('/auth/login')->with('status', trans('front/verify.success'));
			}
			else {
				return redirect('/auth/confirm')->with('error', trans('front/verify.some-error'));
			}

		}
		else {

			/*
			if($user = Auth()->user()) {
				return view('auth.confirm');
			}
			else return redirect('/auth/login');
			*/
			//return 'This is confirm page';
			return view('auth.confirm');

		}
	}

	/**
	 * Handle a resend request.
	 *
	 * @param  App\Repositories\UserRepository $user_gestion
	 * @param  Illuminate\Http\Request $request
	 * @return Response
	 */
	public function getResend(
		UserRepository $user_gestion,
		Request $request)
	{

		$redirect = $request->input('_redirect') ? redirect($request->input('_redirect')) : redirect()->route('home');

		if($request->session()->has('user_id'))	{
			$user = $user_gestion->getById($request->session()->get('user_id'));

			$this->dispatch(new SendMail($user));

			return $redirect->with('status', trans('front/verify.resend'));
		}

		return $redirect;
	}

	/**
	 * Handle a resend request.
	 *
	 * @param  App\Repositories\UserRepository $user_gestion
	 * @param  Illuminate\Http\Request $request
	 * @return Response
	 */
	public function getOldi(
		Guard $auth,
		User $user_m,
		Request $request)
	{

	}

    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToGithub()
    {
        return Socialite::driver('github')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleGithubCallback()
    {
        $user = Socialite::driver('github')->user();
		//dd($user);
        // $user->token;
    }

    /**
     * Переустановка пароля старого юзера
     *
     * @return Response
     */
    public function resetOldPassword()
    {
		if(!session('toresetpsswrd')) return "error toresetpsswrd";

		return "Переустановка пароля старого юзера";
    }

}
