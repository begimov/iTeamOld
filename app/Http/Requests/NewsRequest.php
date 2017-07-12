<?php namespace App\Http\Requests;

use App\Models\News;

class NewsRequest extends Request {

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'title' => 'required|max:255',
			'intro' => 'required|max:65000',
			'text' => 'required|max:65000',
			//'wid' => 'required|unique:wid'
		];
	}

	public function messages()
	{
		return [
			'title.required' => 'Вы не указали заголовок!'
		];
	}


}