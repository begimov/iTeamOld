<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\RedirectResponse;

class OldUser {

	protected $auth;

	/**
	 * Create a new filter instance.
	 *
	 * @param  Guard  $auth
	 * @return void
	 */
	public function __construct(Guard $auth)
	{
		$this->auth = $auth;
	}

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
			
		/*
		если не залогинен, проверяем старые куки
		*/
		if(!$this->auth->check()) {
			
			/*
			если пока не хочет менять пароль или это НЕ установлена сессия страницы смены старого пароля
			*/
			if( !session('olduser_email') ) {
				
				$old_cookie_str = $request->header('cookie');
				$old_cookie_simple_array = explode('; ',$old_cookie_str);
				$old_cookie_array = [];
				foreach($old_cookie_simple_array AS $ocs) {
					$temp = explode('=',$ocs);
					if($temp && isset($temp[0]) && isset($temp[1])) $old_cookie_array[$temp[0]] = urldecode($temp[1]);
					$temp = null;
				}
				
				/*
				если есть старая кука goodbye, но нет новой, установим новую
				*/
				if(isset($old_cookie_array['goodbye']) && !session('goodbye')) {
					$request->session()->put("goodbye", $old_cookie_array['goodbye']);
				}
				
				/*
				если есть старый email
				*/
				if(isset($old_cookie_array['_email'])) {
					
					if(!session('olduser_email')) $request->session()->put("olduser_email", $old_cookie_array['_email']);
					if(!session('olduser_psswrd') && isset($old_cookie_array['_psswrd'])) $request->session()->put("olduser_psswrd", $old_cookie_array['_psswrd']);
					
					return $next($request);
					
				}
				else {
					return $next($request);
				}
			
			}
			else {
				
				return $next($request);
			}
			
		}
		else {
			
			/*
			чистим сессии
			1. если залогинен, но есть инфа о старых данных юзера
			*/
			
			if( session('olduser_email') ) {

				$request->session()->forget("olduser_email");
				if(session('olduser_psswrd')) $request->session()->forget("olduser_psswrd");
				if(session('olduser')) $request->session()->forget("olduser");
				
			}

			
			return $next($request);
		}
	}
}