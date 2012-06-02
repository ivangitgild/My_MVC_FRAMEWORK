<?php
	error_reporting(E_ALL);
    ini_set('display_errors','On');
	require 'constants.php';
	ob_start();
	$uri = $_SERVER['REQUEST_URI'];
	if(preg_match('/^\/training\/(index\.php|)$/',$uri)) {
		include 'controller/'.MAIN_CONTROLLER;
	}else if(preg_match('/^\/training\/([a-zA-z]+)\/(index\.php)$/',$uri)) {
		$uri2 = preg_replace('/^\/training\/(.+)$/','$1',$uri);
		include 'controller/'.$uri2;
	}else if(preg_match('/^\/training\/([a-zA-z]+)(\/*?)$/',$uri)){
		$uri2 = preg_replace('/^\/training\/(.+)$/','$1',$uri);
		include 'controller/'.$uri2.'/index.php';
	}else {
		$uri2 = preg_replace('/^\/training\/index\.php\/(.+)$/','$1',$uri);
		//header("");
		if(preg_match('/^(.+)\/index\.php$/',$uri2))
			include 'controller/'.$uri2;
		else 
			include 'controller/'.$uri2.'/index.php';
	}
	
	ob_flush();
?>