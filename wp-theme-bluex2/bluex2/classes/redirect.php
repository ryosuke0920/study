<?php

class Bluex2_Redirect
{
	function init()
	{
		add_action('template_redirect', [$this, 'redirect']);
	}

	function redirect()
	{
		$path = $_SERVER['REQUEST_URI'];
		if(preg_match('/^\/jump/', $path)){
			wp_redirect('https://www.google.co.jp' . $path);
			exit();
		}
	}
}
