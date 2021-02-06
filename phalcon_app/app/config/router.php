<?php

$router = $di->getRouter();

// Define your routes here

$router->addGet('/', [
	'controller' => 'Index',
	'action' => 'index'
]);

$router->addGet('/new', [
	'controller' => 'Index',
	'action' => 'new'
]);

$router->addGet('/edit', [
	'controller' => 'Index',
	'action' => 'edit'
]);

$router->addGet('/show/{var}', [
	'controller' => 'Index',
	'action' => 'show'
]);

$router->addGet('/utilisateur', [
	'controller' => 'User',
	'action' => 'index'
]);

$router->handle($_SERVER['REQUEST_URI']);
