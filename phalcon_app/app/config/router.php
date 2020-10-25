<?php

$router = $di->getRouter();

// Define your routes here
$router->addGet('/', [
	'controller' => 'Index',
	'action' => 'index'
]);

$router->addGet('/show/{var}', [
	'controller' => 'Index',
	'action' => 'show'
]);

$router->handle($_SERVER['REQUEST_URI']);
