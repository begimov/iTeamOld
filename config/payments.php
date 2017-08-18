<?php

return [

	'email' => env('PAY_EMAIL', 'pay@iteam.ru'),

	'yamoney_id' => env('PAY_YAMONEY_ID', '41001983437705'),
	'yamoney_secret' => env('PAY_YAMONEY_SECRET', 'UBvz5JAIgyCDHdwp/vtV4Qew'),
	'yamoney_url' => env('PAY_YAMONEY_URL', 'https://money.yandex.ru/quickpay/confirm.xml'),

	'yakassa_scid' => env('PAY_YAKASSA_SCID', '71237'),
	'yakassa_shopid' => env('PAY_YAKASSA_SHOPID', '57383'),
	'yakassa_shoppassword' => env('PAY_YAKASSA_SHOPPASSWORD', 'QZQrIGpgoaL63u'),
	'yakassa_action' => env('PAY_YAKASSA_ACTION', 'https://money.yandex.ru/eshop.xml'),

	'demo_yakassa_scid' => env('PAY_DEMO_YAKASSA_SCID', '542342'),
	'demo_yakassa_shopid' => env('PAY_DEMO_YAKASSA_SHOPID', '57383'),
	'demo_yakassa_shoppassword' => env('PAY_DEMO_YAKASSA_SHOPPASSWORD', 'QZQrIGpgoaL63u'),
	'demo_yakassa_action' => env('PAY_DEMO_YAKASSA_ACTION', 'https://demomoney.yandex.ru/eshop.xml'),

	//Wallet One
	'walletone_key' => env('PAY_WALLETONE_KEY'),

];
