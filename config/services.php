<?php

return [

	/*
	|--------------------------------------------------------------------------
	| Third Party Services
	|--------------------------------------------------------------------------
	|
	| This file is for storing the credentials for third party services such
	| as Stripe, Mailgun, Mandrill, and others. This file provides a sane
	| default location for this type of information, allowing packages
	| to have a conventional place to find your various credentials.
	|
	*/

	'mailgun' => [
		'domain' => '',
		'secret' => '',
	],

	'mandrill' => [
//		'secret' => 'IKmEOIOZpFXavCtC_VujxQ',
		'secret' => 'gZZSdwjhFB5JbKCED4Se4A',
	],

	'ses' => [
		'key' => '',
		'secret' => '',
		'region' => 'us-east-1',
	],

	'stripe' => [
		'model'  => 'User',
		'secret' => '',
	],
	
	'github' => [
		'client_id' => '55474f3dea94199f0b24',
		'client_secret' => 'f8c87115f2efb4a0737f6ca250973b3f051bee81',
		'redirect' => 'http://u.iteam.ru/oauth/github/callback',
	],

];
