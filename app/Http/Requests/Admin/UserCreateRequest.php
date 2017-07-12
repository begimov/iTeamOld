<?php namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

class UserCreateRequest extends Request {

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'firstname' => 'required',
			'phone' => 'required|min:7',
			'username' => 'min:2|max:32|alpha_dash|unique:users',
			'email' => 'required|email|max:255|unique:users',
			'password' => 'required|min:6|max:32|regex:/^[a-zA-Z0-9_~!@#$%^&\*\.-]+$/|confirmed',
		];
	}
	
	public function response(array $errors)
	{
		$_redirector = $this->input('_redirect') ? $this->redirector->to($this->input('_redirect')) : ($errors ? $this->redirector->back() : $this->redirector->route('register'));
		return $_redirector
				 ->with('error','Проверьте поля формы регистрации')
				 ->with('collapse','in')
				 ->withInput($this->except($this->dontFlash))
				 ->withErrors($errors, $this->errorBag);
	}

}
