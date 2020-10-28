<?php
declare(strict_types=1);

use Phalcon\Mvc\Controller;
use Phalcon\Http\Request;

class IndexController extends Controller
{

    public function indexAction() {
		$this->view->name = "Martin";
		$this->view->tab = [
			1 => "1",
			2 => "2",
			3 => "3",
			4 => "4",
		 	5 => "5"
		];
    }

    public function showAction() {
	    $request = new Request();
		$this->view->var = $request->get('var');
    }

}

