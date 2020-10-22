<?php
declare(strict_types=1);

use Phalcon\Mvc\Controller;

class IndexController extends Controller
{

    public function indexAction() {

    }

    public function messageAction() {

    }

    public function testAction(int $var) {
    	$this->view->message = "Un test a la page Test " . ($var + 10);
    }

}

