<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;

class IsRedactor {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
	    //dd(session('statut'),gettype(session('statut')), session('statut') === 'аdmin',session('statut') === 'redac');
		if (session('statut') === 'admin' || session('statut') === 'redac' || session('statut') === 'аdmin')
		{
		    //dd();
			return $next($request);
		}
		//dd();
		return new RedirectResponse(url('/'));
	}

}