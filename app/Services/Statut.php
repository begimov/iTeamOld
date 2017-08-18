<?php namespace App\Services;

class Statut  {

	/**
	 * Set the login user statut
	 *
	 * @param  Illuminate\Auth\Events\Login $login
	 * @return void
	 */
	public function setLoginStatut($login)
	{
		// dd($login->user->role);
		if($login && $login->user && $login->user->role)
		{
			session()->put('statut', $login->user->role->slug);
		}
		// dd(session()->get('statut'));
	}

	/**
	 * Set the visitor user statut
	 *
	 * @return void
	 */
	public function setVisitorStatut()
	{
		session()->put('statut', 'visitor');
	}

	/**
	 * Set the statut
	 *
	 * @return void
	 */
	public function setStatut()
	{
		if(!session()->has('statut'))
		{
			session()->put('statut', auth()->check() ?  auth()->user()->role->slug : 'visitor');
		}
	}

}
