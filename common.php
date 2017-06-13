<?php
	session_start();
	header('Cache-control: private'); // IE 6 FIX
	
	// Check if a lang exist in the URI
	if(isSet($_GET['lang']))
	{
		$lang = $_GET['lang'];
	
		// register the session and set the cookie
		$_SESSION['lang'] = $lang;
	
		// Define the cookie
		setcookie('lang', $lang, time() + (3600 * 24 * 30));
	}
	// Check if a lang already exist in the session
	else if(isSet($_SESSION['lang']))
	{
		$lang = $_SESSION['lang'];
	}
	// Check if a lang already exist in the cookie
	else if(isSet($_COOKIE['lang']))
	{
		$lang = $_COOKIE['lang'];
	}
	// By default put the site in english
	else
	{
		$lang = 'en';
	}
	
	// Switch the file to read by the lang defined before
	switch ($lang) {
		case 'en':
			$lang_file = 'lang.en.php';
			break;
	
		case 'fr':
			$lang_file = 'lang.fr.php';
			break;
	
		default:
			$lang_file = 'lang.en.php';
	}
	
	include_once 'lang/'.$lang_file;
?>