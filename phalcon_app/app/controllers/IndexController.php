<?php
declare(strict_types=1);

use Phalcon\Mvc\Controller;

class IndexController extends Controller
{

    public function indexAction() {
		$this->view->message = 'Martin';
    }

    public function messageAction() {

    }

}

