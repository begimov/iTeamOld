<?php namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

class NewsCreateRequest extends Request {

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		#$parent_id = Request::input('parent_id');
		return [
			'title' => 'required',
		];
	}
	
	public function messages()
	{
		return [
			'title.required' => 'Заголовок обязателен',
		];
	}

}