<?php namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

class ProjectRequest extends Request {

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'company_id' => 'required',
			'project_info' => 'required',
		];
	}
	
	public function messages()
	{
		return [
			'company_id.required' => 'Не указана компания',
			'project_info.required' => 'Описание проекта обязательно',
		];
	}

}