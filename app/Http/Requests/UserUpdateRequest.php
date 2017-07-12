<?php namespace App\Http\Requests;

class UserUpdateRequest extends Request {

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		$id = $this->user->id;
		return $rules = [
			'username' => 'required|max:30|alpha_dash|unique:users,username,' . $id,
			'email' => 'required|email|unique:users,email,' . $id,
			'phone' => 'numeric',
			'password' => 'sometimes|confirmed|min:8'
		];
	}

}
