<?php

$router = $di->getRouter();

// Define your routes here
$router->addGet('/', [
	'controller' => 'Posts',
	'action' => 'index'
]);

$router->addGet('/inscription', [
	'controller' => 'Registration',
	'action' => 'registration'
]);

$router->addGet('/connexion', [
	'controller' => 'Login',
	'action' => 'login'
]);

$router->addGet('/show/{id}', [
	'controller' => 'Posts',
	'action' => 'show'
]);

$router->handle($_SERVER['REQUEST_URI']);


