<?php

$router = $di->getRouter();

// Define your routes here

$router->addGet('/', [
	'controller' => 'Index',
	'action' => 'index'
]);

$router->addGet('/show', [
	'controller' => 'Index',
	'action' => 'show'
]);

$router->addGet('/posts', [
	'controller' => 'Posts',
	'action' => 'index'
]);

$router->addGet('/posts/{string}', [
	'controller' => 'Posts',
	'action' => 'show'
]);


$router->handle($_SERVER['REQUEST_URI']);


