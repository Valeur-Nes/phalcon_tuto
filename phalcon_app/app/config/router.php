<?php

$router = $di->getRouter();

// Define your routes here

// Homepage
$router->addGet('/', [
	'controller' => 'Index',
	'action' => 'index'
]);

$router->add('/message', [
	'controller' => 'Index',
	'action' => 'message'
]);

$router->addGet('/test/{var}', [
	'controller' => 'Index',
	'action' => 'test'
]);


$router->handle($_SERVER['REQUEST_URI']);