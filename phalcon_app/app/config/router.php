<?php

$router = $di->getRouter();

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

// Route Post

$router->addGet('/', [
	'controller' => 'Post',
	'action' => 'index'
]);

$router->addGet('/post/{id}', [
	'controller' => 'Post',
	'action' => 'show'
]);

$router->addGet('/creer_un_post', [
	'controller' => 'Post',
	'action' => 'new'
]);

$router->addPost('/save_creer_un_post', [
	'controller' => 'Post',
	'action' => 'create'
]);

$router->addGet('/modifier_un_post/{id}', [
	'controller' => 'Post',
	'action' => 'edit'
]);

$router->addPost('/save_modifier_un_post', [
	'controller' => 'Post',
	'action' => 'save'
]);

$router->addGet('/supprimer_un_post/{id}', [
	'controller' => 'Post',
	'action' => 'delete'
]);


$router->handle($_SERVER['REQUEST_URI']);
