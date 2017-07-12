<?php namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

class CompanyRequest extends Request {

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'company_name' => 'required',
			'company_logo_small' => 'file|image|mimes:jpeg,jpg,png,gif|max:200',
		];
	}
	
	public function messages()
	{
		return [
			'company_name.required' => 'Не указано название компании',
			'company_logo_small.image' => 'Можно загружать только изображения',
			'company_logo_small.mimes' => 'Можно загружать только изображения форматов jpeg,jpg,png,gif',
			'company_logo_small.max' => 'Превышен максимальный размер (200KB)',
		];
	}

}