<?php namespace App\Http\Requests;

class UserCreateRequest extends Request {

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'username' => 'required|min:2|max:32|alpha_dash|unique:users',
			'email' => 'required|email|unique:users',
			'password' => 'required|min:6|max:32|regex:/^[a-zA-Z0-9_~!@#$%^&\*\.-]+$/|confirmed'
		];
	}

}