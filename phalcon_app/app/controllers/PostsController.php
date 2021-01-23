<?php
declare(strict_types=1);

class PostsController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
		// TODO
    }

    public function showAction(string $id) {
	    $this->view->id = $id;
    }

}

