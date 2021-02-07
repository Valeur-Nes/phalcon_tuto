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

// Routes User

$router->addGet('/utilisateur', [
	'controller' => 'User',
	'action' => 'index'
]);

$router->addGet('/utilisateur/{id}', [
	'controller' => 'User',
	'action' => 'show'
]);

$router->addGet('/ajouter_utilisateur', [
	'controller' => 'User',
	'action' => 'new'
]);

$router->addPost('/creer_utilisateur', [
	'controller' => 'User',
	'action' => 'create'
]);

$router->addGet('/modifier_utilisateur/{id}', [
	'controller' => 'User',
	'action' => 'edit'
]);

$router->addPost('/save_modifier_utilisateur', [
	'controller' => 'User',
	'action' => 'save'
]);

$router->addGet('/supprimer_utilisateur/{id}', [
	'controller' => 'User',
	'action' => 'delete'
]);

$router->handle($_SERVER['REQUEST_URI']);
