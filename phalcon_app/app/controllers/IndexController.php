<?php
declare(strict_types=1);

use Phalcon\Mvc\Controller;

class IndexController extends Controller
{

    public function indexAction() {
		$this->view->message = "sffdsfdf";
    }

    public function showAction(int $var) {
		$this->view->var = $var;
    }

}

