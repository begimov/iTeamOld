<?php namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

class UserRequest extends Request {

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		$id = $this->user->id;
		return [
			'email' => 'required|email|unique:users,email,' . $id,
			'username' => 'required|min:2|max:32|unique:users,username,' . $id,
			'phone' => 'numeric',
			'password' => 'min:6|max:32|regex:/^[a-zA-Z0-9_~!@#$%^&\*\.-]+$/|confirmed',
		];
	}
	
	public function messages()
	{
		return [
			'username.regex' => 'Только буквы, цифры и знаки -_','phone.numeric' => 'Только цифры! Напр. 89212223344',
		];
	}

}