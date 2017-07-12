<?php namespace App\Http\Requests\Auth;

use App\Http\Requests\Request;

class ResetPasswordRequest extends Request {

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'token' => 'required',
			'email' => 'required',
			'password' => 'required|min:6|max:32|regex:/^[a-zA-Z0-9_~!@#$%^&\*\.-]+$/|confirmed',
		];
	}

}
