<?php namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

class ArticleCreateRequest extends Request {

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
			//'intro' => 'required',
			//'text' => 'required',
			'parent_id' => 'required|exists:articles,id',
		];
	}
	
	public function messages()
	{
		return [
			'title.required' => 'Заголовок обязателен',
			//'intro.required' => 'Анонс обязателен',
			//'text.required' => 'Текст обязателен',
			'parent_id.required' => 'Категория обязательна',
			'parent_id.exists' => 'Категория не определена!',
		];
	}

}