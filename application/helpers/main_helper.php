<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// ------------------------------------------------------------------------

if (!function_exists('asset'))
{
	function asset($data)
	{
		return base_url().'public/'.$data;
	}
}

if (!function_exists('generate_kode'))
{
	function generate_kode()
	{
		$length = 10;
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}
}

if (!function_exists('time_beautifier'))
{
	function time_beautifier_now() {
		setlocale(LC_ALL, 'id_ID');
		$date = strftime("%A, %e %B %Y");
		return $date;
	}
}

if (!function_exists('countdown_timer'))
{
	function countdown_timer($data)
	{
		$diwali = strtotime($data);
		$current = strtotime('now');
		$diffference = ($diwali-$current);
		$days = floor($diffference / (60*60*24));
		echo "$days hari lagi";
	}
}
