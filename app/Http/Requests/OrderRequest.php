<?php namespace App\Http\Requests;

class OrderRequest extends Request {

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		
		$user = Auth()->user();
		$user_id = $user->id;
		
		return [
			'email' => 'required|email',
			'name' => 'required',
			'phone' => 'required|min:11',
			'product_id' => 'required|numeric',
			'payment_type' => 'required',
			'status' => 'required',
			//'user_id' => 'email|exists:user,id,' . $user_id,
		];
	}
	
	public function messages()
	{
		return [
			'email.required' => 'Укажите Email',
			'email.email' => 'Укажите корректный Email',
			'name.required' => 'Укажите имя',
			'phone.required' => 'Укажите телефон',
			'phone.min' => 'Номер телефона не может быть короче 11 символов (напр. 84991234567)',
			'product_id.required' => 'Не определён ID продукта',
			'product_id.numeric' => 'Не корректный ID продукта',
			'payment_type.required' => 'Не определён тип оплаты',
			'status.required' => 'Не определён статус оплаты',
		];
	}

}
