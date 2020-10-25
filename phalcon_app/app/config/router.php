<?php

$router = $di->getRouter();

// Define your routes here

// Création de la route de la homepage
$router->addGet('/homepage', [
	'controller' => 'Index',
	'action' => 'index'
]);

$router->handle($_SERVER['REQUEST_URI']);


