<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * return image url
 */
if ( ! function_exists('user_image_url'))
{
	function user_image_url($filename,$size='')
	{
		$image_url =  BASE_URL . str_replace('[size]', $size.'/', $filename);
		return $image_url;
	}
}
