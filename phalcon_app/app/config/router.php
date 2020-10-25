<?php

$router = $di->getRouter();

// Define your routes here

// Création de la route de la homepage
$router->addGet('/', [
	'controller' => 'Index',
	'action' => 'index'
]);

$router->addGet('/test/{var}', [
	'controller' => 'Index',
	'action' => 'test'
]);

$router->handle($_SERVER['REQUEST_URI']);


