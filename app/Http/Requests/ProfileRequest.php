<?php namespace App\Http\Requests;

class ProfileRequest extends Request {

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		
		$id = Auth()->user()->id;
		return [
			#'username' => 'required|min:2|max:32|regex:/^([A-Za-z0-9_-])+$/i|unique:users,username,' . $id,
			'username' => 'required|min:2|max:32|unique:users,username,' . $id,
			#'firstname' => 'alpha',
			#'lastname' => 'alpha',
			//'avatar' => 'image|max:20971520|dimensions:min_width=100,min_height=100,max_width=1600,max_height=1600',
			'phone' => 'numeric',
			'password' => 'min:6|max:32|regex:/^[a-zA-Z0-9_~!@#$%^&\*\.-]+$/|confirmed',
		];
	}
	
	public function messages()
	{
		return [
			'username.regex' => 'Только буквы, цифры и знаки -_',
			'avatar.image' => 'Допустимые форматы: png,jpg,gif',
			'avatar.max' => 'Полный размер не должен превышать 20Мб',
			'avatar.dimensions' => 'Изображение должно иметь размер не меньше 100 и не больше 1600 точек (пикселей) по каждой из сторон.',
			'phone.numeric' => 'Только цифры! Напр. 89212223344',
		];
	}

}
