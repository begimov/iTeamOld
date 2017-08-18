<?php
if (!function_exists('generateWalletOneSignature')) {
		function generateWalletOneSignature(array $formFields)
		{
				uksort($formFields, "strcasecmp");

				$fieldValues = array_reduce($formFields, function ($result, $fieldValue) {
						return $result . iconv("UTF-8", "Windows-1251", $fieldValue);
				}, "");

				return base64_encode(pack("H*", md5($fieldValues . config('payments.walletone_key'))));
		}
}

if (!function_exists('isActivePath')) {
	function isActivePath($path)
	{
		return Request::is($path);
	}
}
if (!function_exists('classActivePath')) {
	function classActivePath($path)
	{
		return Request::is($path) ? ' active' : '';
	}
}

if (!function_exists('classActiveSegment')) {
	function classActiveSegment($segment, $value)
	{
		if(!is_array($value)) {
			return Request::segment($segment) == $value ? ' active' : '';
		}
		foreach ($value as $v) {
			if(Request::segment($segment) == $v) return ' active';
		}
		return '';
	}
}

if (!function_exists('classActiveOnlyPath')) {
	function classActiveOnlyPath($path)
	{
		return Request::is($path) ? ' active' : '';
	}
}

if (!function_exists('classActiveOnlySegment')) {
	function classActiveOnlySegment($segment, $value)
	{
		if(!is_array($value)) {
			return Request::segment($segment) == $value ? ' active' : '';
		}
		foreach ($value as $v) {
			if(Request::segment($segment) == $v) return ' active';
		}
		return '';
	}
}
