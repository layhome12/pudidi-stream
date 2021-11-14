<?php
if (!function_exists('str_decrypt')) {
	function str_decrypt($str = '')
	{
		$password = "pudidistreams";
		$decrypted_string = openssl_decrypt($str, "AES-128-ECB", $password);
		return $decrypted_string;
	}
}

if (!function_exists('str_encrypt')) {
	function str_encrypt($str = '')
	{
		$password = "pudidistreams";
		$encrypted_string = openssl_encrypt($str, "AES-128-ECB", $password);
		return $encrypted_string;
	}
}
