<?php
declare(strict_types=1);

class PostsController extends \Phalcon\Mvc\Controller
{

	public function indexAction()
	{

	}

	public function showAction(string $string) {
		$this->view->var = $string;
	}

}

