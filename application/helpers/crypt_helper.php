<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('encrypt'))
{
	function encrypt($string, $key) {
   	$result = '';
   	for($i=0; $i<strlen($string); $i++)
	{
      	$char = substr($string, $i, 1);
      	$keychar = substr($key, ($i % strlen($key))-1, 1);
      	$char = chr(ord($char)+ord($keychar));
    	$result.=$char;
   	}
   	return base64_encode($result);
	}
}

if ( ! function_exists('decrypt'))
{
	function decrypt($string, $key) {
   	$result = '';
   	$string = base64_decode($string);
   	for($i=0; $i<strlen($string); $i++)
	{
      	$char = substr($string, $i, 1);
      	$keychar = substr($key, ($i % strlen($key))-1, 1);
      	$char = chr(ord($char)-ord($keychar));
      	$result.=$char;
   	}
   	return $result;
	}
}