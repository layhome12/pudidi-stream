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
if (!function_exists('seo_url_encode')) {
	function seo_url_encode($text, $id)
	{
		$eid = base64_encode(str_encrypt($id));
		$seo = preg_replace('/[^\w]+/', '-', strtolower($text));
		$seo .= "-eid-$eid";
		return $seo;
	}
}
if (!function_exists('seo_url_decode')) {
	function seo_url_decode($text)
	{
		$eid = explode('-eid-', $text)[1];
		return str_decrypt(base64_decode($eid));
	}
}
