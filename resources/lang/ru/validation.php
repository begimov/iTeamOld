<?php

return [

	/*
	|--------------------------------------------------------------------------
	| Языковые переменные валидации
	|--------------------------------------------------------------------------
	|
	| Следующие строки языка содержат сообщения об ошибках по умолчанию, используемые
	| классом валидатор. Некоторые из этих правил имеют несколько версий, таких
	| как правила размера. Не стесняйтесь настроить каждый из этих сообщений здесь.
	|
	*/

	"accepted"	=> "Поле :attribute обязателен.",
	"active_url"	=> "Атрибут :attribute не является допустимым URL.",
	"after"	=> "Атрибут :attribute должен быть датой позже :date.",
	"alpha"	=> "Атрибут :attribute может содержать только буквы.",
	"alpha_dash"	=> "Атрибут :attribute может содержать только буквы, цифры и дефис.",
	"alpha_num"	=> "Атрибут :attribute может содержать только буквы и цифры.",
	"array"	=> "Атрибут :attribute должен быть массивом.",
	"before"	=> "Атрибут :attribute должен быть датой раньше :date.",
	"between" => [
		"numeric"	=> "Атрибут :attribute должен находиться в пределах :min и :max.",
		"file"	=> "Атрибут :attribute должен находиться в пределах :min и :max килобайт.",
		"string"	=> "Атрибут :attribute должен находиться в пределах :min и :max символов.",
		"array"	=> "Атрибут :attribute должен иметь от :min до :max пунктов.",
	],
	"boolean"	=> "Поле атрибут :attribute должно быть истинным или ложным.",
	"confirmed"	=> ":@Подтверждение атрибута не совпадает.",
	"date"	=> "Атрибут :attribute не является допустимой датой.",
	"date_format"	=> "Атрибут :attribute не соответствует формату :format.",
	"different"	=> "Атрибут :attribute и :other должны быть разными.",
	"digits"	=> "Атрибут :attribute должен быть :digital цифр.",
	"digits_between"	=> "Атрибут :attribute должен находиться в пределах :min и :max цифр.",
	"email"	=> "Атрибут :attribute должен быть действительным адресом электронной почты.",
	"filled"	=> "Требуется Поле :attribute.",
	"exists"	=> "Такое значение :attribute не найдено.",
	"image"	=> "Атрибут :attribute должен быть изображение.",
	"in"	=> "Выбранный атрибут :attribute является недействительным.",
	"integer"	=> "Атрибут :attribute должен быть целым числом.",
	"ip"	=> "Атрибут :attribute должен быть действительным IP-адрес.",
	"max" => [
		"numeric"	=> "Атрибут :attribute не может быть больше :max.",
		"file"	=> "Атрибут :attribute не может быть больше :max килобайт.",
		"string"	=> "Атрибут :attribute не может быть больше :max символов.",
		"array"	=> "Атрибут :attribute не может иметь больше :max элементов.",
	],
	"mimes"	=> "Атрибут :attribute должен быть файл типа :values.",
	"min" => [
		"numeric"	=> "Атрибут :attribute должен быть не менее :min.",
		"file"	=> "Атрибут :attribute должен быть не менее :min килобайт.",
		"string"	=> "Атрибут :attribute должен быть не менее :min символов.",
		"array"	=> "Атрибут :attribute должен иметь по крайней мере :min пунктов.",
	],
	"not_in"	=> "Выбранный атрибут :attribute является недействительным.",
	"numeric"	=> "Атрибут :attribute должен быть числом.",
	"regex"	=> "Формат атрибут :attribute является недействительным.",
	"required"	=> "Поле :attribute обязателно.",
	"required_if"	=> "Поле атрибут :attribute требуется в следующих случаях :other :value.",
	"required_with"	=> "Поле атрибут :attribute требуется в следующих случаях :values присутствует.",
	"required_with_all"	=> "Поле атрибут :attribute требуется в следующих случаях :values присутствует.",
	"required_without"	=> "Поле атрибут :attribute требуется в следующих случаях :values нет.",
	"required_without_all"	=> "Поле атрибут :attribute требуется, когда нет ни одного значения из :values.",
	"same"	=> "Атрибут :attribute и :other должны совпадать.",
	"size" => [
		"numeric"	=> "Атрибут :attribute должен быть :size.",
		"file"	=> "Атрибут :attribute должен быть :size килобайт.",
		"string"	=> "Атрибут :attribute должен быть :size символов.",
		"array"	=> "Атрибут :attribute должен содержать :size элементов.",
	],
	"unique"	=> "Такое значение :attribute уже существует, выберите другое",
	"url"	=> "Формат :attribute является недействительным.",
	"tags"	=> "теги, разделенные запятыми (без пробелов), должны иметь максимум 50 символов.",
	"timezone"	=> "Атрибут :attribute должен быть действительной зоной.",

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| Here you may specify custom validation messages for attributes using the
	| convention "attribute.rule" to name the lines. This makes it quick to
	| specify a specific custom language line for a given attribute rule.
	|
	*/

	'custom' => [
		'attribute-name' => [
			'rule-name' => 'custom-message',
		],
	],

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Attributes
	|--------------------------------------------------------------------------
	|
	| The following language lines are used to swap attribute place-holders
	| with something more reader friendly such as E-Mail Address instead
	| of "email". This simply helps us make messages a little cleaner.
	|
	*/

	'attributes' => [
		"log" => "E-mail или пароль"
	],

];
