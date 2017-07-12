<?php namespace App\Http\Requests\Auth;

use App\Http\Requests\Request;

class ConfirmRequest extends Request {

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'email' => 'required|email|max:255|exists:users',
		];
	}

}
