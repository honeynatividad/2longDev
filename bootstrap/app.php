<?php

session_start();

require __DIR__ . '/../vendor/autoload.php';

$app = new \Slim\App([
	'settings'	=>	[
		'displayErrorDetails'	=>	true,
	]
]);
require_once('../app/api/books.php');
require_once('../app/api/users.php');
require __DIR__.'/../app/routes.php';
/*
$app->get('/', function($request,$response){
	return 'HOME';
});*/